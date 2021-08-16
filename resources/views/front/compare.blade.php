@extends('front.layout.header')
@section('content')
<section id="compare-table">
    <div class="container">
        <div class="row my-4">
            <div class="col">
                <h1 class="site-title">Compare</h1>
                <p class="title-desc">Choose Top of the best Colleges / Exams </p>
            </div>
        </div>
        <div class="row">
            <div class="col table-responsive-sm">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th scope="col align-middle"><img src="/assets/images/admission-jockey-logo.png" width="90px" class="align-middle py-5" alt=""></th>
                        <th scope="col align-middle" >
                            <div id="compareOneShow">
                            <div class="college-info-1">
                               <div class="flexColumnCenterMiddle dotbox add-college-div1"><i class="fa fa-plus plus-college"></i>Add College</div>
                            </div>
                            <!--<p>OR</p>-->
                            <!--<p class="golden-color"><i class="fas fa-star"></i> 9/10</p>-->
                            </div>
                            <div class="" id="compareoneDIV">
                            <select id="compareone" >
                                <option value="" selected disabled="true">Select College</option>
                                @foreach($data as $k => $val)
                                        <option  value="{{$val->id}}">{{$val->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </th>
                        <th scope="col align-middle" >
                            <div id="compareTwoShow">
                            <div class="college-info-1">
                               <div class="flexColumnCenterMiddle dotbox add-college-div2"><i class="fa fa-plus plus-college"></i>Add College</div>
                            </div>
                            <!--<p> OR</p>-->
                            <!--<p class="golden-color"><i class="fas fa-star"></i> 7/10</p>-->
                            </div>
                            <div class="" id="comparetwoDIV">
                                <select id="comparetwo" >
                                    <option value="" selected disabled="true">Select College</option>
                                    @foreach($data as $k => $val)
                                        <option  value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </th>
                        <th scope="col align-middle">
                            <div id="compareThreeShow">
                            <div class="college-info-1">
                                 <div class="flexColumnCenterMiddle dotbox add-college-div3"><i class="fa fa-plus plus-college"></i>Add College</div>
                            </div>
                            <!--<p> OR </p>-->
                            <!--<p class="golden-color"> - </p>-->
                            </div>
                            <div class="" id="comparethreeDIV">
                                <select id="comparethree" >
                                    <option value="" selected disabled="true">Select College</option>
                                    @foreach($data as $k => $val)
                                        <option  value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="collegename">
                        <th scope="row">College Name</th>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr class="affiliate">
                        <th scope="row">Affiliate By</th>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr class="address">
                        <th scope="row">Address</th>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr class="state">
                        <th scope="row">State</th>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr class="city">
                        <th scope="row">City</th>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr class="course">
                        <th scope="row">Cousre</th>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr class="buttontr">
                        <th scope="row"></th>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
