@extends('front.layout.header',['schema'=>$seo[0]->json_schema])
@section('show',true)
@section('title','Admission Jockey')
@section('description',$seo[0]->description)
@section('published_on',$seo[0]->created_at)
@section('updated_on',\Carbon\Carbon::now())
@section('featured','')
@section('canonical','https://admissionjockey.com')
@section('author_name','Deb Jyoti Shah')
@section('seo_url','https://'.Request::getHost())
@section('content')
<section id="main-carousel">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 3"></button>
{{--            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 4"></button>--}}
{{--            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 5"></button>--}}
        </div>
       <div class="carousel-inner">
{{--                        <div class="carousel-item active" style="min-height:100%;  background:linear-gradient(0deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.0), rgba(255, 255, 255, 0.9)), url('/assets/images/lovely-college.jpg');  background-size:cover;">--}}
{{--                            <div class="carousel-caption">--}}
{{--                                <p class="float-end"><a href="#"> Lovely Professional University, Delhi </a>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--            <div class="carousel-item " style="min-height:100%;  background:linear-gradient(0deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.0), rgba(255, 255, 255, 0.9)), url('/assets/images/ii-college.jpg');  background-size:cover;">--}}
{{--                <div class="carousel-caption">--}}
{{--                    <p class="float-end"><a href="#"> IIT University, Dehradun </a>--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="carousel-item " style="min-height:100%;  background:linear-gradient(0deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.0), rgba(255, 255, 255, 0.9)), url('/assets/images/graphic.jpeg');  background-size:cover;">--}}
{{--                <div class="carousel-caption">--}}
{{--                    <p class="float-end"><a href="#"> Graphic Era University, Dehradun </a>--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
           <div class="carousel-item active" style="min-height:100%;  background:linear-gradient(0deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.0), rgba(255, 255, 255, 0.9)), url('/property/15/gallery/featured/featured_1626329156.JPG');  background-size:cover;background-position: top">
               <div class="carousel-caption">
                   <p class="float-end"><a href="http://okadmission.com/college-in-bhopal/uttaranchal-university"> UTTARANCHAL P.G COLLEGE OF BIOMEDICAL SCIENCES AND HOSPITAL, Rajpur </a>
                   </p>
               </div>
           </div>
           <div class="carousel-item lazy" style="min-height:100%;  background:linear-gradient(0deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.0), rgba(255, 255, 255, 0.9)), url('/assets/images/slider/dolphin.jpg');  background-size:cover;">
               <div class="carousel-caption">
                   <p class="float-end"><a href="https://admissionjockey.com/college-in-fatehgarh_sahib/dolphin-p-g-college-of-agriculture-science"> DOLPHIN (PG) COLLEGE OF SCIENCE & AGRICULTURE </a>
                   </p>
               </div>
           </div>
           <div class="carousel-item lazy" style="min-height:100%;  background:linear-gradient(0deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.0), rgba(255, 255, 255, 0.9)), url('/assets/images/slider/brainware.webp');  background-size:cover;background-position: center">
               <div class="carousel-caption">
                   <p class="float-end"><a href="#"> BrainWare College</a>
                   </p>
               </div>
           </div>
           <div class="carousel-item lazy" style="min-height:100%;  background:linear-gradient(0deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.0), rgba(255, 255, 255, 0.9)), url('/assets/images/slider/IMG_1147-1024x538.jpg');  background-size:cover;">
               <div class="carousel-caption">
                   <p class="float-end"><a href="https://admissionjockey.com/college-in-dehradun/uttaranchal-university"> UTTARANCHAL UNIVERSITY</a>
                   </p>
               </div>
           </div>
{{--            @foreach($prop as $p => $val)--}}
{{--                @if($p == 0)--}}
{{--            <div class="carousel-item active" style="min-height:100%;  background:linear-gradient(0deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.0), rgba(255, 255, 255, 0.9)), url('/property/images/{{json_decode($val->images[0]->images)[0]}}');  background-size:cover;">--}}
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
                            <div class="liveSearch" style="display:none;">
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
                    <div class="tab-pane fade" id="exam" role="tabpanel" aria-labelledby="home-tab">
                        <div class="input-group">
                            <input class="form-control border-end-0 border rounded-pill" id="exampleDataListExam" type="search" placeholder="Exams to search...">
                            <span class="input-group-append">
                                <button class="btn btn-outline-secondary search-btn border-bottom-0 border rounded-pill ms-n5" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            <div class="liveSearchExam" style="display:none;">
                                <ul>
                                    <li>
                                        <a href="#">Exam Name</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><div class="clearfix"></div>
</section>


<section class="my-4 py-4 h-100">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="site-title">Made Effortless for You</h1>
                <p class="title-desc">This is how we make exploring the best colleges worldwide a cakewalk. Don’t believe in us? Find out Now. </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-4 col-6 data-type-1 text-center ">
                <a href="/search">
                    <div class="p-3 icon-bx">
                        <img src="/assets/images/site/College.png" class="img-sm" alt="">
                        <p> <strong>Find All the Best Colleges</strong><br>  in One Place</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-6 data-type-1 text-center ">
                <a href="#">
                    <div class="p-3 icon-bx">
                        <img src="/assets/images/site/Expert.png" class="img-sm" alt="">
                        <p> <strong>  Free Educational Counselling</strong> <br> by Expert Consultants</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-6 data-type-1 text-center ">
                <a href="/education-loan">
                    <div class="p-3 icon-bx">
                        <img src="/assets/images/site/Loans.png" class="img-sm" alt="">
                        <p>  Get <strong> Hassle-free Education Loans</strong> in No Time
</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-6 data-type-1 text-center ">
                <a href="/hostel">
                    <div class="p-3 icon-bx">
                        <img src="/assets/images/site/Hostel.png" class="img-sm" alt="">
                        <p>  Discover <strong> Affordable Accommodations</strong>  and <strong>Cheap Hostels</strong></p>
                    </div>
                </a>
            </div>

            <div class="col-md-4 col-6 data-type-1 text-center ">
                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                    <div class="p-3 icon-bx">
                        <img src="/assets/images/site/Compare.png" class="img-sm" alt="">
                        <p><strong> Compare Colleges</strong>   and <strong>Choose</strong>  the Best</strong> Among the Rest
</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-6 data-type-1 text-center ">
                <a href="/updates-notification" >
                    <div class="p-3 icon-bx">
                        <img src="/assets/images/site/Exam.png" class="img-sm" alt="">
                        <p> Learn about the <strong>Updated</strong> and <strong>Latest Exam Notifications</strong> </p>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>


<section class="my-4 py-4 bg-light h-100">
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
                        <a class="nav-link " id="exam_service" href="#!">Exam</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link right-round" id="location_service" href="#!">Locations</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mt-4 five-bx " id="service1">
            @foreach($fcatg as $c => $ca)
            @foreach($ca->children as $cc => $cac)
                <div class="col-md-25 col-4 data-type-2 text-center">
                    <a href="/search?catg={{$cac->name}}">
                        <div class="p-1 icon-bx">
                            <img data-original="{{env('MEDIA_URL')}}front/images/future/{{$cac->image}}" class="site-icon p-2" alt="{{$cac->name}} Colleges">
                            <p> {{$cac->name}} </p>
                            <span class="small">{{$cac->property}} Colleges</span>
                        </div>
                    </a>
                </div>
            @endforeach
            @endforeach
        </div>
        <div class="row mt-4 d-none five-bx" id="service2">
            @foreach($fcatg as $c => $ca)
                @foreach($ca->children as $cc => $cac)
            <div class="col-md-25 col-6 data-type-2 text-center ">
                <a href="/exam/{{$cac->name}}">
                    <div class="p-1 icon-bx">
                        <img data-original="{{env('MEDIA_URL')}}front/images/future/{{$cac->image}}" class="site-icon p-2" alt="{{$cac->name}} Exams">
                        <p> {{$cac->name}} </p>
                        <span class="small">{{$cac->exams}} Exam</span>
                    </div>
                </a>
            </div>
                @endforeach
            @endforeach
        </div>
        <div class="row mt-4 d-none five-bx" id="service3">
            <div class="col-md-25 col-6 data-type-2 text-center ">
                <a href="/search">
                    <div class="p-1 icon-bx">
                        <img data-original="/city/india.png" alt="India Colleges">
                        <p> India </p>
                        <span class="small">Colleges</span>
                    </div>
                </a>
                </div>
            @foreach($state as $s => $st)
            @if($s < 14)
            <div class="col-md-25 col-6 data-type-2 text-center ">
                <a href="/search?state={{$st->name}}">
                    <div class="p-1 icon-bx">
                        <img data-original="/city/{{$st->image}}" alt="{{$st->name}} Colleges">
                        <p> {{$st->name}} </p>
                        <span class="small">{{$st->count}} Colleges</span>
                    </div>
                </a>
            </div>
            @else
             <div class="col-md-25 col-6 data-type-2 text-center locationMore" style="display:none">
                <a href="/search?state={{$st->name}}">
                    <div class="p-1 icon-bx">
                        <img data-original="/city/{{$st->image}}" alt="{{$st->name}} Colleges">
                        <p> {{$st->name}} </p>
                        <span class="small">{{$st->count}} Colleges</span>
                    </div>
                </a>
            </div>
            @endif
            @endforeach
            <p class="text-center small p2 mt-3" style="font-size: 15px;font-weight: bold;"> <a href="#!" style="text-decoration:none!important;color:black;" class="viewallLocation">  VIEW ALL</a> </p>
        </div>
    </div>
</section>

<section class="my-4 py-4 h-100">
    <div class="container">
        <div class="row">
            <div class="col-md-5 site-form mb-4">
                <div class="enquiry-form-1 text-center">
                    <h2 class="">  We are ready to lead you into the future of world-class education. </h2>
                    <br>
                     <form action="/send/email" method="POST">
                        @csrf
                        <input type="text" class="form-control mb-4" name="name" placeholder="Your Name">
{{--                        <input type="number" class="form-control mb-4" name="contact" placeholder="Your Contact Number">--}}
                        <input type="email" class="form-control mb-4" name="email" placeholder="Your mail">
                        <select class="form-control mb-4" name="course">
                            <option value="0" selected="true" disabled>Select Course</option>
                            @foreach($course as $c => $co)
                                <option value="{{$co->name}}">{{$co->name}}</option>
                            @endforeach
                        </select>
                        <textarea class="form-control mb-4" rows="3" placeholder="Your Intereset" name="message"></textarea>
                        <div class="d-grid gap-2">
                            <button class="btn site-btn-1" type="submit">SEND REQUEST</button>
                        </div>
                    </form>
                    <p class="small mt-4">Praesent felis velit, maximus at dapibus semper, fermentum sagittis diam. Privacy Policy</p>
                </div>
            </div>
            <div class="col-md-7 pl-3 mb-4">
                 <h1><strong>Finding your dream college</strong> </h1>
                <h2> just got easier with Admission Jockey! </h2>
              <!-- <p> <strong> BOOK A FREE CALL WITH US</strong> and we will help you start achieving your goals at lightning speed.
</p>-->
 <span class="">
                        <div class="row bg-scolor mx-2 px-md-4 justify-content-center enquiry-steps">

                            <div class="col-md-6 text p-4">
                                    <div class="row">
                                        <div class="col-4 align-middle">
                                            <img src="assets/images/icon/p1.png" class="" width="100%" alt="">
                                        </div>
                                        <div class="col-6">
                                            <span class="step-count">01</span> <i class="fas fa-long-arrow-alt-right blink-element"></i>
                                            <p class="quiry-message">Shortlist your colleges</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 text p-4">
                                    <div class="row">
                                        <div class="col-4 align-middle">
                                            <img src="assets/images/icon/p2.png" class="" width="100%" alt="">
                                        </div>
                                        <div class="col-6">
                                            <span class="step-count">02</span> <i class="fas fa-long-arrow-alt-right blink-element"></i>
                                            <p class="quiry-message">Take 1:1 free Counseling</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 text p-4">
                                    <div class="row">
                                        <div class="col-4 align-middle">
                                            <img src="assets/images/icon/p4.png" class="" width="100%" alt="">
                                        </div>
                                        <div class="col-6">
                                            <span class="step-count">03</span> <i class="fas fa-long-arrow-alt-right blink-element"></i>
                                            <p class="quiry-message">Choose the best college</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 text p-4">
                                    <div class="row">
                                        <div class="col-4 align-middle">
                                            <img src="assets/images/icon/p3.png" class="" width="100%" alt="">
                                        </div>
                                        <div class="col-6">
                                            <span class="step-count">04</span> <i class="fas fa-long-arrow-alt-right  blink-element"></i>
                                            <p class="quiry-message">Fill the form</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9 text p-4">
                                    <div class="row">
                                        <div class="col-4 align-middle">
                                            <img src="assets/images/icon/p5.png" class="" width="100%" alt="">
                                        </div>
                                        <div class="col-6">
                                            <span class="step-count">05</span> <i class="far fa-thumbs-up  blink-element"></i>
                                            <p class="quiry-message">Complete admission with our executives</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                </span>
            </div>
        </div>
    </div>
</section>


<section class="my-4 py-4 bg-light h-100">
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
                    <div class="cover-img position-relative lazy" style="background:url(/property/{{$val->id}}/gallery/featured/{{$val->images[0]->featured}});
                             background-size:cover;">
                        @if($val->featured == 1)
                            <div class="ribbon"><span>featured</span></div>
                            @endif
                        <div class="college-info-logo"><a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($val->cities->isEmpty() ? "" : $val->cities[0]->name)))}}/{{$val->seo->isEmpty() ? "" : $val->seo[0]->permalink}}">
                                <img data-original="/property/{{$val->id}}/logo/{{$val->logo}}" alt="{{$val->name}}"></a></div>
                        <div class="college-info-name position-absolute bottom-0 start-0 px-2 pb-1">
                            <p><a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($val->cities->isEmpty() ? "" : $val->cities[0]->name)))}}/{{$val->seo->isEmpty() ? "": $val->seo[0]->permalink}}">{{$val->name}}</a></p>
                            <span><i class="fas fa-map-marker-alt"></i> {{$val->cities->isEmpty() ? "" : $val->cities[0]->name}}</span>
                        </div>
                    </div>
                    <div class="college-info px-2 pt-1">
                        <p class="font-weight-bold p1">{{$val->courses->isEmpty() ? "MBA" : $val->courses[0]->name}} <span class="badge bg-warning float-end"><i class="far fa-star"></i> 10</span></p>
                        <p class="float-end small p2"> <a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($val->cities->isEmpty() ? "" : $val->cities[0]->name)))}}/{{$val->seo->isEmpty() ? "" :  $val->seo[0]->permalink}}">  VIEW ALL COURSES & FEES</a> </p>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</section>


