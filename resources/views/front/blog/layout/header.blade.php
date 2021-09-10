<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <script src="https://kit.fontawesome.com/0bee4dcff2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css">
    <title>@yield('title')</title>
<style>
    .blog-navigation ul{
        justify-content: center;
    }
</style>
</head>
<body>
<section class="blog-site-menu">
    <div class="container">
        <div class="row py-3">
            <div class="col-md-12">
                <a href="/blog"><img src="/assets/images/admission-jockey-logo1.png" class="logo" alt=""></a>

                <ul class="list-unstyled ver-line-menu float-end mb-0">
                    <li><a href="mailto:contact@admissionjockey.com" class="text-decoration-none link-a"> <img src="assets/images/icon/email.png" alt=""><span class="sm-hide"> contact@admissionjockey.com </span> </a></li>
                    <li><a class="text-decoration-none link-a sm-hide"> <img src="/assets/images/icon/call.png" alt=""> <span class="sm-hide">+91 7060243009 </span> </a></li>
                    <li><a href="tel:+91 7060243009" class="text-decoration-none link-a d-sm-none"> <img src="assets/images/icon/call.png" alt=""> <span class="sm-hide">+91 7060243009 </span> </a></li>
                    <li class=""><a href="/cyber-partner" class="fw-bold pcolor sm-hide"> Become a Partner </a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
@yield('content')
@include('front.blog.layout.footer')
