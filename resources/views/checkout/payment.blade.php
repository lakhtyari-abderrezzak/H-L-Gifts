@extends('layouts.master')

@section('content')
    <x-nav />
    <div class="single-product "style="min-height: 100vh">
        <div class="container">
            <div class="row">
                @if (!empty($carts))
                    <div class="col-lg-8 col-md-12">
                        <div class="order-details-wrap">
                            <table class="basic-table">
                                <thead>
                                    <tr>
                                        <th>Your order Details</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody class="order-details-body">
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td>{{ $cart['name'] }}</td>
                                            <td>${{ number_format($cart['price'] * $cart['quantity'], 2) }}</td>
                                        </tr>
                                    @endforeach


                                </tbody>
                                <tbody class="checkout-details">
                                    <tr>
                                        <td>Subtotal</td>
                                        <td>${{ number_format($total_price, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Coupon</td>
                                        <td>$5.00</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td>$20.00</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td>${{ number_format($total_price + 20 - 5, 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ url('stripe', $total_price + 15) }}" class="btn">
                                <i class="fas fa-credit-card"></i>
                                Card Order</a>
                        </div>
                    </div>
                @else
                    <div style="width:fit-content; margin:200px auto">
                        <h4>Nothing To Pay</h4>
                        @if (session('success'))
                        <p style="background:green; padding:5px 10px; color:#fff;">{{session('success')}}</p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
