<footer class="bg-white py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-unstyled ver-line-menu">
                    <li><a href="#" class="text-decoration-none"> About Us</a></li>
                    <li><a href="#" class="text-decoration-none"> Privacy & Policy </a></li>
                    <li><a href="#" class="text-decoration-none"> Terms of Use </a></li>
                    <li><a href="#" class="text-decoration-none"> Contact </a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <p class="mb-0 fw-bold"> Corprate Office:  </p>
                <p>Meedo plaza, Rajpur Road, Dehradun, Uttarakhand 248001</p>
                <p class="mb-0">+91 7060243009</p>
                <p class="mb-4">contact@admissionjockey.com</p>
                <ul class="list-unstyled ver-line-menu social-links">
                    <li><a href="#" class="text-decoration-none"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#" class="text-decoration-none"><i class="fab fa-instagram"></i> </a></li>
                    <li><a href="#" class="text-decoration-none"><i class="fab fa-twitter"></i> </a></li>
                    <li><a href="#" class="text-decoration-none"><i class="fab fa-linkedin-in"></i> </a></li>
                    <li><a href="#" class="text-decoration-none"><i class="fab fa-whatsapp"></i> </a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col cprght">
                <img src="assets/images/aj-icon.png" width="30px" alt="">
                <p class="d-inline-block">Copyright &copy; 2021. Admission Jockey</p>
            </div>
        </div>
    </div>
</footer>
<div class="d-block d-sm-none fixed-bottom bg-white py-1 px-3 xs-menu">
    <div class="row mb-2">
        <div class="col">
            <a href="#" class="btn mb-enq-btn rounded-0" data-bs-toggle="modal" data-bs-target="#bestDealForm"> Get best deals </a>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="blogConsultingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0 p-1">
                <button type="button" class="btn-close float-start" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 sm-hide">
                        <h2 class="pcolor">We provide <br> best guidence </h2>
                        <img src="assets/images/site/enq-modal.png" width="100%" class="text-center mt-3" alt="">
                    </div>
                    <div class="col-md-6">
                        <div class="enq-form bg-white p-3 shadow-0">
                            @if (\Session::has('informationSuccess') || \Session::has('informationError'))
                                @if (\Session::has('informationSuccess'))
                                    <div class="alert alert-success">
                                        {!! \Session::get('informationSuccess') !!}
                                    </div>
                                @elseif(\Session::has('informationError'))
                                    <div class="alert alert-danger">
                                        {!! \Session::get('informationError') !!}
                                    </div>
                                @endif
                            @else
                            <p>Share Your Information</p>
                            <form action="/information-submit" class="footer-needs-validation" novalidate method="POST">
                                @csrf
                                <input type="hidden" name="url" value="{{Request::path()}}">
                                <div class="mb-2">
                                    <label for="exampleInput" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="exampleInput" required>
                                </div>
                                <div class="mb-2">
                                    <label for="exampleInputEmail1" class="form-label">Prefered Course</label>
                                    <select name="course" id="" class="form-control" required>
                                        <option value="" disabled selected>Select Course</option>
                                        @foreach($courses as $c => $vsl)
                                            @foreach($vsl->children as $s => $vals)
                                                <option value="{{$vals->id}}">{{$vals->name}}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="exampleInputEmail1" class="form-label">Email Id</label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-2">
                                    <label for="exampleInputPassword1" class="form-label">Phone No</label>
                                    <input type="text" class="form-control" name="contact" id="exampleInputPassword1" required>
                                </div>
                                <button type="submit" class="btn site-btn-2">Submit</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.js"></script>
<script>
    @if(\Session::has('informationSuccess') || \Session::has('informationError'))
    $(window).on('load', function () {
        $('#blogConsultingModal').modal('show');
    });
    @endif
</script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.footer-needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
@yield('script')
</body>
</html>
