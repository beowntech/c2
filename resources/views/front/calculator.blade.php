@extends('front.layout.header')
@section('content')

<main id="main" class="bg-light">
<section class="breadcrumbs">
    <div class="container">
    <h1>Education Loan</h1>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Education Loan</li>
        </ol>
        </nav>
    </div>
</section>
<section>
        <div class="container" data-aos="fade-up">
            <div class="section-header text-center py-4">
                <h2 class="site-title scolor">EDUCATION LOAN </h2>
                <p class="title-desc">  EVERYTHING TO KNOW ABOUT</p>
            </div>
            <div class="row gy-4 bg-white pb-2">
                <div class="col-lg-4">
                    <img src="/assets/images/site/edu-loan.jpg" width="100%" alt="">
                </div>
                <div class="col-lg-8">
                    <p>Education Loan is a facility that extends monetary assistance to students aspiring to study either in India or Abroad but are held back due to financial constraints. Various banks (Government, Private or Co-operative) and NBFCs offer general and specialised education loans to meet all your needs.  </p> <p>While Education in India and Abroad is getting expensive, it gets hard for aspirants to pursue their higher education in reputed institutes. Hence, here our banks come into the frame and extend variants of education loan along with Government driven subsidy schemes to promote academic excellence in each sector of the society.</p>
                    <a href="" class="btn site-transparent-btn-1 btn-sm text-white">Apply Now</a>
                </div>

            </div>
        </div>
    </section>

