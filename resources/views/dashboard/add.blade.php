@extends('layouts.master')

@section('content')
    <x-nav>
    </x-nav>
    <div class="dashboard">
        <x-aside />
    {{-- Start Add Category --}}
    <div class="contact-from-section mt-150 mb-150 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="form-title">
                        <h2>Add a Category</h2>
                    </div>
                    <div class="contact-form">
                        <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">name</label>
                                <input type="text"
                                    class="form-control @error('name') border-danger 
                            @enderror"
                                    id="name" name="name" placeholder="Enter Category Name" value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</>
                                    @enderror
                            </div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" style="resize: none"
                                rows="5">{{old('description')}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="img_path">Upload Image</label>
                                <input type="file" name="img_path" id="img_path"  class="w-25">
                                @error('img_path')
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            <p class="mt-2"><input type="submit" class="form-btn" value="Add Product"></p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Add Category  --}}
    <!-- Start Add Product form -->
        <div class="contact-from-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="form-title">
                            <h2>Add a Product</h2>
                        </div>
                        <div class="contact-form">
                            <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">name</label>
                                    <input type="text"
                                        class="form-control @error('name') border-danger 
                                @enderror"
                                        id="name" name="name" placeholder="Enter Product Name" value="{{ old('name') }}">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text"
                                        class="form-control @error('price') border-danger
                                @enderror"
                                        name="price" id="price" placeholder="Enter Price">
                                    @error('price')
                                        <p class="text-danger">{{ $message }}</>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="text"
                                        class="form-control @error('quantity') border-danger
                                @enderror"
                                        name="quantity" id="quantity" placeholder="Enter Quantity">
                                    @error('quantity')
                                        <p class="text-danger">{{ $message }}</>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" style="resize: none"
                                    rows="5">{{old('description')}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="img_path">Upload Image</label>
                                    <input type="file" name="img_path" id="img_path"  class="w-25">
                                    @error('img_path')
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                    <label for="categories_id" class="form-label">Select Categories</label>
                                    <select class="form-control" name="categories_id" class="form-select w-25" >
                                        @foreach ($categories as $category)
                                            <option class="form-control" value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                <p class="mt-2"><input type="submit" value="Add Product"></p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- end Add Product form -->
    
    </div>
@endsection