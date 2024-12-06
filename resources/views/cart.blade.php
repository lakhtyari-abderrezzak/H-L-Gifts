@extends('layouts.master')

@section('content')
    <x-nav />
    <div class="cart">
        <div class="container">
            <h1 class="title"><i class="icon-shopping-cart"></i> Cart</h1>
            <div class="col-lg-8 col-md-12">
                @if (session('success'))
                    @session('success')
                        <p style="color:green">{{ $value }}</p>
                    @endsession
                @endif
                @if(session()->has('cart') && count(session()->get('cart')) > 0)
                <div class="cart-table-wrap basic-table">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-remove"></th>
                                <th class="product-name">Name</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                                <th class="product-total">Update</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach(session()->get('cart') as $productId => $product)
                                <tr class="table-body-row">
                                    <td class="product-remove">
                                        <form action="{{route('cart.removeFromCart')}}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this resource?');">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$productId}}">
                                            <button type="submit" class="cart-btn">&times;</button>
                                        </form>
                                    </td>
                                    {{-- <td class="product-image"><img src="{{ asset('storage/' . $cart->product->img_path) }}"
                                            alt=""></td> --}}
                                    <td class="product-name ">{{ $product['name']}} </td>
                                    <td class="product-price" id="product-price ">${{ $product['price']}}</td>
                                    <td class="product-quantity" name="quantity" id="product-quantity">
                                        <form action="{{route('cart.updateCart')}}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="id" value="{{$productId}}">
                                            <input name="quantity" type="number" placeholder="0"
                                                value="{{ $product['quantity'] }}">
                                    <td class="product-total" id="product-total">
                                        {{ number_format($product['quantity'] * $product['price']) }}
                                    </td>
                                    <td><button type="submit" class="cart-btn balck">Update</button></td>
                                    </td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
            <div class="cart">

                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table basic-table ">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Total</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="total-data">
                                    <td><strong>Subtotal: </strong></td>
                                    <td>${{number_format($subtotal, 2)}}</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Coupons</strong></td>
                                    <td>${{number_format($coupon, 2)}}</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>
                                    <td>${{number_format($subtotal - $coupon, 2)}}</td>
                                </tr>
    
                            </tbody>
                        </table>
                        <div class="cart-buttons">
                            <a href="{{route('checkout.index')}}" class="btn">Check Out</a>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <h4> <i class="icon-shopping-cart"></i> Cart is Empty</h4>
                
                @endif
            {{-- {} --}}
        </div>
    </div>
@endsection
