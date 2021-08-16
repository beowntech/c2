@extends("front.layout.header2")
@section('content')
    <section class="inn-page-bg">
        <div class="container">
            <div class="row">
                <div class="inn-pag-ban">
                    <h2>Compare Colleges</h2>
                    <h5></h5>
                </div>
            </div>
        </div>
    </section>
    <section class="p-about com-padd com-padd-redu-bot1">
        <div class="container">
                <div class="row">
                    <div class="col-md-12 my-4 mx-auto">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="table-responsve">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead-inverse">
                                        <tr>
                                            <th class="">
                                                <div style="display: none;text-align: center;" id="detailCompareoneDIV">
                                                    <img id="compareoneImage" src="" style="height: 200px;padding-bottom: 10px">
                                                    <br>
                                                    <p id="compareoneTitle"></p>
                                                    <p id="compareoneAddress"></p>
                                                </div>
                                                <div class="row">
                                                    <select class="" id="compareone">
{{--                                                        <option value="" disabled selected="true">Select College</option>--}}
                                                        @foreach($data as $k => $val)
                                                            @if(Request::get('compare1') == $val->id)
                                                                <option selected value="{{$val->id}}">{{$val->name}}</option>
                                                            @else
                                                                <option  value="{{$val->id}}">{{$val->name}}</option>
                                                            @endif
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody id="table-compareone">
                                        <tr>
                                        </tr>
                                        </tbody>
                                        <tfoot class="thead-inverse">
                                        <tr>
                                            <th class="w-25"></th>
{{--                                            <th class=""><button class="btn btn-primary">Sign-up</button></th>--}}
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="table-responsve">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead-inverse">
                                        <tr>
                                            <th class="">
                                                <div style="display: none;text-align: center;" id="detailComparetwoDIV">
                                                    <img id="comparetwoImage" src="" style="height: 200px;padding-bottom: 10px">
                                                    <br>
                                                    <p id="comparetwoTitle"></p>
                                                    <p id="comparetwoAddress"></p>
                                                </div>
                                                <div class="row">
                                                    <select class="" id="comparetwo">
{{--                                                        <option value="" disabled selected="true">Select College</option>--}}
                                                        @foreach($data as $k => $val)
                                                            @if(Request::get('compare2') == $val->id)
                                                                <option selected value="{{$val->id}}">{{$val->name}}</option>
                                                            @else
                                                                <option  value="{{$val->id}}">{{$val->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody id="table-comparetwo">
                                        </tbody>
                                        <tfoot class="thead-inverse">
                                        <tr>
                                            <th class="w-25"></th>
                                            {{--                                            <th class=""><button class="btn btn-primary">Sign-up</button></th>--}}
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="table-responsve">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead-inverse">
                                        <tr>
                                            <th class="">
                                                <div style="display: none;text-align: center;" id="detailComparethreeDIV">
                                                    <img id="comparethreeImage" src="" style="height: 200px;padding-bottom: 10px">
                                                    <br>
                                                    <p id="comparethreeTitle"></p>
                                                    <p id="comparethreeAddress"></p>
                                                </div>
                                                <div class="row">
                                                    <select class="" id="comparethree">
{{--                                                        <option value="" disabled selected="true">Select College</option>--}}
                                                        @foreach($data as $k => $val)
                                                            @if(Request::get('compare3') == $val->id)
                                                                <option selected value="{{$val->id}}">{{$val->name}}</option>
                                                            @else
                                                                <option  value="{{$val->id}}">{{$val->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody id="table-comparethree">
                                        </tbody>
                                        <tfoot class="thead-inverse">
                                        <tr>
                                            <th class="w-25"></th>
                                            {{--                                            <th class=""><button class="btn btn-primary">Sign-up</button></th>--}}
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <hr>
        </div>
    </section>

@endsection
