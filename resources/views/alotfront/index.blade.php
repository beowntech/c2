@extends('alotfront.layouts.header')
@section('content')
<section id="cover-section" class="align-self-center">
    <div class="container">
        <div class="s002">
            <form>
                <div class="inner-form">
                    <div class="input-field first-wrap">
                        <div class="icon-wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path>
                            </svg>
                        </div>
                        <input id="search" type="text" placeholder="What are you looking for?" />
                    </div>
                    <div class="input-field second-wrap">
                        <div class="icon-wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"></path>
                            </svg>
                        </div>
                        <input class="datepicker" id="depart" type="text" placeholder="29 Aug 2018" />
                    </div>
                    <div class="input-field third-wrap">
                        <div class="icon-wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"></path>
                            </svg>
                        </div>
                        <input class="datepicker" id="return" type="text" placeholder="30 Aug 2018" />
                    </div>
                    <div class="input-field fouth-wrap">
                        <div class="icon-wrap" style="padding-right: 13px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path>
                            </svg>
                        </div>
                        <select style="padding: 25px;width: 100%" data-trigger="" name="choices-single-defaul">
                            <option placeholder="">2 Adults</option>
                            <option>3 Adults</option>
                            <option>4 Adults</option>
                            <option>5 Adults</option>
                        </select>
                    </div>
                    <div class="input-field fifth-wrap">
                        <button class="btn-search" id="searchbtn" type="button">SEARCH</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- <section id="search-bar">
        <div class="container">
          <div class="search-panel shadow text-center">
              <h2 class="py-5"><a href="search.blade.php">Search Panel</a> </h2>
          </div>
        </div>
</section> -->

<section id="slide-item" class="my-4">

    <div class="container py-3">
        <div class="row">
            <div class="col">
                <h1 class="site-title">Alot Your Stays</h1>
            </div>
        </div>
        <div class="row">
            <div class="MultiCarousel" data-items="1,2,3,4" data-slide="1" id="MultiCarousel"  data-interval="1000">
                <div class="MultiCarousel-inner">
                    @foreach($category as $categories => $value)
                        @if($value->id === 6)
                        @foreach($value->childrens as $childs => $childr)
                            @foreach($childr->children as $key =>$categ)
                    <div class="item text-center">
                        <a href="/search2/{{str_replace(" ","_",strtoupper($categ->name))}}">
                            <div class="bgimg" style="background: url({{asset('alotfront/assets/images/site/'.$categ->image)}});">
                                <div class="offer">
                                    10% off
                                </div>
                                <div class="price">
                                    @500
                                </div>
                            </div></a>
                        <a href="/search2/{{strtoupper($categ->name)}}">{{strtoupper($categ->name)}}</a>
                    </div>
                            @endforeach
                        @endforeach
                        @endif
                        @endforeach
                </div>
                <button class="btn btn-primary leftLst"><</button>
                <button class="btn btn-primary rightLst">></button>
            </div>
        </div>

    </div>
</section>


<section id="slide-item" class="my-4">

    <div class="container py-3">
        <div class="row">
            <div class="col">
                <h1 class="site-title">Alot Experiences</h1>
            </div>
        </div>
        <div class="row">
            <div class="MultiCarousel" data-items="2,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                <div class="MultiCarousel-inner">
                    @foreach($category as $categories => $value)
                        @if($value->id === 2)
                            @foreach($value->childrens as $childs => $childr)
                                @foreach($childr->children as $key =>$categ)
                    <div class="item text-center">
                        <a href="/search2/{{strtoupper($categ->name)}}">
                            <div class="onlybgimg text-center" style="background: url({{asset('alotfront/assets/images/site/'.$categ->image)}});">
                                <div class="content-center">
                                    <h4 class="px-2 ts">{{$categ->name}}</h4></div>
                                <div class="price">
                                    @500
                                </div>
                            </div>
                        </a>
                    </div>
                                @endforeach
                            @endforeach
                        @endif
                    @endforeach
                </div>
                <button class="btn btn-primary leftLst"><</button>
                <button class="btn btn-primary rightLst">></button>
            </div>
        </div>

    </div>
</section>

