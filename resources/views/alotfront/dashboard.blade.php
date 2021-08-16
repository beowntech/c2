@extends('alotfront.layouts.header')
@section('content')
    <style>
        .emp-profile{
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
        }
        .profile-img{
            text-align: center;
        }
        .profile-img img{
            width: 70%;
            height: 100%;
        }
        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }
        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }
        .profile-head h5{
            color: #333;
        }
        .profile-head h6{
            color: #0062cc;
        }
        .profile-edit-btn{
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }
        .proile-rating{
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }
        .proile-rating span{
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }
        .profile-head .nav-tabs{
            margin-bottom:5%;
        }
        .profile-head .nav-tabs .nav-link{
            font-weight:600;
            border: none;
        }
        .profile-head .nav-tabs .nav-link.active{
            border: none;
            border-bottom:2px solid #0062cc;
        }
        .profile-work{
            padding: 14%;
            margin-top: -15%;
        }
        .profile-work p{
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }
        .profile-work a{
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }
        .profile-work ul{
            list-style: none;
        }
        .profile-tab label{
            font-weight: 600;
        }
        .profile-tab p{
            font-weight: 600;
            color: #0062cc;
        }
        .trash { color:rgb(209, 91, 71); }
        .flag { color:rgb(248, 148, 6); }
        .panel-body { padding:0px; }
        .panel-footer .pagination { margin: 0; }
        .panel .glyphicon,.list-group-item .glyphicon { margin-right:5px; }
        .panel-body .radio, .checkbox { display:inline-block;margin:0px; }
        .panel-body input[type=checkbox]:checked + label { text-decoration: line-through;color: rgb(128, 144, 160); }
        .list-group-item:hover, a.list-group-item:focus {text-decoration: none;background-color: rgb(245, 245, 245);}
        .list-group { margin-bottom:0px; }
    </style>
    <div class="container emp-profile shadow">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            {{Auth::user()->name}}
                            <a href="/edit-profile" class="profile-edit-btn" ><span class="badge badge-primary">Edit Profile</span></a>
                        </h5>
                        <h6>
                            {{Auth::user()->email}}
                        </h6>
                        <p class="proile-rating">Rating</p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#testimonials" role="tab" aria-controls="home" aria-selected="true">Testimonials</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="profile" aria-selected="false">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#booking" role="tab" aria-controls="profile" aria-selected="false">Bookings</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Wishlist"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>Links</p>
                        <a href="/reset-password">reset password</a><br/>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="testimonials" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row" id="noTest">
                                <div class="col" style="@if(!$test->isEmpty()) '' @else text-align: center @endif">
                                    @if(!$test->isEmpty())
                                    <div class="list-group">
                                        @foreach($test as $k =>$val)
                                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">{{Auth::user()->name}} <span class="badge border shadow-sm text-white" style="background-color: {{$val->stat[0]->color}};">{{$val->stat[0]->name}}</span></h5>
                                                    <small>{{ Carbon\Carbon::parse($val->created_at)->diffForHumans()}}</small>
                                                </div>
                                                <p class="mb-1">{{$val->content}}</p>
                                                <small>{{Auth::user()->email}}</small>
                                            </a>
                                        @endforeach
                                    </div>
                                    @else
                                    <h3 style="text-align: center">No Testimonials Yet</h3><br>
                                    <button type="button" class="btn btn-success" id="addTestNow">Add New</button>
                                    @endif
                                </div>
                            </div>
                            <div class="row" id="addTest" style="display: none">
                                <div class="col">
                                    <form action="/api/testimonial/add" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" class="form-control" name="id" value="{{Auth::user()->id}}">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Choose </label>
                                            <input type="file" class="form-control" name="imageFile">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Write Something About Us</label>
                                            <textarea class="form-control" name="testimonial" id="testimonial_input" rows="6">
                                        </textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" id="cancelTest" class="btn btn-primary">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="list-group">
                                @foreach($review as $k =>$val)
                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{Auth::user()->name}}</h5>
                                        <small>{{ Carbon\Carbon::parse($val->created_at)->diffForHumans()}}</small>
                                    </div>
                                    <p class="mb-1">{{$val->message}}</p>
                                    <small>{{Auth::user()->email}}</small>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="booking" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="list-group">
                                    @foreach($book as $k =>$val)
                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1 mr-4">{{$val->prop[0]->name}}<span class="badge border shadow-sm text-white ml-2" style="background-color: {{$val->stat[0]->color}};">{{$val->stat[0]->name}}</span></h5>
                                                <small>Booked {{ Carbon\Carbon::parse($val->created_at)->diffForHumans()}}</small>
                                            </div>
                                            <p class="mb-1">Price: ₹{{$val->price}}</p>
                                            <small>Room: {{$val->room[0]->name}}</small>
                                        </a>
                                    @endforeach
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
