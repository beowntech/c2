@extends('alotfront.layouts.header')
@section('content')
    <style>
        @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

        fieldset, label { margin: 0; padding: 0; }
        h1 { font-size: 1.5em; margin: 10px; }

        /****** Style Star Rating Widget *****/

        .rating {
            border: none;
            float: left;
        }

        .rating > input { display: none; }
        .rating > label:before {
            margin: 5px;
            font-size: 1.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        .rating > .half:before {
            content: "\f089";
            position: absolute;
        }

        .rating > label {
            color: #ddd;
            float: right;
        }

        /***** CSS Magic to Highlight Stars on Hover *****/

        .rating > input:checked ~ label, /* show gold star when clicked */
        .rating:not(:checked) > label:hover, /* hover current star */
        .rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

        .rating > input:checked + label:hover, /* hover current star when changing rating */
        .rating > input:checked ~ label:hover,
        .rating > label:hover ~ input:checked ~ label, /* lighten current selection */
        .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }
        </style>
    @foreach($data as $datas => $value)
    <section id="small-cover-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 py-2">
                    <p class="mb-2"><span class="badge badge-danger"><i class="fa fa-check-circle"></i> Verified</span> <span class="badge badge-primary">Restaurant</span></p>
                    <p class="mb-1">
                        @if($review == 0)
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        @else
                            {{--                        {{$round=round( $review * 2 ) % 2}}--}}
                            {{--                    {{$floor = floor( $review )}}--}}
                            @for($i=0; $i < 5; $i++)
                                @if($review > 1)
                                    <i class="fa fa-star" style="color:yellow"></i>
                                    <i style="display: none">{{$review=$review-1}}</i>
                                @else
                                    @if($review >= 0.5)
                                        <i class="fa fa-star-half-o" style="color:yellow"></i>
                                        <i style="display: none">{{$review = $review - 0.5}}</i>
                                    @else
                                        <i class="fa fa-star-o"></i>
                                    @endif
                                @endif
                            @endfor
                            {{--                    @for($i=0; $i < (5 - $review); $i++)--}}
                            {{--                            <i class="fa fa-star-o"></i>--}}
                            {{--                            @endfor--}}
                        @endif
                    </p>
                    <p class="detail-heading-location"><i class="fa fa-map-marker text-primary"></i> {{$value->address}},
                        {{$city[0]->name}},{{$state[0]->name}}</p>
                    <h1 class="site-title pl-0 text-white">ALOT{{ str_pad($value->id, 5, '0', STR_PAD_LEFT) }}</h1>
                </div>
            </div>
        </div>

    </section>
    <section id="property-detail">
        <div class="container px-sm-1 mx-auto">
            <div class="row m-0">

                <div class="col-md-9 pt-2">
                    <h2 class="site-title" >Gallery</h2>
                    <div class=" no-gutters" id="images">
                        <div class="card">
                            <div class="demo">
                                <ul id="lightSlider">
                                    @foreach($value->children as $val => $values)
                                        @foreach(json_decode($values->images) as $img)
                                            <li data-thumb="{{asset('property/images/'.$img)}}"><img src="{{asset('property/images/'.$img)}}" /> </li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="description" class="mt-4">
                        <h2 class="site-title" >Description</h2>
                        <p>{{$value->description}}</p>
                    </div>
                    <div id="feature" class="mt-4">
                        <h2 class="site-title" >Features</h2>
                        @foreach($am[$value->id] as $ams =>$valus)
                            @foreach($valus as $valuea =>$chk)
                                <span class="mb-0 mr-3"><i class="fas fa-check-double"></i> {{$chk->name}}</span>
                            @endforeach
                        @endforeach
                    </div>
                    <div class="container py-3">
                        <div class="row">
                            <div class="col">
                                <h1 class="site-title">Rooms</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="MultiCarouselRoom" data-items="1,2,3,4" data-slide="1" id="MultiCarouselRom"  data-interval="1000">
                                <div class="MultiCarousel-inner">
                                    @foreach($room as $k => $val)
                                    <div class="item text-center bg-transparent">
                                        <div class="col-md-12 card mb-4 border-0 ">
{{--                                            <img src="assets/images/bg/snow-cover.png" class="card-img-top" alt="...">--}}
                                            <div class="shadow-sm">
                                                <div class="card-body px-1 ">
                                                    <p class="font-weight-bold mb-0">{{$val->name}}</p>
{{--                                                    <p class="small mb-0">Hotel Address</p>--}}
{{--                                                    <span class="badge badge-success">4.7 <i class="fas fa-star"></i></span> (62 Ratings)--}}

                                                </div>
                                                <div class="card-footer border-0 px-1 ">
                                                    <strong> ₹{{$val->custom_price}}</strong> per night
                                                    @if(Auth::user())
                                                        @if(!$booking->isEmpty())
                                                        @if(\Carbon\Carbon::now()->between($booking[0]->from_date, $booking[0]->to_date))
                                                            <button type="button" class="btn btn-outline-danger btn-sm float-right mb-2">Not Available</button>
                                                        @else
                                                            <button type="button" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#RoomsModal{{$val->id}}" class="btn btn-outline-info btn-sm float-right mb-2">Book Now</button>
                                                        @endif
                                                        @else
                                                            <button type="button" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#RoomsModal{{$val->id}}" class="btn btn-outline-info btn-sm float-right mb-2">Book Now</button>
                                                        @endif
                                                    @else
                                                        <a href="/login" class="btn btn-outline-info btn-sm float-right mb-2">Login</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <button class="btn btn-primary leftLst"><</button>
                                <button class="btn btn-primary rightLst">></button>
                            </div>
                        </div>

                    </div>
                    <div id="location" class="mt-4">
                        <h2 class="site-title" >Location</h2>
                        <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=chopta&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div></div>
                    </div>
                    <div id="reviews" class="mt-4">
                        <h2 class="site-title" >Reviews</h2>
                        <form class="form-horizontal" action="/api/add-review" method="post">
                            <fieldset>
                                @foreach($data as $datas => $value)
                                    <input type="hidden" value="{{$value->id}}" name="prop_id">
                            @endforeach
                            <!-- Name input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="message">Select Rating</label>
                                        <div class="col-md-9">
                                            <fieldset class="rating">
                                                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                                <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                                <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                                <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                                <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                                <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                            </fieldset><br>
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">Full Name</label>
                                    <div class="col-md-9">
                                        <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
                                    </div>
                                </div>

                                <!-- Email input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="email">Your E-mail</label>
                                    <div class="col-md-9">
                                        <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
                                    </div>
                                </div>

                                <!-- Message body -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="message">Your message</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" id="message" name="message" placeholder="Please enter your feedback here..." rows="5"></textarea>
                                    </div>
                                </div>

                                    <div style="float: left;" class="ml-4">
                                <button type="submit" class="btn btn-primary btn-md">Submit</button>
                                <button type="reset" class="btn btn-default btn-md">Clear</button>
                                    </div>
                            </fieldset>
                        </form>
                    </div>

                </div>
                <div class="col-md-3 pt-2">
                    <button type="button" class="btn btn-success" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#exampleModalCenter">Book Now</button>
                    <div class="sticky-top">
                        <div class="jumbotron jumbotron-fluid py-2">
                            <div class="container">
                                <p class="font-weight-bold">Standard Timing</p>
                                <p class="mb-0"><strong> Check-in Time:</strong> 12:00 am</p>
                                <p><strong> Check-out Time:</strong> 11:00 am</p>
                            </div>
                        </div>
                        <h5></h5>

                        <hr>
                        <h5> Enquiry</h5>
                        <form method="POST" action="/send/email">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="contact" placeholder="Contact">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="traveller" placeholder="No. of Traveller">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="main">
        <div class="container">
            <div class="row my-2 py-1">


            </div>
        </div>
    </section>


    <section id="slide-item" class="my-4">

        <div class="container py-3">
            <div class="row">
                <div class="col">
                    <h1 class="site-title">Similar Properties</h1>
                </div>
            </div>
            <div class="row">
                <div class="MultiCarousel" data-items="1,2,3,4" data-slide="1" id="MultiCarousel"  data-interval="1000">
                    <div class="MultiCarousel-inner">

                        <?php
                        $n=1;
                        while($n<11){
                        ?>
                        <div class="item text-center bg-transparent">
                            <div class="col-md-12 card mb-4 border-0 ">
                                <img src="assets/images/bg/snow-cover.png" class="card-img-top" alt="...">
                                <div class="shadow-sm">
                                    <div class="card-body px-1 ">
                                        <p class="font-weight-bold mb-0">Hotel Name</p>
                                        <p class="small mb-0">Hotel Address</p>
                                        <span class="badge badge-success">4.7 <i class="fas fa-star"></i></span> (62 Ratings)

                                    </div>
                                    <div class="card-footer border-0 px-1 ">
                                        <strong> ₹45</strong> per night <a href="single.php" class="btn btn-outline-info btn-sm float-right mb-2">View Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $n++;
                        }
                        ?>


                    </div>
                    <button class="btn btn-primary leftLst"><</button>
                    <button class="btn btn-primary rightLst">></button>
                </div>
            </div>

        </div>
    </section>
    @foreach($room as $k => $val)
    <!-- Payment -->
    <div class="modal fade" id="RoomsModal{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Book {{$val->name}}</h5>
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
                </div>
                <div class="modal-body">
                    <div class="input-group input-daterange">
                        <input type="text" class="form-control" id="from_Date" value="2012-04-05">
                        <div class="input-group-addon">to</div>
                        <input type="text" class="form-control" id="to_Date" value="2012-04-19">
                    </div>
                    <br>
                    <label class="header-label">No. of Guests</label>
                        <select class="form-control" id="guests">
                            <option>Select No. of Guests</option>
                            @for($i=1; $i <= $val->max_guest; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="PAyButton{{$val->id}}">Pay ₹{{$val->custom_price}}</button>
                    <script>
                        $('body').on('click', '#PAyButton{{$val->id}}', function(e){
                            // var totalAmount = $(this).attr("data-price");
                            // var product_id =  $(this).attr("data-id");
                            var amout = {{$val->custom_price}};
                            var options = {
                                "key": "rzp_test_nxBLUAby2SYB94",
                                "amount": (amout*100),
                                "name": "{{$value->name}}",
                                "description": "{{$val->name}}",
                                "image": "/images/logo/logo.png",
                                "handler": function (response){
                                    console.log($("#from_Date").val(),$("#to_Date").val())
                                    var dateAr = $("#from_Date").val().split('/');
                                    var from = dateAr[2] + '-' + dateAr[0] + '-' + dateAr[1];
                                    var dateTo = $("#to_Date").val().split('/');
                                    var to = dateTo[2] + '-' + dateTo[0] + '-' + dateTo[1];
                                    $.ajax({
                                        url: "{{url('/')}}/api/payment",
                                        type: 'post',
                                        dataType: 'json',
                                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                        data: {
                                            razorpay_payment_id: response.razorpay_payment_id ,
                                            price : {{$val->custom_price}} ,
                                            room_id : {{$val->id}},
                                            prop_id : {{$value->id}},
                                            user_id: {{Auth::user()->id}},
                                            from_date: from,
                                            to_date: to,
                                            guests: $("#guests").val(),
                                        },
                                        success: function (msg) {
                                            if(msg['success'] = 1) {
                                                alert("Booking Successful");
                                                window.location.href = "{{url('/')}}/razor-thank-you";
                                            }
                                        }
                                    });
                                    // alert(response.razorpay_payment_id)
                                    // console.log(response);
                                },
                                "prefill": {
                                    "contact": "{{Auth::user()->contact}}",
                                    "email":   '{{Auth::user()->email}}',
                                },
                                "theme": {
                                    "color": "#500075"
                                }
                            };
                            var rzp1 = new Razorpay(options);
                            rzp1.open();
                            e.preventDefault();
                        });
                        /*document.getElementsClass('buy_plan1').onclick = function(e){
                        rzp1.open();
                        e.preventDefault();
                        }*/
                    </script>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endforeach
@endsection
