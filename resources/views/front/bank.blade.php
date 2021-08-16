@extends('front.layout.header')
@section('content')
    <section id="compare-table">
        <div class="container">
            <div class="row my-4">
                <div class="col">
                    <h1 class="site-title">Compare</h1>
                    <p class="title-desc">Choose Bank to Compare </p>
                </div>
            </div>
            <div class="row">
                <div class="col table-responsive-sm">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr class="text-center">
                            <th scope="col align-middle"><img src="/assets/images/admission-jockey-logo.png" width="90px" class="align-middle py-5" alt=""></th>
                            <th scope="col align-middle" >
                                <div id="compareOneShowBank">
                                    <div class="college-info-1">
                                        <div class="flexColumnCenterMiddle dotbox add-college-div1"><i class="fa fa-plus plus-college"></i>Add Bank</div>
                                    </div>
                                    <!--<p>OR</p>-->
                                    <!--<p class="golden-color"><i class="fas fa-star"></i> 9/10</p>-->
                                </div>
                                <div class="" id="compareoneDIVBank">
                                    <select id="compareoneBank" >
                                        <option value="" selected disabled="true">Select Bank</option>
                                        @foreach($data as $k => $val)
                                            <option  value="{{$val->id}}">{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </th>
                            <th scope="col align-middle" >
                                <div id="compareTwoShowBank">
                                    <div class="college-info-1">
                                        <div class="flexColumnCenterMiddle dotbox add-college-div2"><i class="fa fa-plus plus-college"></i>Add Bank</div>
                                    </div>
                                    <!--<p> OR</p>-->
                                    <!--<p class="golden-color"><i class="fas fa-star"></i> 7/10</p>-->
                                </div>
                                <div class="" id="comparetwoDIVBank">
                                    <select id="comparetwoBank" >
                                        <option value="" selected disabled="true">Select Bank</option>
                                        @foreach($data as $k => $val)
                                            <option  value="{{$val->id}}">{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </th>
                            <th scope="col align-middle">
                                <div id="compareThreeShowBank">
                                    <div class="college-info-1">
                                        <div class="flexColumnCenterMiddle dotbox add-college-div3"><i class="fa fa-plus plus-college"></i>Add Bank</div>
                                    </div>
                                    <!--<p> OR </p>-->
                                    <!--<p class="golden-color"> - </p>-->
                                </div>
                                <div class="" id="comparethreeDIVBank">
                                    <select id="comparethreeBank" >
                                        <option value="" selected disabled="true">Select Bank</option>
                                        @foreach($data as $k => $val)
                                            <option  value="{{$val->id}}">{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="bankname">
                            <th scope="row">Name</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr class="rate">
                            <th scope="row">Applicable Rate of Interest</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr class="loanB">
                            <th scope="row">Loan Security</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr class="penalty">
                            <th scope="row">Penal Charges</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr class="margin">
                            <th scope="row">Margin</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr class="wcoll">
                            <th scope="row">Max Loan with Collateral</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr class="wtcoll">
                            <th scope="row">Max Loan without Collateral</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr class="procfee">
                            <th scope="row">Processing Fee</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr class="rperiod">
                            <th scope="row">Repayment Period</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr class="lfinst">
                            <th scope="row">Loan for top Institutions</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr class="ecfss">
                            <th scope="row">Eligibility concession for SC/ST</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr class="pc">
                            <th scope="row">Prepayment charges</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr class="ageLimit">
                            <th scope="row">Age Limit</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr class="bta">
                            <th scope="row">Bank transfter allowance</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr class="tula">
                            <th scope="row">Top up Loan Availability</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr class="iss">
                            <th scope="row">Interest Subsidy Schemes</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr class="cbb">
                            <th scope="row">Concession/benefits</th>
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
