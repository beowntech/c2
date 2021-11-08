@extends('v2.front.layout.header')
@section('content')
    <section class="shadow">
        <div class="container">
            <div class="row py-2">
                <div class="col-md-6 offset-md-3 position-relative">
                    <form action="{{route('search-college')}}">
                    <input type="search" name="search" class="form-control hero-search site-shadow-sm" placeholder="College Name, Courses">
                    <button type="submit" class="btn btn-search position-absolute end-20 translate-middle-y" style="top:40%!important"><i class="fas fa-search"></i> Search</button>
                    </form>
                        <div class="search-result py-2 text-start bg-white border-radius-md mt-1">
                        <p class="mb-0  ps-3">Colleges</p>
                        <ul class="list-unstyled ps-4">
                            <li><a href="#">Top DRCC College</a></li>
                            <li><a href="#">Top College in Dehradun</a></li>
                            <li><a href="#">Top College in Delhi</a></li>
                            <li><a href="#">Top College in Mumbai</a></li>
                            <li><a href="#">Top College in Bangalore</a></li>
                            <li><a href="#">Top College in Mumbai</a></li>
                        </ul>
                        <p class="mb-0 ps-3">Courses</p>
                        <ul class="list-unstyled ps-4">
                            <li><a href="#">Top DRCC College</a></li>
                            <li><a href="#">Top College in Dehradun</a></li>
                            <li><a href="#">Top College in Delhi</a></li>
                            <li><a href="#">Top College in Mumbai</a></li>
                            <li><a href="#">Top College in Bangalore</a></li>
                            <li><a href="#">Top College in Mumbai</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bglg">
        <div class="cointainer-fluid">
            <div class="row mx-0">
                <div class="col small px-5 pt-3">
{{--                    <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">--}}
{{--                        <ol class="breadcrumb">--}}
{{--                            <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Admissionjockey</a></li>--}}
{{--                            <li class="breadcrumb-item"><a href="/search?catg=Medical" class="text-decoration-none">BE/B.tech</a></li>--}}
{{--                            <li class="breadcrumb-item active" aria-current="page">Banglore College</li>--}}
{{--                        </ol>--}}
{{--                    </nav>--}}
                </div>
            </div>
            <div class="row mx-0">
                <div class="col-md-3">
                    <div class="filter-bar">
                        <div class="map text-center">
                            <div class="btn site-btn-map"> Map View</div>
                        </div>
                        <p class="small">{{count($data)}} Colleges</p>
                        <div class="divider-span">
                            <p>Selected Filter <span class="float-end small"><a href="{{request()->url()}}">Set default</a></span></p>
                        </div>
                        <div class="filtered-option">
{{--                            {{dd(request()->query())}}--}}
                            @if(request()->query() == null)
                                <div class="chip chip-md filter-chip">
                                    <i class="fas fa-circle"></i> All
                                </div>
                            @endif
                            @foreach(request()->query() as $q => $qu)
                                @foreach(explode(',',request()->query($q)) as $f => $fi)
                            <div class="chip chip-md filter-chip">
                                <i class="fas fa-circle"></i> {{ucfirst($fi)}}
                                @php
                                    $qs = explode(',',request()->query($q));
                                unset($qs[$f]);
                                @endphp
                                <a href="{{request()->fullUrlWithQuery([$q => count($qs) == 0 ? null : implode(',',$qs)])}}"><i class="close fas fa-times"></i></a>
                            </div>
                                @endforeach
                            @endforeach
                        </div>
{{--                        <div class="divider-span">--}}
{{--                            <p>Stream</p>--}}
{{--                        </div>--}}
{{--                        <div class="px-4 my-2">--}}
{{--                            <input type="search" name="" class="form-control form-control-sm border-radius-md ">--}}
{{--                            <ul class="list-unstyled filter-checkbox">--}}
{{--                                <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li>--}}
{{--                                <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li>--}}
{{--                                <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li>--}}
{{--                                <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li>--}}
{{--                                <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        <div class="divider-span">
                            <p>City</p>
                        </div>
                        <div class="px-4 my-2">
                            <input type="search" name="" class="form-control form-control-sm border-radius-md ">
                            <ul class="list-unstyled filter-checkbox">
                                @foreach($city as $c => $ct)
                                    <li><input type="checkbox" name="city[]" {{in_array(strtolower($ct->name),explode(',',request()->query('city'))) ? 'checked': ''}} class="form-check-input" value="{{strtolower($ct->name)}}"> {{$ct->name}} - [{{$ct->location_count}}]</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="divider-span">
                            <p>State</p>
                        </div>
                        <div class="px-4 my-2">
                            <input type="search" name="" class="form-control form-control-sm border-radius-md ">
                            <ul class="list-unstyled filter-checkbox">
                                @foreach($state as $s => $st)
                                <li> <input type="checkbox" name="state[]" {{in_array(strtolower($st->name),explode(',',request()->query('state'))) ? 'checked': ''}} class="form-check-input" value="{{strtolower($st->name)}}"> {{$st->name}} - [{{$st->location_count}}]</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="divider-span">
                            <p>College Type</p>
                        </div>
                        <div class="px-4 my-2">
                            <input type="search" name="" class="form-control form-control-sm border-radius-md ">
                            <ul class="list-unstyled filter-checkbox">
                                <li> <input type="checkbox" name="type[]" {{in_array(1,explode(',',request()->query('type'))) ? 'checked': ''}}  class="form-check-input" value="1"> Public</li>
                                <li> <input type="checkbox" name="type[]" {{in_array(2,explode(',',request()->query('type'))) ? 'checked': ''}}  class="form-check-input" value="2"> Private</li>
                                <li> <input type="checkbox" name="type[]" {{in_array(3,explode(',',request()->query('type'))) ? 'checked': ''}}  class="form-check-input" value="3"> Govt.</li>
                                <li> <input type="checkbox" name="type[]" {{in_array(4,explode(',',request()->query('type'))) ? 'checked': ''}}  class="form-check-input" value="4"> Deamed</li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-md-9">
                    <div class="text-center">
                        <img src="/v2/assets/images/site/ads.png" alt="" class="">
                    </div>
                    <div class="py-2 small">
                        <p class="d-inline-block"> {{count($data)}} Colleges </p>
                        <ul class="d-inline-block list-unstyled ver-line-menu float-end">
                            <li><strong>Sort By</strong></li>
                            <li>Polpularity <i class="fas fa-sort-amount-up-alt"></i></li>
                            <li>Rating <i class="fas fa-sort-amount-up-alt"></i></li>
                            <li>Highest Fees <i class="fas fa-sort-amount-down-alt"></i></li>
                            <li>Lowest Fees <i class="fas fa-sort-amount-down"></i></li>
                        </ul>
                    </div>
                    <div class="row" id="propertyData">
                        @foreach($data as $k => $val)
                            @if($k  == 4)
                        <div class="container px-5"c>
                            <div class="row">
                                <div class="col-md-6 mb-3 position-relative">
                                    <a href="/loan-form">
                                        <div class="action-bg-1" style="background:url(/v2/assets/images/site/hostel.jpg);background-size: cover;background-position: center;">
                                            <div class="position-absolute bottom-0 start-0 text-white">
                                                <p class="mb-0 text-uppercase ps-4">sponsored</p>
                                                <h3 class="ps-4">Find Students Loan Options <i class="fas fa-arrow-circle-right" aria-hidden="true"></i>
                                                </h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 mb-3 position-relative">
                                    <a href="/hostel-form">
                                        <div class="action-bg-1" style="background:url(/v2/assets/images/site/hostel.jpg);background-size: cover;background-position: center;">
                                            <div class="position-absolute bottom-0 start-0 text-white">
                                                <p class="mb-0 text-uppercase ps-4">sponsored</p>
                                                <h3 class="ps-4">Find Students Hostel Options <i class="fas fa-arrow-circle-right" aria-hidden="true"></i>
                                                </h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                            @endif
                        <div class="col-md-6 col-xxl-4">
                            <div class="prop-card-1">
                                <div class="logo position-relative mb-1">
                                    <div class="d-inline-block prop-logo">
                                        <a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($val->location == null ? "" : $val->location->cities->name)))}}/{{$val->seo == null ? "" : $val->seo[0]->permalink}}">
                                        <img src="{{env('MEDIA_URL')}}property/{{$val->id}}/logo/{{$val->logo.'-md.webp'}}" class="p-2" alt="">
                                        </a>
                                    </div>
{{--                                    <img src="{{env('MEDIA_URL')}}property/{{$val->id}}/logo/{{$val->logo}}-md.webp" class="prop-logo" alt="">--}}
                                    <p class="d-inline-block position-absolute top-0 end-0 small">
                                            @if($val->review != null)
                                                @if(count($val->review) > 0)
                                                    @php $revi = count($val->review);@endphp
                                                    <input type="hidden" value="{{$revs = $val->review}},{{$avg = $val->review->isEmpty() ? 0 : $val->review[0]->avg('stars')}}">
                                                    @foreach(range(1,5) as $i)
                                                        @if($revi > 0)
                                                            @if($revi >0.5)
                                                                <i class="fa fa-star gcolor" aria-hidden="true"></i>
                                                            @else
                                                                <i class="fa fa-star-half-alt gcolor" aria-hidden="true"></i>
                                                            @endif
                                                        @else
                                                            <i class="fa fa-star-o"></i>
                                                        @endif
                                                        @php $revi--;@endphp
                                                    @endforeach
                                                    @if(count($val->review) == 1)
                                                        {{count($val->review)}} Review
                                                    @else
                                                        {{count($val->review)}} Reviews
                                        @endif
                                                @endif
                                            @endif
{{--                                            <i class="fas fa-star"></i>--}}
{{--                                            <i class="fas fa-star"></i>--}}
{{--                                            <i class="fas fa-star"></i>--}}
{{--                                            <i class="fas fa-star"></i>--}}
{{--                                            <i class="fas fa-star"></i>--}}
                                    </p>
                                </div>
                                <div class="prop-info">
                                    <p class="f-20 pcolor"><a style="color: initial;" href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($val->location == null ? "" : $val->location->cities->name)))}}/{{$val->seo == null ? "" : $val->seo[0]->permalink}}">{{$val->name}}</a></p>
                                    <p><i class="fas fa-map-marker-alt"></i> {{$val->location->cities->name}}, {{$val->location->states->name}}</p>
                                    <!-- <p><i class="fas fa-rupee-sign"></i> B.tech - 7L to 8L</p> -->
                                    <ul class="d-inline-block list-unstyled ver-line-menu text-secondary small py-3">
                                        <li class="me-3">Type - {{$val->college_type == 1 ? 'Public': ($val->college_type == 2 ? 'Private': ($val->college_type == 3 ? 'Govt.': ($val->college_type == 4 ? 'Deemed': '')))}}</li>
                                        <li class="me-3">Apporved by: {{$val->approved_by}}</li>
                                        <li class="me-3">NIRF Ranking - 12</li>
                                    </ul>
                                    <ul class="d-inline-block list-unstyled ver-line-menu text-secondary small">
                                        <li class="me-3"><button class="btn site-btn-1 openApplyNow" data-id="{{$val->id}}" data-name="{{$val->name}}" data-bs-toggle="modal" data-bs-target="#applyNow"> Apply Now </button></li>
                                        <li class="me-3"><a href="{{ route('compare', ['properties'=>$val->seo[0]->permalink]) }}" class="btn hover-site-btn-1 scolor"> Compare </a></li>
                                        <li class="me-3"><a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($val->location == null ? "" : $val->location->cities->name)))}}/{{$val->seo == null ? "" : $val->seo[0]->permalink}}" class="btn hover-site-btn-1 scolor mt-1"> Visit Details </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                       @endforeach
                    </div>
                    @if(count($data) == 20)
                    <div class="text-center mb-3">
                            <button class="btn site-btn-1" id="viewMore">View More</button>
                    </div>
                    @endif
                    <div class="text-center mb-3">
                        <img src="/v2/assets/images/site/ads.png" alt="" class="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---Comapre Modal--->
    <div class="modal fade" id="compareModal" tabindex="-1" aria-labelledby="queryModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl">
            <div class="modal-content">
                <input type="text" id="propSelected">
                <div class="modal-body p-0 compare-modal">
                    <div class="p-3">
                        <h2 class="f-22 mb-4">Choose College</h2>
                        <!-- Actual search box -->
                        <div class="form-group has-icon">
                            <span class="fa fa-search form-control-icon"></span>
                            <input type="text" id="compareSearch" class="form-control" placeholder="Search College">
                        </div></div>
                    <div class="bg-grey">

                        <div class="row py-3 px-5" id="compareListCollege">

                        </div>
                        <div class="row p-3 pb-4">
                            <div class="col">
                                <ul class="list-unstyled ver-line-menu float-end">
                                    <li class="me-2"><button class="btn site-btn-4" data-bs-dismiss="modal" aria-label="Close"> close </button></li>
                                    <li><button class="btn site-btn-1 btn-sm float-end" onclick="chooseProp()"> Save </button></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
