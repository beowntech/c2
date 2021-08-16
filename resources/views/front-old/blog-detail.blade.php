@extends("front.layout.header2")
@section('content')
    @foreach($data as $d => $val)
    <section class="inn-page-bg">
        <div class="container">
            <div class="row">
                <div class="inn-pag-ban">
                    <h2>{{$val->title}}</h2>
                    <h5>{{$val->catg[0]->name}}</h5> </div>
            </div>
        </div>
    </section>
    <section class="p-about com-padd">
        <div class="container">
            <div class="row blog-single con-com-mar-bot-o">
                <div class="col-md-4">
                    <div class="blog-img"> <img src="front/images/services/20.jpg" alt="" /> </div>
                </div>
                <div class="col-md-8">
                    <div class="page-blog">
                        <h3>{{$val->title}}</h3> <span>{{date('F d,Y',strtotime($val->created_at))}}</span>
                        <div class="share-btn share-pad-bot">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook fb1"></i> Share On Facebook</a> </li>
                                <li><a href="#"><i class="fa fa-twitter tw1"></i> Share On Twitter</a> </li>
                                <li><a href="#"><i class="fa fa-google-plus gp1"></i> Share On Google Plus</a> </li>
                            </ul>
                        </div>
                        {!! $val->content !!}
                        <div class="pglist-p3 pglist-bg pglist-p-com">
                            <div class="pglist-p-com-ti blog-comment">
                                <h3><span>Write Your</span> Comments</h3> </div>
                            <div class="list-pg-inn-sp">
                                <div class="list-pg-write-rev">
                                    <form class="col">
                                        <p>Writing great reviews may help others discover the places that are just apt for them. Here are a few tips to write a good review:</p>
                                        <div class="row">
                                            <div class="col s12">
                                                <fieldset class="rating">
                                                    <input type="radio" id="star5" name="rating" value="5">
                                                    <label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                    <input type="radio" id="star4half" name="rating" value="4 and a half">
                                                    <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                    <input type="radio" id="star4" name="rating" value="4">
                                                    <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                    <input type="radio" id="star3half" name="rating" value="3 and a half">
                                                    <label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                    <input type="radio" id="star3" name="rating" value="3">
                                                    <label class="full" for="star3" title="Meh - 3 stars"></label>
                                                    <input type="radio" id="star2half" name="rating" value="2 and a half">
                                                    <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                    <input type="radio" id="star2" name="rating" value="2">
                                                    <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                    <input type="radio" id="star1half" name="rating" value="1 and a half">
                                                    <label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                    <input type="radio" id="star1" name="rating" value="1">
                                                    <label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                    <input type="radio" id="starhalf" name="rating" value="half">
                                                    <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input id="re_name" type="text" class="validate">
                                                <label for="re_name">Full Name</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input id="re_mob" type="number" class="validate">
                                                <label for="re_mob">Mobile</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input id="re_mail" type="email" class="validate">
                                                <label for="re_mail">Email id</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input id="re_city" type="text" class="validate">
                                                <label for="re_city">City</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea id="re_msg" class="materialize-textarea"></textarea>
                                                <label for="re_msg">Write review</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12"> <a class="waves-effect waves-light btn-large full-btn" href="#!">Submit Review</a> </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
@endsection
