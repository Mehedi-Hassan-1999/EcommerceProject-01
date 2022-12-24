@extends('frontEnd.master')



@section('title')
    Product Details
@endsection

@section('content')

    <!-- Sweet-Alert section -->
    @include('sweetalert::alert')
    <!-- end SweetAlert section -->

    <div class="card mt-5">

        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{session()->get('message')}}
            </div>
        @endif

        <div class="row g-0 mb-3">
            <div class="col-md-5 mt-5">
                <img src="{{ asset($products->image) }}" class="img-fluid rounded-start" alt="...">
                <form action="{{ route('add.cart', $products->id) }}" method="post">
                    @csrf
                    <div class="row text-center mt-5">
                        <div class="col-3">
                            <input type="number" name="quantity" value="1" min="1"><br>
                            <input type="submit" value="Add to Cart">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h5 class="card-title"><span class="text-info">Product Name:</span>  {{$products->product_name}}</h5>
                    @if($products->discount!=null)
                        <p class="card-text"><span class="text-info">Price:</span>  ${{$products->price}}</p>
                        <p class="card-text"><span class="text-info">Discount:</span>  ${{$products->discount}}</p>
                    @else
                        <p class="card-text"><span class="text-info">Price:</span>  ${{$products->price}}</p>
                    @endif
                    <p class="card-text"><small class="text-muted"><span class="text-info">Category Name:</span>  {{$products->category_name}}</small></p>
                    <p class="card-text"><small class="text-muted"><span class="text-info">Brand Name:</span>  {{$products->brand_name}}</small></p>
                    <p class="card-text"><small class="text-muted"><span class="text-info">Product Code:</span>  {{$products->product_code}}</small></p>
                    <p class="card-text"><small class="text-muted"><span class="text-info">Quantity:</span>  {{$products->quantity}}</small></p>
                    <p class="card-text"><small class="text-muted"><span class="text-info">Description:</span>  {{$products->description}}</small></p>
                </div>
            </div>
        </div>
    </div>
@endsection