@section('script')
<script>
    var selected = "";
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "{{route('search-college-api')}}",
            data: {'search': ""},
            success: function (data) {
                $("#compareListCollege").html("");
                for (var i = 0; i < data.length; i++) {
                    $("#compareListCollege").append("<div class=\"col-md-6 custom-radio\">\n "+
                    "<div class=\"row m-1 py-2 bg-white border-color col-list-card\" data-slug=\""+data[i].seo[0].permalink+"\">\n "+
                    "<div class=\"col-2 text-center px-1\">\n" +
                    "<span class=\"circle align-middle\">\n"+
                    "<i class=\"fas fa-check-circle\"></i>\n"+
                    "</span>\n"+
                    "</div>\n"+
                    "<div class=\"col-2 px-1\" for=\"flexRadioDefault1\">\n"+
                    "<div class=\"logo position-relative\">\n"+
                    "<div class=\"d-inline-block prop-logo\">\n"+
                    "<img src=\"{{env('MEDIA_URL')}}property/"+data[i].id+"/logo/"+data[i].logo+"-md.webp\" class=\"p-2\" alt=\"\"> \n"+
                    "</div></div></div><div class=\"col-7\" for=\"flexRadioDefault1\">\n"+
                    "<div class=\"prop-info\">\n"+
                    "<p class=\"f-14 pcolor mb-1 text-truncate\" style=\"max-width:300px;\">"+data[i].name+"</p>\n"+
                    "<p class=\"f-12 mb-1\"><i class=\"fas fa-map-marker-alt\" aria-hidden=\"true\"></i> "+data[i].location.cities.name+", "+data[i].location.states.name+"</p>\n"+
                    "<div class=\"row\"><div class=\"col-8\"><p class=\"f-14 pcolor mb-1 text-truncate\" style=\"max-width: 200px;\"> "+data[i].courses[0].streams[0].name+"</p><\/div><div class=\"col-4\"><p class=\"f-14 pcolor mb-1\"><i class=\"fas fa-rupee-sign\" aria-hidden=\"true\"></i> "+data[i].courses[0].price+"</p><\/div><\/div>\n"+
                    "</div></div></div></div>");
                    if(i > 4){
                        break;
                    }
                }
            }
        });
    });
    $("#compareSearch").keyup(function () {
        var text = $(this).val();
        $.ajax({
            type: "GET",
            url: "{{str_replace('http','https',route('search-college-api'))}}",
            data: {'search': text},
            success: function (data) {
                $("#compareListCollege").html("");
                for (var i = 0; i < data.length; i++) {
                    $("#compareListCollege").append("<div class=\"col-md-6 custom-radio\">\n "+
                    "<div class=\"row m-1 py-2 bg-white border-color col-list-card\" data-slug=\""+data[i].seo[0].permalink+"\">\n "+
                    "<div class=\"col-2 text-center px-1\">\n" +
                    "<span class=\"circle align-middle\">\n"+
                    "<i class=\"fas fa-check-circle\"></i>\n"+
                    "</span>\n"+
                    "</div>\n"+
                    "<div class=\"col-2 px-1\" for=\"flexRadioDefault1\">\n"+
                    "<div class=\"logo position-relative\">\n"+
                    "<div class=\"d-inline-block prop-logo\">\n"+
                    "<img src=\"{{env('MEDIA_URL')}}property/"+data[i].id+"/logo/"+data[i].logo+"-md.webp\" class=\"p-2\" alt=\"\"> \n"+
                    "</div></div></div><div class=\"col-7\" for=\"flexRadioDefault1\">\n"+
                    "<div class=\"prop-info\">\n"+
                    "<p class=\"f-14 pcolor mb-1 text-truncate\" style=\"max-width:300px;\">"+data[i].name+"</p>\n"+
                    "<p class=\"f-12 mb-1\"><i class=\"fas fa-map-marker-alt\" aria-hidden=\"true\"></i> "+data[i].location.cities.name+", "+data[i].location.states.name+"</p>\n"+
                    "<div class=\"row\"><div class=\"col-8\"><p class=\"f-14 pcolor mb-1 text-truncate\" style=\"max-width: 200px;\"> "+data[i].courses[0].streams[0].name+"</p><\/div><div class=\"col-4\"><p class=\"f-14 pcolor mb-1\"><i class=\"fas fa-rupee-sign\" aria-hidden=\"true\"></i> "+data[i].courses[0].price+"</p><\/div><\/div>\n"+
                    "</div></div></div></div>");
                    // $("#compareListCollege").append("<div class=\"col-md-6 custom-radio\"><div class=\"row m-1 py-2 bg-white\"><div class=\"col-2 text-center px-1\"><input class=\"form-check-input\" type=\"radio\" name=\"flexRadioDefault\" value=\""+data[i].seo[0].permalink+"\" id=\"flexRadioDefault1\"><\/div><div class=\"col-2 px-1\" for=\"flexRadioDefault1\"><div class=\"logo position-relative\"><div class=\"d-inline-block prop-logo\"><img src=\"{{env('MEDIA_URL')}}property/"+data[i].id+"/logo/"+data[i].logo+"-md.webp\" class=\"p-2\" alt=\"\"><\/div><\/div><\/div><div class=\"col-7\" for=\"flexRadioDefault1\"><div class=\"prop-info\"><p class=\"f-14 pcolor mb-1 d-inline-block text-truncate\" style=\"max-width: 300px;\">"+data[i].name+"<\/p><p class=\"f-12 mb-1\"><i class=\"fas fa-map-marker-alt\" aria-hidden=\"true\"><\/i> "+data[i].location.cities.name+", "+data[i].location.states.name+"<\/p><div class=\"row\"><div class=\"col-8\"><p class=\"f-14 pcolor mb-1 text-truncate\" style=\"max-width: 200px;\"> "+data[i].courses[0].streams[0].name+"</p><\/div><div class=\"col-4\"><p class=\"f-14 pcolor mb-1\"><i class=\"fas fa-rupee-sign\" aria-hidden=\"true\"></i> "+data[i].courses[0].price+"</p><\/div><\/div><\/div><\/div><\/div><\/div>");
                    if(text == "" && i > 4){
                        break;
                    }
                }
            }
        });
    });

    $(document).on('click', '.col-list-card', function () {
        $("#compareListCollege .col-list-card").removeClass("active")
        $(this).addClass("active");
        selected = "";
        selected = $(this).data("slug");
        // alert($(this).data("slug"));
    });

    function removeProp(id){
        var url = window.location.href;
        var split = url.split('-vs-');
        split.splice(id,1);
        window.location.href = split.join('-vs-');
    }
    function chooseProp(){
        // var check = $('input[name=flexRadioDefault]:checked').val();
        if(selected != ""){
            window.location.href = ""+window.location.href+""+"-vs-"+""+selected+"";
        }
    }
