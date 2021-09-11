<!DOCTYPE html>
<html lang="en">

<head>
	<title>Best College Finding Website - Admission Jockey</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:500,700" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}">
	<link href="{{asset('front/css/materialize.css')}}" rel="stylesheet">
	<link href="{{asset('front/css/style.css')}}" rel="stylesheet">
	<link href="{{asset('front/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('front/css/responsive.css')}}" rel="stylesheet">
	<!--[if lt IE 9]><script src="{{asset('front/js/html5shiv.js')}}"></script>
<script src="{{asset('front/js/respond.min.js')}}"></script><![endif]-->
    <style>
        .active {
            color: white !important;
            background: #ff5b00 !important;
            box-shadow: 0 0px 0px 0 rgb(0 0 0 / 0%), 0 0px 0px 0 rgb(0 0 0 / 0%), 0 0px 0px -0px rgb(0 0 0 / 0%);
        }
        .active:hover {
            background: #ff5b00 !important;
        }
        .inactive:hover {
            background: #eef6f9 !important;
        }
        .inactive {
            background: #eef6f9;
    color: black;
    box-shadow: 0 0px 0px 0 rgb(0 0 0 / 0%), 0 0px 0px 0 rgb(0 0 0 / 0%), 0 0px 0px -0px rgb(0 0 0 / 0%);
        }
    </style>
</head>

<body>
{{--	<div id="preloader">--}}
{{--		<div id="status">&nbsp;</div>--}}
{{--	</div>--}}
	<section class="i4-header">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="dir-ho-tl">
						<ul>
							<li>
								<a href="/">
									<img src="front/img/logo3.png" alt="">
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="dir-ho-tr">
						<ul>
							<li><a href="#">Register</a>
							</li>
							<li><a href="#">Sign In</a>
							</li>
							<li><a href="#"><i class="fa fa-plus" aria-hidden="true"></i> Add College</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container dir-ho-t-sp">
			<div class="row">
				<div class="dir-hr1 dir-cat-search">
					<div class="dir-ho-t-tit">
						<h1>Connect with the right<br>Admission Experts</h1>
						<p><a href="search">Search</a> Best College
							<br>Student ratings and reviews.</p>
					</div>
					<form class="cate-search-form" action="/search">
						<div class="input-field">
{{--							<input type="text" name="catg" id="select-category" class="autocomplete auto-category">--}}
                            <select class=" autocomplete auto-category" name="catg">
                                @foreach($catg as $c => $ca)
                                <option value="{{strtolower($ca->name)}}">{{$ca->name}}</option>
                                @endforeach
                            </select>
							<label for="select-category">Select Category</label>
						</div>
						<div class="input-field">
							<input type="text" name="search" id="select-search" class="autocomplete">
							<label for="select-search">Search College</label>
						</div>
						<div class="input-field">
							<input type="submit" value="search" class="waves-effect waves-light tourz-sear-btn">
						</div>
					</form>
				</div>
				<div class="h4-ser">
					<div class="com-title">
						<h2>Explore Our <span>Services</span></h2>
						<p>Explore some of the best Colleges from around the world from our partners and friends.</p>
					</div>
					<div class="cat-v3-hom-list">

					<ul>
						<li>
							<a href="#"><img src="front/images/icon/hcat1.png" alt=""> Find Best Colleges</a>
						</li>
						<li>
							<a href="#"><img src="front/images/icon/hcat2.png" alt=""> Find Education Loan</a>
						</li>
						<li>
							<a href="#"><img src="front/images/icon/hcat3.png" alt=""> Find Hostel</a>
						</li>
						<li>
							<a href="#"><img src="front/images/icon/hcat4.png" alt=""> Free Counceling By Expert</a>
						</li>
					</ul>
				</div>
				</div>

			</div>
		</div>
	</section>
	<section id="myID" class="bottomMenu hom3-top-menu">
		<div class="container top-search-main">
			<div class="row">
				<div class="ts-menu i4-top">
					<div class="ts-menu-1">
						<a href="index.php">
							<img src="front/img/eye-logo.png" alt="">
						</a>
					</div>
					<div class="ts-menu-2"><a href="#" class="t-bb">All <i class="fa fa-angle-down" aria-hidden="true"></i></a>
						<div class="cat-menu cat-menu-1">
							<div class="dz-menu">
							    @include('front.layout.menu')
								<!--<div class="dz-menu-inn">-->
								<!--	<h4>Frontend Pages</h4>-->
								<!--	<ul>-->
								<!--		<li><a href="index-1.html">Home 1</a>-->
								<!--		</li>-->
								<!--		<li><a href="index-2.html">Home 2</a>-->
								<!--		</li>-->
								<!--		<li><a href="index-3.html">Home 3</a>-->
								<!--		</li>-->
								<!--		<li><a href="index-4.html">Home 4</a>-->
								<!--		</li>-->
								<!--		<li><a href="list.html">All Listing</a>-->
								<!--		</li>-->
								<!--		<li><a href="listing-details.html">Listing Details </a>-->
								<!--		</li>-->
								<!--		<li><a href="price.html">Add Listing</a>-->
								<!--		</li>-->
								<!--		<li><a href="list-lead.html">Lead Listing</a>-->
								<!--		</li>-->
								<!--		<li><a href="list-grid.html">Listing Grid View</a>-->
								<!--		</li>-->
								<!--	</ul>-->
								<!--</div>-->
							</div>
							<div class="dir-home-nav-bot">
								<ul>
									<li>A few reasons you’ll love Online College Directory <span>Call us on: +01 6214 6548</span>
									</li>
									<!--<li><a href="advertise.html" class="waves-effect waves-light btn-large"><i class="fa fa-bullhorn"></i> Advertise with us</a>-->
									<!--</li>-->
									<!--<li><a href="db-listing-add.html" class="waves-effect waves-light btn-large"><i class="fa fa-bookmark"></i> Add your business</a>-->
									<!--</li>-->
								</ul>
							</div>
						</div>
					</div>
					<div class="ts-menu-3">
						<div class="">
							<form class="tourz-search-form tourz-top-search-form" action="/search" method="GET">
{{--								<div class="input-field">--}}
{{--									<input type="text" id="top-select-city" class="autocomplete">--}}
{{--									<label for="top-select-city">Enter city</label>--}}
{{--								</div>--}}
								<div class="input-field">
									<input type="text" id="top-select-search" name="search" class="autocomplete">
                                    <input type="hidden" value="College" name="catg">
									<label for="top-select-search" class="search-hotel-type">Search your services</label>
								</div>
								<div class="input-field">
									<input type="submit" value="" class="waves-effect waves-light tourz-top-sear-btn">
								</div>
							</form>
						</div>
					</div>
					<div class="ts-menu-4">
						<div class="v3-top-ri">
							<ul>
								<li><a href="#" class="v3-menu-sign"><i class="fa fa-sign-in"></i> Sign In</a>
								</li>
								<li><a href="#" class="v3-add-bus"><i class="fa fa-plus" aria-hidden="true"></i> Add Listing</a>
								</li>
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
							<li><a href="#!" data-toggle="modal" data-target="#">Register</a>
							</li>
							<li><a href="#!" data-toggle="modal" data-target="#">Sign In</a>
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
