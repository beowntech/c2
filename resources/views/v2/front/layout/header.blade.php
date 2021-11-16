<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/0bee4dcff2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/v2/assets/css/style.css">

    <title>Admission Jockey</title>
</head>
<style>
    #testimonial .carousel-inner .carousel-item .testimonial-data .user-avatar{
        object-fit: cover;
    }
</style>
<body>
<section id="top-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-unstyled ver-line-menu">
                    <li><a href="{{route('search-college')}}" class="text-decoration-none"> Top University</a></li>
                    {{-- <li><a href="{{route('search-college')}}" class="text-decoration-none"> Top Courses </a></li> --}}
                    <li><a href="{{route('search-college')}}" class="text-decoration-none"> Colleges </a></li>
{{--                    <li><a href="/" class="text-decoration-none"> Exams </a></li>--}}
                    {{-- <li><a href="{{route('search-college')}}" class="text-decoration-none"> Admission 2021 </a></li> --}}
                    <li><a href="{{route('blog-index')}}" class="text-decoration-none"> Blog </a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <a href="{{route('cyber-partner')}}" class="float-end text-white fw-bold py-1"> Cyber Partner Login</a>
            </div>
        </div>
    </div>
</section>
<section id="menu" class="mb-1">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="/assets/images/admission-jockey-logo1-main.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @foreach($menu as $m => $val)
                        <li class="nav-item {{count($val->submenu) != 0 ?'dropdown':''}}">
                            @if(isset($val->link))
                                <a class="nav-link {{isset($val->soon) != false ? ($val->soon == true ? 'coming-soon':''):''}} {{count($val->submenu) != 0 ? 'dropdown-toggle':''}}"
                                   id="{{count($val->submenu) != 0 ? 'navbarDropdown'.$m:''}}"
                                   {{count($val->submenu) == 0 ? 'aria-current=page': ''}}
                                   {{count($val->submenu) != 0 ? 'role=button': ''}}
                                   {{count($val->submenu) != 0 ? 'data-bs-toggle=dropdown aria-expanded=false':''}}
                                   href="{{count($val->submenu) != 0 ? '#':'/'.($val->link != "/" ? $val->link: "").''}}"
                                >{{$val->name}}</a>
                            @elseif(isset($val->category))
                                <a class="nav-link {{count($val->submenu) != 0 ? 'dropdown-toggle':''}}"
                                   id="{{count($val->submenu) != 0 ? 'navbarDropdown'.$m:''}}"
                                   {{count($val->submenu) == 0 ? 'aria-current=page': ''}}
                                   {{count($val->submenu) != 0 ? 'role=button': ''}}
                                   {{count($val->submenu) != 0 ? 'data-bs-toggle=dropdown aria-expanded=false':''}}
                                   href="{{count($val->submenu) != 0 ? '#':'/blog/'.$val->catg.''}}"
                                >{{ucfirst(strtolower($val->name))}}</a>
                            @endif
                            @if(count($val->submenu) != 0)
                                <ul class="dropdown-menu bg-dropdown-menu bg-white "
                                    aria-labelledby="navbarDropdown{{$m}}" data-bs-popper="none">
                                    <div class="row py-3">
                                        @foreach($val->submenu as $s => $sub)
                                            <div class="col-md-4">
                                                <li><p class="fw-bold dropdown-item mb-0">{{ucfirst(strtolower($sub->name))}}</p></li>
                                                @foreach($sub->submenu as $sb =>$subs)
                                                @if(isset($subs->link))
                                                    <li><a class="dropdown-item"
                                                           href="{{$subs->link != "/" ? $subs->link: ""}}">{{ucfirst(strtolower($subs->name))}}</a>
                                                    </li>
                                                @elseif(isset($subs->category))
                                                    <li><a class="dropdown-item"
                                                           href="/search?course={{$subs->catg}}">{{ucfirst(strtolower($subs->name))}}</a>
                                                    </li>
                                                @endif
                                                @endforeach
                                            </div>
                                        @endforeach
                                                {{--                                          <li><a class="dropdown-item" href="#">B.Tech</a></li>--}}
                                                {{--                                          <li><a class="dropdown-item" href="#">M.Tech</a></li>--}}
                                                {{--                                          <li><a class="dropdown-item" href="#">B.Arch</a></li>--}}
                                                {{--                                          <li><a class="dropdown-item" href="#">B.Tech + M.Tech</a></li>--}}
                                                {{--                                          <li><a class="dropdown-item" href="#">Diploma</a></li>--}}
                                                {{--                                          <a class="dropdown-item mb-4 default-anchor" href="#">View All</a>--}}
                                                {{--                                          <li><a class="dropdown-item scolor" href="#">Student Credit Card Scheme</a></li>--}}
                                                {{--                                          <li><a class="dropdown-item scolor" href="#">Bihar Credit Card Scheme</a></li>--}}
                                                {{--                                          <li><a class="dropdown-item scolor" href="#">WBSCC</a></li>--}}
                                    </div>
                                    <hr>
{{--                                    <div class="row px-3">--}}
{{--                                        <div class="col">--}}
{{--                                            <h1 class="f-16">Featured Engeenering College in Uttarakhand</h1>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row px-3 pb-3">--}}

{{--                                        <div class="col-md-4">--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-4">--}}
{{--                                                    <div class="border">--}}
{{--                                                        <a href=""> <img src="assets/images/site/c-logo.png"--}}
{{--                                                                         width="100%" class="p-1" alt=""></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-8">--}}
{{--                                                    <a href="" class="menu-anchor"><h2--}}
{{--                                                            class="f-14 fw-6 d-inline-block mb-0 ">Sai Group of--}}
{{--                                                            Institution, Dehradun</h2>--}}
{{--                                                        <p class="mb-0">Dehradun, Uttarakhand</p></a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-4">--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-4">--}}
{{--                                                    <div class="border">--}}
{{--                                                        <a href=""> <img src="assets/images/site/c-logo.png"--}}
{{--                                                                         width="100%" class="p-1" alt=""></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-8">--}}
{{--                                                    <a href="" class="menu-anchor"><h2--}}
{{--                                                            class="f-14 fw-6 d-inline-block mb-0 ">Sai Group of--}}
{{--                                                            Institution, Dehradun</h2>--}}
{{--                                                        <p class="mb-0">Dehradun, Uttarakhand</p></a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-4">--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-4">--}}
{{--                                                    <div class="border">--}}
{{--                                                        <a href=""> <img src="assets/images/site/c-logo.png"--}}
{{--                                                                         width="100%" class="p-1" alt=""></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-8">--}}
{{--                                                    <a href="" class="menu-anchor"><h2--}}
{{--                                                            class="f-14 fw-6 d-inline-block mb-0 ">Sai Group of--}}
{{--                                                            Institution, Dehradun</h2>--}}
{{--                                                        <p class="mb-0">Dehradun, Uttarakhand</p></a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </ul>
                        @endif
                    @endforeach
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"--}}
{{--                           data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                            Colleges--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu bg-dropdown-menu bg-white " aria-labelledby="navbarDropdown"--}}
{{--                            data-bs-popper="none">--}}
{{--                            <div class="row py-3">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <li><p class="fw-bold dropdown-item mb-0">Colleges By Degrees</p></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Arch</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech + M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Diploma</a></li>--}}
{{--                                    <a class="dropdown-item mb-4 default-anchor" href="#">View All</a>--}}
{{--                                    <li><a class="dropdown-item scolor" href="#">Student Credit Card Scheme</a></li>--}}
{{--                                    <li><a class="dropdown-item scolor" href="#">Bihar Credit Card Scheme</a></li>--}}
{{--                                    <li><a class="dropdown-item scolor" href="#">WBSCC</a></li>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-5">--}}
{{--                                    <li><p class="fw-bold dropdown-item mb-0">Popular Colleges</p></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">DIT College, Dehradun</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">DIT College, Dehradun</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">DIT College, Dehradun</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">DIT College, Dehradun</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">DIT College, Dehradun</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">DIT College, Dehradun</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">DIT College, Dehradun</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">DIT College, Dehradun</a></li>--}}
{{--                                    <a class="dropdown-item default-anchor" href="#">View All</a>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-3">--}}
{{--                                    <li><p class="fw-bold dropdown-item mb-0">Top Colleges</p></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">IIT Delhi</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">IIT Kharagpur</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">IIT Madras</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">IIT Delhi</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">IIT Kanpur</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">IIT Delhi</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">IIT Delhi</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">IIT Delhi</a></li>--}}

{{--                                    <a class="dropdown-item default-anchor" href="#">View All</a>--}}

{{--                                </div>--}}

{{--                            </div>--}}
{{--                            <hr>--}}
{{--                            <div class="row px-3">--}}
{{--                                <div class="col">--}}
{{--                                    <h1 class="f-16">Featured Engeenering College in Uttarakhand</h1>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row px-3 pb-3">--}}

{{--                                <div class="col-md-4">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-4">--}}
{{--                                            <div class="border">--}}
{{--                                                <a href=""> <img src="assets/images/site/c-logo.png" width="100%"--}}
{{--                                                                 class="p-1" alt=""></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-8">--}}
{{--                                            <a href="" class="menu-anchor"><h2 class="f-14 fw-6 d-inline-block mb-0 ">--}}
{{--                                                    Sai Group of Institution, Dehradun</h2>--}}
{{--                                                <p class="mb-0">Dehradun, Uttarakhand</p></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-4">--}}
{{--                                            <div class="border">--}}
{{--                                                <a href=""> <img src="assets/images/site/c-logo.png" width="100%"--}}
{{--                                                                 class="p-1" alt=""></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-8">--}}
{{--                                            <a href="" class="menu-anchor"><h2 class="f-14 fw-6 d-inline-block mb-0 ">--}}
{{--                                                    Sai Group of Institution, Dehradun</h2>--}}
{{--                                                <p class="mb-0">Dehradun, Uttarakhand</p></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-4">--}}
{{--                                            <div class="border">--}}
{{--                                                <a href=""> <img src="assets/images/site/c-logo.png" width="100%"--}}
{{--                                                                 class="p-1" alt=""></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-8">--}}
{{--                                            <a href="" class="menu-anchor"><h2 class="f-14 fw-6 d-inline-block mb-0 ">--}}
{{--                                                    Sai Group of Institution, Dehradun</h2>--}}
{{--                                                <p class="mb-0">Dehradun, Uttarakhand</p></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"--}}
{{--                           data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                            Colleges--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu bg-dropdown-menu bg-white " aria-labelledby="navbarDropdown"--}}
{{--                            data-bs-popper="none">--}}
{{--                            <div class="row py-3">--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <li><p class="fw-bold dropdown-item mb-0">Engeenering</p></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Arch</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech + M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Diploma</a></li>--}}
{{--                                    <a class="dropdown-item mb-4 default-anchor" href="#">View More</a>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <li><p class="fw-bold dropdown-item mb-0">Medical</p></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Arch</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech + M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Diploma</a></li>--}}
{{--                                    <a class="dropdown-item mb-4 default-anchor" href="#">View More</a>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <li><p class="fw-bold dropdown-item mb-0">Management</p></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Arch</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech + M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Diploma</a></li>--}}
{{--                                    <a class="dropdown-item mb-4 default-anchor" href="#">View More</a>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <li><p class="fw-bold dropdown-item mb-0">Science</p></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Arch</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech + M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Diploma</a></li>--}}
{{--                                    <a class="dropdown-item mb-4 default-anchor" href="#">View More</a>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <li><p class="fw-bold dropdown-item mb-0">Education</p></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Arch</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech + M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Diploma</a></li>--}}
{{--                                    <a class="dropdown-item mb-4 default-anchor" href="#">View More</a>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <li><p class="fw-bold dropdown-item mb-0">Education</p></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Arch</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech </a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Diploma</a></li>--}}
{{--                                    <a class="dropdown-item mb-4 default-anchor" href="#">View More</a>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <li><p class="fw-bold dropdown-item mb-0">Engeenering</p></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Arch</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech + M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Diploma</a></li>--}}
{{--                                    <a class="dropdown-item mb-4 default-anchor" href="#">View More</a>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <li><p class="fw-bold dropdown-item mb-0">Medical</p></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Arch</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech + M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Diploma</a></li>--}}
{{--                                    <a class="dropdown-item mb-4 default-anchor" href="#">View More</a>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <li><p class="fw-bold dropdown-item mb-0">Management</p></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Arch</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech + M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Diploma</a></li>--}}
{{--                                    <a class="dropdown-item mb-4 default-anchor" href="#">View More</a>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <li><p class="fw-bold dropdown-item mb-0">Science</p></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Arch</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech + M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Diploma</a></li>--}}
{{--                                    <a class="dropdown-item mb-4 default-anchor" href="#">View More</a>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <li><p class="fw-bold dropdown-item mb-0">Education</p></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Arch</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech + M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Diploma</a></li>--}}
{{--                                    <a class="dropdown-item mb-4 default-anchor" href="#">View More</a>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <li><p class="fw-bold dropdown-item mb-0">Education</p></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">M.Tech</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Arch</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">B.Tech </a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Diploma</a></li>--}}
{{--                                    <a class="dropdown-item mb-4 default-anchor" href="#">View More</a>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">Exam</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link coming-soon" href="#">AJ School</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">Study Abroad</a>--}}
{{--                    </li>--}}

                </ul>
                {{--      <div class="d-flex">--}}
                {{--       <button class="btn site-btn-1"> <i class="fas fa-id-card-alt"></i> Admission Calculator</button>--}}
                {{--      </div>--}}
            </div>
        </div>
    </nav>
</section>
@yield('content')
@yield('modal')
@include('v2.front.layout.footer')
