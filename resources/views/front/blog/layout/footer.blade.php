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
                <img src="/assets/images/aj-icon.png" width="30px" alt="">
                <p class="d-inline-block">Copyright &copy; 2021. Admission Jockey</p>
            </div>
        </div>
    </div>
</footer>
<div class="d-block d-sm-none fixed-bottom bg-white py-1 px-3 xs-menu">
    <div class="row mb-2">
        <div class="col">
            <a href="#" class="btn mb-enq-btn rounded-0" data-bs-toggle="modal" data-bs-target="#blogConsultingModal"> Get Free Counseling </a>
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
                        }else {
                            event.preventDefault()
                            onClick(1);
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()

        function addEnquiry() {
            $("#popup-form-submit").attr('disabled',true);
            $("#popup-form-submit").html("Submitting <span class=\"spinner-border spinner-border-sm\" style=\"width: 1.3rem;height: 1.3rem;border-width: 0.14em;\" role=\"status\" aria-hidden=\"true\"></span>")
            var form = $("#popup-form");
            // var email = $("#blogEmail").val();
            var token = "{{csrf_token()}}";
            $.ajax({
                type: "POST",
                url: '/information-submit',
                data: form.serialize()+ '&_token=' + token, // serializes the form's elements.
                success: function(data) {
                    $("#success-div-popup").removeClass('d-none');
                    $("#div-popup-1").addClass('d-none');
                    $("#div-popup-2").addClass('d-none');
                    $("#blogConsultDiloag").removeClass('modal-lg');
                    $("#blogConsultBody").addClass('p-3');
                },
                error: function (err) {
                    console.log(err)
                    $("#popup-form-submit").attr('disabled',false);
                    $("#popup-form-submit").html("Submit");
                }
            });
        }
    </script>
@yield('script')
<script src="https://www.google.com/recaptcha/api.js?render=6Ldf01wcAAAAAEcZbXZ1dWEsdh_hdrHaXy2om-HY"></script>
<script>
    function onClick(type) {
        grecaptcha.ready(function() {
            grecaptcha.execute('6Ldf01wcAAAAAEcZbXZ1dWEsdh_hdrHaXy2om-HY', {action: 'submit'}).then(function(token) {
                switch(type) {
                    case 1:
                        addEnquiry();
                        break;
                    case 2:
                        // code block
                        break;
                    default:
                    // code block
                }
                // Add your logic to submit to your backend server here.
            });
        });
    }
</script>
</body>
</html>
