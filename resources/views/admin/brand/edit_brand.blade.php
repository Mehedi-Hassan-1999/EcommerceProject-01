@extends('admin.master')

@section('title')
    Edit Brand
@endsection

@section('content')

    <style>
        .forms-sample{
            display:block;
            width:50%;
            margin:0 auto;
        }
    </style>

    <div class="col-12 grid-margin stretch-card mt-5">
        <div class="card mt-5">
            <h1 class="card-title text-center fs-1 fw-bold text-warning">Edit Brand Form</h1>
            <form class="forms-sample" action="{{ route('update.brand') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $brands->id }}" name="brand_id">
                <div class="form-group">
                    <label for="brand_name">Brand Name</label>
                    <input type="text" class="form-control text-light bg-dark" value="{{ $brands->brand_name }}" name="brand_name" id="brand_name" placeholder="Brand Name">
                </div>

                <button type="submit" class="btn btn-primary me-2">Saves as</button>
                <button class="btn btn-dark">Cancel</button>
            </form>
        </div>
    </div>
@endsection
