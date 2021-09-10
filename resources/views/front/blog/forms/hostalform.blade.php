@extends('front.blog.layout.header')
@section('title','Apply For Best Hostel')
@section('content')
    <style>
        .selectize-dropdown-content div{
            padding: 3px 10px;
        }
    </style>
    <section>
    <div class="container">
        <div class="row pt-4 pb-5">
            <div class="col-md-6 offset-md-3 loan-form">
                <h2 class="text-center link-a f28">Apply For Best Hostel</h2>
                <p class="text-center link-a">We are Providing best accomodation facilities near your college</p>
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
                <form action="/hostel-form/submit" class="needs-validation" novalidate method="POST">
                    @csrf
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" name="first_name" placeholder="Enter your First Name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" name="last_name" placeholder="Enter your Last Name" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Mobile Number</label>
                                <input type="text" name="mobile_number" placeholder="Enter your Mobile Number" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="email" name="email" placeholder="Enter your Email" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">City</label>
                                <select name="city" id="city-select" class="form-control" required></select>
                            </div>
                            <div class="col-md-6">
                                <label for="">College</label>
                                <select name="college" id="college-select" required class="form-control">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="" class="mb-3">Admission Status</label><br>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="admission_status" id="inlineRadio1" required value="not applied">
                        <label class="form-check-label" for="inlineRadio1">Not Applied</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="admission_status" id="inlineRadio2" required value="confirmed">
                        <label class="form-check-label" for="inlineRadio2">Confirmed</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="admission_status" id="inlineRadio3" required value="applied" >
                        <label class="form-check-label" for="inlineRadio3">Applied</label>
                        </div>
                    </div>

                    <button type="submit" class="btn site-btn-3 mt-4">Submit</button>
                    <p class="text-secondary text-center mt-4"><a href="/blog" class="text-decoration-none text-secondary">Close</a></p>
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
    <script>
        $(function () {
            $("#city-select").selectize({
                valueField: "id",
                labelField: "name",
                searchField: "name",
                create: false,
                options:[],
                render: {
                    option: function (item, escape) {
                        return (
                            "<div>" +
                                escape(item.name)+
                            "</div>"
                        );
                    },
                },
                load: function (query, callback) {
                    if (!query.length) return callback();
                    $.ajax({
                        url: "https://test.admissionjockey.com/api/city/search/" + query,
                        type: "GET",
                        error: function () {
                            callback();
                        },
                        success: function (res) {
                            callback(res);
                        },
                    });
                },
            });


            $("#college-select").selectize({
                valueField: "id",
                labelField: "name",
                searchField: "name",
                create: false,
                options: [],
                render: {
                    option: function (item, escape) {
                        return (
                            "<div>" +
                                escape(item.name)+
                            "</div>"
                        );
                    },
                },
                load: function (query, callback) {
                    $.ajax({
                        url: "https://test.admissionjockey.com/api/college/search/" + query,
                        type: "GET",
                        error: function () {
                            callback();
                        },
                        success: function (res) {
                            callback(res);
                        },
                    });
                },
            });
        });
    </script>
@endsection

