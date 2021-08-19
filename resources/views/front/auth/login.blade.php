@extends('front.layout.header')
@section('content')
<section>
	<div class="container py-4">
		<div class="row content">
            <div class="col-md-12 text-center pb-4">
                <h2>Cyber Partner Login</h2>
            </div>
			<div class="col-md-4 offset-md-4 p-4" style="background: white;border-radius: 20px;">
				<form action="/user/login" method="POST">
				    @csrf
				    <div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">Email address</label>
					<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				    </div>
				    <div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Password</label>
					<input type="password" name="password" class="form-control" id="exampleInputPassword1">
				    </div>
				    <button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection
