<footer>
    <div class="row m-0">
        <div class="col">
        <p></p>
        </div>
    </div>
    <section class="footer-highlight-link">
        <div class="container">
    <div class="row">
            <div class="col">
                @foreach(json_decode($footer_upper_menu) as $m => $val)
                        <p class="mb-0  fw-bold">{{$val->name}}</p>
                        <ul class="list-unstyled ver-line-menu">
                            @foreach($val->submenu as $s => $sub)
                                @if(isset($sub->link))
                                    <li><a href="{{$sub->link != "/" ? "/search/colleges?query=".$sub->link: ""}}">{{ucfirst(strtolower($sub->name))}}</a>
                                    </li>
                                @elseif(isset($sub->category))
                                    <li><a href="{{route('search-college')}}?course={{$sub->catg}}">{{ucfirst(strtolower($sub->name))}}</a>
                                    </li>
                                @endif
                            @endforeach
                            {{--                <li><a href="#">B.Tech/B.E</a></li>--}}
                            {{--                <li><a href="#">MCA</a></li>--}}
                            {{--                <li><a href="#">BCA</a></li>--}}
                            {{--                <li><a href="#">M.Tech</a></li>--}}
                            {{--                <li><a href="#">MA</a></li>--}}
                            {{--                <li><a href="#">BA</a></li>--}}
                        </ul>
                @endforeach
{{--                 <p class="mb-0  fw-bold">Top Colleges</p>--}}
{{--                    <ul class="list-unstyled ver-line-menu">--}}
{{--                        <li><a href="#">Top DRCC College</a></li>--}}
{{--                        <li><a href="#">Top College in Dehradun</a></li>--}}
{{--                        <li><a href="#">Top College in Delhi</a></li>--}}
{{--                        <li><a href="#">Top College in Mumbai</a></li>--}}
{{--                        <li><a href="#">Top College in Bangalore</a></li>--}}
{{--                        <li><a href="#">Top College in Mumbai</a></li>--}}
{{--                    </ul>--}}
{{--                    <p class="mb-0  fw-bold">Top Courses</p>--}}
{{--                    <ul class="list-unstyled ver-line-menu">--}}
{{--                        <li><a href="#">Engeneering</a></li>--}}
{{--                        <li><a href="#">Medical</a></li>--}}
{{--                        <li><a href="#">Science</a></li>--}}
{{--                        <li><a href="#">Commerce</a></li>--}}
{{--                        <li><a href="#">Management</a></li>--}}
{{--                        <li><a href="#">Arts</a></li>--}}
{{--                        <li><a href="#">Computer Applications</a></li>--}}
{{--                        <li><a href="#">Law</a></li>--}}
{{--                        <li><a href="#">Dental</a></li>--}}
{{--                    </ul>--}}
            </div>
        </div>
        </div>
    </section>
    <div class="container">

        <div class="row py-5">
            @foreach(json_decode($footer_menu) as $m => $val)
        <div class="col-md-2">
            <p class="mb-4  fw-bold">{{$val->name}}</p>
            <ul class="list-unstyled li-md">
                @foreach($val->submenu as $s => $sub)
                    @if(isset($sub->link))
                        <li><a href="{{$sub->link != "/" ? "/search/colleges?query=".$sub->link: ""}}">{{ucfirst(strtolower($sub->name))}}</a>
                        </li>
                    @elseif(isset($sub->category))
                        <li><a href="{{route('search-college')}}?course={{$sub->catg}}">{{ucfirst(strtolower($sub->name))}}</a>
                        </li>
                    @endif
                @endforeach
{{--                <li><a href="#">B.Tech/B.E</a></li>--}}
{{--                <li><a href="#">MCA</a></li>--}}
{{--                <li><a href="#">BCA</a></li>--}}
{{--                <li><a href="#">M.Tech</a></li>--}}
{{--                <li><a href="#">MA</a></li>--}}
{{--                <li><a href="#">BA</a></li>--}}
            </ul>
        </div>
            @endforeach
{{--        <div class="col-md-2">--}}
{{--            <p class="mb-4  fw-bold">Top Universities</p>--}}
{{--            <ul class="list-unstyled li-md">--}}
{{--                <li><a href="#">Engeneering</a></li>--}}
{{--                <li><a href="#">Medical</a></li>--}}
{{--                <li><a href="#">Science</a></li>--}}
{{--                <li><a href="#">Commerce</a></li>--}}
{{--                <li><a href="#">Management</a></li>--}}
{{--                <li><a href="#">Law</a></li>--}}
{{--                <li><a href="#">Dental</a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--        <div class="col-md-1">--}}
{{--            <p class="mb-4 fw-bold">Top Exam</p>--}}
{{--            <ul class="list-unstyled li-md">--}}
{{--                <li><a href="#">CAT</a></li>--}}
{{--                <li><a href="#">GATE</a></li>--}}
{{--                <li><a href="#">JEE-Main</a></li>--}}
{{--                <li><a href="#">NEET</a></li>--}}
{{--                <li><a href="#">Xat</a></li>--}}
{{--                <li><a href="#">Clat</a></li>--}}
{{--                <li><a href="#">Mat</a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--        <div class="col-md-2">--}}
{{--            <p class="mb-4 fw-bold">Study Abroad</p>--}}
{{--            <ul class="list-unstyled li-md">--}}
{{--                <li><a href="#">Canada</a></li>--}}
{{--                <li><a href="#">USA</a></li>--}}
{{--                <li><a href="#">UK</a></li>--}}
{{--                <li><a href="#">UAE</a></li>--}}
{{--                <li><a href="#">Australia</a></li>--}}
{{--                <li><a href="#">Germany</a></li>--}}
{{--                <li><a href="#">Sweden</a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
        <div class="col-md-1"></div>
        <div class="col">
            <p class="mb-0 fw-bold"> Corporate Office: </p>
            <p>Meedo plaza, Rajpur Road, Dehradun, Uttarakhand 248001</p>
            <p class="mb-0">+91 7060243009, 9997740264</p>
            <p class="mb-4">contact@admissionjockey.com</p>
            <ul class="list-unstyled ver-line-menu social-links">
                <li><a href="https://www.facebook.com/admissionjockey" class="text-decoration-none"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="https://www.instagram.com/admissionjockeyofficial/" class="text-decoration-none"><i class="fab fa-instagram" aria-hidden="true"></i> </a></li>
                <li><a href="https://twitter.com/admissionjockey" class="text-decoration-none"><i class="fab fa-twitter" aria-hidden="true"></i> </a></li>
                <li><a href="https://www.linkedin.com/company/admission-jockey/" class="text-decoration-none"><i class="fab fa-linkedin-in" aria-hidden="true"></i> </a></li>
                <li><a href="https://admissionjockey.com/#" class="text-decoration-none pe-2"><i class="fab fa-whatsapp" aria-hidden="true"></i> </a></li>
            </ul>
        </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul class="list-unstyled ver-line-menu">
                    <li><a href="/about-us" class="text-decoration-none"> About Us</a></li>
                    <li><a href="/privacy-policy" class="text-decoration-none"> Privacy &amp; Policy </a></li>
                    <li><a href="/terms" class="text-decoration-none"> Terms of Use </a></li>
                    <li><a href="/contact" class="text-decoration-none"> Contact </a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <p class="mb-0 float-end">Copyright &copy; 2021. Admission Jockey</p>
            </div>
        </div>
    </div>

</footer>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/6188cc636bb0760a4941960f/1fjv5sq3l';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
<script src="{{asset('front/js/jquery.min.js')}}"></script>
@yield('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>
<script src="{{asset('/assets/js/custom.js')}}"></script>
<script>
    (function () {
        $(".viewallLocation").click(function () {
            var items = document.getElementsByClassName('locationMore');
            if (items[0].style.display == "block") {
                for (var i = 0; i < items.length; i++) {
                    items[i].style.display = 'none';
                }
                $(".viewallLocation").html('View More <i class="fas fa-bars text-secondary"></i>');
            } else {
                for (var i = 0; i < items.length; i++) {
                    items[i].style.display = 'block';
                }
                $(".viewallLocation").html('View Less <i class="fas fa-bars text-secondary"></i>');
            }
        });
        $(".viewallExam").click(function () {
            var items = $('.mainExamCategory');
            var viewMore = $('.viewMoreExamCategory');
            if (items.hasClass('d-none')) {
                    $(".mainExamCategory").removeClass('d-none');
                    $(".viewMoreExamCategory").addClass('d-none');
                $(".viewallExam").html('View More <i class="fas fa-bars text-secondary"></i>');
            } else {
                $(".mainExamCategory").addClass('d-none');
                $(".viewMoreExamCategory").removeClass('d-none');
                $(".viewallExam").html('View Less <i class="fas fa-bars text-secondary"></i>');
            }
        });
        $(".viewallCollege").click(function () {
            var items = $('.mainCollegeCategory');
            var viewMore = $('.viewMoreCollegeCategory');
            if (items.hasClass('d-none')) {
                items.removeClass('d-none');
                viewMore.addClass('d-none');
                $(this).html('View More <i class="fas fa-bars text-secondary"></i>');
            } else {
                items.addClass('d-none');
                viewMore.removeClass('d-none');
                $(this).html('View Less <i class="fas fa-bars text-secondary"></i>');
            }
        });
    })();
</script>
</body>
</html>
