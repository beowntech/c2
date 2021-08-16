@extends('alotfront.layouts.header')
@section('content')
<section id="small-cover-section">

</section>
<section id="main">
    <div class="container-fluid">
        <div class="row my-2 py-1">
            <div class="col-md-3">
                <div class="wrapper">
                    <!-- Sidebar -->
                    <nav id="sidebar">
                        <div class="sidebar-header">
                            <h3>Filter</h3>
                        </div>

                        <ul class="list-unstyled components">
{{--                            <div class="p-3">--}}
{{--                                <select id="searchByName" type="text" class="form-control">--}}
{{--                                    @foreach($data as $count => $val)--}}
{{--                                        <option value="{{$val->id}},{{$val->name}}">{{$val->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
                            <div class="px-3">
                            @foreach($category as $cou => $catg)
                                @foreach($catg->childrens as $count => $subcatg)
                                    @foreach($subcatg->children as $counts => $final)
                            <div class="form-check">
                                    @if(in_array($final->name,explode(",",Request::get('catg'))))
                                <input class="form-check-input choose-input" checked type="checkbox" value="{{ucwords(strtolower($final->name))}}" delete_value="{{strtoupper(preg_replace('/\s+/', '_', $final->name))}}" id="{{$final->name}}">
                                    @else
                                        <input class="form-check-input choose-input" type="checkbox" value="{{ucwords(strtolower($final->name))}}" delete_value="{{strtoupper(preg_replace('/\s+/', '_', $final->name))}}" id="{{$final->name}}">
                                    @endif
                                        <label class="form-check-label" for="{{$final->name}}">
                                    {{ucwords(strtolower($final->name))}}
                                </label>
                            </div>

                                    @endforeach
                                @endforeach
                            @endforeach
                            </div>
                        </ul>
                    </nav>

                </div>
            </div>
            <div class="col-md-8" id="MainData">

                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-sm justify-content-end">
                            <li class="page-item active" aria-current="page">
                            <span class="page-link">
                                1
                                <span class="sr-only">(current)</span>
                            </span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                        </ul>
                        </nav>
            </div>

            <div class="col-md-8" id="NoData">
                No Properties Found
            </div>

        </div>


    </div>

</section>
<section id="slide-item" class="my-4 bgy">

    <div class="container py-3">
        <div class="row">
            <div class="col">
                <h1 class="site-title">Recommended By ALOT</h1>
            </div>
        </div>
        <div class="row">
            <div class="MultiCarousel" data-items="1,2,3,4" data-slide="1" id="MultiCarousel"  data-interval="1000">
                <div class="MultiCarousel-inner">

                    <?php
                    $n=1;
                    while($n<11){
                    ?>
                    <div class="item text-left">
                        <div class="col-md-12 card mb-4 border-0">
                            <img src="{{asset('alotfront/assets/images/bg/snow-cover.png')}}" class="card-img-top" alt="...">
                            <div class="shadow-sm">
                                <div class="card-body px-1 ">
                                    <p class="font-weight-bold mb-0">Hotel Name</p>
                                    <p class="small mb-0">Hotel Address</p>
                                    <span class="badge badge-success">4.7 <i class="fas fa-star"></i></span> (62 Ratings)

                                </div>
                                <div class="card-footer bg-transparent border-0 px-1 ">
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
@endsection
