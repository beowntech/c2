@extends("front.layout.header")
@section('content')
   <div class="container">
        <div class="row">
            <div class="com-title">
                <h2>Choose your <span>Future</span></h2>
                <p>Explore some of the best business from around the world from our partners and friends.</p>
            </div>
            <div style="text-align-last: center;">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn active" id="college_service">Colleges</button>
                    <button type="button" class="btn inactive" id="exam_service">Exams</button>
                    <button type="button" class="btn inactive" id="location_service">Location</button>
                </div>
            </div>
            <div class="cat-v2-hom-list" id="service1">
                <ul>
                    @foreach($fcatg as $c => $ca)
                    <li>
                        <a href="/search?catg={{strtolower($ca->name)}}"><img style="width: 70%;
    height: 103px;" src="/front/images/future/{{$ca->image}}" alt=""> {{$ca->name}}
                            <p>{{$ca->property}} Colleges</p>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="cat-v2-hom-list" id="service2" style="display:none;">
                <ul>
                    @foreach($fcatg as $c => $ca)
                        <li>
                            <a href="/search?catg={{strtolower($ca->name)}}"><img style="width: 70%;
    height: 103px;" src="/front/images/future/{{$ca->image}}" alt=""> {{$ca->name}}
                                <p>{{$ca->property}} Exams</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="cat-v2-hom-list" id="service3" style="display:none;">
                <ul>
                        <li>
                            <a href="#"><img src="front/images/sm/delhi-icon.png" style="width: 100% !important;" alt=""> Delhi
                                <!--<p>{{$ca->property}} Exams</p>-->
                            </a>
                        </li>
                        <li>
                            <a href="#"><img src="front/images/sm/delhi-icon.png" style="width: 100% !important;" alt=""> Uttar Pradesh
                                <!--<p>{{$ca->property}} Exams</p>-->
                            </a>
                        </li>
                        <li>
                            <a href="#"><img src="front/images/sm/delhi-icon.png" style="width: 100% !important;" alt=""> Uttrakhand
                                <!--<p>{{$ca->property}} Exams</p>-->
                            </a>
                        </li>
                        <li>
                            <a href="#"><img src="front/images/sm/delhi-icon.png" style="width: 100% !important;" alt=""> Maharashtra
                                <!--<p>{{$ca->property}} Exams</p>-->
                            </a>
                        </li>
                        <li>
                            <a href="#"><img src="front/images/sm/delhi-icon.png" style="width: 100% !important;" alt=""> Kerala
                                <!--<p>{{$ca->property}} Exams</p>-->
                            </a>
                        </li>
                </ul>
            </div>
        </div>
    </div>

