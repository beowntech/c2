<footer>
    <div class="container">
        <div class="row py-4">
            <div class="col-md-4">
                <a href="/"><img src="/assets/images/logo-1.png" class="site-logo" alt="Admission Jockey" srcset=""></a>
                <p>Admission Jockey aims to be the best among the leading higher education search portals in India. Our website www.admissionjockey.com hosts a wide range of educational institutions and makes admission an accessible and convenient process for students across the nation.</p>
        <ul class="list-inline social-links">
          <li class="list-inline-item"><a href="https://www.facebook.com/admissionjockey" target="_blank"><i class="fab fa-facebook"></i></a></li>
          <li class="list-inline-item"><a href="https://www.instagram.com/admissionjockeyofficial/"target="_blank"><i class="fab fa-instagram"></i></a></li>
          <li class="list-inline-item"><a href="https://twitter.com/admissionjockey" target="_blank"><i class="fab fa-twitter"></i></a></li>
          <li class="list-inline-item"><a href="https://www.linkedin.com/company/admission-jockey/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
          <li class="list-inline-item"><a href="#"><i class="fab fa-whatsapp"></i></a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h2>Top Colleges</h2>
        <ul class="list-unstyled">
          <li><a href="/search" target="_blank"><i class="fas fa-angle-double-right"></i> Top College in India</a></li>
          <li><a href="/search" target="_blank"><i class="fas fa-angle-double-right"></i> Top College in Dehradun</a></li>
          <li><a href="/search" target="_blank"> <i class="fas fa-angle-double-right"></i> Top College in Delhi</a></li>
          <li><a href="/search" target="_blank"><i class="fas fa-angle-double-right"></i> Top College in Mumbai</a></li>
          <li><a href="/search" target="_blank"><i class="fas fa-angle-double-right"></i> Top College in Bangalore</a></li>
          <li><a href="/search" target="_blank"><i class="fas fa-angle-double-right"></i> Top College in Chennai</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h2>Top Courses</h2>
        <ul class="list-unstyled">
        <li><a href="/search" target="_blank"><i class="fas fa-angle-double-right"></i> Top Courses in India</a></li>
          <li><a href="/search" target="_blank"><i class="fas fa-angle-double-right"></i> Top Courses in Dehradun</a></li>
          <li><a href="/search" target="_blank"> <i class="fas fa-angle-double-right"></i> Top Courses in Delhi</a></li>
          <li><a href="/search" target="_blank"><i class="fas fa-angle-double-right"></i> Top Courses in Mumbai</a></li>
          <li><a href="/search" target="_blank"><i class="fas fa-angle-double-right"></i> Top Courses in Bangalore</a></li>
          <li><a href="/search" target="_blank"><i class="fas fa-angle-double-right"></i> Top Courses in Chennai</a></li>
        </ul>
      </div>
       <div class="col-md-2">
        <h2>Important Links</h2>
        <ul class="list-unstyled">
          <li><a href="/about-us" target="_blank"><i class="fas fa-angle-double-right"></i> About Us</a></li>
          <li><a href="/blogs" target="_blank"><i class="fas fa-angle-double-right"></i> Blogs</a></li>
          <li><a href="/coming-soon" target="_blank"><i class="fas fa-angle-double-right"></i> Partners</a></li>
          <li><a href="/coming-soon" target="_blank"><i class="fas fa-angle-double-right"></i> Careers</a></li>
            <li><a href="/cyber-partner" target="_blank"><i class="fas fa-angle-double-right"></i> Cyber Partner</a></li>
<li><a href="https://admissionjockey.com/login" >login</a></li>
        </ul>
      </div>

    </div>
  </div>
  <div class="container py-2">
    <div class="row border-top">
      <div class="col">
        <ul class="list-inline mb-0">
             <li class="list-inline-item"><a href="/">Home</a></li>
          <li class="list-inline-item"><a href="#">About Us</a></li>
          <li class="list-inline-item"><a href="#">Disclaimer</a></li>
          <li class="list-inline-item"><a href="/contact">Contact</a></li>
          <li class="list-inline-item"><a href="/privacy-policy">Privacy & Policy</a></li>
          <li class="list-inline-item"><a href="/terms">Terms of Use</a></li>
        </ul>
      </div>
    </div>
    <div class="row border-top">

      <div class="col">
        <p>Copyright © 2021. Admission Jockey. </p>
      </div>
    </div>
  </div>
