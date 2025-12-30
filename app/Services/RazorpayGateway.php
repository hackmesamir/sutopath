<?php

namespace App\Services;

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class RazorpayGateway implements PaymentGatewayInterface
{
    protected $api;
    protected $keyId;
    protected $keySecret;

    public function __construct()
    {
        $this->keyId = config('services.razorpay.key_id');
        $this->keySecret = config('services.razorpay.key_secret');
        
        if ($this->keyId && $this->keySecret) {
            $this->api = new Api($this->keyId, $this->keySecret);
        }
    }

    /**
     * Create a payment order.
     *
     * @param array $data
     * @return array
     */
    public function createOrder(array $data): array
    {
        try {
            $orderData = [
                'receipt' => $data['order_number'] ?? uniqid(),
                'amount' => $data['amount'] * 100, // Convert to paise
                'currency' => $data['currency'] ?? 'INR',
                'notes' => [
                    'order_id' => $data['order_id'],
                    'customer_name' => $data['customer_name'] ?? '',
                    'customer_email' => $data['customer_email'] ?? '',
                ],
            ];

            $razorpayOrder = $this->api->order->create($orderData);

            return [
                'success' => true,
                'order_id' => $razorpayOrder['id'],
                'amount' => $razorpayOrder['amount'],
                'currency' => $razorpayOrder['currency'],
                'key_id' => $this->keyId,
                'receipt' => $razorpayOrder['receipt'],
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }

    /**
     * Verify payment signature.
     *
     * @param array $data
     * @return bool
     */
    public function verifyPayment(array $data): bool
    {
        try {
            $attributes = [
                'razorpay_order_id' => $data['razorpay_order_id'],
                'razorpay_payment_id' => $data['razorpay_payment_id'],
                'razorpay_signature' => $data['razorpay_signature'],
            ];

            $this->api->utility->verifyPaymentSignature($attributes);
            
            return true;
        } catch (SignatureVerificationError $e) {
            return false;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Get payment details.
     *
     * @param string $paymentId
     * @return array
     */
    public function getPaymentDetails(string $paymentId): array
    {
        try {
            $payment = $this->api->payment->fetch($paymentId);

            return [
                'success' => true,
                'payment' => [
                    'id' => $payment['id'],
                    'amount' => $payment['amount'] / 100, // Convert from paise
                    'currency' => $payment['currency'],
                    'status' => $payment['status'],
                    'method' => $payment['method'],
                    'created_at' => $payment['created_at'],
                ],
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }

    /**
     * Refund a payment.
     *
     * @param string $paymentId
     * @param float $amount
     * @return array
     */
    public function refund(string $paymentId, float $amount): array
    {
        try {
            $refund = $this->api->payment->fetch($paymentId)->refund([
                'amount' => $amount * 100, // Convert to paise
            ]);

            return [
                'success' => true,
                'refund_id' => $refund['id'],
                'amount' => $refund['amount'] / 100,
                'status' => $refund['status'],
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }
}

