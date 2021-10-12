@extends('v2.front.layout.header')
@section('content')
    <main class="bglg">
        <section class="shadow-sm">
            <div class="container">
                <div class="row py-2">
                    <div class="col-md-6 offset-md-3 position-relative">
                        <input type="search" class="form-control hero-search site-shadow-sm"
                               placeholder="College Name, Courses">
                        <button class="btn btn-search position-absolute top-50 end-20 translate-middle-y"><i
                                class="fas fa-search"></i> Search
                        </button>
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
        <section>
            <div class="container pb-4 college-detail">
                <div class="row">
                    <div class="col-md-12 position-relative px-0">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                                        aria-label="Slide 4"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active"
                                     style="background: url('/v2/assets/images/site/banner1.jpg');min-height: 55vh;background-position: center;background-size: cover;">
                                </div>
                                <div class="carousel-item"
                                     style="background: url('/v2/assets/images/site/banner1.jpg');min-height: 55vh;background-position: center;background-size: cover;">
                                </div>
                                <div class="carousel-item"
                                     style="background: url('/v2/assets/images/site/banner1.jpg');min-height: 55vh;background-position: center;background-size: cover;">
                                </div>
                                <div class="carousel-item"
                                     style="background: url('/v2/assets/images/site/banner1.jpg');min-height: 55vh;background-position: center;background-size: cover;">
                                </div>
                                <div class="carousel-item"
                                     style="background: url('/v2/assets/images/site/banner1.jpg');min-height: 55vh;background-position: center;background-size: cover;">
                                </div>
                            </div>
                        </div>
                        <div class="position-absolute bottom-0 start-50 translate-middle-x w-100 detail-bottom-desc">
                            <img src="/v2/assets/images/site/c-logo.png" class="prop-logo p-2 " alt="">
                            <ul class="list-unstyled ver-line-menu d-inline-block py-2 text-white float-end">
                                <li class="me-3"><i class="far fa-images"></i> 34 Picture</li>
                                <li class="me-3"><i class="fas fa-photo-video"></i> 4 Videos</li>
                                <li class="me-3"><i class="fas fa-star gcolor"></i> <i class="fas fa-star gcolor"></i>
                                    <i class="fas fa-star gcolor"></i> <i class="fas fa-star gcolor"></i> <i
                                        class="fas fa-star-half-alt gcolor"></i> 24 Reviews
                                </li>
                                <li class="me-3">
                                    <button class="btn site-btn-2 text-secondary py-0">Add Review</button>
                                </li>
                                <li class="me-3">
                                    <button class="btn site-btn-2 py-0">Compare</button>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="col px-0 position-relative">
                        <div class="bg-white college-info px-3 pb-2">
                            <h1 class="py-2 mb-0">Sai Institute</h1>
                            <ul class="d-inline-block list-unstyled ver-line-menu text-secondary small">
                                <li class="me-3">Type - Private</li>
                                <li class="me-3">Apporved by: UGC AICTE</li>
                                <li class="me-3">NIRF Ranking - 12</li>
                                <li><a href="#">MORE</a></li>
                            </ul>
                            <p class="mb-2 f-14"><i class="fas fa-map-marker-alt"></i> Rajpur Road, Dehradun, UK 248001
                            </p>
                            <p><a href="#"><i class="fas fa-download"></i> Download College Broucher</a></p>
                            <div class="position-absolute bottom-0 end-0 pe-4 pb-3">
                                <button class="btn site-btn-4">Schedule Video Call</button>
                                <button class="btn site-btn-4">Chat with College</button>
                                <button class="btn site-btn-1">Apply Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-2 mt-3">
                        <ul class="list-unstyled li-md sticky-top mt-3 detail-menu">
                            <li class="active"><a href="#about">About</a></li>
                            <li><a href="#courseandfees">Course & Fee</a></li>
                            <li><a href="#ranking">Ranking</a></li>
                            <li><a href="#gallery">Gallery</a></li>
                            <li><a href="#scholorship">Scholorship</a></li>
                            <li><a href="#faculty">Faculty</a></li>
                            <li><a href="#hostel">Hostel</a></li>
                            <li><a href="#placement">Placement</a></li>
                            <li><a href="#facilities">Near By Facilities</a></li>
                        </ul>
                    </div>
                    <div class="col-md-10 mt-3 detail">
                        <div id="about" class="mb-5">
                            <h2 class="ps-3">College Information</h2>
                            <div class="bg-white p-3 detail-border">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda,
                                    nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium
                                    dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum,
                                    vero!</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda,
                                    nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium
                                    dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum,
                                    vero!</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda,
                                    nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium
                                    dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum,
                                    vero!</p>
                                <div class="row mx-0 about-highlight-point">
                                    <div class="col-md-3 col-6">
                                        <p class="f-32 mb-0 fw-bold">25+</p>
                                        <p class="f-16 fw-6">Years of Educational Experience</p>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <p class="f-32 mb-0 fw-bold">270+</p>
                                        <p class="f-16 fw-6">Faculty Members</p>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <p class="f-32 mb-0 fw-bold">2500+</p>
                                        <p class="f-16 fw-6">Bright Students</p>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <p class="f-32 mb-0 fw-bold">17,250+</p>
                                        <p class="f-16 fw-6">Glorious Alumni</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <a href="#" class="text-decoration-none txt-color">View More <i
                                            class="fas fa-chevron-down"></i></a>
                                </div>
                            </div>

                        </div>

                        <div id="courseandfees" class="mb-5">
                            <h2 class="ps-3">Fees & Eligibility</h2>
                            <div class="bg-white p-3 detail-border">
                                <table class="table table-striped fees-table">
                                    <thead style=" background: #ffc9ab !important;">
                                    <tr>
                                        <td scope="col">Course</td>
                                        <td scope="col">Fees</td>
                                        <td scope="col">Eligibility</td>
                                        <td scope="col"></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>B.Tech</td>
                                        <td>₹22Lakhs (1st Year Fees)</td>
                                        <td>10+2 with 75% + JEE Advanced</td>
                                        <td>
                                            <button class="btn site-btn-5">Apply Now</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>B.Tech</td>
                                        <td>₹22Lakhs (1st Year Fees)</td>
                                        <td>10+2 with 75% + JEE Advanced</td>
                                        <td>
                                            <button class="btn site-btn-5">Apply Now</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>B.Tech</td>
                                        <td>₹22Lakhs (1st Year Fees)</td>
                                        <td>10+2 with 75% + JEE Advanced</td>
                                        <td>
                                            <button class="btn site-btn-5">Apply Now</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>B.Tech</td>
                                        <td>₹22Lakhs (1st Year Fees)</td>
                                        <td>10+2 with 75% + JEE Advanced</td>
                                        <td>
                                            <button class="btn site-btn-5">Apply Now</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>B.Tech</td>
                                        <td>₹22Lakhs (1st Year Fees)</td>
                                        <td>10+2 with 75% + JEE Advanced</td>
                                        <td>
                                            <button class="btn site-btn-5">Apply Now</button>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                                <p><a href="#"><i class="fas fa-download"></i> Download College Broucher</a></p>
                            </div>
                        </div>

                        <!-- <div id="ranking" class="mb-5">
                             <h2 class="ps-3">Ranking</h2>
                            <div class="bg-white p-3">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda, nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum, vero!</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda, nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum, vero!</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda, nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum, vero!</p>
                            </div>
                        </div>

                        <div id="gallery" class="mb-5">
                             <h2 class="ps-3">Gallery</h2>
                            <div class="bg-white p-3">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda, nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum, vero!</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda, nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum, vero!</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda, nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum, vero!</p>
                            </div>
                        </div>
                        -->
                        <div id="scholorship" class="mb-5">
                            <h2 class="ps-3">Scholorship</h2>
                            <div class="bg-white p-3 detail-border">
                                <button class="btn site-btn-5 mb-4">Apply for Scholorship</button>
                                <table class="table table-striped">
                                    <thead style=" background: #ffc9ab !important;">
                                    <tr>
                                        <td scope="col">Name Of Scholorship</td>
                                        <td scope="col">Eligibility</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>State Scholorship</td>
                                        <td>10+2 with 75% + JEE Advanced</td>
                                    </tr>
                                    <tr>
                                        <td>State Scholorship</td>
                                        <td>10+2 with 75% + JEE Advanced</td>
                                    </tr>
                                    <tr>
                                        <td>State Scholorship</td>
                                        <td>10+2 with 75% + JEE Advanced</td>
                                    </tr>
                                    <tr>
                                        <td>State Scholorship</td>
                                        <td>10+2 with 75% + JEE Advanced</td>
                                    </tr>
                                    <tr>
                                        <td>State Scholorship</td>
                                        <td>10+2 with 75% + JEE Advanced</td>
                                    </tr>
                                    <tr>
                                        <td>State Scholorship</td>
                                        <td>10+2 with 75% + JEE Advanced</td>
                                    </tr>
                                    <tr>
                                        <td>State Scholorship</td>
                                        <td>10+2 with 75% + JEE Advanced</td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="container px-3 my-3">
                            <div class="row">
                                <div class="col-md-6 mb-3 position-relative">
                                    <a href="/loan-form">
                                        <div class="action-bg-1"
                                             style="background:url(/v2/assets/images/site/hostel.jpg);background-size: cover;background-position: center;">
                                            <div class="position-absolute bottom-0 start-0 text-white">
                                                <p class="mb-0 text-uppercase ps-4 f-14">sponsored</p>
                                                <h3 class="ps-4 f-18">Find Students Loan Options <i
                                                        class="fas fa-arrow-circle-right" aria-hidden="true"></i>
                                                </h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 mb-3 position-relative">
                                    <a href="/hostel-form">
                                        <div class="action-bg-1"
                                             style="background:url(/v2/assets/images/site/hostel.jpg);background-size: cover;background-position: center;">
                                            <div class="position-absolute bottom-0 start-0 text-white">
                                                <p class="mb-0 text-uppercase ps-4 f-14">sponsored</p>
                                                <h3 class="ps-4 f-16">Find Students Hostel Options <i
                                                        class="fas fa-arrow-circle-right" aria-hidden="true"></i>
                                                </h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div id="faculty" class="mb-5">
                            <h2 class="ps-3">Faculty Details</h2>
                            <div class="bg-white p-3 detail-border">
                                <div class="row">
                                    <div class="col-md-6  my-2">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="/v2/assets/images/site/f-img.jpg" alt="...">
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <p class="mb-0 pcolor">Prof. (Dr.) Rakesh Kumar Sharma</p>
                                                <p>Vice Chancelor</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php $n = 0;
                                    while($n < 7){
                                    ?>
                                    <div class="col-md-5 faculty">
                                        <div class="d-flex align-items-center my-2">
                                            <div class="flex-shrink-0 ">
                                                <img src="/v2/assets/images/site/f-img.jpg" class="faculty-avatar w-100"
                                                     alt="...">
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <p class="pcolor f-16 fw-6">Prof. Rakesh Kumar</p>
                                                <p>Professor, Department of Computer Science & Engeeneering</p>
                                                <p>Qualification - B.Tech, M.Tech </p>
                                                <p>Subject Experties - Evolutionary Computation</p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $n++; } ?>
                                </div>
                            </div>
                        </div>

                        <div id="hostel" class="mb-5">
                            <h2 class="ps-3">Hostel</h2>
                            <div class="bg-white p-3 detail-border">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda,
                                    nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium
                                    dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum,
                                    vero!</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda,
                                    nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium
                                    dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum,
                                    vero!</p>
                                <hr>
                                <div class="text-center">
                                    <a href="#" class="text-decoration-none txt-color">View More <i
                                            class="fas fa-chevron-down"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- <div id="placement" class="mb-5">
                             <h2 class="ps-3">Placement</h2>
                            <div class="bg-white p-3 detail-border">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda, nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum, vero!</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda, nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum, vero!</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda, nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum, vero!</p>
                            </div>
                        </div> -->

                        <div id="review" class="mb-5">
                            <h2 class="ps-3">Reviews</h2>
                            <div class="bg-white p-3 detail-border">
                                <p class="f-16 fw-6">College Rating</p>
                                <div class="row">
                                    <div class="col-md-5">
                                        <span class="f-38 fw-6">8.5</span> out of 10
                                        <br>
                                        <i class="fas fa-graduation-cap gcolor"></i>
                                        <i class="fas fa-graduation-cap gcolor"></i>
                                        <i class="fas fa-graduation-cap gcolor"></i>
                                        <i class="fas fa-graduation-cap gcolor"></i>
                                        <i class="fas fa-graduation-cap gcolor"></i>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-md-4 mb-2">
                                                <p class="mb-0">9.0/10</p>
                                                <p class="mb-0 f-14">Academic</p>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <p class="mb-0">9.0/10</p>
                                                <p class="mb-0 f-14">Acomodation</p>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <p class="mb-0">9.0/10</p>
                                                <p class="mb-0 f-14">Faculty</p>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <p class="mb-0">9.0/10</p>
                                                <p class="mb-0 f-14">Infrastructure</p>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <p class="mb-0">9.0/10</p>
                                                <p class="mb-0 f-14">Placement</p>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <p class="mb-0">9.0/10</p>
                                                <p class="mb-0 f-14">Social Life</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-8">

                                    </div>
                                    <div class="col-md-2">

                                    </div>

                                </div>
                                <p>Remarks: Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae
                                    assumenda, nesciunt libero, consequuntur voluptatem ullam iure vero provident id
                                    accusantium dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis.
                                    Harum, vero!</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae assumenda,
                                    nesciunt libero, consequuntur voluptatem ullam iure vero provident id accusantium
                                    dolore, cum cupiditate ratione recusandae quaerat velit perspiciatis. Harum,
                                    vero!</p>
                                <div class="row mt-2">
                                    <div class="col-md-2 mb-2">
                                        <p class="mb-0 scolor">9.0/10</p>
                                        <p class="mb-0 f-14">Academic</p>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <p class="mb-0 scolor">9.0/10</p>
                                        <p class="mb-0 f-14">Acomodation</p>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <p class="mb-0 scolor">9.0/10</p>
                                        <p class="mb-0 f-14">Faculty</p>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <p class="mb-0 scolor">9.0/10</p>
                                        <p class="mb-0 f-14">Infrastructure</p>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <p class="mb-0 scolor">9.0/10</p>
                                        <p class="mb-0 f-14">Placement</p>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <p class="mb-0 scolor">9.0/10</p>
                                        <p class="mb-0 f-14">Social Life</p>
                                    </div>

                                </div>
                                <hr>
                                <div class="text-center">
                                    <a href="#" class="text-decoration-none txt-color">View More <i
                                            class="fas fa-chevron-down"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
