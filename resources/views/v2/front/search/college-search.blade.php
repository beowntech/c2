@extends('v2.front.layout.header')
@section('content')
    <section class="shadow">
        <div class="container">
            <div class="row py-2">
                <div class="col-md-6 offset-md-3 position-relative">
                    <form action="{{ route('search-college') }}">
                        <input type="search" name="search" autocomplete="off" class="form-control hero-search site-shadow-sm"
                            placeholder="College Name">
                        <button type="submit" class="btn btn-search top-50 position-absolute end-20 translate-middle-y">
                            <i class="fas fa-search"></i> Search</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="bglg">
        <div class="container">
            <div class="row mx-0">
                <div class="col small px-3 pt-3">
                    <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Admissionjockey</a></li>
                            @if (count(request()->query()) == 0)
                                <li class="breadcrumb-item active" area-current="page"><a
                                        href="{{ request()->fullUrl() }}" class="text-decoration-none">Search</a></li>
                            @else
                                @foreach (request()->query() as $q => $qu)
                                    @foreach (explode(',', request()->query($q)) as $f => $fi)
                                        @if ($f == 0)
                                            <li class="breadcrumb-item active" area-current="page"><a
                                                    href="{{ request()->fullUrl() }}"
                                                    class="text-decoration-none">{{ ucfirst($fi) }}</a></li>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endif
                            {{-- <li class="breadcrumb-item active" aria-current="page">Banglore College</li> --}}
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row mx-0">
                <div class="col-md-3">
                    <div class="filter-bar">
                        {{-- <div class="map text-center">
                            <div class="btn site-btn-map"> Map View</div>
                        </div> --}}
                        <p class="small">{{ count($data) }} Colleges</p>
                        <div class="divider-span">
                            <p>Selected Filter <span class="float-end small"><a href="{{ request()->url() }}">Set
                                        default</a></span></p>
                        </div>
                        <div class="filtered-option">
                            {{-- {{dd(request()->query())}} --}}
                            @if (request()->query() == null)
                                <div class="chip chip-md filter-chip">
                                    <i class="fas fa-circle"></i> All
                                </div>
                            @endif
                            @foreach (request()->query() as $q => $qu)
                                @foreach (explode(',', request()->query($q)) as $f => $fi)
                                    <div class="chip chip-md filter-chip">
                                        <i class="fas fa-circle"></i> {{ ucfirst($fi) }}
                                        @php
                                            $qs = explode(',', request()->query($q));
                                            unset($qs[$f]);
                                        @endphp
                                        <a
                                            href="{{ request()->fullUrlWithQuery([$q => count($qs) == 0 ? null : implode(',', $qs)]) }}"><i
                                                class="close fas fa-times"></i></a>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                        {{-- <div class="divider-span"> --}}
                        {{-- <p>Stream</p> --}}
                        {{-- </div> --}}
                        {{-- <div class="px-4 my-2"> --}}
                        {{-- <input type="search" name="" class="form-control form-control-sm border-radius-md "> --}}
                        {{-- <ul class="list-unstyled filter-checkbox"> --}}
                        {{-- <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li> --}}
                        {{-- <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li> --}}
                        {{-- <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li> --}}
                        {{-- <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li> --}}
                        {{-- <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li> --}}
                        {{-- </ul> --}}
                        {{-- </div> --}}
                        <div class="divider-span">
                            <p>City</p>
                        </div>
                        <div class="px-4 my-2">
                            {{-- <input type="search" name="" class="form-control form-control-sm border-radius-md "> --}}
                            <ul class="list-unstyled filter-checkbox">
                                @foreach ($city as $c => $ct)
                                    <li><input type="checkbox" name="city[]"
                                            {{ in_array(strtolower($ct->name), explode(',', request()->query('city'))) ? 'checked' : '' }}
                                            class="form-check-input" id="cityC{{ $c }}"
                                            value="{{ strtolower($ct->name) }}"> <label for="cityC{{ $c }}">
                                            {{ $ct->name }} - [{{ $ct->location_count }}]</label></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="divider-span">
                            <p>State</p>
                        </div>
                        <div class="px-4 my-2">
                            {{-- <input type="search" name="" class="form-control form-control-sm border-radius-md "> --}}
                            <ul class="list-unstyled filter-checkbox">
                                @foreach ($state as $s => $st)
                                    <li> <input type="checkbox" name="state[]"
                                            {{ in_array(strtolower($st->name), explode(',', request()->query('state'))) ? 'checked' : '' }}
                                            class="form-check-input" id="stateS{{ $s }}"
                                            value="{{ strtolower($st->name) }}"> <label
                                            for="stateS{{ $s }}">{{ $st->name }} -
                                            [{{ $st->location_count }}]</label></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="divider-span">
                            <p>College Type</p>
                        </div>
                        <div class="px-4 my-2">
                            {{-- <input type="search" name="" class="form-control form-control-sm border-radius-md "> --}}
                            <ul class="list-unstyled filter-checkbox">
                                <li> <input type="checkbox" name="type[]" id="type1"
                                        {{ in_array(1, explode(',', request()->query('type'))) ? 'checked' : '' }}
                                        class="form-check-input" value="1"> <label for="type1">Public</label></li>
                                <li> <input type="checkbox" name="type[]" id="type2"
                                        {{ in_array(2, explode(',', request()->query('type'))) ? 'checked' : '' }}
                                        class="form-check-input" value="2"> <label for="type2">Private</label></li>
                                <li> <input type="checkbox" name="type[]" id="type3"
                                        {{ in_array(3, explode(',', request()->query('type'))) ? 'checked' : '' }}
                                        class="form-check-input" value="3"><label for="type3"> Govt.</label></li>
                                <li> <input type="checkbox" name="type[]" id="type4"
                                        {{ in_array(4, explode(',', request()->query('type'))) ? 'checked' : '' }}
                                        class="form-check-input" value="4"> <label for="type4">Deamed</label></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-md-9">
                    @if ($ads != null)
                        @foreach ($ads as $a)
                            @if ($a->position == 'top')
                                <div class="text-center">
                                    <a href="{{json_decode($a->data)->url}}"><img src="/ads/images/{{$a->image}}" alt="" class=""></a>
                                </div>
                            @endif
                        @endforeach
                    @endif
                    <div class="pt-2 small">
                        <p class="d-inline-block mb-0"> {{ count($data) }} Colleges </p>
                        {{-- <ul class="d-inline-block list-unstyled ver-line-menu float-end">
                            <li><strong>Sort By</strong></li>
                            <li>Polpularity <i class="fas fa-sort-amount-up-alt"></i></li>
                            <li>Rating <i class="fas fa-sort-amount-up-alt"></i></li>
                            <li>Highest Fees <i class="fas fa-sort-amount-down-alt"></i></li>
                            <li>Lowest Fees <i class="fas fa-sort-amount-down"></i></li>
                        </ul> --}}
                    </div>
                    <div class="row" id="propertyData">
                        @foreach ($data as $k => $val)
                            @if ($k == 4)
                                <div class="container px-5" c>
                                    <div class="row">
                                        <div class="col-md-6 mb-3 position-relative">
                                            <a href="/blog/loan-form">
                                                <div class="action-bg-1"
                                                    style="background:url(/v2/assets/images/site/hostel.jpg);background-size: cover;background-position: center;">
                                                    <div class="position-absolute bottom-0 start-0 text-white">
                                                        <p class="mb-0 text-uppercase ps-4">sponsored</p>
                                                        <h3 class="ps-4">Find Students Loan Options <i
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
                                                        <p class="mb-0 text-uppercase ps-4">sponsored</p>
                                                        <h3 class="ps-4">Find Students Hostel Options <i
                                                                class="fas fa-arrow-circle-right" aria-hidden="true"></i>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-6">
                                @if ($val->featured == 1)
                                    <div class='theribbon'>FEARTURED COLLEGE </div>
                                @endif
                                <div class="prop-card-1 {{ $val->featured == 1 ? 'featured featured-ribbon' : '' }}">
                                    <div class="logo position-relative mb-1">
                                        <div class="d-inline-block prop-logo">
                                            <a
                                                href="/college-in-{{ str_replace(' ', '_', str_replace('/[^A-Za-z0-9\-]/', '-', strtolower($val->location == null ? '' : $val->location->cities->name))) }}/{{ $val->seo == null ? '' : $val->seo[0]->permalink }}">
                                                <img src="{{ env('MEDIA_URL') }}property/{{ $val->id }}/logo/{{ substr_count($val->logo, '.jpg') || substr_count($val->logo, '.jpeg') || substr_count($val->logo, '.png') !== false ? $val->logo: $val->logo.'-md.webp' }}"
                                                    class="p-2" alt="">
                                            </a>
                                        </div>
                                        {{-- <img src="{{env('MEDIA_URL')}}property/{{$val->id}}/logo/{{$val->logo}}-md.webp" class="prop-logo" alt=""> --}}
                                        <p class="d-inline-block position-absolute top-0 end-0 small">
                                            @if ($val->review != null)
                                                @if (count($val->review) > 0)
                                                    @php $revi = count($val->review);@endphp
                                                    <input type="hidden"
                                                        value="{{ $revs = $val->review }},{{ $avg = $val->review->isEmpty() ? 0 : $val->review[0]->avg('stars') }}">
                                                    @foreach (range(1, 5) as $i)
                                                        @if ($revi > 0)
                                                            @if ($revi > 0.5)
                                                                <i class="fa fa-star gcolor" aria-hidden="true"></i>
                                                            @else
                                                                <i class="fa fa-star-half-alt gcolor"
                                                                    aria-hidden="true"></i>
                                                            @endif
                                                        @else
                                                            <i class="fa fa-star-o"></i>
                                                        @endif
                                                        @php $revi--;@endphp
                                                    @endforeach
                                                    @if (count($val->review) == 1)
                                                        {{ count($val->review) }} Review
                                                    @else
                                                        {{ count($val->review) }} Reviews
                                                    @endif
                                                @endif
                                            @endif
                                            {{-- <i class="fas fa-star"></i> --}}
                                            {{-- <i class="fas fa-star"></i> --}}
                                            {{-- <i class="fas fa-star"></i> --}}
                                            {{-- <i class="fas fa-star"></i> --}}
                                            {{-- <i class="fas fa-star"></i> --}}
                                        </p>
                                    </div>
                                    <div class="prop-info">
                                        <p class="f-20 pcolor"><a style="color: initial;"
                                                href="/college-in-{{ str_replace(' ', '_', str_replace('/[^A-Za-z0-9\-]/', '-', strtolower($val->location == null ? '' : $val->location->cities->name))) }}/{{ $val->seo == null ? '' : $val->seo[0]->permalink }}">{{ Illuminate\Support\Str::limit($val->name, 35, $end='...') }}</a>
                                        </p>
                                        <p><i class="fas fa-map-marker-alt"></i> {{ $val->location->cities->name }},
                                            {{ $val->location->states->name }}</p>
                                        <!-- <p><i class="fas fa-rupee-sign"></i> B.tech - 7L to 8L</p> -->
                                        <ul class="d-inline-block list-unstyled ver-line-menu text-secondary small py-3">
                                            <li class="me-3">Type -
                                                {{ $val->college_type == 1 ? 'Public' : ($val->college_type == 2 ? 'Private' : ($val->college_type == 3 ? 'Govt.' : ($val->college_type == 4 ? 'Deemed' : ''))) }}
                                            </li>
                                            <li class="me-3">Apporved by: {{ $val->approved_by }}</li>
                                            <li class="me-3">NIRF Ranking - 12</li>
                                        </ul>
                                        <ul class="d-inline-block list-unstyled ver-line-menu text-secondary small">
                                            <li class="me-2"><button class="btn site-btn-1 f-14 openApplyNow"
                                                    data-id="{{ $val->id }}" data-name="{{ $val->name }}"
                                                    data-bs-toggle="modal" data-bs-target="#applyNow"> Apply Now </button>
                                            </li>
                                            <li class="me-2"><a data-bs-toggle="modal"
                                                    data-bs-target="#compareModal"
                                                    data-slug="{{ $val->seo[0]->permalink }}" href="#"
                                                    class="btn hover-site-btn-1 scolor f-14"> Compare </a></li>
                                            <li><a target="_blank"
                                                    href="/college-in-{{ str_replace(' ', '_', str_replace('/[^A-Za-z0-9\-]/', '-', strtolower($val->location == null ? '' : $val->location->cities->name))) }}/{{ $val->seo == null ? '' : $val->seo[0]->permalink }}"
                                                    class="btn hover-site-btn-1 scolor f-14"> Visit Details </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if (count($data) == 20)
                        <div class="text-center mb-3">
                            <button class="btn site-btn-1" id="viewMore">View More</button>
                        </div>
                    @endif
                    @if ($ads != null)
                        @foreach ($ads as $a)
                            @if ($a->position == 'bottom')
                                <div class="text-center mb-3">
                                    <a href="{{json_decode($a->data)->url}}"><img src="/ads/images/{{$a->image}}" alt="" class=""></a>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
    <script>
        $(document).on("click", ".openApplyNow", function() {
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
    <script type="text/javascript">
        let page = 2;
        let url =
            "{{ request()->query() != null ? htmlspecialchars_decode(str_replace('http', 'https', request()->fullUrl()) . '&page=') : str_replace('http', 'https', request()->fullUrl()) . '?page=' }}"
        $("#viewMore").click(function() {
            $.ajax({
                url: url.replace('&amp;', '&') + page,
                success: function(result) {
                    console.log(result);
                    page = page + 1;
                    if (result.next_page_url == null) {
                        $("#viewMore").addClass('d-none');
                    }
                    var data = result.data;
                    for (var i = 0; i < data.length; i++) {
                        $("#propertyData").append("<div class=\"col-md-6 col-xxl-4\">\n" +
                            "        <div class=\"prop-card-1\">\n" +
                            "            <div class=\"logo position-relative mb-1\">\n" +
                            "                <div class=\"d-inline-block prop-logo\">\n" +
                            "                    <img src=\"{{ env('MEDIA_URL') }}property/" +
                            data[i].id + "/logo/" + data[i].logo +
                            "-md.webp\" class=\"p-2\" alt=\"\">\n" +
                            "                </div>\n" +
                            "                {{-- <img src=\"{{env('MEDIA_URL')}}property/{{$val->id}}/logo/{{$val->logo}}-md.webp\" class=\"prop-logo\" alt=\"\"> --}}\n" +
                            "                <p class=\"d-inline-block position-absolute top-0 end-0 small\">\n" +
                            "                    <a href=\"\">\n" +
                            "                    </a>\n" +
                            "                </p>\n" +
                            "            </div>\n" +
                            "            <div class=\"prop-info\">\n" +
                            "                <p class=\"f-20 pcolor\">" + data[i].name + "</p>\n" +
                            "                <p><i class=\"fas fa-map-marker-alt\"></i> " + data[i]
                            .location.cities.name + ", " + data[i].location.states.name + "</p>\n" +
                            "                <ul class=\"d-inline-block list-unstyled ver-line-menu text-secondary small py-3\">\n" +
                            "                    <li class=\"me-3\">Type - Private</li>\n" +
                            "                    <li class=\"me-3\">Apporved by: " + data[i]
                            .approved_by + "</li>\n" +
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
        $(function() {
            var city = "";
            var empty = false;
            $('input[type="checkbox"][name="city[]"]').click(function() {
                $('input[type="checkbox"][name="city[]"]:checked').each(function() {
                    if (city != "") {
                        city += ',' + $(this).val();
                    } else {
                        empty = true;
                        city = $(this).val();
                    }
                });
                var url =
                    "{{ request()->query('city') != null ? request()->fullUrlWithQuery(['city' => null]) : request()->fullUrl() }}";
                var finalU = url + "{{ request()->query() != null ? '&city=' : '?city=' }}"
                if (!empty) {
                    window.location.href = url;
                } else {
                    window.location.href = finalU.replace('&amp;', '&') + city;
                }
            });
            var state = "";
            var empty = false;
            $('input[type="checkbox"][name="state[]"]').click(function() {
                $('input[type="checkbox"][name="state[]"]:checked').each(function() {
                    if (state != "") {
                        state += ',' + $(this).val();
                    } else {
                        empty = true;
                        state = $(this).val();
                    }
                });
                var url =
                    "{{ request()->query('state') != null ? request()->fullUrlWithQuery(['state' => null]) : request()->fullUrl() }}";
                var finalUrl = url + "{{ request()->query() != null ? '&state=' : '?state=' }}"
                if (!empty) {
                    window.location.href = url;
                } else {
                    window.location.href = finalUrl.replace('&amp;', '&') + state;
                }
            });
            var type = "";
            $('input[type="checkbox"][name="type[]"]').click(function() {
                $('input[type="checkbox"][name="type[]"]:checked').each(function() {
                    if (type != "") {
                        type += ',' + $(this).val();
                    } else {
                        empty = true;
                        type = $(this).val();
                    }
                });
                var url =
                    "{{ request()->query('type') != null ? request()->fullUrlWithQuery(['type' => null]) : request()->fullUrl() }}";
                var finalUrl = url + "{{ request()->query() != null ? '&type=' : '?type=' }}";
                if (!empty) {
                    window.location.href = url;
                } else {
                    window.location.href = finalUrl.replace('&amp;', '&') + type;
                }
            });
        });
    </script>
@endsection

@section('modal')
    @include('v2.front.modal.compare')
    @include('v2.front.modal.applynow')
@endsection
