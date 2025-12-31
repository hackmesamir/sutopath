<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display the checkout page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get user if authenticated, otherwise null (guest checkout)
        $user = Auth::user();
        
        return view('checkout', compact('user'));
    }

    /**
     * Process the checkout and create order.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validation and order creation logic will be implemented here
        // For now, just redirect to success page with sample order number
        $orderNumber = 'ORD-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6));
        return redirect()->route('checkout.success')->with('order_number', $orderNumber)->with('order', $orderNumber);
    }

    /**
     * Display the order success page.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function success(Request $request)
    {
        // Get order number from query parameter, session, or generate a sample one
        $order = $request->query('order') ?? session('order') ?? session('order_number') ?? 'ORD-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6));
        
        return view('checkout-success', compact('order'));
    }
}

