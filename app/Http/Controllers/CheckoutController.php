<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe;
use Stripe\Charge;


class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout.index');
    }
    public function payment()
    {
        $carts = Session::get('cart', []);
        $total_price = collect($carts)->sum(function ($cart) {
            return $cart['price'] * $cart['quantity'];
        });

        return view('checkout.payment', compact('carts', 'total_price'));
    }
    public function order(Request $request)
    {
        $cart = Session::get('cart', []);

        $feilds = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|string|max:15',
        ]);
        $total_price = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        $order = new Order;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->total_price = $total_price;
        $order->status = 'In Progress';
        $order->save();

        foreach ($cart as $carts) {
            $orderItem = new OrderItem;
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $carts['product_id'];
            $orderItem->quantity = $carts['quantity'];
            $orderItem->price = $carts['price'];
            $orderItem->total_price = $total_price;
            $orderItem->total_price = number_format($carts['quantity'] * $carts['price']);
            $orderItem->save();
        }

        // Redirect Back
        return redirect()->route('checkout.payment');

    }
    public function stripe($total_price)
    {
        return view('checkout.stripe', compact('total_price'));
    }
    public function stripePost(Request $request, $amount)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([

                "amount" => $amount * 100,

                "currency" => "eur",

                "source" => $request->stripeToken,

                "description" => "Test payment from itsolutionstuff.com." 

        ]);

        session()->forget('cart');

        return redirect()->route('checkout.payment')->with('success', 'Payment successful!');

    }

}
