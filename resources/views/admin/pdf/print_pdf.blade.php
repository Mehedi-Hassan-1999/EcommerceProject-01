<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Customer Bill</title>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="md-12 text-center">
            <h1 class="text-primary fw-bold">Unique Product Limited</h1>
            <p> Moghbazar Wireless, Dhaka, Bangladesh </p>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <img src="{{asset($order->image)}}" class="img-fluid ml-2" width="200px" alt="{{ $order->product_name }}">
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <p><span class="text-success">Customer Name:</span>  {{$order->customer_name}}</p>
            <p><span class="text-success">Customer Phone:</span>  {{$order->phone}}</p>
            <p><span class="text-success">Customer Email:</span>  {{$order->email}}</p>
            <p><span class="text-success">Customer Address:</span>  {{$order->address}}</p>
        </div>
        <div class="col-md-6">
            <p><span class="text-info">Product Name:</span>  {{$order->product_name}}</p>
            <p><span class="text-info">Product Code:</span>  {{$order->product_code}}</p>
            <p><span class="text-info">Quantity:</span>  {{$order->quantity}}</p>
            <p><span class="text-info">Total Price:</span>  {{$order->price}}</p>
            <p><span class="text-info">Payment Status:</span>  {{$order->payment_status}}</p>
            <p><span class="text-info">Order Date:</span>  {{$order->created_at}}</p>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h4><span class="text-secondary">Customer Signature:</span></h4>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

