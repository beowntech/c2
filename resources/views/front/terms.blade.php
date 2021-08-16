@extends('front.layout.header')
@section('content')
<main id="main">
<section class="breadcrumbs">
    <div class="container">
    <h1>Terms & Condition</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Terms of use</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col">
                {!! $data[0]->content !!}
            </div>
        </div>
    </div>
</section>
</main>
@endsection