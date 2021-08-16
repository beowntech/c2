
<section class="promo-box">
    <div class="container py-2">
        <div class="row">
            <div class="col text-center align-self-center">
                <img src="assets/images/alot90x90.png" class="single-icon" alt=""> <h2 class="d-inline-block"> Increase your business with Alot </h2> <a href="#" class="btn btn-white">Let's Start</a>
            </div>
        </div>
    </div>
</section>

<section id="footer">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-2">
                <p class="font-weight-bold">Important Links</p>
                <ul class="list-unstyled">
                    <li><a href=""> About Us</a></li>
                    <li><a href="">Career</a></li>
                    <li><a href=""> Legal Agreement</a></li>
                    <li><a href=""> Terms & Conditions</a></li>
                    <li><a href=""> Contact</a></li>
                    <li><a href=""> Support</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <p class="font-weight-bold">Hotels</p>
                <ul class="list-unstyled">
                    <li><a href=""> Hotels in Dehradun</a></li>
                    <li><a href=""> Hotels in Chopta</a></li>
                    <li><a href=""> Hotels in Rishikesh</a></li>
                    <li><a href=""> Hotels in Haridwar</a></li>
                    <li><a href=""> Hotels in Kedarnath</a></li>
                    <li><a href=""> Hotels in Auli</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <p class="font-weight-bold">Treks</p>
                <ul class="list-unstyled">
                    <li><a href=""> Treks in Dehradun</a></li>
                    <li><a href=""> Treks in Chopta</a></li>
                    <li><a href=""> Treks in Rishikesh</a></li>
                    <li><a href=""> Treks in Haridwar</a></li>
                    <li><a href=""> Treks in Kedarnath</a></li>
                    <li><a href=""> Treks in Auli</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <p class="font-weight-bold">Contact Details</p>
                <ul class="list-unstyled">
                    <li><a href=""><i class="fas fa-map-marker-alt"></i> Sandhu Center, Saharanpur Road, Dehradun, Uttarakhand 248001</a></li>
                    <li><a href="mailto:contact@alotstays.com"><i class="fas fa-envelope"></i> contact@alotstays.com</a></li>
                    <li><a href="tel: +91 956325698"><i class="fas fa-phone-volume"></i> +91 956325698</a></li>
                </ul>

            </div>

            <div class="col-md-3">
                <p class="font-weight-bold">Download OYO app for exciting offers.</p>
                <img src="assets/images/site/app.png" width="80%" alt="">
                <p class="font-weight-bold mt-3">Our Social media</p>
                <div class="social-footer">
                    <a href="#"><i class="fa fa-facebook-official"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>

                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="bg-primarybg">
    <div class="container-fluid py-1">
        <div class="row">
            <div class="col-md-6 align-self-center">
                <p class="text-white mb-0">© 2020 Alot. All Right Reserved</p>
            </div>
            <div class="col-md-6 text-center align-self-center">

            </div>
        </div>
    </div>
</section>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src='https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script>
<script src="https://use.fontawesome.com/5ac93d4ca8.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src='https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script>
<script src="{{asset('alorfront/assets/js/extention/choices.js')}}"></script>
<script src="{{asset('alotfront/assets/js/extention/flatpickr.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $('.input-daterange input').each(function() {
        $(this).datepicker('clearDates');
    });
    $(document).ready(function () {
        var itemsMainDiv = ('.MultiCarousel');
        var itemsDiv = ('.MultiCarousel-inner');
        var itemWidth = "";

        $('.leftLst, .rightLst').click(function () {
            var condition = $(this).hasClass("leftLst");
            if (condition)
                click(0, this);
            else
                click(1, this)
        });

        ResCarouselSize();




        $(window).resize(function () {
            ResCarouselSize();
        });

        //this function define the size of the items
        function ResCarouselSize() {
            var incno = 0;
            var dataItems = ("data-items");
            var itemClass = ('.item');
            var id = 0;
            var btnParentSb = '';
            var itemsSplit = '';
            var sampwidth = $(itemsMainDiv).width();
            var bodyWidth = $('body').width();
            $(itemsDiv).each(function () {
                id = id + 1;
                var itemNumbers = $(this).find(itemClass).length;
                btnParentSb = $(this).parent().attr(dataItems);
                itemsSplit = btnParentSb.split(',');
                $(this).parent().attr("id", "MultiCarousel" + id);


                if (bodyWidth >= 1200) {
                    incno = itemsSplit[3];
                    itemWidth = sampwidth / incno;
                }
                else if (bodyWidth >= 992) {
                    incno = itemsSplit[2];
                    itemWidth = sampwidth / incno;
                }
                else if (bodyWidth >= 768) {
                    incno = itemsSplit[1];
                    itemWidth = sampwidth / incno;
                }
                else {
                    incno = itemsSplit[0];
                    itemWidth = sampwidth / incno;
                }
                $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
                $(this).find(itemClass).each(function () {
                    $(this).outerWidth(itemWidth);
                });

                $(".leftLst").addClass("over");
                $(".rightLst").removeClass("over");

            });
        }


        //this function used to move the items
        function ResCarousel(e, el, s) {
            var leftBtn = ('.leftLst');
            var rightBtn = ('.rightLst');
            var translateXval = '';
            var divStyle = $(el + ' ' + itemsDiv).css('transform');
            var values = divStyle.match(/-?[\d\.]+/g);
            var xds = Math.abs(values[4]);
            if (e == 0) {
                translateXval = parseInt(xds) - parseInt(itemWidth * s);
                $(el + ' ' + rightBtn).removeClass("over");

                if (translateXval <= itemWidth / 2) {
                    translateXval = 0;
                    $(el + ' ' + leftBtn).addClass("over");
                }
            }
            else if (e == 1) {
                var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                translateXval = parseInt(xds) + parseInt(itemWidth * s);
                $(el + ' ' + leftBtn).removeClass("over");

                if (translateXval >= itemsCondition - itemWidth / 2) {
                    translateXval = itemsCondition;
                    $(el + ' ' + rightBtn).addClass("over");
                }
            }
            $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
        }

        //It is used to get some elements from btn
        function click(ell, ee) {
            var Parent = "#" + $(ee).parent().attr("id");
            var slide = $(Parent).attr("data-slide");
            ResCarousel(ell, Parent, slide);
        }

    });


