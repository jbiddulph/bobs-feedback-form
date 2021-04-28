@inject('reviews', 'App\Http\Controllers\ReviewController')
<?php $ratingPercentage='';
  $ratingPercentage=$reviews->getRatingPercentage();?>

<?php $avRating='';
  $avRating=$reviews->getAverageRating();?>
@extends('reviews.layout')

<?php $ratingsByCount='';
    $ratingsByCount=$reviews->getRatingsByCount();?>


@section('content')
<div class="bobreviews flex-col justify-items-center">
    <div class="info flex-col">
        <div class="row mt-4">
            <div class="">
                <div class="pull-left my-4">
                    <h2>Bob The Builder - Review</h2>
                </div>
                <div class="pull-right my-4">
                    <a class="btn btn-success text-white bg-blue-500 p-2 rounded-md" href="{{ route('reviews.create') }}"> Create New Review</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <h3 class="mb-2">Rating 5:{{$ratingPercentage}}</h3>
        <h3 class="mb-2">Average rating <strong>{{ $avRating }}</strong></h3>
        <h3 class="mb-2">Ratings by count: </h3>
        @foreach ($ratingsByCount as $key => $value)
            <img src='{{asset(`images/$value->rating.png`)}}' /> ({{$value->count}})
        @endforeach
    </div>
    
    <table class="border-collapse w-full">
    <thead>
        <tr>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">ID</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Name</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Phone Number</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Post Code</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Job Number</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Feedback</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Rating</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Status</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($data as $key => $value)
        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ID</span>
                {{ ++$i }}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Name</span>
                {{ $value->fullName }}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Phone Number</span>
                {{ $value->phoneNumber }}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Post Code</span>
                {{ $value->postCode }}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Job Number</span>
                {{ $value->jobNumber }}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Feedback</span>
                {{ $value->feedback }}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Rating</span>
                {{ $value->rating }}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                {{ $value->status }}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                <form action="{{ route('reviews.destroy',$value->id) }}" method="POST">
                    <button class="btn btn-info bg-blue-400 p-1 rounded-md text-white text-xs font-bold"><a href="{{ route('reviews.show',$value->id) }}">Show</a></button>
                    <button class="btn btn-primary bg-yellow-400 p-1 rounded-md text-white text-xs font-bold"><a href="{{ route('reviews.edit',$value->id) }}">Edit</a></button>
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger bg-red-400 p-1 rounded-md text-white text-xs font-bold">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $data->links() !!}

</div>
@endsection