</footer>
<!-- Enquiry Modal -->
<!-- Modal -->

@include('front.modal.index')
<div class="static-icon-bar">
<a href="/api/click?call=1" class="call" target="_blank"><i class="fas fa-phone-square"></i></a>
<a href="/api/click?whatsapp=1" class="whatsapp" target="_blank"><i class="fab fa-whatsapp-square"></i></a>
</div>
<script src="{{asset('front/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/lib1.js')}}"></script>
<script src="{{asset('assets/js/lib2.js')}}"></script>
<script src="{{asset('assets/js/lazyload.js')}}"></script>
<!-- Optional JavaScript; choose one of the two! -->
<script type="text/javascript">
    $("img").lazyload({
        effect : "fadeIn"
    });
    document.addEventListener("DOMContentLoaded", function() {
        var lazyloadImages;

        if ("IntersectionObserver" in window) {
            lazyloadImages = document.querySelectorAll(".lazy");
            var imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var image = entry.target;
                        image.classList.remove("lazy");
                        imageObserver.unobserve(image);
                    }
                });
            });

            lazyloadImages.forEach(function(image) {
                imageObserver.observe(image);
            });
        } else {
            var lazyloadThrottleTimeout;
            lazyloadImages = document.querySelectorAll(".lazy");

            function lazyload () {
                if(lazyloadThrottleTimeout) {
                    clearTimeout(lazyloadThrottleTimeout);
                }

                lazyloadThrottleTimeout = setTimeout(function() {
                    var scrollTop = window.pageYOffset;
                    lazyloadImages.forEach(function(img) {
                        if(img.offsetTop < (window.innerHeight + scrollTop)) {
                            img.src = img.dataset.src;
                            img.classList.remove('lazy');
                        }
                    });
                    if(lazyloadImages.length == 0) {
                        document.removeEventListener("scroll", lazyload);
                        window.removeEventListener("resize", lazyload);
                        window.removeEventListener("orientationChange", lazyload);
                    }
                }, 20);
            }

            document.addEventListener("scroll", lazyload);
            window.addEventListener("resize", lazyload);
            window.addEventListener("orientationChange", lazyload);
        }
    })
</script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js" ></script>
<script src="{{asset('/assets/js/custom.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/assets/dist/simple-lightbox.js?v2.4.1"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

