@extends('v2.front.layout.hostel.header')
@section('content')
<section>
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
   
</section>
<section class="bglg">
    <div class="container">
        <div class="row">
            <div class="col-md-8 border-secondary py-4">
               
                <div class="row pe-3  mb-5">
                    <div class="col-12">
                        <p class="fw-6 mb-1">{{$hostel->name}}</p>   
                        <p class="fw-6 mb-3">{{$hostel->cities->name}} | {{$hostel->gender}}</p>
                        <div id="carouselExampleControls" class="carousel slide hostel-carousel" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach(json_decode($hostel->images) as $i => $im)
                                <div class="carousel-item {{$i == 0 ? 'active':''}}">
                                    <img style="max-height:450px" class="d-block w-100" alt="..." src="{{asset('hostel/'.$hostel->id.'/images/'.$im.'-xl.webp')}}">
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
                        
                        <p class="mt-5 fw-6">Institute Nearby</p>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Christ University Banegretta </p>
                                <p>4 mins</p>
                            </div>
                            <div class="col-md-6">
                                <p>NIMM Banglore </p>
                                <p>4 mins</p>
                            </div>
                        </div>
                        <p class="mt-3 fw-6">Facilities Nearby</p>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Hospital </p>
                                <p>4 mins</p>
                            </div>
                            <div class="col-md-6">
                                <p>Super market </p>
                                <p>4 mins</p>
                            </div>
                        </div>
                     
                        
                        <p class="f-20 mt-3 fw-6">Amenities</p>
                        <div class="row">
                            <div class="col-md-3">
                                <p>CCTV Camera </p>
                            </div>
                            <div class="col-md-3">
                                <p>Attached Bathroom </p>
                            </div>
                            <div class="col-md-3">
                                <p>Laundry Service </p>
                            </div>
                        </div>
                        <div class="mt-3 bg-white px-3 py-3">
                            <p class="f-20 fw-6">Location</p>
                            <iframe width="100%" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=admission%20jockey&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                        

                    </div>
                </div>

                
            </div>
            <div class="col-md-4 py-4">
                <div class="bg-white border-radius-md py-3 site-shadow-md">
                    <h2 class="text-uppercase mt-3 left-border-head f-26">Enrollment now</h2>
                    <form action="" class="px-3">
                        <input type="text" class="form-control site-field" placeholder="Name">
                        <input type="email" class="form-control site-field" placeholder="Email Id">
                        <input type="text" class="form-control site-field" placeholder="Mobile Number">
                        <input type="email" class="form-control site-field" placeholder="College">
                        
                        <button class="btn site-btn-1 w-100 fw-6 shadow">Enroll Now</button>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
</section>
@endsection