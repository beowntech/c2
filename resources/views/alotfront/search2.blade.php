@extends('alotfront.layouts.header')
@section('content')
    @foreach($data as $key => $value)
<section id="small-cover-section">

</section>
<section id="main">
    <div class="container">
        <div class="row my-2 py-1">
            <div class="col-md-10 offset-md-1">
                <h1 class="text-center site-title ">{{strtoupper($value->name)}}</h1>
                <p class="text-center font-weight-bold">Wonder land</p>
                <hr>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita dolor accusantium, voluptates, atque qui ratione dolorem inventore debitis aperiam laboriosam libero blanditiis amet beatae excepturi odit eligendi perferendis tempora odio!</p> <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita dolor accusantium, voluptates, atque qui ratione dolorem inventore debitis aperiam laboriosam libero blanditiis amet beatae excepturi odit eligendi perferendis tempora odio!</p> <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita dolor accusantium, voluptates, atque qui ratione dolorem inventore debitis aperiam laboriosam libero blanditiis amet beatae excepturi odit eligendi perferendis tempora odio!</p>
            </div>
        </div>
    </div>

</section>

<section class="block-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="site-title">{{ucfirst(strtolower($value->name))}} Stays By ALOT</h1>
            </div>
        </div>
        @if(!$prop->isEmpty())
        <div class="row">
            @foreach($prop as $cou => $catg)
                @foreach($catg->children as $count => $subcatg)
            <div class="col-md-3 card mb-4 border-0">
                <img src="{{asset('images/'.$subcatg->featured)}}" class="card-img-top" alt="...">
                <div class="shadow-sm">
                    <div class="card-body px-1 ">
                        <p class="font-weight-bold mb-0">{{$catg->name}}</p>
                        <p class="small mb-0">Hotel Address</p>
                        <span class="badge badge-success">4.7 <i class="fas fa-star"></i></span> (62 Ratings)

                    </div>
                    <div class="card-footer bg-transparent border-0 px-1 ">
                        <strong> ₹45</strong> per night <a href="/property/{{$catg->id}}" class="btn btn-outline-info btn-sm float-right mb-2">View Detail</a>
                    </div>
                </div>
            </div>
                @endforeach
            @endforeach
        </div>
        @else
            <img style="width: 100%" src="{{asset('alotfront/assets/images/images.png')}}">
        @endif
    </div>
</section>
    @endforeach
@endsection
