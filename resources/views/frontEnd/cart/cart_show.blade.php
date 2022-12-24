@extends('frontEnd.master')

@section('title')
    Show cart
@endsection

@section('content')

    <!-- Sweet-Alert section -->
    @include('sweetalert::alert')
    <!-- end SweetAlert section -->

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
                <h1 class="card-title text-center text-success">Show Cart</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-white table-dark">
                        <thead>
                        <tr>
                            <th class="text-info">SL</th>
                            <th class="text-info">Product Name</th>
                            <th class="text-info">Product Code</th>
                            <th class="text-info">Price</th>
                            <th class="text-info">Quantity</th>
                            <th class="text-info">Image</th>
                            <th class="text-info">Action</th>
                        </tr>
                        </thead>

                        @php $i=1 @endphp

                        <?php $total_price=0;  ?>
                        <tbody>
                        @foreach($carts as $cart)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $cart->product_name }}</td>
                                <td>{{ $cart->product_code }}</td>
                                <td>S{{ $cart->price }}</td>
                                <td>{{ $cart->quantity }}</td>

                                <td>
                                    <img src="{{ asset( $cart->image ) }}" alt="" class="img-fluid" width="100px">
                                </td>
                                <td>
                                    <form action="{{ route('remove.cart') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                        <button type="submit" onclick="return confirm('Are you sure to remove this product')" class="btn btn-sm btn-danger bg-danger">Remove Cart</button>
                                    </form>
                                </td>
                            </tr>

                            <?php $total_price = $total_price + $cart->price ?>
                        @endforeach
                        </tbody>

                    </table>
                    <div>
                        <h1 class="text-center">
                            Total Price: S{{$total_price}}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 text-center">
        <h1 class="text-black mb-3"><b>Proceed to Order</b></h1>
        <a href="{{ route('cash.order') }}" class="btn bg-success"> Cash on Delivery</a>
        <a href="{{ route('stripe',$total_price) }}" class="btn bg-warning"> Pay using Card</a>
    </div>

@endsection
