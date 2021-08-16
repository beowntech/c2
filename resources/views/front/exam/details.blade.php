@extends('front.layout.header')
@section('content')
    @foreach($data as $d => $val)
<div class="bg-light" id="detail-page">
    <section class="pb-2" style="background:url(/exams/{{$val->exam_image}});background-size:cover;background-repeat: no-repeat;
    background-position: center;box-shadow: inset 0 0 0 2000px rgba(2, 20, 57, 0.72);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/exam">Exam</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$val->exam_name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row college-short-info">
                  <div class="col-md-2 col-xs-12">
                    <div class="box d-inline-block">
                        <a href=""> <img src="/exams/{{$val->exam_image}}" class="detail-logo" alt=""></a>
                    </div>
                </div>
                <div class="col-md-10 col-xs-12 bg-transparent py-2">

                    <h1>{{$val->exam_name}} </h1>

                    <div class="mt-3">
</div>

                </div>

            </div>
        </div>
    </section>


    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div id="collegeDesc" class="college-data px-2 py-3 mb-3 bg-white">
                        <div id="mainDesc">
                    {!! $val->exam_description !!}
                    </div>
                    <div id="viewDesc" style="display:none">
                        {!! $val->exam_description !!}
                        </div>
                        <p class="text-center mt-2 mb-1"><a id="overview1" href="#!" class="site-link">View All</a></p>
                    </div>

                </div>

                <div class="col-md-3">
                    <div class="mb-3 py-2 text-center">
                        <a href="#" class="btn site-btn-1 btn-lg text-white font-weight-bold">Talk To Counselor <i class="fas fa-headset blink-element clr-first"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </section>


{{--    <section class="my-4 py-4 bg-white">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}
{{--                <div class="col">--}}
{{--                    <h1 class="site-title">Featured Colleges</h1>--}}
{{--                    <p class="title-desc">Explore Top of the best Colleges / Exams By Categories. </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                @foreach($featured as $f => $fea)--}}
{{--                    @if($fea->featured == 1)--}}
{{--                <div class="col-md-3 p-3">--}}
{{--                    <div class="college-info-1">--}}
{{--                        <div class="cover-img position-relative box" style="background:url(/property/{{$fea->id}}/gallery/featured/{{$fea->images[0]->featured}});background-size:cover;"><div class="ribbon"><span>featured</span></div>--}}
{{--                            <div class="college-info-logo"><img src="/property/{{$fea->id}}/logo/{{$fea->logo}}" alt=""></div>--}}
{{--                            <div class="college-info-name position-absolute bottom-0 start-0 px-2 pb-1">--}}
{{--                                <p><a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($fea->cities[0]->name)))}}/{{$fea->seo[0]->permalink}}">{{$fea->name}}</a></p>--}}
{{--                                <span><i class="fas fa-map-marker-alt"></i> {{$fea->state[0]->name}}</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="college-info px-2 pt-1">--}}
{{--                            <p class="font-weight-bold p1">{{$fea->courses->isEmpty() ? "MBA" : $fea->courses[0]->name}} <span class="badge bg-warning float-end"><i class="far fa-star"></i> {{$fea->review->isEmpty() ? "0.0" : $fea->review[0]->avg('stars')}}</span></p>--}}
{{--                            <p class="float-end small p2"> <a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($fea->cities[0]->name)))}}/{{$fea->seo[0]->permalink}}">  VIEW ALL COURSES & FEES</a> </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                    @else--}}
{{--                        <div class="col-md-3 p-3">--}}
{{--                            <div class="college-info-1">--}}
{{--                                 <div class="cover-img position-relative" style="background:url(/property/{{$fea->id}}/gallery/featured/{{$fea->images[0]->featured}});background-size:cover;">--}}
{{--                                    <div class="college-info-logo"><img src="/property/{{$fea->id}}/logo/{{$fea->logo}}" alt=""></div>--}}
{{--                                    <div class="college-info-name position-absolute bottom-0 start-0 px-2 pb-1">--}}
{{--                                        <p><a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($fea->cities[0]->name)))}}/{{$fea->seo[0]->permalink}}">{{$fea->name}}</a></p>--}}
{{--                                        <span><i class="fas fa-map-marker-alt"></i> {{$fea->state[0]->name}}</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="college-info px-2 pt-1">--}}
{{--                                    <p class="font-weight-bold p1">{{$fea->courses->isEmpty() ? "MBA" : $fea->courses[0]->name}} <span class="badge bg-warning float-end"><i class="far fa-star"></i> {{$fea->review->isEmpty() ? "0.0" : $fea->review[0]->avg('stars')}}</span></p>--}}
{{--                                    <p class="float-end small p2"> <a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($fea->cities[0]->name)))}}/{{$fea->seo[0]->permalink}}">  VIEW ALL COURSES & FEES</a> </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- Modal -->--}}
{{--    <div class="modal fade" id="claimModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-centered modal-lg">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabel">How Okadmission Helps you?</h5>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-4 bg-light pb-3">--}}
{{--                            <img src="/assets/images/site/popup-img.png" width="100%" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-8">--}}
{{--                            <h2 class="site-title text-start">Claim Now To Own</h2>--}}
{{--                            <h3 class="site-title-sm text-start"> College Name, Location</h3>--}}
{{--                            <hr>--}}
{{--                            <form action="">--}}
{{--                                <div class="row mb-2">--}}
{{--                                    <div class="col">--}}
{{--                                        <input type="text" class="form-control" placeholder="Full Name">--}}
{{--                                    </div>--}}
{{--                                    <div class="col">--}}
{{--                                        <input type="text" class="form-control" placeholder="Email Address">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col">--}}
{{--                                        <div class="input-group mb-3">--}}
{{--                                            <span class="input-group-text" id="basic-addon1">+91</span>--}}
{{--                                            <input type="number" class="form-control" placeholder="Contact Number" aria-describedby="basic-addon1">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col">--}}
{{--                                        <input type="text" class="form-control" placeholder="City">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <p class="small">By submitting this form, you accept and agree to our <a href="#">Terms of Use</a> .</p>--}}
{{--                                <p><a href="#"> Already Registered? Click Here To Login.</a> <button type="button" class="btn site-btn-2 btn-sm float-end">Claim</button></p>--}}
{{--                            </form>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
@endforeach
@endsection
