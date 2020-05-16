<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>SMK 14 Bandung</title>
  <!-- Favicon -->
  <link rel="icon" href="/assets/img/icons/logo-dark.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="/assets/css/argon.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" href="/css/style.css" type="text/css">
  <link rel="stylesheet" href="{{ asset('DataTables/datatables.css') }}">

</head>

<body>
  @include('admin._include.sidebar')
  <div class="main-content" id="panel">
    @include('admin._include.header')
    <div class="container-fluid bg-primary">
      @yield('content')
       <!-- Footer -->
      <footer class="footer pt-0 bg-primary">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-white text-lg-left  text-muted">
              &copy; 2020
              <a href="https://www.smkn14bdg.sch.id/" class="font-weight-bold ml-1 text-white" target="_blank">www.smkn14bdg.sch.id
              </a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer  justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="mailto:smk14bdg@yahoo.com" class="nav-link" target="_blank" style="color: white !important">smk14bdg@yahoo.com</a>
              </li>
              <li class="nav-item">
                <a href="tel:0227560358" class="nav-link " target="_blank"style="color: white !important">(022) 7560358</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@yield('footer')
    <!-- Core -->
  <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="/assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="/assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="/assets/js/argon.js?v=1.2.0"></script>
  <script src="{{ asset('DataTables/datatables.js') }}"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#dataTables').DataTable([{
      responsive : true
    }]);
  });
  </script>
</body>

</html>
