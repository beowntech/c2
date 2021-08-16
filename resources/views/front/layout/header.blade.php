<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/images/admission-jockey-logo.png">
    <link rel="shortcut icon" href="/assets/images/admission-jockey-logo.png" type="image/x-icon">
    <link rel="icon" href="/assets/images/admission-jockey-logo.png" type="image/x-icon">

    @if (trim($__env->yieldContent('show')))
        <meta name="description" content="@yield('description')"/>
        <link rel="canonical" href="@yield('canonical')"/>
        <meta property="og:locale" content="en_US"/>
        <meta property="og:type" content="@yield('title')"/>
        <meta property="og:title" content="@yield('title')"/>
        <meta property="og:description" content="@yield('description')"/>
        <meta property="og:main_focus_keyword" content="@yield('keyword')"/>
        <meta property="og:url" content="@yield('seo_url')"/>
        <meta property="og:site_name" content="Admission Jockey"/>
        <meta property="article:published_time" content="@yield('published_on')"/>
        <meta property="article:modified_time" content="@yield('updated_on')"/>
        <meta property="og:image" content="@yield('featured')"/>
        <meta property="og:image:width" content="750"/>
        <meta property="og:image:height" content="550"/>
        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="twitter:label1" content="Written by">
        <meta name="twitter:data1" content="@yield('author_name')">
        <meta name="twitter:label2" content="Est. reading time">
        <meta name="twitter:data2" content="@yield('reading_time')">
            @if(isset($schema))
            {!! $schema !!}
                @endif
@endif

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-J657B829VD"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());

            gtag('config', 'G-J657B829VD');
        </script>


        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0"
              crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/0bee4dcff2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{asset('assets/css/selectize.bootstrap4.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/menucss.css')}}">
        <link rel="stylesheet" href="{{asset('assets/dist/simple-lightbox.css?v2.4.1')}}"/>
        <link rel="stylesheet" href="{{asset('assets/css/jquery.datatable.min.css')}}">
        <title>Best College Finding Website - Admission Jockey </title>
        <style>
            .selectize-input {
                height: 35px !important;
            }

            .sl-overlay {
                background: #000 !important;
            }

            .sl-counter {
                color: white !important;
            }

            .sl-prev, .sl-next, .sl-close {
                color: white !important;
            }

            .liveSearch {
                position: absolute;
                width: 93%;
                background: white;
                padding: 20px;
                margin-top: 36px;
                border: white;
                border-bottom-right-radius: 10px !important;
                margin-left: 4px !important;
                border-bottom-left-radius: 10px !important;
            }

            .liveSearch ul {
                list-style-type: none;
                float: left;
            }

            .liveSearch ul li a {
                color: black;
                float: left;
                padding: 10px 0px;
                text-decoration: none;
            }

            .liveSearch ul li {
                padding: 0px 10px;
            }

            .liveSearchExam {
                position: absolute;
                width: 93%;
                background: white;
                padding: 20px;
                margin-top: 36px;
                border: white;
                border-bottom-right-radius: 10px !important;
                margin-left: 4px !important;
                border-bottom-left-radius: 10px !important;
            }

            .liveSearchExam ul {
                list-style-type: none;
                float: left;
            }

            .liveSearchExam ul li a {
                color: black;
                float: left;
                padding: 10px 0px;
                text-decoration: none;
            }

            .liveSearchExam ul li {
                padding: 0px 10px;
            }

            .selectize-input {
                height: 35px !important;
            }

            .liveSearch {
                position: absolute;
                width: 93%;
                background: white;
                padding: 20px;
                margin-top: 36px;
                border: white;
                border-bottom-right-radius: 10px !important;
                margin-left: 4px !important;
                border-bottom-left-radius: 10px !important;
            }

            .liveSearch ul {
                list-style-type: none;
                float: left;
            }

            .liveSearch ul li a {
                color: black;
                float: left;
                padding: 10px 0px;
                text-decoration: none;
            }

            .liveSearch ul li {
                padding: 0px 10px;
            }

            .ratings {
                border: none;
                float: left;
            }

            .ratings > input {
                display: none;
            }

            .ratings > label:before {
                margin: 5px;
                font-size: 1.25em;
                font-family: "Font Awesome 5 Free";
                display: inline-block;
                content: "\f005";
                font-weight: 900;
            }

            .ratings > .half:before {
                content: "\f089";
                position: absolute;
            }

            .ratings > label {
                color: #ddd;
                float: right;
            }

            .ratings > input:checked ~ label,
            .ratings:not(:checked) > label:hover,
            .ratings:not(:checked) > label:hover ~ label {
                color: #FFD700;
            }

            .ratings > input:checked + label:hover,
            .ratings > input:checked ~ label:hover,
            .ratings > label:hover ~ input:checked ~ label,
            .ratings > input:checked ~ label:hover ~ label {
                color: #FFED85;
            }

            .form-control {
                border: 1px solid #dddddd;
                border-radius: 3px;
                padding: 10px 20px;
                -webkit-box-shadow: none;
                box-shadow: none;
                font-size: 14px;
                font-weight: 400;
                color: #999999;
                background-clip: inherit !important;
            }

            .form-group {
                margin-bottom: 1rem;
            }

            /* Common */
            body {
                overflow-x: hidden;
                font-size: 16px;
                color: #2F2F2F;
                font-family: 'Gotham', Arial;
                background: #eee
            }

            h1, h2, h3, h4, h5, h6 {
                font-family: 'Gotham', Arial
            }

            ul {
                list-style: none;
                padding: 0
            }

            /** UI Slider **/
            .ui-progressbar {
                height: 2em;
                text-align: left;
                overflow: hidden
            }

            .ui-progressbar .ui-progressbar-value {
                margin: -1px;
                height: 100%
            }

            .ui-progressbar-indeterminate .ui-progressbar-value {
                background-image: none
            }

            .ui-selectable {
                -ms-touch-action: none;
                touch-action: none
            }

            .ui-selectable-helper {
                position: absolute;
                z-index: 100;
                border: 1px dotted black
            }

            .ui-selectmenu-menu {
                padding: 0;
                margin: 0;
                position: absolute;
                top: 0;
                left: 0;
                display: none
            }

            .ui-selectmenu-menu .ui-menu {
                overflow: auto;
                overflow-x: hidden;
                padding-bottom: 1px
            }

            .ui-selectmenu-open {
                display: block
            }

            .ui-selectmenu-text {
                display: block;
                margin-right: 20px;
                overflow: hidden;
                text-overflow: ellipsis
            }

            .ui-selectmenu-button.ui-button {
                text-align: left;
                white-space: nowrap;
                width: 14em
            }

            .ui-selectmenu-icon.ui-icon {
                float: right;
                margin-top: 0
            }

            .ui-slider {
                position: relative;
                text-align: left
            }

            .ui-slider .ui-slider-handle {
                position: absolute;
                z-index: 2;
                width: 1.2em;
                height: 1.2em;
                cursor: default;
                -ms-touch-action: none;
                touch-action: none
            }

            .ui-slider .ui-slider-range {
                position: absolute;
                z-index: 1;
                font-size: .7em;
                display: block;
                border: 0;
                background-position: 0 0
            }

            .ui-slider.ui-state-disabled .ui-slider-handle, .ui-slider.ui-state-disabled .ui-slider-range {
                filter: inherit
            }

            .ui-slider-horizontal {
                height: .8em
            }

            .ui-slider-horizontal .ui-slider-handle {
                top: -.3em;
                margin-left: -.6em
            }

            .ui-slider-horizontal .ui-slider-range {
                top: 0;
                height: 100%
            }

            /** UI Slider **/

            /* Widget Theming */
            #widget {
                margin: 50px auto;
            }

            #widget .wid_left {
                width: calc(100% - 355px);
            }

            #widget .wid_left .form-group {
                margin-bottom: 80px
            }

            #widget .wid_left .form-group label {
                margin: 0;
                font-size: 18px;
                font-weight: 500; /* color: #212529; */
            }

            #widget .wid_left .form-group .range_indicator {
                display: flex;
                justify-content: space-between
            }

            #widget .wid_left .form-group .range_indicator .indi_rgt {
                font-size: 16px;
                font-weight: 500; /* color: #212529; */
            }

            #widget .wid_left .form-group label > span {
                font-size: 14px;
                font-weight: 400
            }

            #widget .wid_right {
                width: 275px;
                margin-left: 80px;
                background: #fff;
                border-radius: 20px;
                padding: 0px 20px 40px;
                text-align: center;
            }

            #widget .wid_right > li {
                font-size: 15px;
            }

            #widget .wid_right > li:last-child {
                text-transform: uppercase
            }

            #widget .wid_right > li:last-child p {
                color: #ff5b00;
                margin-bottom: 0
            }

            #widget .wid_right > li p.smtxt {
                margin: 0;
                font-size: 13px;
                font-weight: 400;
                text-transform: capitalize;
                color: #212529;
            }

            #widget .wid_right > li p {
                display: block;
                margin-bottom: 28px;
                font-size: 21px;
                font-weight: 700;
                color: #4a4a4a
            }

            #widget .wid_right > li p i {
                font-size: 0.8em
            }

            #widget .ui-widget.ui-widget-content {
                background: #b9b9b9;
                border: none;
                -webkit-border-radius: 0px;
                -moz-border-radius: 0px;
                border-radius: 0px;
                height: 13px;
                margin-top: 14px;
            }

            #widget .ui-widget-header {
                background: #ff5b00; /* height: 3px; */
            }

            #widget .ui-slider .ui-slider-handle {
                width: 12px;
                height: 12px;
                cursor: pointer;
                -webkit-border-radius: 0;
                -moz-border-radius: 0;
                border-radius: 40px;
                background: #ff5b00;
                border: none;
                top: -5px;
                outline: none;
            }

            .scalerange {
                display: flex;
                width: calc(100% + 32px);
                justify-content: space-between;
                margin: 0 -15px;
                font-size: 12px;
                color: #4a4a4a
            }

            .scalerange span {
                text-align: center;
                min-width: 35px;
                padding-top: 16px;
                position: relative
            }

            .scalerange span:before {
                content: '';
                background: #a9a9a9;
                display: block;
                width: 1px;
                height: 9px;
                position: absolute;
                top: 7px;
                left: calc(50% - 1px);
            }

            #widget .ui-slider .ui-slider-handle {
                margin-left: -6px;
                box-shadow: 0px 0px 3px black;
            }

            .fix-scroll::-webkit-scrollbar {
                width: 7px;
            }

            .fix-scroll::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px rgb(0 0 0 / 63%);
                border-radius: 14px;
            }

            .fix-scroll::-webkit-scrollbar-thumb {
                border-radius: 14px;
                -webkit-box-shadow: inset 0 0 6px rgb(0 0 0 / 93%);
            }

            .dotbox {
                width: 100%;
                border: 1px dashed #666;
                padding: 16px 0;
                font-size: 14px;
                color: #000;
                cursor: pointer;
                text-shadow: none;
                border-radius: 7px;
            }

            .flexColumnCenterMiddle {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .plus-college {
                position: relative;
                height: 24px;
                width: 24px;
                margin: 10px;
            }

        </style>


<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '538838667302077');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=538838667302077&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

</head>
<body>

