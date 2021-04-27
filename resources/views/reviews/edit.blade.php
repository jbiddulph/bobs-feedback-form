@extends('reviews.layout')
<style>
.submit-btn-primary {
    background-color: #3607FF;
    border-color: #3607FF;
    -webkit-box-shadow: 2px 2px 10px 2px rgb(131, 23, 224);
    box-shadow: 2px 2px 10px 2px rgb(131, 23, 224);
    width:210px;
    border-radius:14px!important;
    height:38px;
} 
</style>
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
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
            First Name
        </label>
        <input name="fullName" value="{{ $review->fullName }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="firstName" type="text" placeholder="First Name">
        </div>
        <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
            Phone Number
        </label>
        <input name="phoneNumber" value="{{ $review->phoneNumber }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="phoneNumber" type="text" placeholder="Phone Number">
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
            Post Code
        </label>
        <input name="postCode" value="{{ $review->postCode }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="postCode" type="text" placeholder="Post Code">
        </div>
        <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
            Job Number
        </label>
        <input name="jobNumber" value="{{ $review->jobNumber }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="jobNumber" type="text" placeholder="Job Number">
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
            Feedback
        </label>
        <textarea name="feedback" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="feedback">{{ $review->feedback }}</textarea>
        </div>  
    </div>  
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
            Rating
        </label>
            <select name="rating" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                <option value="1" {{ $review->rating == 1 ? 'selected' : '' }}>1</option>
                <option value="2" {{ $review->rating == 2 ? 'selected' : '' }}>2</option>
                <option value="3" {{ $review->rating == 3 ? 'selected' : '' }}>3</option>
                <option value="4" {{ $review->rating == 4 ? 'selected' : '' }}>4</option>
                <option value="5" {{ $review->rating == 5 ? 'selected' : '' }}>5</option>
            </select>
        </div>
        <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
            Status
        </label>
                <select id="status" name="status" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="Pending" {{ $review->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ $review->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
        </div>
    </div>  

    <div class="flex flex-wrap -mx-3 mb-6 ml-8">
        <button type="submit" class="btn submit-btn-primary rounded text-white">Submit</button>
    </div> 
    </form>
@endsection
