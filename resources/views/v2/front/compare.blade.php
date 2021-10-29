@extends('v2.front.layout.header')
@section('content')
    <section>
    <div class="container-fluid">
        <div class="row mx-0">
            <div class="col small pt-3">
                <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Admissionjockey</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Compare</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Colleges</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col">
                <h1 class="f-20">Compare College</h1>
                <p>Compare College on their Fees, Placements, Cut Off, Reviews, Seats, Couses and other detains. Download free information on admission details, placement report, Eligibility criteria etc.</p>
            </div>
        </div>
    </div>
</section>
<section class="mb-4" id="compare">
    <div class="container-fluid px-4">
        <div class="row">
            @foreach($prop as $p => $val)
            <div class="col-md-3">
                <div class="p-3">
                    <div style="float: right;cursor: pointer;" onclick="removeProp({{$p}})">X</div>
                    <h2 class="f-14 fw-6"><a href="#" class="text-decoration-none"> {{$val->name}}</a></h2>
                    <p class="f-14"><i class="fas fa-map-marker-alt"></i> {{$val->location->cities->name}}</p>
                    <div class="mb-2 prop-image position-relative" style="background:url({{env('MEDIA_URL')}}property/{{$val->id}}/gallery/featured/{{$val->images[0]->featured.'-xl.webp'}});bacground-position:center; height:160px; background-size: cover;">
                        <div class="prop-info">
                            <div class="position-absolute bottom-0 start-0">
                                <img src="{{env('MEDIA_URL')}}property/{{$val->id}}/logo/{{$val->logo.'-md.webp'}}" class="prop-logo p-1 m-2" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="list-unstyled info-list">
                    <li>Established Year <span class="float-end">{{$val->established_on}}</span></li>
                    <li>Ownership <span class="float-end">Deemed</span></li>
                </ul>

            </div>
            @endforeach
            @for($i=4; $i > count($prop); $i--)
                    <div class="col-md-3">
                        <div class="p-3">
                            <div class="add-new text-center" data-bs-toggle="modal" data-bs-target="#compareModal">
                                <div class="add-icon"><i class="fas fa-plus"></i></div>
                                <p class="f-14">Add College</p>
                            </div>
                        </div>
                    </div>
                @endfor
{{--            <div class="col-md-3">--}}
{{--                <div class="p-3">--}}
{{--                    <h2 class="f-14 fw-6"><a href="#" class="text-decoration-none"> Graphic Era University - GEU</a></h2>--}}
{{--                    <p class="f-14"><i class="fas fa-map-marker-alt"></i> Dehradun</p>--}}
{{--                    <div class="mb-2 prop-image position-relative" style="background:url(/assets/images/site/collegeimg.png);bacground-position:center; height:160px; background-size: cover;">--}}
{{--                        <div class="prop-info">--}}
{{--                            <div class="position-absolute bottom-0 start-0">--}}
{{--                                <img src="/assets/images/site/c-logo.png" class="prop-logo p-1 m-2" alt="">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <ul class="list-unstyled info-list">--}}
{{--                    <li>Established Year <span class="float-end">1996</span></li>--}}
{{--                    <li>Ownership <span class="float-end">Deemed</span></li>--}}
{{--                </ul>--}}

{{--            </div>--}}
{{--            <div class="col-md-3">--}}
{{--                <div class="p-3">--}}
{{--                    <h2 class="f-14 fw-6"><a href="#" class="text-decoration-none"> Graphic Era University - GEU</a></h2>--}}
{{--                    <p class="f-14"><i class="fas fa-map-marker-alt"></i> Dehradun</p>--}}
{{--                    <div class="mb-2 prop-image position-relative" style="background:url(/assets/images/site/collegeimg.png);bacground-position:center; height:160px; background-size: cover;">--}}
{{--                        <div class="prop-info">--}}
{{--                            <div class="position-absolute bottom-0 start-0">--}}
{{--                                <img src="/assets/images/site/c-logo.png" class="prop-logo p-1 m-2" alt="">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <ul class="list-unstyled info-list">--}}
{{--                    <li>Established Year <span class="float-end">1996</span></li>--}}
{{--                    <li>Ownership <span class="float-end">Deemed</span></li>--}}
{{--                </ul>--}}

