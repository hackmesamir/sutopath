<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Payment;

class PaymentGatewayService
{
    protected $gateway;

    public function __construct(PaymentGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * Initialize payment for an order.
     *
     * @param Order $order
     * @param string $paymentMethod
     * @return array
     */
    public function initializePayment(Order $order, string $paymentMethod = 'online_payment'): array
    {
        // For cash on delivery, create payment record without gateway
        if ($paymentMethod === 'cash_on_delivery') {
            $payment = Payment::create([
                'order_id' => $order->id,
                'payment_method' => 'cash_on_delivery',
                'amount' => $order->total,
                'status' => 'pending',
            ]);

            return [
                'success' => true,
                'payment' => $payment,
                'type' => 'cod',
            ];
        }

        // For online payments, create gateway order
        $gatewayData = [
            'order_id' => $order->id,
            'order_number' => $order->order_number,
            'amount' => $order->total,
            'currency' => 'INR',
            'customer_name' => $order->customer_name,
            'customer_email' => $order->customer_email,
        ];

        $gatewayResponse = $this->gateway->createOrder($gatewayData);

        if (!$gatewayResponse['success']) {
            return [
                'success' => false,
                'message' => $gatewayResponse['message'] ?? 'Failed to initialize payment',
            ];
        }

        // Create payment record
        $payment = Payment::create([
            'order_id' => $order->id,
            'payment_method' => $paymentMethod,
            'gateway' => 'razorpay',
            'gateway_order_id' => $gatewayResponse['order_id'],
            'amount' => $order->total,
            'status' => 'pending',
            'gateway_response' => $gatewayResponse,
        ]);

        return [
            'success' => true,
            'payment' => $payment,
            'gateway_order' => $gatewayResponse,
            'type' => 'online',
        ];
    }

    /**
     * Verify and process payment.
     *
     * @param Payment $payment
     * @param array $gatewayData
     * @return array
     */
    public function processPayment(Payment $payment, array $gatewayData): array
    {
        // Verify payment signature
        $isValid = $this->gateway->verifyPayment($gatewayData);

        if (!$isValid) {
            $payment->markAsFailed('Invalid payment signature');
            return [
                'success' => false,
                'message' => 'Payment verification failed',
            ];
        }

        // Get payment details from gateway
        $paymentDetails = $this->gateway->getPaymentDetails($gatewayData['razorpay_payment_id']);

        if (!$paymentDetails['success']) {
            $payment->markAsFailed($paymentDetails['message'] ?? 'Failed to fetch payment details');
            return [
                'success' => false,
                'message' => $paymentDetails['message'] ?? 'Failed to process payment',
            ];
        }

        // Update payment record
        $payment->update([
            'gateway_payment_id' => $paymentDetails['payment']['id'],
            'transaction_id' => $paymentDetails['payment']['id'],
            'status' => 'completed',
            'paid_at' => now(),
            'gateway_response' => $paymentDetails,
        ]);

        // Mark payment as completed (updates order status)
        $payment->markAsCompleted();

        return [
            'success' => true,
            'payment' => $payment,
            'message' => 'Payment processed successfully',
        ];
    }

    /**
     * Process refund.
     *
     * @param Payment $payment
     * @param float|null $amount
     * @return array
     */
    public function processRefund(Payment $payment, ?float $amount = null): array
    {
        if (!$payment->gateway_payment_id) {
            return [
                'success' => false,
                'message' => 'Payment gateway ID not found',
            ];
        }

        $refundAmount = $amount ?? $payment->amount;
        $refundResponse = $this->gateway->refund($payment->gateway_payment_id, $refundAmount);

        if (!$refundResponse['success']) {
            return [
                'success' => false,
                'message' => $refundResponse['message'] ?? 'Refund failed',
            ];
        }

        // Update payment status
        $status = $refundAmount < $payment->amount ? 'partially_refunded' : 'refunded';
        $payment->update([
            'status' => $status,
            'gateway_response' => array_merge($payment->gateway_response ?? [], [
                'refund' => $refundResponse,
            ]),
        ]);

        return [
            'success' => true,
            'refund' => $refundResponse,
            'message' => 'Refund processed successfully',
        ];
    }
}

