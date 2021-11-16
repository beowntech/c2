<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/0bee4dcff2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/v2/assets/css/style.css">

    <title>AJ Hostel</title>
  </head>
  <body>
    <section class="bgs">
        <div class="container">
          <div class="row">
            <div class="col py-2">
              <h2 class="d-inline-block"><a href="{{route('hostels')}}" class="text-white text-decoration-none"> Aj<span style="color:#ffcbcb !important;">hostel</span> </a></h2>
              <ul class="list-unstyled ver-line-menu float-end py-2">
                  <li class="text-white">+91 99977 40264</li>
                  <li class="text-white"><a href="mailto:contact@admissionjockey.com" class="text-white text-decoration-none">contact@admissionjockey.com</a></li>
              </ul>
            </div>
          </div>
        </div>
    </section>
    @yield('content')
    @include('v2.front.layout.hostel.footer')