</script>
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
        let page = 2;
        let url = "{{request()->query() != null ? htmlspecialchars_decode(str_replace('http','https',request()->fullUrl()).'&page='): str_replace('http','https',request()->fullUrl()).'?page='}}"
        $("#viewMore").click(function () {
            $.ajax({
                url: url.replace('&amp;','&')+page,
                success: function(result) {
                    console.log(result);
                    page = page + 1;
                    if(result.next_page_url == null){
                        $("#viewMore").addClass('d-none');
                    }
                    var data = result.data;
                    for (var i = 0; i < data.length; i++) {
                            $("#propertyData").append("<div class=\"col-md-6 col-xxl-4\">\n" +
                                "        <div class=\"prop-card-1\">\n" +
                                "            <div class=\"logo position-relative mb-1\">\n" +
                                "                <div class=\"d-inline-block prop-logo\">\n" +
                                "                    <img src=\"{{env('MEDIA_URL')}}property/" + data[i].id + "/logo/" + data[i].logo + "-md.webp\" class=\"p-2\" alt=\"\">\n" +
                                "                </div>\n" +
                                "                {{--                                    <img src=\"{{env('MEDIA_URL')}}property/{{$val->id}}/logo/{{$val->logo}}-md.webp\" class=\"prop-logo\" alt=\"\">--}}\n" +
                                "                <p class=\"d-inline-block position-absolute top-0 end-0 small\">\n" +
                                "                    <a href=\"\">\n" +
                                "                    </a>\n" +
                                "                </p>\n" +
                                "            </div>\n" +
                                "            <div class=\"prop-info\">\n" +
                                "                <p class=\"f-20 pcolor\">" + data[i].name + "</p>\n" +
                                "                <p><i class=\"fas fa-map-marker-alt\"></i> " + data[i].location.cities.name + ", " + data[i].location.states.name + "</p>\n" +
                                "                <ul class=\"d-inline-block list-unstyled ver-line-menu text-secondary small py-3\">\n" +
                                "                    <li class=\"me-3\">Type - Private</li>\n" +
                                "                    <li class=\"me-3\">Apporved by: " + data[i].approved_by + "</li>\n" +
                                "                    <li class=\"me-3\">NIRF Ranking - 12</li>\n" +
                                "                </ul>\n" +
                                "                <ul class=\"d-inline-block list-unstyled ver-line-menu text-secondary small\">\n" +
                                "                    <li class=\"me-3\"><button class=\"btn site-btn-1\" data-bs-toggle=\"modal\" data-bs-target=\"#applyNow\"> Apply Now </button></li>\n" +
                                "                    <li class=\"me-3\"><button class=\"btn hover-site-btn-1 scolor\"> Compare </button></li>\n" +
                                "                    <li class=\"me-3\"><a href=\"/college-in-\" class=\"btn hover-site-btn-1 scolor mt-1\"> Visit Details </a></li>\n" +
                                "                </ul>\n" +
                                "            </div>\n" +
                                "        </div>\n" +
                                "    </div>");
                        }
                    }
                });
        });
        $(function(){
            var city = "";
            var empty=false;
            $('input[type="checkbox"][name="city[]"]').click(function () {
                $('input[type="checkbox"][name="city[]"]:checked').each(function () {
                    if(city != "") {
                        city += ','+$(this).val();
                    }else{
                        empty = true;
                        city = $(this).val();
                    }
                });
                var url = "{{request()->query('city') != null ? request()->fullUrlWithQuery(['city'=>null]) : request()->fullUrl()}}";
                var finalU = url + "{{request()->query() != null ? '&city=':'?city='}}"
                if(!empty){
                    window.location.href = url;
                }else{
                window.location.href = finalU.replace('&amp;','&')+city;
                }
            });
            var state = "";
            var empty=false;
            $('input[type="checkbox"][name="state[]"]').click(function () {
                $('input[type="checkbox"][name="state[]"]:checked').each(function () {
                    if(state != "") {
                        state += ','+$(this).val();
                    }else{
                        empty = true;
                        state = $(this).val();
                    }
                });
                var url = "{{request()->query('state') != null ? request()->fullUrlWithQuery(['state'=>null]) : request()->fullUrl()}}";
                var finalUrl = url + "{{request()->query() != null ? '&state=':'?state='}}"
                if(!empty){
                    window.location.href = url;
                }else{
                window.location.href = finalUrl.replace('&amp;','&')+state;
                }
            });
            var type = "";
            $('input[type="checkbox"][name="type[]"]').click(function () {
                $('input[type="checkbox"][name="type[]"]:checked').each(function () {
                    if(type != "") {
                        type += ','+$(this).val();
                    }else{
                        type = $(this).val();
                    }
                });
                var url = "{{request()->query('type') != null ? request()->fullUrlWithQuery(['type'=>null]) : request()->fullUrl()}}";
                var finalUrl = url + "{{request()->query() != null ? '&type=':'?type='}}";
                if(!empty){
                    window.location.href = url;
                }else{
                window.location.href = finalUrl.replace('&amp;','&')+type;
                }
            });
        });
    </script>
@endsection
@section('modal')
    @include('v2.front.modal.applynow')
@endsection
