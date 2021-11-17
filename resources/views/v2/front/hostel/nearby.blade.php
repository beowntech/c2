@extends('v2.front.layout.header')
@section('content')
    {{-- <section>
        <div class="container">
            <div class="row py-3">
                <div class="col">
                    <div class="btn-group me-2">
                        <button class="btn border dropdown-toggle" type="button" id="defaultDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                            Dehradun
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="defaultDropdown">
                            <li><a class="dropdown-item" href="#">Menu item</a></li>
                            <li><a class="dropdown-item" href="#">Menu item</a></li>
                            <li><a class="dropdown-item" href="#">Menu item</a></li>
                        </ul>
                    </div>
                    <div class="form-group has-icon d-inline-block me-3">
                        <span class="fa fa-search form-control-icon"></span>
                        <input type="text" class="form-control" placeholder="College nearby" style="width:300px">
                    </div>
                    <button class="btn site-btn-6 fw-6 ">Explore</button>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="bglg">
        <div class="container">
            <div class="row">
                <div class="col-md-9 border-end border-secondary py-4">
                    <h2>Hostel Near By {{$prop->name}}</h2>
                    <p class="small text-muted">{{$data->total()}} Hostel</p>
                    @foreach($data as $d => $val)
                    <div class="row pe-3  mb-5">
                        <div class="col-7">
                            <div id="carouselExampleControls" class="carousel slide hostel-carousel" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach(json_decode($val->images) as $i => $im)
                                    <div class="carousel-item {{$i == 0 ? 'active':''}}">
                                        <img style="object-fit: cover;height: 330px!important;" src="{{asset('hostel/'.$val->id.'/images/'.$im.'-xl.webp')}}" class="d-block w-100" alt="...">
                                    </div>
                                    @endforeach
                                </div>
                                <div class="mt-3">
                                    <button class="carousel-control-prev-1" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next-1" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="col-5">
                            <p class="fw-6 mb-1">{{$val->name}}</p>
                            <p class="fw-6 mb-3">{{$val->cities->name}} | {{$val->gender}}</p>
                            <ul class="list-unstyled ver-line-menu mb-3">
                                <li class="f-12 me-0"><p class="mb-0"><strong>Institute Nearby</strong><span class="float-end"><strong> Distance</strong></span></p></li>
                                @foreach(json_decode($val->nearby_properties) as $prop)
                                <li class="f-12 me-0"><p class="mb-0">{{$prop->property}} <span class="float-end">{{$prop->distance}} min</span></p></li>
                                @endforeach
{{--                                <li class="f-12 me-0"><p class="mb-0">NIMM Banglore <span class="float-end">14 mins</span></p></li>--}}
                            </ul>
                            <p class="f-13">Intrested in this Hostel?</p>
                            <input type="text" name="" class="form-control rounded-pill mb-3" placeholder="Provide your Mobile No.">
                            <button class="btn site-btn-1 w-100 mb-3"> Request a callback</button>

                            <button class="btn hover-site-btn-2 w-100 "> Enroll Now</button>
                        </div>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col">
                            {{$data}}
{{--                            <nav aria-label="Page navigation example">--}}
{{--                                <ul class="pagination justify-content-end">--}}
{{--                                    <li class="page-item disabled">--}}
{{--                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="fas fa-chevron-left"></i></a>--}}
{{--                                    </li>--}}
{{--                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                    <li class="page-item">--}}
{{--                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </nav>--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-3 py-4">
                    <div class="hostel-service text-center">
                        <ul class="list-unstyled ver-line-menu py-2">
                            <li class="mb-3">
                                <div>
                                    <img src="/v2/assets/images/icons/1.png" alt="">
                                    <p>Safe & Secure</p>
                                </div>
                            </li>
                            <li class="mb-3">
                                <div>
                                    <img src="/v2/assets/images/icons/2.png" alt="">
                                    <p>Safe & Secure</p>
                                </div>
                            </li>
                            <li class="mb-3">
                                <div>
                                    <img src="/v2/assets/images/icons/3.png" alt="">
                                    <p>Safe & Secure</p>
                                </div>
                            </li>
                            <li class="mb-3">
                                <div>
                                    <img src="/v2/assets/images/icons/4.png" alt="">
                                    <p>Safe & Secure</p>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
