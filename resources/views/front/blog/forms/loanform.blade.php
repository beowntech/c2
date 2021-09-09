@extends('front.blog.layout.header')
@section('content')
    <section>
    <div class="container">
        <div class="row pt-4 pb-5">
            <div class="col-md-6 offset-md-3 loan-form">
                <h2 class="text-center link-a f24">Apply For Education Loan</h2>
                <p class="text-center link-a">Apply for loan at the best intrest rate to fund your education</p>
                @if (\Session::has('success') || \Session::has('error'))
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            {!! \Session::get('success') !!}
                        </div>
                    @elseif(\Session::has('error'))
                        <div class="alert alert-danger">
                            {!! \Session::get('error') !!}
                        </div>
                    @endif
                @else
                <form action="/edu-load/submit" method="POST" novalidate class="needs-validation">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Mobile Number</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="email" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">City</label>
                                <select name="" id="" class="form-control" required></select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Time of Study</label>
                                <select name="" id="" class="form-control select-bgclr" required>
                                    <option value="#"></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="">Loan Amount (Rs.)</label>
                        <select name="" id="" class="form-control select-bgclr" required>
                            <option value="#"></option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="" class="mb-3">Admission Status</label><br>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" required id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Not Applied</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" required id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Confirmed</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" required id="inlineRadio3" value="option3" >
                        <label class="form-check-label" for="inlineRadio3">Applied</label>
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" required id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            I authorize avance Financial Services to connect with me over call and Whatsapp overriding my registration with NDNC
                        </label>
                    </div>
                    <button type="submit" class="btn site-btn-3 mt-4">Submit</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

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
@endsection
