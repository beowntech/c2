@extends('front.blog.layout.header')
@section('title','Apply For Education Loan')
@section('content')
    <section>
        <div class="container">
            <div class="row pt-4 pb-5">
                <div class="col-md-6 offset-md-3 loan-form">
                    <h2 class="text-center link-a f28">Apply For Education Loan</h2>
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
                        <form action="/edu-loan/submit" id="education-loan-form" method="POST" novalidate class="needs-validation">
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
                                        <label for="">Time of Study</label>
                                        <select name="time_of_study" id="" class="form-control select-bgclr" required>
                                            <option selected disabled value="">Select Study Time</option>
                                            @for($i=1;$i<=12;$i++)
                                                @if(date('F',strtotime('01.'.$i.'.'.date('Y'))) == date('F'))
                                                    <option
                                                        value="{{date('F',strtotime('01.'.$i.'.'.date('Y')))}}">{{date('F',strtotime('01.'.$i.'.'.date('Y')))}}</option>
                                                @else
                                                    <option
                                                        value="{{date('F',strtotime('01.'.$i.'.'.date('Y')))}}">{{date('F',strtotime('01.'.$i.'.'.date('Y')))}}</option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="">Loan Amount (Rs.)</label>
                                <select name="loan_amount" id="" class="form-control select-bgclr" required>
                                    <option selected disabled value="">Select Loan Amount</option>
                                    @php($i = 5)
                                    @while($i < 50)
                                        @if($i > 5)
                                            <option value="5-10"> {{$i}} to {{$i + 10}} Lacs</option>
                                            @php($i += 10)
                                        @else
                                            <option value="5-10"> {{$i}} to {{$i + 5}} Lacs</option>
                                            @php($i += 5)
                                        @endif
                                    @endwhile
                                    <option value="5+"> 50 Lacs and above</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="" class="mb-3">Admission Status</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="admission_status" required
                                           id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Not Applied</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="admission_status" required
                                           id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Confirmed</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="admission_status" required
                                           id="inlineRadio3" value="option3">
                                    <label class="form-check-label" for="inlineRadio3">Applied</label>
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" required id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    I authorize AdmissionJockey to connect with me over call and Whatsapp</label>
                            </div>
                            <button data-sitekey="6Ldf01wcAAAAAEcZbXZ1dWEsdh_hdrHaXy2om-HY"
                                    data-callback='onSubmit'
                                    data-action='submit' class="btn site-btn-3 mt-4">Submit</button>
                            <p class="text-secondary text-center mt-4">
                                <a href="/blog" class="text-decoration-none text-secondary">Close</a>
                            </p>
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
        function onSubmit(token) {
            document.getElementById("education-loan-form").submit();
        }
        $(function () {
            $("#city-select").selectize({
                placeholder: 'Select City',
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
                        url: "{{env('APP_URL')}}/api/city/search/" + query,
                        type: "GET",
                        error: function () {
                            callback();
                        },
                        success: function (res) {
                            callback(res);
                        },
                    });
                },
                onInitialize: function(){
                    var selectize = this;
                    $.get("{{env('APP_URL')}}/api/city/search/0", function( data ) {
                        selectize.addOption(data); // This is will add to option
                        var selected_items = [];
                        $.each(data, function( i, obj) {
                            selected_items.push(obj.id);
                        });
                    });
                }
            });
        });
    </script>
@endsection
