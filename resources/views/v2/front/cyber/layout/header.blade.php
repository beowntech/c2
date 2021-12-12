<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    @desktop
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @elsedesktop
     <!-- for forcefully desktop version in mobile  -->
     <meta name="viewport" content="width=1200">
     <!-- end for forcefully desktop version in mobile  -->
    @enddesktop
    <script src="https://kit.fontawesome.com/0bee4dcff2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/v2/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('assets/css/jquery.datatable.min.css')}}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css">
    <title>Cyber Partner</title>
  </head>
  <style>
      .selectize-dropdown-content div{
        padding: 3px 10px;
    }
  </style>
  <body>

  <section class="blog-site-menu site-shadow-sm">
        <div class="container">
          <div class="row py-3">
            <div class="col-md-12">
               <a href="/"><img src="/v2/assets/images/admission-jockey-logo1-main.png" class="logo" alt=""></a>

              <ul class="list-unstyled ver-line-menu float-end mb-0">
                  <li><a href="mailto:contact@admissionjockey.com" class="text-decoration-none link-a"> <img src="assets/images/icon/email.png" alt=""><span class="sm-hide"> contact@admissionjockey.com </span> </a></li>
                  <li><a class="text-decoration-none link-a sm-hide"> <img src="assets/images/icon/call.png" alt=""> <span class="sm-hide">+91 7060243009 </span> </a></li>
                  <li><a href="tel:+91 7060243009" class="text-decoration-none link-a d-sm-none"> <img src="assets/images/icon/call.png" alt=""> <span class="sm-hide">+91 7060243009 </span> </a></li>

              </ul>

            </div>
          </div>
        </div>
     </section>
     @yield('content')
     @include('v2.front.layout.footer')
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"
            src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
     <script>
        $(document).ready(function () {

   $('#CyberLeadsTable').DataTable({
       responsive: true
   });
        });
    </script>
