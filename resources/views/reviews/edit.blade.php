@extends('reviews.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Review</h2>
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

    <form action="{{ route('reviews.update',$review->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Full Name:</strong>
                    <input type="text" name="fullName" value="{{ $review->fullName }}" class="form-control" placeholder="Full Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Phone Number:</strong>
                    <input type="text" name="phoneNumber" value="{{ $review->phoneNumber }}" class="form-control" placeholder="Phone Number">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Postcode:</strong>
                    <input type="text" name="postCode" value="{{ $review->postCode }}" class="form-control" placeholder="Post Code">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Job Number:</strong>
                    <input type="text" name="jobNumber" value="JC-{{ $review->jobNumber }}" class="form-control" placeholder="Job Number">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Feedback:</strong>
                    <textarea class="form-control" style="height:150px" name="feedback" placeholder="Detail">{{ $review->feedback }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Rating:</strong>
                    <select name="rating" class="form-control">
                        <option value="1" {{ $review->rating == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $review->rating == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $review->rating == 3 ? 'selected' : '' }}>3</option>
                        <option value="4" {{ $review->rating == 4 ? 'selected' : '' }}>4</option>
                        <option value="5" {{ $review->rating == 5 ? 'selected' : '' }}>5</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select id="status" name="status" class="form-control">
                        <option value="Pending" {{ $review->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Live" {{ $review->status == 'Live' ? 'selected' : '' }}>Live</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
