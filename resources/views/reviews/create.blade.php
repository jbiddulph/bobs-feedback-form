@extends('reviews.layout')
<style>
/* HIDE RADIO */
[type=radio] {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
        }

        /* IMAGE STYLES */
        [type=radio] + img {
        cursor: pointer;
        }

        /* CHECKED STYLES */
        [type=radio]:checked + img {
            -webkit-box-shadow: 2px 2px 10px 2px rgba(0,0,0,0.3);
            box-shadow: 2px 2px 10px 2px rgba(0,0,0,0.3);
            padding:5px;
        }
        .submit-btn-primary {
            background-color: #3607FF;
            border-color: #3607FF;
            -webkit-box-shadow: 2px 2px 10px 2px rgb(131, 23, 224);
            box-shadow: 2px 2px 10px 2px rgb(131, 23, 224);
            width:210px;
            border-radius:14px!important;
            height:38px;
        }
        label.rating {
            margin-right:15px;
        }
        .submit-button {
            width:210px;
            border-radius:14px;
        }
        h2 {
            font-size: 30px;
            font-weight: bold;
            margin-bottom:20px;
        }
        p {
            font-size: 18px;
            margin-bottom:40px;
        }
        input {
            font-size:16px;
        }
        label {
            font-size:14px;
        }
        .alert-success {
            color: #337444;
            background-color: #dafdce;
            border-color: #54b665;
        }
        .ratings label{
            margin: 0 10px;
        }
        @media only screen and (max-width: 768px) {
            .feedback-form-holder {
                width: 100%;
            }
            .row {
                margin-bottom: 0;
            }
        }
</style>
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

<form class="w-full max-w-lg" action="{{ route('reviews.store') }}" method="POST">
    @csrf
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        First Name
      </label>
      <input name="fullName" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="firstName" type="text" placeholder="First Name">
    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
        Phone Number
      </label>
      <input name="phoneNumber" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="phoneNumber" type="text" placeholder="Phone Number">
    </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        Post Code
      </label>
      <input name="postCode" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="postCode" type="text" placeholder="Post Code">
    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
        Job Number
      </label>
      <input name="jobNumber" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="jobNumber" type="text" placeholder="Job Number">
    </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Feedback
      </label>
      <textarea name="feedback" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="feedback"></textarea>
    </div>
  </div>
  <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-md-12 flex ratings">
            <p class="flex-col ">Please select your overall experience with Bob the builder.</p>
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
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-4">
            <button type="submit" class="btn submit-btn-primary rounded text-white">Submit</button>
        </div>
    </div>
</form>









<!-- <form action="{{ route('reviews.store') }}" method="POST">
    @csrf -->

     <!-- <div class="row">
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
    </div> -->
    <!-- <div class="row">
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
</form> -->
@endsection
