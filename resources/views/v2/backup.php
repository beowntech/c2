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
                        <li>
                            <button class="btn site-btn-2 me-3">Courses</button>
                        </li>
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
                                <div class="box-card-sm">
                                    <img src="{{ env('MEDIA_URL') }}front/images/future/{{ $cac->image }}" alt="">
                                    <a href="{{ route('search-college') }}?catg={{ strtolower($cac->name) }}">
                                        <p class="f-16">{{ $cac->name }}</p>
                                    </a>
                                    <p class="mt-1 small">{{ $cac->property }} Colleges</p>
                                </div>
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
                                <div class="box-card-sm">
                                    <img src="{{ env('MEDIA_URL') }}front/images/future/{{ $cac->image }}" alt="">
                                    <a href="{{ route('search-college') }}?catg={{ strtolower($cac->name) }}">
                                        <p class="f-16">{{ $cac->name }}</p>
                                    </a>
                                    <p class="mt-1 small">{{ $cac->property }} Colleges</p>
                                </div>
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
                        <a href="{{ route('search-college') }}?state=india">
                            <p class="f-16">India</p>
                        </a>
                    </div>
                </div>
                @foreach ($state as $s => $st)
                    @if ($s < 11)
                        <div class="col-md-2 text-center">
                            <div class="box-card-sm">
                                <img src="/city/{{ $st->image }}" alt="">
                                <a href="{{ route('search-college') }}?state={{ $st->name }}">
                                    <p class="f-16">{{ $st->name }}</p>
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="col-md-2 text-center locationMore" style="display: none">
                            <div class="box-card-sm">
                                <img src="/city/{{ $st->image }}" alt="">
                                <a href="{{ route('search-college') }}?state={{ $st->name }}">
                                    <p class="f-16">{{ $st->name }}</p>
                                </a>
                            </div>
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
