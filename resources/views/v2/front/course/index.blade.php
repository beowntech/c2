@extends('v2.front.layout.header')
@section('content')
<section class="shadow" style="background:linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('/v2/assets/images/site/bg.jpg');background-position: center;
background-size: cover; ">
    <div class="container">
        <div class="row py-3">
            <div class="col-md-8 offset-md-2 ">
            <h1 class="text-white py-3 f-32 mb-0 text-shadow">SEARCH FROM OVER 10000 COURSES IN INDIA</h1>
            </div>
            <div class="col-md-8 offset-md-2 position-relative">
            
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
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center">
                <ul class="list-unstyled ver-line-menu py-3">                        
                    <li><a href="">BE/B.TECH COURSES</a></li>
                    <li><a href="">MBBS COURSES</a></li>
                    <li><a href="">B.SC COURSES</a></li>
                    <li><a href="">B.COM COURSES</a></li>
                    <li><a href="">BA COURSES</a></li>
                    <li><a href="">MBA/PGDM COURSES</a></li>       
                </ul>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col text-center">
                <h2 class="title-2">Choose by your level</h2>
                <p class="subtitle">An extensive search engine for the students, parents,
                    and education industry players who are seeking information.
                </p>
            </div>
        </div>
        <div class="row">
            <?php $n=0;
            while($n<6){
            ?>
            <div class="col-md-4 site-card">
                <div class="box-card-sm text-white px-3 py-2" style="background:#476482;">
                <p class="fw-6 mb-2">After 10th Courses</p>
                <p class="f-14 mb-2">Applicable for Diploma course & Certification Courses</p>
                <div class="course-list">
                      <a href="">BE/B.TECH</a>
                    <a href="">MBBS</a>
                    <a href="">BBA</a>
                    <a href="">ARTS</a>
                    <a href="">MBA</a>
                    <a href="">B.COM COURSES</a>
                    
                </div>
                  
                </div>                        
            </div>
            <?php
                $n++;
            }
            ?>           

        </div>
    </div>
</section>
<section>
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col text-center">
                <h2 class="title-2">Choose by Intrest</h2>
                <p class="subtitle">An extensive search engine for the students, parents,
                    and education industry players who are seeking information.
                </p>
            </div>
        </div>
        <div class="row">
            <?php $n=0;
            while($n<6){
            ?>
            <div class="col-md-4 site-card">
                <div class="box-card-sm">
                    <div class="row">
                        <div class="col-6 text-center">
                            <img src="/v2/assets/images/icon/15.png" alt="">
                            <a href="#"><p class="f-16">Engeenering</p></a>
                        </div>
                        <div class="col-6">
                            <ul class="list-unstyled py-1 course-list-1">                        
                                <li><a href="">BE/B.TECH COURSES</a></li>
                                <li><a href="">MBBS COURSES</a></li>
                                <li><a href="">B.SC COURSES</a></li>
                                <li><a href="">B.COM COURSES</a></li>      
                            </ul>
                            <a href="#" class="a-pink float-right me-2">View All Courses ></a>
                        </div>
                    </div>
                
                </div>                        
            </div>
            <?php
                $n++;
            }
            ?>
            

        </div>
    </div>
</section>
    <section class="height-90 confuesed-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 text-white py-5">
                    <h1 class="f-36 mb-3">Still Confuesed!</h1>

                    <p class="f-20 mb-5">We will help you to make your career bright share your information</p>

                    <div class="form-1">
                        <form action="">
                            <input type="text" class="form-control site-field" placeholder="Type you full name">
                            <input type="email" class="form-control site-field" placeholder="Enterl Email Id">
                            <select name="" id="" class="form-control site-field select-css">
                                <option value="">Select Courses</option>   
                                <option value="">Option 1</option>                             
                            </select>
                            <button class="btn site-btn-1 shadow">Submit</button>
                        </form>
                    </div>
                   
                </div>
                <div class="col-md-7">
                   
                </div>
            </div>
        </div>            
    </section>
@endsection