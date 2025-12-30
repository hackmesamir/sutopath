<?php

namespace App\Services;

use App\Models\Order;
use App\Models\ShippingCharge;

class ShippingService
{
    /**
     * Calculate shipping charge for an order.
     *
     * @param Order $order
     * @param string|null $shippingMethod
     * @return array
     */
    public static function calculateShipping(Order $order, ?string $shippingMethod = 'standard'): array
    {
        // Calculate total weight of order items
        $totalWeight = 0;
        foreach ($order->orderItems as $item) {
            // Assuming product has weight, otherwise use default
            if ($item->product && $item->product->weight) {
                $totalWeight += $item->product->weight * $item->quantity;
            } else {
                // Default weight per item (0.5 kg)
                $totalWeight += 0.5 * $item->quantity;
            }
        }

        $orderValue = $order->subtotal;
        $state = $order->shipping_state;
        $city = $order->shipping_city;
        $pincode = $order->shipping_postal_code;

        // Calculate shipping charge
        $shippingCharge = ShippingCharge::calculateCharge(
            $orderValue,
            $totalWeight,
            $state,
            $city,
            $pincode
        );

        // If no charge found, use default
        if ($shippingCharge === null) {
            $shippingCharge = 100.00; // Default shipping charge
        }

        // Add COD charges if payment method is cash on delivery
        $codCharge = 0;
        if ($order->payment_method === 'cash_on_delivery') {
            $codCharge = 50.00; // COD charges
        }

        $totalShipping = $shippingCharge + $codCharge;

        return [
            'shipping_charge' => $shippingCharge,
            'cod_charge' => $codCharge,
            'total_shipping' => $totalShipping,
            'weight' => $totalWeight,
            'estimated_days' => 5, // Default estimated days
        ];
    }

    /**
     * Get available shipping methods for an order.
     *
     * @param float $orderValue
     * @param float $weight
     * @param string|null $state
     * @param string|null $city
     * @param string|null $pincode
     * @return array
     */
    public static function getAvailableShippingMethods(
        float $orderValue,
        float $weight = 0,
        ?string $state = null,
        ?string $city = null,
        ?string $pincode = null
    ): array {
        $methods = ShippingCharge::active()
            ->where(function ($query) use ($state, $city, $pincode) {
                ShippingCharge::applyLocationFilters($query, $state, $city, $pincode);
            })
            ->where(function ($query) use ($orderValue) {
                $query->whereNull('min_order_value')
                      ->orWhere('min_order_value', '<=', $orderValue);
            })
            ->where(function ($query) use ($orderValue) {
                $query->whereNull('max_order_value')
                      ->orWhere('max_order_value', '>=', $orderValue);
            })
            ->where(function ($query) use ($weight) {
                $query->whereNull('min_weight')
                      ->orWhere('min_weight', '<=', $weight);
            })
            ->where(function ($query) use ($weight) {
                $query->whereNull('max_weight')
                      ->orWhere('max_weight', '>=', $weight);
            })
            ->orderBy('sort_order')
            ->get()
            ->groupBy('shipping_method')
            ->map(function ($charges) use ($orderValue) {
                $charge = $charges->first();
                return [
                    'method' => $charge->shipping_method,
                    'name' => $charge->name,
                    'charge' => $charge->isFreeShipping($orderValue) ? 0 : $charge->charge,
                    'estimated_days' => $charge->estimated_days,
                    'is_free' => $charge->isFreeShipping($orderValue),
                ];
            })
            ->values()
            ->toArray();

        return $methods;
    }
}

