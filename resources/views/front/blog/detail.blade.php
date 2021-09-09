@extends('front.blog.layout.header',['schema'=>$data[0]->seo[0]->json_schema])
@section('show',true)
@section('title',$data[0]->title)
@section('description',$data[0]->seo[0]->description)
@section('published_on',$data[0]->created_at)
@section('updated_on',$data[0]->updated_at)
@section('featured',env('MEDIA_URL').'blog/'.$data[0]->id.'/image/'.$data[0]->image)
@section('canonical',$data[0]->seo[0]->canonical)
@section('keyword',$data[0]->seo[0]->primary_focus_keyword)
{{--@section('author_name','Deb Jyoti Shah')--}}
@section('seo_url','https://'.Request::getHost())
@section('content')
    @foreach($data as $d => $val)
    <seaction id="breadcrumb">
    <div class="container py-2 small">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="/search?catg={{$val->catg[0]->name}}" class="text-decoration-none">{{$val->catg[0]->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$val->title}}</li>
            </ol>
        </nav>
    </div>
</seaction>
<section id="main-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-3 blog-detail">
                <h1 class="">{{$val->title}}</h1>
                <p class="pcolor my-1">{{date('F Y',strtotime($val->updated_at))}}</p>
                <img src="{{env('MEDIA_URL')}}blog/{{$val->id}}/image/{{$val->image}}" witth="100%" alt="">
                <div>
                    {!! $val->content !!}
                </div>
                <h5 class="mt-4"><i class="far fa-comments"></i> Leave a Comment</h5>
                @if (\Session::has('success') || \Session::has('error'))
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            {!! \Session::get('success') !!}
                        </div>
                    @elseif(\Session::has('error'))
                        <div class="alert alert-danger">
                            {!! \Session::get('error') !!}
                        </div>
                    @endif
                @else
                <div class="bg-white p-3">

                    <form action="/comment" method="POST">
                        <div >
                            @csrf
                            <input type="hidden" value="{{$val->id}}" name="blog_id">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="email" class="form-control" placeholder="Email address" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <textarea name="content" class="form-control" rows="4" placeholder="Write Your Comment" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary px-5">Post a Comment</button>
                    </form>
                </div>
                @endif

            </div>
            <div class="col-md-4 mb-3 sidebar">
                <ul class="list-unstyled ver-line-menu social-links-gray my-3 text-center">
                    <li class="fw-bold">Follow Us On:</li>
                    <li><a href="https://www.facebook.com/admissionjockey" class="text-decoration-none"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://www.instagram.com/admissionjockeyofficial/" class="text-decoration-none"><i class="fab fa-instagram"></i> </a></li>
                    <li><a href="https://twitter.com/admissionjockey" class="text-decoration-none"><i class="fab fa-twitter"></i> </a></li>
                </ul>
                <hr>
                <div class="sticky-top">
                    <div class="enq-form bg-white p-3 site-form-shadow">
                        @if (\Session::has('informationSuccess') || \Session::has('informationError'))
                            @if (\Session::has('informationSuccess'))
                                <div class="alert alert-success">
                                    {!! \Session::get('informationSuccess') !!}
                                </div>
                            @elseif(\Session::has('informationError'))
                                <div class="alert alert-danger">
                                    {!! \Session::get('informationError') !!}
                                </div>
                            @endif
                        @else
                        <h2>Get Free Consulting</h2>
                        <p>we providing expert guidence</p>
                        <form action="/information-submit" class="needs-validation" novalidate method="POST">
                            @csrf
                            <input type="hidden" name="url" value="{{Request::path()}}">
                            <div class="mb-2">
                                <label for="exampleInput" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="exampleInput" required>
                            </div>
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Prefered Course</label>
                                <select name="course" id="" class="form-control" required>
                                    <option value="" disabled selected>Select Course</option>
                                    @foreach($courses as $c => $vsl)
                                        @foreach($vsl->children as $s => $vals)
                                            <option value="{{$vals->id}}">{{$vals->name}}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Email Id</label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-2">
                                <label for="exampleInputPassword1" class="form-label">Phone No</label>
                                <input type="text" class="form-control" name="contact" id="exampleInputPassword1" required>
                            </div>
                            <button type="submit" class="btn site-btn-2">Submit</button>
                        </form>
                        @endif
                    </div>
                    <hr>
                    <div class="">
                        <h2 class="sidebar-title-h2">Similar read</h2>
                        @foreach($related as $r => $rel)
                            @if($rel->id != $val->id)
                        <div class="mb-3">
                            <div class="blog-card">
                                <div class="card-featured-img" style="background:url({{env('MEDIA_URL')}}blog/{{$rel->id}}/image/{{$rel->image}});background-size: cover;background-position: center;"></div>

                                <div class="px-4 content-box">
                                    <a href="/{{$rel->seo[0]->permalink}}"><h2 class="blog-title f18">{{$rel->title}}</h2> </a>
                                    <p class="f14"><?php
                                        $string = strip_tags($val->content);
                                        if (strlen($string) > 60) {

                                            // truncate string
                                            $stringCut = substr($string, 0, 60);
                                            $endPoint = strrpos($stringCut, ' ');

                                            //if the string doesn't contain any space then it will cut without word basis.
                                            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                            $url = $val->seo[0]->permalink;
                                            $string .= '...';
                                        }
                                        echo $string;
                                        ?><a href="/{{$rel->seo[0]->permalink}}">Read More</a></p>
                                </div>
                            </div>
                        </div>
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
    @endforeach
@endsection
@section('script')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
@endsection
