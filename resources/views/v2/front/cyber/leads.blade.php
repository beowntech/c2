@extends('v2.front.cyber.layout.header')
@section('content')
<style>
    #CyberLeadsTable_filter{
        margin-bottom:15px !important;
    }
    #CyberLeadsTable_filter input{
        border-radius: 34px;
        padding: 10px;
    background: white;
    }
    table thead{
        background: #033794;
        color: white;
    }
</style>
<main id="main" class="bg-light">
    <section class="breadcrumbs">
        <div class="container">
            <div class="row ">
                <div class="col-3 mt-2"><h4><strong>Hello {{explode(' ',Auth::user()->name)[0]}}</strong></h4></div>
                <div class="col-md-auto mt-2">
                    <a href="" class="btn btn-primary" style="background: #033794;border-radius:20px;">Logout</a>
                </div>
            </div>
            <div style="text-align-last: right;">
                <a href="{{route('cyber-add-lead')}}" class="btn btn-primary" style="background: #033794;border-radius:20px;">Add Lead</a>
            </div>
        </div>
    </section>
    <section>
        <div class="container" data-aos="fade-up">
            <div class="section-header py-4">
                <h3 class="site-title">Dashboard</h3>

            </div>
            <div class="row gy-4 pb-2">
                <div class="col-lg-12">
                    <div class="table-responsive">
                    <table class="table table-striped bg-white table-hover" id="CyberLeadsTable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Interested Course</th>
                            <th scope="col">Interested College</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $d => $val)
                            <tr>
                                <th scope="row">{{ $d + 1}}</th>
                                <td>{{$val->name}}</td>
                                <td>{{$val->email}}</td>
                                <td>{{$val->contact}}</td>
                                <td>{{$val->interested_course}}</td>
                                <td>{{$val->college->name}}</td>
                                <td>
                                    @if($val->status == 0)
                                        <span class="badge bg-dark">Fresh</span>
                                    @elseif($val->status == 1)
                                        <span class="badge bg-warning">Working</span>
                                    @elseif($val->status == 2)
                                        <span class="badge bg-success">Converted</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>

            </div>


        </div>
    </section>

</main>
@endsection
