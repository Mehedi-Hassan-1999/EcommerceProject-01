@extends('admin.master')

@section('title')
    Edit Category
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
            <h1 class="card-title text-center fs-1 fw-bold text-warning">Edit Category Form</h1>
            <form class="forms-sample" action="{{ route('update.category') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $categories->id }}" name="category_id">
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="text" class="form-control text-light bg-dark" value="{{ $categories->category_name }}" name="category_name" id="category_name" placeholder="Category Name">
                </div>

                <button type="submit" class="btn btn-primary me-2">Saves as</button>
                <button class="btn btn-dark">Cancel</button>
            </form>
        </div>
    </div>
@endsection