<!---<section class="my-4 py-4" id="service-bx">
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
                        <img src="assets/images/icon/Tution-Classes.png" width="100px" alt="">
                        <p>  Find Tution Classes </p>
                    </div>
                </a>
            </div>
            <div class="col-md col-6 data-type-1 text-center ">
                <a href="#">
                    <div class="p-3 icon-bx">
                        <img src="assets/images/icon/Coaching-Centre.png" width="100px" alt="">
                        <p>   Find Coaching Center</p>
                    </div>
                </a>
            </div>
            <div class="col-md col-6 data-type-1 text-center ">
                <a href="#">
                    <div class="p-3 icon-bx">
                        <img src="assets/images/icon/Hostel.png" width="100px" alt="">
                        <p>  Find Hostel & Mess</p>
                    </div>
                </a>
            </div>
            <div class="col-md col-6 data-type-1 text-center ">
                <a href="#">
                    <div class="p-3 icon-bx">
                        <img src="assets/images/icon/Stationery-Store.png" width="100px" alt="">
                        <p>   Education Stationary Stores</p>
                    </div>
                </a>
            </div>
            <div class="col-md col-6 data-type-1 text-center ">
                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                    <div class="p-3 icon-bx">
                        <img src="assets/images/icon/Bookstore.png" width="100px" alt="">
                        <p>  Find Book Store</p>
                    </div>
                </a>
            </div>
            <div class="col-md col-6 data-type-1 text-center ">
                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                    <div class="p-3 icon-bx">
                        <img src="assets/images/icon/Education-Services.png" width="100px" alt="">
                        <p>   Find Education Services</p>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>--->

