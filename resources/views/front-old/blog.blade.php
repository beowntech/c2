@extends("front.layout.header2")
@section('content')
    <section class="inn-page-bg">
        <div class="container">
            <div class="row">
                <div class="inn-pag-ban">
                    <h2>Blog and Articles</h2>
                    <h5>Grow your business by getting relevant and verified leads</h5> </div>
            </div>
        </div>
    </section>
    <section class="p-about com-padd">
        <div class="container">
            @foreach($data as $d => $val)
            <div class="row blog-single">
                <div class="col-md-4">
                    <div class="blog-img"> <img src="images/services/20.jpg" alt="" /> </div>
                </div>
                <div class="col-md-8">
                    <div class="page-blog">
                        <h3>{{$val->title}}</h3> <span>{{date('F d,Y',strtotime($val->created_at))}}</span>
                        <p>{!! Str::limit(strip_tags($val->content),500) !!}</p> <a class="waves-effect waves-light btn-large full-btn" href="/blog/{{$val->seo[0]->permalink}}">Read More</a> </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
