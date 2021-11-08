@extends('v2.front.layout.hostel.header')
@section('content')
<section style=" background:url(/v2/assets/images/site/ajhostel.jpg);
  background-size:cover;
  box-shadow:inset 0 0 0 2000px rgba(0, 0, 0, 0.5);height:400px">
    <div class="container">
        <div class="row py-5">
        <div class="search-box col-md-8 text-center offset-md-2">   
            <div style=" position: relative;
  top: 50%;
  transform: translateY(-50%);">
                <h2 class="scolor mb-4 fw-6">Get a place nearby your college</h2> 
            <h4 class="text-white mb-5 fw-4">Hostel, Flats for Students & Researchers</h4>    
        <form action="">
            <div class="input-group mb-3 mx-5">
                <div class="input-group-prepend">
                    <div class="btn-group">
                    <button class="btn border dropdown-toggle bg-white" type="button" id="defaultDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false" style="padding: 4.5px 25px;">
                        Dehradun
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="defaultDropdown">
                        <li><a class="dropdown-item" href="#">Menu item</a></li>
                        <li><a class="dropdown-item" href="#">Menu item</a></li>
                        <li><a class="dropdown-item" href="#">Menu item</a></li>
                    </ul>
                    </div>
                </div>
                <div class="form-group has-icon d-inline-block">
                    <span class="fa fa-search form-control-icon"></span>
                    <input type="text" class="form-control rounded-0" placeholder="College nearby" style="min-width:350px">
                </div>
                <div class="input-group-append">
                    <button class="btn site-btn-6 fw-6 rounded-0" type="button">Explore</button>
                </div>
            </div>
        </form>
            </div>       
            
    </div>
        </div>
    </div>
</section></section>
<section>
    <div class="row py-3">
        <div class="col hostel-service text-center">
            <ul class="list-unstyled ver-line-menu py-2">
                <li>
                    <div>
                        <img src="/v2/assets/images/icons/1.png" alt="">
                        <p>Safe & Secure</p>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="/v2/assets/images/icons/2.png" alt="">
                        <p>Safe & Secure</p>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="/v2/assets/images/icons/3.png" alt="">
                        <p>Safe & Secure</p>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="/v2/assets/images/icons/4.png" alt="">
                        <p>Safe & Secure</p>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="d-inline-block me-3 f-28">Featured hostel</h2> <p class="d-inline-block"><a href="" class="text-decoration-none text-dark">View All</a></p>
            </div>
        </div>
        <div class="row">
            @foreach($data as $d => $val)
                <div class="col-md-3 mb-3">
                    <div class="p-2">
                        <img style="height: 245px;object-fit: cover;" src="{{env('MEDIA_URL')}}hostel/{{$val->id}}/images/{{json_decode($val->images)[0]}}-xl.webp" width="100%" class="mb-2" alt="">
                        <p class="fw-6 mb-1">{{$val->name}}</p>
                        <p class="f-12 mb-2"><i class="fas fa-map-marker-alt"></i> {{$val->cities->name}}, {{$val->states->name}}</p>
                        <ul class="d-inline-block list-unstyled ver-line-menu text-secondary small">
                            <li class="me-4">
                                <button class="btn site-btn-1"> Enroll Now</button>
                            </li>
                            <li class="me-4">
                                <a href="{{route('hostel-detail',['city'=>strtolower($val->cities->name),'slug'=>$val->seo[0]->permalink])}}">
                                <button class="btn hover-site-btn-1 scolor">View</button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="py-5 mb-5">
    <div class="container">
        <div class="row bg-gcolor p-5 border-radius-lg">
            <div class="col-md-8 text-white">
                <p class="mb-0 f-20 fw-4">SPONSORED</p>
                <p class="f-26 fw-6">Find Student Loan Options</p>
            </div>
            <div class="col-md-4">
                <a href="#" class="btn btn-lg site-btn-3 py-3 w-100">Get Education Loan</a>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    $("#live-search-hostel").keyup(function(){

    });
</script>
@endsection