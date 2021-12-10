@extends('v2.front.cyber.layout.header')
@section('content')
<section class="bglg">
    <div class="container">
        <div class="row py-5">
            <div class="col-md-8 offset-md-2 p-3  bg-white border-radius-sm">
                <div class="row py-3">
                    <div class="col-md-6 text-center py-3">
                         <img src="/v2/assets/images/site/login.png" width="80%"  alt="">
                    </div>
                    <div class="col-md-6">
                        <h2 class="mb-3 f-22 fw-6">Cyber Partner Login</h2>
                        <form action="{{route('cyber-login-request')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Your Email</label>
                                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-4">
                                <label for="exampleInputEmail1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn site-btn-1 ">Login</button><br>
                                <a href="/cyber-partner" class="btn site-btn-2" >Register</a>
                            </div>
                        </form>
                        @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul style="margin: 0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
