@extends('admin.master')

@section('title')
    Add Product
@endsection

@section('content')

    <div class="col-12 grid-margin stretch-card mt-5">
        <div class="card mt-5">

            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{session()->get('message')}}
                </div>
            @endif

            <div class="card-body">
                <h1 class="card-title text-center fs-1 fw-bold text-warning">Add Product Form</h1>
                <form class="forms-sample" action="{{ route('add.product') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" class="form-control text-light bg-dark" name="product_name" id="product_name" placeholder="Product Name">
                    </div>

                    <div class="form-group">
                        <label for="product_code">Product Code</label>
                        <input type="text" class="form-control text-light bg-dark" name="product_code" id="product_code" placeholder="Product Code">
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category Name</label>
                        <select class="form-control text-light bg-dark" name="category_id" id="category_id">
                            <option value="" selected>Selected</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="brand_id">Brand Name</label>
                        <select class="form-control text-light bg-dark" name="brand_id" id="brand_id">
                            <option value="" selected>Selected</option>
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control text-light bg-dark" name="price" id="price" placeholder="Price">
                    </div>

                    <div class="form-group">
                        <label for="discount">Discount</label>
                        <input type="number" class="form-control text-light bg-dark" name="discount" id="discount" placeholder="Discount">
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" class="form-control text-light bg-dark" name="quantity" id="quantity" placeholder="Quantity">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control text-light bg-dark" name="description" id="description" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                            <input type="file" class="form-control text-light bg-dark" name="image" id="image" placeholder="Image">
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
