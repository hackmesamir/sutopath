<?php

namespace App\Services;

interface PaymentGatewayInterface
{
    /**
     * Create a payment order.
     *
     * @param array $data
     * @return array
     */
    public function createOrder(array $data): array;

    /**
     * Verify payment signature.
     *
     * @param array $data
     * @return bool
     */
    public function verifyPayment(array $data): bool;

    /**
     * Get payment details.
     *
     * @param string $paymentId
     * @return array
     */
    public function getPaymentDetails(string $paymentId): array;

    /**
     * Refund a payment.
     *
     * @param string $paymentId
     * @param float $amount
     * @return array
     */
    public function refund(string $paymentId, float $amount): array;
}

