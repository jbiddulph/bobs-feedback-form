@extends('reviews.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Review</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('reviews.index') }}"> Back</a>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
@endif
<form action="{{ route('reviews.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Full Name:</strong>
                    <input type="text" name="fullName" class="form-control" placeholder="Enter Full Name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Phone Number:</strong>
                    <input type="text" name="phoneNumber" class="form-control" placeholder="Enter Phone Number">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Post Code:</strong>
                    <input type="text" name="postCode" class="form-control" placeholder="Enter Post Code">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <strong>Job Number:</strong>
                    <input type="text" name="jobNumber" class="form-control" placeholder="Enter Job Number">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Feedback:</strong>
                    <textarea class="form-control" style="height:150px" name="feedback" placeholder="Enter Your Feedback"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-md-12">
            <p>Please select your overall experience with Bob the builder.</p>
                <label>
                    <input type="radio" name="rating" value="1">
                    <img src="{{asset('images/1.png')}}" />
                </label>
                <label>
                    <input type="radio" name="rating" value="2">
                    <img src="{{asset('images/2.png')}}" />
                </label>
                <label>
                    <input type="radio" name="rating" value="3">
                    <img src="{{asset('images/3.png')}}" />
                </label>
                <label>
                    <input type="radio" name="rating" value="4">
                    <img src="{{asset('images/4.png')}}" />
                </label>
                <label>
                    <input type="radio" name="rating" value="5">
                    <img src="{{asset('images/5.png')}}" />
                </label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
