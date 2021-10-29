@extends('v2.front.layout.header')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>Button</h3>
                    <ul class="list-unstyled ver-line-menu">
                        <li><a href="#" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#exampleModal">Verify OTP</a></li>
                        <li><a href="#" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#successModal">Success popup</a></li>
                        <li><a href="#" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#queryModal">Query popup</a></li>
                        <li><a href="#" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#compareModal">Compare popup</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">

                <div class="col-md-10 offset-md-1 p-3">


                </div>
            </div>
        </div>
    </section>
    <!-- success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close m-2" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="modal-body p-4 pt-0 text-center">
                    <img src="{{asset('v2/assets/images/icon/expert-guidance.png')}}" width="100px" alt="">
                    <h2 class="f-22 mb-4">Succesfuly Aplied!</h2>
                    <p class="mb-4 px-4">our expert will be in touch in coming days to help make sure to answer your all questions/queries.</p>
                    <a href="#" >Go to home</a>
                </div>

            </div>
        </div>
    </div>



    <!-- verify Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body px-4 pb-5 pt-4">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h2 class="f-22 pcolor mb-4">Verify Yourself</h2>
                    <p>We have sent you an OTP on</p>
                    <p>+91 7854215478</p>
                    <p>OTP</p>
                    <input type="text" name="" class="form-control border-radius-md">
                    <p>Still not received OTP? <a href="">Resend OTP</a></p>
                    <div class="d-grid gap-2">
                        <button class="btn btn-search shadow">Verify</button>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <!-- success Modal -->
    <div class="modal fade" id="compareModal" tabindex="-1" aria-labelledby="queryModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl">
            <div class="modal-content">

                <div class="modal-body p-0 compare-modal">
                    <div class="p-3">
                        <h2 class="f-22 mb-4">Choose Collge</h2>
                        <!-- Actual search box -->
                        <div class="form-group has-icon">
                            <span class="fa fa-search form-control-icon"></span>
                            <input type="text" class="form-control" placeholder="Search College">
                        </div></div>
                    <div class="bg-grey">
                        <div class="row py-3 px-5">
                            <?php
                            $n=0;
                            while($n<6){
                            ?>
                            <div class="col-md-6 custom-radio">
                                <div class="row m-1 py-2 bg-white">
                                    <div class="col-2 text-center px-1">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    </div>
                                    <div class="col-2 px-1" for="flexRadioDefault1">
                                        <div class="logo position-relative">
                                            <div class="d-inline-block prop-logo">
                                                <img src="assets/images/admission-jockey-logo.png" class="p-2" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-7" for="flexRadioDefault1">
                                        <div class="prop-info">
                                            <p class="f-14 pcolor mb-1">Sai Group of Institution in Dehradun</p>
                                            <p class="f-12 mb-1"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> Dehradun, Uttarakhand</p>
                                            <p class="f-14 pcolor mb-1"><i class="fas fa-rupee-sign" aria-hidden="true"></i> B.tech - 7L to 8L</p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            $n++;
                            }
                            ?>

                        </div>
                        <div class="row p-3 pb-4">
                            <div class="col">
                                <ul class="list-unstyled ver-line-menu float-end">
                                    <li class="me-2"><button class="btn site-btn-4"> close </button></li>
                                    <li><button class="btn site-btn-1 btn-sm float-end"> save </button></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>

    <!-- success Modal -->
    <div class="modal fade" id="queryModal" tabindex="-1" aria-labelledby="queryModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content border-scolor py-4">
                <div class="modal-body ">
                    <div class="row">
                        <div class="col-md-6 px-4">
                            <p class="mt-5">How Admission Jockey helps you in Admission.</p>
                            <div class="row modal-info">
                                <div class="col-md-4 p-0">
                                    <div class="p-2 text-center">
                                        <div class="icon">
                                            <img src="assets/images/icons/bestGuidance_icon.png" width="100%" alt="">
                                        </div>
                                        <p class="f-12">Best Guidence</p>
                                    </div>
                                </div>
                                <div class="col-md-4 p-0">
                                    <div class="p-2 text-center">
                                        <div class="icon">
                                            <img src="assets/images/icons/feeinfo_icon.png" width="100%" alt="">
                                        </div>
                                        <p class="f-12">Fees Information</p>
                                    </div>
                                </div>
                                <div class="col-md-4 p-0">
                                    <div class="p-2 text-center">
                                        <div class="icon">
                                            <img src="assets/images/icons/scholarship_icon.png" width="100%" alt="">
                                        </div>
                                        <p class="f-12">Scholorship</p>
                                    </div>
                                </div>
                                <div class="col-md-4 p-0">
                                    <div class="p-2 text-center">
                                        <div class="icon">
                                            <img src="assets/images/icons/industry_icon.png" width="100%" alt="">
                                        </div>
                                        <p class="f-12">Industry Expert</p>
                                    </div>
                                </div>
                                <div class="col-md-4 p-0">
                                    <div class="p-2 text-center">
                                        <div class="icon">
                                            <img src="assets/images/icons/24-7counselling.png" width="100%" alt="">
                                        </div>
                                        <p class="f-12">24/7 Councelling</p>
                                    </div>
                                </div>
                                <div class="col-md-4 p-0">
                                    <div class="p-2 text-center">
                                        <div class="icon">
                                            <img src="assets/images/icons/brochure_icon.png" width="100%" alt="">
                                        </div>
                                        <p class="f-12">Brochure Details</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="material-form">
                                <h2 class="scolor fw-6 mb-3 f-28">Join Now To Apply</h2>
                                <div class="form-group has-icon">
                                    <span class="far fa-user form-control-icon"></span>
                                    <input type="text" class="form-control form-control-lg" id="usr" required>
                                    <label for="usr">Full Name</label>
                                </div>
                                <div class="form-group has-icon">
                                    <span class="far fa-envelope form-control-icon"></span>
                                    <input type="text" class="form-control form-control-lg" id="usr" required>
                                    <label for="usr">Email Id</label>
                                </div>
                                <div class="form-group has-icon">
                                    <span class="fas fa-phone-alt form-control-icon"></span>
                                    <input type="text" class="form-control form-control-lg" id="usr" required>
                                    <label for="usr">Mobile Number</label>
                                </div>
                                <div class="form-group has-icon">
                                    <span class="fas fa-map-marker-alt form-control-icon"></span>
                                    <input type="text" class="form-control form-control-lg" id="usr" required>
                                    <label for="usr">City you Live in </label>
                                </div>
                                <div class="form-group has-icon">
                                    <span class="fas fa-graduation-cap form-control-icon"></span>
                                    <input type="text" class="form-control form-control-lg" id="usr" required>
                                    <label for="usr">Choose Course</label>
                                </div>
                                <p class="mb-2 txt-color f-12">By submitting this form, you accept and agree to <a href="#">term of user</a>.</p>
                                <ul class="d-inline-block list-unstyled ver-line-menu float-end">
                                    <li class="me-2"><button class="btn hover-site-btn-1 scolor"> close </button></li>
                                    <li><button class="btn site-btn-1"> Submit </button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