<section id="filter-col" class="my-4 py-4 bg-light h-100">
    <div class="container">
    <div class="section-header text-center py-4">
                <h2 class="site-title ">All Banks </h2>
            </div>
        <div class="row mt-5" id="filter-cat-btn">
            <div class="col">
                <ul class="nav justify-content-center">
                    <li class="nav-item border-right">
                        <a class="nav-link active left-round" href="#!" id="allbank">All Banks</a>
                    </li>
                    <li class="nav-item border-right">
                        <a class="nav-link " href="#!" id="govtbank">Govt. Banks</a>
                    </li>
                    <li class="nav-item border-right" >
                        <a class="nav-link " href="#!" id="privatebank">Private Banks</a>
                    </li>
                    <li class="nav-item border-right">
                        <a class="nav-link " href="#!" id="coopbank">Cooprative Banks</a>
                    </li>
{{--                    <li class="nav-item border-right" id="govtbank">--}}
{{--                        <a class="nav-link " href="#">Govt. Banks</a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link right-round" href="#!" id="nbfcbank">NBFCs</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="allBankC" class="row mt-4 five-bx">
       @foreach($banks as $b => $val)
            <div class="col-md-4 data-type-3 mb-2">
                <a href="#">
                    <div class="p-3 icon-bx bg-white">
                        <img src="{{env('MEDIA_URL')}}banks/{{$val->image}}" width="100%" alt="" style="width: 92%;
    height: 86px !important;">
                        <p><strong>Percent:</strong> 10%</p>
                        <p><strong>Max Time:</strong> {{$val->repayment_period}}</p>
                        <p><strong>Loan Type:</strong> Student</p>
                        <p><strong>Scheme:</strong> {{$val->benefits}}</p>
                        <br>
                        <a href="#!" class="btn site-transparent-btn-1 btn-sm text-white bankApply" data-id="{{$val->id}}" data-name="{{$val->name}}" data-image="{{$val->image}}" data-bs-toggle="modal" data-bs-target="#educationLoanModal">Apply Now</a>
{{--                        <a href="" class="btn site-transparent-btn-1 btn-sm text-white">Detail</a>--}}
                        <a href="#!" data-id="{{$val->id}}" data-name="{{$val->name}}" data-image="{{$val->image}}" class="btn site-transparent-btn-1 btn-sm text-white openCompareBank">Compare</a>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div id="govtBankC" class="row mt-4 five-bx d-none">
            @foreach($banks as $b => $val)
                @if($val->bank_type == 1)
                <div class="col-md-4 data-type-3 mb-2">
                    <a href="#">
                        <div class="p-3 icon-bx bg-white">
                            <img src="{{env('MEDIA_URL')}}banks/{{$val->image}}" width="100%" alt="" style="width: 92%;
    height: 86px !important;">
                            <p><strong>Percent:</strong> 10%</p>
                            <p><strong>Max Time:</strong> {{$val->repayment_period}}</p>
                            <p><strong>Loan Type:</strong> Student</p>
                            <p><strong>Scheme:</strong> {{$val->benefits}}</p>
                            <br>
                            <a href="#!" class="btn site-transparent-btn-1 btn-sm text-white bankApply" data-bs-toggle="modal" data-id="{{$val->id}}" data-name="{{$val->name}}" data-image="{{$val->image}}" data-bs-target="#educationLoanModal">Apply Now</a>
{{--                            <a href="" class="btn site-transparent-btn-1 btn-sm text-white">Detail</a>--}}
                            <a href="#" data-id="{{$val->id}}" data-name="{{$val->name}}" data-image="{{$val->image}}" class="btn site-transparent-btn-1 btn-sm text-white openCompareBank">Compare</a>
                        </div>
                    </a>
                </div>
                @endif
            @endforeach
        </div>
        <div id="privateBankC" class="row mt-4 five-bx d-none">
            @foreach($banks as $b => $val)
                @if($val->bank_type == 2)
                <div class="col-md-4 data-type-3 mb-2">
                    <a href="#">
                        <div class="p-3 icon-bx bg-white">
                            <img src="{{env('MEDIA_URL')}}banks/{{$val->image}}" width="100%" alt="" style="width: 92%;
    height: 86px !important;">
                            <p><strong>Percent:</strong> 10%</p>
                            <p><strong>Max Time:</strong> {{$val->repayment_period}}</p>
                            <p><strong>Loan Type:</strong> Student</p>
                            <p><strong>Scheme:</strong> {{$val->benefits}}</p>
                            <br>
                            <a href="" class="btn site-transparent-btn-1 btn-sm text-white">Apply Now</a>
                            <a href="" class="btn site-transparent-btn-1 btn-sm text-white">Detail</a>
                            <a href="#" class="btn site-transparent-btn-1 btn-sm text-white">Compare</a>
                        </div>
                    </a>
                </div>
                @endif
            @endforeach
        </div>
        <div id="coopBankC" class="row mt-4 five-bx d-none">
            @foreach($banks as $b => $val)
                @if($val->bank_type == 3)
                <div class="col-md-4 data-type-3 mb-2">
                    <a href="#">
                        <div class="p-3 icon-bx bg-white">
                            <img src="{{env('MEDIA_URL')}}banks/{{$val->image}}" width="100%" alt="" style="width: 92%;
    height: 86px !important;">
                            <p><strong>Percent:</strong> 10%</p>
                            <p><strong>Max Time:</strong> {{$val->repayment_period}}</p>
                            <p><strong>Loan Type:</strong> Student</p>
                            <p><strong>Scheme:</strong> {{$val->benefits}}</p>
                            <br>
                            <a href="" class="btn site-transparent-btn-1 btn-sm text-white">Apply Now</a>
                            <a href="" class="btn site-transparent-btn-1 btn-sm text-white">Detail</a>
                            <a href="#" class="btn site-transparent-btn-1 btn-sm text-white">Compare</a>
                        </div>
                    </a>
                </div>
                @endif
            @endforeach
        </div>
        <div id="nsfbcBankC" class="row mt-4 five-bx d-none">
            @foreach($banks as $b => $val)
                @if($val->bank_type == 4)
                <div class="col-md-4 data-type-3 mb-2">
                    <a href="#">
                        <div class="p-3 icon-bx bg-white">
                            <img src="{{env('MEDIA_URL')}}banks/{{$val->image}}" width="100%" alt="" style="width: 92%;
    height: 86px !important;">
                            <p><strong>Percent:</strong> 10%</p>
                            <p><strong>Max Time:</strong> {{$val->repayment_period}}</p>
                            <p><strong>Loan Type:</strong> Student</p>
                            <p><strong>Scheme:</strong> {{$val->benefits}}</p>
                            <br>
                            <a href="" class="btn site-transparent-btn-1 btn-sm text-white">Apply Now</a>
                            <a href="" class="btn site-transparent-btn-1 btn-sm text-white">Detail</a>
                            <a href="#" class="btn site-transparent-btn-1 btn-sm text-white">Compare</a>
                        </div>
                    </a>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

    <section class="bg-light" style="padding: 20px;">
        <div class="section-header text-center py-2">
                <h2 class="site-title">EMI CALCULATOR </h2>
            </div>
            <div class="container bg-white border " style="border-radius: 8px;
    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);">

                        <div id="widget">
                        <div class="row">
                            <div class=" col-md-5 px-3 mb-4">
                                	<div class="row">
                                		<div class="col-md-8 offset-md-2 mb-2">
                                			<canvas id="myChart" width="70%"></canvas>
                                		</div>
                                		<div class="col-md-12 mb-2">
                                			<div class="row text-center">
                                				<div class="col-6 border ">Principal Amount</div>
                                				<div class="col-6 border "><i class="fa fa-rupee"></i> <span class="font-weight-bold TotalValue"></span></div>
                                				<div class="col-6 border">Total Interest Payable</div>
                                				<div class="col-6 border  font-weight-bold"><i class="fa fa-rupee"></i> <span class="interestValue"></span></div>
                                				<div class="col-6 border">Monthly EMI</div>
                                				<div class="col-6 border  font-weight-bold"><i class="fa fa-rupee"></i> <span class="emiValue"></span></div>
                                			</div>
                                		</div>
                                	</div>
                            </div>
                            <div class="col-md-7 px-3 mb-4">
                                <div class="form-group">
                                    <div class="range_indicator">
                                        <div for="loan-amount">Loan Amount <span>In Lakhs</span> <div class="indi_rgt float-end"><i class="fa fa-rupee"></i> <span id="selected-amount"></span> Lakhs </div> </div>
                                    </div>
                                    <div id="loan-amount"></div>
                                    <span class="scalerange">
                        <span>0</span>
                        <span>10L</span>
                        <span>20L</span>
                        <span>30L</span>
                        <span>40L</span>
                        <span>50L</span>
                        <span>60L</span>
                        <span>70L</span>
                        <span>80L</span>
                        <span>90L</span>
                        <!--<span>1CR</span>-->
                      </span>
                                </div>

                                <div class="form-group">
                                    <div class="range_indicator">
                                        <div for="loan-duration">Rate of Interest <div class="indi_rgt float-end"><span id="selected-interest"></span> % </div></div>
                                    </div>
                                    <div id="interest-rate"></div>
                                    <span class="scalerange">
                        <span>5</span>
                        <span>7.5</span>
                        <span>10</span>
                        <span>12.5</span>
                        <span>15</span>
                        <span>17.5</span>
                        <span>20</span>
                        <span>22.5</span>
                      </span>
                                </div>


                                <div class="form-group">
                                    <div class="range_indicator">
                                        <div for="loan-duration">Loan Tenure  <div class="indi_rgt float-end"><span id="selected-duration"></span> Years </div></div>
                                    </div>
                                    <div id="loan-duration"></div>
                                    <span class="scalerange">
                        <span>0</span>
                        <span>5</span>
                        <span>10</span>
                        <span>15</span>
                        <span>20</span>
                        <span>25</span>
                        <span>30</span>
                        <span>35</span>
                      </span>
                                </div>
                            </div>

                        </div>
                </div><!-- row -->
            </div><!-- container -->
    </section>
</main>
@endsection
@section('script')
    <script>
        $("#govtbank").click(function () {
            $(this).addClass('active');
            $("#allbank").removeClass('active');
            $("#privatebank").removeClass('active');
            $("#coopbank").removeClass('active');
            $("#nbfcbank").removeClass('active');
            $("#govtBankC").removeClass('d-none');
            $("#allBankC").addClass('d-none');
            $("#privateBankC").addClass('d-none');
            $("#coopBankC").addClass('d-none');
            $("#nsfbcBankC").addClass('d-none');
        });
        $("#allbank").click(function () {
            $(this).addClass('active');
            $("#govtbank").removeClass('active');
            $("#privatebank").removeClass('active');
            $("#coopbank").removeClass('active');
            $("#nbfcbank").removeClass('active');
            $("#govtBankC").addClass('d-none');
            $("#allBankC").removeClass('d-none');
            $("#privateBankC").addClass('d-none');
            $("#coopBankC").addClass('d-none');
            $("#nsfbcBankC").addClass('d-none');
        });
        $("#privatebank").click(function () {
            $(this).addClass('active');
            $("#allbank").removeClass('active');
            $("#govtbank").removeClass('active');
            $("#coopbank").removeClass('active');
            $("#nbfcbank").removeClass('active');
            $("#govtBankC").addClass('d-none');
            $("#allBankC").addClass('d-none');
            $("#privateBankC").removeClass('d-none');
            $("#coopBankC").addClass('d-none');
            $("#nsfbcBankC").addClass('d-none');
        });
        $("#coopbank").click(function () {
            $(this).addClass('active');
            $("#allbank").removeClass('active');
            $("#privatebank").removeClass('active');
            $("#govtbank").removeClass('active');
            $("#nbfcbank").removeClass('active');
            $("#govtBankC").addClass('d-none');
            $("#allBankC").addClass('d-none');
            $("#privateBankC").addClass('d-none');
            $("#coopBankC").removeClass('d-none');
            $("#nsfbcBankC").addClass('d-none');
        });
        $("#nbfcbank").click(function () {
            $(this).addClass('active');
            $("#allbank").removeClass('active');
            $("#privatebank").removeClass('active');
            $("#coopbank").removeClass('active');
            $("#govtbank").removeClass('active');
            $("#govtBankC").addClass('d-none');
            $("#allBankC").addClass('d-none');
            $("#privateBankC").addClass('d-none');
            $("#coopBankC").addClass('d-none');
            $("#nsfbcBankC").removeClass('d-none');
        });

    </script>
    @endsection
