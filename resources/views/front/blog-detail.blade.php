@extends('front.layout.header',['schema'=>$data[0]->seo[0]->json_schema])
@section('show',true)
@section('title',$data[0]->title)
@section('description',$data[0]->seo[0]->description)
@section('published_on',$data[0]->created_at)
@section('updated_on',$data[0]->update_at)
@section('featured','/blog/'.$data[0]->id.'/image/'.$data[0]->image)
@section('canonical',$data[0]->seo[0]->canonical)
@section('keyword',$data[0]->seo[0]->primary_focus_keyword)
{{--@section('author_name','Deb Jyoti Shah')--}}
@section('seo_url','https://'.Request::getHost())
@section('content')
<div class="bg-light">
@foreach($data as $d => $val)
<section class="py-4">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/search?catg={{$val->catg[0]->name}}">{{$val->catg[0]->name}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$val->title}}</li>
                </ol>
            </nav>

            <div class="col-md-9">
                <div class="college-data px-2 py-3 mb-3 bg-white">
                    <h2>{{$val->title}}</h2>
                    <!-- feartured image                -->
                    <img src="/blog/{{$val->id}}/image/{{$val->image}}" class="w-100 mb-3" alt="" srcset="">
                {!! $val->content !!}
                </div>
                 <div class="college-data px-2 py-3 mb-3 bg-white">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="/assets/images/admission-jockey-logo.png" class="p-3" width="150px" alt="Admission Jockey">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h3>Post By Admission Jockey</h3>
                            This is some content from a media component. You can replace this with any content and adjust it as needed.
                            <ul class="list-inline social-links">
                                <li class="list-inline-item"><a href="https://www.facebook.com/admissionjockey" target="_blank"><i class="fab fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="https://www.instagram.com/admissionjockeyofficial/"target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="https://twitter.com/admissionjockey" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="https://www.linkedin.com/company/admission-jockey/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                 </div>

            </div>

            <div class="col-md-3">
                <div class="mb-3 py-2 text-center">
                    <a href="#" class="btn site-btn-1 btn-lg text-white font-weight-bold">Talk To Counselor <i class="fas fa-headset blink-element clr-first"></i></a>
                </div>
                <div class="mb-3 bg-white text-center py-3">
                <h2 class="site-title-sm mb-2">Follow & Share on<span class="clr-second"> Social Media.</span> </h2>
                    <ul class="list-inline social-links">
                        <li class="list-inline-item"><a href="https://www.facebook.com/admissionjockey" target="_blank"><i class="fab fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/admissionjockeyofficial/"target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="https://twitter.com/admissionjockey" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.linkedin.com/company/admission-jockey/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                    </ul>
                </div>

                <div class="mb-3 bg-white text-center py-3">
                    <h2 class="site-title-sm mb-2">Interested in  <span class="clr-second"> {{$val->catg[0]->name}}</span> </h2>

                    <a href="#review" class="btn site-transparent-btn-1 btn-sm text-white">Ask Question</a>
                </div>

                <div class="mb-3 bg-white">

                    <h2 class="site-title-sm">You May <span class="clr-second"> Like</span> This</h2>
                    @foreach($related as $r => $rel)
                    <div class="col-md-12 p-3">
                        <div class="college-info-1">
                            <div class="cover-img position-relative" style="background:url(/blog/{{$val->id}}/image/{{$val->image}});background-size:cover;">

                                <div class="college-info-name position-absolute bottom-0 start-0 px-2 pb-1">
                                    <p><a href="/{{$rel->seo[0]->permalink}}">{{$rel->title}}</a></p>

                                </div>
                            </div>
                            <div class="college-info px-2 pt-1">
                                 <p class="float-end small p2"> <a href="/{{$rel->seo[0]->permalink}}">  Read Blog... </a> </p>
                            </div>
                        </div>

                    </div>

                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</section>
    @endforeach
</div>
<section class="my-4 py-4 bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1 class="site-title">May Be You Like This</h1>
                <p class="title-desc">Explore Top of the best Colleges / Exams By Categories. </p>
            </div>
        </div>
        <div class="row">
           @foreach($colleges as $c => $ca)
               @if($ca->featured == 1)
                <div class="col-md-3 p-3">
                    <div class="college-info-1">
                        <div class="cover-img position-relative box" style="background:url(/property/{{$ca->id}}/gallery/featured/{{$ca->images[0]->featured}});background-size:cover;">
                            <div class="ribbon"><span>featured</span></div>
                            <div class="college-info-logo"><img src="/property/logo/images/{{$ca->logo}}" alt=""></div>
                            <div class="college-info-name position-absolute bottom-0 start-0 px-2 pb-1">
                                <p><a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($ca->location[0]->cities[0]->name)))}}/{{$ca->seo[0]->permalink}}">{{$ca->name}}</a></p>
                                <span><i class="fas fa-map-marker-alt"></i> {{$ca->location[0]->states[0]->name}}</span>
                            </div>
                        </div>
                        <div class="college-info px-2 pt-1">
                            <p class="font-weight-bold p1">MBA/PGDM <span class="badge bg-warning float-end"><i class="far fa-star"></i> 10</span></p>
                            <p class="float-end small p2"> <a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($ca->cities[0]->name)))}}/{{$ca->seo[0]->permalink}}">  VIEW ALL COURSES & FEES</a> </p>
                        </div>
                    </div>
                </div>
                @else
                    <div class="col-md-3 p-3">
                        <div class="college-info-1">
                            <div class="cover-img position-relative " style="background:url(/property/{{$ca->id}}/gallery/featured/{{$ca->images[0]->featured}});background-size:cover;">
                                <div class="college-info-logo"><img src="/property/logo/images/{{$ca->logo}}" alt=""></div>
                                <div class="college-info-name position-absolute bottom-0 start-0 px-2 pb-1">
                                    <p><a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($ca->location[0]->cities[0]->name)))}}/{{$ca->seo[0]->permalink}}">{{$ca->name}}</a></p>
                                    <span><i class="fas fa-map-marker-alt"></i>  {{$ca->location[0]->states[0]->name}}</span>
                                </div>
                            </div>
                            <div class="college-info px-2 pt-1">
                                <p class="font-weight-bold p1">MBA/PGDM <span class="badge bg-warning float-end"><i class="far fa-star"></i> 10</span></p>
                                <p class="float-end small p2"> <a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($ca->location[0]->cities[0]->name)))}}/{{$ca->seo[0]->permalink}}">  VIEW ALL COURSES & FEES</a> </p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            </div>
    </div>
</section>
@endsection
