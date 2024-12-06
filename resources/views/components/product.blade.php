@props(['product'])


<div class="card">
    <div >
        <div class="img">
            <a href="{{ route('products.show', $product) }}">
                <img src="{{ asset('storage/' . $product->img_path) }}" alt="">
            </a>
        </div>
        <div class="desc">
            <h3><a href="single.html">{{ $product->name }}</a></h3>
            <h4 class="price">€{{ $product->price }}</h4>
 
            <form action="{{ route('cart.addToCart', $product) }}" method="POST">
                @csrf
                <p>
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="number" name="quantity" value="1">
                    @error('quantity')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </p>
                <button type="submit" class="update">
                    <i class="fas fa-shopping-cart">Add</i>
                </button>
            </form>
        </div>
    </div>
</div>

