@extends('layouts.master')

@section('content')
    <x-nav>

        
    </x-nav>
    <div class="dashboard">
        <x-aside />
        <div class="categories">
            <div class="container">
                <h2 class="title">Categories</h2>
                <div class="cards">
                    @foreach ($categories as $category)
                        <div class="card">
                            <a href="{{ route('categories.cat_product', $category) }}" class="icon">
                                <img src="{{ asset('storage/' . $category->img_path) }}" alt="">
                            </a>
                            <div class="desc">
                                <h3><a href="{{ route('categories.cat_product', $category) }}">{{ $category->name }}</a></h3>
                                <span class="price">{{ Str::limit($category->description, 80, '...') }}</span>
                            </div>
                            <div class="btns mt-4">
                                <a class="update" href="{{route('dashboard.edit', $category)}}">Edit</a>
                                <form action="{{route('categories.destroy', $category)}}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this resource?');">
                                    @csrf
                                    <button type="submit" class="delete">Delete</button>
                                </form>
                            </div>
                        </div>
                
                    @endforeach
                </div>
                {{$categories->links()}}
            </div>
        </div>
        <div class="categories">
            <h2 class="title">Products</h2>
            <div class="container">
                <div class="cards">
                    @foreach ($products as $product)
                    <div class="card">
                        <div class="img">
                            <img src="{{asset('storage/' . $product->img_path)}}" alt="">
                        </div>
                        <div class="desc">
                            <p>{{$product->name}}</p>
                            <p>{{$product->description}}</p>
                        </div>
                        <div class="btns mt-4">
                            <a class="update" href="{{route('dashboard.edit_product', $product)}}">Edit</a>
                            <form action="{{route('products.destroy', $product)}}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this resource?');">
                                @csrf
                                <button type="submit" class="delete">Delete</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
