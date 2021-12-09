@extends('v2.front.cyber.layout.header')
@section('content')
<section class="bglg">
    <div class="container">

        <div class="row py-2">

            <div class="col-md-8 offset-md-2 p-3">
            <div class="row">
                <div class="col">
                    <h2 class="mb-3 f-22 fw-6">Fill Student Information</h2>
                </div>
            </div>
            <form class="row needs-validation" action="/cyber-leads/add" method="POST" id="add-lead-form">
                @csrf
                <div class="col-md-6 mb-2">
                    <label for="exampleInputEmail1" class="form-label f-14">Student Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp">
                </div>
                <div class="col-md-6 mb-2">
                    <label for="exampleInputEmail1" class="form-label f-14">Student City</label>
                    <select name="city" id="city-select" class="form-control select-bgclr" required></select>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="exampleInputEmail1" class="form-label f-14">Student Contact Number</label>
                    <input type="text" name="contact" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp">
                </div>
                <div class="col-md-6 mb-2">
                    <label for="exampleInputEmail1" class="form-label f-14">Student Email ID</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp">
                </div>
                <div class="col-md-6 mb-2">
                    <label for="exampleInputEmail1" class="form-label f-14">Student Intersted Course</label>
                    <select name="course" id="course-select" class="form-control select-bgclr" required></select>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="exampleInputEmail1" class="form-label f-14">Student Intrested College</label>
                    <select name="college" id="college-select" class="form-control select-bgclr" required></select>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="exampleInputEmail1" class="form-label f-14">Student Intrested Place</label>
                    <select name="place" id="place-select" class="form-control select-bgclr" required></select>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="exampleInputEmail1" class="form-label f-14">Student Class</label>
                    <select name="class" id="" class="form-control select-bgclr" required>
                        <option value="" selected disabled>Student Class</option>
                        <option value="10">10th</option>
                        <option value="12">12th</option>
                        <option value="B">Bachelor</option>
                        <option value="PG">Post Graduation</option>
                    </select>
                </div>
                <div class="col-md-12 mb-2">
                    <label for="exampleInputEmail1" class="form-label f-14">Message</label>
                    <textarea name="message" id="" class="form-control" rows="3" required></textarea>
                </div>
                <div class="col-md-6">
                    <a href="{{route('cyber-leads')}}" class="btn float-end">Dashboard</a>
                </div>
                <div class="col-md-6">
                    <div class="d-grid">
                        <button type="submit" class="btn site-btn-1 ">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>

<!-- Flexbox container for aligning the toasts -->
<div aria-live="polite" aria-atomic="true" style="top:50px;z-index:11" class="position-fixed d-flex justify-content-center align-items-center w-100">

    <div id="liveToast" class="toast hide border-0" style="width:400px;background:#dff2d5" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header p-0 border-0">
        <img src="{{asset('v2/assets/images/icon/check.png')}}" class="me-2" style="max-width: 43px;padding: 10px;background: #83b655;" alt="...">
        <strong class="me-auto">Student Information Submitted Successfully</strong>
      </div>
    </div>
  </div>
@endsection
@section('script')
    <script>

var reset = false;
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
                            event.preventDefault()
                            addLead();
                        }
                        if(!reset){
                        form.classList.add('was-validated')
                    }
                    }, false)
                })
        })()

function addLead() {
    var myAlert =document.getElementById('liveToast');//select id of toast
    var bsAlert = new bootstrap.Toast(myAlert);//inizialize it
            $.ajax({
                type: "POST",
                url: $("#add-lead-form").attr('action'),
                data: $("#add-lead-form").serialize(),
                async: false,
                success: function (response) {
                    bsAlert.show();//show it
                    // $("#add-lead-form").removeClass('was-validated');
                    reset = true;
                    $("#add-lead-form")[0].reset();
                    $("#city-select")[0].selectize.clear();
                    $("#college-select")[0].selectize.clear();
                    $("#place-select")[0].selectize.clear();
                    $("#course-select")[0].selectize.clear();
                    $("#add-lead-form").removeClass('was-validated');
                },
                error: function () {
                    console.log('Error occured');
                }
            });
        }
</script>
<script>
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

            $("#place-select").selectize({
                placeholder: 'Select Place',
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

            var i=3;

            $("#course-select").selectize({
                placeholder: 'Select Course',
                valueField: "name",
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
                        url: "{{env('APP_URL')}}/api/course/search/" + query,
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
                    $.get("{{env('APP_URL')}}/api/course/search", function( data ) {
                        console.log(data);
                        selectize.addOption(data); // This is will add to option
                        var selected_items = [];
                        $.each(data, function( i, obj) {
                            selected_items.push(obj.id);
                        });
                    });
                }
            });


            $("#college-select").selectize({
                placeholder: 'Select College',
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
                        url: "{{env('APP_URL')}}/api/college/search/" + query,
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
                    $.get("{{env('APP_URL')}}/api/college/search/0", function( data ) {
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