<!-- landing Modal -->
<div class="modal fade custom-modal" id="enqModalCenter"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-body p-0">
                <button type="button" class="btn-close float-end m-2" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="row m-0">
                    <div class="col-md-6 bg-pcolor pb-3 enq-info  d-none d-sm-block">
                        <div class="p-2 text-center">
                            <h4 class="py-3 text-white">Why should I fill this?</h4>
                            <div class="py-2 text-win">
                                <img src="assets/images/icon/d1.png" alt="">
                                <p>Receive advertiser details instantly</p>
                            </div>
                            <div class="py-2 text-win">
                                <img src="assets/images/icon/d2.png" alt="">
                                <p>Discover new projects/properties to
                                    your liking via email/sms</p>
                            </div>
                            <div class="py-2">
                                <img src="assets/images/icon/d3.png" alt="">
                                <p>Our experts will get in touch to help
                                    you out when required</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3 class="text-center mt-3 title">What you looking for?</h3>
                        <hr>
                        <form action="">
                            <div class="first-step-enq">
                                <div class="fix-20 pl-2">
                                    @foreach($catf as $c => $val)
                                        @foreach($val->children as $f => $vals)
                                            <div class="form-check mb-1">
                                                <input class="form-check-input landingStream" type="checkbox" value="{{$vals->name}}" id="stream{{$vals->id}}">
                                                <label class="form-check-label" for="stream{{$vals->id}}">{{$vals->name}}</label>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                                <button type="button" class="btn site-btn-2 btn-sm float-end mt-3" id="landingNext">Next</button></p>
                            </div>
                        </form>
                        <div class="second-step-enq" style="display:none;">
                            <div class="mb-3">
                                <input type="text" id="landingName" class="form-control website-form" placeholder="Full Name">
                            </div>
                            <div class="mb-3">
                                <input type="text" id="landingEmail" class="form-control website-form" placeholder="Email Address">
                            </div>
                            <div class="mb-3">
                                <input type="number" id="landingContact" class="form-control website-form" placeholder="Contact Number" >
                            </div>
                            <div class="mb-3">
                                <input type="text" id="landingCity" class="form-control website-form" placeholder="City">
                            </div>
                            <p id="landingDone" class="text-success" style="font-weight: bold;font-size: 22px;"></p>
                            <p class="small">By submitting this form, you accept and agree to our <a href="#">Terms of Use</a> .</p>
                            <p><a href="#"> Already Registered? Click Here To Login.</a>
                                <button type="button" class="btn site-btn-2 btn-sm float-end mt-3" id="landingSubmit">SUBMIT</button></p>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
