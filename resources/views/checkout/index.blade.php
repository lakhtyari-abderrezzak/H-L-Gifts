@extends('layouts.master')

@section('content')
    <x-nav />

    <!-- check out section -->
    <div class="checkout-section">
        <div class="container">
            <h2 class="title">Checkout Page</h2>
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="contact-form">
                        @if(session('success'))
                            <div class="text-success">{{session('success')}}</div>
                        @endif
                            <form class="billing-address-form" action="{{route('checkout.order')}}" method="POST">
                                @csrf
                                <p><input type="text" placeholder="Name" name="name" class="@error('name') border-danger @enderror"></p>
                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                <p><input type="email" placeholder="Email" name="email" class="@error('email') border-danger @enderror"></p>
                                @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                <p><input type="text" placeholder="Address" name="address"class="@error('address') border-danger @enderror"></p>
                                @error('address')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                <p><input type="tel" placeholder="Phone" name="phone"class="@error('phone') border-danger @enderror"></p>
                                @error('phone')
                                    <p class="text-danger m-2">{{$message}}</p>
                                @enderror
                                <button type="submit" class="btn">Save</button>
                            </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end check out section -->
@endsection