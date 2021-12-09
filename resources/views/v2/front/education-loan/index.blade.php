@extends('v2.front.layout.header')
@section('content')
<link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css">
          <style>
            .selectize-dropdown-content div{
              padding: 3px 10px;
          }
        </style>
<section>
    <div class="container-fluid">
        <div class="row mx-0">
            <div class="col small px-3 pt-1">
                <nav style="--bs-breadcrumb-divider: '>>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-dark">Admissionjockey</a></li>
                        <li class="breadcrumb-item active"><a href="#!" class="text-decoration-none">Education Loan</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-md-5 text-center p-0 ">
                <img src="/v2/assets/images/site/loan-bg.png" width="100%" alt="">

            </div>
            <div class="col-md-6">
                <p class="fw-6 f-18 ps-3">Share the Information</p>
                <form action="/edu-loan/submit" id="education-loan-form" method="POST" novalidate class="row ms-3 needs-validation">
                    @csrf
                    <div class="col-md-6 mb-2">
                        <label for="exampleInputEmail1" class="form-label f-14">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="exampleInputEmail1" required aria-describedby="emailHelp">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="exampleInputEmail1" class="form-label f-14">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="exampleInputEmail1" required aria-describedby="emailHelp">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="exampleInputEmail1" class="form-label f-14">Mobile Number</label>
                        <input type="text" class="form-control" name="mobile_number" id="exampleInputEmail1" required aria-describedby="emailHelp">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="exampleInputEmail1" class="form-label f-14">Email ID</label>
                        <input type="text" class="form-control" name="email" id="exampleInputEmail1" required aria-describedby="emailHelp">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="exampleInputEmail1" class="form-label f-14">City</label>
                        <select name="city" id="city-select" required class="form-control"></select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="exampleInputEmail1" class="form-label f-14">Time of Study</label>
                        <select name="time_of_study" id="" required class="form-control select-bgclr">
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
                    <div class="col-md-6 mb-2">
                        <label for="exampleInputEmail1" class="form-label f-14">Loan Ammount</label>
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
                    <div class="col-md-6 mb-2">
                        <label for="exampleInputEmail1" class="form-label f-14">Student Class</label>
                        <select name="student_class" id="" required class="form-control select-bgclr">
                            <option value="" selected disabled>Select Class</option>
                        <option value="10">10th</option>
                        <option value="12">12th</option>
                        <option value="B">Bachelor</option>
                        <option value="PG">Post Graduation</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="exampleInputEmail1" class="form-label f-14">Admission Status</label><br>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="admission_status" id="inlineRadio1" value="Not Applied">
                        <label class="form-check-label" for="inlineRadio1">Not Applied</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="admission_status" id="inlineRadio2" value="Confirmed">
                        <label class="form-check-label" for="inlineRadio2">Confirmed</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="admission_status" id="inlineRadio3" value="Applied">
                        <label class="form-check-label" for="inlineRadio3">Applied</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <div class="mb-2 form-check f-14">
                            <input type="checkbox" class="form-check-input" required id="authorize-checkbox">
                            <label class="form-check-label" for="exampleCheck1">I authorize admission jockey to connect  with me over call or whatsapp</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="d-grid">
                            <button type="submit" id="submit-button" class="btn site-btn-1">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Flexbox container for aligning the toasts -->
<div aria-live="polite" aria-atomic="true" style="top:50px;z-index:11" class="position-fixed d-flex justify-content-center align-items-center w-100">

    <div id="liveToast" class="toast hide border-0" style="width:400px;background:#dff2d5" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header p-0 border-0">
        <img src="{{asset('v2/assets/images/icon/check.png')}}" class="me-2" style="max-width: 43px;padding: 10px;background: #83b655;" alt="...">
        <strong class="me-auto">Details Submitted Successfully!</strong>
      </div>
    </div>
  </div>
@endsection
@section('script')
<script>
    var status = null;
    var checked = false;
    var reset =false;
    $("input[name=admissionstatus]").on('change',function(){
        status = $(this).val();
        // console.log($(this).val())
    });
    $("#authorize-checkbox").change(function(){
        checked = $(this).prop('checked');
        // console.log($(this).prop('checked'))
    });

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
                        }else{
                            event.preventDefault();
                            if(status == null){
                                alert("Please Select Admission Status");
                            }else if(!checked){
                                alert("Authorize Admission Jockey");
                            }else{
                            applyEducationLoan();
                            }
                        }
                        if(!reset){
                        form.classList.add('was-validated')
                    }
                    }, false)
                })
        })()

        function applyEducationLoan(){
            $("#submit-button").attr('disabled',true);
            var myAlert =document.getElementById('liveToast');//select id of toast
            var bsAlert = new bootstrap.Toast(myAlert);//inizialize it
            var form = $("#education-loan-form");
            $.ajax({
                type: "POST",
                url: form.attr('action'),
                data: form.serialize(),
                async: false,
                success: function (response) {
                    bsAlert.show();//show it
                    // $("#add-lead-form").removeClass('was-validated');
                    reset = true;
                    form[0].reset();
                    $("#city-select")[0].selectize.clear();
                },
                error: function () {
                    $("#submit-button").attr('disabled',false);
                    console.log('Error occured');
                }
            });
        }

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
