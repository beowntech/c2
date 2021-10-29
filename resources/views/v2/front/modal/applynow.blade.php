
<!-- Modal -->
<div class="modal fade" id="applyNow" tabindex="-1" aria-labelledby="queryModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg">
        <div class="modal-content border-scolor py-4">
            <div class="modal-body ">
                <div class="row">
                    <div class="col-md-6 px-4">
                        <p class="mt-5">How Admission Jockey helps you in Admission.</p>
                        <div class="row modal-info">
                            <div class="col-md-4 p-0">
                                <div class="p-2 text-center">
                                    <div class="icon">
                                        <img src="{{asset('v2/assets/images/icons/bestGuidance_icon.png')}}" width="100%" alt="">
                                    </div>
                                    <p class="f-12">Best Guidence</p>
                                </div>
                            </div>
                            <div class="col-md-4 p-0">
                                <div class="p-2 text-center">
                                    <div class="icon">
                                        <img src="{{asset('v2/assets/images/icons/feeinfo_icon.png')}}" width="100%" alt="">
                                    </div>
                                    <p class="f-12">Fees Information</p>
                                </div>
                            </div>
                            <div class="col-md-4 p-0">
                                <div class="p-2 text-center">
                                    <div class="icon">
                                        <img src="{{asset('v2/assets/images/icons/scholarship_icon.png')}}" width="100%" alt="">
                                    </div>
                                    <p class="f-12">Scholorship</p>
                                </div>
                            </div>
                            <div class="col-md-4 p-0">
                                <div class="p-2 text-center">
                                    <div class="icon">
                                        <img src="{{asset('v2/assets/images/icons/industry_icon.png')}}" width="100%" alt="">
                                    </div>
                                    <p class="f-12">Industry Expert</p>
                                </div>
                            </div>
                            <div class="col-md-4 p-0">
                                <div class="p-2 text-center">
                                    <div class="icon">
                                        <img src="{{asset('v2/assets/images/icons/24-7counselling.png')}}" width="100%" alt="">
                                    </div>
                                    <p class="f-12">24/7 Councelling</p>
                                </div>
                            </div>
                            <div class="col-md-4 p-0">
                                <div class="p-2 text-center">
                                    <div class="icon">
                                        <img src="{{asset('v2/assets/images/icons/brochure_icon.png')}}" width="100%" alt="">
                                    </div>
                                    <p class="f-12">Brochure Details</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <form class="material-form apply-validation" action="{{route('multiple-form')}}" id="apply-now" novalidate>
                            <h2 class="scolor fw-6 mb-3 f-28">Join Now To Apply</h2>
                            @csrf
                            <input type="hidden" value="{{request()->url()}}" name="url">
                            <input type="hidden" value="apply-now" name="type">
                            <input type="hidden" value="" id="propName" name="property_name">
                            <input type="hidden" value="" id="propID" name="property_id">
                            <div class="form-group has-icon">
                                <span class="far fa-user form-control-icon"></span>
                                <input type="text" name="name" class="form-control form-control-lg" id="usr" required>
                                <label for="usr">Full Name</label>
                            </div>
                            <div class="form-group has-icon">
                                <span class="far fa-envelope form-control-icon"></span>
                                <input type="text" name="email" class="form-control form-control-lg" id="usr" required>
                                <label for="usr">Email Id</label>
                            </div>
                            <div class="form-group has-icon">
                                <span class="fas fa-phone-alt form-control-icon"></span>
                                <input type="text" name="phone" class="form-control form-control-lg" id="usr" required>
                                <label for="usr">Mobile Number</label>
                            </div>
                            <div class="form-group has-icon">
                                <span class="fas fa-map-marker-alt form-control-icon"></span>
                                <input type="text" name="city" class="form-control form-control-lg" id="usr" required>
                                <label for="usr">City you Live in </label>
                            </div>
                            <div class="form-group has-icon">
                                <span class="fas fa-graduation-cap form-control-icon"></span>
                                <select name="course" class="form-control form-control-lg" id="usr" required>
                                    <option value="" selected disabled></option>
                                    @foreach($courses as $c => $cou)
                                        @if($c > 3)
                                            <option value="{{$cou->name}}">{{$cou->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="usr">Choose Course</label>
                            </div>
                            <p class="mb-2 txt-color f-12">By submitting this form, you accept and agree to <a href="#">term of user</a>.</p>
                            <ul class="d-inline-block list-unstyled ver-line-menu float-end">
                                <li class="me-2"><button class="btn hover-site-btn-1 scolor" id="closeApply" data-bs-dismiss="modal" aria-label="Close"> close </button></li>
                                <li><button class="btn site-btn-1"> Submit </button></li>
                            </ul>
                        </form>
                        <div id="success-div"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<div class="modal fade" id="applyNow" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-body">--}}
{{--                <h3>Join Now to Apply</h3>--}}
{{--                <br>--}}
{{--                <form class="apply-validation" action="{{route('multiple-form')}}" id="apply-now" novalidate>--}}
{{--                    @csrf--}}
{{--                    <input type="hidden" value="{{request()->url()}}" name="url">--}}
{{--                    <input type="hidden" value="apply-now" name="type">--}}
{{--                    <input type="hidden" value="" id="propName" name="property_name">--}}
{{--                    <input type="hidden" value="" id="propID" name="property_id">--}}
{{--                    <input type="text" name="name" class="form-control site-field" required placeholder="Full Name">--}}
{{--                    <input type="email" name="email" class="form-control site-field" required placeholder="Email Id">--}}
{{--                    <input type="text" name="phone" class="form-control site-field" required placeholder="Mobile Number">--}}
{{--                    <input type="text" name="city" class="form-control site-field" required placeholder="City you Live In">--}}
{{--                    <select name="course" class="form-control site-field select-css" required>--}}
{{--                        <option value="" selected disabled>Select Courses</option>--}}
{{--                        <option value="Btech">Btech</option>--}}
{{--                    </select>--}}
{{--                    <button type="button" class="hover-site-btn-1" data-bs-dismiss="modal" aria-label="Close">Close</button>--}}
{{--                    <button class="btn site-btn-1 shadow" type="submit">Submit</button>--}}
{{--                </form>--}}
{{--            <div id="success-div"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@include('v2.front.modal.success')
<script>
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.apply-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }else{
                        event.preventDefault();
                        submitApply();
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()

    // this is the id of the form
    function submitApply() {
        var myModal = new bootstrap.Modal(document.getElementById('successModal'), {
            keyboard: false
        })
        var form = $("#apply-now");
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function (data) {
                if(data['status'] == 1){
                    form[0].reset();
                    $("#closeApply").click();
                    myModal.show();
                }
            }
        });
    }
</script>
