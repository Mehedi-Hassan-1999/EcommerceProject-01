@extends('admin.master')

@section('title')
    Manage Product
@endsection

@section('content')

    <div class="col-12 grid-margin stretch-card mt-1">
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
                <h1 class="card-title text-center fs-1 fw-bold text-success">Manage Product table</h1>

                <div class="text-center mb-2">
                    <form action="{{ route('search.product') }}" method="get">
                        <input type="text" name="search" class="text-black" placeholder="Search Product">
                        <input type="submit" value="Search" class="btn btn-outline-primary">
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-white table-dark">
                        <thead>
                            <tr>
                                <th class="text-info">SL</th>
                                <th class="text-info">Product Name</th>
                                <th class="text-info">Product Code</th>
                                <th class="text-info">Category ID</th>
                                <th class="text-info">Category Name</th>
                                <th class="text-info">Brand ID</th>
                                <th class="text-info">Brand Name</th>
                                <th class="text-info">Price</th>
                                <th class="text-info">Discount</th>
                                <th class="text-info">Quantity</th>
                                <th class="text-info">Description</th>
                                <th class="text-info">Image</th>
                                <th class="text-info">Action</th>
                            </tr>
                        </thead>



                        <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_code }}</td>
                                <td>{{ $product->category_id }}</td>
                                <td>{{ $product->category_name }}</td>
                                <td>{{ $product->brand_name }}</td>
                                <td>{{ $product->brand_id }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->discount }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ substr($product->description,0,50)}}</td>

                                <td>
                                    <img src="{{ asset( $product->image ) }}" alt="" class="img-fluid">
                                </td>
                                <td>
                                    <a href="{{route('edit.product',['id'=>$product->id])}}" class="btn btn-sm btn-primary">Edit</a>

                                    <form action="{{ route('delete.product') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" onclick="return confirm('Are you sure delete this data?')" class="btn btn-sm btn-danger bg-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="13" class="text-center fs-4">
                                    No Data Found for this text..
                                </td>
                            </tr>

                        @endforelse
                        <span class="pt-4">
                            {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
                        </span>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
