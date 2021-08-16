@extends('front.layout.header')
@section('content')
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3 filter my-2 d-none d-sm-block">
                    <div class="filter">
                        <div class="mt-2"><h2 class="filter-heading">Examination Type</h2></div>
                        <div class="filter-area  bg-white">
                            <div class="fix-20">
                                <div class="form-check" style="margin-bottom: 1px;">
                                    <input class="form-check-input searchcheck" type="checkbox" data-name="National Wise" {{request()->type == "National" ? 'checked': ''}} value="National" id="nationalWise">
                                    <label class="form-check-label" for="nationalWise">
                                        National Wise
                                    </label>
                                </div>
                                <div class="form-check" style="margin-bottom: 1px;">
                                    <input class="form-check-input searchcheck" type="checkbox" {{request()->type == "State" ? 'checked': ''}} data-name="State Wise" value="State" id="stateWise">
                                    <label class="form-check-label" for="stateWise">
                                        State Wise
                                    </label>
                                </div>
                            </div>
                        </div>

{{--                        <div class="mt-2"><h2 class="filter-heading">Application & Exam Status</h2></div>--}}
{{--                        <div class="filter-area  bg-white">--}}
{{--                            <div class="fix-20">--}}
{{--                                <div class="form-check" style="margin-bottom: 1px;">--}}
{{--                                    <input class="form-check-input searchcheck" type="checkbox" data-name="UPCOMING APPLICATION FORM DATE" value="1" id="upafd">--}}
{{--                                    <label class="form-check-label" for="upafd">--}}
{{--                                        Upcoming Application Form Date--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="form-check" style="margin-bottom: 1px;">--}}
{{--                                    <input class="form-check-input searchcheck" type="checkbox" data-name="upexams" value="0" id="upexams">--}}
{{--                                    <label class="form-check-label" for="upexams">--}}
{{--                                        Upcoming Exams--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="mt-2"><h2 class="filter-heading">Examination Mode</h2></div>
                        <div class="filter-area  bg-white">
                            <div class="fix-20">
                                <div class="form-check" style="margin-bottom: 1px;">
                                    <input class="form-check-input searchcheckMode" type="checkbox" {{request()->mode == "Online" ? 'checked': ''}} data-name="Onine" value="Online" id="onlineMode">
                                    <label class="form-check-label" for="onlineMode">
                                        Online
                                    </label>
                                </div>
                                <div class="form-check" style="margin-bottom: 1px;">
                                    <input class="form-check-input searchcheckMode" type="checkbox" {{request()->mode == "Offline" ? 'checked': ''}} data-name="Offline" value="Offline" id="offlineMode">
                                    <label class="form-check-label" for="onlineMode">
                                        Offline
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <span data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                                      aria-controls="offcanvasExample" class="d-block d-sm-none mb-1">Filter  <i
                                        class="fas fa-sort-amount-up-alt"></i></span>

                                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                                     aria-labelledby="offcanvasExampleLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Filter</h5>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <div class="filter">
                                            <div class="mt-2"><h2 class="filter-heading">Stream</h2></div>
                                            <div class="filter-area  bg-white">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-search"></i></span>
                                                    <input type="text" class="form-control" placeholder="Stream">
                                                </div>
                                                <div class="fix-20">
                                                    {{--                                @foreach($stream as $s => $st)--}}
                                                    {{--                                    <div class="form-check" style="margin-bottom: 1px;">--}}
                                                    {{--                                        <input class="form-check-input searchcheck" type="checkbox" data-name="{{$st->name}}" value="{{$st->name}}" id="stream_{{$s}}">--}}
                                                    {{--                                        <label class="form-check-label" for="stream_{{$s}}">--}}
                                                    {{--                                            {{$st->name}}--}}
                                                    {{--                                        </label>--}}
                                                    {{--                                    </div>--}}
                                                    {{--                                @endforeach--}}
                                                </div>
                                            </div>

                                            <div class="mt-2"><h2 class="filter-heading">Sub Stream</h2></div>
                                            <div class="filter-area  bg-white">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-search"></i></span>
                                                    <input type="text" class="form-control" placeholder="Sub Stream">
                                                </div>
                                                <div class="fix-20">

                                                    <div class="form-check" style="margin-bottom: 1px;">
                                                        <input class="form-check-input searchcheck"
                                                               data-name="Mechanical Engineering" type="checkbox"
                                                               value="Mechanical Engineering" id="stream_0">
                                                        <label class="form-check-label" for="stream_0">
                                                            Mechanical Engineering
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="mt-2"><h2 class="filter-heading">State</h2></div>
                                            <div class="filter-area  bg-white">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-search"></i></span>
                                                    <input type="text" class="form-control" placeholder="State">
                                                </div>
                                                <div class="fix-20">
                                                    {{--                                @foreach($state as $s => $si)--}}
                                                    {{--                                    <div class="form-check" style="margin-bottom: 1px;">--}}
                                                    {{--                                        <input class="form-check-input searchcheck" type="checkbox" data-name="{{$si->name}}" value="{{$si->id}}" id="state_{{$s}}">--}}
                                                    {{--                                        <label class="form-check-label" for="state_{{$s}}">--}}
                                                    {{--                                            {{ucfirst($si->name)}}--}}
                                                    {{--                                        </label>--}}
                                                    {{--                                    </div>--}}
                                                    {{--                                @endforeach--}}
                                                </div>
                                            </div>
                                            <div class="mt-2"><h2 class="filter-heading">City</h2></div>
                                            <div class="filter-area  bg-white">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-search"></i></span>
                                                    <input type="text" class="form-control" placeholder="City">
                                                </div>
                                                <div class="fix-20">
                                                    {{--                                @foreach($city as $c => $ci)--}}
                                                    {{--                                    <div class="form-check" style="margin-bottom: 1px;">--}}
                                                    {{--                                        <input class="form-check-input searchcheck" type="checkbox" data-name="{{$ci[0]->name}}" value="{{$ci[0]->id}}" id="city_{{$c}}">--}}
                                                    {{--                                        <label class="form-check-label" for="city{{$c}}">--}}
                                                    {{--                                            {{ucfirst($ci[0]->name)}}--}}
                                                    {{--                                        </label>--}}
                                                    {{--                                    </div>--}}
                                                    {{--                                @endforeach--}}
                                                </div>
                                            </div>
                                        </div>
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
                            @if(!$data->isEmpty())
                            @foreach($data as $k => $val)
                                <div class="col-md-12">
                                    <div class="row college-info-2">
                                        <div class="col-md-4">
                                            <div class="position-relative">
                                                <div class="cover-img box"
                                                     style="background:url(/exams/{{$val->exam_image}});box-shadow: none;background-size:cover;background-position: center">
                                                    {{--                                                    <div--}}
                                                    {{--                                                        class="college-info-logo position-absolute bottom-0 start-5 p-2 ">--}}
                                                    {{--                                                        <a href="#"> <img--}}
                                                    {{--                                                                src="/exams/{{$val->exam_image}}" alt=""></a>--}}
                                                    {{--                                                    </div>--}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 college-info position-relative">
                                            <p>
                                                <a href="/exam/{{$val->seo[0]->permalink}}" style="font-size: 23px">{{$val->exam_name}}</a>
                                            </p>
                                            <p>
                                                <span class="badge {{$val->exam_mode == 1 ? 'bg-danger' : 'bg-light text-dark'}}">{{$val->exam_mode == 1 ? 'Online Test':'Written Test'}}</span>
                                                <span class="badge {{$val->exam_type == 1 ? 'bg-success' : 'bg-warning text-dark'}}">{{$val->exam_type == 1 ? 'National Wise':'State Wise'}}</span><br>
                                            <p>@if($val->exam_from_to != null)Exam From: {{json_decode($val->exam_from_to)->from}} to {{json_decode($val->exam_from_to)->to}}@endif</p>
                                            <p>Apllication: {{$val->exam_application_from_to}}</p>
                                            </p>
                                            <p>
                                            </p>
                                            <div class="position-absolute bottom-0 end-0 pe-2 pb-2">
                                                {{--                                                <a href="#" class="btn site-btn-1 btn-sm text-white quickEnquiryDetail"--}}
                                                {{--                                                   data-bs-toggle="modal" data-name="{{$val->exam_name}}"--}}
                                                {{--                                                   data-bs-target="#exampleModal">Quick Enquiry</a>--}}
                                                <a href="#"
                                                   class="btn site-btn-1 btn-sm text-white">Check Exam</a>
                                                {{--                                                <button type="button" data-id="{{$val->exam_id}}" data-name="{{$val->exam_name}}"--}}
                                                {{--                                                        data-image="{{$val->exam_image}}"--}}
                                                {{--                                                        class="btn site-btn-2 btn-sm openCompare">Compare--}}
                                                {{--                                                </button>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @else
                                <h3 class="mt-4">No Data Available</h3>
                            @endif
                        </div>
                    </div>
                    @if($data->count() > 10)
                        <nav aria-label="Page navigation example" id="navigationbottom">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                {{--                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                                {{--                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                                <li class="page-item disabled">
                                    <a class="page-link " href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            //Category Filter
            var type = "{{request()->type != null ? request()->type: ''}}";
            var mode = "{{request()->mode != null ? request()->mode: ''}}";
            $('.searchcheck').change(function () {
                type="";
                $('.searchcheck:checked').each(function (i, e) {
                    $(this).removeAttr('checked');
                });
                $('.searchcheck:checked').each(function (i, e) {
                    type = e.value;
                });
                searchFilter(type,mode);
            });
            $('.searchcheckMode').change(function () {
                mode = "";
                $('.searchcheckMode:checked').each(function (i, e) {
                    $(this).removeAttr('checked');
                });
                $('.searchcheckMode:checked').each(function (i, e) {
                    mode = e.value;
                });
                searchFilter(type,mode);
            });
            function searchFilter(val,val1) {
                window.history.replaceState(null, null, "?type="+val+"&mode="+val1+"");
                window.location.reload();
            }

        });
    </script>
@endsection
