@extends("front.layout.header2")
@section('content')
<style>
/*.list-spac-1 {*/
/*    margin: 0px;*/
/*    width: 40%;*/
/*}*/
@media screen and (max-width: 992px)
.home-list-pop {
    margin: 0px;
    width: 100% !important;
}
</styLe>
<section>
	<div class="v3-list-ql">
		<div class="container">
			<div class="row">
				<div class="v3-list-ql-inn">
					<ul>
						<li class="active"><a href="#ld-abour"><i class="fa fa-user"></i> About</a>
						</li>
						<li><a href="#ld-ser"><i class="fa fa-cog"></i> Faculty</a>
						</li>
						<li><a href="#ld-gal"><i class="fa fa-photo"></i> Gallery</a>
						</li>
						<li><a href="#ld-roo"><i class="fa fa-ticket"></i> Courses</a>
						</li>
						<li><a href="#ld-vie"><i class="fa fa-street-view"></i> 360 View</a>
						</li>
						<li><a href="#ld-rew"><i class="fa fa-edit"></i> Write Review</a>
						</li>
						<li><a href="#ld-rer"><i class="fa fa-star-half-o"></i> User Review</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
@foreach($data as $k => $val)
<section class="pg-list-1" style="background: url('/property/images/{{json_decode($images[0]->images)[0]}}')">
	<div class="container">
		<div class="row">
			<div class="pg-list-1-left"> <a href="#"><h3>{{$val->name}}</h3></a>
				<div class="list-rat-ch"> <span>{{$review == 0 ? '0.0' : Str::limit($review, $limit = 3, $end = '')}}</span>
                    <input type="hidden" value="{{$rev = $review}}">
                    @foreach(range(1,5) as $i)
                        {{--                                <i class="far fa-star fa-stack-1x"></i>--}}
                        @if($review >0)
                            @if($review >0.5)
                                <i class="fa fa-star" aria-hidden="true"></i>
                            @else
                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                            @endif
                        @else
                            <i class="fa fa-star-o"></i>
                        @endif
                        @php $review--;@endphp
                    @endforeach
{{--                    <i class="fa fa-star" aria-hidden="true"></i>--}}
{{--                    <i class="fa fa-star" aria-hidden="true"></i>--}}
{{--                    <i class="fa fa-star" aria-hidden="true"></i>--}}
{{--                    <i class="fa fa-star" aria-hidden="true"></i>--}}
{{--                    <i class="fa fa-star" aria-hidden="true"></i>--}}
				</div>
				<h4>{{$city[0]->name}}, {{$state[0]->name}}</h4>
				<p><b>Address:</b> {{$val->address}}, {{$city[0]->name}}, {{$state[0]->name}}, {{$val->pincode}} </p>
				<div class="list-number pag-p1-phone">
					<ul>
						<li><i class="fa fa-phone" aria-hidden="true"></i> +91 {{$val->hotel_contact}}</li>
						<li><i class="fa fa-envelope" aria-hidden="true"></i> {{$val->email}}</li>
{{--						<li><i class="fa fa-user" aria-hidden="true"></i> johny depp</li>--}}
					</ul>
				</div>
			</div>
			<div class="pg-list-1-right">
				<div class="list-enqu-btn pg-list-1-right-p1">
					<ul>
						<li><a href="#ld-rew"><i class="fa fa-star-o" aria-hidden="true"></i> Write Review</a>
						</li>
						<!--<li><a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i> Send SMS</a>-->
						<!--</li>-->
						<li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a>
						</li>
						<li><a href="#" data-dismiss="modal" data-toggle="modal" data-target="#list-quo"> Apply Now</a>
						</li>
						<li><a href="#" class="openCompare" data-id="{{$val->id}}" data-name="{{$val->name}}" data-image="{{$val->logo}}"> Compare</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="list-pg-bg">
	<div class="container">
		<div class="row">
			<div class="com-padd">
				<div class="list-pg-lt list-page-com-p">
					<div class="pglist-p1 pglist-bg pglist-p-com" id="ld-abour">
						<div class="pglist-p-com-ti">
							<h3><span>About</span> {{$val->name}}</h3>
						</div>
						<div class="list-pg-inn-sp">
							<div class="share-btn">
								<ul>
									<li><a href="#"><i class="fa fa-facebook fb1"></i> Share On Facebook</a>
									</li>
									<li><a href="#"><i class="fa fa-twitter tw1"></i> Share On Twitter</a>
									</li>
									<li><a href="#"><i class="fa fa-google-plus gp1"></i> Share On Google Plus</a>
									</li>
								</ul>
							</div>
							<p>{{$val->description}}</p>
                        </div>
					</div>
					<div class="pglist-p2 pglist-bg pglist-p-com" id="ld-ser">
						<div class="pglist-p-com-ti">
							<h3><span>Faculty</span></h3>
						</div>
						<div class="list-pg-inn-sp">
{{--							<p>Taj Luxury Hotels & Resorts provide 24-hour Business Centre, Clinic, Internet Access Centre, Babysitting, Butler Service in Villas and Seaview Suite, House Doctor on Call, Airport Butler Service, Lobby Lounge</p>--}}
							<div class="row pg-list-ser">
								<ul>
                                    @foreach($teachers as $t => $te)
									<li class="col-md-4">
										<div class="pg-list-ser-p1">
											<img src="{{asset('images/teachers/'.$te->image)}}" alt="" />
										</div>
										<div class="pg-list-ser-p2">
											<h4>{{$te->name}}</h4>
										</div>
									</li>
                                    @endforeach
{{--									<li class="col-md-4">--}}
{{--										<div class="pg-list-ser-p1">--}}
{{--											<img src="{{asset('front/images/services/ser2.jpg')}}" alt="" />--}}
{{--										</div>--}}
{{--										<div class="pg-list-ser-p2">--}}
{{--											<h4>Room Booking</h4>--}}
{{--										</div>--}}
{{--									</li>--}}
{{--									<li class="col-md-4">--}}
{{--										<div class="pg-list-ser-p1">--}}
{{--											<img src="{{asset('front/images/services/ser3.jpg')}}" alt="" />--}}
{{--										</div>--}}
{{--										<div class="pg-list-ser-p2">--}}
{{--											<h4>Corporate Events</h4>--}}
{{--										</div>--}}
{{--									</li>--}}
{{--									<li class="col-md-4">--}}
{{--										<div class="pg-list-ser-p1">--}}
{{--											<img src="{{asset('front/images/services/ser4.jpg')}}" alt="" />--}}
{{--										</div>--}}
{{--										<div class="pg-list-ser-p2">--}}
{{--											<h4>Wedding Hall</h4>--}}
{{--										</div>--}}
{{--									</li>--}}
{{--									<li class="col-md-4">--}}
{{--										<div class="pg-list-ser-p1">--}}
{{--											<img src="{{asset('front/images/services/ser5.jpg')}}" alt="" />--}}
{{--										</div>--}}
{{--										<div class="pg-list-ser-p2">--}}
{{--											<h4>Travel & Transport</h4>--}}
{{--										</div>--}}
{{--									</li>--}}
{{--									<li class="col-md-4">--}}
{{--										<div class="pg-list-ser-p1">--}}
{{--											<img src="{{asset('front/images/services/ser6.jpg')}}" alt="" />--}}
{{--										</div>--}}
{{--										<div class="pg-list-ser-p2">--}}
{{--											<h4>All Amenities</h4>--}}
{{--										</div>--}}
{{--									</li>--}}
								</ul>
							</div>
						</div>
					</div>
					<div class="pglist-p3 pglist-bg pglist-p-com" id="ld-gal">
						<div class="pglist-p-com-ti">
							<h3><span>Photo</span> Gallery</h3>
						</div>
						<div class="list-pg-inn-sp">
							<div id="myCarousel" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
                                    @foreach(json_decode($images[0]->images) as $i => $va)
                                        @if($i == 0)
                                            <li data-target="#myCarousel" data-slide-to="{{$i}}" class="active"></li>
                                        @else
                                            <li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
                                        @endif
                                    @endforeach
								</ol>
								<div class="carousel-inner">
                                    @foreach(json_decode($images[0]->images) as $i => $va)
                                        @if($i == 0)
                                            <div class="item active">
                                                <img src="/property/images/{{$va}}" alt="Los Angeles">
                                            </div>
                                        @else
                                            <div class="item">
                                                <img src="/property/images/{{$va}}" alt="Los Angeles">
                                            </div>
                                        @endif
                                    @endforeach
								</div>
								<a class="left carousel-control" href="#myCarousel" data-slide="prev"> <i class="fa fa-angle-left list-slider-nav" aria-hidden="true"></i>
								</a>
								<a class="right carousel-control" href="#myCarousel" data-slide="next"> <i class="fa fa-angle-right list-slider-nav list-slider-nav-rp" aria-hidden="true"></i>
								</a>
							</div>
						</div>
					</div>
                    <!-- Room Start -->
					<div class="pglist-p3 pglist-bg pglist-p-com" id="ld-roo">
						<div class="pglist-p-com-ti">
							<h3><span>Courses</span></h3>
						</div>
						<div class="list-pg-inn-sp">
                            <div class="row">
                                @foreach($course as $c => $ca)
							<div class="home-list-pop col-md-5 list-spac list-spac-1 list-room-mar-o" >
								<div class="col-md-12 home-list-pop-desc inn-list-pop-desc list-room-deta"> <a href="#!"><h3>{{$ca->name}}</h3></a>
									<div class="list-room-type list-rom-ami">
										<ul>
											<li>
												<p><b>Fees: <i class="fa fa-rupee"></i>{{$ca->price}}</b>
												</p>
											</li>
											<li>
												@if($ca->months == 12)
                                                    1 Year
                                                @elseif($ca->months == 24)
                                                    2 Years
                                                @elseif($ca->months == 36)
                                                    3 Years
                                                @elseif($ca->months == 48)
                                                    4 Years
                                                @else
                                                    {{$ca->months}}
                                                @endif
                                            </li>
                                        </ul>
									</div>
									<div class="list-enqu-btn">
										<ul>
{{--											<li><a href="#!"><i class="fa fa-usd" aria-hidden="true"></i> Get Quotes</a>--}}
{{--											</li>--}}
{{--											<li><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i> Send SMS</a>--}}
{{--											</li>--}}
{{--											<li><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a>--}}
{{--											</li>--}}
											<li style="width: 100%;"><a href="#!"><i class="fa fa-rupee" aria-hidden="true"></i> Apply Now</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
                                @endforeach
                            </div>
{{--<div class="home-list-pop list-spac list-spac-1 list-room-mar-o">--}}
{{--								<div class="col-md-3">--}}
{{--									<img src="images/room/2.jpg" alt="">--}}
{{--								</div>--}}
{{--								<div class="col-md-9 home-list-pop-desc inn-list-pop-desc list-room-deta"> <a href="#!"><h3>Premium Rooms(Executive)</h3></a>--}}
{{--									<div class="list-rat-ch list-room-rati"> <span>4.0</span>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star-o" aria-hidden="true"></i>--}}
{{--									</div>--}}
{{--									<div class="list-room-type list-rom-ami">--}}
{{--										<ul>--}}
{{--											<li>--}}
{{--												<p><b>Amenities:</b>--}}
{{--												</p>--}}
{{--											</li>--}}
{{--											<li>--}}
{{--												<img src="images/icon/a7.png" alt="">Wi-Fi</li>--}}
{{--											<li>--}}
{{--												<img src="images/icon/a4.png" alt="">Air Conditioner</li>--}}
{{--											<li>--}}
{{--												<img src="images/icon/a3.png" alt="">Swimming Pool</li>--}}
{{--											<li>--}}
{{--												<img src="images/icon/a2.png" alt="">Bar</li>--}}
{{--											<li>--}}
{{--												<img src="images/icon/a5.png" alt="">Bathroom</li>--}}
{{--											<li>--}}
{{--												<img src="images/icon/a6.png" alt="">TV</li>--}}
{{--										</ul>--}}
{{--									</div><span class="home-list-pop-rat list-rom-pric">$620</span>--}}
{{--									<div class="list-enqu-btn">--}}
{{--										<ul>--}}
{{--											<li><a href="#!"><i class="fa fa-usd" aria-hidden="true"></i> Get Quotes</a>--}}
{{--											</li>--}}
{{--											<li><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i> Send SMS</a>--}}
{{--											</li>--}}
{{--											<li><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a>--}}
{{--											</li>--}}
{{--											<li><a href="#!"><i class="fa fa-usd" aria-hidden="true"></i> Book Now</a>--}}
{{--											</li>--}}
{{--										</ul>--}}
{{--									</div>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--							<div class="home-list-pop list-spac list-spac-1 list-room-mar-o">--}}
{{--								<div class="col-md-3">--}}
{{--									<img src="images/room/3.jpg" alt="">--}}
{{--								</div>--}}
{{--								<div class="col-md-9 home-list-pop-desc inn-list-pop-desc list-room-deta"> <a href="#!"><h3>Normal Rooms(Executive)</h3></a>--}}
{{--									<div class="list-rat-ch list-room-rati"> <span>3.0</span>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star-o" aria-hidden="true"></i>  <i class="fa fa-star-o" aria-hidden="true"></i>--}}
{{--									</div>--}}
{{--									<div class="list-room-type list-rom-ami">--}}
{{--										<ul>--}}
{{--											<li>--}}
{{--												<p><b>Amenities:</b>--}}
{{--												</p>--}}
{{--											</li>--}}
{{--											<li>--}}
{{--												<img src="images/icon/a7.png" alt="">Wi-Fi</li>--}}
{{--											<li>--}}
{{--												<img src="images/icon/a4.png" alt="">Air Conditioner</li>--}}
{{--											<li>--}}
{{--												<img src="images/icon/a3.png" alt="">Swimming Pool</li>--}}
{{--											<li>--}}
{{--												<img src="images/icon/a2.png" alt="">Bar</li>--}}
{{--										</ul>--}}
{{--									</div><span class="home-list-pop-rat list-rom-pric">$420</span>--}}
{{--									<div class="list-enqu-btn">--}}
{{--										<ul>--}}
{{--											<li><a href="#!"><i class="fa fa-usd" aria-hidden="true"></i> Get Quotes</a>--}}
{{--											</li>--}}
{{--											<li><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i> Send SMS</a>--}}
{{--											</li>--}}
{{--											<li><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a>--}}
{{--											</li>--}}
{{--											<li><a href="#!"><i class="fa fa-usd" aria-hidden="true"></i> Book Now</a>--}}
{{--											</li>--}}
{{--										</ul>--}}
{{--									</div>--}}
{{--								</div>--}}
{{--							</div>--}}
						</div>
					</div>
                    <!-- room End -->
{{--					<div class="pglist-p3 pglist-bg pglist-p-com" id="ld-vie">--}}
{{--						<div class="pglist-p-com-ti">--}}
{{--							<h3><span>360 </span> Degree View</h3>--}}
{{--						</div>--}}
{{--						<div class="list-pg-inn-sp list-360">--}}
{{--							<iframe src="https://www.google.com/maps/embed?pb=!1m0!4v1497026654798!6m8!1m7!1sIId_fF3cldIAAAQ7LuSTng!2m2!1d5.553927350344909!2d-0.2005543181775732!3f189.99!4f0!5f0.7820865974627469" allowfullscreen></iframe>--}}
{{--						</div>--}}
{{--					</div>--}}
					<div class="pglist-p3 pglist-bg pglist-p-com" id="ld-rew">
						<div class="pglist-p-com-ti">
							<h3><span>Write Your</span> Reviews</h3>
						</div>
						<div class="list-pg-inn-sp">
							<div class="list-pg-write-rev">
								<form class="col">
									<p>Writing great reviews may help others discover the places that are just apt for them. Here are a few tips to write a good review:</p>
									<div class="row">
										<div class="col s12">
											<fieldset class="rating">
												<input type="radio" id="star5" name="rating" value="5" />
												<label class="full" for="star5" title="Awesome - 5 stars"></label>
												<input type="radio" id="star4half" name="rating" value="4 and a half" />
												<label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
												<input type="radio" id="star4" name="rating" value="4" />
												<label class="full" for="star4" title="Pretty good - 4 stars"></label>
												<input type="radio" id="star3half" name="rating" value="3 and a half" />
												<label class="half" for="star3half" title="Meh - 3.5 stars"></label>
												<input type="radio" id="star3" name="rating" value="3" />
												<label class="full" for="star3" title="Meh - 3 stars"></label>
												<input type="radio" id="star2half" name="rating" value="2 and a half" />
												<label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
												<input type="radio" id="star2" name="rating" value="2" />
												<label class="full" for="star2" title="Kinda bad - 2 stars"></label>
												<input type="radio" id="star1half" name="rating" value="1 and a half" />
												<label class="half" for="star1half" title="Meh - 1.5 stars"></label>
												<input type="radio" id="star1" name="rating" value="1" />
												<label class="full" for="star1" title="Sucks big time - 1 star"></label>
												<input type="radio" id="starhalf" name="rating" value="half" />
												<label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
											</fieldset>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s6">
											<input id="re_name" type="text" class="validate">
											<label for="re_name">Full Name</label>
										</div>
										<div class="input-field col s6">
											<input id="re_mob" type="number" class="validate">
											<label for="re_mob">Mobile</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s6">
											<input id="re_mail" type="email" class="validate">
											<label for="re_mail">Email id</label>
										</div>
										<div class="input-field col s6">
											<input id="re_city" type="text" class="validate">
											<label for="re_city">City</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<textarea id="re_msg" class="materialize-textarea"></textarea>
											<label for="re_msg">Write review</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12"> <a class="waves-effect waves-light btn-large full-btn" href="#!">Submit Review</a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="pglist-p3 pglist-bg pglist-p-com" id="ld-rer">
						<div class="pglist-p-com-ti">
							<h3><span>User</span> Reviews</h3>
						</div>
						<div class="list-pg-inn-sp">
							<div class="lp-ur-all">
							<!--	<div class="lp-ur-all-left">-->
							<!--		<div class="lp-ur-all-left-1">-->
							<!--			<div class="lp-ur-all-left-11">Excellent</div>-->
							<!--			<div class="lp-ur-all-left-12">-->
							<!--				<div class="lp-ur-all-left-13"></div>-->
							<!--			</div>-->
							<!--		</div>-->
							<!--		<div class="lp-ur-all-left-1">-->
							<!--			<div class="lp-ur-all-left-11">Good</div>-->
							<!--			<div class="lp-ur-all-left-12">-->
							<!--				<div class="lp-ur-all-left-13 lp-ur-all-left-Good"></div>-->
							<!--			</div>-->
							<!--		</div>-->
							<!--		<div class="lp-ur-all-left-1">-->
							<!--			<div class="lp-ur-all-left-11">Satisfactory</div>-->
							<!--			<div class="lp-ur-all-left-12">-->
							<!--				<div class="lp-ur-all-left-13 lp-ur-all-left-satis"></div>-->
							<!--			</div>-->
							<!--		</div>-->
							<!--		<div class="lp-ur-all-left-1">-->
							<!--			<div class="lp-ur-all-left-11">Below Average</div>-->
							<!--			<div class="lp-ur-all-left-12">-->
							<!--				<div class="lp-ur-all-left-13 lp-ur-all-left-below"></div>-->
							<!--			</div>-->
							<!--		</div>-->
							<!--		<div class="lp-ur-all-left-1">-->
							<!--			<div class="lp-ur-all-left-11">Below Average</div>-->
							<!--			<div class="lp-ur-all-left-12">-->
							<!--				<div class="lp-ur-all-left-13 lp-ur-all-left-poor"></div>-->
							<!--			</div>-->
							<!--		</div>-->
							<!--	</div>-->
								<div class="lp-ur-all-right">
									<h5>Overall Ratings</h5>
									<p><span>{{$rev}} <i class="fa fa-star" aria-hidden="true"></i></span> based on {{$reviews->count()}} reviews</p>
								</div>
							</div>
							<div class="lp-ur-all-rat">
								<h5>Reviews</h5>
								<ul>
                                    @foreach($reviews as $r => $re)
									<li>
										<div class="lr-user-wr-img">
											<img src="{{asset('front/images/users/2.png')}}" alt="">
										</div>
										<div class="lr-user-wr-con">
											<h6>{{$re->user[0]->name}} <span>{{$re->avg('stars')}} <i class="fa fa-star" aria-hidden="true"></i></span></h6>  <span class="lr-revi-date">{{date('d F,Y',strtotime($re->created_at))}}</span>
											<p>{{$re->message}}</p>
											<ul>
												<li><a href="#!"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
												</li>
												<li><a href="#!"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
												</li>
												<li><a href="#!"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a>
												</li>
												<li><a href="#!"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a>
												</li>
{{--												<li><a href="#!"><span>Share Now</span> <i class="fa fa-facebook" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
											</ul>
										</div>
									</li>
                                    @endforeach
{{--									<li>--}}
{{--										<div class="lr-user-wr-img">--}}
{{--											<img src="images/users/3.png" alt="">--}}
{{--										</div>--}}
{{--										<div class="lr-user-wr-con">--}}
{{--											<h6>Gabriel Elijah <span>5.0 <i class="fa fa-star" aria-hidden="true"></i></span></h6>  <span class="lr-revi-date">21th July, 2016</span>--}}
{{--											<p>The hotel is clean, convenient and good value for money. Staff are courteous and helpful. However, they need more training to be efficient.</p>--}}
{{--											<ul>--}}
{{--												<li><a href="#!"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><span>Share Now</span> <i class="fa fa-facebook" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--											</ul>--}}
{{--										</div>--}}
{{--									</li>--}}
{{--									<li>--}}
{{--										<div class="lr-user-wr-img">--}}
{{--											<img src="images/users/4.png" alt="">--}}
{{--										</div>--}}
{{--										<div class="lr-user-wr-con">--}}
{{--											<h6>Luke Mason <span>4.2 <i class="fa fa-star" aria-hidden="true"></i></span></h6>  <span class="lr-revi-date">21th March, 2018</span>--}}
{{--											<p>Too much good experience with hospitality, cleanliness, facility and privacy and good value for money... To keep mind relaxing... Keep it up...</p>--}}
{{--											<ul>--}}
{{--												<li><a href="#!"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><span>Share Now</span> <i class="fa fa-facebook" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--											</ul>--}}
{{--										</div>--}}
{{--									</li>--}}
{{--									<li>--}}
{{--										<div class="lr-user-wr-img">--}}
{{--											<img src="images/users/5.png" alt="">--}}
{{--										</div>--}}
{{--										<div class="lr-user-wr-con">--}}
{{--											<h6>Kevin Jack <span>3.6 <i class="fa fa-star" aria-hidden="true"></i></span></h6>  <span class="lr-revi-date">21th Aug, 2018</span>--}}
{{--											<p>I am deaf. Bar is closed and Restaurant is okay ... It should be more decoration as beautiful. I enjoyed swimming top floor and weather is good</p>--}}
{{--											<ul>--}}
{{--												<li><a href="#!"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><span>Share Now</span> <i class="fa fa-facebook" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--											</ul>--}}
{{--										</div>--}}
{{--									</li>--}}
{{--									<li>--}}
{{--										<div class="lr-user-wr-img">--}}
{{--											<img src="images/users/1.png" alt="">--}}
{{--										</div>--}}
{{--										<div class="lr-user-wr-con">--}}
{{--											<h6>Nicholas Tyler <span>4.4 <i class="fa fa-star" aria-hidden="true"></i></span></h6>  <span class="lr-revi-date">21th Aug, 2018</span>--}}
{{--											<p>Overall, it was good experience. Rooms were spacious and they were kept very clean and tidy. Room service was good.</p>--}}
{{--											<ul>--}}
{{--												<li><a href="#!"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><span>Share Now</span> <i class="fa fa-facebook" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--												<li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a>--}}
{{--												</li>--}}
{{--											</ul>--}}
{{--										</div>--}}
{{--									</li>--}}
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="list-pg-rt">
					<div class="pglist-p3 pglist-bg pglist-p-com">
						<div class="pglist-p-com-ti pglist-p-com-ti-right">
							<h3><span>Send</span> Enquiry</h3>
						</div>
						<div class="list-pg-inn-sp">
							<div class="list-pg-guar">
								<!--<ul>-->
								<!--	<li>-->
								<!--		<div class="list-pg-guar-img">-->
								<!--			<img src="images/icon/g1.png" alt="" />-->
								<!--		</div>-->
								<!--		<h4>Service Guarantee</h4>-->
								<!--		<p>Upto 6 month of service</p>-->
								<!--	</li>-->
								<!--	<li>-->
								<!--		<div class="list-pg-guar-img">-->
								<!--			<img src="images/icon/g2.png" alt="" />-->
								<!--		</div>-->
								<!--		<h4>Professionals</h4>-->
								<!--		<p>100% certified professionals</p>-->
								<!--	</li>-->
								<!--	<li>-->
								<!--		<div class="list-pg-guar-img">-->
								<!--			<img src="images/icon/g3.png" alt="" />-->
								<!--		</div>-->
								<!--		<h4>Insurance</h4>-->
								<!--		<p>Upto $5,000 against damages</p>-->
								<!--	</li>-->
								<!--</ul> -->
								<a class="waves-effect waves-light btn-large full-btn list-pg-btn" href="#!" data-dismiss="modal" data-toggle="modal" data-target="#list-quo">Quick Enquiry</a>
							</div>
						</div>
					</div>
					<!--<div class="pglist-p3 pglist-bg pglist-p-com">-->
					<!--	<div class="pg-list-user-pro">-->
					<!--		<img src="images/users/8.png" alt="">-->
					<!--	</div>-->
					<!--	<div class="list-pg-inn-sp">-->
					<!--		<div class="list-pg-upro">-->
					<!--			<h5>Kevin Jack</h5>-->
					<!--			<p>Member since July 2017</p><a class="waves-effect waves-light btn-large full-btn list-pg-btn" href="#!">Contact User</a>-->
					<!--		</div>-->
					<!--	</div>-->
					<!--</div>-->
					<!--<div class="pglist-p3 pglist-bg pglist-p-com">-->
					<!--	<div class="pglist-p-com-ti pglist-p-com-ti-right">-->
					<!--		<h3><span>Our</span> Location</h3>-->
					<!--	</div>-->
					<!--	<div class="list-pg-inn-sp">-->
					<!--		<div class="list-pg-map">-->
					<!--			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6290413.804893654!2d-93.99620524741552!3d39.66116578737809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880b2d386f6e2619%3A0x7f15825064115956!2sIllinois%2C+USA!5e0!3m2!1sen!2sin!4v1469954001005" allowfullscreen></iframe>-->
					<!--		</div>-->
					<!--	</div>-->
					<!--</div>-->
{{--					<div class="pglist-p3 pglist-bg pglist-p-com">--}}
{{--						<div class="pglist-p-com-ti pglist-p-com-ti-right">--}}
{{--							<h3><span>Other</span> Informations</h3>--}}
{{--						</div>--}}
{{--						<div class="list-pg-inn-sp">--}}
{{--							<div class="list-pg-oth-info">--}}
{{--								<ul>--}}
{{--									<li>Today Shop <span class="green-bg">open</span>--}}
{{--									</li>--}}
{{--									<li>Experience <span>16</span>--}}
{{--									</li>--}}
{{--									<li>Parking <span>yes</span>--}}
{{--									</li>--}}
{{--									<li>Smoking <span>yes</span>--}}
{{--									</li>--}}
{{--									<li>Pool Table <span>yes</span>--}}
{{--									</li>--}}
{{--									<li>Take Out <span>yes</span>--}}
{{--									</li>--}}
{{--									<li>Good for Groups <span>yes</span>--}}
{{--									</li>--}}
{{--									<li>Accepts All Cards <span>yes</span>--}}
{{--									</li>--}}
{{--									<li>Open Time <span>09:00am</span>--}}
{{--									</li>--}}
{{--									<li>Close Time <span>10:00pm</span>--}}
{{--									</li>--}}
{{--								</ul>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</div>--}}
					<div class="list-mig-like">
						<div class="list-ri-spec-tit">
							<h3><span>You might</span> like this</h3>
						</div>
                        @foreach($related as $r => $rel)
                            @if($rel->id !== $val->id)
						<a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($rel->cities[0]->name)))}}/{{$rel->seo->permalink}}">
							<div class="list-mig-like-com">
								<div class="list-mig-lc-img">
									<img style="height: 210px;" src="/property/images/{{json_decode($rel->images[0]->images)[0]}}" alt="" /> <span class="home-list-pop-rat list-mi-pr">{{$rel->catg[0]->name}}</span>
								</div>
								<div class="list-mig-lc-con">
									<div class="list-rat-ch list-room-rati"> <span>{{!$rel->review->isEmpty() ? $rel->review->avg('stars') : "0.0"}}</span>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star-o" aria-hidden="true"></i>
									</div>
									<h5>{{$rel->name}}</h5>
									<p>{{$rel->state[0]->name}}</p>
								</div>
							</div>
						</a>
                            @endif
                        @endforeach
{{--						<a href="#!">--}}
{{--							<div class="list-mig-like-com">--}}
{{--								<div class="list-mig-lc-img">--}}
{{--									<img src="/front/images/listing/2.jpg" alt="" /> <span class="home-list-pop-rat list-mi-pr">$420</span>--}}
{{--								</div>--}}
{{--								<div class="list-mig-lc-con">--}}
{{--									<div class="list-rat-ch list-room-rati"> <span>3.0</span>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star-o" aria-hidden="true"></i>  <i class="fa fa-star-o" aria-hidden="true"></i>--}}
{{--									</div>--}}
{{--									<h5>InterContinental</h5>--}}
{{--									<p>Illinois City,</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</a>--}}
{{--						<a href="#!">--}}
{{--							<div class="list-mig-like-com">--}}
{{--								<div class="list-mig-lc-img">--}}
{{--									<img src="/front/images/listing/3.jpg" alt="" /> <span class="home-list-pop-rat list-mi-pr">$380</span>--}}
{{--								</div>--}}
{{--								<div class="list-mig-lc-con">--}}
{{--									<div class="list-rat-ch list-room-rati"> <span>5.0</span>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>--}}
{{--									</div>--}}
{{--									<h5>Staybridger Suites</h5>--}}
{{--									<p>Illinois City,</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</a>--}}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endforeach
@endsection
