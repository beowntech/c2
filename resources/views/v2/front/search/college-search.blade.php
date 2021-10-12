@extends('v2.front.layout.header')
@section('content')
    <section class="shadow">
        <div class="container">
            <div class="row py-2">
                <div class="col-md-6 offset-md-3 position-relative">
                    <input type="search" class="form-control hero-search site-shadow-sm" placeholder="College Name, Courses">
                    <button class="btn btn-search position-absolute top-50 end-20 translate-middle-y"><i class="fas fa-search"></i> Search</button>
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
                    <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Admissionjockey</a></li>
                            <li class="breadcrumb-item"><a href="/search?catg=Medical" class="text-decoration-none">BE/B.tech</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Banglore College</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row mx-0">
                <div class="col-md-3">
                    <div class="filter-bar">
                        <div class="map text-center">
                            <div class="btn site-btn-map"> Map View</div>
                        </div>
                        <p class="small">1200 Colleges</p>
                        <div class="divider-span">
                            <p>Selected Filter <span class="float-end small"><a href="">set default</a></span></p>
                        </div>
                        <div class="filtered-option">
                            <div class="chip chip-md filter-chip">
                                <i class="fas fa-circle"></i> Selected Filter
                                <i class="close fas fa-times"></i>
                            </div>
                            <div class="chip chip-md filter-chip">
                                <i class="fas fa-circle"></i> Selected Filter
                                <i class="close fas fa-times"></i>
                            </div>
                            <div class="chip chip-md filter-chip">
                                <i class="fas fa-circle"></i> Selected Filter
                                <i class="close fas fa-times"></i>
                            </div>
                        </div>
                        <div class="divider-span">
                            <p>Stream</p>
                        </div>
                        <div class="px-4 my-2">
                            <input type="search" name="" class="form-control form-control-sm border-radius-md ">
                            <ul class="list-unstyled filter-checkbox">
                                <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li>
                                <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li>
                                <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li>
                                <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li>
                                <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li>
                            </ul>
                        </div>
                        <div class="divider-span">
                            <p>City</p>
                        </div>
                        <div class="px-4 my-2">
                            <input type="search" name="" class="form-control form-control-sm border-radius-md ">
                            <ul class="list-unstyled filter-checkbox">
                                <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li>
                                <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li>
                                <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li>
                                <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li>
                                <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li>
                            </ul>
                        </div>
                        <div class="divider-span">
                            <p>State</p>
                        </div>
                        <div class="px-4 my-2">
                            <input type="search" name="" class="form-control form-control-sm border-radius-md ">
                            <ul class="list-unstyled filter-checkbox">
                                <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li>
                                <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li>
                                <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li>
                                <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li>
                                <li> <input type="checkbox" name=""  class="form-check-input" > Engeenering - [315]</li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-md-9">
                    <div class="text-center">
                        <img src="/v2/assets/images/site/ads.png" alt="" class="">
                    </div>
                    <div class="py-2 small">
                        <p class="d-inline-block"> 1200 Colleges </p>
                        <ul class="d-inline-block list-unstyled ver-line-menu float-end">
                            <li><strong>Sort By</strong></li>
                            <li>Polpularity <i class="fas fa-sort-amount-up-alt"></i></li>
                            <li>Rating <i class="fas fa-sort-amount-up-alt"></i></li>
                            <li>Highest Fees <i class="fas fa-sort-amount-down-alt"></i></li>
                            <li>Lowest Fees <i class="fas fa-sort-amount-down"></i></li>
                        </ul>
                    </div>
                    <div class="row">
                        @foreach($data as $k => $val)
                            @if($k  == 4)
                        <div class="container px-5">
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
                                    <img src="{{env('MEDIA_URL')}}property/{{$val->id}}/logo/{{$val->logo}}-md.webp" class="prop-logo" alt="">
                                    <p class="d-inline-block position-absolute top-0 end-0 small">
                                        <a href="">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            24 Reviews</a>
                                    </p>
                                </div>
                                <div class="prop-info">
                                    <p class="f-20 pcolor">{{$val->name}}</p>
                                    <p><i class="fas fa-map-marker-alt"></i> {{$val->cities[0]->name}}, {{$val->states[0]->name}}</p>
                                    <p><i class="fas fa-rupee-sign"></i> B.tech - 7L to 8L</p>
                                    <ul class="d-inline-block list-unstyled ver-line-menu text-secondary small py-3">
                                        <li class="me-3">Type - Private</li>
                                        <li class="me-3">Apporved by: UGC AICTE</li>
                                        <li class="me-3">NIRF Ranking - 12</li>
                                    </ul>
                                    <ul class="d-inline-block list-unstyled ver-line-menu text-secondary small">
                                        <li class="me-3"><button class="btn site-btn-1"> Apply Now </button></li>
                                        <li class="me-3"><button class="btn hover-site-btn-1 scolor"> Compare </button></li>
                                        <li class="me-3"><a href="/college-in-{{str_replace(' ','_',str_replace('/[^A-Za-z0-9\-]/', '-',strtolower($val->cities->isEmpty() ? "" : $val->cities[0]->name)))}}/{{$val->seo == null ? "" : $val->seo->permalink}}" class="btn hover-site-btn-1 scolor mt-1"> Visit Details </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                       @endforeach
                    </div>
                    <div class="text-center mb-3">
                        <img src="/v2/assets/images/site/ads.png" alt="" class="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
