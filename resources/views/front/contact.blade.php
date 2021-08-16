@extends('front.layout.header')
@section('content')
<main id="main">
<section class="breadcrumbs">
    <div class="container">
    <h1>Contact</h1>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Library</li>
        </ol>
        </nav>
    </div>
</section>
<section id="contact" class="contact h-100">
<iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=beowntech%20&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
			<div class="container" data-aos="fade-up">
				<div class="section-header text-center py-4">
					<h2 class="site-title">Contact</h2>
					<p class="title-desc"> Get In Touch With Us</p>
				</div>
				<div class="row gy-4">
					<div class="col-lg-7">
						<div class="row gy-4">
							<div class="col-md-6">
								<div class="info-box"> <i class="fas fa-phone-alt"></i>
									<h3>Call Us</h3>
									<a href="tel:+91{{env('PHONE')}}">+91 {{env('PHONE')}}</a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="info-box"> <i class="far fa-envelope"></i>
									<h3>Email Us</h3>
									<a href="mailto:{{env('CONTACTEMAIL')}}">{{env('CONTACTEMAIL')}}</a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="info-box"> <i class="fas fa-map-marker-alt"></i>
									<h3>Address</h3>
									<p>Dehradun <br> Uttarakhand</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="info-box"> <i class="far fa-clock"></i>
									<h3>Open Hours</h3>
									<p>All Days
									<br>24*7 Hours</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-5">

                    <div class="enquiry-form-1 text-center">
                            <form action="/contact/send" method="post">
                                @csrf
                                <input type="text" name="name" class="form-control mb-4" placeholder="Your Name">
                                <input type="number" name="contact" class="form-control mb-4" placeholder="Your Contact Number">
                                <input type="email" name="email" class="form-control mb-4" placeholder="Your mail">
                                <textarea name="message" id="" rows="6" class="form-control mb-4"  placeholder="Your Intrest"></textarea>
                                <div class="d-grid gap-2">
                                    <button class="btn site-btn-3" type="submit">SEND REQUEST</button>
                                </div>
                            </form>
{{--                            <p class="small mt-4">Praesent felis velit, maximus at dapibus semper, fermentum sagittis diam. <a href="#"> Privacy Policy</a></p>--}}
                    </div>

					</div>
				</div>
			</div>
		</section>
</main>
@endsection
