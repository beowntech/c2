<!DOCTYPE html>
<html lang="en">

<head>
	<title>OkAdmission</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="{{asset('front/images/fav.ico')}}" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:500,700" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}">
	<link href="{{asset('front/css/materialize.css')}}" rel="stylesheet">
	<link href="{{asset('front/css/style.css')}}" rel="stylesheet">
	<link href="{{asset('front/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('front/css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css" integrity="sha512-MMojOrCQrqLg4Iarid2YMYyZ7pzjPeXKRvhW9nZqLo6kPBBTuvNET9DBVWptAo/Q20Fy11EIHM5ig4WlIrJfQw==" crossorigin="anonymous" />
	<!--[if lt IE 9]><script src="{{asset('front/js/html5shiv.js')}}"></script>
<script src="{{asset('front/js/respond.min.js')}}"></script><![endif]-->
    <style>
        .big-input{
            padding: 25px !important;
        }
    </style>
</head>
<body>
	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>
	<section class="bottomMenu dir-il-top-fix">
		<div class="container top-search-main">
			<div class="row">
				<div class="ts-menu">
					<div class="ts-menu-1">
						<a href="/">
							<img src="{{asset('front/img/eye-logo.png')}}" alt="">
						</a>
					</div>
					<div class="ts-menu-2"><a href="#" class="t-bb">All <i class="fa fa-angle-down" aria-hidden="true"></i></a>
						<div class="cat-menu cat-menu-1">
							<div class="dz-menu">
							@include('front.layout.menu')
							</div>
							<div class="dir-home-nav-bot">
								<ul>
									<li>A few reasons you’ll love Online Business Directory <span>Call us on: +01 6214 6548</span>
									</li>
									<li><a href="advertise.html" class="waves-effect waves-light btn-large"><i class="fa fa-bullhorn"></i> Advertise with us</a>
									</li>
									<li><a href="db-listing-add.html" class="waves-effect waves-light btn-large"><i class="fa fa-bookmark"></i> Add your business</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="ts-menu-3">
						<div class="">
							<form class="tourz-search-form tourz-top-search-form" action="/search">
{{--									<select class="form-control" name="city">--}}
{{--                                        @foreach($cities as $c => $val)--}}
{{--                                        <option value="{{strtolower($val[0]->name)}}">{{$val[0]->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
								<div class="input-field" style="width: 60%;">
                                    <input type="text" id="top-select-search" name="search" class="autocomplete">
{{--                                    <input type="hidden" value="College" name="catg">--}}
									<label for="top-select-search" class="search-hotel-type">Search your College/Exam</label>
								</div>
								<div class="input-field" style="width: 20%;">
									<input type="submit" class="waves-effect waves-light tourz-top-sear-btn">
								</div>
							</form>
						</div>
					</div>
					<div class="ts-menu-4">
						<div class="v3-top-ri">
							<ul>
{{--								<li><a href="login.html" class="v3-menu-sign"><i class="fa fa-sign-in"></i> Sign In</a>--}}
{{--								</li>--}}
{{--								<li><a href="db-listing-add.html" class="v3-add-bus"><i class="fa fa-plus" aria-hidden="true"></i> Add Listing</a>--}}
{{--								</li>--}}
							</ul>
						</div>
					</div>
					<div class="ts-menu-5"><span><i class="fa fa-bars" aria-hidden="true"></i></span>
					</div>
					<div class="mob-right-nav" data-wow-duration="0.5s">
						<div class="mob-right-nav-close"><i class="fa fa-times" aria-hidden="true"></i>
						</div>
						<h5>Business</h5>
						<ul class="mob-menu-icon">
							<li><a href="price.html">Add Business</a>
							</li>
							<li><a href="register.html">Register</a>
							</li>
							<li><a href="login.html">Sign In</a>
							</li>
						</ul>
						<h5>All Categories</h5>
						<ul>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Help Services</a>
							</li>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Appliances Repair & Services</a>
							</li>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Furniture Dealers</a>
							</li>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Packers and Movers</a>
							</li>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Pest Control </a>
							</li>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Solar Product Dealers</a>
							</li>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Interior Designers</a>
							</li>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Carpenters</a>
							</li>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Plumbing Contractors</a>
							</li>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Modular Kitchen</a>
							</li>
							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Internet Service Providers</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
@yield('content')
@include('front.layout.footer')
