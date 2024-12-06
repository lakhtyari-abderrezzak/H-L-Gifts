@extends('layouts.master')

@section('content')
    <x-nav />
    <div class="dashboard">
        <x-aside />
        {{-- Start Add Category --}}
    <div class="contact-from-section mt-150 mb-150 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="form-title">
                        <h2>Edit Category</h2>
                    </div>
                    <div class="contact-form">
                        <form action="{{route('categories.update', $categories)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="name" class="form-label">name</label>
                                <input type="text"
                                    class="form-control @error('name') border-danger 
                            @enderror"
                                    id="name" name="name" placeholder="Enter Category Name" value="{{$categories->name }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</>
                                    @enderror
                            </div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" style="resize: none"
                                rows="5">{{$categories->description}}</textarea>
                            </div>
                            <div >
                                <img src="{{asset('storage/' . $categories->img_path)}}" style="width : 150px; margin:15px 0;" alt="">
                            </div>
                            <div class="mb-3">
                                <label for="img_path">Upload Image</label>
                                <input type="file" name="img_path" id="img_path"  class="w-25">
                                @error('img_path')
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            <p class="mt-2"><input type="submit" class="form-btn" value="Update Category"></p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Add Category  --}}
    </div>
@endsection