<header id="header">
    <div class="container">
        <div class="logo1"><a href="/"><img class="ml-2" src="/assets/images/admission-jockey-logo1.png"
                                            alt="Admission Jockey"></a></div>

        <nav>
            <button class="menu"><span class="icon-bar"></span><span class="icon-bar"></span><span
                    class="icon-bar"></span></button>
            <ul class="px-0 mb-0">

                <li class="sub-links">
                    <button class="close" style="float: right;
    background: none;
    font-size: 3em;
    margin: -40px -15px 0px 5px;
    border: none;">×</button>
                    <div class="more-links colleges">Top Universities</div>
                    <ul>
                        <li class="back"></li>
                        <li class="">
                            <div class="more-links firstLink">Engineering</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><span>Colleges By Degrees</span></div>
                                    <ul>
                                        <li><a href="/search" title="B.Tech.">B.Tech</a></li>
                                        <li><a href="/search" title="M.Tech.">M.Tech.</a></li>
                                        <li><a href="/search" title="B.Arch">B.Arch</a></li>
                                        <li><a href="/search" title="B.Tech + M.Tech">B.Tech + M.Tech</a></li>
                                        <li><a href="/search" title="Diploma">Diploma</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Engineering Colleges By Degrees">View
                                                All</a></li>
                                    </ul>
                                    <div class="heading"><span>Colleges By Location</span></div>
                                    <ul>
                                        <li><a href="/search"
                                               title="Engineering Colleges in Maharashtra">Maharashtra</a></li>
                                        <li><a href="/search" title="Engineering Colleges in Tamil Nadu">Tamil Nadu</a>
                                        </li>
                                        <li><a href="/search" title="Engineering Colleges in Uttar Pradesh">Uttar
                                                Pradesh</a></li>
                                        <li><a href="/search" title="Engineering Colleges in Karnataka">Karnataka</a>
                                        </li>
                                        <li><a href="/search" title="Engineering Colleges in Rajasthan">Rajasthan</a>
                                        </li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Engineering Colleges By Location">View
                                                All</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Popular Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="ABES Engineering College">ABES Engineering College,
                                                Ghaziabad</a></li>
                                        <li><a href="/search" title="Chandigarh University">Chandigarh University,
                                                Chandigarh</a></li>
                                        <li><a href="/search" title="Lovely Professional University">Lovely Professional
                                                University, Phagwara</a></li>
                                        <li><a href="/search" title="K. R. Mangalam University">K. R. Mangalam
                                                University, Gurgaon</a></li>
                                        <li><a href="/search" title="NIMS University">NIMS University, Jaipur</a></li>
                                        <li><a href="/search" title="Graphic Era (Deemed to be University)">Graphic Era
                                                (Deemed to be University), Dehradun</a></li>
                                        <li><a href="/search" title="Institute of Engineering and Management">Institute
                                                of Engineering and Management, Kolkata</a></li>
                                        <li><a href="/search" title="Vivekananda Institute of Technology">Vivekananda
                                                Institute of Technology, Jaipur</a></li>
                                        <li><a href="/search" title="BM Group of Institutions">BM Group of Institutions,
                                                Gurgaon</a></li>
                                        <li><a href="/search" title="United College of Engineering &amp; Research">United
                                                College of Engineering &amp; Research, Greater Noida</a></li>
                                        <li><a href="/search"
                                               title="Global Research Institute of Management &amp; Technology">Global
                                                Research Institute of Management &amp; Technology, Radaur</a></li>
                                        <li><a href="/search" title="Parul University">Parul University, Vadodara</a>
                                        </li>
                                        <li><a href="/search" title="Sanjay Ghodawat University">Sanjay Ghodawat
                                                University, Kolhapur</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Top Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="IIT Kharagpur">IIT Kharagpur</a></li>
                                        <li><a href="/search" title="IIT Delhi">IIT Delhi</a></li>
                                        <li><a href="/search" title="IIT Madras">IIT Madras</a></li>
                                        <li><a href="/search" title="IIT Kanpur">IIT Kanpur</a></li>
                                        <li><a href="/search" title="IISC Bangalore">IISC Bangalore</a></li>
                                        <li><a href="/search" title="IIT Roorkee">IIT Roorkee</a></li>
                                        <li><a href="/search" title="IIT Bombay">IIT Bombay</a></li>
                                        <li><a href="/search" title="BITS Pilani">BITS Pilani</a></li>
                                        <li><a href="/search" title="IIT BHU">IIT BHU</a></li>
                                        <li><a href="/search" title="IIIT Hyderabad">IIIT Hyderabad</a></li>
                                        <li class="view-all"><a href="/search" title="View All Engineering Colleges">View
                                                All</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Management</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><span>Colleges By Degrees</span></div>
                                    <ul>
                                        <li><a href="/search" title="MBA">MBA</a></li>
                                        <li><a href="/search" title="BBA">BBA</a></li>
                                        <li><a href="/search" title="Diploma">Diploma</a></li>
                                        <li><a href="/search" title="PGDM">PGDM</a></li>
                                        <li><a href="/search" title="BBM">BBM</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Management Colleges By Degrees">View
                                                All</a></li>
                                    </ul>
                                    <div class="heading"><span>Colleges By Location</span></div>
                                    <ul>
                                        <li><a href="/search" title="Management Colleges in Maharashtra">Maharashtra</a>
                                        </li>
                                        <li><a href="/search" title="Management Colleges in Tamil Nadu">Tamil Nadu</a>
                                        </li>
                                        <li><a href="/search" title="Management Colleges in Delhi NCR">Delhi NCR</a>
                                        </li>
                                        <li><a href="/search" title="Management Colleges in Karnataka">Karnataka</a>
                                        </li>
                                        <li><a href="/search" title="Management Colleges in Rajasthan">Rajasthan</a>
                                        </li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Management Colleges By Location">View
                                                All</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Popular Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="Mitcon Institute of Management">Mitcon Institute of
                                                Management, Pune</a></li>
                                        <li><a href="/search" title="Institute of Insurance and Risk Management">Institute
                                                of Insurance and Risk Management, Hyderabad</a></li>
                                        <li><a href="/search" title="Shanti Business School">Shanti Business School,
                                                Ahmedabad</a></li>
                                        <li><a href="/search" title="Athena School of Management">Athena School of
                                                Management, Mumbai</a></li>
                                        <li><a href="/search" title="International School of Management Studies">International
                                                School of Management Studies, Pune</a></li>
                                        <li><a href="/search" title="Asia-Pacific Institute of Management">Asia-Pacific
                                                Institute of Management, New Delhi</a></li>
                                        <li><a href="/search"
                                               title="Global Research Institute of Management &amp; Technology">Global
                                                Research Institute of Management &amp; Technology, Radaur</a></li>
                                        <li><a href="/search" title="Parul University">Parul University, Vadodara</a>
                                        </li>
                                        <li><a href="/search" title="Sanjay Ghodawat University">Sanjay Ghodawat
                                                University, Kolhapur</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Top Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="IIM Ahmedabad">IIM Ahmedabad</a></li>
                                        <li><a href="/search" title="IIM Bangalore">IIM Bangalore</a></li>
                                        <li><a href="/search" title="IIM Calcutta">IIM Calcutta</a></li>
                                        <li><a href="/search" title="ISB Hyderabad">ISB Hyderabad</a></li>
                                        <li><a href="/search" title="IIM Lucknow">IIM Lucknow</a></li>
                                        <li><a href="/search" title="XLRI">XLRI</a></li>
                                        <li><a href="/search" title="FMS Delhi">FMS Delhi</a></li>
                                        <li><a href="/search" title="IIM Kozhikode">IIM Kozhikode</a></li>
                                        <li><a href="/search" title="MDI Gurgaon">MDI Gurgaon</a></li>
                                        <li><a href="/search" title="IIFT Delhi">IIFT Delhi</a></li>
                                        <li class="view-all"><a href="/search" title="View All Management Colleges">View
                                                All</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Commerce &amp; Banking</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><span>Colleges By Degrees</span></div>
                                    <ul>
                                        <li><a href="/search" title="B.Com">B.Com</a></li>
                                        <li><a href="/search" title="M.Com">M.Com</a></li>
                                        <li><a href="/search" title="B.Com + M.Com">B.Com + M.Com</a></li>
                                        <li><a href="/search" title="BBM">BBM</a></li>
                                        <li><a href="/search" title="Certificate">Certificate</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Commerce Colleges By Degrees">View
                                                All</a></li>
                                    </ul>
                                    <div class="heading"><span>Colleges By Location</span></div>
                                    <ul>
                                        <li><a href="/search" title="Commerce &amp; Banking Colleges in Delhi">Delhi</a>
                                        </li>
                                        <li><a href="/search" title="Commerce &amp; Banking Colleges inMaharashtra">Maharashtra</a>
                                        </li>
                                        <li><a href="/search" title="Commerce &amp; Banking Colleges inUttar Pradesh">Uttar
                                                Pradesh</a></li>
                                        <li><a href="/search"
                                               title="Commerce &amp; Banking Colleges inHaryana">Haryana</a></li>
                                        <li><a href="/search" title="Commerce &amp; Banking Colleges inAndhra Pradesh">Andhra
                                                Pradesh</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Commerce Colleges By Location">View
                                                All</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Popular Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="Chandigarh University">Chandigarh University,
                                                Chandigarh</a></li>
                                        <li><a href="/search" title="Lovely Professional University">Lovely Professional
                                                University, Phagwara</a></li>
                                        <li><a href="/search" title="K. R. Mangalam University">K. R. Mangalam
                                                University, Gurgaon</a></li>
                                        <li><a href="/search" title="Institute of Business Studies and Research">Institute
                                                of Business Studies and Research, Navi Mumbai</a></li>
                                        <li><a href="/search"
                                               title="Jagannath Institute of Management Sciences -Sector-3, Rohini">Jagannath
                                                Institute of Management Sciences -Sector-3, Rohini, Delhi</a></li>
                                        <li><a href="/search" title="Brainware University">Brainware University,
                                                Kolkata</a></li>
                                        <li><a href="/search" title="Parul University">Parul University, Vadodara</a>
                                        </li>
                                        <li><a href="/search" title="NIMS University">NIMS University, Jaipur</a></li>
                                        <li><a href="/search" title="Graphic Era (Deemed to be University)">Graphic Era
                                                (Deemed to be University), Dehradun</a></li>
                                        <li><a href="/search" title="KL University">KL University, Hyderabad</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Top Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="SRCC Delhi">SRCC Delhi</a></li>
                                        <li><a href="/search" title="LSR Delhi">LSR Delhi</a></li>
                                        <li><a href="/search" title="Loyola College, Chennai">Loyola College,
                                                Chennai</a></li>
                                        <li><a href="/search" title="St.Xaviers College, Mumbai">St.Xaviers College,
                                                Mumbai</a></li>
                                        <li><a href="/search" title="Hindu College, Delhi">Hindu College, Delhi</a></li>
                                        <li><a href="/search" title="St. Joseph's College of Commerce">St. Joseph's
                                                College of Commerce</a></li>
                                        <li><a href="/search" title="Mount Carmel College">Mount Carmel College</a></li>
                                        <li><a href="/search" title="Stella Maris College">Stella Maris College</a></li>
                                        <li><a href="/search" title="Madras Christian College">Madras Christian
                                                College</a></li>
                                        <li><a href="/search" title="Hansraj College Delhi">Hansraj College Delhi</a>
                                        </li>
                                        <li class="view-all"><a href="/search" title="View All Commerce Colleges">View
                                                All</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Medical</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><span>Colleges By Degrees</span></div>
                                    <ul>
                                        <li><a href="/search" title="MBBS">MBBS</a></li>
                                        <li><a href="/search" title="MD (Doctor of Medicine)">MD (Doctor of
                                                Medicine)</a></li>
                                        <li><a href="/search" title="MS (Master of Surgery)">MS (Master of Surgery)</a>
                                        </li>
                                        <li><a href="/search" title="BAMS">BAMS</a></li>
                                        <li><a href="/search" title="BHMS">BHMS</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Medical Colleges By Degree">View All</a>
                                        </li>
                                    </ul>
                                    <div class="heading"><span>Colleges By Location</span></div>
                                    <ul>
                                        <li><a href="/search" title="Medical Colleges in Maharashtra">Maharashtra</a>
                                        </li>
                                        <li><a href="/search" title="Medical Colleges in Tamil Nadu">Tamil Nadu</a></li>
                                        <li><a href="/search" title="Medical Colleges in Delhi NCR">Delhi NCR</a></li>
                                        <li><a href="/search" title="Medical Colleges in Karnataka">Karnataka</a></li>
                                        <li><a href="/search" title="Medical Colleges in Rajasthan">Rajasthan</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Medical Colleges By Location">View
                                                All</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Popular Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="Chandigarh University">Chandigarh University,
                                                Chandigarh</a></li>
                                        <li><a href="/search" title="Lovely Professional University">Lovely Professional
                                                University, Phagwara</a></li>
                                        <li><a href="/search" title="K. R. Mangalam University">K. R. Mangalam
                                                University, Gurgaon</a></li>
                                        <li><a href="/search" title="Vivekananda Institute of Technology">Vivekananda
                                                Institute of Technology, Jaipur</a></li>
                                        <li><a href="/search" title="Marudhar Engineering College">Marudhar Engineering
                                                College, Bikaner</a></li>
                                        <li><a href="/search" title="Dev Bhoomi Group of Institutions">Dev Bhoomi Group
                                                of Institutions, Dehradun</a></li>
                                        <li><a href="/search" title="Kongunadu Arts &amp; Science College">Kongunadu
                                                Arts &amp; Science College, Coimbatore</a></li>
                                        <li><a href="/search" title="Shanti Business School">Shanti Business School,
                                                Ahmedabad</a></li>
                                        <li><a href="/search" title="ABES Engineering College">ABES Engineering College,
                                                Ghaziabad</a></li>
                                        <li><a href="/search" title="I.T.S Dental College, Murad Nagar">I.T.S Dental
                                                College, Murad Nagar, Ghaziabad</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Top Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="AIIMS Delhi">AIIMS Delhi</a></li>
                                        <li><a href="/search" title="CMC Vellore">CMC Vellore</a></li>
                                        <li><a href="/search" title="Armed Forces Medical College">Armed Forces Medical
                                                College</a></li>
                                        <li><a href="/search" title="Kasturba Medical College">Kasturba Medical
                                                College</a></li>
                                        <li><a href="/search" title="Maulana Azad Medical College">Maulana Azad Medical
                                                College</a></li>
                                        <li><a href="/search" title="JIPMER, Puducherry">JIPMER, Puducherry</a></li>
                                        <li><a href="/search" title="Lady Hardinge Medical College">Lady Hardinge
                                                Medical College</a></li>
                                        <li><a href="/search" title="Madras Medical College">Madras Medical College</a>
                                        </li>
                                        <li><a href="/search" title="Government Medical College, Amritsar">Government
                                                Medical College, Amritsar</a></li>
                                        <li><a href="/search" title="B.J. Medical College">B.J. Medical College</a></li>
                                        <li class="view-all"><a href="/search" title="View All Medical Colleges">View
                                                All</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Sciences</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><span>Colleges By Degrees</span></div>
                                    <ul>
                                        <li><a href="/search" title="B.Sc">B.Sc</a></li>
                                        <li><a href="/search" title="M.Sc">M.Sc</a></li>
                                        <li><a href="/search" title="B.Sc + M.Sc">B.Sc + M.Sc</a></li>
                                        <li><a href="/search" title="Diploma">Diploma</a></li>
                                        <li><a href="/search" title="MS (Master of Science)">MS (Master of Science)</a>
                                        </li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Sciences Colleges By Degrees">View
                                                All</a></li>
                                    </ul>
                                    <div class="heading"><span>Colleges By Location</span></div>
                                    <ul>
                                        <li><a href="/search" title="Sciences Colleges in Maharashtra">Maharashtra</a>
                                        </li>
                                        <li><a href="/search" title="Sciences Colleges in Tamil Nadu">Tamil Nadu</a>
                                        </li>
                                        <li><a href="/search" title="Sciences Colleges in Delhi NCR">Delhi NCR</a></li>
                                        <li><a href="/search" title="Sciences Colleges in Uttar Pradesh">Uttar
                                                Pradesh</a></li>
                                        <li><a href="/search" title="Sciences Colleges in Andhra Pradesh">Andhra
                                                Pradesh</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Sciences Colleges By Location">View
                                                All</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Popular Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="Chandigarh University">Chandigarh University,
                                                Chandigarh</a></li>
                                        <li><a href="/search" title="Lovely Professional University">Lovely Professional
                                                University, Phagwara</a></li>
                                        <li><a href="/search" title="Doaba College">Doaba College, Jalandhar</a></li>
                                        <li><a href="/search" title="K. R. Mangalam University">K. R. Mangalam
                                                University, Gurgaon</a></li>
                                        <li><a href="/search" title="Vivekananda Institute of Technology">Vivekananda
                                                Institute of Technology, Jaipur</a></li>
                                        <li><a href="/search" title="Institute of Engineering and Management">Institute
                                                of Engineering and Management, Kolkata</a></li>
                                        <li><a href="/search" title="Dev Bhoomi Group of Institutions">Dev Bhoomi Group
                                                of Institutions, Dehradun</a></li>
                                        <li><a href="/search" title="Kongunadu Arts &amp; Science College">Kongunadu
                                                Arts &amp; Science College, Coimbatore</a></li>
                                        <li><a href="/search" title="JK Lakshmipat University">JK Lakshmipat University,
                                                Jaipur</a></li>
                                        <li><a href="/search" title="Invertis University">Invertis University,
                                                Bareilly</a></li>
                                        <li><a href="/search" title="Parul University">Parul University, Vadodara</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Top Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="St. Stephen's College, Delhi">St. Stephen's
                                                College, Delhi</a></li>
                                        <li><a href="/search" title="Loyola College">Loyola College</a></li>
                                        <li><a href="/search" title="St. Xaviers College">St. Xaviers College</a></li>
                                        <li><a href="/search" title="IMCU Bangalore">IMCU Bangalore</a></li>
                                        <li><a href="/search" title="Madras Christian College">Madras Christian
                                                College</a></li>
                                        <li><a href="/search" title="Stella Maris College">Stella Maris College</a></li>
                                        <li><a href="/search" title="Ramjas College">Ramjas College</a></li>
                                        <li><a href="/search" title="Hansraj College, Delhi">Hansraj College, Delhi</a>
                                        </li>
                                        <li><a href="/search" title="Presidency College">Presidency College</a></li>
                                        <li><a href="/search" title="Fergusson College, Pune">Fergusson College,
                                                Pune</a></li>
                                        <li class="view-all"><a href="/search" title="View All Sciences Colleges">View
                                                All</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Hotel Management</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><span>Colleges By Degrees</span></div>
                                    <ul>
                                        <li><a href="/search" title="BHMS">BHMS</a></li>
                                        <li><a href="/search" title="Diploma">Diploma</a></li>
                                        <li><a href="/search" title="B.Sc.">B.Sc.</a></li>
                                        <li><a href="/search" title="Certificate">Certificate</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Hotel Management Colleges By Degrees">View
                                                All</a></li>
                                    </ul>
                                    <div class="heading"><span>Colleges By Location</span></div>
                                    <ul>
                                        <li><a href="/search" title="Hotel Management Colleges in Maharashtra">Maharashtra</a>
                                        </li>
                                        <li><a href="/search" title="Hotel Management Colleges in Tamil Nadu">Tamil
                                                Nadu</a></li>
                                        <li><a href="/search" title="Hotel Management Colleges in Delhi NCR">Delhi
                                                NCR</a></li>
                                        <li><a href="/search"
                                               title="Hotel Management Colleges in Karnataka">Karnataka</a></li>
                                        <li><a href="/search"
                                               title="Hotel Management Colleges in Rajasthan">Rajasthan</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Hotel Management Colleges By Location">View
                                                All</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Popular Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="Magarpatta Institute of Hospitality Management">Magarpatta
                                                Institute of Hospitality Management, Pune</a></li>
                                        <li><a href="/search" title="Shri Ram Institute">Shri Ram Institute,
                                                Dehradun</a></li>
                                        <li><a href="/search"
                                               title="RIG Institute of Hospitality &amp; Management, Rohini Campus">RIG
                                                Institute of Hospitality &amp; Management, Rohini Campus, New Delhi</a>
                                        </li>
                                        <li><a href="/search"
                                               title="Institute of Hotel Management And Culinary Studies">Institute of
                                                Hotel Management And Culinary Studies, Jaipur</a></li>
                                        <li><a href="/search" title="RIG Institute of Hospitality &amp; Management">RIG
                                                Institute of Hospitality &amp; Management, Greater Noida</a></li>
                                        <li><a href="/search" title="Chandigarh University">Chandigarh University,
                                                Chandigarh</a></li>
                                        <li><a href="/search" title="Lovely Professional University">Lovely Professional
                                                University, Phagwara</a></li>
                                        <li><a href="/search" title="K. R. Mangalam University">K. R. Mangalam
                                                University, Gurgaon</a></li>
                                        <li><a href="/search" title="Brainware University">Brainware University,
                                                Kolkata</a></li>
                                        <li><a href="/search" title="Vivekananda Global University">Vivekananda Global
                                                University, Jaipur</a></li>
                                        <li><a href="/search" title="Parul University">Parul University, Vadodara</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Top Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="IHM Mumbai">IHM Mumbai</a></li>
                                        <li><a href="/search" title="IHM Delhi">IHM Delhi</a></li>
                                        <li><a href="/search" title="IHM Kolkata">IHM Kolkata</a></li>
                                        <li><a href="/search" title="IHM Bangalore">IHM Bangalore</a></li>
                                        <li><a href="/search" title="IIHM Kolkata">IIHM Kolkata</a></li>
                                        <li><a href="/search" title="IHM Chennai">IHM Chennai</a></li>
                                        <li><a href="/search"
                                               title="Dr. Ambedkar Institute of Hotel Management Catering and Nutrition">Dr.
                                                Ambedkar Institute of Hotel Management Catering and Nutrition</a></li>
                                        <li><a href="/search" title="IHMCT Kovalam">IHMCT Kovalam</a></li>
                                        <li><a href="/search"
                                               title="Sadhana Centre for Management and Leadership Development">Sadhana
                                                Centre for Management and Leadership Development</a></li>
                                        <li><a href="/search"
                                               title="Army Institute of Hotel Management and Catering Technology">Army
                                                Institute of Hotel Management and Catering Technology</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Hotel Management Colleges">View All</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Information Technology</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><span>Colleges By Degrees</span></div>
                                    <ul>
                                        <li><a href="/search" title="BCA">BCA</a></li>
                                        <li><a href="/search" title="MCA">MCA</a></li>
                                        <li><a href="/search" title="B.Sc">B.Sc</a></li>
                                        <li><a href="/search" title="Diploma">Diploma</a></li>
                                        <li><a href="/search" title="BCA + MCA">BCA + MCA</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Information Technology Colleges By Degrees">View
                                                All</a></li>
                                    </ul>
                                    <div class="heading"><span>Colleges By Location</span></div>
                                    <ul>
                                        <li><a href="/search" title="Information Technology Colleges in Maharashtra">Maharashtra</a>
                                        </li>
                                        <li><a href="/search" title="Information Technology Colleges in Tamil Nadu">Tamil
                                                Nadu</a></li>
                                        <li><a href="/search" title="Information Technology Colleges in Delhi NCR">Delhi
                                                NCR</a></li>
                                        <li><a href="/search" title="Information Technology Colleges in Karnataka">Karnataka</a>
                                        </li>
                                        <li><a href="/search" title="Information Technology Colleges in Uttar Pradesh">Uttar
                                                Pradesh</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Information Technology Colleges By Location">View
                                                All</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Popular Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="Institute of Management Studies">Institute of
                                                Management Studies, Ghaziabad</a></li>
                                        <li><a href="/search" title="Koshys Group of Institutions">Koshys Group of
                                                Institutions, Bangalore</a></li>
                                        <li><a href="/search"
                                               title="Jagannath Institute of Management Sciences -Sector-3, Rohini">Jagannath
                                                Institute of Management Sciences -Sector-3, Rohini, Delhi</a></li>
                                        <li><a href="/search" title="Chandigarh University">Chandigarh University,
                                                Chandigarh</a></li>
                                        <li><a href="/search" title="Lovely Professional University">Lovely Professional
                                                University, Phagwara</a></li>
                                        <li><a href="/search" title="Vivekananda Institute of Technology">Vivekananda
                                                Institute of Technology, Jaipur</a></li>
                                        <li><a href="/search" title="BM Group of Institutions">BM Group of Institutions,
                                                Gurgaon</a></li>
                                        <li><a href="/search" title="ABES Engineering College">ABES Engineering College,
                                                Ghaziabad</a></li>
                                        <li><a href="/search" title="United College of Engineering &amp; Research">United
                                                College of Engineering &amp; Research, Greater Noida</a></li>
                                        <li><a href="/search"
                                               title="International School of Business and Research - [ISBR Business School], Bangalore">International
                                                School of Business and Research - [ISBR Business School], Bangalore,
                                                Bangalore</a></li>
                                        <li><a href="/search"
                                               title="Global Research Institute of Management &amp; Technology">Global
                                                Research Institute of Management &amp; Technology, Radaur</a></li>
                                        <li><a href="/search" title="Parul University">Parul University, Vadodara</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Top Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="NIT Trichy">NIT Trichy</a></li>
                                        <li><a href="/search" title="NIT Warangal">NIT Warangal</a></li>
                                        <li><a href="/search" title="NIT Mangalore">NIT Mangalore</a></li>
                                        <li><a href="/search" title="University of Hyderabad">University of
                                                Hyderabad</a></li>
                                        <li><a href="/search" title="University of Allahabad">University of
                                                Allahabad</a></li>
                                        <li><a href="/search" title="NIT Calicut">NIT Calicut</a></li>
                                        <li><a href="/search" title="XICA Ahmedabad">XICA Ahmedabad</a></li>
                                        <li><a href="/search" title="HBTI Kanpur">HBTI Kanpur</a></li>
                                        <li><a href="/search" title="VIT Vellore">VIT Vellore</a></li>
                                        <li><a href="/search" title="NIM Mumbai">NIM Mumbai</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Information Technology Colleges">View
                                                All</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Arts &amp; Humanities</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><span>Colleges By Degrees</span></div>
                                    <ul>
                                        <li><a href="/search" title="BA">BA</a></li>
                                        <li><a href="/search" title="MA">MA</a></li>
                                        <li><a href="/search" title="Diploma">Diploma</a></li>
                                        <li><a href="/search" title="PGDM">PGDM</a></li>
                                        <li><a href="/search" title="BBM">BBM</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Arts &amp; Humanities Colleges By Degrees">View
                                                All</a></li>
                                    </ul>
                                    <div class="heading"><span>Colleges By Location</span></div>
                                    <ul>
                                        <li><a href="/search" title="Arts &amp; Humanities Colleges in Maharashtra">Maharashtra</a>
                                        </li>
                                        <li><a href="/search" title="Arts &amp; Humanities Colleges in Tamil Nadu">Tamil
                                                Nadu</a></li>
                                        <li><a href="/search" title="Arts &amp; Humanities Colleges in Delhi NCR">Delhi
                                                NCR</a></li>
                                        <li><a href="/search" title="Arts &amp; Humanities Colleges in Karnataka">Karnataka</a>
                                        </li>
                                        <li><a href="/search" title="Arts &amp; Humanities Colleges in Rajasthan">Rajasthan</a>
                                        </li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Arts &amp; Humanities Colleges By Location">View
                                                All</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Popular Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="Lovely Professional University">Lovely Professional
                                                University, Phagwara</a></li>
                                        <li><a href="/search" title="Brainware University">Brainware University,
                                                Kolkata</a></li>
                                        <li><a href="/search" title="Vivekananda Global University">Vivekananda Global
                                                University, Jaipur</a></li>
                                        <li><a href="/search" title="Parul University">Parul University, Vadodara</a>
                                        </li>
                                        <li><a href="/search" title="Karnavati University">Karnavati University,
                                                Gandhinagar</a></li>
                                        <li><a href="/search" title="NIMS University">NIMS University, Jaipur</a></li>
                                        <li><a href="/search" title="Sanjay Rungta Group of Institutions">Sanjay Rungta
                                                Group of Institutions, Bhilai</a></li>
                                        <li><a href="/search" title="Graphic Era (Deemed to be University)">Graphic Era
                                                (Deemed to be University), Dehradun</a></li>
                                        <li><a href="/search" title="Sri Balaji PG Mahavidyalaya">Sri Balaji PG
                                                Mahavidyalaya, Jaipur</a></li>
                                        <li><a href="/search" title="GITAM (Deemed To Be University)">GITAM (Deemed To
                                                Be University), Visakhapatnam</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Top Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="LSR Delhi">LSR Delhi</a></li>
                                        <li><a href="/search" title="Loyola College">Loyola College</a></li>
                                        <li><a href="/search" title="St. Xaviers School">St. Xaviers School</a></li>
                                        <li><a href="/search" title="Miranda House, Delhi">Miranda House, Delhi</a></li>
                                        <li><a href="/search" title="Presidency College, Berhampur">Presidency College,
                                                Berhampur</a></li>
                                        <li><a href="/search" title="Madras Christian College">Madras Christian
                                                College</a></li>
                                        <li><a href="/search" title="Hindu College, DU">Hindu College, DU</a></li>
                                        <li><a href="/search" title="Hansraj College, DU">Hansraj College, DU</a></li>
                                        <li><a href="/search" title="Fergusson College, Pune">Fergusson College,
                                                Pune</a></li>
                                        <li><a href="/search"
                                               title="K. J. Somaiya College of Arts and Commerce, Mumbai">K. J. Somaiya
                                                College of Arts and Commerce, Mumbai</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Arts &amp; Humanities Colleges">View
                                                All</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Mass Communication</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><span>Colleges By Degrees</span></div>
                                    <ul>
                                        <li><a href="/search"
                                               title="B.J.M.C. (Bachelor of Journalism and Mass Communication)">B.J.M.C.
                                                (Bachelor of Journalism and Mass Communication)</a></li>
                                        <li><a href="/search"
                                               title="M.J.M.C. (Master of Journalism and Mass Communication)">M.J.M.C.
                                                (Master of Journalism and Mass Communication)</a></li>
                                        <li><a href="/search" title="B.M.M. (Bachelor of Mass Media)">B.M.M. (Bachelor
                                                of Mass Media)</a></li>
                                        <li><a href="/search" title="BA">BA</a></li>
                                        <li><a href="/search" title="Diploma">Diploma</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Mass Communication Colleges By Degrees">View
                                                All</a></li>
                                    </ul>
                                    <div class="heading"><span>Colleges By Location</span></div>
                                    <ul>
                                        <li><a href="/search" title="Mass Communication Colleges in Maharashtra">Maharashtra</a>
                                        </li>
                                        <li><a href="/search" title="Mass Communication Colleges in Tamil Nadu">Tamil
                                                Nadu</a></li>
                                        <li><a href="/search" title="Mass Communication Colleges in Delhi NCR">Delhi
                                                NCR</a></li>
                                        <li><a href="/search"
                                               title="Mass Communication Colleges in Karnataka">Karnataka</a></li>
                                        <li><a href="/search"
                                               title="Mass Communication Colleges in Rajasthan">Rajasthan</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Mass Communication Colleges By Location">View
                                                All</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Popular Colleges</span></div>
                                    <ul>
                                        <li><a href="/search"
                                               title="International School of Business &amp; Media, Kolkata">International
                                                School of Business &amp; Media, Kolkata, Kolkata</a></li>
                                        <li><a href="/search" title="St Pauls Institute of Communication Education">St
                                                Pauls Institute of Communication Education, Mumbai</a></li>
                                        <li><a href="/search" title="Koshys Animation &amp; Media School">Koshys
                                                Animation &amp; Media School, Bangalore</a></li>
                                        <li><a href="/search" title="Chandigarh University">Chandigarh University,
                                                Chandigarh</a></li>
                                        <li><a href="/search" title="Lovely Professional University">Lovely Professional
                                                University, Phagwara</a></li>
                                        <li><a href="/search" title="Doaba College">Doaba College, Jalandhar</a></li>
                                        <li><a href="/search" title="K. R. Mangalam University">K. R. Mangalam
                                                University, Gurgaon</a></li>
                                        <li><a href="/search"
                                               title="Jagannath Institute of Management Sciences -Sector-3, Rohini">Jagannath
                                                Institute of Management Sciences -Sector-3, Rohini, Delhi</a></li>
                                        <li><a href="/search" title="Parul University">Parul University, Vadodara</a>
                                        </li>
                                        <li><a href="/search" title="NIMS University">NIMS University, Jaipur</a></li>
                                        <li><a href="/search" title="Parul University">Parul University, Vadodara</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Top Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="LSR Delhi">LSR Delhi</a></li>
                                        <li><a href="/search" title="Asian College of Journalism, Chennai">Asian College
                                                of Journalism, Chennai</a></li>
                                        <li><a href="/search" title="IIMC Delhi">IIMC Delhi</a></li>
                                        <li><a href="/search" title="Xavier Institute of Communication (XIC), Mumbai">Xavier
                                                Institute of Communication (XIC), Mumbai</a></li>
                                        <li><a href="/search"
                                               title="Indian Institute of Journalism &amp; New Media, Bangalore">Indian
                                                Institute of Journalism &amp; New Media, Bangalore</a></li>
                                        <li><a href="/search" title="Madras Christian College, Chennai">Madras Christian
                                                College, Chennai</a></li>
                                        <li><a href="/search" title="SIMC, Pune">SIMC, Pune</a></li>
                                        <li><a href="/search" title="Manorama School of Communication, Kottayam">Manorama
                                                School of Communication, Kottayam</a></li>
                                        <li><a href="/search" title="FTII Pune">FTII Pune</a></li>
                                        <li><a href="/search" title="St. Xaviers School, Mumbai">St. Xaviers School,
                                                Mumbai</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Mass Communication Colleges">View
                                                All</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Nursing</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><span>Colleges By Degrees</span></div>
                                    <ul>
                                        <li><a href="/search" title="General Nursing and Midwifery">G.N.M.</a></li>
                                        <li><a href="/search" title="Auxiliary Nursing and Midwifery">A.N.M.</a></li>
                                        <li><a href="/search" title="B.Sc">B.Sc</a></li>
                                        <li><a href="/search" title="M.Sc">M.Sc</a></li>
                                        <li><a href="/search" title="Diploma">Diploma</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Nursing Colleges By Degrees">View
                                                All</a></li>
                                    </ul>
                                    <div class="heading"><span>Colleges By Location</span></div>
                                    <ul>
                                        <li><a href="/search" title="Nursing Colleges in Maharashtra">Maharashtra</a>
                                        </li>
                                        <li><a href="/search" title="Nursing Colleges in Tamil Nadu">Tamil Nadu</a></li>
                                        <li><a href="/search" title="Nursing Colleges in Delhi NCR">Delhi NCR</a></li>
                                        <li><a href="/search" title="Nursing Colleges in Karnataka">Karnataka</a></li>
                                        <li><a href="/search" title="Nursing Colleges in Rajasthan">Rajasthan</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Nursing Colleges By Location">View
                                                All</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Popular Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="Dev Bhoomi Group of Institutions">Dev Bhoomi Group
                                                of Institutions, Dehradun</a></li>
                                        <li><a href="/search" title="Koshys Group of Institutions">Koshys Group of
                                                Institutions, Bangalore</a></li>
                                        <li><a href="/search" title="Glocal University">Glocal University,
                                                Saharanpur</a></li>
                                        <li><a href="/search" title="Parul University">Parul University, Vadodara</a>
                                        </li>
                                        <li><a href="/search" title="NIMS University">NIMS University, Jaipur</a></li>
                                        <li><a href="/search" title="Shri Ram Murti Smarak Institutions, Bareilly">Shri
                                                Ram Murti Smarak Institutions, Bareilly, Bareilly</a></li>
                                        <li><a href="/search" title="Graphic Era (Deemed to be University)">Graphic Era
                                                (Deemed to be University), Dehradun</a></li>
                                        <li><a href="/search" title="GITAM (Deemed To Be University)">GITAM (Deemed To
                                                Be University), Visakhapatnam</a></li>
                                        <li><a href="/search" title="Ebenezer Group of Institutions">Ebenezer Group of
                                                Institutions, Bangalore</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Top Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="AIIMS Delhi">AIIMS Delhi</a></li>
                                        <li><a href="/search" title="CMS Vellore">CMS Vellore</a></li>
                                        <li><a href="/search" title="Armed Force Medical College, Pune">Armed Force
                                                Medical College, Pune</a></li>
                                        <li><a href="/search" title="JIPMER, Puducherry">JIPMER, Puducherry</a></li>
                                        <li><a href="/search" title="Madras Medical College, Chennai">Madras Medical
                                                College, Chennai</a></li>
                                        <li><a href="/search" title="Government Medical College, Amritsar">Government
                                                Medical College, Amritsar</a></li>
                                        <li><a href="/search" title="CMC Indore">CMC Indore</a></li>
                                        <li><a href="/search"
                                               title="Institute of Postgraduate Medical Education and Research, Kolkata">Institute
                                                of Postgraduate Medical Education and Research, Kolkata</a></li>
                                        <li><a href="/search" title="Government Medical College, Nagpur">Government
                                                Medical College, Nagpur</a></li>
                                        <li><a href="/search" title="NIMS University, Jaipur">NIMS University,
                                                Jaipur</a></li>
                                        <li class="view-all"><a href="/search" title="View All Nursing Colleges">View
                                                All</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="active">
                            <div class="more-links">Agriculture</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><span>Colleges By Degrees</span></div>
                                    <ul>
                                        <li><a href="/search" title="B.Sc">B.Sc</a></li>
                                        <li><a href="/search" title="M.Sc">M.Sc</a></li>
                                        <li><a href="/search" title="Diploma">Diploma</a></li>
                                        <li><a href="/search" title="Certificate">Certificate</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Agriculture Colleges By Degrees">View
                                                All</a></li>
                                    </ul>
                                    <div class="heading"><span>Colleges By Location</span></div>
                                    <ul>
                                        <li><a href="/search"
                                               title="Agriculture Colleges in Maharashtra">Maharashtra</a></li>
                                        <li><a href="/search" title="Agriculture Colleges in Tamil Nadu">Tamil Nadu</a>
                                        </li>
                                        <li><a href="/search" title="Agriculture Colleges in Delhi NCR">Delhi NCR</a>
                                        </li>
                                        <li><a href="/search" title="Agriculture Colleges in Karnataka">Karnataka</a>
                                        </li>
                                        <li><a href="/search" title="Agriculture Colleges in Rajasthan">Rajasthan</a>
                                        </li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Agriculture Colleges By Location">View
                                                All</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Popular Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="Chandigarh University">Chandigarh University,
                                                Chandigarh</a></li>
                                        <li><a href="/search" title="Lovely Professional University">Lovely Professional
                                                University, Phagwara</a></li>
                                        <li><a href="/search" title="K. R. Mangalam University">K. R. Mangalam
                                                University, Gurgaon</a></li>
                                        <li><a href="/search" title="Vivekananda Institute of Technology">Vivekananda
                                                Institute of Technology, Jaipur</a></li>
                                        <li><a href="/search" title="Dev Bhoomi Group of Institutions">Dev Bhoomi Group
                                                of Institutions, Dehradun</a></li>
                                        <li><a href="/search" title="Invertis University">Invertis University,
                                                Bareilly</a></li>
                                        <li><a href="/search"
                                               title="Vignan's Foundation for Science, Technology and Research (Deemed to be University)">Vignan's
                                                Foundation for Science, Technology and Research (Deemed to be
                                                University), Guntur</a></li>
                                        <li><a href="/search" title="Glocal University">Glocal University,
                                                Saharanpur</a></li>
                                        <li><a href="/search"
                                               title="Swami Vivekanand Institute of Engineering &amp; Technology">Swami
                                                Vivekanand Institute of Engineering &amp; Technology, Chandigarh</a>
                                        </li>
                                        <li><a href="/search" title="Brainware University">Brainware University,
                                                Kolkata</a></li>
                                        <li><a href="/search" title="Parul University">Parul University, Vadodara</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Top Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="Indian Agricultural Research Institute, Delhi">Indian
                                                Agricultural Research Institute, Delhi</a></li>
                                        <li><a href="/search"
                                               title="Anbil Dharmalingam Agricultural College and Research Institute, Dindigul">Anbil
                                                Dharmalingam Agricultural College and Research Institute, Dindigul</a>
                                        </li>
                                        <li><a href="/search" title="National Dairy Research Institute, Karnal">National
                                                Dairy Research Institute, Karnal</a></li>
                                        <li><a href="/search" title="College of Technology, Uttarakhand">College of
                                                Technology, Uttarakhand</a></li>
                                        <li><a href="/search" title="Jagannath University, Jaipur">Jagannath University,
                                                Jaipur</a></li>
                                        <li><a href="/search"
                                               title="Central Institute of Fisheries Education (CIFE), Mumbai">Central
                                                Institute of Fisheries Education (CIFE), Mumbai</a></li>
                                        <li><a href="/search" title="Mahatma Jyoti Rao Phoole University">Mahatma Jyoti
                                                Rao Phoole University</a></li>
                                        <li><a href="/search"
                                               title="Jawaharlal Nehru Krishi Vishwa Vidyalaya, Jabalpur">Jawaharlal
                                                Nehru Krishi Vishwa Vidyalaya, Jabalpur</a></li>
                                        <li><a href="/search" title="Vanavarayar Institute of Agriculture, Coimbatore">Vanavarayar
                                                Institute of Agriculture, Coimbatore</a></li>
                                        <li><a href="/search" title="Anand Niketan College of Agriculture, Chandrapur">Anand
                                                Niketan College of Agriculture, Chandrapur</a></li>
                                        <li class="view-all"><a href="/search" title="View All Agriculture Colleges">View
                                                All</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <div class="more-links">Design</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><span>Colleges By Degrees</span></div>
                                    <ul>
                                        <li><a href="/search" title="B.Des">B.Des</a></li>
                                        <li><a href="/search" title="M.Des">M.Des</a></li>
                                        <li><a href="/search" title="Cerificate">Cerificate</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Design Colleges By Degrees">View All</a>
                                        </li>
                                    </ul>
                                    <div class="heading"><span>Colleges By Location</span></div>
                                    <ul>
                                        <li><a href="/search" title="Design Colleges in Maharashtra">Maharashtra</a>
                                        </li>
                                        <li><a href="/search" title="Design Colleges in Tamil Nadu">Tamil Nadu</a></li>
                                        <li><a href="/search" title="Design Colleges in Delhi NCR">Delhi NCR</a></li>
                                        <li><a href="/search" title="Design Colleges in Karnataka">Karnataka</a></li>
                                        <li><a href="/search" title="Design Colleges in Rajasthan">Rajasthan</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Design Colleges By Location">View
                                                All</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Popular Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="International Institute of Fashion Design, Vashi">International
                                                Institute of Fashion Design, Vashi, Navi Mumbai</a></li>
                                        <li><a href="/search" title="Ellen School of Art And Design">Ellen School of Art
                                                And Design, Jaipur</a></li>
                                        <li><a href="/search" title="NSAM Academy of Fashion &amp; Interior Design">NSAM
                                                Academy of Fashion &amp; Interior Design, Navi Mumbai</a></li>
                                        <li><a href="/search"
                                               title="International Institute of Fashion Design, West Delhi">International
                                                Institute of Fashion Design, West Delhi, New Delhi</a></li>
                                        <li><a href="/search" title="International School of Design, Andheri">International
                                                School of Design, Andheri, Mumbai</a></li>
                                        <li><a href="/search" title="Indian Institute of Art &amp; Design">Indian
                                                Institute of Art &amp; Design, Delhi</a></li>
                                        <li><a href="/search" title="LISAA School of Design">LISAA School of Design,
                                                Bangalore</a></li>
                                        <li><a href="/search" title="Unitedworld Institute of Design">Unitedworld
                                                Institute of Design, Gandhinagar</a></li>
                                        <li><a href="/search" title="International Institute of Fashion Design">International
                                                Institute of Fashion Design, Pune</a></li>
                                        <li><a href="/search" title="International College of Fashion">International
                                                College of Fashion, Delhi</a></li>
                                        <li><a href="/search" title="Parul University">Parul University, Vadodara</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Top Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="NID Ahmedabad">NID Ahmedabad</a></li>
                                        <li><a href="/search" title="NIFT Navi Mumbai">NIFT Navi Mumbai</a></li>
                                        <li><a href="/search" title="NIFT New Delhi">NIFT New Delhi</a></li>
                                        <li><a href="/search" title="Pearl Academy">Pearl Academy</a></li>
                                        <li><a href="/search" title="SID Pune">SID Pune</a></li>
                                        <li><a href="/search" title="The Industrial Design Center (IDC), IIT Mumbai">The
                                                Industrial Design Center (IDC), IIT Mumbai</a></li>
                                        <li><a href="/search" title="NIFT Hyderabad">NIFT Hyderabad</a></li>
                                        <li><a href="/search" title="NIFT Bangalore">NIFT Bangalore</a></li>
                                        <li><a href="/search" title="NIFT Chennai">NIFT Chennai</a></li>
                                        <li class="view-all"><a href="/search" title="View All Design Colleges">View
                                                All</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <div class="more-links">Pharmacy</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><span>Colleges By Degrees</span></div>
                                    <ul>
                                        <li><a href="/search" title="B.Pharma">B.Pharma</a></li>
                                        <li><a href="/search" title="M.Pharma">M.Pharma</a></li>
                                        <li><a href="/search" title="B.Pharma+M.Pharma">B.Pharma+M.Pharma</a></li>
                                        <li><a href="/search" title="Pharm.D. (Doctor of Pharmacy)">Pharm.D.</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Pharmacy Colleges By Degrees">View
                                                All</a></li>
                                    </ul>
                                    <div class="heading"><span>Colleges By Location</span></div>
                                    <ul>
                                        <li><a href="/search" title="Pharmacy Colleges in Maharashtra">Maharashtra</a>
                                        </li>
                                        <li><a href="/search" title="Pharmacy Colleges in Tamil Nadu">Tamil Nadu</a>
                                        </li>
                                        <li><a href="/search" title="Pharmacy Colleges in Delhi NCR">Delhi NCR</a></li>
                                        <li><a href="/search" title="Pharmacy Colleges in Karnataka">Karnataka</a></li>
                                        <li><a href="/search" title="Pharmacy Colleges in Andhra Pradesh">Andhra
                                                Pradesh</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Pharmacy Colleges By Location">View
                                                All</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Popular Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="Chandigarh University">Chandigarh University,
                                                Chandigarh</a></li>
                                        <li><a href="/search" title="Lovely Professional University">Lovely Professional
                                                University, Phagwara</a></li>
                                        <li><a href="/search" title="K. R. Mangalam University">K. R. Mangalam
                                                University, Gurgaon</a></li>
                                        <li><a href="/search" title="BM Group of Institutions">BM Group of Institutions,
                                                Gurgaon</a></li>
                                        <li><a href="/search" title="Dev Bhoomi Group of Institutions">Dev Bhoomi Group
                                                of Institutions, Dehradun</a></li>
                                        <li><a href="/search" title="ABSS Institute of Technology">ABSS Institute of
                                                Technology, Meerut</a></li>
                                        <li><a href="/search" title="I.T.S Dental College, Murad Nagar">I.T.S Dental
                                                College, Murad Nagar, Ghaziabad</a></li>
                                        <li><a href="/search" title="Swami Keshvanand Institute of Pharmacy">Swami
                                                Keshvanand Institute of Pharmacy, Bikaner</a></li>
                                        <li><a href="/search" title="Invertis University">Invertis University,
                                                Bareilly</a></li>
                                        <li><a href="/search" title="GITAM (Deemed To Be University)">GITAM (Deemed To
                                                Be University), Hyderabad</a></li>
                                        <li><a href="/search" title="Global Research Institute of Pharmacy">Global
                                                Research Institute of Pharmacy, Radaur</a></li>
                                        <li><a href="/search" title="Parul University">Parul University, Vadodara</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Top Colleges</span></div>
                                    <ul>
                                        <li><a href="/search"
                                               title="National Institute of Pharmaceutical Education and Research, Mohali">National
                                                Institute of Pharmaceutical Education and Research, Mohali</a></li>
                                        <li><a href="/search" title="Institute of Chemical Technology, Mumbai">Institute
                                                of Chemical Technology, Mumbai</a></li>
                                        <li><a href="/search" title="Manipal College of Pharmaceutical Sciences">Manipal
                                                College of Pharmaceutical Sciences</a></li>
                                        <li><a href="/search" title="Bombay College of Pharmacy">Bombay College of
                                                Pharmacy</a></li>
                                        <li><a href="/search" title="JSS College of Pharmacy">JSS College of
                                                Pharmacy</a></li>
                                        <li><a href="/search" title="IIT BHU">IIT BHU</a></li>
                                        <li><a href="/search" title="L. M. College of Pharmacy">L. M. College of
                                                Pharmacy</a></li>
                                        <li><a href="/search" title="BIT Mesra">BIT Mesra</a></li>
                                        <li><a href="/search" title="Goa College of Pharmacy">Goa College of
                                                Pharmacy</a></li>
                                        <li><a href="/search" title="Poona College of Pharmacy">Poona College of
                                                Pharmacy</a></li>
                                        <li class="view-all"><a href="/search" title="View All Pharmacy Colleges">View
                                                All</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Law</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><span>Colleges By Degrees</span></div>
                                    <ul>
                                        <li><a href="/search" title="LLB">LLB</a></li>
                                        <li><a href="/search" title="B.A. + LLB">B.A. + LLB</a></li>
                                        <li><a href="/search" title="LLM">LLM</a></li>
                                        <li><a href="/search" title="B.Com. + LLB">B.Com. + LLB</a></li>
                                        <li><a href="/search" title="BBA + LLB">BBA + LLB</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Pharmacy Colleges By Degrees">View
                                                All</a></li>
                                    </ul>
                                    <div class="heading"><span>Colleges By Location</span></div>
                                    <ul>
                                        <li><a href="/search" title="Law Colleges in Maharashtra">Maharashtra</a></li>
                                        <li><a href="/search" title="Law Colleges in Tamil Nadu">Tamil Nadu</a></li>
                                        <li><a href="/search" title="Law Colleges in Delhi NCR">Delhi NCR</a></li>
                                        <li><a href="/search" title="Law Colleges in Karnataka">Karnataka</a></li>
                                        <li><a href="/search" title="Law Colleges in Uttar Pradesh">Uttar Pradesh</a>
                                        </li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Pharmacy Colleges By Location">View
                                                All</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Popular Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="Chandigarh University">Chandigarh University,
                                                Chandigarh</a></li>
                                        <li><a href="/search" title="Lovely Professional University">Lovely Professional
                                                University, Phagwara</a></li>
                                        <li><a href="/search" title="K. R. Mangalam University">K. R. Mangalam
                                                University, Gurgaon</a></li>
                                        <li><a href="/search" title="Vivekananda Institute of Technology">Vivekananda
                                                Institute of Technology, Jaipur</a></li>
                                        <li><a href="/search" title="Invertis University">Invertis University,
                                                Bareilly</a></li>
                                        <li><a href="/search"
                                               title="International School of Business and Research - [ISBR Business School], Bangalore">International
                                                School of Business and Research - [ISBR Business School], Bangalore,
                                                Bangalore</a></li>
                                        <li><a href="/search" title="GITAM (Deemed To Be University)">GITAM (Deemed To
                                                Be University), Hyderabad</a></li>
                                        <li><a href="/search"
                                               title="Vignan's Foundation for Science, Technology and Research (Deemed to be University)">Vignan's
                                                Foundation for Science, Technology and Research (Deemed to be
                                                University), Guntur</a></li>
                                        <li><a href="/search" title="Glocal University">Glocal University,
                                                Saharanpur</a></li>
                                        <li><a href="/search" title="Brainware University">Brainware University,
                                                Kolkata</a></li>
                                        <li><a href="/search" title="Parul University">Parul University, Vadodara</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Top Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="NLSIU Bangalore">NLSIU Bangalore</a></li>
                                        <li><a href="/search" title="NLU Delhi">NLU Delhi</a></li>
                                        <li><a href="/search" title="NALSAR University of Law, Tamil Nadu">NALSAR
                                                University of Law, Tamil Nadu</a></li>
                                        <li><a href="/search" title="NLIU Bhopal">NLIU Bhopal</a></li>
                                        <li><a href="/search" title="Symbiosis Law School, Noida">Symbiosis Law School,
                                                Noida</a></li>
                                        <li><a href="/search" title="ILS Law College, Pune">ILS Law College, Pune</a>
                                        </li>
                                        <li><a href="/search" title="Gujarat National Law University, Ghandinagar">Gujarat
                                                National Law University, Ghandinagar</a></li>
                                        <li><a href="/search" title="O.P. Jindal Global University">O.P. Jindal Global
                                                University</a></li>
                                        <li><a href="/search" title="NLU Jodhpur">NLU Jodhpur</a></li>
                                        <li><a href="/search" title="Banaras Hindu University, Varanasi">Banaras Hindu
                                                University, Varanasi</a></li>
                                        <li class="view-all"><a href="/search" title="View All Pharmacy Colleges">View
                                                All</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Para Medical</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><span>Colleges By Degrees</span></div>
                                    <ul>
                                        <li><a href="/search" title="Diploma">Diploma</a></li>
                                        <li><a href="/search" title="Bachelor of Medical Lab Technology">B.M.L.T.</a>
                                        </li>
                                        <li><a href="/search" title="Bachelor of Physiotherapy">B.P.T.</a></li>
                                        <li><a href="/search" title="Master of Physiotherapy">M.P.T.</a></li>
                                        <li><a href="/search" title="Bachelor of Optometry">B.Optom.</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Para Medical Colleges Colleges By Degrees">View
                                                All</a></li>
                                    </ul>
                                    <div class="heading"><span>Colleges By Location</span></div>
                                    <ul>
                                        <li><a href="/search"
                                               title="Para Medical Colleges in Maharashtra">Maharashtra</a></li>
                                        <li><a href="/search" title="Para Medical Colleges in Tamil Nadu">Tamil Nadu</a>
                                        </li>
                                        <li><a href="/search" title="Para Medical Colleges in Delhi NCR">Delhi NCR</a>
                                        </li>
                                        <li><a href="/search" title="Para Medical Colleges in Karnataka">Karnataka</a>
                                        </li>
                                        <li><a href="/search" title="Para Medical Colleges in Rajasthan">Rajasthan</a>
                                        </li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Para Medical Colleges Colleges By Location">View
                                                All</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Popular Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="Chandigarh University">Chandigarh University,
                                                Chandigarh</a></li>
                                        <li><a href="/search" title="Lovely Professional University">Lovely Professional
                                                University, Phagwara</a></li>
                                        <li><a href="/search" title="K. R. Mangalam University">K. R. Mangalam
                                                University, Gurgaon</a></li>
                                        <li><a href="/search" title="Kongunadu Arts &amp; Science College">Kongunadu
                                                Arts &amp; Science College, Coimbatore</a></li>
                                        <li><a href="/search" title="I.T.S Dental College, Murad Nagar">I.T.S Dental
                                                College, Murad Nagar, Ghaziabad</a></li>
                                        <li><a href="/search" title="Koshys Group of Institutions">Koshys Group of
                                                Institutions, Bangalore</a></li>
                                        <li><a href="/search" title="GIBS Business School">GIBS Business School,
                                                Bangalore</a></li>
                                        <li><a href="/search"
                                               title="Jagannath Institute of Management Sciences -Sector-3, Rohini">Jagannath
                                                Institute of Management Sciences -Sector-3, Rohini, Delhi</a></li>
                                        <li><a href="/search" title="Glocal University">Glocal University,
                                                Saharanpur</a></li>
                                        <li><a href="/search"
                                               title="Swami Vivekanand Institute of Engineering &amp; Technology">Swami
                                                Vivekanand Institute of Engineering &amp; Technology, Chandigarh</a>
                                        </li>
                                        <li><a href="/search" title="Parul University">Parul University, Vadodara</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Top Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="AIIMS Delhi">AIIMS Delhi</a></li>
                                        <li><a href="/search" title="CMS Vellore">CMS Vellore</a></li>
                                        <li><a href="/search" title="Armed Force Medical College, Pune">Armed Force
                                                Medical College, Pune</a></li>
                                        <li><a href="/search" title="Maulana Azad Medical College">Maulana Azad Medical
                                                College</a></li>
                                        <li><a href="/search" title="JIPMER, Puducherry">JIPMER, Puducherry</a></li>
                                        <li><a href="/search" title="St. Xaviers College">St. Xaviers College</a></li>
                                        <li><a href="/search" title="Madras Medical College">Madras Medical College</a>
                                        </li>
                                        <li><a href="/search"
                                               title="Sri Devaraj Urs Academy of Higher Education and Research">Sri
                                                Devaraj Urs Academy of Higher Education and Research</a></li>
                                        <li><a href="/search"
                                               title="Sri Ramachandra Medical College &amp; Research Institute">Sri
                                                Ramachandra Medical College &amp; Research Institute</a></li>
                                        <li><a href="/search" title="Seth Gordhandas Sunderdas Medical College">Seth
                                                Gordhandas Sunderdas Medical College</a></li>
                                        <li class="view-all"><a href="/search" title="View All Para Medical Colleges">View
                                                All</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Dental</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><span>Colleges By Degrees</span></div>
                                    <ul>
                                        <li><a href="/search" title="BDS">BDS</a></li>
                                        <li><a href="/search" title="MDS">MDS</a></li>
                                        <li><a href="/search" title="Diploma">Diploma</a></li>
                                        <li><a href="/search" title="Certificate">Certificate</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Dental Colleges By Degrees">View All</a>
                                        </li>
                                    </ul>
                                    <div class="heading"><span>Colleges By Location</span></div>
                                    <ul>
                                        <li><a href="/search" title="View All Dental Colleges in Maharashtra">Maharashtra</a>
                                        </li>
                                        <li><a href="/search" title="View All Dental Colleges in Tamil Nadu">Tamil
                                                Nadu</a></li>
                                        <li><a href="/search" title="View All Dental Colleges in Uttar Pradesh">Uttar
                                                Pradesh</a></li>
                                        <li><a href="/search"
                                               title="View All Dental Colleges in Karnataka">Karnataka</a></li>
                                        <li><a href="/search" title="View All Dental Colleges in Andhra Pradesh">Andhra
                                                Pradesh</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Dental Colleges By Location">View
                                                All</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Popular Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="I.T.S Dental College, Murad Nagar">I.T.S Dental
                                                College, Murad Nagar, Ghaziabad</a></li>
                                        <li><a href="/search" title="Karnavati University">Karnavati University,
                                                Gandhinagar</a></li>
                                        <li><a href="/search" title="NIMS University">NIMS University, Jaipur</a></li>
                                        <li><a href="/search" title="Sanjay Rungta Group of Institutions">Sanjay Rungta
                                                Group of Institutions, Bhilai</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Top Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="Maulana Azad Institute of Dental Sciences, Delhi">Maulana
                                                Azad Institute of Dental Sciences, Delhi</a></li>
                                        <li><a href="/search" title="Manipal College of Dental Sciences, Mangalore">Manipal
                                                College of Dental Sciences, Mangalore</a></li>
                                        <li><a href="/search"
                                               title="S.D.M. College of Dental Sciences &amp; Hospital, Karnataka">S.D.M.
                                                College of Dental Sciences &amp; Hospital, Karnataka</a></li>
                                        <li><a href="/search" title="Government Dental College, Mumbai">Government
                                                Dental College, Mumbai</a></li>
                                        <li><a href="/search"
                                               title="A B Shetty Memorial Institute of Dental Sciences, Mangalore">A B
                                                Shetty Memorial Institute of Dental Sciences, Mangalore</a></li>
                                        <li><a href="/search" title="PGIM Rohtak">PGIM Rohtak</a></li>
                                        <li><a href="/search" title="J.K.K. Nattraja Dental College &amp; Hospital">J.K.K.
                                                Nattraja Dental College &amp; Hospital</a></li>
                                        <li><a href="/search" title="Awadh Dental College, Jamshedpur">Awadh Dental
                                                College, Jamshedpur</a></li>
                                        <li><a href="/search"
                                               title="Panineeya Mahavidyala Institute of Dental Sciences and Research Center, Hyderabad">Panineeya
                                                Mahavidyala Institute of Dental Sciences and Research Center,
                                                Hyderabad</a></li>
                                        <li><a href="/search"
                                               title="Purvanchal Institute of dental Sciences, Gorakhpur">Purvanchal
                                                Institute of dental Sciences, Gorakhpur</a></li>
                                        <li class="view-all"><a href="/search" title="View All Dental Colleges">View
                                                All</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Performing Arts</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><span>Colleges By Degrees</span></div>
                                    <ul>
                                        <li><a href="/search" title="B.A.">B.A.</a></li>
                                        <li><a href="/search" title="MA">MA</a></li>
                                        <li><a href="/search" title="Bachelor of Fine Arts">B.F.A.</a></li>
                                        <li><a href="/search" title="Certificate">Certificate</a></li>
                                        <li><a href="/search" title="Diploma">Diploma</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Performing Arts Colleges By Degrees">View
                                                All</a></li>
                                    </ul>
                                    <div class="heading"><span>Colleges By Location</span></div>
                                    <ul>
                                        <li><a href="/search" title="Performing Arts Colleges in Maharashtra">Maharashtra</a>
                                        </li>
                                        <li><a href="/search" title="Performing Arts Colleges in Tamil Nadu">Tamil
                                                Nadu</a></li>
                                        <li><a href="/search" title="Performing Arts Colleges in Delhi NCR">Delhi
                                                NCR</a></li>
                                        <li><a href="/search"
                                               title="Performing Arts Colleges in Karnataka">Karnataka</a></li>
                                        <li><a href="/search"
                                               title="Performing Arts Colleges in Rajasthan">Rajasthan</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Performing Arts Colleges By Location">View
                                                All</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Popular Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="Chandigarh University">Chandigarh University,
                                                Chandigarh</a></li>
                                        <li><a href="/search" title="Lovely Professional University">Lovely Professional
                                                University, Phagwara</a></li>
                                        <li><a href="/search" title="Parul University">Parul University, Vadodara</a>
                                        </li>
                                        <li><a href="/search" title="NIMS University">NIMS University, Jaipur</a></li>
                                        <li><a href="/search" title="Graphic Era (Deemed to be University)">Graphic Era
                                                (Deemed to be University), Dehradun</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Top Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="IIS University, Jaipur">IIS University, Jaipur</a>
                                        </li>
                                        <li><a href="/search" title="Punjab University, Bhatinda">Punjab University,
                                                Bhatinda</a></li>
                                        <li><a href="/search"
                                               title="Kamla Raja Girls Govt. Post-Graduate College, Gwalior">Kamla Raja
                                                Girls Govt. Post-Graduate College, Gwalior</a></li>
                                        <li><a href="/search" title="Odisha School of Business Management">Odisha School
                                                of Business Management</a></li>
                                        <li><a href="/search" title="D.A.V. College for Girls, Yamunanagar">D.A.V.
                                                College for Girls, Yamunanagar</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Performing Arts Colleges">View All</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links lastLink">Education</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><span>Colleges By Degrees</span></div>
                                    <ul>
                                        <li><a href="/search" title="Bachelor of Education">B.Ed.</a></li>
                                        <li><a href="/search" title="Master of Education">M.Ed.</a></li>
                                        <li><a href="/search" title="B.Ed. + M.Ed.">B.Ed. + M.Ed.</a></li>
                                        <li><a href="/search" title="Basic Teacher Certificate">B.T.C.</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Education Colleges By Degrees">View
                                                All</a></li>
                                    </ul>
                                    <div class="heading"><span>Colleges By Location</span></div>
                                    <ul>
                                        <li><a href="/search" title="Education Colleges in Maharashtra">Maharashtra</a>
                                        </li>
                                        <li><a href="/search" title="Education Colleges in Tamil Nadu">Tamil Nadu</a>
                                        </li>
                                        <li><a href="/search" title="Education Colleges in Delhi NCR">Delhi NCR</a></li>
                                        <li><a href="/search" title="Education Colleges in Karnataka">Karnataka</a></li>
                                        <li><a href="/search" title="Education Colleges in Rajasthan">Rajasthan</a></li>
                                        <li class="view-all"><a href="/search"
                                                                title="View All Education Colleges By Location">View
                                                All</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Popular Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="Chandigarh University">Chandigarh University,
                                                Chandigarh</a></li>
                                        <li><a href="/search" title="Lovely Professional University">Lovely Professional
                                                University, Phagwara</a></li>
                                        <li><a href="/search" title="K. R. Mangalam University">K. R. Mangalam
                                                University, Gurgaon</a></li>
                                        <li><a href="/search" title="BM Group of Institutions">BM Group of Institutions,
                                                Gurgaon</a></li>
                                        <li><a href="/search" title="Invertis University">Invertis University,
                                                Bareilly</a></li>
                                        <li><a href="/search" title="Glocal University">Glocal University,
                                                Saharanpur</a></li>
                                        <li><a href="/search"
                                               title="Swami Vivekanand Institute of Engineering &amp; Technology">Swami
                                                Vivekanand Institute of Engineering &amp; Technology, Chandigarh</a>
                                        </li>
                                        <li><a href="/search" title="Symbiosis Centre for Distance Learning ">Symbiosis
                                                Centre for Distance Learning , Pune</a></li>
                                        <li><a href="/search" title="Vivekananda Global University">Vivekananda Global
                                                University, Jaipur</a></li>
                                        <li><a href="/search" title="Mangalmay Group of Institutions">Mangalmay Group of
                                                Institutions, Greater Noida</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><span>Top Colleges</span></div>
                                    <ul>
                                        <li><a href="/search" title="Kasturi Ram College of Higher Education, Delhi">Kasturi
                                                Ram College of Higher Education, Delhi</a></li>
                                        <li><a href="/search" title="Ggs Indraprastha University, Delhi">Ggs
                                                Indraprastha University, Delhi</a></li>
                                        <li><a href="/search" title="LPU Jalandhar">LPU Jalandhar</a></li>
                                        <li><a href="/search" title="Amity University, Lucknow">Amity University,
                                                Lucknow</a></li>
                                        <li><a href="/search" title="BHU Varanasi">BHU Varanasi</a></li>
                                        <li><a href="/search" title="ICFAI University, Dehradun">ICFAI University,
                                                Dehradun</a></li>
                                        <li><a href="/search" title="Lady Irwin College, Delhi">Lady Irwin College,
                                                Delhi</a></li>
                                        <li><a href="/search" title="Kamla Nehru Mahavidyalaya, Bhopal">Kamla Nehru
                                                Mahavidyalaya, Bhopal</a></li>
                                        <li><a href="/search" title="DAV College, Kanpur">DAV College, Kanpur</a></li>
                                        <li class="view-all"><a href="/search" title="View All Education Colleges">View
                                                All</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sub-links">
                    <div class="more-links exams">Top Courses</div>
                    <ul>
                        <li class="back"></li>
                        <li class="active">
                            <div class="more-links firstLink">Engineering</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="JEE Mains">JEE Mains</a></div>
                                    <ul>
                                        <li><a href="/search" title="JEE Mains Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="JEE Mains Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="JEE Mains Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="JEE Mains How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="JEE Mains Previous Year Question Paper">Previous
                                                Year Question Paper</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="JEE Advanced">JEE Advanced</a></div>
                                    <ul>
                                        <li><a href="/search" title="JEE Advanced Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="JEE Advanced Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="JEE Advanced Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="JEE Advanced How to Prepare">How to Prepare</a>
                                        </li>
                                        <li><a href="/search" title="JEE Advanced Previous Year Question Paper">Previous
                                                Year Question Paper</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="BITSAT">BITSAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="BITSAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="BITSAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="BITSAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="BITSAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="BITSAT Mock Test">Mock Test</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="GATE">GATE</a></div>
                                    <ul>
                                        <li><a href="/search" title="GATE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="GATE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="GATE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="GATE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="GATE Mock Test">Mock Test</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="WBJEE">WBJEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="WBJEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="WBJEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="WBJEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="WBJEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="WBJEE Previous Year Question Paper">Previous Year
                                                Question Paper</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Engineering Exams">View
                                        All Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Management</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="CAT">CAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="CAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="CAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="CAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="CAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="CAT Previous Year Question Paper">Previous Year
                                                Question Paper</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="XAT">XAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="XAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="XAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="XAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="XAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="XAT Previous Year Question Paper">Previous Year
                                                Question Paper</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="NMAT">NMAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="NMAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="NMAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="NMAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="NMAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="NMAT Previous Year Question Paper">Previous Year
                                                Question Paper</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="CMAT">CMAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="CMAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="CMAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="CMAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="CMAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="CMAT Previous Year Question Paper">Previous Year
                                                Question Paper</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="MAT">MAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="MAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="MAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="MAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="MAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="MAT Previous Year Question Paper">Previous Year
                                                Question Paper</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="KIITEE Management">KIITEE
                                            Management</a></div>
                                    <ul>
                                        <li><a href="/search" title="Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="How to Prepare">How to Prepare</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Management Exams">View
                                        All Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Commerce &amp; Banking</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="IBPS PO">IBPS PO</a></div>
                                    <ul>
                                        <li><a href="/search" title="IBPS PO Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="IBPS PO Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="IBPS PO Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="IBPS PO How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="IBPS PO Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="SBI PO">SBI PO</a></div>
                                    <ul>
                                        <li><a href="/search" title="SBI PO Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="SBI PO Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="SBI PO Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="SBI PO How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="SBI PO Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="DU JAT">DU JAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="DU JAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="DU JAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="DU JAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="DU JAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="DU JAT Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="CUSAT CAT">CUSAT CAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="CUSAT CAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="CUSAT CAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="CUSAT CAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="CUSAT CAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="CUSAT CAT Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="JMIEE">JMIEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="JMIEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="JMIEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="JMIEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="JMIEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="JMIEE Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Banking Exams">View All
                                        Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Medical</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="NEET UG">NEET UG</a></div>
                                    <ul>
                                        <li><a href="/search" title="NEET UG Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="NEET UG Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="NEET UG Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="NEET UG How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="NEET UG Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="NEET PG">NEET PG</a></div>
                                    <ul>
                                        <li><a href="/search" title="NEET UG Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="NEET UG Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="NEET UG Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="NEET UG How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="NEET UG Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="JIPMER">JIPMER</a></div>
                                    <ul>
                                        <li><a href="/search" title="JIPMER Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="JIPMER Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="JIPMER Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="JIPMER How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="JIPMER Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="AIIMS UG">AIIMS UG</a></div>
                                    <ul>
                                        <li><a href="/search" title="AIIMS UG Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="AIIMS UG Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="AIIMS UG Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="AIIMS UG How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="AIIMS UG Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="AIIMS PG">AIIMS PG</a></div>
                                    <ul>
                                        <li><a href="/search" title="AIIMS PG Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="AIIMS PG Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="AIIMS PG Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="AIIMS PG How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="AIIMS PG Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Medical Exams">View All
                                        Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Sciences</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="KIITEE">KIITEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="KIITEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="KIITEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="KIITEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="KIITEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="KIITEE Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="CUSAT CAT">CUSAT CAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="CUSAT CAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="CUSAT CAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="CUSAT CAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="CUSAT CAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="CUSAT CAT Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="CUCET">CUCET</a></div>
                                    <ul>
                                        <li><a href="/search" title="CUCET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="CUCET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="CUCET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="CUCET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="CUCET Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="GSAT">GSAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="GSAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="GSAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="GSAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="GSAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="GSAT Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="JUET">JUET</a></div>
                                    <ul>
                                        <li><a href="/search" title="JUET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="JUET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="JUET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="JUET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="JUET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Sciences Exams">View All
                                        Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Hotel Management</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="UPSEE">UPSEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="UPSEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="UPSEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="UPSEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="UPSEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="UPSEE Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="LPUNEST">LPUNEST</a></div>
                                    <ul>
                                        <li><a href="/search" title="LPUNEST Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="LPUNEST Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="LPUNEST Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="LPUNEST How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="LPUNEST Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="JMIEE">JMIEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="JMIEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="JMIEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="JMIEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="JMIEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="JMIEE Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="IPU CET">IPU CET</a></div>
                                    <ul>
                                        <li><a href="/search" title="IPU CET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="IPU CET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="IPU CET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="IPU CET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="IPU CET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="SAAT">SAAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="SAAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="SAAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="SAAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="SAAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="SAAT Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Hotel Management Exams">View
                                        All Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Information Technology</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="OJEE">OJEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="OJEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="OJEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="OJEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="OJEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="OJEE Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="KIITEE">KIITEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="KIITEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="KIITEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="KIITEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="KIITEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="KIITEE Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="JNUEE">JNUEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="JNUEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="JNUEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="JNUEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="JNUEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="JNUEE Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="UPSEE">UPSEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="UPSEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="UPSEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="UPSEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="UPSEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="UPSEE Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="VITMEE">VITMEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="UPSEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="UPSEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="UPSEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="UPSEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="UPSEE Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search"
                                                                 title="View All Information Technology Exams">View All
                                        Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Arts &amp; Humanities</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="TISSNET">TISSNET</a></div>
                                    <ul>
                                        <li><a href="/search" title="TISSNET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="TISSNET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="TISSNET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="TISSNET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="TISSNET Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="CUCET">CUCET</a></div>
                                    <ul>
                                        <li><a href="/search" title="CUCET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="CUCET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="CUCET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="CUCET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="CUCET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="JUET">JUET</a></div>
                                    <ul>
                                        <li><a href="/search" title="CUCET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="CUCET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="CUCET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="CUCET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="CUCET Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="MDU CEE">MDU CEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="MDU CEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="MDU CEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="MDU CEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="MDU CEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="MDU CEE Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="BHU UET">BHU UET</a></div>
                                    <ul>
                                        <li><a href="/search" title="BHU UET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="BHU UET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="BHU UET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="BHU UET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="BHU UET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search"
                                                                 title="View All Arts &amp; Humanities Exams">View All
                                        Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Mass Communication</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="TISSNET">TISSNET</a></div>
                                    <ul>
                                        <li><a href="/search" title="TISSNET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="TISSNET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="TISSNET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="TISSNET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="TISSNET Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="KIITEE">KIITEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="KIITEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="KIITEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="KIITEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="KIITEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="KIITEE Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="JMIEE">JMIEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="JMIEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="JMIEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="JMIEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="JMIEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="JMIEE Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="SET">SET</a></div>
                                    <ul>
                                        <li><a href="/search" title="SET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="SET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="SET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="SET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="SET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="CUCET">CUCET</a></div>
                                    <ul>
                                        <li><a href="/search" title="CUCET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="CUCET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="CUCET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="CUCET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="CUCET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search"
                                                                 title="View All Mass Communication Exams">View All
                                        Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Agriculture</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="TS EAMCET">TS EAMCET</a></div>
                                    <ul>
                                        <li><a href="/search" title="TS EAMCET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="TS EAMCET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="TS EAMCET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="TS EAMCET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="TS EAMCET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="ICAR AIEEA">ICAR AIEEA</a></div>
                                    <ul>
                                        <li><a href="/search" title="ICAR AIEEA Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="ICAR AIEEA Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="ICAR AIEEA Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="ICAR AIEEA How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="ICAR AIEEA Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="BCECE">BCECE</a></div>
                                    <ul>
                                        <li><a href="/search" title="BCECE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="BCECE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="BCECE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="BCECE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="BCECE Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="SAAT">SAAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="SAAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="SAAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="SAAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="SAAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="SAAT Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search">View All Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Design</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="CEED">CEED</a></div>
                                    <ul>
                                        <li><a href="/search" title="CEED Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="CEED Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="CEED Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="CEED How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="CEED Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="KIITEE">KIITEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="KIITEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="KIITEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="KIITEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="KIITEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="KIITEE Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="LPUNEST">LPUNEST</a></div>
                                    <ul>
                                        <li><a href="/search" title="LPUNEST Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="LPUNEST Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="LPUNEST Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="LPUNEST How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="LPUNEST Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="SET">SET</a></div>
                                    <ul>
                                        <li><a href="/search" title="SET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="SET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="SET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="SET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="SET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="AIEED">AIEED</a></div>
                                    <ul>
                                        <li><a href="/search" title="AIEED Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="AIEED Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="AIEED Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="AIEED How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="AIEED Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Design Exams">View All
                                        Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Pharmacy</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="VSAT">VSAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="VSAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="VSAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="VSAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="VSAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="VSAT Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="BUAT">BUAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="BUAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="BUAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="BUAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="BUAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="BUAT Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="BCECE">BCECE</a></div>
                                    <ul>
                                        <li><a href="/search" title="BCECE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="BCECE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="BCECE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="BCECE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="BCECE Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="HPCET">HPCET</a></div>
                                    <ul>
                                        <li><a href="/search" title="HPCET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="HPCET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="HPCET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="HPCET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="HPCET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Pharmacy">View All
                                        Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Law</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="CLAT">CLAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="CLAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="CLAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="CLAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="CLAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="CLAT Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="LSAT">LSAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="LSAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="LSAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="LSAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="LSAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="LSAT Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="AP LAWCET">AP LAWCET</a></div>
                                    <ul>
                                        <li><a href="/search" title="AP LAWCET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="AP LAWCET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="AP LAWCET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="AP LAWCET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="AP LAWCET Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="AILET">AILET</a></div>
                                    <ul>
                                        <li><a href="/search" title="AILET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="AILET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="AILET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="AILET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="AILET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="SET">SET</a></div>
                                    <ul>
                                        <li><a href="/search" title="SET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="SET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="SET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="SET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="SET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Law Exams">View All
                                        Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Dental</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="AIIMS">AIIMS</a></div>
                                    <ul>
                                        <li><a href="/search" title="SET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="SET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="SET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="SET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="SET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="JIPMER">JIPMER</a></div>
                                    <ul>
                                        <li><a href="/search" title="JIPMER Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="JIPMER Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="JIPMER Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="JIPMER How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="JIPMER Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search">View All Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Performing Arts</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="TISSNET">TISSNET</a></div>
                                    <ul>
                                        <li><a href="/search" title="TISSNET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="TISSNET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="TISSNET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="TISSNET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="TISSNET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="JUET">JUET</a></div>
                                    <ul>
                                        <li><a href="/search" title="JUET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="JUET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="JUET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="JUET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="JUET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="BHU UET">BHU UET</a></div>
                                    <ul>
                                        <li><a href="/search" title="BHU UET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="BHU UET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="BHU UET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="BHU UET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="BHU UET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Performing Arts">View
                                        All Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links lastLink">Education</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="UGC NET">UGC NET</a></div>
                                    <ul>
                                        <li><a href="/search" title="UGC NET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="UGC NET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="UGC NET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="UGC NET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="UGC NET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="DUET">DUET</a></div>
                                    <ul>
                                        <li><a href="/search" title="DUET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="DUET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="DUET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="DUET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="DUET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="APSET">APSET</a></div>
                                    <ul>
                                        <li><a href="/search" title="DUET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="DUET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="DUET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="DUET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="DUET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Education Exams">View
                                        All Exams</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sub-links">
                    <div class="more-links exams">Top Colleges</div>
                    <ul>
                        <li class="back"></li>
                        <li class="active">
                            <div class="more-links firstLink">Engineering</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="JEE Mains">JEE Mains</a></div>
                                    <ul>
                                        <li><a href="/search" title="JEE Mains Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="JEE Mains Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="JEE Mains Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="JEE Mains How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="JEE Mains Previous Year Question Paper">Previous
                                                Year Question Paper</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="JEE Advanced">JEE Advanced</a></div>
                                    <ul>
                                        <li><a href="/search" title="JEE Advanced Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="JEE Advanced Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="JEE Advanced Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="JEE Advanced How to Prepare">How to Prepare</a>
                                        </li>
                                        <li><a href="/search" title="JEE Advanced Previous Year Question Paper">Previous
                                                Year Question Paper</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="BITSAT">BITSAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="BITSAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="BITSAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="BITSAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="BITSAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="BITSAT Mock Test">Mock Test</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="GATE">GATE</a></div>
                                    <ul>
                                        <li><a href="/search" title="GATE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="GATE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="GATE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="GATE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="GATE Mock Test">Mock Test</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="WBJEE">WBJEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="WBJEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="WBJEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="WBJEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="WBJEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="WBJEE Previous Year Question Paper">Previous Year
                                                Question Paper</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Engineering Exams">View
                                        All Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Management</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="CAT">CAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="CAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="CAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="CAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="CAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="CAT Previous Year Question Paper">Previous Year
                                                Question Paper</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="XAT">XAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="XAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="XAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="XAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="XAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="XAT Previous Year Question Paper">Previous Year
                                                Question Paper</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="NMAT">NMAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="NMAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="NMAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="NMAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="NMAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="NMAT Previous Year Question Paper">Previous Year
                                                Question Paper</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="CMAT">CMAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="CMAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="CMAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="CMAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="CMAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="CMAT Previous Year Question Paper">Previous Year
                                                Question Paper</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="MAT">MAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="MAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="MAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="MAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="MAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="MAT Previous Year Question Paper">Previous Year
                                                Question Paper</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="KIITEE Management">KIITEE
                                            Management</a></div>
                                    <ul>
                                        <li><a href="/search" title="Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="How to Prepare">How to Prepare</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Management Exams">View
                                        All Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Commerce &amp; Banking</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="IBPS PO">IBPS PO</a></div>
                                    <ul>
                                        <li><a href="/search" title="IBPS PO Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="IBPS PO Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="IBPS PO Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="IBPS PO How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="IBPS PO Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="SBI PO">SBI PO</a></div>
                                    <ul>
                                        <li><a href="/search" title="SBI PO Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="SBI PO Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="SBI PO Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="SBI PO How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="SBI PO Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="DU JAT">DU JAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="DU JAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="DU JAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="DU JAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="DU JAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="DU JAT Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="CUSAT CAT">CUSAT CAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="CUSAT CAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="CUSAT CAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="CUSAT CAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="CUSAT CAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="CUSAT CAT Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="JMIEE">JMIEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="JMIEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="JMIEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="JMIEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="JMIEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="JMIEE Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Banking Exams">View All
                                        Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Medical</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="NEET UG">NEET UG</a></div>
                                    <ul>
                                        <li><a href="/search" title="NEET UG Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="NEET UG Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="NEET UG Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="NEET UG How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="NEET UG Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="NEET PG">NEET PG</a></div>
                                    <ul>
                                        <li><a href="/search" title="NEET UG Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="NEET UG Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="NEET UG Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="NEET UG How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="NEET UG Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="JIPMER">JIPMER</a></div>
                                    <ul>
                                        <li><a href="/search" title="JIPMER Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="JIPMER Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="JIPMER Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="JIPMER How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="JIPMER Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="AIIMS UG">AIIMS UG</a></div>
                                    <ul>
                                        <li><a href="/search" title="AIIMS UG Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="AIIMS UG Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="AIIMS UG Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="AIIMS UG How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="AIIMS UG Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="AIIMS PG">AIIMS PG</a></div>
                                    <ul>
                                        <li><a href="/search" title="AIIMS PG Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="AIIMS PG Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="AIIMS PG Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="AIIMS PG How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="AIIMS PG Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Medical Exams">View All
                                        Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Sciences</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="KIITEE">KIITEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="KIITEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="KIITEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="KIITEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="KIITEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="KIITEE Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="CUSAT CAT">CUSAT CAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="CUSAT CAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="CUSAT CAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="CUSAT CAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="CUSAT CAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="CUSAT CAT Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="CUCET">CUCET</a></div>
                                    <ul>
                                        <li><a href="/search" title="CUCET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="CUCET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="CUCET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="CUCET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="CUCET Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="GSAT">GSAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="GSAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="GSAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="GSAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="GSAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="GSAT Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="JUET">JUET</a></div>
                                    <ul>
                                        <li><a href="/search" title="JUET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="JUET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="JUET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="JUET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="JUET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Sciences Exams">View All
                                        Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Hotel Management</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="UPSEE">UPSEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="UPSEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="UPSEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="UPSEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="UPSEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="UPSEE Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="LPUNEST">LPUNEST</a></div>
                                    <ul>
                                        <li><a href="/search" title="LPUNEST Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="LPUNEST Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="LPUNEST Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="LPUNEST How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="LPUNEST Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="JMIEE">JMIEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="JMIEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="JMIEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="JMIEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="JMIEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="JMIEE Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="IPU CET">IPU CET</a></div>
                                    <ul>
                                        <li><a href="/search" title="IPU CET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="IPU CET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="IPU CET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="IPU CET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="IPU CET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="SAAT">SAAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="SAAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="SAAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="SAAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="SAAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="SAAT Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Hotel Management Exams">View
                                        All Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Information Technology</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="OJEE">OJEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="OJEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="OJEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="OJEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="OJEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="OJEE Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="KIITEE">KIITEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="KIITEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="KIITEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="KIITEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="KIITEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="KIITEE Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="JNUEE">JNUEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="JNUEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="JNUEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="JNUEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="JNUEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="JNUEE Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="UPSEE">UPSEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="UPSEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="UPSEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="UPSEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="UPSEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="UPSEE Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="VITMEE">VITMEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="UPSEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="UPSEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="UPSEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="UPSEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="UPSEE Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search"
                                                                 title="View All Information Technology Exams">View All
                                        Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Arts &amp; Humanities</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="TISSNET">TISSNET</a></div>
                                    <ul>
                                        <li><a href="/search" title="TISSNET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="TISSNET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="TISSNET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="TISSNET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="TISSNET Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="CUCET">CUCET</a></div>
                                    <ul>
                                        <li><a href="/search" title="CUCET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="CUCET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="CUCET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="CUCET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="CUCET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="JUET">JUET</a></div>
                                    <ul>
                                        <li><a href="/search" title="CUCET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="CUCET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="CUCET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="CUCET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="CUCET Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="MDU CEE">MDU CEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="MDU CEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="MDU CEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="MDU CEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="MDU CEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="MDU CEE Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="BHU UET">BHU UET</a></div>
                                    <ul>
                                        <li><a href="/search" title="BHU UET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="BHU UET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="BHU UET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="BHU UET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="BHU UET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search"
                                                                 title="View All Arts &amp; Humanities Exams">View All
                                        Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Mass Communication</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="TISSNET">TISSNET</a></div>
                                    <ul>
                                        <li><a href="/search" title="TISSNET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="TISSNET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="TISSNET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="TISSNET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="TISSNET Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="KIITEE">KIITEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="KIITEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="KIITEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="KIITEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="KIITEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="KIITEE Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="JMIEE">JMIEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="JMIEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="JMIEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="JMIEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="JMIEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="JMIEE Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="SET">SET</a></div>
                                    <ul>
                                        <li><a href="/search" title="SET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="SET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="SET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="SET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="SET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="CUCET">CUCET</a></div>
                                    <ul>
                                        <li><a href="/search" title="CUCET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="CUCET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="CUCET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="CUCET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="CUCET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search"
                                                                 title="View All Mass Communication Exams">View All
                                        Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Agriculture</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="TS EAMCET">TS EAMCET</a></div>
                                    <ul>
                                        <li><a href="/search" title="TS EAMCET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="TS EAMCET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="TS EAMCET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="TS EAMCET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="TS EAMCET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="ICAR AIEEA">ICAR AIEEA</a></div>
                                    <ul>
                                        <li><a href="/search" title="ICAR AIEEA Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="ICAR AIEEA Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="ICAR AIEEA Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="ICAR AIEEA How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="ICAR AIEEA Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="BCECE">BCECE</a></div>
                                    <ul>
                                        <li><a href="/search" title="BCECE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="BCECE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="BCECE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="BCECE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="BCECE Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="SAAT">SAAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="SAAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="SAAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="SAAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="SAAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="SAAT Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search">View All Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Design</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="CEED">CEED</a></div>
                                    <ul>
                                        <li><a href="/search" title="CEED Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="CEED Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="CEED Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="CEED How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="CEED Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="KIITEE">KIITEE</a></div>
                                    <ul>
                                        <li><a href="/search" title="KIITEE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="KIITEE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="KIITEE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="KIITEE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="KIITEE Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="LPUNEST">LPUNEST</a></div>
                                    <ul>
                                        <li><a href="/search" title="LPUNEST Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="LPUNEST Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="LPUNEST Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="LPUNEST How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="LPUNEST Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="SET">SET</a></div>
                                    <ul>
                                        <li><a href="/search" title="SET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="SET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="SET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="SET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="SET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="AIEED">AIEED</a></div>
                                    <ul>
                                        <li><a href="/search" title="AIEED Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="AIEED Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="AIEED Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="AIEED How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="AIEED Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Design Exams">View All
                                        Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Pharmacy</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="VSAT">VSAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="VSAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="VSAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="VSAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="VSAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="VSAT Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="BUAT">BUAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="BUAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="BUAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="BUAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="BUAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="BUAT Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="BCECE">BCECE</a></div>
                                    <ul>
                                        <li><a href="/search" title="BCECE Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="BCECE Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="BCECE Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="BCECE How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="BCECE Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="HPCET">HPCET</a></div>
                                    <ul>
                                        <li><a href="/search" title="HPCET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="HPCET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="HPCET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="HPCET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="HPCET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Pharmacy">View All
                                        Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Law</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="CLAT">CLAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="CLAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="CLAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="CLAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="CLAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="CLAT Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="LSAT">LSAT</a></div>
                                    <ul>
                                        <li><a href="/search" title="LSAT Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="LSAT Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="LSAT Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="LSAT How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="LSAT Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="AP LAWCET">AP LAWCET</a></div>
                                    <ul>
                                        <li><a href="/search" title="AP LAWCET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="AP LAWCET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="AP LAWCET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="AP LAWCET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="AP LAWCET Results">Results</a></li>
                                    </ul>
                                    <div class="heading"><a href="/search" title="AILET">AILET</a></div>
                                    <ul>
                                        <li><a href="/search" title="AILET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="AILET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="AILET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="AILET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="AILET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="SET">SET</a></div>
                                    <ul>
                                        <li><a href="/search" title="SET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="SET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="SET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="SET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="SET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Law Exams">View All
                                        Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Dental</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="AIIMS">AIIMS</a></div>
                                    <ul>
                                        <li><a href="/search" title="SET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="SET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="SET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="SET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="SET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="JIPMER">JIPMER</a></div>
                                    <ul>
                                        <li><a href="/search" title="JIPMER Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="JIPMER Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="JIPMER Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="JIPMER How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="JIPMER Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search">View All Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links">Performing Arts</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="TISSNET">TISSNET</a></div>
                                    <ul>
                                        <li><a href="/search" title="TISSNET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="TISSNET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="TISSNET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="TISSNET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="TISSNET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="JUET">JUET</a></div>
                                    <ul>
                                        <li><a href="/search" title="JUET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="JUET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="JUET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="JUET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="JUET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="BHU UET">BHU UET</a></div>
                                    <ul>
                                        <li><a href="/search" title="BHU UET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="BHU UET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="BHU UET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="BHU UET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="BHU UET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Performing Arts">View
                                        All Exams</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="more-links lastLink">Education</div>
                            <ul>
                                <li class="go-back"></li>
                                <li>
                                    <div class="heading"><a href="/search" title="UGC NET">UGC NET</a></div>
                                    <ul>
                                        <li><a href="/search" title="UGC NET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="UGC NET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="UGC NET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="UGC NET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="UGC NET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="DUET">DUET</a></div>
                                    <ul>
                                        <li><a href="/search" title="DUET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="DUET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="DUET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="DUET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="DUET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="heading"><a href="/search" title="APSET">APSET</a></div>
                                    <ul>
                                        <li><a href="/search" title="DUET Eligibility">Eligibility</a></li>
                                        <li><a href="/search" title="DUET Syllabus">Syllabus</a></li>
                                        <li><a href="/search" title="DUET Exam Pattern">Exam Pattern</a></li>
                                        <li><a href="/search" title="DUET How to Prepare">How to Prepare</a></li>
                                        <li><a href="/search" title="DUET Results">Results</a></li>
                                    </ul>
                                </li>
                                <li class="full-col view-all"><a href="/search" title="View All Education Exams">View
                                        All Exams</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sub-links">
                    <div class="more-links courses">Top Courses</div>
                    <ul class="four-column">
                        <li class="full-col back"></li>
                        <li class="full-col first">
                            <div class="heading">Popular Courses</div>
                        </li>
                        <li>
                            <ul>
                                <li><a href="/search" title="B.Tech">B.Tech</a></li>
                                <li><a href="/search" title="B.Arch">B.Arch</a></li>
                                <li><a href="/search" title="B.Tech in Mechanical Engineering">B.Tech in Mechanical
                                        Engineering</a></li>
                                <li><a href="/search" title="B.Sc Radiotherapy">B.Sc Radiotherapy</a></li>
                                <li><a href="/search" title="B.Sc in Medical Laboratory Technology">B.Sc in Medical
                                        Laboratory Technology</a></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li><a href="/search" title="Fashion Styling">Fashion Styling</a></li>
                                <li><a href="/search" title="Auto CAD">Auto CAD</a></li>
                                <li><a href="/search" title="B.Des">B.Des</a></li>
                                <li><a href="/search" title="B.Ed">B.Ed</a></li>
                                <li><a href="/search" title="B.Sc Agriculture">B.Sc Agriculture</a></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li><a href="/search" title="MBA in  Media Management">MBA in Media Management</a></li>
                                <li><a href="/search" title="MBA in International Business">MBA in International
                                        Business</a></li>
                                <li><a href="/search" title="MBA in Operations Management">MBA in Operations
                                        Management</a></li>
                                <li><a href="/search" title="B.Sc in Statistics">B.Sc in Statistics</a></li>
                                <li><a href="/search" title="B.Sc in Home Science">B.Sc in Home Science</a></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li><a href="/search" title="Bachelor of Management Studies">Bachelor of Management
                                        Studies</a></li>
                                <li><a href="/search" title="Bachelor of Mass Communication">Bachelor of Mass
                                        Communication</a></li>
                                <li><a href="/search" title="Bachelor of Computer Application">Bachelor of Computer
                                        Application</a></li>
                                <li><a href="/search" title="B.Pharma">B.Pharma</a></li>
                                <li><a href="/search" title="Bachelor of Dental Surgery (BDS)">Bachelor of Dental
                                        Surgery (BDS)</a></li>
                            </ul>
                        </li>
                        <li class="full-col last">
                            <div class="view-all"><a href="/search" title="View All Courses">View All Courses</a></div>
                        </li>
                    </ul>
                </li>
                @if(!Auth::user())
                    <li>
                        <a href="/login" class="scolor"> <i class="fas fa-user" aria-hidden="true"></i> Login </a>
                    </li>
                @else
                    <li>
                        <a href="/logout" class="scolor"> <i class="fas fa-user" aria-hidden="true"></i> Logout </a>
                    </li>
                @endif
                <li>
                    <button type="button" class="btn site-btn-1 ml-2" data-bs-toggle="modal" data-bs-target="#informationModel"> Request Free Info </button>
                </li>
            </ul>
        </nav>

    </div>
</header>
@yield('content')
@include('front.layout.footer')

