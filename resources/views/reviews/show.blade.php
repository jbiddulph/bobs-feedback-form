@extends('reviews.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Review</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('reviews.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Job Number:</strong>
                JC-{{ $review->jobNumber }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Full Name:</strong>
                {{ $review->fullName }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Phone Number:</strong>
                {{ $review->phoneNumber }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Postcode:</strong>
                {{ $review->postCode }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Rating:</strong>
                {{ $review->rating }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Feedback:</strong>
                {{ $review->feedback }}
            </div>
        </div>
    </div>
@endsection
