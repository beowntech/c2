@extends('front.layout.header')
@section('content')
<main id="main" class="bg-light">
    <section class="breadcrumbs">
        <div class="container">
            <h1>Cyber Partner</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cyber Partner</li>
                </ol>
            </nav>
        </div>
    </section>
    <section>
        <div class="container" data-aos="fade-up">
            <div class="section-header text-center py-4">
                <h2 class="site-title">The what and why of Admission Jockey?</h2>

            </div>
            <div class="row gy-4 bg-white pb-2">
                <div class="col-lg-4">
                    <img src="/assets/images/site/edu-loan.jpg" width="100%" alt="">
                </div>
                <div class="col-lg-8">
                    <h2 class="site-title scolor text-start"> What is  Admission Jockey?</h2>
                    <h3>Admission Jockey aims to be the best among the leading higher education search portals in India. Our website <a href="https://www.admissionjockey.com" target="_blank" class="scolor">www.admissionjockey.com</a>  hosts a wide range of educational institutions and makes admission an accessible and convenient process for students across the nation.</h3>

                </div>
            </div>
            <div class="row my-3 bg-white py-2">
                <div class="col-12">
                    <h2 class="my-2 pcolor">Become A <span class="scolor">Cyber Partners</span>-</h2>
                    <div class="row">
                        <div class="col-md-5">
                            <img src="/assets/images/site/cyber-partners.jpg" width="100%" alt="">
                        </div>
                        <div class="col-md-7">
                            <h3 class="pcolor after-line">Student</h3>
                            <h4>We provide a comprehensive range of services to make college-hunt effortless and hassle-free.</h4>
                            <h3 class="pcolor after-line">Colleges and Universities </h3>
                            <h4>We help to convert colleges and universities into students’ dream destinations with higher brand visibility and advocacy. </h4>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row my-3 bg-white py-2">
                <h2 class="my-2 pcolor"> Cyber Partners  <span class="scolor">Benefits</span>  -</h2>
                <div class="col-md-7">

                    <div class="row my-1">
                        <div class="col-md-2">
                            <img src="/assets/images/site/a (2).png" alt="">
                        </div>
                        <div class="col-md-10">
                            <h4>Take the assistance of Admission Jockey through <span class="scolor">FREE career counseling</span> or <span class="scolor">COMPARE feature.</span></h4>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-2">
                            <img src="/assets/images/site/a (3).png" alt="">
                        </div>
                        <div class="col-md-10">
                            <h4><span class="scolor">Choose</span> the college that fits all the criteria.</h4>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-2">
                            <img src="/assets/images/site/a (4).png" alt="">
                        </div>
                        <div class="col-md-10">
                            <h4>Fill up all the necessary details in the<span class="scolor"> pop-up form.</span> </h4>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-2">
                            <img src="assets/images/site/a (5).png" alt="">
                        </div>
                        <div class="col-md-10">
                            <h4>Our <span class="scolor"> executive operators</span>  will reach the students and make their admission hassle-free through our <span class="scolor"> student-friendly services.</span></h4>
                        </div>
                    </div>

                </div>

                <div class="col-lg-5">
                    <h2 class="my-2 pcolor"> Join <span class="scolor">Now</span>  -</h2>
                    <div class="enquiry-form-1 text-center">
                        <form>
                            <input type="text" class="form-control mb-3 website-form joinCyberName" placeholder="Your Name">
                            <input type="text" class="form-control mb-3 website-form joinCyberContact" placeholder="Your Contact Number">
                            <input type="email" class="form-control mb-3 website-form joinCyberMail" placeholder="Your mail">
                            <input type="text" class="form-control mb-3 website-form joinCyberCafe" placeholder="Cafe Name">
                            <input type="text" class="form-control mb-3 website-form joinCyberCity" placeholder="Cafe City">
                            <div class="d-grid gap-2">
                                <div class="alert alert-success d-flex align-items-center d-none" id="successJoinCyber" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                    <div>
                                        Your Request for Cyber Partner has been sent to Admin. <br>Thanks for taking interest in our Cyber Partner Program
                                    </div>
                                </div>
                                <button class="btn site-btn-3" type="button" id="joinCyber"><span id="joinCLoader" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span> Join REQUEST</button>
                            </div>
                        </form>
                        <p class="small mt-4">Praesent felis velit, maximus at dapibus semper, fermentum sagittis diam. <a href="#"> Privacy Policy</a></p>
                    </div>

                </div>
            </div>


        </div>
    </section>

</main>
@endsection
