@extends('front.layout.header')
@section('content')
<section id="main-carousel">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
                        <div class="carousel-item active" style="min-height:100%;  background:linear-gradient(0deg, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.8)), url('/assets/images/lovely-college.jpg');  background-size:cover;">
                            <div class="carousel-caption">
                                <p class="float-end"><a href="#"> Lovely Professional University, Delhi </a>
                                </p>
                            </div>
                        </div>
            <div class="carousel-item " style="min-height:100%;  background:linear-gradient(0deg, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.8)), url('/assets/images/ii-college.jpg');  background-size:cover;">
                <div class="carousel-caption">
                    <p class="float-end"><a href="#"> IIT University, Dehradun </a>
                    </p>
                </div>
            </div>
            <div class="carousel-item " style="min-height:100%;  background:linear-gradient(0deg, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.8)), url('/assets/images/graphic.jpeg');  background-size:cover;">
                <div class="carousel-caption">
                    <p class="float-end"><a href="#"> Graphic Era University, Dehradun </a>
                    </p>
                </div>
            </div>
{{--            @foreach($prop as $p => $val)--}}
{{--                @if($p == 0)--}}
{{--            <div class="carousel-item active" style="min-height:100%;  background:linear-gradient(0deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.0)), url('/property/images/{{json_decode($val->images[0]->images)[0]}}');  background-size:cover;">--}}
{{--                <div class="carousel-caption">--}}
{{--                    <p class="float-end"><a href="#"> {{$val->name}}, {{$val->cities[0]->name}} </a>--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--                @else--}}
{{--                    <div class="carousel-item" style="min-height:100%;  background:linear-gradient(0deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.0)), url('/property/images/{{json_decode($val->images[0]->images)[0]}}');  background-size:cover;">--}}
{{--                        <div class="carousel-caption">--}}
{{--                            <p class="float-end"><a href="#">  {{$val->name}}, {{$val->cities[0]->name}} </a>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            @endforeach--}}
        </div>
    </div>
    <div id="search-v1" class="flex-column justify-content-center align-items-center search-bar">
        <div class="row text-center mx-0">
            <div class="col-md-8 offset-md-2">
                <h1>FIND OVER
                    <span  class="typewrite font-weight-bold" data-period="2000" data-type='[ "250+ COLLEGES", " 50+ COURSES", "ALL LOCATION" ]'>
                    <span class="wrap"></span></span> &nbsp;</h1>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="college-tab" data-bs-toggle="tab" data-bs-target="#college" type="button" role="tab" aria-controls="college" aria-selected="true">Colleges</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="exam-tab" data-bs-toggle="tab" data-bs-target="#exam" type="button" role="tab" aria-controls="exam" aria-selected="false">Exams</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="college" role="tabpanel" aria-labelledby="home-tab">
                        <div class="input-group">
                            <input class="form-control border-end-0 border rounded-pill" id="exampleDataList" type="search" placeholder="College to search...">
                            <span class="input-group-append">
                                <button class="btn btn-outline-secondary search-btn border-bottom-0 border rounded-pill ms-n5" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            <div class="liveSearch" style="">
                                <ul>
                                    <li>
                                <a href="#">Collegen Name</a>
                                    </li>
                                </ul>
                            </div>
{{--                            <datalist id="datalistOptions">--}}
{{--                                <option value="San Francisco">--}}
{{--                                <option value="New York">--}}
{{--                                <option value="Seattle">--}}
{{--                                <option value="Los Angeles">--}}
{{--                                <option value="Chicago">--}}
{{--                            </datalist>--}}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="exam" role="tabpanel" aria-labelledby="exam-tab">
                        <div class="input-group">
                            <input class="form-control border-end-0 border rounded-pill" list="datalistOptions" type="search" id="example-search-input" placeholder="Exam to search..."> <span class="input-group-append">
                            <button class="btn btn-outline-secondary search-btn border-bottom-0 border rounded-pill ms-n5" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            <datalist id="datalistOptions">
                                <option value="San Francisco">
                                <option value="New York">
                                <option value="Seattle">
                                <option value="Los Angeles">
                                <option value="Chicago">
                            </datalist>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><div class="clearfix"></div>
