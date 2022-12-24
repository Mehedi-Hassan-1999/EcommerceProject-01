@extends('admin.master')

@section('title')
    Manage Category
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
                <h1 class="card-title text-center fs-1 fw-bold text-success">Manage Category table</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-white table-dark">
                        <thead>
                        <tr>
                            <th class="text-info">SL</th>
                            <th class="text-info">Category Name</th>
                            <th class="text-info">Action</th>
                        </tr>
                        </thead>

                        @php $i=1 @endphp

                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    <a href="{{route('edit.category',['id'=>$category->id])}}" class="btn btn-sm btn-primary">Edit</a>

                                    <form action="{{ route('delete.category') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="category_id" value="{{ $category->id }}">
                                        <button type="submit" onclick="return confirm('Are you sure delete this data?')" class="btn btn-sm btn-danger bg-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
