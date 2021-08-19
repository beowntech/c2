@extends('front.layout.header',['schema'=>$data[0]->seo[0]->json_schema])
@section('show',true)
@section('title',$data[0]->name)
@section('description',$data[0]->short_description)
@section('published_on',$data[0]->created_at)
@section('updated_on',$data[0]->updated_at)
@section('featured','https://'.Request::getHost().env('MEDIA_URL').'property/'.$data[0]->id.'/gallery/featured/'.$data[0]->images[0]->featured)
@section('canonical',$data[0]->seo[0]->canonical)
@section('author_name',$data[0]->seo[0]->author_name)
@section('keyword',$data[0]->seo[0]->primary_focus_keyword)
@section('reading_time',$data[0]->seo[0]->estimated_reading_time_minutes)
@section('seo_url','https://'.Request::getHost().'/college-in-'.strtolower(str_replace(' ','_',$data[0]->location[0]->cities[0]->name)).'/'.$data[0]->seo[0]->permalink)
@section('content')
    @foreach($data as $d => $val)
        <div class="bg-light" id="detail-page">
            <section class="pb-2"
                     style="background:url({{env('MEDIA_URL')}}property/{{$val->id}}/gallery/featured/{{$val->images[0]->featured}}-lg.webp);background-size:cover;background-repeat: no-repeat;
                         background-position: center;box-shadow: inset 0 0 0 2000px rgba(2, 20, 57, 0.72);">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item"><a href="/search?catg={{$catg[0]->name}}">{{$catg[0]->name}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$val->name}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row college-short-info">
                        <div class="col-md-2 col-xs-12">
                            <div class="box d-inline-block">
                                <a href=""> <img src="{{env('MEDIA_URL')}}property/{{$val->id}}/logo/{{$val->logo}}-xl.webp" class="detail-logo"
                                                 alt=""></a>
                                @if($val->featured == 1)
                                    <div class="ribbon"><span>featured</span></div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-10 col-xs-12 bg-transparent py-2">

                            <h1>{{$val->name}}, {{$val->location[0]->cities[0]->name}} </h1>
                            <p>ESTD {{$val->established_on}}, <i class="fas fa-certificate"></i> University</p>
                            <p><i class="fas fa-map-marker-alt"></i> {{$val->location[0]->street_name}}
                                , {{$val->location[0]->local_area}}, {{$val->location[0]->cities[0]->name}}, {{$val->location[0]->states[0]->name}}
                                , {{$val->location[0]->pincode}}</p>
                            <p class="golden-color">
                                @if($reviews != null)
                                    <input type="hidden"
                                           value="{{$revs = $review}},{{$avg = $reviews->isEmpty() ? 0 : $reviews[0]->avg('stars')}}">
                                    @foreach(range(1,5) as $i)
                                        @if($review >0)
                                            @if($review >0.5)
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            @else
                                                <i class="fa fa-star-half-alt" aria-hidden="true"></i>
                                            @endif
                                        @else
                                            <i class="fa fa-star-o"></i>
                                        @endif
                                        @php $review--;@endphp
                                    @endforeach
                                    {{$avg}}/5
                                @endif
                            </p>

                            <div class="mt-3">
                                <a href="#review" class="btn site-transparent-btn-1 btn-sm text-white">Write a
                                    Review</a>
                                <a href="#" class="btn site-btn-1 btn-sm text-white quickEnquiryDetail"
                                   data-bs-toggle="modal" data-id="{{$val->id}}" data-name="{{$val->name}}"
                                   data-location="{{$val->location[0]->cities[0]->name}}" data-bs-target="#exampleModal">Quick Enquiry</a>
                                <a href="#" class="btn site-btn-1 btn-sm text-white">Download Browchure</a>
                                <button type="button" class="btn site-btn-2 btn-sm openCompare" data-id="{{$val->id}}"
                                        data-name="{{$val->name}}" data-image="{{$val->logo}}">Compare
                                </button>
{{--                                <span class="float-end small"><a href="" class="text-decoration-none"--}}
{{--                                                                 data-bs-toggle="modal" data-bs-target="#claimModal"><i--}}
{{--                                            class="fas fa-circle blink-element-fast"></i> Claim this college </a></span>--}}
                            </div>

                        </div>

                    </div>
                </div>
            </section>

            <section>
                <div class="container mt-3">
                    <button type="button" class="btn site-btn-1 btn-sm active" id="Alloverview">Overview</button>
                    <button type="button" class="btn site-btn-2 btn-sm active" id="overview">Description</button>
                    <button type="button" class="btn site-btn-2 btn-sm" data-id="{{$val->id}}" id="coursesfees">Courses
                        & Fees
                    </button>
                    <button type="button" class="btn site-btn-2 btn-sm" id="gallery">Gallery</button>
                    <button type="button" class="btn site-btn-2 btn-sm" id="placement">Placement</button>
                    <button type="button" class="btn site-btn-2 btn-sm" id="scholarshipB">Scholarship</button>
                    <button type="button" class="btn site-btn-2 btn-sm" id="faculty">Faculty</button>
                    <button type="button" class="btn site-btn-2 btn-sm" id="hostel">Hostel</button>
                </div>
            </section>

            <section class="py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div id="collegeDesc" class="college-data px-2 py-3 mb-3 bg-white">
                                <h2>College Overview</h2>
                                <div id="mainDesc">
                                    {!! $val->short_description !!}
                                </div>
                                <div id="viewDesc" style="display:none">
                                    {!! $val->description !!}
                                </div>
                                <p class="text-center mt-2 mb-1"><a id="overview1" href="#!" class="site-link">View
                                        All</a></p>
                            </div>

                            <div id="collegeCourse" class="college-data  px-2 py-3 mb-3 bg-white">
                                <h2>Available Courses <span class="float-end">{{$val->courses->count()}}</span></h2>
                                <div class="row">
                                    <div id="mainCourse" class="col table-responsive">
                                        <table class="table table-striped table-bordered ">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Course</th>
                                                <th scope="col">Years</th>
                                                <th scope="col">Fees (1<sup>st</sup>yr)</th>
                                                <th scope="col">Eligibility</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($val->courses->isNotEmpty())
                                            @foreach($val->courses as $c => $ca)
                                                @if($c < 5)
                                                <tr>
                                                    <th scope="row">{{$c + 1}}</th>
                                                    <td>{{$ca->streams[0]->name}}</td>
                                                    <td>{{$ca->year}} Years</td>
                                                    <td><i class="fa fa-rupee {{$ca->price == 0 ? "d-none" : ""}}"
                                                           aria-hidden="true"></i> {{$ca->price == 0 ? "N/A" : $ca->price}}
                                                    </td>
                                                    <td>{{$ca->eligibility}}</td>
                                                    <td><a href="#!"  class="btn site-btn-1 btn-sm text-white py-1 quickEnquiryDetail"
                                                           data-bs-toggle="modal" data-id="{{$val->id}}" data-name="{{$val->name}}"
                                                           data-location="{{$val->location[0]->cities[0]->name}}" data-bs-target="#exampleModal">Apply
                                                            Now</a></td>
                                                </tr>
                                                @endif
                                            @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="viewCourse" style="display: none;" class="col">
                                    </div>
                                </div>
                                <p class="text-center mt-2 mb-1"><a id="coursesfees1" data-id="{{$val->id}}" href="#!"
                                                                    class="site-link">View All Courses</a></p>
                            </div>
                            <div id="collegeFaculty" class="college-data  px-2 py-3 mb-3 bg-white">
                                <h2>Faculty
{{--                                                                <span class="float-end">{{$course->count()}}</span>--}}
                                </h2>
                                <div class="row">
                                    <div id="mainFaculty" class="col">
                                        <div class="list-group">
                                            @if($val->teachers->isNotEmpty())
                                                @foreach($val->teachers as $f => $fa)
                                                    @if($f < 4)
                                                        <div class="list-group-item  flex-column align-items-start"
                                                             style="    border-bottom: 1px solid #00000012;">
                                                            <div class="d-flex w-100 justify-content-between">
                                                                <h5 class="mb-1">{{$fa->name}}</h5>
{{--                                                                                                            <small>3 days ago</small>--}}
                                                            </div>
                                                            <p class="mt-1"
                                                               style="margin: 0;color: #ff5b00;font-weight: bold;font-size: 12px;">
                                                                {{$fa->designation}}, Department of {{$fa->department}}
                                                                <br>
                                                            <div style="color:green;font-size: 14px;">Subject
                                                                Expertize: {{$fa->qualification}}</div>
                                                            </p>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @else
                                                No Faculty Currently
                                            @endif
                                            <p class="text-center mt-3 mb-1"><a href="#" id="faculty1"
                                                                                class="site-link">View All Faculty</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div id="viewFaculty" style="display: none;" class="col">
                                        @if($val->teachers->isNotEmpty())
                                            @foreach($val->teachers as $f => $fa)
                                                    <div class="list-group-item  flex-column align-items-start"
                                                         style="    border-bottom: 1px solid #00000012;">
                                                        <div class="d-flex w-100 justify-content-between">
                                                            <h5 class="mb-1">{{$fa->name}}</h5>
                                                            {{--                                                                                                            <small>3 days ago</small>--}}
                                                        </div>
                                                        <p class="mt-1"
                                                           style="margin: 0;color: #ff5b00;font-weight: bold;font-size: 12px;">
                                                            {{$fa->designation}}, Department of {{$fa->department}}
                                                            <br>
                                                        <div style="color:green;font-size: 14px;">Subject
                                                            Expertize: {{$fa->qualification}}</div>
                                                        </p>
                                                    </div>
                                            @endforeach
                                        @else
                                            No Faculty Currently
                                        @endif
                                    </div>
                                </div>
{{--                                                        <p class="text-center mt-2 mb-1"><a id="viewAllFaculty" data-id="{{$val->id}}" href="#!" class="site-link">View All Courses</a></p>--}}
                            </div>
                            @if($val->images[0]->images != NULL)
                                <div id="collegeGallery" class="college-data  px-2 py-3 mb-3 bg-white">
                                    <h2>College Image Gallery</h2>
                                    <div class="row gallery" id="mainImage">
                                        @foreach(json_decode($val->images[0]->images) as $i => $img)
                                            @if($i < 4)
                                                <div class="col-md-3 col-6">
                                                    <a href="{{env('MEDIA_URL')}}property/{{$val->id}}/gallery/images/{{$img}}-md.webp"
                                                       class="{{$i == 0 ? "big" : ""}}">
                                                        <img src="{{env('MEDIA_URL')}}property/{{$val->id}}/gallery/images/{{$img}}-sm-350x200.webp"
                                                             class="mb-2" alt="{{$img}} by okadmission">
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="row gallery2" id="viewImage" style="display:none">
                                        @foreach(json_decode($val->images[0]->images) as $i => $img)
                                            <div class="col-md-3 col-6">
                                                <a href="{{env('MEDIA_URL')}}property/{{$val->id}}/gallery/images/{{$img}}-xl.webp"
                                                   class="{{$i == 0 ? "big" : ""}}">
                                                    <img
                                                         src="{{env('MEDIA_URL')}}property/{{$val->id}}/gallery/images/{{$img}}-sm-350x200.webp"
                                                         class="mb-2" width="100%" alt="{{$img}} by okadmission">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <p class="text-center mt-3 mb-1"><a href="#" id="gallery1" class="site-link">View
                                            All Gallery</a></p>
                                </div>
                            @endif
                            @if(json_decode($val->images[0]->placements) != [] || json_decode($val->images[0]->placements) != null)
                                <div id="collegePlacement" class="college-data  px-2 py-3 mb-3 bg-white">
                                    <h2>Placements</h2>
                                    <div class="row gallery" id="mainPlacement">
                                        @foreach(json_decode($val->images[0]->placements) as $i => $img)
                                            @if($i < 4)
                                                <div class="col-md-3 col-6">
                                                    <a href="{{env('MEDIA_URL')}}property/{{$val->id}}/placement/images/{{$img}}-xl.webp"
                                                       class="{{$i == 0 ? "big" : ""}}">
                                                        <img
                                                             src="{{env('MEDIA_URL')}}property/{{$val->id}}/placement/images/{{$img}}-sm-350x200.webp"
                                                             class="mb-2" width="100%" alt="{{$img}} by okadmission">
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="row gallery2" id="viewPlacement" style="display:none">
                                        @foreach(json_decode($val->images[0]->placements) as $i => $img)
                                            <div class="col-md-3 col-6">
                                                <a href="{{env('MEDIA_URL')}}property/{{$val->id}}/placement/images/{{$img}}-xl.webp"
                                                   class="{{$i == 0 ? "big" : ""}}">
                                                    <img
                                                         src="{{env('MEDIA_URL')}}property/{{$val->id}}/placement/images/{{$img}}-sm-350x200.webp"
                                                         class="mb-2" width="100%" alt="{{$img}} by okadmission">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <p class="text-center mt-3 mb-1"><a href="#!" id="placement1" class="site-link">View
                                            All Placements</a></p>
                                </div>
                            @endif
                            @if($val->images[0]->video != NULL)
                                <div id="collegeVideo" class="college-data  px-2 py-3 mb-3 bg-white">
                                    <h2>College Video Gallery</h2>
                                    <div class="row">
                                        <!--<div class="col-md-6">-->
                                        <!--    <iframe allowfullscreen src="https://www.youtube.com/embed/LaFtAcIrGWA" width="100%" height="200px"></iframe>-->
                                        <!--</div>-->
                                        <!--<div class="col-md-6">-->
                                        <!--    <iframe allowfullscreen src="https://www.youtube.com/embed/LaFtAcIrGWA" width="100%" height="200px"></iframe>-->
                                        <!--</div>-->

                                    </div>
                                    <p class="text-center mt-3 mb-1"><a href="#" class="site-link">View All Vidoes</a>
                                    </p>
                                </div>
                            @endif
                            <div id="collegeHostel" class="college-data  px-2 py-3 mb-3 bg-white">
                                <h2>Hostel</h2>
                                <div class="row">
                                    <div id="mainHostel" class="col">
                                        <div class="list-group">
                                            @if(!$hostel->isEmpty())
                                                @foreach($hostel as $h => $ha)
                                                    <div class="list-group-item flex-column align-items-start"
                                                         style="border-bottom: 1px solid #00000012;">
                                                        <div class="d-flex w-100 justify-content-between">
                                                            <h5 class="mb-1">{{$ha->male_female == 0 ? "Boys Hostel" : "Girls Hostel"}}</h5>
                                                            <small style="font-size: 18px">Fees: <i
                                                                    class="fa fa-inr"></i> {{$ha->price}}</small>
                                                        </div>
                                                        <hr class="my-2">
                                                        <div class="mt-1">
                                                            {!! $ha->html !!}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                No Hostel Currently :(
                                            @endif
                                        </div>
                                    </div>
                                    <div id="viewHostel" style="display: none;" class="col">
                                    </div>
                                </div>
{{--                                                        <p class="text-center mt-2 mb-1"><a id="viewAllCourse" data-id="{{$val->id}}" href="#!" class="site-link">View All Courses</a></p>--}}
                            </div>
                            @if($val->scholar->isNotEmpty())
                            <div id="collegeScholar" class="college-data  px-2 py-3 mb-3 bg-white">
                                <h2>ScholarShip</h2>
                                <div class="row">
                                    <div id="mainScholar" class="col">
                                        <div class="list-group">
                                            <div class="list-group-item flex-column align-items-start"
                                                 style="border-bottom: 1px solid #00000012;">
                                                @foreach($val->scholar as $d)
                                                    {!! $d->content !!}<br><hr>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div id="viewScholar" style="display: none;" class="col">
                                    </div>
                                </div>
{{--                                                        <p class="text-center mt-2 mb-1"><a id="viewAllCourse" data-id="{{$val->id}}" href="#!" class="site-link">View All Courses</a></p>--}}
                            </div>
                            @endif
                            <div id="collegeReview" class="review-box  px-2 py-3 mb-3 bg-white">
                                <div class="detail-title">
                                    <h5>Reviews</h5>
                                </div>
                                @foreach($reviews as $r => $rev)
                                    <div class="d-flex  border-bottom py-3">
                                        <div class="flex-shrink-0">
                                            <img src="/assets/images/apple-icon-60x60.png" alt="..." style="width: 4%;">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6>{{$rev->user->isEmpty() ? "OkAdmission User" : $rev->user[0]->name}},
                                                <span
                                                    class="small"> {{date('d M-Y',strtotime($rev->created_at))}} </span>
                                                <span class="golden-color float-end">
                                        @foreach(range(1,5) as $i)
                                                                                        <i class="far fa-star fa-stack-1x"></i>
                                                        @if($revs >0)
                                                            @if($revs >0.5)
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            @else
                                                                <i class="fa fa-star-half-alt" aria-hidden="true"></i>
                                                            @endif
                                                        @else
                                                            <i class="fa fa-star-o"></i>
                                                        @endif
                                                        @php $revs--;@endphp
                                                    @endforeach
                                                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                                                <i class="fas fa-star-half"></i>
                                                    {{$rev->avg('stars')}}/5</span>
                                            </h6>
                                            {{$rev->message}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="listing-detail-box mb-3 bg-white mb-3" style="padding: 26px;">
                                <div class="detail-title">
                                    <h5>Add a Review</h5>
                                </div>
                                <form action="/add_review" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{$val->id}}" name="prop">
                                    <div class="form-row row">
                                        <div class="form-group col-md-12">

                                            <div class="ratings">

                                                <input type="radio" id="star5" name="ratings" value="5"/>
                                                <label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                <input type="radio" id="star4half" name="ratings" value="4.5"/>
                                                <label class="half" for="star4half"
                                                       title="Pretty good - 4.5 stars"></label>
                                                <input type="radio" id="star4" name="ratings" value="4"/>
                                                <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                <input type="radio" id="star3half" name="ratings" value="3.5"/>
                                                <label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                <input type="radio" id="star3" name="ratings" value="3"/>
                                                <label class="full" for="star3" title="Meh - 3 stars"></label>
                                                <input type="radio" id="star2half" name="ratings" value="2.5"/>
                                                <label class="half" for="star2half"
                                                       title="Kinda bad - 2.5 stars"></label>
                                                <input type="radio" id="star2" name="ratings" value="2"/>
                                                <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                <input type="radio" id="star1half" name="ratings" value="1.5"/>
                                                <label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                <input type="radio" id="star1" name="ratings" value="1"/>
                                                <label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                <input type="radio" id="starhalf" name="ratings" value="0.5"/>
                                                <label class="half" for="starhalf"
                                                       title="Sucks big time - 0.5 stars"></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control review-name" name="name"
                                                       placeholder="Your name">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="email" class="form-control review-email" name="email"
                                                       placeholder="Your email">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control review-subject" name="phone"
                                                       id="phone"
                                                       placeholder="Subject">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control review-message" rows="5" name="message "
                                                      placeholder="Your message"></textarea>
                                        </div>
                                                                            <div class="form-group col-md-12">
                                                                                <div class="custom-file">
                                                                                    <input type="file" multiple name="imageFiles[]" class="custom-file-input" id="customFile">
                                                                                    <label class="custom-file-label" for="customFile">Upload Photo</label>
                                                                                </div>
                                                                                <div class="gallery"></div>
                                                                            </div>
                                        <div class="col-md-12">
                                            <button class="btn site-btn-1 review-button" type="submit">Submit Review
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="mb-3 py-2 text-center">
                                <a href="#"
                                   class="btn site-btn-2 btn-lg text-white font-weight-bold mb-2 quickEnquiryDetail"
                                   data-bs-toggle="modal" data-name="{{$val->name}}" data-location="{{$val->location[0]->states[0]->name}}"
                                   data-bs-target="#exampleModal"> Apply Now </a>

                                <a href="/api/click?call=1" class="btn site-btn-1 btn-lg text-white font-weight-bold">Talk To Counselor
                                    <i class="fas fa-headset blink-element clr-first"></i></a>
                            </div>
                            <div class="mb-3 bg-white text-center py-3">
                                <h2 class="site-title-sm mb-2">Need Education<span class="clr-second"> Loan ?</span>
                                </h2>

                                <a href="/education-loan" class="btn site-transparent-btn-1 btn-sm text-white">Apply
                                    Loan</a>
                            </div>

                            <div class="mb-3 bg-white text-center py-3">
                                <h2 class="site-title-sm mb-2">Interested in this <span
                                        class="clr-second"> College ?</span></h2>

                                <a href="#review" class="btn site-transparent-btn-1 btn-sm text-white">Ask Question</a>
                            </div>
                            <div class="mb-3 bg-white">

                                <h2 class="site-title-sm">You May <span class="clr-second"> Like</span> This</h2>
                                @foreach($related as $r => $rel)
                                    @if($rel->featured == 1)
                                        <div class="col-md-12 p-3">
                                            <div class="college-info-1">
                                                <div class="cover-img position-relative box"
                                                     style="background:url({{env('MEDIA_URL')}}property/{{$rel->id}}/gallery/featured/{{$rel->images[0]->featured}}-lg.webp);background-size:cover;">
                                                    <div class="ribbon"><span>featured</span></div>
                                                    <div class="college-info-logo"><img
                                                            src="{{env('MEDIA_URL')}}property/{{$rel->id}}/logo/{{$rel->logo}}-lg.webp" alt="">
                                                    </div>
                                                    <div
                                                        class="college-info-name position-absolute bottom-0 start-0 px-2 pb-1">
                                                        <p>
                                                            <a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($rel->cities[0]->name)))}}/{{$rel->seo[0]->permalink}}">{{$rel->name}}</a>
                                                        </p>
                                                        <span><i class="fas fa-map-marker-alt"></i> {{$rel->state[0]->name}}</span>
                                                    </div>
                                                </div>
                                                <div class="college-info px-2 pt-1">
                                                    <p class="font-weight-bold p1">{{$rel->courses->isEmpty() ? "" : $rel->courses[0]->name}}
                                                        <span class="badge bg-warning float-end"><i
                                                                class="far fa-star"></i> {{$rel->review->isEmpty() ? "0.0" : $rel->review[0]->avg('stars')}}</span>
                                                    </p>
                                                    <p class="float-end small p2"><a
                                                            href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($rel->cities[0]->name)))}}/{{$rel->seo[0]->permalink}}">
                                                            VIEW ALL COURSES & FEES</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-12 p-3">
                                            <div class="college-info-1">
                                                <div class="cover-img position-relative"
                                                     style="background:url({{env('MEDIA_URL')}}property/{{$rel->id}}/gallery/featured/{{$rel->images[0]->featured}}-lg.webp);background-size:cover;">
                                                    <div class="college-info-logo"><img
                                                            src="{{env('MEDIA_URL')}}property/{{$rel->id}}/logo/{{$rel->logo}}-lg.webp" alt="">
                                                    </div>
                                                    <div
                                                        class="college-info-name position-absolute bottom-0 start-0 px-2 pb-1">
                                                        <p>
                                                            <a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($rel->cities[0]->name)))}}/{{$rel->seo[0]->permalink}}">{{$rel->name}}</a>
                                                        </p>
                                                        <span><i class="fas fa-map-marker-alt"></i> {{$rel->state[0]->name}}</span>
                                                    </div>
                                                </div>
                                                <div class="college-info px-2 pt-1">
                                                    <p class="font-weight-bold p1">{{$rel->courses->isEmpty() ? "" : $rel->courses[0]->name}}
                                                        <span class="badge bg-warning float-end"><i
                                                                class="far fa-star"></i> {{$rel->review->isEmpty() ? "0.0" : $rel->review[0]->avg('stars')}}</span>
                                                    </p>
                                                    <p class="float-end small p2"><a
                                                            href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($rel->cities[0]->name)))}}/{{$rel->seo[0]->permalink}}">
                                                            VIEW ALL COURSES & FEES</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </section>


            <section class="my-4 py-4 bg-white">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <h1 class="site-title">Featured Colleges</h1>
                            <p class="title-desc">Explore Top of the best Colleges / Exams By Categories. </p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($featured as $f => $fea)
                            @if($fea->featured == 1)
                                <div class="col-md-3 p-3">
                                    <div class="college-info-1">
                                        <div class="cover-img position-relative box"
                                             style="background:url({{env('MEDIA_URL')}}property/{{$fea->id}}/gallery/featured/{{$fea->images[0]->featured}}-lg.webp);background-size:cover;">
                                            <div class="ribbon"><span>featured</span></div>
                                            <div class="college-info-logo"><img
                                                    src="{{env('MEDIA_URL')}}property/{{$fea->id}}/logo/{{$fea->logo}}-lg.webp" alt=""></div>
                                            <div class="college-info-name position-absolute bottom-0 start-0 px-2 pb-1">
                                                <p>
                                                    <a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($fea->cities[0]->name)))}}/{{$fea->seo[0]->permalink}}">{{$fea->name}}</a>
                                                </p>
                                                <span><i
                                                        class="fas fa-map-marker-alt"></i> {{$fea->state[0]->name}}</span>
                                            </div>
                                        </div>
                                        <div class="college-info px-2 pt-1">
                                            <p class="font-weight-bold p1">{{$fea->courses->isEmpty() ? "MBA" : $fea->courses[0]->name}}
                                                <span class="badge bg-warning float-end"><i class="far fa-star"></i> {{$fea->review->isEmpty() ? "0.0" : $fea->review[0]->avg('stars')}}</span>
                                            </p>
                                            <p class="float-end small p2"><a
                                                    href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($fea->cities[0]->name)))}}/{{$fea->seo[0]->permalink}}">
                                                    VIEW ALL COURSES & FEES</a></p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-3 p-3">
                                    <div class="college-info-1">
                                        <div class="cover-img position-relative"
                                             style="background:url({{env('MEDIA_URL')}}property/{{$fea->id}}/gallery/featured/{{$fea->images[0]->featured}}-lg.webp);background-size:cover;">
                                            <div class="college-info-logo"><img
                                                    src="{{env('MEDIA_URL')}}property/{{$fea->id}}/logo/{{$fea->logo}}-lg.webp" alt=""></div>
                                            <div class="college-info-name position-absolute bottom-0 start-0 px-2 pb-1">
                                                <p>
                                                    <a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($fea->cities[0]->name)))}}/{{$fea->seo[0]->permalink}}">{{$fea->name}}</a>
                                                </p>
                                                <span><i
                                                        class="fas fa-map-marker-alt"></i> {{$fea->state[0]->name}}</span>
                                            </div>
                                        </div>
                                        <div class="college-info px-2 pt-1">
                                            <p class="font-weight-bold p1">{{$fea->courses->isEmpty() ? "MBA" : $fea->courses[0]->name}}
                                                <span class="badge bg-warning float-end"><i class="far fa-star"></i> {{$fea->review->isEmpty() ? "0.0" : $fea->review[0]->avg('stars')}}</span>
                                            </p>
                                            <p class="float-end small p2"><a
                                                    href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($fea->cities[0]->name)))}}/{{$fea->seo[0]->permalink}}">
                                                    VIEW ALL COURSES & FEES</a></p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- Modal -->
            <div class="modal fade" id="claimModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">How Okadmission Helps you?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4 bg-light pb-3">
                                    <img src="/assets/images/site/popup-img.png" width="100%" alt="">
                                </div>
                                <div class="col-md-8">
                                    <h2 class="site-title text-start">Claim Now To Own</h2>
                                    <h3 class="site-title-sm text-start"> College Name, Location</h3>
                                    <hr>
                                    <form action="">
                                        <div class="row mb-2">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Full Name">
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">+91</span>
                                                    <input type="number" class="form-control"
                                                           placeholder="Contact Number" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="City">
                                            </div>
                                        </div>

                                        <p class="small">By submitting this form, you accept and agree to our <a
                                                href="#">Terms of Use</a> .</p>
                                        <p><a href="#"> Already Registered? Click Here To Login.</a>
                                            <button type="button" class="btn site-btn-2 btn-sm float-end">Claim</button>
                                        </p>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
