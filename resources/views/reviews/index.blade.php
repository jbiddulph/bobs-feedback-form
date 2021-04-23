@inject('reviews', 'App\Http\Controllers\ReviewController')
<?php $avRating='';
  $avRating=$reviews->getAverageRating();?>
@extends('reviews.layout')

@section('content')
<div class="bobreviews justify-center">
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

    <div class="w-4/5 md:w-auto p-4">
        <div class="table-header-group font-bold p-8">
            <div class="table-cell p-2">No</div>
            <div class="table-cell p-2">Name</div>
            <div class="table-cell p-2">Phone number</div>
            <div class="table-cell p-2">Post Code</div>
            <div class="table-cell p-2">Job Number</div>
            <div class="table-cell p-2">Feedback</div>
            <div class="table-cell p-2">Rating</div>
            <div class="table-cell p-2">Status</div>
            <div class="table-cell p-2" width="280px">Action</div>
        </div>
        @foreach ($data as $key => $value)
        <div class="table-row-group p-2">
            <div class="table-cell p-2">{{ ++$i }}</div>
            <div class="table-cell p-2">{{ $value->fullName }}</div>
            <div class="table-cell p-2">{{ $value->phoneNumber }}</div>
            <div class="table-cell p-2">{{ $value->postCode }}</div>
            <div class="table-cell p-2">JC-{{ $value->jobNumber }}</div>
            <div class="table-cell p-2">{{ \Str::limit($value->feedback, 300) }}</div>
            <div class="table-cell p-2">{{ $value->rating }}</div>
            <div class="table-cell p-2">{{ $value->status }}</div>
            <div class="table-cell p-2">
                <form action="{{ route('reviews.destroy',$value->id) }}" method="POST">
                    <button class="btn btn-info bg-blue-400 p-1 rounded-md text-white text-xs font-bold"><a href="{{ route('reviews.show',$value->id) }}">Show</a></button>
                    <button class="btn btn-primary bg-yellow-400 p-1 rounded-md text-white text-xs font-bold"><a href="{{ route('reviews.edit',$value->id) }}">Edit</a></button>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger bg-red-400 p-1 rounded-md text-white text-xs font-bold">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    {!! $data->links() !!}
</div>
@endsection