</section>


<section class="my-4 py-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="site-title">Explore Our Services</h1>
                <p class="title-desc">Explore some of the best Colleges from around the world. </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md col-6 data-type-1 text-center ">
                <a href="#">
                    <div class="p-3 icon-bx">
                        <img src="assets/images/icon/hcat1.png" width="65px" alt="">
                        <p> Find Best Colleges</p>
                    </div>
                </a>
            </div>
            <div class="col-md col-6 data-type-1 text-center ">
                <a href="#">
                    <div class="p-3 icon-bx">
                        <img src="assets/images/icon/hcat2.png" width="65px" alt="">
                        <p>  Find Education Loan</p>
                    </div>
                </a>
            </div>
            <div class="col-md col-6 data-type-1 text-center ">
                <a href="#">
                    <div class="p-3 icon-bx">
                        <img src="assets/images/icon/hcat3.png" width="65px" alt="">
                        <p>  Find Hostel</p>
                    </div>
                </a>
            </div>
            <div class="col-md col-6 data-type-1 text-center ">
                <a href="#">
                    <div class="p-3 icon-bx">
                        <img src="assets/images/icon/hcat4.png" width="65px" alt="">
                        <p>  Free Counceling By Expert</p>
                    </div>
                </a>
            </div>
            <div class="col-md col-6 data-type-1 text-center ">
                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                    <div class="p-3 icon-bx">
                        <img src="assets/images/icon/hcat5.png" width="65px" alt="">
                        <p> Compare Colleges</p>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>


<section class="my-4 py-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="site-title">Choose your Future</h1>
                <p class="title-desc">Explore Top of the best Colleges / Exams By Categories. </p>
            </div>
        </div>
        <div class="row mt-5" id="filter-cat-btn">
            <div class="col">
                <ul class="nav justify-content-center">
                    <li class="nav-item border-right">
                        <a class="nav-link active left-round" id="college_service" href="#!">Colleges</a>
                    </li>
                    <li class="nav-item border-right">
                        <a class="nav-link " id="exam_service" href="#!">Exams</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link right-round" id="location_service" href="#!">Locations</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mt-4" id="service1">
            @foreach($fcatg as $c => $ca)
                <div class="col-md col-6 data-type-2 text-center ">
                    <a href="/search?catg={{$ca->name}}">
                        <div class="p-3 icon-bx">
                            <img src="category/{{$ca->image}}" width="65px" alt="">
                            <p> {{$ca->name}} </p>
                            <span class="small">{{$ca->property}} Colleges</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row mt-4 d-none" id="service2">
            @foreach($fcatg as $c => $ca)
            <div class="col-md col-6 data-type-2 text-center ">
                <a href="/search?catg={{$ca->name}}">
                    <div class="p-3 icon-bx">
                        <img src="category/{{$ca->image}}" width="65px" alt="">
                        <p> {{$ca->name}} </p>
                        <span class="small">{{$ca->property}} Exams</span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row mt-4 d-none" id="service3">
            @foreach($state as $s => $st)
            <div class="col-md col-6 data-type-2 text-center ">
                <a href="/search?state={{$st->name}}">
                    <div class="p-3 icon-bx">
                        <img src="/city/{{$st->image}}" width="115px" alt="">
                        <p> {{$st->name}} </p>
                        <span class="small">{{$st->count}} Colleges</span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="my-4 py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-5 site-form mb-4">
                <div class="enquiry-form-1 text-center">
                    <h2 class="">Quick Enquiry</h2>
                    <br>
                    <form action="/send/email" method="POST">
                        <input type="text" class="form-control mb-4" name="name" placeholder="Your Name">
                        <input type="password" class="form-control mb-4" name="contact" placeholder="Your Contact Number">
                        <input type="email" class="form-control mb-4" name="email" placeholder="Your mail">
                        <input type="text" class="form-control mb-4" name="service" placeholder="Your Intrest">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">SEND REQUEST</button>
                        </div>
                    </form>
                    <p class="small mt-4">Praesent felis velit, maximus at dapibus semper, fermentum sagittis diam. Privacy Policy</p>
                </div>
            </div>
            <div class="col-md-7 pl-3 mb-4">
                <h1>What service do you need? </h1>
                <h1>Admission Jockey</h1>
                <p>Tell us more about your requirements so that we can connect you to the right service provider.</p>
            </div>
        </div>
    </div>
