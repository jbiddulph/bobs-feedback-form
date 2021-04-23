@inject('reviews', 'App\Http\Controllers\ReviewController')
<?php $avRating='';
  $avRating=$reviews->getAverageRating();?>
@extends('reviews.layout')

@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Bob The Builder - Review</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('reviews.create') }}"> Create New Review</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <h3>Average rating <strong>{{ $avRating }}</strong></h3>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Phone number</th>
            <th>Post Code</th>
            <th>Job Number</th>
            <th>Feedback</th>
            <th>Rating</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->fullName }}</td>
            <td>{{ $value->phoneNumber }}</td>
            <td>{{ $value->postCode }}</td>
            <td>{{ $value->jobNumber }}</td>
            <td>{{ \Str::limit($value->feedback, 300) }}</td>
            <td>{{ $value->rating }}</td>
            <td>{{ $value->status }}</td>
            <td>
                <form action="{{ route('reviews.destroy',$value->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('reviews.show',$value->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('reviews.edit',$value->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $data->links() !!}
@endsection