{{--    <section class="com-padd quic-book-ser-full">--}}
{{--        <div class="quic-book-ser">--}}
{{--            <div class="quic-book-ser-inn">--}}
{{--                <div class="quic-book-ser-left">--}}
{{--                    <div class="land-com-form">--}}
{{--                        <h2>Quick service request</h2>--}}
{{--                        <form>--}}
{{--                            <ul>--}}
{{--                                <li>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="input-field col s12">--}}
{{--                                            <input type="text" class="validate" required>--}}
{{--                                            <label>Name</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="input-field col s12">--}}
{{--                                            <input type="number" class="validate" required>--}}
{{--                                            <label>Phone number</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="input-field col s12">--}}
{{--                                            <input type="email" class="validate" required>--}}
{{--                                            <label>Email id</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="input-field col s12">--}}
{{--                                            <input type="text" id="select-category1" class="autocomplete auto-category">--}}
{{--                                            <label for="select-category1">Select your Service</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="input-field col s12">--}}
{{--                                            <input type="submit" value="Send Request">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <p>Praesent felis velit, maximus at dapibus semper, fermentum sagittis diam. <a href="#">Privacy Policy</a>--}}
{{--                                    </p>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="quic-book-ser-right">--}}
{{--                    <div class="hom-cre-acc-left">--}}
{{--                        <h3>What service do you need? <span>Business Directory</span></h3>--}}
{{--                        <p>Tell us more about your requirements so that we can connect you to the right service provider.</p>--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <img src="images/icon/7.png" alt="">--}}
{{--                                <div>--}}
{{--                                    <h5>Tell us more about your requirements</h5>--}}
{{--                                    <p>Imagine you have made your presence online through a local online directory, but your competitors have..</p>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <img src="images/icon/5.png" alt="">--}}
{{--                                <div>--}}
{{--                                    <h5>We connect with right service provider</h5>--}}
{{--                                    <p>Advertising your business to area specific has many advantages. For local businessmen, it is an opportunity..</p>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <img src="images/icon/1.png" alt="">--}}
{{--                                <div>--}}
{{--                                    <h5>Happy with our service</h5>--}}
{{--                                    <p>Your local business too needs brand management and image making. As you know the local market..</p>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!--BEST THINGS-->--}}
{{--    <section class="com-padd com-padd-redu-bot">--}}
{{--        <div class="container dir-hom-pre-tit">--}}
{{--            <div class="row">--}}
{{--                <div class="com-title">--}}
{{--                    <h2>Top Trendings for <span>your City</span></h2>--}}
{{--                    <p>Explore some of the best tips from around the world from our partners and friends.</p>--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <div>--}}
{{--                        <!--POPULAR LISTINGS-->--}}
{{--                        <div class="home-list-pop">--}}
{{--                            <!--POPULAR LISTINGS IMAGE-->--}}
{{--                            <div class="col-md-3">--}}
{{--                                <img src="images/services/tr1.jpg" alt="" />--}}
{{--                            </div>--}}
{{--                            <!--POPULAR LISTINGS: CONTENT-->--}}
{{--                            <div class="col-md-9 home-list-pop-desc"> <a href="automobile-listing-details.html"><h3>Import Motor America</h3></a>--}}
{{--                                <h4>Express Avenue Mall, Santa Monica</h4>--}}
{{--                                <p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A.</p> <span class="home-list-pop-rat">4.2</span>--}}
{{--                                <div class="hom-list-share">--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#!"><i class="fa fa-bar-chart" aria-hidden="true"></i> 52</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-heart-o" aria-hidden="true"></i> 32</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-eye" aria-hidden="true"></i> 420</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-share-alt" aria-hidden="true"></i> 570</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--POPULAR LISTINGS-->--}}
{{--                        <div class="home-list-pop">--}}
{{--                            <!--POPULAR LISTINGS IMAGE-->--}}
{{--                            <div class="col-md-3">--}}
{{--                                <img src="images/services/tr2.jpg" alt="" />--}}
{{--                            </div>--}}
{{--                            <!--POPULAR LISTINGS: CONTENT-->--}}
{{--                            <div class="col-md-9 home-list-pop-desc"> <a href="property-listing-details.html"><h3>Luxury Property</h3></a>--}}
{{--                                <h4>Express Avenue Mall, New York</h4>--}}
{{--                                <p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A.</p> <span class="home-list-pop-rat">4.2</span>--}}
{{--                                <div class="hom-list-share">--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#!"><i class="fa fa-bar-chart" aria-hidden="true"></i> 52</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-heart-o" aria-hidden="true"></i> 32</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-eye" aria-hidden="true"></i> 420</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-share-alt" aria-hidden="true"></i> 570</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--POPULAR LISTINGS-->--}}
{{--                        <div class="home-list-pop">--}}
{{--                            <!--POPULAR LISTINGS IMAGE-->--}}
{{--                            <div class="col-md-3">--}}
{{--                                <img src="images/services/tr3.jpg" alt="" />--}}
{{--                            </div>--}}
{{--                            <!--POPULAR LISTINGS: CONTENT-->--}}
{{--                            <div class="col-md-9 home-list-pop-desc"> <a href="shop-listing-details.html"><h3>Spicy Supermarket Shop</h3></a>--}}
{{--                                <h4>Express Avenue Mall, Chicago</h4>--}}
{{--                                <p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A.</p> <span class="home-list-pop-rat">4.2</span>--}}
{{--                                <div class="hom-list-share">--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#!"><i class="fa fa-bar-chart" aria-hidden="true"></i> 52</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-heart-o" aria-hidden="true"></i> 32</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-eye" aria-hidden="true"></i> 420</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-share-alt" aria-hidden="true"></i> 570</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--POPULAR LISTINGS-->--}}
{{--                        <div class="home-list-pop">--}}
{{--                            <!--POPULAR LISTINGS IMAGE-->--}}
{{--                            <div class="col-md-3">--}}
{{--                                <img src="images/services/s4.jpg" alt="" />--}}
{{--                            </div>--}}
{{--                            <!--POPULAR LISTINGS: CONTENT-->--}}
{{--                            <div class="col-md-9 home-list-pop-desc"> <a href="list-lead.html"><h3>Packers and Movers</h3></a>--}}
{{--                                <h4>Express Avenue Mall, Toronto</h4>--}}
{{--                                <p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A.</p> <span class="home-list-pop-rat">4.2</span>--}}
{{--                                <div class="hom-list-share">--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#!"><i class="fa fa-bar-chart" aria-hidden="true"></i> 52</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-heart-o" aria-hidden="true"></i> 32</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-eye" aria-hidden="true"></i> 420</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-share-alt" aria-hidden="true"></i> 570</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <div>--}}
{{--                        <!--POPULAR LISTINGS-->--}}
{{--                        <div class="home-list-pop">--}}
{{--                            <!--POPULAR LISTINGS IMAGE-->--}}
{{--                            <div class="col-md-3">--}}
{{--                                <img src="images/services/s5.jpg" alt="" />--}}
{{--                            </div>--}}
{{--                            <!--POPULAR LISTINGS: CONTENT-->--}}
{{--                            <div class="col-md-9 home-list-pop-desc"> <a href="list-lead.html"><h3>Tour and Travels</h3></a>--}}
{{--                                <h4>Express Avenue Mall, Los Angeles</h4>--}}
{{--                                <p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A.</p> <span class="home-list-pop-rat">4.2</span>--}}
{{--                                <div class="hom-list-share">--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#!"><i class="fa fa-bar-chart" aria-hidden="true"></i> 52</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-heart-o" aria-hidden="true"></i> 32</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-eye" aria-hidden="true"></i> 420</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-share-alt" aria-hidden="true"></i> 570</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--POPULAR LISTINGS-->--}}
{{--                        <div class="home-list-pop">--}}
{{--                            <!--POPULAR LISTINGS IMAGE-->--}}
{{--                            <div class="col-md-3">--}}
{{--                                <img src="images/services/s6.jpg" alt="" />--}}
{{--                            </div>--}}
{{--                            <!--POPULAR LISTINGS: CONTENT-->--}}
{{--                            <div class="col-md-9 home-list-pop-desc"> <a href="list-lead.html"><h3>Andru Modular Kitchen</h3></a>--}}
{{--                                <h4>Express Avenue Mall, San Diego</h4>--}}
{{--                                <p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A.</p> <span class="home-list-pop-rat">4.2</span>--}}
{{--                                <div class="hom-list-share">--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#!"><i class="fa fa-bar-chart" aria-hidden="true"></i> 52</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-heart-o" aria-hidden="true"></i> 32</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-eye" aria-hidden="true"></i> 420</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-share-alt" aria-hidden="true"></i> 570</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--POPULAR LISTINGS-->--}}
{{--                        <div class="home-list-pop">--}}
{{--                            <!--POPULAR LISTINGS IMAGE-->--}}
{{--                            <div class="col-md-3">--}}
{{--                                <img src="images/services/s7.jpg" alt="" />--}}
{{--                            </div>--}}
{{--                            <!--POPULAR LISTINGS: CONTENT-->--}}
{{--                            <div class="col-md-9 home-list-pop-desc"> <a href="list-lead.html"><h3>Rute Skin Care & Treatment</h3></a>--}}
{{--                                <h4>Express Avenue Mall, Toronto</h4>--}}
{{--                                <p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A.</p> <span class="home-list-pop-rat">4.2</span>--}}
{{--                                <div class="hom-list-share">--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#!"><i class="fa fa-bar-chart" aria-hidden="true"></i> 52</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-heart-o" aria-hidden="true"></i> 32</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-eye" aria-hidden="true"></i> 420</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-share-alt" aria-hidden="true"></i> 570</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--POPULAR LISTINGS-->--}}
{{--                        <div class="home-list-pop mar-bot-red-0">--}}
{{--                            <!--POPULAR LISTINGS IMAGE-->--}}
{{--                            <div class="col-md-3">--}}
{{--                                <img src="images/services/s8.jpg" alt="" />--}}
{{--                            </div>--}}
{{--                            <!--POPULAR LISTINGS: CONTENT-->--}}
{{--                            <div class="col-md-9 home-list-pop-desc"> <a href="list-lead.html"><h3>Health and Fitness</h3></a>--}}
{{--                                <h4>Express Avenue Mall, San Diego</h4>--}}
{{--                                <p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A.</p> <span class="home-list-pop-rat">4.2</span>--}}
{{--                                <div class="hom-list-share">--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#!"><i class="fa fa-bar-chart" aria-hidden="true"></i> 52</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-heart-o" aria-hidden="true"></i> 32</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-eye" aria-hidden="true"></i> 420</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#!"><i class="fa fa-share-alt" aria-hidden="true"></i> 570</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!--CREATE FREE ACCOUNT-->
    <!--<section class="com-padd sec-bg-white">
            <div class="container">
                <div class="row">
                    <div class="com-title">
                        <h2>Create a free <span>Account</span></h2>
                        <p>Explore some of the best tips from around the world from our partners and friends.</p>
                    </div>
                    <div class="col-md-6">
                        <div class="hom-cre-acc-left">
                            <h3>A few reasons you’ll love Online <span>Business Directory</span></h3>
                            <p>5 Benefits of Listing Your Business to a Local Online Directory</p>
                            <ul>
                                <li> <img src="images/icon/7.png" alt="">
                                    <div>
                                        <h5>Enhancing Your Business</h5>
                                        <p>Imagine you have made your presence online through a local online directory, but your competitors have..</p>
                                    </div>
                                </li>
                                <li> <img src="images/icon/5.png" alt="">
                                    <div>
                                        <h5>Advertising Your Business</h5>
                                        <p>Advertising your business to area specific has many advantages. For local businessmen, it is an opportunity..</p>
                                    </div>
                                </li>
                                <li> <img src="images/icon/1.png" alt="">
                                    <div>
                                        <h5>Develop Brand Image</h5>
                                        <p>Your local business too needs brand management and image making. As you know the local market..</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="hom-cre-acc-left hom-cre-acc-right">
                            <form>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="acc-name" type="text" class="validate">
                                        <label for="acc-name">Name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="acc-mob" type="number" class="validate">
                                        <label for="acc-mob">Mobile</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="acc-mail" type="email" class="validate">
                                        <label for="acc-mail">Email</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="acc-pass" type="password" class="validate">
                                        <label for="acc-pass">Password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 hom-cr-acc-check">
                                        <input type="checkbox" id="test5" />
                                        <label for="test5">By signing up, you agree to the Terms and Conditions and Privacy Policy. You also agree to receive product-related emails.</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12"> <a class="waves-effect waves-light btn-large full-btn" href="#!">Submit Now</a> </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->
    <!--MOBILE APP-->
{{--<section class="com-padd com-padd-redu-top">--}}
{{--	<div class="container">--}}
{{--		<div class="row">--}}
{{--			<div class="com-title">--}}
{{--				<h2>Explore your <span>City Listings</span></h2>--}}
{{--				<p>Explore some of the best business from around the world from our partners and friends.</p>--}}
{{--			</div>--}}
{{--            @foreach($city as $k => $val)--}}
{{--                {{$val}}--}}
{{--			<div class="col-md-6">--}}
{{--				<a href="/search?city=chopta&state=Uttarkhand">--}}
{{--					<div class="list-mig-like-com">--}}
{{--						<div class="list-mig-lc-img">--}}
{{--							<img src="{{asset('front/images/listing/home.jpg')}}" alt="" />--}}
{{--						</div>--}}
{{--						<div class="list-mig-lc-con">--}}
{{--							<div class="list-rat-ch list-room-rati"> <span>4.0</span>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star" aria-hidden="true"></i>  <i class="fa fa-star-o" aria-hidden="true"></i>--}}
{{--							</div>--}}
{{--							<h5>Uttarkhand</h5>--}}
{{--							<p>12 Listings</p>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</a>--}}
{{--			</div>--}}
{{--			<div class="col-md-3">--}}
{{--				<a href="#">--}}
{{--					<div class="list-mig-like-com">--}}
{{--						<div class="list-mig-lc-img">--}}
{{--							<img src="{{asset('front/images/listing/home2.jpg')}}" alt="" />--}}
{{--						</div>--}}
{{--						<div class="list-mig-lc-con list-mig-lc-con2">--}}
{{--							<h5>Delhi</h5>--}}
{{--							<p>1 Listings</p>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</a>--}}
{{--			</div>--}}
{{--            @endforeach--}}
{{--			<div class="col-md-3">--}}
{{--				<a href="#">--}}
{{--					<div class="list-mig-like-com">--}}
{{--						<div class="list-mig-lc-img">--}}
{{--							<img src="{{asset('front/images/listing/home3.jpg')}}" alt="" />--}}
{{--						</div>--}}
{{--						<div class="list-mig-lc-con list-mig-lc-con2">--}}
{{--							<h5>Mumbai</h5>--}}
{{--							<p>1 Listings</p>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</a>--}}
{{--			</div>--}}
{{--			<div class="col-md-3">--}}
{{--				<a href="#">--}}
{{--					<div class="list-mig-like-com">--}}
{{--						<div class="list-mig-lc-img">--}}
{{--							<img src="{{asset('front/images/listing/home4.jpg')}}" alt="" />--}}
{{--						</div>--}}
{{--						<div class="list-mig-lc-con list-mig-lc-con2">--}}
{{--							<h5>Uttar Pradesh</h5>--}}
{{--							<p>2 Listings</p>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</a>--}}
{{--			</div>--}}
{{--			<div class="col-md-3">--}}
{{--				<a href="#">--}}
{{--					<div class="list-mig-like-com">--}}
{{--						<div class="list-mig-lc-img">--}}
{{--							<img src="{{asset('front/images/listing/home1.jpg')}}" alt="" />--}}
{{--						</div>--}}
{{--						<div class="list-mig-lc-con list-mig-lc-con2">--}}
{{--							<h5>India</h5>--}}
{{--							<p>12 Listings</p>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</a>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	</div>--}}
{{--</section>--}}
<!--ADD BUSINESS-->
<section class="com-padd quic-book-ser-full">
	<div class="quic-book-ser">
		<div class="quic-book-ser-inn">
			<div class="quic-book-ser-left">
				<div class="land-com-form">
					<h2>Quick service request</h2>
					<form method="POST" action="/send/email">
                        @csrf
						<ul>
							<li>
								<div class="row">
									<div class="input-field col s12">
										<input type="text" name="name" class="validate" required>
										<label>Name</label>
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="input-field col s12">
										<input type="number" name="contact" class="validate" required>
										<label>Phone number</label>
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="input-field col s12">
										<input type="email" name="email" class="validate" required>
										<label>Email id</label>
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="input-field col s12">
										<input type="text"  name="service" id="select-category1" class="autocomplete auto-category">
										<label for="select-category1">Select your Service</label>
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="input-field col s12">
										<input type="submit" value="Send Request">
									</div>
								</div>
							</li>
							<li>
								<p>Praesent felis velit, maximus at dapibus semper, fermentum sagittis diam. <a href="#">Privacy Policy</a>
								</p>
							</li>
						</ul>
					</form>
				</div>
			</div>
			<div class="quic-book-ser-right">
				<div class="hom-cre-acc-left">
					<h3>What service do you need? <span>Admission Jockey</span></h3>
					<p>Tell us more about your requirements so that we can connect you to the right service provider.</p>
					<ul>
						<li>
							<img src="front/images/icon/7.png" alt="">
							<div>
								<h5>Tell us more about your requirements</h5>
								<p>Imagine you have made your presence online through a local online directory, but your competitors have..</p>
							</div>
						</li>
						<li>
							<img src="front/images/icon/5.png" alt="">
							<div>
								<h5>We connect with right service provider</h5>
								<p>Advertising your business to area specific has many advantages. For local businessmen, it is an opportunity..</p>
							</div>
						</li>
						<li>
							<img src="front/images/icon/6.png" alt="">
							<div>
								<h5>Happy with our service</h5>
								<p>Your local business too needs brand management and image making. As you know the local market..</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!--BEST THINGS-->
<section class="com-padd com-padd-redu-bot">
	<div class="container dir-hom-pre-tit">
		<div class="row">
			<div class="com-title">
				<h2>Top Trendings for <span>your City</span></h2>
				<p>Explore some of the best tips from around the world from our partners and friends.</p>
			</div>
            @foreach($prop as $k => $val)
                @if($k % 5 == 0)
			<div class="col-md-6">
				<div>
					<!--POPULAR LISTINGS-->
					<div class="home-list-pop">
						<!--POPULAR LISTINGS IMAGE-->
						<div class="col-md-3">
                            <img src="/property/logo/images/{{$val->logo}}" alt="" />
                        </div>
                        <!--POPULAR LISTINGS: CONTENT-->
						<div class="col-md-9 home-list-pop-desc"> <a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($val->cities[0]->name)))}}/{{$val->seo->permalink}}"><h3>{{$val->name}}</h3></a>
							<h4>{{substr($val->description,0,30)}}</h4>
							<p>{{$val->pincode}},Uttarakhand,Chopta,{{$val->address}}</p> <span class="home-list-pop-rat">4.2</span>
							<div class="hom-list-share">
								<ul>
									<li><a href="#!"><i class="fa fa-bar-chart" aria-hidden="true"></i> 0</a>
									</li>
									<li><a href="#!"><i class="fa fa-heart-o" aria-hidden="true"></i> 0</a>
									</li>
									<li><a href="#!"><i class="fa fa-eye" aria-hidden="true"></i> {{$val->views}}</a>
									</li>
									<li><a href="#!"><i class="fa fa-share-alt" aria-hidden="true"></i> 0</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
                @else
                    <div class="col-md-6">
                        <div>
                            <!--POPULAR LISTINGS-->
                            <div class="home-list-pop">
                                <!--POPULAR LISTINGS IMAGE-->
                                <div class="col-md-3">
                                    <img src="/property/logo/images/{{$val->logo}}" alt="" />
                                </div>
                                <!--POPULAR LISTINGS: CONTENT-->
                                <div class="col-md-9 home-list-pop-desc"> <a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($val->cities[0]->name)))}}/{{$val->seo->permalink}}"><h3>{{$val->name}}</h3></a>
                                    <h4>{{substr($val->description,0,30)}}</h4>
                                    <p>{{$val->pincode}},Uttarakhand,Chopta,{{$val->address}}</p> <span class="home-list-pop-rat">4.2</span>
                                    <div class="hom-list-share">
                                        <ul>
                                            <li><a href="#!"><i class="fa fa-bar-chart" aria-hidden="true"></i> 0</a>
                                            </li>
                                            <li><a href="#!"><i class="fa fa-heart-o" aria-hidden="true"></i> 0</a>
                                            </li>
                                            <li><a href="#!"><i class="fa fa-eye" aria-hidden="true"></i> {{$val->views}}</a>
                                            </li>
                                            <li><a href="#!"><i class="fa fa-share-alt" aria-hidden="true"></i> 0</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
{{--			<div class="col-md-6">--}}
{{--				<div>--}}
{{--					<!--POPULAR LISTINGS-->--}}
{{--					<div class="home-list-pop">--}}
{{--						<!--POPULAR LISTINGS IMAGE-->--}}
{{--						<div class="col-md-3">--}}
{{--							<img src="images/services/s5.jpg" alt="" />--}}
{{--						</div>--}}
{{--						<!--POPULAR LISTINGS: CONTENT-->--}}
{{--						<div class="col-md-9 home-list-pop-desc"> <a href="list-lead.html"><h3>Tour and Travels</h3></a>--}}
{{--							<h4>Express Avenue Mall, Los Angeles</h4>--}}
{{--							<p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A.</p> <span class="home-list-pop-rat">4.2</span>--}}
{{--							<div class="hom-list-share">--}}
{{--								<ul>--}}
{{--									<li><a href="#!"><i class="fa fa-bar-chart" aria-hidden="true"></i> 52</a>--}}
{{--									</li>--}}
{{--									<li><a href="#!"><i class="fa fa-heart-o" aria-hidden="true"></i> 32</a>--}}
{{--									</li>--}}
{{--									<li><a href="#!"><i class="fa fa-eye" aria-hidden="true"></i> 420</a>--}}
{{--									</li>--}}
{{--									<li><a href="#!"><i class="fa fa-share-alt" aria-hidden="true"></i> 570</a>--}}
{{--									</li>--}}
{{--								</ul>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--					<!--POPULAR LISTINGS-->--}}
{{--					<div class="home-list-pop">--}}
{{--						<!--POPULAR LISTINGS IMAGE-->--}}
{{--						<div class="col-md-3">--}}
{{--							<img src="images/services/s6.jpg" alt="" />--}}
{{--						</div>--}}
{{--						<!--POPULAR LISTINGS: CONTENT-->--}}
{{--						<div class="col-md-9 home-list-pop-desc"> <a href="list-lead.html"><h3>Andru Modular Kitchen</h3></a>--}}
{{--							<h4>Express Avenue Mall, San Diego</h4>--}}
{{--							<p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A.</p> <span class="home-list-pop-rat">4.2</span>--}}
{{--							<div class="hom-list-share">--}}
{{--								<ul>--}}
{{--									<li><a href="#!"><i class="fa fa-bar-chart" aria-hidden="true"></i> 52</a>--}}
{{--									</li>--}}
{{--									<li><a href="#!"><i class="fa fa-heart-o" aria-hidden="true"></i> 32</a>--}}
{{--									</li>--}}
{{--									<li><a href="#!"><i class="fa fa-eye" aria-hidden="true"></i> 420</a>--}}
{{--									</li>--}}
{{--									<li><a href="#!"><i class="fa fa-share-alt" aria-hidden="true"></i> 570</a>--}}
{{--									</li>--}}
{{--								</ul>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--					<!--POPULAR LISTINGS-->--}}
{{--					<div class="home-list-pop">--}}
{{--						<!--POPULAR LISTINGS IMAGE-->--}}
{{--						<div class="col-md-3">--}}
{{--							<img src="images/services/s7.jpg" alt="" />--}}
{{--						</div>--}}
{{--						<!--POPULAR LISTINGS: CONTENT-->--}}
{{--						<div class="col-md-9 home-list-pop-desc"> <a href="list-lead.html"><h3>Rute Skin Care & Treatment</h3></a>--}}
{{--							<h4>Express Avenue Mall, Toronto</h4>--}}
{{--							<p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A.</p> <span class="home-list-pop-rat">4.2</span>--}}
{{--							<div class="hom-list-share">--}}
{{--								<ul>--}}
{{--									<li><a href="#!"><i class="fa fa-bar-chart" aria-hidden="true"></i> 52</a>--}}
{{--									</li>--}}
{{--									<li><a href="#!"><i class="fa fa-heart-o" aria-hidden="true"></i> 32</a>--}}
{{--									</li>--}}
{{--									<li><a href="#!"><i class="fa fa-eye" aria-hidden="true"></i> 420</a>--}}
{{--									</li>--}}
{{--									<li><a href="#!"><i class="fa fa-share-alt" aria-hidden="true"></i> 570</a>--}}
{{--									</li>--}}
{{--								</ul>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--					<!--POPULAR LISTINGS-->--}}
{{--					<div class="home-list-pop mar-bot-red-0">--}}
{{--						<!--POPULAR LISTINGS IMAGE-->--}}
{{--						<div class="col-md-3">--}}
{{--							<img src="images/services/s8.jpg" alt="" />--}}
{{--						</div>--}}
{{--						<!--POPULAR LISTINGS: CONTENT-->--}}
{{--						<div class="col-md-9 home-list-pop-desc"> <a href="list-lead.html"><h3>Health and Fitness</h3></a>--}}
{{--							<h4>Express Avenue Mall, San Diego</h4>--}}
{{--							<p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A.</p> <span class="home-list-pop-rat">4.2</span>--}}
{{--							<div class="hom-list-share">--}}
{{--								<ul>--}}
{{--									<li><a href="#!"><i class="fa fa-bar-chart" aria-hidden="true"></i> 52</a>--}}
{{--									</li>--}}
{{--									<li><a href="#!"><i class="fa fa-heart-o" aria-hidden="true"></i> 32</a>--}}
{{--									</li>--}}
{{--									<li><a href="#!"><i class="fa fa-eye" aria-hidden="true"></i> 420</a>--}}
{{--									</li>--}}
{{--									<li><a href="#!"><i class="fa fa-share-alt" aria-hidden="true"></i> 570</a>--}}
{{--									</li>--}}
{{--								</ul>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			</div>--}}
		</div>
	</div>
</section>
<section class="cat-v2-hom com-padd mar-bot-red-m30">
		<div class="container">
			<div class="row">
				<div class="com-title">
					<h2>Find your <span>Services</span></h2>
					<p>Explore some of the best business from around the world from our partners and friends.</p>
				</div>
				<div class="cat-v3-hom-list">
					<ul>
						<li>
							<a href="#"><img src="front/images/icon/hcat1.png" alt=""> Find Tution Classes</a>
						</li>
						<li>
							<a href="#"><img src="front/images/icon/hcat2.png" alt=""> Find Coaching Center</a>
						</li>
						<li>
							<a href="#"><img src="front/images/icon/hcat3.png" alt=""> Find Hostel & Mess</a>
						</li>
						<li>
							<a href="#"><img src="front/images/icon/hcat4.png" alt=""> Education Stationary Stores</a>
						</li>
						<li>
							<a href="#"><img src="front/images/icon/hcat5.png" alt=""> Find Book Store</a>
						</li>
						<li>
							<a href="#"><img src="front/images/icon/hcat6.png" alt=""> Find Education Services</a>
						</li>

					</ul>
				</div>
			</div>
		</div>
	</section>
<!--CREATE FREE ACCOUNT-->
<!--<section class="com-padd sec-bg-white">
		<div class="container">
			<div class="row">
				<div class="com-title">
					<h2>Create a free <span>Account</span></h2>
					<p>Explore some of the best tips from around the world from our partners and friends.</p>
				</div>
				<div class="col-md-6">
					<div class="hom-cre-acc-left">
						<h3>A few reasons you’ll love Online <span>Business Directory</span></h3>
						<p>5 Benefits of Listing Your Business to a Local Online Directory</p>
						<ul>
							<li> <img src="images/icon/7.png" alt="">
								<div>
									<h5>Enhancing Your Business</h5>
									<p>Imagine you have made your presence online through a local online directory, but your competitors have..</p>
								</div>
							</li>
							<li> <img src="images/icon/5.png" alt="">
								<div>
									<h5>Advertising Your Business</h5>
									<p>Advertising your business to area specific has many advantages. For local businessmen, it is an opportunity..</p>
								</div>
							</li>
							<li> <img src="images/icon/1.png" alt="">
								<div>
									<h5>Develop Brand Image</h5>
									<p>Your local business too needs brand management and image making. As you know the local market..</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-6">
					<div class="hom-cre-acc-left hom-cre-acc-right">
						<form>
							<div class="row">
								<div class="input-field col s12">
									<input id="acc-name" type="text" class="validate">
									<label for="acc-name">Name</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input id="acc-mob" type="number" class="validate">
									<label for="acc-mob">Mobile</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input id="acc-mail" type="email" class="validate">
									<label for="acc-mail">Email</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input id="acc-pass" type="password" class="validate">
									<label for="acc-pass">Password</label>
								</div>
							</div>
							<div class="row">
								<div class="col s12 hom-cr-acc-check">
									<input type="checkbox" id="test5" />
									<label for="test5">By signing up, you agree to the Terms and Conditions and Privacy Policy. You also agree to receive product-related emails.</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12"> <a class="waves-effect waves-light btn-large full-btn" href="#!">Submit Now</a> </div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>-->
<!--MOBILE APP-->
<!--<section class="web-app com-padd">-->
<!--	<div class="container">-->
<!--		<div class="row">-->
<!--			<div class="col-md-6 web-app-img">-->
<!--				<img src="images/mobile.png" alt="" />-->
<!--			</div>-->
<!--			<div class="col-md-6 web-app-con">-->
<!--				<h2>Looking for the Best Service Provider? <span>Get the App!</span></h2>-->
<!--				<ul>-->
<!--					<li><i class="fa fa-check" aria-hidden="true"></i> Find nearby listings</li>-->
<!--					<li><i class="fa fa-check" aria-hidden="true"></i> Easy service enquiry</li>-->
<!--					<li><i class="fa fa-check" aria-hidden="true"></i> Listing reviews and ratings</li>-->
<!--					<li><i class="fa fa-check" aria-hidden="true"></i> Manage your listing, enquiry and reviews</li>-->
<!--				</ul> <span>We'll send you a link, open it on your phone to download the app</span>-->
<!--				<form>-->
<!--					<ul>-->
<!--						<li>-->
<!--							<input type="text" placeholder="+01" />-->
<!--						</li>-->
<!--						<li>-->
<!--							<input type="number" placeholder="Enter mobile number" />-->
<!--						</li>-->
<!--						<li>-->
<!--							<input type="submit" value="Get App Link" />-->
<!--						</li>-->
<!--					</ul>-->
<!--				</form>-->
<!--				<a href="#">-->
<!--					<img src="images/android.png" alt="" />-->
<!--				</a>-->
<!--				<a href="#">-->
<!--					<img src="images/apple.png" alt="" />-->
<!--				</a>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</section>-->
@endsection
