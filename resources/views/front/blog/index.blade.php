@extends('front.blog.layout.header')
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
                                 style="background:url({{$val->image != null ? env('MEDIA_URL')."blog/$val->id/image/$val->image" : "/assets/images/admission-jockey-logo.png"}});background-size: cover;background-position: center;"></div>

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

            <div class="row mt-4">
                <div class="col">
                    <p class="blog-mini-title ps-4">Top Videos</p>
                </div>
            </div>
            <div class="row">
                @foreach(json_decode($option[0]->option_value) as $o => $op)
                    <div class="col-md-4 mb-3 position-relative">
                        <div class="{{$o == 1 ? 'bg-light-p': 'bg-light-o'}} video-box-1" data-bs-toggle="modal"
                             data-bs-target="#Modal{{$op->video}}">
                            <h2 class="position-absolute bottom-0 start-0">{{$op->title}}</h2>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="Modal{{$op->video}}" tabindex="-1"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content bg-transparent border-0">
                                    <div class="modal-header py-0 border-0">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <iframe width="100%" height="500"
                                                src="https://www.youtube.com/embed/{{$op->video}}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer;clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>

    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3 position-relative">
                    <a href="/hostel-form">
                        <div class="action-bg-1"
                             style="background:url(assets/images/site/cover2.jpg);background-size: cover;background-position: center;">
                            <div class="position-absolute bottom-0 start-0 text-white">
                                <p class="mb-0 text-uppercase ps-4">sponcered</p>
                                <h3 class="ps-4">Find Students Loan Options <i class="fas fa-arrow-circle-right"></i>
                                </h3>
                            </div>

                        </div>
                    </a>
                </div>

                <div class="col-md-6 mb-3 position-relative">
                    <a href="/loan-form">
                        <div class="action-bg-1"
                             style="background:url(assets/images/site/cover2.jpg);background-size: cover;background-position: center;">
                            <div class="position-absolute bottom-0 start-0 text-white">
                                <p class="mb-0 text-uppercase ps-4">sponcered</p>
                                <h3 class="ps-4">Find Students Hostel Options <i class="fas fa-arrow-circle-right"></i>
                                </h3>
                            </div>

                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>
@endsection
