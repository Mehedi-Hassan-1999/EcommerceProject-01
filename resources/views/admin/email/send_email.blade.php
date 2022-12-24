@extends('admin.master')

@section('title')
    Send to Mail
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
                <h1 class="card-title text-center fs-1 fw-bold text-warning">Send Mail Form</h1>
                <form class="forms-sample" action="{{ route('add.sendMail',['id'=>$orders->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="greeting">Greeting</label>
                        <input type="text" class="form-control text-light bg-dark" name="greeting" id="greeting" placeholder="Greeting">
                    </div>

                    <div class="form-group">
                        <label for="body">Body</label>
                        <input type="text" class="form-control text-light bg-dark" name="body" id="body" placeholder="Body">
                    </div>

                    <div class="form-group">
                        <label for="action_text">Action Text</label>
                        <input type="text" class="form-control text-light bg-dark" name="action_text" id="action_text" placeholder="Action Text">
                    </div>


                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" class="form-control text-light bg-dark" name="url" id="url" placeholder="Url">
                    </div>

                    <div class="form-group">
                        <label for="end_part">End Part</label>
                        <input type="text" class="form-control text-light bg-dark" name="end_part" id="end_part" placeholder="End Part">
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
