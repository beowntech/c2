@extends('front.layout.header')
@section('content')
    <style>
        .animateAlert{
            text-align: center;
            line-height: 2.5;
            overflow: hidden;
            -webkit-box-shadow: 0 0 5px black;
            -moz-box-shadow:    0 0 5px black;
            box-shadow:         0 0 5px black;
        }
        .cssanimations.csstransforms .animateAlert {
            -webkit-transform: translateY(-50px);
            -webkit-animation: slideDown 2.5s 1.0s 1 ease forwards;
            -moz-transform:    translateY(-50px);
            -moz-animation:    slideDown 2.5s 1.0s 1 ease forwards;
        }
        @-webkit-keyframes slideDown {
            0%, 100% { -webkit-transform: translateY(-50px); }
            10%, 90% { -webkit-transform: translateY(0px); }
        }
        @-moz-keyframes slideDown {
            0%, 100% { -moz-transform: translateY(-50px); }
            10%, 90% { -moz-transform: translateY(0px); }
        }
    </style>
    <main id="main" class="bg-light">
        <section class="breadcrumbs">
            <div class="container">
                <h1>{{Auth::user()->name}}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cyber Partner</li>
                    </ol>
                </nav>
                <div style="text-align-last: right;">
                    <a href="/cyber-leads" class="btn btn-primary">View Leads</a>
                </div>
            </div>
        </section>
        <section>
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 bg-white pb-2">
                    <div class="col-lg-6">
                        <img src="assets/images/site/cyber-partner.jpg" width="100%" alt="">
                    </div>
                    <div class="col-lg-6">
                        <h2 class="my-2 pcolor"> Add <span class="scolor">Student's</span> Form -</h2>
                        <div class="enquiry-form-1 text-center">
                            <form action="/cyber-leads/add" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control mb-3 website-form" placeholder="Student Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="city" class="form-control mb-3 website-form" placeholder="Student City Name" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="contact" class="form-control  mb-3 website-form" placeholder="Student Contact Number">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" name="email" class="form-control mb-3 website-form" placeholder="Student Email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="course" class="form-control mb-3 website-form" placeholder="Student Intrested Course">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="place" class="form-control  mb-3 website-form" placeholder="Student Intrested Place">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="college" class="form-control mb-3 website-form" placeholder="Intrested College">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="class" class="form-control mb-3 website-form" placeholder="Student Class (persuing)">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea name="message" id=""  rows="4" class="form-control" placeholder="Any Message"></textarea>
                                    </div>

                                </div>
                                <div class="d-grid gap-2 mt-3">
                                    <button class="btn site-btn-3" type="submit">Join REQUEST</button>
                                </div>
                            </form>
                            <p class="small mt-4">Praesent felis velit, maximus at dapibus semper, fermentum sagittis diam. <a href="#"> Privacy Policy</a></p>
                        </div>
                    </div>
                </div>


            </div>
        </section>
        @if(Session::get('success'))
        <div class="alert alert-success animateAlert" role="alert" style="position: fixed;
    z-index: 99999;
    top: 0;
    right: 0;
    margin: 20px 14px;">
            {{Session::get('success')}}
            <button type="button closeAlert" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </main>
@endsection
@section('script')
    <script>
        $(".closeAlert").click(function () {
            $(".animateAlert").addClass('d-none');
        })
    </script>
@endsection
