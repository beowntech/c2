<section id="top-header">
    <div class="container">
        <div class="row py-1">
            <div class="col-md-6">
                <a class="navbar-brand" href="/"> <img src="{{asset('alotfront/assets/images/alot.png')}}" class="logo" alt="" srcset=""></a>
            </div>
            <div class="col-md-5 offset-md-1 text-white align-self-center float-right">
                <a href="/blogs">Blogs</a> |
                <a href="/help.html" >List Your Property</a> |
                <a href="/help.html">Help Center</a> |
                @if(Auth::user())
                    <a href="/logout"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="/logout" method="POST" class="d-none">
                    @csrf
                </form>
                @else
                    <a href="/login">Login</a>
                @endif
            </div>
        </div>
    </div>
</section>
<section id="menu-header">

    <div class="container ">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="/">
                <!-- <img src="assets/images/alot.png" class="logo" alt="" srcset=""> -->
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto topnav">
                    <li class="nav-item rounded-pill dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Destinations
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Carfax</a>
                            <a class="dropdown-item" href="#">Carproof</a>

                            <a class="dropdown-item" href="#">Omnivic</a>
                        </div>
                    </li>
                    <li class="nav-item rounded-pill">
                        <a class="nav-link" href="#">Alot Offbeat</a>
                    </li>
                    <li class="nav-item rounded-pill">
                        <a class="nav-link" href="#">Alot Rooms</a>
                    </li>
                    <li class="nav-item rounded-pill">
                        <a class="nav-link" href="#">Alot Homes</a>
                    </li>
                    <li class="nav-item rounded-pill">
                        <a class="nav-link" href="#">Alot Camps</a>
                    </li>

                </ul>
            </div>



        </nav>
    </div>
</section>