{{--            </div>--}}
{{--            <div class="col-md-3">--}}
{{--                <div class="p-3">--}}
{{--                    <div class="add-new text-center">--}}
{{--                        <div class="add-icon"><i class="fas fa-plus"></i></div>--}}
{{--                        <p class="f-14">Add College</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>

        <div class="row">
            <div class="col text-center headline">Course Details</div>
        </div>
        <div class="row">
            @foreach($prop as $p => $val)
{{--                {{$val->courses}}--}}
                <div class="col-md-3">

                    <ul class="list-unstyled info-list mt-2">
                        <li>Course Credential <span class="float-end">{{$val->courses[0]->type}}</span></li>
                        <li>Course Level <span class="float-end">{{$val->courses[0]->eligibility}}</span></li>
                        <li>Duration <span class="float-end">{{$val->courses[0]->year}} Year</span></li>
                        <li>Mode <span class="float-end">Full Time</span></li>
                    </ul>
                    <ul class="list-unstyled info-list mt-2">
                        @foreach($val->courses as $c => $pa)
                            @if($c < 4)
                        <li>{{$pa->streams[0]->name}} <span class="float-end">₹{{$pa->price}} (1st Year Fees)</span></li>
                            @endif
                        @endforeach
{{--                        <li>M.Tech <span class="float-end">₹2.2Lakhs (1st Year Fees)</span></li>--}}
{{--                        <li>Ph.d <span class="float-end">₹3.2Lakhs (Total Fees)</span></li>--}}
{{--                        <li>BCA <span class="float-end">₹90,000 (1st Year Fees)</span></li>--}}
                    </ul>
                </div>
            @endforeach
                @for($i=4; $i > count($prop); $i--)
                    <div class="col-md-3">

{{--                        <ul class="list-unstyled info-list mt-2">--}}
{{--                            <li>Course Credential <span class="float-end">Degree</span></li>--}}
{{--                            <li>Course Level <span class="float-end">UG</span></li>--}}
{{--                            <li>Duration <span class="float-end">4 Year</span></li>--}}
{{--                            <li>Mode <span class="float-end">Full Time</span></li>--}}
{{--                        </ul>--}}
{{--                        <ul class="list-unstyled info-list mt-2">--}}
{{--                            <li>B.Tech <span class="float-end">₹2.2Lakhs (1st Year Fees)</span></li>--}}
{{--                            <li>M.Tech <span class="float-end">₹2.2Lakhs (1st Year Fees)</span></li>--}}
{{--                            <li>Ph.d <span class="float-end">₹3.2Lakhs (Total Fees)</span></li>--}}
{{--                            <li>BCA <span class="float-end">₹90,000 (1st Year Fees)</span></li>--}}
{{--                        </ul>--}}
                    </div>
                @endfor
            </div>

        </div>

    </div>
</section>
    <!-- success Modal -->
    <div class="modal fade" id="compareModal" tabindex="-1" aria-labelledby="queryModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl">
            <div class="modal-content">

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

{{--                            <div class="col-md-6 custom-radio">--}}
{{--                                <div class="row m-1 py-2 bg-white">--}}
{{--                                    <div class="col-2 text-center px-1">--}}
{{--                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-2 px-1" for="flexRadioDefault1">--}}
{{--                                        <div class="logo position-relative">--}}
{{--                                            <div class="d-inline-block prop-logo">--}}
{{--                                                <img src="assets/images/admission-jockey-logo.png" class="p-2" alt="">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-7" for="flexRadioDefault1">--}}
{{--                                        <div class="prop-info">--}}
{{--                                            <p class="f-14 pcolor mb-1">Sai Group of Institution in Dehradun</p>--}}
{{--                                            <p class="f-12 mb-1"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> Dehradun, Uttarakhand</p>--}}
{{--                                            <p class="f-14 pcolor mb-1"><i class="fas fa-rupee-sign" aria-hidden="true"></i> B.tech - 7L to 8L</p>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                        </div>
                        <div class="row p-3 pb-4">
                            <div class="col">
                                <ul class="list-unstyled ver-line-menu float-end">
                                    <li class="me-2"><button class="btn site-btn-4"> close </button></li>
                                    <li><button class="btn site-btn-1 btn-sm float-end" onclick="chooseProp()"> Save </button></li>
                                </ul>

                            </div>
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
        $("#compareSearch").keyup(function () {
            var text = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{route('search-college-api')}}",
                data: {
                    'search': text
                },
                success: function (data) {
                    $("#compareListCollege").html("");
                    for (var i = 0; i < data.length; i++) {
                        $("#compareListCollege").append("<div class=\"col-md-6 custom-radio\"><div class=\"row m-1 py-2 bg-white\"><div class=\"col-2 text-center px-1\"><input class=\"form-check-input\" type=\"radio\" name=\"flexRadioDefault\" value=\""+data[i].seo[0].permalink+"\" id=\"flexRadioDefault1\"><\/div><div class=\"col-2 px-1\" for=\"flexRadioDefault1\"><div class=\"logo position-relative\"><div class=\"d-inline-block prop-logo\"><img src=\"{{env('MEDIA_URL')}}property/"+data[i].id+"/logo/"+data[i].logo+"-md.webp\" class=\"p-2\" alt=\"\"><\/div><\/div><\/div><div class=\"col-7\" for=\"flexRadioDefault1\"><div class=\"prop-info\"><p class=\"f-14 pcolor mb-1\">"+data[i].name+"<\/p><p class=\"f-12 mb-1\"><i class=\"fas fa-map-marker-alt\" aria-hidden=\"true\"><\/i> "+data[i].location.cities.name+", "+data[i].location.states.name+"<\/p><p class=\"f-14 pcolor mb-1\"><i class=\"fas fa-rupee-sign\" aria-hidden=\"true\"><\/i> "+data[i].courses[0].streams[0].name+" - "+data[i].courses[0].price+"<\/p><\/div><\/div><\/div><\/div>");
                    }
                }
            });
        });

        function removeProp(id){
            var url = window.location.href;
            var split = url.split('-vs-');
            split.splice(id,1);
            window.location.href = split.join('-vs-');
        }
        function chooseProp(){
            var check = $('input[name=flexRadioDefault]:checked').val();
            if(check != undefined){
                window.location.href = ""+window.location.href+""+"-vs-"+""+check+"";
            }
        }
    </script>
    @endsection
