@extends('frontEnd.master')

@section('title')
    Show Order Details
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
                <h1 class="card-title text-center fs-1 fw-bold text-success">Show Order</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-white table-dark">
                        <thead>
                        <tr>
                            <th class="text-info">SL</th>
                            <th class="text-info">Product Name</th>
                            <th class="text-info">Product Code</th>
                            <th class="text-info">Price</th>
                            <th class="text-info">Quantity</th>
                            <th class="text-info">Payment Status</th>
                            <th class="text-info">Delivery Status</th>
                            <th class="text-info">Image</th>
                            <th class="text-info">Action</th>
                        </tr>
                        </thead>

                        @php $i=1 @endphp

                        <?php $total_price=0;  ?>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>{{ $order->product_code }}</td>
                                <td>S{{ $order->price }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td>{{ $order->delivery_status }}</td>

                                <td>
                                    <img src="{{ asset( $order->image ) }}" alt="" class="img-fluid" width="100px">
                                </td>
                                <td>
                                    @if($order->delivery_status=='processing')
                                        <a href="{{route('cancel.order',['id'=>$order->id])}}" onclick="return confirm('Are you sure to cancel this product')" class="btn btn-sm btn-danger bg-danger">Cancel Order</a>
                                    @else
                                        <h1 class="text-center text-warning">Not Allowed</h1>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        <span class="pt-4">
                            {!! $orders->withQueryString()->links('pagination::bootstrap-5') !!}
                        </span>
                        </tbody>

                    </table>
{{--                    <div>--}}
{{--                        <h1 class="text-center">--}}
{{--                            Total Price: S{{$total_price}}--}}
{{--                        </h1>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