<section class="step-section ">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="site-title">Ease Your Booking Experiences with ALOT</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h2>How it works</h2>
                <h3>Customize & Book</h3>
                <p>Amazing Holiday Packages</p>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col text-center">
                        <img src="{{asset('alotfront/assets/images/site/choose.png')}}" alt="">
                        <p class="font-weight-bold">Pick your package</p>
                    </div>
                    <div class="col text-center">
                        <img src="{{asset('alotfront/assets/images/site/compare.png')}}" alt="">
                        <p class="font-weight-bold">Compare Hotels </p>
                    </div>
                    <div class="col text-center">
                        <img src="{{asset('alotfront/assets/images/site/enjoy.png')}}" alt="">
                        <p class="font-weight-bold">Enjoy your Vacation</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



<section>
    <div class="container py-4">
        <div class="row">
            <div class="col-md-8">
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/uWsJM_vcTwQ"> </iframe>
            </div>
            <div class="col-md-4 align-self-center text-center">
                <h2 class="site-title">Travel With Alot</h2>
            </div>
        </div>
    </div>
</section>


<section id="slide-item" class="my-4">

    <div class="container py-3">
        <div class="row">
            <div class="col">
                <h1 class="site-title">Alot Treks</h1>
            </div>
        </div>
        <div class="row">
            <div class="MultiCarousel" data-items="1,2,3,3" data-slide="1" id="MultiCarousel"  data-interval="1000">
                <div class="MultiCarousel-inner">
                    @foreach($category as $categories => $value)
                        @if($value->id === 3)
                            @foreach($value->childrens as $childs => $childr)
                                @foreach($childr->children as $key =>$categ)
                    <div class="item text-center">
                        <a href="">
                            <div class="bgimg" style="background: url({{asset('alotfront/assets/images/site/slide3.jpeg')}});">
                                <div class="offer">
                                    10% off
                                </div>
                                <div class="price2">
                                    Start @500
                                </div>
                            </div></a>
                        <a href="">{{$categ->name}}</a>
                    </div>
                                @endforeach
                            @endforeach
                        @endif
                    @endforeach
                </div>
                <button class="btn btn-primary leftLst"><</button>
                <button class="btn btn-primary rightLst">></button>
            </div>
        </div>

    </div>
</section>



<section id="slide-item" class="my-4">

    <div class="container py-3">
        <div class="row">
            <div class="col">
                <h1 class="site-title">Trending Unexplored Places</h1>
            </div>
        </div>
        <div class="row">
            <div class="MultiCarousel" data-items="1,2,3,4" data-slide="1" id="MultiCarousel"  data-interval="1000">
                <div class="MultiCarousel-inner">

                    <?php
                    $n=1;
                    while($n<11){
                    ?>
                    <div class="item text-center">
                        <a href="/search2/hotels-in-chopta">
                            <div class="onlybgimg text-center" style="background: url({{asset('alotfront/assets/images/site/slide'.$n.'.jpeg')}});">
                                <div class="content-center">
                                    <h2 class="px-2 ts">Chopta</h2></div>
                            </div></a>

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

<section>
    <div class="container py-4">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="https://via.placeholder.com/490x390.png" width="100%" alt="">
                        </div>
                        <div class="col-md-7 align-self-center ">
                            <h2 class="site-title">Sohan Singh</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt quidem ad iure laboriosam, dignissimos voluptatibus quod esse officia repellat aliquam explicabo libero facere accusantium cum tenetur voluptatem. Molestias, in pariatur!</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="https://via.placeholder.com/490x390.png" width="100%" alt="">
                        </div>
                        <div class="col-md-7 align-self-center">
                            <h2 class="site-title">Deb Jyoti Saha</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt quidem ad iure laboriosam, dignissimos voluptatibus quod esse officia repellat aliquam explicabo libero facere accusantium cum tenetur voluptatem. Molestias, in pariatur!</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="https://via.placeholder.com/490x390.png" width="100%" alt="">
                        </div>
                        <div class="col-md-7 align-self-center">
                            <h2 class="site-title">Anshul Bhatt</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt quidem ad iure laboriosam, dignissimos voluptatibus quod esse officia repellat aliquam explicabo libero facere accusantium cum tenetur voluptatem. Molestias, in pariatur!</p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
</section>
@endsection
