@extends('v2.front.layout.header')
@section('content')
<section class="bglg">
    <div class="container">
        <div class="row pt-3 pb-5 ">

                <div class="col-md-8 offset-md-2">
                    <div class="row bg-white border-radius-sm">
                        <div class="col-md-6 p-4 video-counseling">
                            <h2 class="f-20 fw-6">Get <span class="pcolor"> Video Guidence </span></h2>
                            <p class="f-14" >Tell us your education status</p>
                            <form class="form-2 need-validation" action="{{route('multiple-form')}}" id="schedule-call" novalidate>
                                @csrf
                                <input type="hidden" value="{{request()->url()}}" name="url">
                                <input type="hidden" value="schedule-video" name="type">
                            <div class="btn-group mb-3" id="action-buttons" role="group" aria-label="Basic radio toggle button group">
                                <div class="action-btn">
                                    <div class="action-value text-center" data-name="10th-pass">
                                        <label class="btn btn-outline-primary">10</label>
                                        <p class="f-12">10th Pass</p>
                                    </div>
                                </div>
                                <div class="action-btn">
                                    <div class="action-value text-center" data-name="12th-pass">
                                        <label class="btn btn-outline-primary">12</label>
                                        <p class="f-12">12th Pass</p>
                                    </div>
                                </div>
                                <div class="action-btn ">
                                    <div class="action-value text-center active" data-name="graduate">
                                        <label class="btn btn-outline-primary"><i class="fas fa-graduation-cap"></i></label>
                                        <p class="f-12">Graduate</p>
                                    </div>
                                </div>
                            </div>

                            <label for="" class="f-14 mb-2">Select Your Streams</label>
                            <select name="stream" id="" class="form-control site-field select-css mb-3">
                                <option value="" selected disabled>Select Courses</option>
                                @foreach($course as $c => $cou)
                                        @if($c > 3)
                                            <option value="{{$cou->name}}">{{$cou->name}}</option>
                                        @endif
                                    @endforeach
                            </select>
                            <label for="" class="f-14 mb-2">Mobile Number</label>
                            <div class="input-group mb-3">
                                <input type="text" name="mobile" class="form-control site-field" >
                            </div>
                            <button type="submit" class="btn site-btn-3  shadow">Submit</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <img src="/v2/assets/images/site/video.png" width="100%" alt="">
                        </div>
                    </div>
                </div>

        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    var seleced = "";
    $(document).ready(function(){
        $("#action-buttons .action-value").click(function(){
            $("#action-buttons .action-value").removeClass('active');
            $(this).addClass('active');
            seleced = $(this).data('name');
        });
        // $("#action-buttons .action-value").addClass('active')
    });
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.need-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }else{
                        event.preventDefault();
                        submitForm();
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()

    // this is the id of the form
    function submitForm() {
        var form = $("#schedule-call");
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize()+'&education='+seleced,
            success: function (data) {
                if(data['status'] == 1){
                    form[0].reset();
                    form.addClass('d-none');
                    $(".video-counseling").append('<div class="alert alert-success" role="alert">Thank You for Submitting Request!</div>');
                }
            }
        });
    }
</script>
@endsection
