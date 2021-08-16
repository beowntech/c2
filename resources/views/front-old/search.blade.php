@extends("front.layout.header2")
@section('content')
	<section class="dir-alp dir-pa-sp-top">
		<div class="container">
			<div class="row">
				<div class="dir-alp-tit">
					<h1>{{app('request')->input('query')}}</h1>
					<ol class="breadcrumb">
						<li><a href="#">Home</a>
						</li>
						<li><a href="#">Listing</a>
						</li>
						<li class="active">{{app('request')->input('search')}}</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="dir-alp-con">
					<div class="col-md-3 dir-alp-con-left">
						<div class="dir-alp-con-left-1">
							<h3>Nearby Colleges(07)</h3>
						</div>
						<div class="dir-hom-pre dir-alp-left-ner-notb">
							<ul>
{{--								<li>--}}
{{--									<a href="listing-details.html">--}}
{{--										<div class="list-left-near lln1">--}}
{{--											<img src="images/services/s1.jpg" alt="" />--}}
{{--										</div>--}}
{{--										<div class="list-left-near lln2">--}}
{{--											<h5>Property Getaways</h5>  <span>City: illunois, United States</span>--}}
{{--										</div>--}}
{{--										<div class="list-left-near lln3"> <span>5.0</span>--}}
{{--										</div>--}}
{{--									</a>--}}
{{--								</li>--}}
{{--								<li>--}}
{{--									<a href="listing-details.html">--}}
{{--										<div class="list-left-near lln1">--}}
{{--											<img src="images/services/s2.jpg" alt="" />--}}
{{--										</div>--}}
{{--										<div class="list-left-near lln2">--}}
{{--											<h5>Home Trends</h5>  <span>City: illunois, United States</span>--}}
{{--										</div>--}}
{{--										<div class="list-left-near lln3"> <span>4.0</span>--}}
{{--										</div>--}}
{{--									</a>--}}
{{--								</li>--}}
{{--								<li>--}}
{{--									<a href="listing-details.html">--}}
{{--										<div class="list-left-near lln1">--}}
{{--											<img src="images/services/s3.jpg" alt="" />--}}
{{--										</div>--}}
{{--										<div class="list-left-near lln2">--}}
{{--											<h5>Security System</h5>  <span>City: illunois, United States</span>--}}
{{--										</div>--}}
{{--										<div class="list-left-near lln3"> <span>4.4</span>--}}
{{--										</div>--}}
{{--									</a>--}}
{{--								</li>--}}
{{--								<li>--}}
{{--									<a href="listing-details.html">--}}
{{--										<div class="list-left-near lln1">--}}
{{--											<img src="images/services/s4.jpg" alt="" />--}}
{{--										</div>--}}
{{--										<div class="list-left-near lln2">--}}
{{--											<h5>Distance Educations</h5>  <span>City: illunois, United States</span>--}}
{{--										</div>--}}
{{--										<div class="list-left-near lln3"> <span>3.8</span>--}}
{{--										</div>--}}
{{--									</a>--}}
{{--								</li>--}}
{{--								<li>--}}
{{--									<a href="listing-details.html">--}}
{{--										<div class="list-left-near lln1">--}}
{{--											<img src="images/services/s5.jpg" alt="" />--}}
{{--										</div>--}}
{{--										<div class="list-left-near lln2">--}}
{{--											<h5>Fresh Cake Shops</h5>  <span>City: illunois, United States</span>--}}
{{--										</div>--}}
{{--										<div class="list-left-near lln3"> <span>4.8</span>--}}
{{--										</div>--}}
{{--									</a>--}}
{{--								</li>--}}
{{--								<li>--}}
{{--									<a href="listing-details.html">--}}
{{--										<div class="list-left-near lln1">--}}
{{--											<img src="images/services/s6.jpg" alt="" />--}}
{{--										</div>--}}
{{--										<div class="list-left-near lln2">--}}
{{--											<h5>Chicago Automobiles</h5>  <span>City: illunois, United States</span>--}}
{{--										</div>--}}
{{--										<div class="list-left-near lln3"> <span>5.0</span>--}}
{{--										</div>--}}
{{--									</a>--}}
{{--								</li>--}}
{{--								<li>--}}
{{--									<a href="listing-details.html">--}}
{{--										<div class="list-left-near lln1">--}}
{{--											<img src="images/services/s7.jpg" alt="" />--}}
{{--										</div>--}}
{{--										<div class="list-left-near lln2">--}}
{{--											<h5>Bike Service Centers</h5>  <span>City: illunois, United States</span>--}}
{{--										</div>--}}
{{--										<div class="list-left-near lln3"> <span>5.0</span>--}}
{{--										</div>--}}
{{--									</a>--}}
{{--								</li>--}}
							</ul>
						</div>
						<div class="dir-alp-l3 dir-alp-l-com">
							<h4>Sub Category Filter</h4>
							<div class="dir-alp-l-com1 dir-alp-p3">
								<form action="#">
									<ul>
                                        @foreach($categories as $k => $vl)
										<li>
											<input type="checkbox" id="scf1" />
											<label for="scf1">{{$vl[0]->name}}</label>
										</li>
                                        @endforeach
{{--										<li>--}}
{{--											<input type="checkbox" id="scf2" />--}}
{{--											<label for="scf2">Fitness Care</label>--}}
{{--										</li>--}}
										<li>
											<input type="checkbox" id="scf3" />
											<label for="scf3">Educations</label>
										</li>
{{--										<li>--}}
{{--											<input type="checkbox" id="scf4" />--}}
{{--											<label for="scf4">Property</label>--}}
{{--										</li>--}}
{{--										<li>--}}
{{--											<input type="checkbox" id="scf5" />--}}
{{--											<label for="scf5">Home Services</label>--}}
{{--										</li>--}}
									</ul>
								</form> <a href="#!" class="list-view-more-btn">view more</a>
							</div>
						</div>
{{--						<div class="dir-alp-l3 dir-alp-l-com">--}}
{{--							<h4>Distance</h4>--}}
{{--							<div class="dir-alp-l-com1 dir-alp-p3">--}}
{{--								<form>--}}
{{--									<ul>--}}
{{--										<li>--}}
{{--											<input class="with-gap" name="group1" type="radio" id="ldis1" />--}}
{{--											<label for="ldis1">00 to 02km</label>--}}
{{--										</li>--}}
{{--										<li>--}}
{{--											<input class="with-gap" name="group1" type="radio" id="ldis2" />--}}
{{--											<label for="ldis2">02 to 05km</label>--}}
{{--										</li>--}}
{{--										<li>--}}
{{--											<input class="with-gap" name="group1" type="radio" id="ldis3" />--}}
{{--											<label for="ldis3">05 to 10km</label>--}}
{{--										</li>--}}
{{--										<li>--}}
{{--											<input class="with-gap" name="group1" type="radio" id="ldis4" />--}}
{{--											<label for="ldis4">10 to 20km</label>--}}
{{--										</li>--}}
{{--										<li>--}}
{{--											<input class="with-gap" name="group1" type="radio" id="ldis5" />--}}
{{--											<label for="ldis5">20 to 30km</label>--}}
{{--										</li>--}}
{{--									</ul>--}}
{{--								</form> <a href="#!" class="list-view-more-btn">view more</a>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--						<div class="dir-alp-l3 dir-alp-l-com">--}}
{{--							<h4>Ratings</h4>--}}
{{--							<div class="dir-alp-l-com1 dir-alp-p3">--}}
{{--								<form>--}}
{{--									<ul>--}}
{{--										<li>--}}
{{--											<input type="checkbox" class="filled-in" id="lr1" />--}}
{{--											<label for="lr1"> <span class="list-rat-ch"> <span>5.0</span>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>--}}
{{--												</span>--}}
{{--											</label>--}}
{{--										</li>--}}
{{--										<li>--}}
{{--											<input type="checkbox" class="filled-in" id="lr2" />--}}
{{--											<label for="lr2"> <span class="list-rat-ch"> <span>4.0</span>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star-o" aria-hidden="true"></i>--}}
{{--												</span>--}}
{{--											</label>--}}
{{--										</li>--}}
{{--										<li>--}}
{{--											<input type="checkbox" class="filled-in" id="lr3" />--}}
{{--											<label for="lr3"> <span class="list-rat-ch"> <span>3.0</span>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star-o" aria-hidden="true"></i>  <i class="fa fa-star-o" aria-hidden="true"></i>--}}
{{--												</span>--}}
{{--											</label>--}}
{{--										</li>--}}
{{--										<li>--}}
{{--											<input type="checkbox" class="filled-in" id="lr4" />--}}
{{--											<label for="lr4"> <span class="list-rat-ch"> <span>2.0</span>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star-o" aria-hidden="true"></i>  <i class="fa fa-star-o" aria-hidden="true"></i>  <i class="fa fa-star-o" aria-hidden="true"></i>--}}
{{--												</span>--}}
{{--											</label>--}}
{{--										</li>--}}
{{--										<li>--}}
{{--											<input type="checkbox" class="filled-in" id="lr5" />--}}
{{--											<label for="lr5"> <span class="list-rat-ch"> <span>1.0</span>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star-o" aria-hidden="true"></i>  <i class="fa fa-star-o" aria-hidden="true"></i>  <i class="fa fa-star-o" aria-hidden="true"></i>  <i class="fa fa-star-o" aria-hidden="true"></i>--}}
{{--												</span>--}}
{{--											</label>--}}
{{--										</li>--}}
{{--									</ul>--}}
{{--								</form> <a href="#!" class="list-view-more-btn">view more</a>--}}
{{--							</div>--}}
{{--						</div>--}}
					</div>
					<div class="col-md-9 dir-alp-con-right">
						<div class="dir-alp-con-right-1">
							<div class="row">
                                @if($data->isEmpty())
                                    <h1 style="padding: 20px">No College Found According to Search</h1>
                                    @else
                                @foreach($data as $k => $val)
                                    @if($val->featured == 1)
								<div class="home-list-pop list-spac">
									<div class="col-md-3 list-ser-img">
										<img src="/property/logo/images/{{$val->logo}}" alt="" />
                                        <p style="position: absolute;
    top: 0;
    padding: 2px 20px;
    color: white;
    background: red;">Featured</p>
									</div>
									<div class="col-md-9 home-list-pop-desc inn-list-pop-desc"> <a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($val->cities[0]->name)))}}/{{$val->seo->permalink}}"><h3>{{$val->name}}</h3></a>
										<h4>{{substr($val->description,0,100)}}</h4>
										<p><b>Address:</b> {{$val->address}}, {{$val->cities[0]->name}}, {{$val->states[0]->name}}, {{$val->pincode}}</p>
										<div class="list-number">
											<ul>
												<!--<li>-->
												<!--	<img src="/front/images/icon/phone.png" alt="">{{$val->hotel_contact}}</li>-->
												<!--<li>-->
												<!--	<img src="/front/images/icon/mail.png" alt="">{{$val->email}}</li>-->
											</ul>
										</div><span class="home-list-pop-rat">4.2</span>
										<div class="list-enqu-btn">
											<ul>
												<li><a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($val->cities[0]->name)))}}/{{$val->seo->permalink}}#ld-rew"><i class="fa fa-star-o" aria-hidden="true"></i> Write Review</a>
                                                            </li>
                                                            <li><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a>
                                                            </li>
                                                            <li><button type="button" class="btn btn-danger openCompare" data-id="{{$val->id}}" data-name="{{$val->name}}" data-image="{{$val->logo}}"> Compare</button>
                                                            </li>
											</ul>
										</div>
									</div>
								</div>
                                        @else
                                            <div class="home-list-pop list-spac">
                                                <div class="col-md-3 list-ser-img">
                                                    <img src="/property/logo/images/{{$val->logo}}" alt="" />
                                                </div>
                                                <div class="col-md-9 home-list-pop-desc inn-list-pop-desc"> <a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($val->cities[0]->name)))}}/{{$val->seo->permalink}}"><h3>{{$val->name}}</h3></a>
                                                    <h4>{{substr($val->description,0,30)}}</h4>
                                                    <p><b>Address:</b> {{$val->address}}, {{$val->cities[0]->name}}, {{$val->states[0]->name}}, {{$val->pincode}}</p>
                                                    <div class="list-number">
                                                        <ul>
                                                            <!--<li>-->
                                                            <!--    <img src="/front/images/icon/phone.png" alt="">{{$val->hotel_contact}}</li>-->
                                                            <!--<li>-->
                                                            <!--    <img src="/front/images/icon/mail.png" alt="">{{$val->email}}</li>-->
                                                        </ul>
                                                    </div><span class="home-list-pop-rat">4.2</span>
                                                    <div class="list-enqu-btn">
                                                        <ul>
                                                            <li><a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($val->cities[0]->name)))}}/{{$val->seo->permalink}}#ld-rew"><i class="fa fa-star-o" aria-hidden="true"></i> Write Review</a>
                                                            </li>
                                                            <li><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a>
                                                            </li>
                                                            <li><button type="button" class="btn btn-danger openCompare" data-id="{{$val->id}}" data-name="{{$val->name}}" data-image="{{$val->logo}}"> Compare</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                @endforeach
                                @endif
							</div>
							<div class="row">
								<ul class="pagination list-pagenat">
									<li class="disabled"><a href="#!!"><i class="material-icons">chevron_left</i></a>
									</li>
									<li class="active"><a href="#!">1</a>
									</li>
									<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
{{--	<section class="web-app com-padd">--}}
{{--		<div class="container">--}}
{{--			<div class="row">--}}
{{--				<div class="col-md-6 web-app-img">--}}
{{--					<img src="images/mobile.png" alt="" />--}}
{{--				</div>--}}
{{--				<div class="col-md-6 web-app-con">--}}
{{--					<h2>Looking for the Best Service Provider? <span>Get the App!</span></h2>--}}
{{--					<ul>--}}
{{--						<li><i class="fa fa-check" aria-hidden="true"></i> Find nearby listings</li>--}}
{{--						<li><i class="fa fa-check" aria-hidden="true"></i> Easy service enquiry</li>--}}
{{--						<li><i class="fa fa-check" aria-hidden="true"></i> Listing reviews and ratings</li>--}}
{{--						<li><i class="fa fa-check" aria-hidden="true"></i> Manage your listing, enquiry and reviews</li>--}}
{{--					</ul> <span>We'll send you a link, open it on your phone to download the app</span>--}}
{{--					<form>--}}
{{--						<ul>--}}
{{--							<li>--}}
{{--								<input type="text" placeholder="+01" />--}}
{{--							</li>--}}
{{--							<li>--}}
{{--								<input type="number" placeholder="Enter mobile number" />--}}
{{--							</li>--}}
{{--							<li>--}}
{{--								<input type="submit" value="Get App Link" />--}}
{{--							</li>--}}
{{--						</ul>--}}
{{--					</form>--}}
{{--					<a href="#">--}}
{{--						<img src="images/android.png" alt="" />--}}
{{--					</a>--}}
{{--					<a href="#">--}}
{{--						<img src="images/apple.png" alt="" />--}}
{{--					</a>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	</section>--}}
@endsection
