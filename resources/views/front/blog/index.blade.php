@extends('front.blog.layout.header')
@section('title','Blog')
@section('content')
    <section id="main-blog">
        <div class="container py-3">
            <div class="row mb-4 mt-2">
                <div class="col">
                    <h1 class="blog-title d-inline-block">Best Guidance for Best colleges & courses</h1>
                    <a href="#" class="site-btn-1 btn float-end sm-hide" data-bs-toggle="modal"
                       data-bs-target="#blogConsultingModal">Get free consulting</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="blog-mini-title ps-4">Top Article</p>
                </div>
            </div>
            <div class="row">
                @foreach($data as $d => $val)
                    <div class="col-md-4 mb-3">
                        <div class="blog-card">

                            <div class="card-featured-img"
                                 style="background:url({{$val->image != null ? env('MEDIA_URL')."blogs/$val->id/image/$val->image" : "/assets/images/admission-jockey-logo.png"}});background-size: cover;background-position: center;"></div>

                            <div class="px-4 content-box">
                                <a href="/{{$val->seo[0]->permalink}}"><h2 class="blog-title">{{$val->title}}</h2></a>
                                <p><?php
                                    $string = strip_tags($val->content);
                                    if (strlen($string) > 150) {

                                        // truncate string
                                        $stringCut = substr($string, 0, 150);
                                        $endPoint = strrpos($stringCut, ' ');

                                        //if the string doesn't contain any space then it will cut without word basis.
                                        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                        $url = $val->seo[0]->permalink;
                                        $string .= '...';
                                    }
                                    echo $string;
                                    ?><a href="/{{$val->seo[0]->permalink}}">Read More</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="blog-navigation">
                {{$data->links()}}
            </div>
            {{--            <nav aria-label="Page navigation example mt-3">--}}
            {{--                <ul class="pagination justify-content-center">--}}
            {{--                    <li class="page-item disabled">--}}
            {{--                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>--}}
            {{--                    </li>--}}
            {{--                    <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
            {{--                    <li class="page-item active"><a class="page-link" href="#">2</a></li>--}}
            {{--                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
            {{--                    <li class="page-item"><a class="page-link" href="#">4</a></li>--}}
            {{--                    <li class="page-item"><a class="page-link" href="#">5</a></li>--}}
            {{--                    <li class="page-item"><a class="page-link" href="#">6</a></li>--}}
            {{--                    <li class="page-item">--}}
            {{--                        <a class="page-link" href="#">Next</a>--}}
            {{--                    </li>--}}
            {{--                </ul>--}}
            {{--            </nav>--}}

{{--            <div class="row mt-4">--}}
{{--                <div class="col">--}}
{{--                    <p class="blog-mini-title ps-4">Top Videos</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                @foreach(json_decode($option[0]->option_value) as $o => $op)--}}
{{--                    <div class="col-md-4 mb-3 position-relative">--}}
{{--                        <div class="{{$o == 1 ? 'bg-light-p': 'bg-light-o'}} video-box-1" data-bs-toggle="modal"--}}
{{--                             data-bs-target="#Modal{{$op->video}}">--}}
{{--                            <h2 class="position-absolute bottom-0 start-0">{{$op->title}}</h2>--}}
{{--                        </div>--}}

{{--                        <!-- Modal -->--}}
{{--                        <div class="modal fade" id="Modal{{$op->video}}" tabindex="-1"--}}
{{--                             aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                            <div class="modal-dialog modal-dialog-centered modal-lg">--}}
{{--                                <div class="modal-content bg-transparent border-0">--}}
{{--                                    <div class="modal-header py-0 border-0">--}}
{{--                                        <button type="button" class="btn-close" data-bs-dismiss="modal"--}}
{{--                                                aria-label="Close"></button>--}}
{{--                                    </div>--}}

{{--                                    <div class="modal-body">--}}
{{--                                        <iframe width="100%" height="500"--}}
{{--                                                src="https://www.youtube.com/embed/{{$op->video}}"--}}
{{--                                                title="YouTube video player" frameborder="0"--}}
{{--                                                allow="accelerometer;clipboard-write; encrypted-media; gyroscope; picture-in-picture"--}}
{{--                                                allowfullscreen></iframe>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}

{{--            </div>--}}

        </div>

    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3 position-relative">
                    <a href="/loan-form">
                        <div class="action-bg-1"
                             style="background:url(assets/images/site/loan.jpg);background-size: cover;background-position: center;">
                            <div class="position-absolute bottom-0 start-0 text-white">
                                <p class="mb-0 text-uppercase ps-4">sponsored</p>
                                <h3 class="ps-4">Find Students Loan Options <i class="fas fa-arrow-circle-right"></i>
                                </h3>
                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-md-6 mb-3 position-relative">
                    <a href="/hostel-form">
                        <div class="action-bg-1"
                             style="background:url(assets/images/site/hostel.jpg);background-size: cover;background-position: center;">
                            <div class="position-absolute bottom-0 start-0 text-white">
                                <p class="mb-0 text-uppercase ps-4">sponsored</p>
                                <h3 class="ps-4">Find Students Hostel Options <i class="fas fa-arrow-circle-right"></i>
                                </h3>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="blogConsultingModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" id="blogConsultDiloag">
            <div class="modal-content">
                <div class="modal-header border-0 p-1">
                    <button type="button" class="btn-close float-start" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body" id="blogConsultBody">
                    <div class="row">
                                <div class="col-md-12 text-center d-none" id="success-div-popup">
                                    <img src="/assets/images/check.png" class="mb-3" style="width: 10%;">
                                    <h5 style="font-weight: 600;">Thank you for filling out your information!</h5>
                                    <h5 style="font-weight: 600;">Our Expert will connect with you to provide the best guidance!</h5>
                                    <p>Please enjoy, and let us know if there's anything else we can help you with </p>
                                </div>
                                <div id="div-popup-1" class="col-md-6 sm-hide">
                                    <h2 class="pcolor">We provide <br> best guidence </h2>
                                    <img src="assets/images/site/enq-modal.png" width="100%" class="text-center mt-3"
                                         alt="">
                                </div>
                                <div id="div-popup-2" class="col-md-6">
                                    <div class="enq-form bg-white p-3 shadow-0">
                                        <p>Share Your Information</p>
                                        <form id="popup-form" class="footer-needs-validation" novalidate
                                              method="POST">
                                            @csrf
                                            <input type="hidden" name="url" value="{{Request::path()}}">
                                            <div class="mb-2">
                                                <label for="exampleInput" class="form-label">Name</label>
                                                <input type="text" class="form-control" placeholder="Write your Name"
                                                       name="name" id="exampleInput" required>
                                            </div>
                                            <div class="mb-2">
                                                <label for="exampleInputEmail1" class="form-label">Prefered
                                                    Course</label>
                                                <select name="course" id="" class="form-control" required>
                                                    <option value="" disabled selected>Select Course</option>
                                                    @foreach($courses as $c => $vsl)
                                                        @foreach($vsl->children as $s => $vals)
                                                            <option value="{{$vals->id}}">{{$vals->name}}</option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-2">
                                                <label for="exampleInputEmail1" class="form-label">Email Id</label>
                                                <input type="email" class="form-control"
                                                       placeholder="example@example.com" name="email"
                                                       id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                            </div>
                                            <div class="mb-2">
                                                <label for="exampleInputPassword1" class="form-label">Phone No</label>
                                                <input type="text" class="form-control" placeholder="Enter your Number"
                                                       name="contact" id="exampleInputPassword1" required>
                                            </div>
                                            <button type="submit" class="btn site-btn-2 mt-3" id="popup-form-submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
