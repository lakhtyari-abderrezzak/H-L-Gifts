<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Session::get('cart', []);

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];  // Calculate subtotal for each item
        }
        $coupon = 5;
        $carts = session()->get('cart', []);
        return view('cart', compact(['carts', 'subtotal', 'coupon']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        // Check if requested quantity is available in stock
        $requestedQuantity = $request->input('quantity');
        if ($product->quantity < $requestedQuantity) {
            return redirect()->route('products.index')->withErrors('Not enough stock available!');
        }

        // Check if the cart session exists, otherwise create an empty cart
        $cart = session()->get('cart', []);
        // If the product already exists in the cart, increase the quantity
        $productId = $request->input('id');
        $name = $product->name;
        $price = $product->price;
        $quantity = $request->input('quantity');
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // If not, add the product with a quantity of 1
            $cart[$productId] = [
                'product_id' => $productId,
                'name' => $name,
                'price' => $price,
                'quantity' => $quantity,
            ];
        }

        // // Save the updated cart in session
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Added to cart successfully');
    }
    public function updateCart(Request $request)
    {
        $product = Product::find($request->input('id'));
        $cart = session()->get('cart', []);

        // Check if the product exists in the cart
        $productId = $request->input('id');
        $newQuantity = $request->input('quantity');

        if ($product->quantity < $newQuantity) {
            return redirect()->route('products.index')->withErrors('Not enough stock available!');
        }

        if (isset($cart[$productId])) {
            // If the quantity is greater than 0, update it
            if ($newQuantity > 0) {
                $cart[$productId]['quantity'] = $newQuantity;
            } else {
                // If the quantity is 0 or less, remove the product from the cart
                unset($cart[$productId]);
            }
        }

        // Save the updated cart in session
        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }
    // Remove a product from the cart
    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->input('id');
        if (isset($cart[$request->input('id')])) {
            unset($cart[$request->input('id')]);
        }
        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
