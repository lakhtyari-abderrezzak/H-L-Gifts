@extends('layouts.master')

@section('content')
    <x-nav />
    <div class="fh5co-loader"></div>

    <div class="products">
        <div class="container">
            @if (!$products->isEmpty())
                @foreach ($products as $product)
                    <h2 class="title">{{ $product->categories->name }}</h2>
                @endforeach

                <div class="row">
                    @foreach ($products as $product)
                        <x-product :product="$product" />
                    @endforeach
                </div>
                @else 
                <h2 class="title">No products</h2>
            @endif

        </div>
    </div>

@endsection