<script>
    /* AppC */
    $(function () {

        var ctx = $('#myChart');
        var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
  labels: [
    'Payable Amount',
    'Total Interest',
  ],
  datasets: [{
    // label: 'Education Loan',
    data: [100, 90],
    backgroundColor: [
      'rgb(255,91,0)',
      '#003593',
    ],
  }]
},
    options: {
 rotation: -30 * Math.PI,
                cutoutPercentage: 30,
                circumference: Math.PI * 60,
                legend: {
                    position: 'left'
                },
                animation: {
                    animateRotate: false,
                    animateScale: true
                },
                events: [],
		}
});



        function e(e) {
            if ((e = e.toString()).length > 9) return "overflow";
            if (n = ("000000000" + e).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/), n) {
                var t = "";
                return t += 0 != n[1] ? (l[Number(n[1])] || o[n[1][0]] + " " + l[n[1][1]]) + "crore " : "", t += 0 != n[2] ? (l[Number(n[2])] || o[n[2][0]] + " " + l[n[2][1]]) + "lakh " : "", t += 0 != n[3] ? (l[Number(n[3])] || o[n[3][0]] + " " + l[n[3][1]]) + "thousand " : "", t += 0 != n[4] ? (l[Number(n[4])] || o[n[4][0]] + " " + l[n[4][1]]) + "hundred " : "", t += 0 != n[5] ? ("" != t ? "and " : "") + (l[Number(n[5])] || o[n[5][0]] + " " + l[n[5][1]]) + "only " : ""
            }
        }

        function t() {
            var n = Math.round(r * i / (1 - Math.pow(1 / (1 + i), a))),
                t = r * i / (1 - Math.pow(1 / (1 + i), a)),
                l = t * a - r;
            $(".emiValue").text(n.toLocaleString("en-IN")),
            $(".interestValue").text(Math.round(l).toLocaleString("en-IN")),
            $(".TotalValue").text(Math.round(t * a).toLocaleString("en-IN"));
             myChart.data.datasets[0].data[1] = Math.round(l);
              myChart.data.datasets[0].data[0] = Math.round(t*a);
                myChart.update();
        }
        var r, a, i, l = ["", "one ", "two ", "three ", "four ", "five ", "six ", "seven ", "eight ", "nine ", "ten ", "eleven ", "twelve ", "thirteen ", "fourteen ", "fifteen ", "sixteen ", "seventeen ", "eighteen ", "nineteen "],
            o = ["", "", "twenty", "thirty", "forty", "fifty", "sixty", "seventy", "eighty", "ninety"];
        $("#loan-amount").slider({
            range: "min",
            value: 100000,
            min: 0,
            max: 9000000,
            step: 100000,
            slide: function (n, a) {
                $("#selected-amount").text((a.value)/100000), r = a.value, t()
            }
        }),
        $("#selected-amount").text(($("#loan-amount").slider("value"))/100000)
        var r = $("#loan-amount").slider("value");
        $("#interest-rate").slider({
            range: "min",
            value: 5,
            min: 5,
            max: 22.5,
            step: .05,
            slide: function (e, n) {
                console.log(n.value / 1200);
                $("#selected-interest").text(n.value), i = n.value / 1200, t()
            }
        }), $("#selected-interest").text($("#interest-rate").slider("value")), i = $("#interest-rate").slider("value") / 1200, $("#loan-duration").slider({
            range: "min",
            value: 1,
            min: 0,
            max: 35,
            step: .5,
            slide: function (e, n) {
                console.log(12 * n.value);
                $("#selected-duration").text(n.value), a = 12 * n.value, t()
            }
        }), $("#selected-duration").text($("#loan-duration").slider("value")), a = 12 * $("#loan-duration").slider("value"), t()
    });

    /* AppC */
</script>
<script>
    (function() {
        var $gallery = new SimpleLightbox('.gallery a', {});
        var $gallery = new SimpleLightbox('.gallery2 a', {});

        $(".viewallLocation").click(function(){
            var items = document.getElementsByClassName('locationMore');
            if(items[0].style.display == "block"){
                for (var i=0; i < items.length; i++) {
                items[i].style.display = 'none';
                }
                $(".viewallLocation").html('View All');
            }else{
                for (var i=0; i < items.length; i++) {
                    items[i].style.display = 'block';
                }
                 $(".viewallLocation").html('View Less');
            }
        });
    })();
