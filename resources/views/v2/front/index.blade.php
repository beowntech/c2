@extends('v2.front.layout.header')
@section('content')
    <section id="heroimage"
        style="background:url('/v2/assets/images/site/heroimage.jpg');background-repeat:no-repeat;background-size: cover;background-position: left;">
        <div class="container">
            <div class="row">
                <div class="col-md-5">

                </div>
                <div class="col-md-7 height-80 hero-text">
                    <div class="vertical-65 text-center">
                        <h1>Plan your path to college</h1>
                        <h2>That Fits Your Best</h2>
                        <p class="text">Finding the right College Shouldn't be hard. <br> we make it easy to
                            discover
                            and connect with the best ones for you</p>
                        <div class="mb-3  position-relative">
                            <form action="{{ route('search-college') }}">
                                <input type="search" name="search" autocomplete="off" class="form-control hero-search" id="exampleDataList"
                                    placeholder="College Name">
                                <button type="submit"
                                    class="btn btn-search position-absolute top-50 end-10 translate-middle-y"><i
                                        class="fas fa-search"></i> Search
                                </button>
                            </form>
                            <div class="search-result py-2 text-start bg-white border-radius-md mt-1 liveSearch">
                                <p class="mb-0  ps-3">Colleges</p>
                                <ul class="list-unstyled ps-4">

                                </ul>
                                <p class="mb-0 ps-3">Courses</p>
                                <ul class="list-unstyled ps-4">

                                </ul>
                            </div>
                        </div>
                        <p class="text-start ps-4">Need Help - <a href="#" class="openApplyNow" data-bs-toggle="modal"
                                data-bs-target="#applyNow">Click Here</a></p>
                        <div class="hero-highlight float-end text-start">
                            <p class="mb-0">Ranked</p>
                            <h3 class="mb-0"><strong>50+</strong> College</h3>
                            <a href="https://admissionjockey.com/top-50-colleges-in-india">view all top college</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="height-90 py-10">
        <div class="container">
            <div class="row mb-10">
                <div class="col text-center">
                    <p class="mb-0">Why Admission Jockey?</p>
                    <h2>Your career <br> top priority for us</h2>
                    <div class="text-center"><img src="v2/assets/images/site/triangle.png" alt=""></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 text-center">
                    <div class="box-card-1">
                        <img src="v2/assets/images/icon/expert-guidance.png" alt="">
                        <h2 class="f-18">Expert Guidance</h2>
                        <p>Get the education & career guidance from expert education jockeys</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="box-card-1">
                        <img src="v2/assets/images/icon/find.png" alt="">
                        <h2 class="f-18">Find Best college</h2>
                        <p>Find best college for future career</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="box-card-1">
                        <img src="v2/assets/images/icon/compare.png" alt="">
                        <h2 class="f-18">Compare Colleges</h2>
                        <p>Everythind you need to make youe decision</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="box-card-1">
                        <img src="v2/assets/images/icon/afordable.png" alt="">
                        <h2 class="f-18"> Accommodations</h2>
                        <p>Discover Affordable Accommodations and Cheap Hotels</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="c2a">
        <div class="container">
            <div class="row position-relative site-shadow-lg">
                <div class="col-md-1 text-center ">
                    <div class="position-absolute badge-pos translate-middle">
                        <img src="v2/assets/images/site/boy.png" class="bounce-content" alt="">
                    </div>
                </div>
                <div class="col-md-6 py-4 ps-5">
                    <h2 class="f-26">Request for your free video Guidance</h2>
                    <p>We are providing the free video guidance for your coll</p>
                </div>
                <div class="col-md-5 py-4">
                    <ul class="list-unstyled ver-line-menu float-end py-3">
                        {{-- <li><a href="#!" class="text-white "> Video Call Guide</a></li> --}}
                        <li><a href="{{route('schedule-video-call')}}" class="btn site-btn-1 ">Schedule your Video Call</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="height-90 py-8">
        <div class="container">
            <div class="row mb-5">
                <div class="col text-center">
                    <p class="mb-0 fw-6">Don't limit yourself to one option</p>
                    <h2>Explore your career path</h2>
                    <div class="text-center"><img src="v2/assets/images/site/triangle.png" alt=""></div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col text-center">
                    <ul class="list-unstyled ver-line-menu py-3">
                        <li>
                            <button class="btn site-btn-2 me-3 btn-active" id="college_service">Colleges</button>
                        </li>
                        {{-- <li> --}}
                        {{-- <button class="btn site-btn-2 me-3" id="exam_service">Exams</button> --}}
                        {{-- </li> --}}
                        {{-- <li>
                            <button class="btn site-btn-2 me-3">Courses</button>
                        </li> --}}
                        {{-- <li> --}}
                        {{-- <button class="btn site-btn-2 me-3">Career</button> --}}
                        {{-- </li> --}}
                        <li>
                            <button class="btn site-btn-2 me-3" id="location_service">Location</button>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="home-option" id="service1">
                <div class="mainCollegeCategory row">
                    @foreach ($fcatg as $c => $ca)
                        @foreach ($ca->children as $cc => $cac)
                            <div class="col-md-2 text-center">
                                <a style="text-decoration: inherit;color: black;" href="{{ route('search-college') }}?catg={{ strtolower($cac->name) }}">
                                <div class="box-card-sm">
                                    <img src="{{ env('MEDIA_URL') }}front/images/future/{{ $cac->image }}" alt="">
                                        <p class="f-16">{{ $cac->name }}</p>
                                    <p class="mt-1 small">{{ $cac->property }} Colleges</p>
                                </div>
                            </a>
                            </div>
                            @if ($cc == 11)
                                <?php break 2; ?>
                            @endif
                        @endforeach
                    @endforeach
                </div>
                <div class="viewMoreCollegeCategory row d-none">
                    @foreach ($fcatg as $c => $ca)
                        @foreach ($ca->children as $cc => $cac)
                            <div class="col-md-2 text-center">
                                <a style="text-decoration: inherit;color: black;" href="{{ route('search-college') }}?catg={{ strtolower($cac->name) }}">
                                <div class="box-card-sm">
                                    <img src="{{ env('MEDIA_URL') }}front/images/future/{{ $cac->image }}" alt="">
                                        <p class="f-16">{{ $cac->name }}</p>
                                    <p class="mt-1 small">{{ $cac->property }} Colleges</p>
                                </div>
                                </a>
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <div class="row mt-4">
                    <div class="col text-center">
                        <button class="btn site-btn-2 me-3 shadow text-secondary viewallCollege">View More <i
                                class="fas fa-bars text-secondary"></i></button>
                    </div>
                </div>
            </div>
            {{-- <div class="home-option d-none" id="service2"> --}}
            {{-- <div class="mainExamCategory row"> --}}
            {{-- @foreach ($fcatg as $c => $ca) --}}
            {{-- @foreach ($ca->children as $cc => $cac) --}}
            {{-- <div class="col-md-2 text-center"> --}}
            {{-- <div class="box-card-sm"> --}}
            {{-- <img src="{{env('MEDIA_URL')}}front/images/future/{{$cac->image}}" alt=""> --}}
            {{-- <a href="{{route('search-college')}}"><p class="f-16">{{$cac->name}}</p></a> --}}
            {{-- <p class="mt-1 small">{{$cac->exams}} Exams</p> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- @if ($cc == 11) --}}
            {{-- @php break 2; @endphp --}}
            {{-- @endif --}}
            {{-- @endforeach --}}
            {{-- @endforeach --}}
            {{-- </div> --}}
            {{-- <div class="viewMoreExamCategory row d-none"> --}}
            {{-- @foreach ($fcatg as $c => $ca) --}}
            {{-- @foreach ($ca->children as $cc => $cac) --}}
            {{-- <div class="col-md-2 text-center"> --}}
            {{-- <div class="box-card-sm"> --}}
            {{-- <img src="{{env('MEDIA_URL')}}front/images/future/{{$cac->image}}" alt=""> --}}
            {{-- <a href="{{route('search-college')}}"><p class="f-16">{{$cac->name}}</p></a> --}}
            {{-- <p class="mt-1 small">{{$cac->exams}} Exams</p> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- @endforeach --}}
            {{-- @endforeach --}}
            {{-- </div> --}}
            {{-- <div class="row mt-4"> --}}
            {{-- <div class="col text-center"> --}}
            {{-- <button class="btn site-btn-2 me-3 shadow text-secondary viewallExam">View More <i --}}
            {{-- class="fas fa-bars text-secondary"></i></button> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            <div class="row home-option d-none" id="service3">
                <div class="col-md-2 text-center">
                    <div class="box-card-sm">
                        <img src="/city/india.png" alt="">
                        <a href="{{ route('search-college') }}">
                            <p class="f-16">India</p>
                        </a>
                    </div>
                </div>
                @foreach ($state as $s => $st)
                    @if ($s < 11)
                        <div class="col-md-2 text-center">
                            <a style="text-decoration: inherit;color: black;" href="{{ route('search-college') }}?state={{ $st->name }}">
                            <div class="box-card-sm">
                                <img src="/city/{{ $st->image }}" alt="">
                                    <p class="f-16">{{ $st->name }}</p>
                            </div>
                            </a>
                        </div>
                    @else
                        <div class="col-md-2 text-center locationMore" style="display: none">
                            <a style="text-decoration: inherit;color: black;" href="{{ route('search-college') }}?state={{ $st->name }}">
                            <div class="box-card-sm">
                                <img src="/city/{{ $st->image }}" alt="">
                                    <p class="f-16">{{ $st->name }}</p>
                            </div>
                        </a>
                        </div>
                    @endif
                @endforeach
                <div class="row mt-4">
                    <div class="col text-center">
                        <button class="btn site-btn-2 me-3 shadow text-secondary viewallLocation">View More <i
                                class="fas fa-bars text-secondary"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="free-guidance-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7 text-white py-5">
                    <h1 class="mb-4"><strong> Free</strong> Guidance to <br> find your Best Fit College</h1>
                    <h4 class="mb-5">We will provide you the right guidance to find your best fit college for your
                        future career. Our expert consoler will take care about your career path.</h4>
                    <p class="f-20">How we guide</p>
                    <ul class="f-18 mb-5 list-point-lg">
                        <li>Tell us your college/ Location and course preference</li>
                        <li>We will provide you personalised expert guide</li>
                        <li>We start one to one counselling session</li>
                        <li>We provide the multiple option career options based on the preference</li>
                        <li>Our expert provide best fit colleges to your preferences</li>
                    </ul>
                    <a href="#" class="btn site-btn-3 btn-lg shadow px-4 openApplyNow" data-bs-toggle="modal"
                        data-bs-target="#applyNow"> <i class="fas fa-mobile-alt"></i> Ask to
                        Expert</a>
                </div>
                <div class="col-md-5">
                    <div class="py-5 ps-4 mt-4">
                        <div class="empty-1">

                        </div>
                        <div class="content-1">
                            <img src="v2/assets/images/site/jockey-icon.png" class="bounce-content" alt="">
                            <img src="v2/assets/images/site/expert-call.jpg" class="border-radius-lg" alt="">
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="height-100">
        <div class="container py-5">
            <div class="row mb-5">
                <div class="col text-center">
                    <p class="mb-2 f-18 pcolor">Helping on education funds</p>
                    <h2 class="mb-4 pcolor">Education loan facility</h2>
                    <h1 class="scolor f-44 mb-4 f-roboto ">3 Simple steps to Apply for an Educational loan</h1>
                    <p>Students can view, apply and track the education loan <br>
                        applications to banks anytime, anywhere by accessing the portal.</p>

                </div>
            </div>
            <div class="row">
                <div class="col-md-2 offset-md-3 text-center">
                    <img src="v2/assets/images/site/Layer 54.jpg" alt="">
                    <br>
                    <p class="d-inline-block">Register Now</p>
                </div>
                <div class="col-md-2 text-center">
                    <img src="v2/assets/images/site/Layer 55.jpg" alt="">
                    <br>
                    <p class="d-inline-block">Fill up the form</p>
                </div>
                <div class="col-md-2 text-center">
                    <img src="v2/assets/images/site/Layer 56.jpg" alt="">
                    <br>
                    <p class="d-inline-block">Apply to multiple Banks</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col text-center">
                    <ul class="list-unstyled ver-line-menu py-3">
                        <li><a href="/" class="btn site-btn-3 btn-lg site-shadow-md">Get Education Loan</a></li>
                        <li><a href="/"> Education Loan Info</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="height-100 bgp">

        <div class="container position-relative">
            <div class="position-absolute badge-pos translate-middle">
                <img class="animation-circle" src="v2/assets/images/site/hostel.png" alt="">
            </div>

            <div class="row mb-5 pt-5">
                <div class="col text-center text-white">
                    <h2 class="f-42"> Accommodation facility</h2>
                    <p class="f-18">Reserve your accommodation and focuson your study, we <br> will provide you
                        the
                        better hostel facility.</p>
                    <a href="/nearby/sai-group-of-institutions-dehradun" class="f-20 text-white">explore all accommodation</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="v2/assets/images/site/hostel.jpg" class="border-radius-sm mb-3" width="100%" alt="">
                </div>
                <div class="col-md-4">
                    <img src="v2/assets/images/site/hostel1.jpg" class="border-radius-sm mb-3" width="100%" alt="">
                </div>
                <div class="col-md-4">
                    <img src="v2/assets/images/site/hostel2.jpg" class="border-radius-sm mb-3" width="100%" alt="">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col text-center text-white">
                    <a href="/nearby/sai-group-of-institutions-dehradun" class="btn site-btn-1 btn-lg py-2 shadow px-5 f-14">Enquire Now</a>
                </div>
            </div>
        </div>
    </section>

    <section class="height-100 bgg">
        <div class="container">
            <div class="row py-5">
                <div class="col text-center">
                    <p class="mb-2 pcolor">Education Industry players who are seeking information</p>
                    <h2 class="pcolor">Top Featured College</h2>

                </div>
            </div>
            <div class="row college-list m-0">
                @foreach ($prop as $k => $val)
                    <div class="col-md-4">
                        <div class="college-card-sm featured">
                            <div class="mb-2 prop-image"
                                style="background:url({{ env('MEDIA_URL') }}property/{{ $val->id }}/gallery/featured/{{ $val->images[0]->featured . '-xl.webp' }});background-position:center;background-size: cover;">
                                <div class="prop-info">
                                    <div class="d-inline-block prop-logo">
                                        <img src="{{ env('MEDIA_URL') }}property/{{ $val->id }}/logo/{{ $val->logo . '-md.webp' }}"
                                            class="p-2" alt="">
                                    </div>
                                    @if (count($val->review) > 0)
                                        <span><i class="fas fa-star"></i> {{ $val->review->avg('stars') }}/5 </span>
                                        {{ count($val->review) }} reviews
                                    @endif
                                </div>
                            </div>
                            <div class="px-4 prop-iden">
                                <h2 class="f-14 mb-2 text-truncate">{{ $val->name }} {{ $val->featured }}</h2>
                                <p class="mb-3 f-12">
                                    {{ $val->location == null ? '' : $val->location->cities->name }}
                                    , {{ $val->location == null ? '' : $val->location->states->name }}</p>
                                <a target="_blank"
                                    href="/college-in-{{ str_replace(' ', '_', str_replace('/[^A-Za-z0-9\-]/', '-', strtolower($val->location == null ? '' : $val->location->cities->name))) }}/{{ $val->seo->isEmpty() ? '' : $val->seo[0]->permalink }}">
                                    <p class="f-12">VIEW ALL COUSRSES AND FEES</p>
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="testimonial">
        <div class="container">
            <div class="row py-5">
                <div class="col text-center">
                    <p class="mb-2 pcolor">People Saying about us</p>
                    <h2 class="pcolor">Testimonial</h2>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach ($testimonial as $t => $test)
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                    data-bs-slide-to="{{ $t }}" class="{{ $t == 0 ? 'active' : '' }}"
                                    aria-current="true" aria-label="Slide {{ $t }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach ($testimonial as $t => $test)
                                <div class="carousel-item {{ $t == 0 ? 'active' : '' }}">
                                    <div class="row">
                                        <div class="col-md-8 offset-md-2 p-2">
                                            <div class="testimonial-data text-center">
                                                <div class="testimonial-info mb-4">
                                                    <i class="fas fa-quote-left "></i>
                                                    <img src="{{ env('MEDIA_URL') }}testimonials/{{ $test->image }}"
                                                        width="150px" height="150px" class="user-avatar" alt="">
                                                    <div class="d-inline-block ms-4 text-start pcolor" style="position: absolute;top: 100px;">
                                                        <h3 class="f-24">{{ $test->user_name }}</h3>
                                                        <p>{{ $test->property_name }}</p>
                                                    </div>
                                                </div>
                                                <p>
                                                    {{ $test->content}}
                                                    {{-- <a href="#!">Read More</a> --}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="control">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </span>

                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="control">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="height-90 confuesed-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 text-white py-5">
                    <h1 class="f-36 mb-3">Still Confused!</h1>

                    <p class="f-20 mb-5">We will help you to make your career bright share your information</p>

                    <div class="form-1" id="still-confused-div">
                        <form class="confused-validation" action="{{ route('multiple-form') }}" id="still-confused"
                            novalidate>
                            @csrf
                            <input type="hidden" value="{{ request()->url() }}" name="url">
                            <input type="hidden" value="still-confused" name="type">
                            <input type="text" name="name" class="form-control site-field" required
                                placeholder="Type you Full Name">
                            <input type="email" name="email" class="form-control site-field" required
                                placeholder="Enter Email Id">
                            <select name="course" class="form-control site-field select-css" required>
                                <option value="" selected disabled>Select Courses</option>
                                @foreach ($course as $c => $cou)
                                    @if ($c > 3)
                                        <option value="{{ $cou->name }}">{{ $cou->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <button class="btn site-btn-1 shadow" type="submit">Submit</button>
                        </form>
                    </div>

                </div>
                <div class="col-md-7">

                </div>
            </div>
        </div>
    </section>
@endsection
@section('modal')
    @include('v2.front.modal.applynow')
@endsection

@section('script')
    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.confused-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        } else {
                            event.preventDefault();
                            confusedForm();
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()

        // this is the id of the form
        function confusedForm() {
            var form = $("#still-confused");
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function(data) {
                    if (data['status'] == 1) {
                        form.addClass('d-none');
                        $("#still-confused-div").append(
                            "<div class=\"alert alert-success\" role=\"alert\"><h4 class=\"alert-heading\">Form Submitted!</h4><p>Thank you for Submitting this Form</p><hr><p class=\"mb-0\">We will Inform you on your mail.</p></div>"
                        );
                    }
                }
            });
        }

        function isOnScreen(elem) {
            // if the element doesn't exist, abort
            if (elem.length == 0) {
                return;
            }
            var $window = $(window)
            var viewport_top = $window.scrollTop()
            var viewport_height = $window.height()
            var viewport_bottom = viewport_top + viewport_height
            var $elem = $(elem)
            var top = $elem.offset().top
            var height = $elem.height()
            var bottom = top + height

            return (top >= viewport_top && top < viewport_bottom) ||
                (bottom > viewport_top && bottom <= viewport_bottom) ||
                (height > viewport_height && top <= viewport_top && bottom >= viewport_bottom)
        }

        $(document).ready(function() {
            var myModal = new bootstrap.Modal(document.getElementById('applyNow'), {
                keyboard: false
            });
            window.addEventListener('scroll', function(e) {
                if (!isOnScreen($("#heroimage"))) {
                    if (sessionStorage.getItem('apply-opened') == null) {
                        myModal.show();
                        sessionStorage.setItem('apply-opened', true);
                    }
                }
            });
        });
    </script>
@endsection
