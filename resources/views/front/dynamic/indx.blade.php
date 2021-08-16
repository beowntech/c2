<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/images/admission-jockey-logo.png">
    <link rel="shortcut icon" href="/assets/images/admission-jockey-logo.png" type="image/x-icon">
    <link rel="icon" href="/assets/images/admission-jockey-logo.png" type="image/x-icon">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/main.css">
    <script src="https://kit.fontawesome.com/0bee4dcff2.js" crossorigin="anonymous"></script>
    <title>{{$page[0]->name}}</title>
    <style>
        .text-shadow {
            text-shadow: 0px 0px 3px #fff;
        }

        @media only screen and (max-width: 480px) {
            .eceter {
                text-align: center !important;
                padding: 6px 0;
            }
        }
h1{
            font-size:22px;
        }
        h2{
            font-size: 18px;
        }
.light-cl{
color: #fbfbfb !important;
}
    </style>
</head>
<body>
<section
    style="min-height:100%;  background:linear-gradient(160deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6), rgb(0 0 0 / 41%), rgb(0 0 0 / 90%)), url({{'/dynamic/'.$page[0]->id.'/featured/'.$page[0]->featured}});  background-size:cover;min-height:80vh;">
    <div class="container">
        <div class="row py-3">
            <div class="col-md-6 eceter">
                <img src="{{'/dynamic/'.$page[0]->id.'/logo/'.$page[0]->logo}}" width="150px" alt="">
            </div>
            <div class="col-md-6 text-end eceter">
                <p class="mb-0 light-cl">associate with </p>
                <img src="/assets/images/transpanent.png" width="150px" alt="">
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-7 py-4">

                <h1 class="text-white ">GO A DEGREE HIGHER.</h1>
                <h2 class="text-white "> BECOME A SPECIALIST.</h2>

            </div>
            <div class="col-md-5 site-form mb-4 border-end-0">
                <div id="enq-form" class="enquiry-form-1 text-center">
                    <p class="mb-1">Call For Any Enquiry</p>
                    <h2 class=""><a href="tel:+91 7060243001" class="text-warning">+91 7060243009 </a></h2>
                    <h2 class=""> ADMISSION OPEN FOR 2021 </h2>
                    <br>
                    <form>
                        <input type="hidden" value="{{$page[0]->id}}" id="page_id">
                        <input type="text" id="name" class="form-control mb-4" placeholder="Your Name">
                        <input type="number" id="contact" class="form-control mb-4" placeholder="Your Contact Number">
                        <input type="email" id="email" class="form-control mb-4" placeholder="Your mail">
                        <select name="" id="course" class="form-control mb-4">
                            @foreach($main as $m => $val)
                                <option value="{{$val->id}}">{{$val->name}}</option>
                            @endforeach
                        </select>
                        <p id="regDone" class="text-white"></p>
                        <div class="d-grid gap-2">
                            <button class="btn site-btn-3" type="button" id="submitButton">Submit</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-7">

                {!! $page[0]->content !!}
            </div>
            <div class="col-md-5">
                <div class="bg-light p-3">
                        <h1 class="pcolor"> Scholarships</h1>
                        <h2 class="pcolor">Admission Jockey  <span class="scolor">Student Dream Scholarship</span></h2>
                        <ul>
                            <li>A national scholarship by Admission Jockey where we will bear the entire cost of education of <span class="scolor">20 children</span> in whose family the earning member has succumbed to COVID-19.</li>
                            <li>Students who want to apply for this scholarship can fill this <a href="#enq-form">form</a> .</li>
                            <li>Last date of applying for this scholarship - 28th August 2021.</li>
                            <li>All candidates must book a FREE call with our Admission Jockeys to know further details about the scholarship.</li>
                        </ul>
                       <h2 class="pcolor">Admission Jockey <span class="scolor">Build Your Future Scholarship</span> </h2>
                            <ul>
                                <li>A <span class="scolor">national </span> by Admission Jockey for <span class="scolor">underprivileged students</span> whose families do not have the resources to support their higher education.</li>
                                <li>We are providing scholarships worth <span class="scolor">25 Lakhs INR</span> every year to students across India.</li>
                                <li>Last date of applying for this scholarship - <span class="scolor"> 31st August 2021.</li>
                                <li>All candidates must book a FREE call with our Admission Jockeys to know further <span class="scolor">details about the scholarship.<span class="scolor"></li>
                            </ul>

                    </div>
            </div>
        </div>
    </div>
</section>
<div class="static-icon-bar">
    <a href="/api/click?call=1" class="call" target="_blank"><i class="fas fa-phone-square"></i></a>
    <a href="/api/click?whatsapp=1" class="whatsapp" target="_blank"><i class="fab fa-whatsapp-square"></i></a>    
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
<script src="{{asset('front/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/lib1.js')}}"></script>
<script src="{{asset('assets/js/lib2.js')}}"></script>
<script>
    $("#submitButton").on('click',function(){
        $(this).prop('disabled',true);
        $(this).html("<span class=\"spinner-border spinner-border-sm\" role=\"status\" aria-hidden=\"true\"></span>\n" +
            "  Submitting...");
        var name = $("#name").val();
        var page = $("#page_id").val();
        var email = $("#email").val();
        var contact = $("#contact").val();
        var course = $("#course").val();
        if(name == "" || name == null){
            alert("Enter Your Name");
            $("#submitButton").html("SUBMIT");
            $("#submitButton").prop("disabled",false);
        }else if(email == "" || email == null){
            alert("Enter Your Email");
            $("#submitButton").html("SUBMIT");
            $("#submitButton").prop("disabled",false);
        }else if(contact == "" || contact == null){
            alert("Enter your Contact");
            $("#submitButton").html("SUBMIT");
            $("#submitButton").prop("disabled",false);
        }else if(course == "" || course == null) {
            alert("Enter Course");
            $("#submitButton").html("SUBMIT");
            $("#submitButton").prop("disabled",false);
        }else {
            setTimeout(function(){
                $.ajax({
                    type: "GET",
                    url: "/api/dynamic_enquiry",
                    data: {
                        'name': name,
                        'email': email,
                        'contact': contact,
                        'course': course,
                        'page': page
                    },
                    success: function (response) {
                        $("#submitButton").html("SUBMIT");
                        $("#submitButton").prop("disabled",true);
                        $("#regDone").html("Enquiry Submited Successfully");
                        window.location.href = "/thank-you"
                    },
                    error: function (res) {
                        $("#submitButton").html("SUBMIT");
                        $("#submitButton").prop("disabled",false);
                        // console.log(res);
                    }
                });
            }, 2000);
        }
    });
</script>
</html>
