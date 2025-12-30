<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Services\PaymentGatewayService;
use App\Services\RazorpayGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct()
    {
        $gateway = new RazorpayGateway();
        $this->paymentService = new PaymentGatewayService($gateway);
    }

    /**
     * Initialize payment for an order.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function initialize(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'payment_method' => 'required|in:online_payment,cash_on_delivery,upi,bank_transfer',
        ]);

        $order = Order::findOrFail($request->order_id);

        // Check if order already has a completed payment
        if ($order->payments()->where('status', 'completed')->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Order already has a completed payment',
            ], 400);
        }

        $result = $this->paymentService->initializePayment($order, $request->payment_method);

        if (!$result['success']) {
            return response()->json($result, 400);
        }

        return response()->json($result);
    }

    /**
     * Handle payment callback/webhook.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function callback(Request $request)
    {
        $request->validate([
            'razorpay_order_id' => 'required',
            'razorpay_payment_id' => 'required',
            'razorpay_signature' => 'required',
        ]);

        // Find payment by gateway order ID
        $payment = Payment::where('gateway_order_id', $request->razorpay_order_id)
            ->where('status', 'pending')
            ->first();

        if (!$payment) {
            return response()->json([
                'success' => false,
                'message' => 'Payment not found',
            ], 404);
        }

        $result = $this->paymentService->processPayment($payment, $request->all());

        if ($result['success']) {
            return response()->json([
                'success' => true,
                'message' => 'Payment successful',
                'order_number' => $payment->order->order_number,
                'redirect_url' => route('orders.show', $payment->order->id),
            ]);
        }

        return response()->json($result, 400);
    }

    /**
     * Handle payment webhook from Razorpay.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function webhook(Request $request)
    {
        $payload = $request->all();
        $event = $payload['event'] ?? null;

        Log::info('Razorpay Webhook Received', ['event' => $event, 'payload' => $payload]);

        switch ($event) {
            case 'payment.captured':
                $this->handlePaymentCaptured($payload);
                break;
            case 'payment.failed':
                $this->handlePaymentFailed($payload);
                break;
            case 'refund.created':
                $this->handleRefundCreated($payload);
                break;
        }

        return response()->json(['status' => 'success'], 200);
    }

    /**
     * Handle payment captured event.
     */
    protected function handlePaymentCaptured(array $payload)
    {
        $paymentId = $payload['payload']['payment']['entity']['id'] ?? null;
        
        if ($paymentId) {
            $payment = Payment::where('gateway_payment_id', $paymentId)->first();
            if ($payment && $payment->status === 'pending') {
                $payment->markAsCompleted();
            }
        }
    }

    /**
     * Handle payment failed event.
     */
    protected function handlePaymentFailed(array $payload)
    {
        $paymentId = $payload['payload']['payment']['entity']['id'] ?? null;
        $failureReason = $payload['payload']['payment']['entity']['error_description'] ?? 'Payment failed';
        
        if ($paymentId) {
            $payment = Payment::where('gateway_payment_id', $paymentId)->first();
            if ($payment && $payment->status === 'pending') {
                $payment->markAsFailed($failureReason);
            }
        }
    }

    /**
     * Handle refund created event.
     */
    protected function handleRefundCreated(array $payload)
    {
        $paymentId = $payload['payload']['payment']['entity']['id'] ?? null;
        
        if ($paymentId) {
            $payment = Payment::where('gateway_payment_id', $paymentId)->first();
            if ($payment) {
                $refundAmount = ($payload['payload']['refund']['entity']['amount'] ?? 0) / 100;
                $status = $refundAmount < $payment->amount ? 'partially_refunded' : 'refunded';
                $payment->update(['status' => $status]);
            }
        }
    }

    /**
     * Process refund.
     *
     * @param Request $request
     * @param Payment $payment
     * @return \Illuminate\Http\JsonResponse
     */
    public function refund(Request $request, Payment $payment)
    {
        $request->validate([
            'amount' => 'nullable|numeric|min:0.01|max:' . $payment->amount,
        ]);

        $amount = $request->amount ?? $payment->amount;
        $result = $this->paymentService->processRefund($payment, $amount);

        return response()->json($result, $result['success'] ? 200 : 400);
    }
}
