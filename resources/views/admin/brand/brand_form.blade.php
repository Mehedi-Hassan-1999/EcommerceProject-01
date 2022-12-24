@extends('admin.master')

@section('title')
    Add Brand
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

            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{session()->get('message')}}
                </div>
            @endif
            <h1 class="card-title text-center fs-1 fw-bold text-warning">Add Brand Form</h1>
            <form class="forms-sample" action="{{ route('add.brand') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="brand_name">Brand Name</label>
                    <input type="text" class="form-control text-light bg-dark" name="brand_name" id="brand_name" placeholder="Brand Name">
                </div>

                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-dark">Cancel</button>
            </form>
        </div>
    </div>
@endsection
