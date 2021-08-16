@extends('front.layout.header')
@section('content')
<main id="main" class="bg-light">
    <section class="breadcrumbs">
        <div class="container">
            <h1>{{Auth::user()->name}}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cyber Partner</li>
                </ol>
            </nav>
            <div style="text-align-last: right;">
                <a href="/cyber-dashboard" class="btn btn-primary">Add Leads</a>
            </div>
        </div>
    </section>
    <section>
        <div class="container" data-aos="fade-up">
            <div class="section-header text-center py-4">
                <h2 class="site-title">Admission Jocky Leads Board?</h2>

            </div>
            <div class="row gy-4 bg-white pb-2">
                <div class="col-lg-12">
                    <div class="table-responsive">
                    <table class="table table-striped table-hover" id="CyberLeadsTable">
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
                                <td>{{$val->interested_college}}</td>
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
