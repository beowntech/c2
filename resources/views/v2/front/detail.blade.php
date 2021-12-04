@extends('v2.front.layout.header',['schema'=>$data[0]->seo[0]->json_schema])
@section('show',true)
@section('title',$data[0]->name)
@section('description',$data[0]->short_description)
@section('published_on',$data[0]->created_at)
@section('updated_on',$data[0]->updated_at)
@section('featured','https://'.Request::getHost().env('MEDIA_URL').'property/'.$data[0]->id.'/gallery/featured/'.count($data[0]->images) != 0 ? $data[0]->images[0]->featured : '')
@section('canonical',$data[0]->seo[0]->canonical)
@section('author_name',$data[0]->seo[0]->author_name)
@section('keyword',$data[0]->seo[0]->primary_focus_keyword)
@section('reading_time',$data[0]->seo[0]->estimated_reading_time_minutes)
@section('seo_url','https://'.Request::getHost().'/college-in-'.strtolower(str_replace(' ','_',$data[0]->location->cities->name)).'/'.$data[0]->seo[0]->permalink)
@section('content')
<style>
#profileImage {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background: #512DA8;
  font-size: 30px;
  color: #fff;
  text-align: center;
  letter-spacing: -4px;
  line-height: 100px;
  padding-right: 5px;
}
</style>
    @foreach($data as $d => $val)
    <main class="bglg">
        <section class="shadow-sm">
            <div class="container">
                <div class="row py-2">
                    <div class="col-md-6 offset-md-3 position-relative">
                        <form action="{{route('search-college')}}">
                        <input type="search" name="search" class="form-control hero-search site-shadow-sm"
                               placeholder="College Name">
                        <button class="btn btn-search position-absolute top-50 end-20 translate-middle-y"><i
                                class="fas fa-search"></i> Search
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container pb-4 college-detail">
                <div class="row">
                    <div class="col-md-12 position-relative px-0">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @if(is_array(json_decode($val->images[0]->featured)))
                                @foreach(json_decode($val->images[0]->featured) as $i => $img)
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$i}}"
                                        class="{{$i == 0 ? 'active':''}}" aria-current="true" aria-label="Slide 1"></button>
                                @endforeach
                                    @else
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="0"
                                            aria-label="Slide 1"></button>
                                @endif
{{--                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"--}}
{{--                                        aria-label="Slide 2"></button>--}}
{{--                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"--}}
{{--                                        aria-label="Slide 3"></button>--}}
{{--                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"--}}
{{--                                        aria-label="Slide 4"></button>--}}
                            </div>
                            <div class="carousel-inner">
                                @if(is_array(json_decode($val->images[0]->featured)))
                                @foreach(json_decode($val->images[0]->featured) as $i => $img)
                                    <div class="carousel-item {{$i == 0 ? 'active':''}}"
                                         style="background: url({{env('MEDIA_URL')}}property/{{$val->id}}/gallery/featured/{{substr_count($img, '.jpg') || substr_count($img, '.jpeg') || substr_count($img, '.png') || substr_count($val->logo, '.PNG') || substr_count($val->logo, '.JPG') ? $img: $img.'-lg.webp'}});min-height: 55vh;background-position: center;background-size: cover;">
                                    </div>
                                @endforeach
                                @else
                                    <div class="carousel-item active"
                                         style="background: url({{env('MEDIA_URL')}}property/{{$val->id}}/gallery/featured/{{ substr_count($val->images[0]->featured, '.jpg') || substr_count($val->images[0]->featured, '.jpeg') || substr_count($val->images[0]->featured, '.png') || substr_count($val->logo, '.PNG') || substr_count($val->logo, '.JPG') ? $val->images[0]->featured: $val->images[0]->featured.'-lg.webp' }});min-height: 55vh;background-position: center;background-size: cover;">
                                    </div>
                                @endif
{{--                                <div class="carousel-item"--}}
{{--                                     style="background: url('/v2/assets/images/site/banner1.jpg');min-height: 55vh;background-position: center;background-size: cover;">--}}
{{--                                </div>--}}
{{--                                <div class="carousel-item"--}}
{{--                                     style="background: url('/v2/assets/images/site/banner1.jpg');min-height: 55vh;background-position: center;background-size: cover;">--}}
{{--                                </div>--}}
{{--                                <div class="carousel-item"--}}
{{--                                     style="background: url('/v2/assets/images/site/banner1.jpg');min-height: 55vh;background-position: center;background-size: cover;">--}}
{{--                                </div>--}}
{{--                                <div class="carousel-item"--}}
{{--                                     style="background: url('/v2/assets/images/site/banner1.jpg');min-height: 55vh;background-position: center;background-size: cover;">--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="position-absolute bottom-0 start-50 translate-middle-x w-100 detail-bottom-desc">
                            <div class="d-inline-block prop-logo" style="background: white;bottom: 5px;position: absolute;height: 70px;z-index: 99999;">
                               <img src="{{env('MEDIA_URL')}}property/{{$val->id}}/logo/{{ substr_count($val->logo, '.jpg') || substr_count($val->logo, '.jpeg') || substr_count($val->logo, '.png') || substr_count($val->logo, '.PNG') || substr_count($val->logo, '.JPG') ? $val->logo: $val->logo.'-lg.webp' }}"
                                        class="p-2" alt="">
                            </div>
                            {{-- <img src="{{env('MEDIA_URL')}}property/{{$val->id}}/logo/{{ strpos($val->logo, 'png') !== false ? $val->logo: (strpos($val->logo, 'jpg') !== false ?$val->logo:$val->logo.'-lg.webp') }}" class="prop-logo p-2 " alt=""> --}}
                            <ul class="list-unstyled ver-line-menu d-inline-block py-2 text-white float-end">
                                <li class="me-3"><i class="far fa-images"></i> {{count($val->images)}} Picture</li>
                                <li class="me-3"><i class="fas fa-photo-video"></i> 0 Videos</li>
                                <li class="me-3">
                                    @if($reviews != null)
                                        @if(count($reviews) > 0)
                                        <input type="hidden" value="{{$revs = $review}},{{$avg = $reviews->isEmpty() ? 0 : $reviews[0]->avg('stars')}}">
                                        @foreach(range(1,5) as $i)
                                            @if($review > 0)
                                                @if($review >0.5)
                                                    <i class="fa fa-star gcolor" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-star-half-alt gcolor" aria-hidden="true"></i>
                                                @endif
                                            @else
                                                <i class="fa fa-star-o"></i>
                                            @endif
                                            @php $review--;@endphp
                                        @endforeach
                                        {{$avg}}/5  {{count($reviews)}} Reviews
                                        @endif
                                    @endif
{{--                                    <i class="fas fa-star gcolor"></i> --}}
{{--                                    <i class="fas fa-star gcolor"></i>--}}
{{--                                    <i class="fas fa-star gcolor"></i> --}}
{{--                                    <i class="fas fa-star gcolor"></i> --}}
{{--                                    <i class="fas fa-star-half-alt gcolor"></i> --}}
                                </li>
                                {{-- <li class="me-3"> --}}
                                    {{-- <button class="btn site-btn-2 text-secondary py-0">Add Review</button> --}}
                                {{-- </li> --}}
                                <li class="me-3">
                                    <button data-bs-toggle="modal" data-bs-target="#compareModal" data-slug="{{$val->seo[0]->permalink}}" class="btn site-btn-2 py-0">Compare</button>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="col px-0 position-relative">
                        <div class="bg-white college-info px-3 pb-2">
                            <h1 class="py-2 mb-0">{{$val->name}}</h1>
                            <ul class="d-inline-block list-unstyled ver-line-menu text-secondary small">
                                <li class="me-3">Type - {{ $val->college_type == 1 ? 'Public' : ($val->college_type == 2 ? 'Private' : ($val->college_type == 3 ? 'Govt.' : ($val->college_type == 4 ? 'Deemed' : ''))) }}</li>
                                <li class="me-3">Apporved by: {{$val->approved_by}}</li>
                                {{-- <li class="me-3">NIRF Ranking - 12</li> --}}
                                {{-- <li><a href="#">MORE</a></li> --}}
                            </ul>
                            <p class="mb-2 f-14"><i class="fas fa-map-marker-alt"></i> {{$val->location->street_name}}, {{$val->location->cities->name}}, {{$val->location->states->name}}
                                 {{$val->location->pincode}}
                            </p>
                            <p><a href="#"><i class="fas fa-download"></i> Download College Broucher</a></p>
                            <div class="position-absolute bottom-0 end-0 pe-4 pb-3">
                                <a href="{{route('schedule-video-call')}}" class="btn site-btn-4">Schedule Video Call</a>
                                {{-- <button class="btn site-btn-4">Chat with College</button> --}}
                                <button class="btn site-btn-1 openApplyNow" data-id="{{$val->id}}" data-name="{{$val->name}}" data-bs-toggle="modal" data-bs-target="#applyNow">Apply Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-2 mt-3">
                        <ul class="list-unstyled li-md sticky-top mt-3 detail-menu" id="menu-list-detail">
                            <li class="active" id="about-li">
                                @if(request()->more != "")
                                <a href="/{{request()->city}}/{{request()->id}}#about">About</a>
                                @else
                                    <a href="#about">About</a>
                                @endif
                            </li>
                            @if($val->courses->isNotEmpty())
                            <li id="course-li">
                                @if(request()->more != "")
                                    <a href="/{{request()->city}}/{{request()->id}}#courseandfees">Course & Fee</a>
                                @else
                                    <a href="#courseandfees">Course & Fee</a>
                                @endif
                            </li>
                            @endif
{{--                            <li><a href="#ranking">Ranking</a></li>--}}
{{--                            <li><a href="#gallery">Gallery</a></li>--}}
                            @if($val->scholar->isNotEmpty())
                            <li id="scholar-li">
                                @if(request()->more != "")
                                    <a href="/{{request()->city}}/{{request()->id}}#scholorship">Scholorship</a>
                                @else
                                    <a href="#scholorship">Scholarship</a>
                                @endif
                            </li>
                            @endif
                            @if($val->teachers->isNotEmpty())
                            <li id="faculty-li">
                                @if(request()->more != "")
                                    <a href="/{{request()->city}}/{{request()->id}}#faculties">Faculty</a>
                                @else
                                    <a href="#faculties">Faculty</a>
                                @endif
                            </li>
                            @endif
                            @if($hostel->isNotEmpty())
                            <li id="hostel-li">
                                @if(request()->more != "")
                                    <a href="/{{request()->city}}/{{request()->id}}#hostels">Hostel</a>
                                @else
                                    <a href="#hostels">Hostel</a>
                                @endif
                            </li>
                            @endif
{{--                            <li><a href="#placement">Placement</a></li>--}}
{{--                            <li><a href="#facilities">Near By Facilities</a></li>--}}
                        </ul>
                    </div>
                    <div class="col-md-10 mt-3 detail">
                        @if(request()->more != "")
                            @if(request()->more == "about")
                        <div id="about" class="mb-5">
                            <h2 class="ps-3">College Information</h2>
                                <div class="bg-white p-3 detail-border">
                                    {!! $val->description !!}
                                </div>
                        </div>
                            @endif
                        @else
                            <div id="about" class="mb-5">
                                <h2 class="ps-3">College Information</h2>
                                    <div class="bg-white p-3 detail-border">
                                        {!! $val->short_description !!}
                                        <hr>
                                        <div class="text-center">
                                            <a href="/{{request()->city}}/{{request()->id}}/about" class="text-decoration-none txt-color">View More <i
                                                    class="fas fa-chevron-down"></i></a>
                                        </div>
                                    </div>
                            </div>
                        @endif
                            @if($val->courses->isNotEmpty())
                                @if(request()->more != "")
                                    @if(request()->more == "course-and-fees")
                                        <div id="courseandfees" class="mb-5">
                                            <h2 class="ps-3">Fees & Eligibility</h2>
                                            <div class="bg-white p-3 detail-border">
                                                <table class="table table-striped fees-table">
                                                    <thead style=" background: #ffc9ab !important;">
                                                    <tr>
                                                        <td scope="col">Course</td>
                                                        <td scope="col">Fees</td>
                                                        <td scope="col">Eligibility</td>
                                                        <td scope="col"></td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($val->courses as $c => $ca)
                                                        <tr>
                                                            <td>{{$ca->streams[0]->name}}</td>
                                                            <td>
                                                                <i class="fa fa-rupee {{$ca->price == 0 ? "d-none" : ""}}"
                                                                   aria-hidden="true"></i> {{$ca->price == 0 ? "N/A" : $ca->price}}
                                                            </td>
                                                            <td>{{$ca->eligibility}}</td>
                                                            <td><a href="#!" class="btn site-btn-5 openApplyNow" data-id="{{$val->id}}" data-name="{{$val->name}}" data-bs-toggle="modal" data-bs-target="#applyNow">Apply
                                                                    Now</a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {{-- <p><a href="#"><i class="fas fa-download"></i> Download College Broucher</a> --}}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <div id="courseandfees" class="mb-5">
                                        <h2 class="ps-3">Fees & Eligibility</h2>
                                        <div class="bg-white p-3 detail-border">
                                            <table class="table table-striped fees-table">
                                                <thead style=" background: #ffc9ab !important;">
                                                <tr>
                                                    <td scope="col">Course</td>
                                                    <td scope="col">Fees</td>
                                                    <td scope="col">Eligibility</td>
                                                    <td scope="col"></td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($val->courses as $c => $ca)
                                                    @if($c < 5)
                                                        <tr>
                                                            <td>{{$ca->streams[0]->name}}</td>
                                                            <td>
                                                                <i class="fa fa-rupee {{$ca->price == 0 ? "d-none" : ""}}"
                                                                   aria-hidden="true"></i> {{$ca->price == 0 ? "N/A" : $ca->price}}
                                                            </td>
                                                            <td>{{$ca->eligibility}}</td>
                                                            <td><a href="#!" class="btn site-btn-5 openApplyNow" data-id="{{$val->id}}" data-name="{{$val->name}}" data-bs-toggle="modal" data-bs-target="#applyNow">Apply
                                                                    Now</a></td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{-- <p><a href="#"><i class="fas fa-download"></i> Download College Broucher</a> --}}
                                            </p>
                                            <hr>
                                            <div class="text-center">
                                                <a href="/{{request()->city}}/{{request()->id}}/course-and-fees" class="text-decoration-none txt-color">View More <i
                                                        class="fas fa-chevron-down"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                    <!-- <div id="ranking" class="mb-5">
                             <h2 class="ps-3">Ranking</h2>
                            <div class="bg-white p-3">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda, nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum, vero!</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda, nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum, vero!</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda, nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum, vero!</p>
                            </div>
                        </div>

                        <div id="gallery" class="mb-5">
                             <h2 class="ps-3">Gallery</h2>
                            <div class="bg-white p-3">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda, nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum, vero!</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda, nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum, vero!</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda, nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum, vero!</p>
                            </div>
                        </div>
                        -->
                        @if($val->scholar->isNotEmpty())
                                @if(request()->more != "")
                                    @if(request()->more == "scholarship")
                        <div id="scholorship" class="mb-5">
                            <h2 class="ps-3">Scholarship</h2>
                            <div class="bg-white p-3 detail-border">
                                <button class="btn site-btn-5 mb-4 openApplyNow" data-id="{{$val->id}}" data-name="{{$val->name}}" data-bs-toggle="modal" data-bs-target="#applyNow">Apply for Scholorship</button>
                                @foreach($val->scholar as $d)
                                    {!! $d->content !!}<br>
                                @endforeach
                            </div>
                        </div>

                                    @endif
                                    @else
                                    <div id="scholorship" class="mb-5">
                                        <h2 class="ps-3">Scholarship</h2>
                                        <div class="bg-white p-3 detail-border">
                                            <button class="btn site-btn-5 mb-4 openApplyNow" data-id="{{$val->id}}" data-name="{{$val->name}}" data-bs-toggle="modal" data-bs-target="#applyNow">Apply for Scholorship</button>
                                            @foreach($val->scholar as $d)
                                                {!! $d->content !!}<br>
                                            @endforeach
                                            <hr>
                                            <div class="text-center">
                                                <a href="/{{request()->city}}/{{request()->id}}/scholarship" class="text-decoration-none txt-color">View More <i
                                                        class="fas fa-chevron-down"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        <div class="container px-3 my-3">
                            <div class="row">
                                <div class="col-md-6 mb-3 position-relative">
                                    <a href="/blog/loan-form">
                                        <div class="action-bg-1"
                                             style="background:url(/v2/assets/images/site/hostel.jpg);background-size: cover;background-position: center;">
                                            <div class="position-absolute bottom-0 start-0 text-white">
                                                <p class="mb-0 text-uppercase ps-4 f-14">sponsored</p>
                                                <h3 class="ps-4 f-18">Find Students Loan Options <i
                                                        class="fas fa-arrow-circle-right" aria-hidden="true"></i>
                                                </h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 mb-3 position-relative">
                                    <a href="/blog/hostel-form">
                                        <div class="action-bg-1"
                                             style="background:url(/v2/assets/images/site/hostel.jpg);background-size: cover;background-position: center;">
                                            <div class="position-absolute bottom-0 start-0 text-white">
                                                <p class="mb-0 text-uppercase ps-4 f-14">sponsored</p>
                                                <h3 class="ps-4 f-16">Find Students Hostel Options <i
                                                        class="fas fa-arrow-circle-right" aria-hidden="true"></i>
                                                </h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                            @if($val->teachers->isNotEmpty())
                                @if(request()->more == "")
                                <div id="faculties" class="mb-5">
                                    <h2 class="ps-3">Faculty Details</h2>
                                    <div class="bg-white p-3 detail-border">
                                        {{-- <div class="row">
                                            <div class="col-md-6  my-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <div id="profileImage"></div>
                                                        {{-- <img src="/v2/assets/images/site/f-img.jpg" alt="..."> --}}
                                                    {{-- </div> --}}
                                                    {{-- <div class="flex-grow-1 ms-3"> --}}
                                                        {{-- <p class="mb-0 pcolor">Prof. (Dr.) Rakesh Kumar Sharma</p> --}}
                                                        {{-- <p>Vice Chancelor</p> --}}
                                                    {{-- </div> --}}
                                                {{-- </div> --}}
                                            {{-- </div> --}}
                                        {{-- </div> --}}
                                        <div class="row">
                                            @foreach($val->teachers as $f => $fa)
                                                <div class="col-md-5 faculty">
                                                    <div class="d-flex align-items-center my-2">
                                                        <div class="flex-shrink-0 ">
                                                            <div id="profileImage" style="background: {{sprintf('#%06X', mt_rand(0, 0xFFFFFF))}}">
                                                                {{substr(str_replace(['Dr. ','Mr. ','Mrs. ','Ms. '],['','','',''],$fa->name),0,1)}}
                                                                @if(count(explode(' ',str_replace(['Dr. ','Mr. ','Mrs. ','Ms. '],['','','',''],$fa->name))) > 1)
                                                                {{substr(explode(' ',str_replace(['Dr. ','Mr. ','Mrs. ','Ms. '],['','','',''],$fa->name))[1],0,1)}}
                                                                @endif
                                                            </div>
                                                            {{-- <img src="/v2/assets/images/site/f-img.jpg" --}}
                                                                 {{-- class="faculty-avatar w-100" --}}
                                                                 {{-- alt="..."> --}}
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <p class="pcolor f-16 fw-6">{{$fa->name}}</p>
                                                            <p>Professor, Department of {{$fa->department}}</p>
                                                            <p>Qualification - {{$fa->qualification}}</p>
                                                            <p>Subject Experties - {{$fa->designation}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endif

                            @if($hostel->isNotEmpty())
                                @if(request()->more != "")
                                    @if(request()->more == "hostel")
                                        <div id="hostels" class="mb-5">
                                            <h2 class="ps-3">Hostel</h2>
                                            <div class="bg-white p-3 detail-border">
                                                @foreach($hostel as $h => $ha)
                                                    {!! $ha->html !!}
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <div id="hostels" class="mb-5">
                                        <h2 class="ps-3">Hostel</h2>
                                        <div class="bg-white p-3 detail-border">
                                            @foreach($hostel as $h => $ha)
                                                {!! $ha->html !!}
                                            @endforeach
                                            <hr>
                                            <div class="text-center">
                                                <a href="/{{request()->city}}/{{request()->id}}/hostel" class="text-decoration-none txt-color">View More <i
                                                        class="fas fa-chevron-down"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif

                        <!-- <div id="placement" class="mb-5">
                             <h2 class="ps-3">Placement</h2>
                            <div class="bg-white p-3 detail-border">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda, nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum, vero!</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda, nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum, vero!</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda, nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum, vero!</p>
                            </div>
                        </div> -->
{{--                        @if($reviews != null)--}}
{{--                            @if(count($reviews) > 0)--}}
{{--                                <div id="review" class="mb-5">--}}
{{--                                    <h2 class="ps-3">Reviews</h2>--}}
{{--                                    <div class="bg-white p-3 detail-border">--}}
{{--                                        <p class="f-16 fw-6">College Rating</p>--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-md-5">--}}
{{--                                                <span class="f-38 fw-6">8.5</span> out of 10--}}
{{--                                                <br>--}}
{{--                                                <i class="fas fa-graduation-cap gcolor"></i>--}}
{{--                                                <i class="fas fa-graduation-cap gcolor"></i>--}}
{{--                                                <i class="fas fa-graduation-cap gcolor"></i>--}}
{{--                                                <i class="fas fa-graduation-cap gcolor"></i>--}}
{{--                                                <i class="fas fa-graduation-cap gcolor"></i>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-7">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-md-4 mb-2">--}}
{{--                                                        <p class="mb-0">9.0/10</p>--}}
{{--                                                        <p class="mb-0 f-14">Academic</p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-4 mb-2">--}}
{{--                                                        <p class="mb-0">9.0/10</p>--}}
{{--                                                        <p class="mb-0 f-14">Acomodation</p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-4 mb-2">--}}
{{--                                                        <p class="mb-0">9.0/10</p>--}}
{{--                                                        <p class="mb-0 f-14">Faculty</p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-4 mb-2">--}}
{{--                                                        <p class="mb-0">9.0/10</p>--}}
{{--                                                        <p class="mb-0 f-14">Infrastructure</p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-4 mb-2">--}}
{{--                                                        <p class="mb-0">9.0/10</p>--}}
{{--                                                        <p class="mb-0 f-14">Placement</p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-4 mb-2">--}}
{{--                                                        <p class="mb-0">9.0/10</p>--}}
{{--                                                        <p class="mb-0 f-14">Social Life</p>--}}
{{--                                                    </div>--}}

{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <hr>--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-md-2">--}}

{{--                                            </div>--}}
{{--                                            <div class="col-md-8">--}}

{{--                                            </div>--}}
{{--                                            <div class="col-md-2">--}}

{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                        <p>Remarks: Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae--}}
{{--                                            assumenda, nesciunt libero, consequuntur voluptatem ullam iure vero--}}
{{--                                            provident id--}}
{{--                                            accusantium dolore, cum cupiditate ratione recusandae quaerat velit--}}
{{--                                            perspiciatis.--}}
{{--                                            Harum, vero!</p>--}}
{{--                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae--}}
{{--                                            assumenda,--}}
{{--                                            nesciunt libero, consequuntur voluptatem ullam iure vero provident id--}}
{{--                                            accusantium--}}
{{--                                            dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum,--}}
{{--                                            vero!</p>--}}
{{--                                        <div class="row mt-2">--}}
{{--                                            <div class="col-md-2 mb-2">--}}
{{--                                                <p class="mb-0 scolor">9.0/10</p>--}}
{{--                                                <p class="mb-0 f-14">Academic</p>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-2 mb-2">--}}
{{--                                                <p class="mb-0 scolor">9.0/10</p>--}}
{{--                                                <p class="mb-0 f-14">Acomodation</p>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-2 mb-2">--}}
{{--                                                <p class="mb-0 scolor">9.0/10</p>--}}
{{--                                                <p class="mb-0 f-14">Faculty</p>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-2 mb-2">--}}
{{--                                                <p class="mb-0 scolor">9.0/10</p>--}}
{{--                                                <p class="mb-0 f-14">Infrastructure</p>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-2 mb-2">--}}
{{--                                                <p class="mb-0 scolor">9.0/10</p>--}}
{{--                                                <p class="mb-0 f-14">Placement</p>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-2 mb-2">--}}
{{--                                                <p class="mb-0 scolor">9.0/10</p>--}}
{{--                                                <p class="mb-0 f-14">Social Life</p>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                        <hr>--}}
{{--                                        <div class="text-center">--}}
{{--                                            <a href="#" class="text-decoration-none txt-color">View More <i--}}
{{--                                                    class="fas fa-chevron-down"></i></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        @endif--}}

                    </div>
                </div>
            </div>
        </section>
    </main>
    @endforeach
@endsection
@section('modal')
@include('v2.front.modal.compare')
@include('v2.front.modal.applynow')
@endsection
@section('script')
    <script>
        $(document).on("click", ".openApplyNow", function () {
            var form = $("#apply-now");
            form[0].reset();
            var id = $(this).data('id');
            var name = $(this).data('name');
            form.removeClass('d-none');
            $("#success-div").html("");

            $("#applyNow .modal-body #propID").val(id);
            $("#applyNow .modal-body #propName").val(name);
        });
    </script>
    <script>
        $(document).ready(function()
        {
            $('#menu-list-detail li').click(function(e){
                //clickHandler();
                $('#menu-list-detail li').removeClass('active');
                $(this).addClass('active');
            });
            if(window.location.hash == "#about"){
                $('#menu-list-detail li').removeClass('active');
                $("#about-li").addClass('active');
            }else if(window.location.hash == "#courseandfees"){
                $('#menu-list-detail li').removeClass('active');
                $("#course-li").addClass('active');
            }else if(window.location.hash == "#scholorship"){
                $('#menu-list-detail li').removeClass('active');
                $("#scholar-li").addClass('active');
            }else if(window.location.hash == "#faculties"){
                $('#menu-list-detail li').removeClass('active');
                $("#faculty-li").addClass('active');
            }else if(window.location.hash == "#hostels"){
                $('#menu-list-detail li').removeClass('active');
                $("#hostel-li").addClass('active');
            }

        });

        // Here's the handler
        function clickHandler() {
            var dots = document.querySelectorAll("li");
            for (var n = 0; n < dots.length; ++n) {
                    dots[n].className = "";
            }
        }
    </script>
@endsection