</script>
 <script>
     @if(\Session::has('informationSuccess') || \Session::has('informationError'))
     @else
     $(window).on('load', function () {
         if (getCookie('landingForm') == null) {
             $('#enqModalCenter').modal('show');
         }
         $('#enqModalCenter').modal('show');
     });
     @endif

    $(document).ready(function(){

        $('#CyberLeadsTable').DataTable({
            responsive: true
        });

        @if(Route::currentRouteName() == "details" && request()->route('id'))
        $("#quickEnqCollegName").html($(".quickEnquiryDetail").data('name') + ", " + $(".quickEnquiryDetail").data('location'));
        $("#prop_id_modal").val($(".quickEnquiryDetail").data('id'));
        setTimeout(function() {
            $('#exampleModal').modal('show');
        }, 500);
        @endif

        $("#nextForm").click(function () {
            $(".second-step-enq").show();
            $(".first-step-enq").hide();

        });

    });
    $("#regSubmit").on('click',function(){
        $(this).prop('disabled',true);
        $(this).html("<span class=\"spinner-border spinner-border-sm\" role=\"status\" aria-hidden=\"true\"></span>\n" +
            "  Submitting...");
            var name = $("#regName").val();
            var prop = $("#prop_id_modal").val();
            var email = $("#regEmail").val();
            var contact = $("#regContact").val();
            var city = $("#regCity").val();
            var course = $("#regCourse").val();
            if(name == "" || name == null){
                alert("Enter Your Name");
                $("#regSubmit").html("SUBMIT");
                $("#regSubmit").prop("disabled",false);
            }else if(email == "" || email == null){
                alert("Enter Your Email");
                $("#regSubmit").html("SUBMIT");
                $("#regSubmit").prop("disabled",false);
            }else if(contact == "" || contact == null){
                alert("Enter your Contact");
                $("#regSubmit").html("SUBMIT");
                $("#regSubmit").prop("disabled",false);
            }else if(city == "" || city == null){
                alert("Enter City");
                $("#regSubmit").html("SUBMIT");
                $("#regSubmit").prop("disabled",false);
            }else if(course == "" || course == null) {
                alert("Enter Course");
                $("#regSubmit").html("SUBMIT");
                $("#regSubmit").prop("disabled",false);
            }else {
                setTimeout(function(){
                $.ajax({
                    type: "GET",
                    url: "/api/enquiry-form",
                    data: {
                        'name': name,
                        'email': email,
                        'contact': contact,
                        'city': city,
                        'course': course,
                        'prop': prop
                    },
                    success: function (response) {
                        $("#regSubmit").html("SUBMIT");
                        $("#regSubmit").prop("disabled",true);
                        $("#regDone").html("Enquiry Submitted Successfully");
                        setTimeout(function() {
                            $('#exampleModal').modal('hide');
                        }, 2000);
                    },
                    error: function (res) {
                        $("#regSubmit").html("SUBMIT");
                        $("#regSubmit").prop("disabled",false);
                        // console.log(res);
                    }
                });
                }, 2000);
            }
    });
    var val = [];
    $("#landingNext").on('click',function () {
        $('.landingStream:checked').each(function(i){
            val[i] = $(this).val();
        });
        if(val.length != 0){
            $(".second-step-enq").show();
            $(".first-step-enq").hide();
        }else{
            alert("Must Select One Option")
        }
    });
    $("#landingSubmit").on('click',function () {
        $(this).html("<span class=\"spinner-border spinner-border-sm\" role=\"status\" aria-hidden=\"true\"></span>\n" +
            "  <span class=\"visually-hidden\">Please Wait...</span>");
        // $(this).prop("disabled",true);
        setTimeout(function(){
        var name = $("#landingName").val();
        var email = $("#landingEmail").val();
        var contact = $("#landingContact").val();
        var city = $("#landingCity").val();
        if(name == ""){
            alert("Enter Your Name");
        }else if(email == ""){
            alert("Enter Your Email");
        }else if(contact == ""){
            alert("Enter your Contact");
        }else {
            $.ajax({
                type: "GET",
                url: "/api/enquiry-form-submit",
                data: {
                    'name': name,
                    'email': email,
                    'contact': contact,
                    'city': city,
                    'course': val,
                },
                success: function (response) {
                    $("#landingSubmit").html("SUBMIT");
                    $("#landingSubmit").prop("disabled",true);
                    $("#landingDone").html("Submit Successfully");
 $('#enqModalCenter').modal('hide');
                },
                error: function (res) {
                    $("#landingSubmit").html("SUBMIT");
                    $("#landingSubmit").prop("disabled",false);
                    console.log(res);
                    $('#enqModalCenter').modal('hide');
                }
            });
        }
        }, 2000);
    });
 function setCookie(key, value, expiry) {
        var expires = new Date();
        expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
        document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
    }

    function getCookie(key) {
        var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
        return keyValue ? keyValue[2] : null;
    }

    function eraseCookie(key) {
        var keyValue = getCookie(key);
        setCookie(key, keyValue, '-1');
    }
    </script>
<script>
    $(".bankApply").click(function () {
        $("#bankImage").attr('src','/banks/'+$(this).data('image'));
        $("#educationModalName").html($(this).data('name'));
        $("#bank_id_modal").html($(this).data('id'));
    });
    $(".buttontr").on('click','.bankApply',function () {
        $("#bankImage").attr('src','/banks/'+$(this).data('image'));
        $("#educationModalName").html($(this).data('name'));
        $("#bank_id_modal").html($(this).data('id'));
    });
</script>
@yield('script')

</body>
</html>
