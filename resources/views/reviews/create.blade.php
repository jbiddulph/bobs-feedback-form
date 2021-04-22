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
                Please select your overall experience with Bob the builder.
                <ul>
                    <li><img src="http://localhost/public/images/img/1.png" /><input type="radio" name="rating" value="1"></li>
                    <li><img src="/resources/img/2.png" /><input type="radio" name="rating" value="2"></li>
                    <li><img src="/resources/img/3.png" /><input type="radio" name="rating" value="3"></li>
                    <li><img src="/resources/img/4.png" /><input type="radio" name="rating" value="4"></li>
                    <li><img src="/resources/img/5.png" /><input type="radio" name="rating" value="5"></li>
                </ul>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