</script>
{{--<script>--}}
{{--    flatpickr(".datepicker",--}}
{{--        {});--}}

{{--</script>--}}
{{--<script>--}}
{{--    const choices = new Choices('[data-trigger]',--}}
{{--        {--}}
{{--            searchEnabled: false,--}}
{{--            itemSelectText: '',--}}
{{--        });--}}

{{--</script>--}}
<script>

    $('#searchByName').selectize({
        sortField: 'text',
    });

    $('#lightSlider').lightSlider({
        gallery: true,
        item: 1,
        loop: true,
        slideMargin: 0,
        thumbItem: 9
    });

    // Select all links with hashes
    $('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function(event) {
// On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function() {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        };
                    });
                }
            }
        });

    $(document).ready(function () {
        if("{{Request::get('catg')}}" !== ""){
            loadCategories("{{strtoupper(Request::get('catg'))}}");
        }else if("{{$city ?? ''}}" !== ""){
            loadCategories(0,"{{$city ?? ''}}");
        }else if("{{Request::get('catg')}}" && "{{$city ?? ''}}" !== ""){
            loadCategories("{{strtoupper(Request::get('catg'))}}","{{$city ?? ''}}");
        }else{
            loadCategories(0);
        }
        // let data = null;
        $('.choose-input[type=checkbox]').change(function (e) {
            if(this.checked) {
                loadCategories($(this).attr("id"));
                deleteCategories(0);
            }else{
                deleteCategories($(this).attr("delete_value"));
            }
            let seasoning = '';
            let tempArray = [];
            var ids = '', IDSArray = [];
            $('.choose-input:checked').each(function(){
                tempArray.push($(this).val());
                // IDSArray.push($(this).attr("id"));
            })
            if(tempArray.length !== 0){
                seasoning+='catg='+tempArray.toString();
                tempArray = [];
            }
            else{
                loadCategories(0);
            }
            if(IDSArray.length !== 0){
                ids+=IDSArray.toString();
                IDSArray = [];
            }
            // $('input[name="seasoning[]"]:checked').each(function(){
            //     tempArray.push($(this).val());
            // })
            // if(tempArray.length !== 0){
            //     seasoning+='&seasoning='+tempArray.toString();
            // }
            // if(data !== null) {
            //     var refresh = window.location.protocol + "//" + window.location.host + window.location.pathname + '?' + seasoning + '&name=' + data;
            //     history.replaceState({path: refresh}, '', refresh);
            // }else{
            //     // var refresh = window.location.protocol + "//" + window.location.host + window.location.pathname + '?' + seasoning;
                history.replaceState(null, null, "{{request()->segment(count(request()->segments()))}}?"+seasoning);
            // }
            // history.replaceState({path: refresh}, '', refresh);
            console.log('example.com?'+seasoning);

        });

        // $('#searchByName').on('change', function() {
        //
        //     var split = this.value.split(",");
        //
        //     data = split[1];
        //
        //     if(data == ""){
        //         loadCategories(0);
        //     }
        //     else
        //     {
        //         $.ajax({
        //             url: "/api/properties/byname",
        //             type: 'GET',
        //             data: {'data': split[0]},
        //             success: function (responses) {
        //                 $("#MainData").empty();
        //                 console.log(responses);
        //                 var refresh = window.location.protocol + "//" + window.location.host + window.location.pathname + '?' + seasoning + '&name='+data;
        //                 history.pushState({path: refresh}, '', refresh);
        //                 for (var i = 0; i < responses[0].length; i++) {
        //                     $("#MainData").append('<div id="ID' + data + '" class="row border my-2 py-1"><div class="col-md-4"><img src="images/' + responses[0][i].children[0].featured + '" width="100%" alt=""></div><div class="col-md-8"><div class="card border-0"><div class="card-header bg-transparent border-0 font-weight-bold">' + responses[0][i].name + '</div><div class="card-body py-1"><p class="mb-0">Address,' + responses[0][i].address + ", " + responses[0][i].from_city[0].name + ", " + responses[0][i].from_state[0].name + '</p><span class="badge badge-success">4.7<i class="fas fa-star"></i></span> (62Ratings)<p><i class="fas fa-star"></i></p><div class="card-footer bg-transparent border-0"><strong>₹45 </strong>per room per night<a href="/property/' + responses[0][i].id + '" class="btn btn-outline-info btn-sm float-right">ViewDetail</a></div></div></div></div>');
        //                 }
        //             }
        //         });
        //     }
        // });

    });

    function loadCategories(data, city) {
        $.ajax({
            url: "/api/properties/bycategory",
            type: 'GET',
            data: {'data': data,
                   'city': city},
            success: function(responses) {
                console.log(responses);
                console.log(data);
                if(data != 0) {
                    data = data.replace(/\s/g, '_');
                }
                data = data.toString().toUpperCase();
                if(responses.length !== 0) {
                    $("#MainData").show();
                    $("#NoData").hide();
                    $("#REmoveID" + data).remove();
                    // var json_obj = $.parseJSON(response);
                    for (let v = 0; v < responses.length; v++) {
                        for (let i = 0; i < responses[v].length; i++){
                            $("#MainData").prepend('<div id="ID' + data + '" class="row border my-2 py-1"><div class="col-md-4"><img style="height: 100%" src="/property/images/' + responses[v][i].children[0].featured + '" width="100%" alt=""></div><div class="col-md-8"><div class="card border-0"><div class="card-header bg-transparent border-0 font-weight-bold">' + responses[v][i].name + '</div><div class="card-body py-1"><p class="mb-0">Address,' + responses[v][i].address + ", " + responses[v][i].from_city[0].name + ", " + responses[v][i].from_state[0].name + '</p><span class="badge badge-success">4.7<i class="fas fa-star"></i></span> (62Ratings)<p><i class="fas fa-star"></i></p><div class="card-footer bg-transparent border-0"><strong>₹45 </strong>per room per night<a href="/property/'+responses[v][i].catg[0].name.toLowerCase().replace(' ','_')+'-in-'+responses[v][i].from_city[0].name+'/'+responses[v][i].name.toLowerCase().replace(' ','-') + '" class="btn btn-outline-info btn-sm float-right">ViewDetail</a></div></div></div></div>');
                    }
                }
                }else{
                    $("#MainData").hide();
                    $("#NoData").show();
                }
            }
        });
    }
    function deleteCategories(value) {
        let list = document.querySelectorAll("#ID"+value);
        for (let i = 0; i < list.length; i++) {
            list[i].remove();
        }
    }
    $("#searchbtn").click(function () {
var text = $("#search").val();

        $.ajax({
            url: "/api/search/check",
            type: 'GET',
            data: {'data': text},
            success: function(responses) {
                if(responses['data'] === "property"){
                    window.location = "/property/" + responses['success'];
                }else if(responses['data'] === "city"){
                    window.location = "/search" + responses['success'];
                }else if(responses['data'] === "aminity"){
                    window.location = "/search" + responses['success'];
                }
            }
        });
    });
    $(document).ready(function(){
        // Check Radio-box
        $(".rating input:radio").attr("checked", false);

        $('.rating input').click(function () {
            $(".rating span").removeClass('checked');
            $(this).parent().addClass('checked');
        });

        $('input:radio').change(
            function(){
                var userRating = this.value;
                alert(userRating);
            });
        $("#addTestNow").click(function () {
            document.getElementById('noTest').style.display = 'none';
            document.getElementById('addTest').style.display = 'block';
        })
        $("#cancelTest").click(function () {
            document.getElementById('noTest').style.display = 'block';
            document.getElementById('addTest').style.display = 'none';
        })
    });
    $(document).ready(function() {

        $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

            var data_id = '';

            if (typeof $(this).data('id') !== 'undefined') {

                data_id = $(this).data('id');
            }

            $('#my_element_id').val(data_id);
        })
    });
</script>

