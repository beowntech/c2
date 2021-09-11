@extends('front.layout.header')
@section('content')
<section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3 filter my-2 d-none d-sm-block">
               @include('front.filter.filter')
               <!--- <div><h2 class="filter-heading">Courses</h2></div>
                <div class="filter-area  bg-white">
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Courses">
                    </div>
                    <div class="fix-20">
                        @foreach($course as $c => $co)
                   <div class="form-check" style="margin-bottom: 1px;">
                       <input class="form-check-input searchcheck" type="checkbox" data-name="{{$co->name}}" value="{{$co->id}}" id="courses_{{$c}}">
                                <label class="form-check-label" for="courses_{{$c}}">
                                    {{$co->name}}
                       </label>
                   </div>
@endforeach
                   </div>
               </div>---->
            </div>
            <div class="col-md-9">
                <div class="row mt-2">
                    <div class="col">
                        <div class="bg-white pb-2 px-2 remove-filter">

                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <div class="bg-white pb-2 px-2">
                            <span data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" class="d-block d-sm-none mb-1">Filter  <i class="fas fa-sort-amount-up-alt"></i></span>

                            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Filter</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    @include('front.filter.filter')
                                </div>
                            </div>
                            <span>Sort By:</span>
                            <span class="float-end">Rating
                                <a href="#!" id="rating-filter" style="color: black">
                                <i class="fas fa-long-arrow-alt-down active-sort-icon"></i>
                                    <i class="fas fa-long-arrow-alt-up"></i> </a>
                            </span>
                        </div>
                    </div>
                </div>
{{--                <div class="bg-white mt-2" style="padding: 10px;border: white;border-radius: 10px;">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-8">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4">--}}
{{--                            Sort By--}}
{{--                            <button type="button" class="btn bg-transparent ml-1 sortPopularity">Popularity</button>--}}
{{--                            <button type="button" class="btn bg-transparent sortRating">Rating</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div id="searchData">
                    <div class="row">
                @foreach($data as $k => $val)
                    @if($val->featured == 1)
                            <div class="col-md-12">
                                <div class="row college-info-2">
                    <div class="col-md-4">
                        <div class="position-relative">
                            <div class="cover-img box" style="background:url({{env('MEDIA_URL')}}property/{{$val->id}}/gallery/featured/{{count($val->images) != 0 ? $val->images[0]->featured:''}});background-size:cover;">
                                <div class="ribbon"><span>featured</span></div>
                                <div class="college-info-logo position-absolute bottom-0 start-5 p-2 ">
                                    <a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($val->cities[0]->name)))}}/{{$val->seo->permalink}}"> <img src="{{env('MEDIA_URL')}}property/{{$val->id}}/logo/{{$val->logo}}-sm.webp" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 college-info position-relative">
                        <p><a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($val->cities[0]->name)))}}/{{$val->seo->permalink}}">{{$val->name}}</a></p>
                        <p><span><i class="fas fa-map-marker-alt"></i> {{$val->states[0]->name}}, <i class="fas fa-certificate"></i> {{$val->short_name}}</span></p>
                        <p>
                            @foreach($val->courses as $c => $course)
                                @if($c < 5)
                            <span title="{{$course->streams->isEmpty() ? "" :$course->streams[0]->name}}" style="max-width: 100px;display: inline-block" class="badge rounded-pill bg-light text-dark text-truncate">{{$course->streams->isEmpty() ? "" :$course->streams[0]->name}}</span>
                                @endif
                            @endforeach
                            @if(!$val->courses->isEmpty())
                                <span class="badge rounded-pill bg-warning text-dark">+ more</span>
                                @endif
                        </p>

                        <div class="position-absolute top-0 end-0 pe-2">
                            @if(!$val->reviews->isEmpty())
                            <span class="badge bg-warning"><i class="far fa-star"></i> {{$val->reviews->avg('stars')}} /5</span>
                            @endif
                        </div>
                        <div class="position-absolute bottom-0 end-0 pe-2 pb-2">
                            <a href="#" class="btn site-btn-1 btn-sm text-white quickEnquiryDetail" data-bs-toggle="modal" data-name="{{$val->name}}" data-location="{{$val->states[0]->name}}" data-bs-target="#exampleModal">Quick Enquiry</a>
                            <a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($val->cities[0]->name)))}}/{{$val->seo->permalink}}" class="btn site-btn-1 btn-sm text-white">Visit College</a>
                            <button type="button" data-id="{{$val->id}}" data-name="{{$val->name}}" data-image="{{$val->logo}}" class="btn site-btn-2 btn-sm openCompare" >Compare</button>
                        </div>
                    </div>
                </div>
                            </div>
                    @else
                        <div class="row college-info-2">
                            <div class="col-md-4">
                                <div class="position-relative">
                                    <div class="cover-img box" style="background:url({{env('MEDIA_URL')}}property/{{$val->id}}/gallery/featured/{{count($val->images) != 0 ? $val->images[0]->featured:''}});background-size:cover;">
                                        <div class="college-info-logo position-absolute bottom-0 start-5 p-2 ">
                                            <a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($val->cities[0]->name)))}}/{{$val->seo->permalink}}"> <img src="{{env('MEDIA_URL')}}property/{{$val->id}}/logo/{{$val->logo}}-sm.webp" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 college-info position-relative">
                                <p><a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($val->cities[0]->name)))}}/{{$val->seo->permalink}}">{{$val->name}}</a></p>
                                <p><span><i class="fas fa-map-marker-alt"></i> {{$val->states[0]->name}}, <i class="fas fa-certificate"></i> UNI</span></p>
                                <p >
                                    @foreach($val->courses as $c => $course)
                                        @if($c < 5)
                                            <span title="{{$course->streams->isEmpty() ? "" :$course->streams[0]->name}}" style="max-width: 100px;display: inline-block" class="badge rounded-pill bg-light text-dark text-truncate">{{$course->streams->isEmpty() ? "" :$course->streams[0]->name}}</span>
                                        @endif
                                    @endforeach
                                    @if(!$val->courses->isEmpty())
                                        <span class="badge rounded-pill bg-warning text-dark">+ more</span>
                                    @endif
                                </p>

                                <div class="position-absolute top-0 end-0 pe-2">
                                    @if(!$val->reviews->isEmpty())
                                        <span class="badge bg-warning"><i class="far fa-star"></i> {{$val->reviews->avg('stars')}} /5</span>
                                    @endif
                                </div>
                                <div class="position-absolute bottom-0 end-0 pe-2 pb-2">
                                    <a href="#" class="btn site-btn-1 btn-sm text-white quickEnquiryDetail" data-bs-toggle="modal" data-id="{{$val->id}}" data-name="{{$val->name}}" data-location="{{$val->states[0]->name}}" data-bs-target="#exampleModal">Quick Enquiry</a>
                                    <a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($val->cities[0]->name)))}}/{{$val->seo->permalink}}" class="btn site-btn-1 btn-sm text-white">Visit College</a>
                                    <button type="button" class="btn site-btn-2 btn-sm openCompare" data-id="{{$val->id}}" data-name="{{$val->name}}" data-image="{{$val->logo}}" > Compare</button>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                    </div>
                </div>
                @if($data->count() >= 10)
                    @if(isset($data->links))
                    {{ $data->links() }}
                    @endif
{{--                <nav aria-label="Page navigation example" id="navigationbottom">--}}
{{--                    <ul class="pagination justify-content-end">--}}
{{--                        <li class="page-item disabled">--}}
{{--                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                        <li class="page-item disabled">--}}
{{--                            <a class="page-link " href="#">Next</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </nav>--}}
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            //Category Filter
            var catg = [];
            $('.searchcheck').change(function () {
                catg = [];
                $('.searchcheck:checked').each(function(i,e) {
                    catg[i] = {'value':e.value,'id':e.id,'name':$(e).attr('data-name')};
                });
                searchFilter();
                $(".remove-filter").html("");
                for(var i=0; i < catg.length; i++) {
                    $(".remove-filter").append(" <span id=\"check_"+catg[i]['id']+"\" class=\"tag label label-info\">\n" +
                        "                            <span>"+catg[i]['name']+"</span>\n" +
                        "                            <a class=\"removeFilter\" data-name=\""+catg[i]['name']+"\" id=\""+catg[i]['id']+"\"><i class=\"fas fa-times remove\"></i></a>\n" +
                        "                        </span>");
                }
            });
            $(".remove-filter").on('click','.removeFilter',function () {
                var name= $(this).attr('data-name');
                $("#check_"+$(this).attr('id')).remove();
                $("#"+$(this).attr('id')).prop('checked',false);
                catg = jQuery.grep(catg, function(value) {
                    return value['name'] != name;
                });
                searchFilter();
            });

            function searchFilter(){
                $.ajax({
                    type:"GET",
                    url : "/api/get_search_filter",
                    data: {'data': JSON.stringify(catg)},
                    contentType: 'application/json; charset=utf-8',
                    datatype: 'json',
                    success : function(response) {
                        console.log(response);
                        $("#searchData").html("");
                        if(response.length == 0){
                            $("#searchData").html("<img style=\"width: 100%;\" class=\"mt-2\" src=\"/assets/images/placeholder/not_found.png\">");
                            $("#navigationbottom").hide();
                        }else {
                            if(response.length > 10){
                                $("#navigationbottom").show();
                            }
                            for (var i = 0; i < response.length; i++) {
                                var featured = "";
                                var courses = "";
                                for (var c = 0; c < response[i].courses.length; c++) {
                                    if(c < 6){
                                    courses += "<a href=\"\"><span style=\"max-width: 100px;display: inline-block\" class=\"badge rounded-pill bg-light text-dark text-truncate\">" + response[i].courses[c].streams[0].name + "</span></a>,";
                                }
                                }
                                if (response[i].rev == null) {
                                    review = 0;
                                } else {
                                    review = response[i].rev;
                                }
                                if (response[i].featured == 1) {
                                    featured = "<div class=\"ribbon\"><span>featured</span></div>";
                                }
                                $("#searchData").append("<div class=\"row college-info-2\">\n" +
                                    "    <div class=\"col-md-4\">\n" +
                                    "        <div class=\"position-relative\">\n" +
                                    "            <div class=\"cover-img box\" style=\"background:url({{env('MEDIA_URL')}}property/" + response[i].id + "/gallery/images/" + JSON.parse(response[i].images[0].images)[0]+");background-size:cover;\">\n" + featured +
                                    "                <div class=\"college-info-logo position-absolute bottom-0 start-5 p-2 \">\n" +
                                    "                    <a href=\"/college-in-" + response[i].location[0].cities[0].name.replace(' ', '_').toLowerCase() + "/" + response[i].seo[0].permalink + "\"> <img src=\"{{env('MEDIA_URL')}}property/" + response[i].id + "/logo/" + response[i].logo+"-sm.webp"+ "\" alt=\"\"></a>\n" +
                                    "                </div>\n" +
                                    "            </div>\n" +
                                    "        </div>\n" +
                                    "    </div>\n" +
                                    "    <div class=\"col-md-8 college-info position-relative\">\n" +
                                    "        <p><a href=\"/college-in-" + response[i].location[0].cities[0].name.replace(' ', '_').toLowerCase() + "/" + response[i].seo[0].permalink + "\">" + response[i].name + "</a></p>\n" +
                                    "        <p><span><i class=\"fas fa-map-marker-alt\"></i> " + response[i].location[0].states[0].name + ", <i class=\"fas fa-certificate\"></i> UNI</span></p>\n" +
                                    "        <p>\n" + courses + "</p>\n" +
                                    "        <div class=\"position-absolute top-0 end-0 pe-2\">\n" +
                                    "            <span class=\"badge bg-warning\"><i class=\"far fa-star\"></i> " + review + " /5</span>\n" +
                                    "        </div>\n" +
                                    "        <div class=\"position-absolute bottom-0 end-0 pe-2 pb-2\">\n" +
                                    "            <a href=\"#\" class=\"btn site-btn-1 btn-sm text-white\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\">Quick Enquiry</a>\n" +
                                    "            <a href=\"/college-in-" + response[i].location[0].cities[0].name.replace(' ', '_').toLowerCase() + "/" + response[i].seo[0].permalink + "\" class=\"btn site-btn-1 btn-sm text-white\">Visit College</a>\n" +
                                    "            <button type=\"button\" data-id=\"" + response[i].id + "\" data-name=\"" + response[i].name + "\" data-image=\"" + response[i].logo + "\" class=\"btn site-btn-2 btn-sm openCompare\" >Compare</button>\n" +
                                    "        </div>\n" +
                                    "    </div>\n" +
                                    "</div>");
                                // var new_url = url + "?" +$.param({'sort': 'popularity_desc'});
                                // history.pushState({}, null, new_url);
                            }
                        }
                    },
                    error: function() {
                        console.log('Error occured');
                    }
                });
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0;
            }
            $("#rating-filter").click(function(){
                var main = document.getElementById('rating-filter');
                if(main.getElementsByTagName('i')[0].className == "fas fa-long-arrow-alt-down active-sort-icon"){
                    main.getElementsByTagName('i')[0].className = 'fas fa-long-arrow-alt-down';
                    main.getElementsByTagName('i')[1].className = 'fas fa-long-arrow-alt-up active-sort-icon';
                }else{
                    main.getElementsByTagName('i')[0].className = 'fas fa-long-arrow-alt-down active-sort-icon';
                    main.getElementsByTagName('i')[1].className = 'fas fa-long-arrow-alt-up';
                }
            });
        });
    </script>
@endsection
