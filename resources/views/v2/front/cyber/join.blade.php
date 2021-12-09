@extends('v2.front.cyber.layout.header')
@section('content')
<div id="form-div">
<section>
    <div class="container">
        <div class="row py-3">
            <div class="col-md-5 offset-md-1 text-center p-3 ">
                <img src="/v2/assets/images/site/cyberpartner.png" alt="">
                <h2 class="mb-2">
                    Empower your Business with Admission Jockey
                </h2>
                <h3 class="pcolor f-24">Become A Cyber Partner</h3>
            </div>
            <div class="col-md-5">
                <p class="fw-6 f-18">Share following Information</p>
                <form>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Your Name</label>
                        <input type="text" class="form-control joinCyberName" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Cafe Name</label>
                        <input type="text" class="form-control joinCyberCafe" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control joinCyberMail" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputPassword1" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control joinCyberContact" id="exampleInputPassword1">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Cafe City</label>
                        <input type="text" class="form-control joinCyberCity" id="exampleInputPassword1">
                    </div>
                    <div class="mb-2 form-check f-13">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">I have read and accept the <a href="#" class="fst-italic">privacy policy</a></label>
                    </div>
                    <div class="alert alert-success d-flex align-items-center my-3 d-none" id="successJoinCyber" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            Your Request for Cyber Partner has been sent to Admin. <br>Thanks for taking interest in our Cyber Partner Program
                        </div>
                    </div>
                    <button type="button" class="btn site-btn-1" id="joinCyber"><span id="joinCLoader" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span> Submit</button>
                    </form>
            </div>
        </div>
    </div>
</section>
<section style="background:url('/v2/assets/images/site/cyber-part2-bg.jpg');min-height:450px;background-position: right;background-size: cover;background-repeat: no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 py-5 pcolor">
                <h1 class="f-32 fw-6">Why choose admission jockey</h1>
                <p class="f-18">Admission Jockey aims to be the best among the leading higher education search portal in India. Our website www.admissionjockey.com hosts a wide range of educational institutions and makes admission an accessible and convenient process for students across the nation.</p>

                <h2 class="mt-5 f-26 mb-4">Cyber Partners Benefits</h2>
                <ul class="bold-bullet-list">
                    <li><img src="/v2/assets/images/site/dot.png" alt=""> Take the assistance of admission jockey through FREE career Counseling or COMPARE Feature.</li>
                    <li><img src="/v2/assets/images/site/dot.png" alt=""> Choose the college that fits all the criteria.</li>
                    <li><img src="/v2/assets/images/site/dot.png" alt=""> Fill up all the necessary details in pop-up form.</li>
                    <li><img src="/v2/assets/images/site/dot.png" alt=""> Our executive operators will reach the students and make their admission hassle-free through our student-freindly services.</li>
                </ul>
            </div>
        </div>
    </div>
</section>
</div>
<div id="join-successfull" class="d-none">
    <section class="bglg">
        <div class="container">
            <div class="row py-5">
                <div class="col-md-6 offset-md-3 p-3 text-center bg-white border-radius-sm">
                    <h2 class="mb-3 f-22 fw-6" id="join-successfull-name">Hi Rohan</h2>
                    <h3 class="pcolor f-24">Welcome to Admission Jockey</h3>
                    <img src="/v2/assets/images/site/welcome-bg.jpg" width="250px" class="mb-4" alt="">
                    <p>Your Request has been sent to admin.</p>
                    <p>Thanks for taking interest</p>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