</section>


<section class="my-4 py-4 bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1 class="site-title">Top Trendings Colleges</h1>
                <p class="title-desc">Explore Top of the best Colleges / Exams By Categories. </p>
            </div>
        </div>
        <div class="row">
            @foreach($prop as $k => $val)
            <div class="col-md-3 p-3">
                <div class="college-info-1">
                    <div class="cover-img position-relative" style="background:url(/property/images/{{json_decode($val->images[0]->images)[0]}});background-size:cover;">
                        <div class="college-info-logo"><img src="/property/logo/images/{{$val->logo}}" alt=""></div>
                        <div class="college-info-name position-absolute bottom-0 start-0 px-2 pb-1">
                            <p><a href="#">{{$val->name}}</a></p>
                            <span><i class="fas fa-map-marker-alt"></i> {{$val->cities[0]->name}}</span>
                        </div>
                    </div>
                    <div class="college-info px-2 pt-1">
                        <p class="font-weight-bold p1">{{$val->courses->isEmpty() ? "MBA" : $val->courses[0]->name}} <span class="badge bg-warning float-end"><i class="far fa-star"></i> 10</span></p>
                        <p class="float-end small p2"> <a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($val->cities[0]->name)))}}/{{$val->seo->permalink}}">  VIEW ALL COURSES & FEES</a> </p>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="my-4 py-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="site-title">Find your Services</h1>
                <p class="title-desc">Explore some of the best Colleges from around the world. </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md col-6 data-type-1 text-center ">
                <a href="#">
                    <div class="p-3 icon-bx">
                        <img src="assets/images/icon/hcat1.png" width="65px" alt="">
                        <p>  Find Tution Classes </p>
                    </div>
                </a>
            </div>
            <div class="col-md col-6 data-type-1 text-center ">
                <a href="#">
                    <div class="p-3 icon-bx">
                        <img src="assets/images/icon/hcat2.png" width="65px" alt="">
                        <p>   Find Coaching Center</p>
                    </div>
                </a>
            </div>
            <div class="col-md col-6 data-type-1 text-center ">
                <a href="#">
                    <div class="p-3 icon-bx">
                        <img src="assets/images/icon/hcat3.png" width="65px" alt="">
                        <p>  Find Hostel & Mess</p>
                    </div>
                </a>
            </div>
            <div class="col-md col-6 data-type-1 text-center ">
                <a href="#">
                    <div class="p-3 icon-bx">
                        <img src="assets/images/icon/hcat4.png" width="65px" alt="">
                        <p>   Education Stationary Stores</p>
                    </div>
                </a>
            </div>
            <div class="col-md col-6 data-type-1 text-center ">
                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                    <div class="p-3 icon-bx">
                        <img src="assets/images/icon/hcat5.png" width="65px" alt="">
                        <p>  Find Book Store</p>
                    </div>
                </a>
            </div>
            <div class="col-md col-6 data-type-1 text-center ">
                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                    <div class="p-3 icon-bx">
                        <img src="assets/images/icon/hcat6.png" width="65px" alt="">
                        <p>   Find Education Services</p>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>
@endsection
