@extends('alotfront.layouts.header')
@section('content')
    <style>
        #auth-user .card0 {
            box-shadow: 0px 4px 8px 0px #757575;
            border-radius: 0px; }

        #auth-user .card2 {
            margin: 0px 40px; }

        #auth-user .image {
            width: 360px;
            height: 280px; }

        #auth-user .border-line {
            border-right: 1px solid #EEEEEE; }

        #auth-user .facebook {
            background-color: #3b5998;
            color: #fff;
            font-size: 18px;
            padding-top: 5px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer; }

        #auth-user .twitter {
            background-color: #1DA1F2;
            color: #fff;
            font-size: 18px;
            padding-top: 5px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer; }

        #auth-user .linkedin {
            background-color: #2867B2;
            color: #fff;
            font-size: 18px;
            padding-top: 5px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer; }

        #auth-user .line {
            height: 1px;
            width: 45%;
            background-color: #E0E0E0;
            margin-top: 10px; }

        #auth-user .or {
            width: 10%;
            font-weight: bold; }

        #auth-user .text-sm {
            font-size: 14px !important; }

        #auth-user ::placeholder {
            color: #BDBDBD;
            opacity: 1;
            font-weight: 300; }

        #auth-user :-ms-input-placeholder {
            color: #BDBDBD;
            font-weight: 300; }

        #auth-user ::-ms-input-placeholder {
            color: #BDBDBD;
            font-weight: 300; }

        #auth-user input,
        #auth-user textarea {
            padding: 10px 12px 10px 12px;
            border: 1px solid lightgrey;
            border-radius: 2px;
            margin-bottom: 5px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            color: #2C3E50;
            font-size: 14px;
            letter-spacing: 1px; }

        #auth-user input:focus,
        #auth-user textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #304FFE;
            outline-width: 0; }

        #auth-user button:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0; }

        #auth-user a {
            color: inherit;
            cursor: pointer; }

        #auth-user .btn-blue {
            background-color: #1A237E;
            width: 150px;
            color: #fff;
            border-radius: 2px; }

        #auth-user .btn-blue:hover {
            background-color: #000;
            cursor: pointer; }

        #auth-user .bg-blue {
            color: #fff;
            background-color: #1A237E; }

        @media screen and (max-width: 991px) {
            #auth-user .image {
                width: 300px;
                height: 220px; }
            #auth-user .border-line {
                border-right: none; }
            #auth-user .card2 {
                border-top: 1px solid #EEEEEE !important;
                margin: 0px 15px; } }
    </style>
    <div id="auth-user" class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="card card0 border-0">
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div class="card1 pb-5 self-align-center">

                        <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="https://i.imgur.com/uNGdWHi.png" class="image"> </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card2 card border-0 px-4 py-5">
                        <form action="/user/login" method="POST">
                        <div class="row px-3"> <label class="mb-1">
                                @csrf
                                <h6 class="mb-0 text-sm">Email Address</h6>
                            </label> <input class="mb-4" type="text" name="email" placeholder="Enter a valid email address"> </div>
                        <div class="row px-3"> <label class="mb-1">
                                <h6 class="mb-0 text-sm">Password</h6>
                            </label> <input type="password" name="password" placeholder="Enter password"> </div>
                        <div class="row px-3 mb-4">
                            <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">Remember me</label> </div> <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                        </div>
                        <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Login</button> </div>
                        <div class="row mb-4 px-3"> <small class="font-weight-bold">Don't have an account? <a class="text-danger " href="register.php">Register</a></small> </div>
                        </form>
                        @if($errors->any())
                            <span class="badge badge-danger" style="width: 100%;padding:3%">{{$errors->first()}}</span>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
