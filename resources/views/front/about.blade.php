@extends('front.layout.header')
@section('content')

    <main id="main" class="bg-light">
        <section class="breadcrumbs">
            <div class="container">
                <h1>About Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>
        </section>
        <section>
            <div class="container" data-aos="fade-up">
                <div class="section-header text-center py-4">
                    <h2 class="site-title">The what and why of Admission Jockey?</h2>

                </div>
                <div class="row gy-4 bg-white pb-2">
                    <div class="col-lg-4">
                        <img src="/assets/images/site/edu-loan.jpg" width="100%" alt="">
                    </div>
                    <div class="col-lg-8">
                        <h2 class="site-title scolor text-start"> What is Admission Jockey?</h2>
                        <h3>Admission Jockey aims to be the best among the leading higher education search portals in India. Our website <a href="{{env('APP_URL')}}" target="_blank" class="scolor">www.{{env('APP_URL')}}</a>  hosts a wide range of educational institutions and makes admission an accessible and convenient process for students across the nation.</h3>

                    </div>
                </div>
                <div class="row my-3 bg-white py-2">
                    <div class="col-12">
                        <h2 class="my-2 pcolor">Hence, we dedicate all our resources to benefit -</h2>
                        <div class="row">
                            <div class="col-md-2">
                                <img src="/assets/images/site/a-hat.png" alt="">
                            </div>
                            <div class="col-md-10">
                                <h3 class="pcolor after-line">Student</h3>
                                <h4>We provide a comprehensive range of services to make college-hunt effortless and hassle-free.</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <img src="/assets/images/site/a-college.png" alt="">
                            </div>
                            <div class="col-md-10">
                                <h3 class="pcolor after-line">Colleges and Universities </h3>
                                <h4>We help to convert colleges and universities into students’ dream destinations with higher brand visibility and advocacy. </h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-3 bg-white py-2"><h2 class="my-2 pcolor">This is how  we turn every student’s <span class="scolor">dream into reality</span>  -</h2>
                    <div class="col-10 offset-1">

                        <div class="row my-1">
                            <div class="col-md-2">
                                <img src="/assets/images/site/a (1).png" alt="">
                            </div>
                            <div class="col-md-10">
                                <h4><span class="scolor">Shortlist</span>  the ideal colleges with the help of a filtered search</h4>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-md-2">
                                <img src="/assets/images/site/a (2).png" alt="">
                            </div>
                            <div class="col-md-10">
                                <h4>Take the assistance of Admission Jockey through <span class="scolor">FREE career counseling</span> or <span class="scolor">COMPARE feature.</span></h4>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-md-2">
                                <img src="/assets/images/site/a (3).png" alt="">
                            </div>
                            <div class="col-md-10">
                                <h4><span class="scolor">Choose</span> the college that fits all the criteria.</h4>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-md-2">
                                <img src="/assets/images/site/a (4).png" alt="">
                            </div>
                            <div class="col-md-10">
                                <h4>Fill up all the necessary details in the<span class="scolor"> pop-up form.</span> </h4>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-md-2">
                                <img src="/assets/images/site/a (5).png" alt="">
                            </div>
                            <div class="col-md-10">
                                <h4>Our <span class="scolor"> executive operators</span>  will reach the students and make their admission hassle-free through our <span class="scolor"> student-friendly services.</span></h4>
                            </div>
                        </div>


                    </div>
                </div>


            </div>
        </section>

    </main>
@endsection
