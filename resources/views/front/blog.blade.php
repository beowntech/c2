@extends('front.layout.header')
@section('content')
<div class="bg-light">
<section class="py-4">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="#!">Blog</a></li>
{{--                    <li class="breadcrumb-item active" aria-current="page"></li>--}}
                </ol>
            </nav>

            <div class="col-md-10 offset-md-1 blogs-section">
                @foreach($data as $d => $val)
                <div class="blog-data px-2 py-3 mb-3 bg-white">

                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="mb-lg-0 mb-4" style="{{$val->image == null ? "text-align-last: center;" :""}}">
                            <img src="{{$val->image != null ? "/blog/$val->id/image/$val->image" : "/assets/images/admission-jockey-logo.png"}}" style="{{$val->image == null ? "width:70% !important" :""}}" class="w-100 mb-3" alt="" srcset="">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h1><a href="/{{$val->seo[0]->permalink}}"> {{$val->title}}</a> </h1>
<?php
                        $string = strip_tags($val->content);
                        if (strlen($string) > 500) {

                            // truncate string
                            $stringCut = substr($string, 0, 400);
                            $endPoint = strrpos($stringCut, ' ');

                            //if the string doesn't contain any space then it will cut without word basis.
                            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                            $url = $val->seo[0]->permalink;
                            $string .= '... <span class="float-end"><a href="/'.$url.'" class="mr-2 read-link">Read More</a></span>';
                        }
                        echo $string;
                        ?>
                    </div>
                </div>
                </div>
                @endforeach
                    @include('front.pagination.index', ['paginator' => $data])
{{--                    {{ $data->links() }}--}}
{{--                <nav aria-label="Page navigation example">--}}
{{--                <ul class="pagination justify-content-end">--}}
{{--                    <li class="page-item disabled">--}}
{{--                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>--}}
{{--                    </li>--}}
{{--                    <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                    <li class="page-item">--}}
{{--                    <a class="page-link" href="#">Next</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--                </nav>--}}
            </div>
        </div>
    </div>

</section>
</div>
@endsection
