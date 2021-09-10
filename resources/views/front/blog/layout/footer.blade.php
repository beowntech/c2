<footer class="bg-white py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-unstyled ver-line-menu">
                    <li><a href="/about-us" class="text-decoration-none"> About Us</a></li>
                    <li><a href="/privacy-policy" class="text-decoration-none"> Privacy & Policy </a></li>
                    <li><a href="/terms" class="text-decoration-none"> Terms of Use </a></li>
                    <li><a href="/contact" class="text-decoration-none"> Contact </a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <p class="mb-0 fw-bold"> Corprate Office:  </p>
                <p>Meedo plaza, Rajpur Road, Dehradun, Uttarakhand 248001</p>
                <p class="mb-0">+91 7060243009</p>
                <p class="mb-4">contact@admissionjockey.com</p>
                <ul class="list-unstyled ver-line-menu social-links">
                    <li><a href="https://www.facebook.com/admissionjockey" class="text-decoration-none"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://www.instagram.com/admissionjockeyofficial/" class="text-decoration-none"><i class="fab fa-instagram"></i> </a></li>
                    <li><a href="https://twitter.com/admissionjockey" class="text-decoration-none"><i class="fab fa-twitter"></i> </a></li>
                    <li><a href="https://www.linkedin.com/company/admission-jockey/" class="text-decoration-none"><i class="fab fa-linkedin-in"></i> </a></li>
                    <li><a href="https://admissionjockey.com/#" class="text-decoration-none"><i class="fab fa-whatsapp"></i> </a></li>
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
            <a href="#" class="btn mb-enq-btn rounded-0" data-bs-toggle="modal" data-bs-target="#blogConsultingModal"> Get best deals </a>
        </div>
    </div>
</div>
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
