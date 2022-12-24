@extends('admin.master')

@section('title')
    Manage Product Order
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
                <h1 class="card-title text-center fs-1 fw-bold text-success">Manage Product Order</h1>

                <div class="text-center mb-2">
                    <form action="{{ route('search.order') }}" method="get">
                        <input type="text" name="search" class="text-black" placeholder="Search Order">
                        <input type="submit" value="Search" class="btn btn-outline-primary">
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-white table-dark">
                        <thead>
                        <tr>
                            <th class="text-info">SL</th>
                            <th class="text-info">User ID</th>
                            <th class="text-info">Customer Name</th>
                            <th class="text-info">Phone</th>
                            <th class="text-info">Email</th>
                            <th class="text-info">Address</th>
                            <th class="text-info">Product ID</th>
                            <th class="text-info">Product Name</th>
                            <th class="text-info">Product Code</th>
                            <th class="text-info">Quantity</th>
                            <th class="text-info">Price</th>
                            <th class="text-info">Image</th>
                            <th class="text-info">Payment Status</th>
                            <th class="text-info">Delivery Status</th>
                            <th class="text-info">Action</th>
                            <th class="text-info">Print PDF</th>
                            <th class="text-info">Mail</th>
                        </tr>
                        </thead>

                        @php $i=1 @endphp

                        <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $order->user_id }}</td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->product_id }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>{{ $order->product_code }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->price }}</td>
                                <td>
                                    <img src="{{ asset( $order->image ) }}" alt="" class="img-fluid">
                                </td>
                                <td>{{ $order->payment_status }}</td>
                                <td>{{ $order->delivery_status }}</td>
                                <td>
                                    @if($order->delivery_status=='processing')
                                        <a href="{{route('delivered',['id'=>$order->id])}}" onclick="return confirm('Are you sure delete this data?')" class="btn btn-sm btn-primary">Delivered</a>
                                    @else
                                        <p class="text-warning">Delivered</p>
                                    @endif

                                    @if($order->delivery_status=='processing')
                                        <a href="{{route('canceled',['id'=>$order->id])}}" onclick="return confirm('Are you sure delete this data?')" class="btn btn-sm btn-info">Canceled</a>
                                    @else
                                        <p class="text-danger">Order Canceled</p>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('print.pdf',['id'=>$order->id]) }}" class="btn btn-sm btn-secondary">Print</a>
                                </td>
                                <td>
                                    <a href="{{ route('send.email',['id'=>$order->id]) }}" class="btn btn-success">Send Email</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="16" class="text-center fs-4">
                                    No Data Found for this text..
                                </td>
                            </tr>

                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
