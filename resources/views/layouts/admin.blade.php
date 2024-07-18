<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Suu truyen - Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    {{-- <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" /> --}}

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.6.0/lumen/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset("/asset/css/bootstrap.min.css") }}">

    <link rel="stylesheet" href="{{ asset('lib/dataTable/dataTables.dataTables.min.css')  }}">

    <link rel="stylesheet" href="{{ asset("/asset/css/darkpan.css") }}">

    <link rel="stylesheet" href="{{ asset("/asset/css/check_file_manager.css") }}">

    <link rel="stylesheet" href="{{ asset("/lib/tag/styles.css") }}">

    <link rel="stylesheet" href="{{ asset("/asset/css/main.css") }}">

    @yield('css')

</head>

<body>


    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        @yield("sidebar")

        @yield("modal")

        @yield("root")

        <!-- Back to Top -->
        {{-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> --}}

    </div>

    <!-- JavaScript Libraries -->


    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    {{-- <script src="{{ asset('asset/js/jquery.min.js') }}"></script> --}}
    <script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/dataTable/dataTables.min.js') }}"></script>
    <script src="{{ asset('lib/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('lib/alert/simple-notif.js') }}"></script>
    <script src="{{ asset('lib/tag/script.js') }}"></script>

    {{-- <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script> --}}

    <!-- Template Javascript -->
    <script src="{{ asset("/asset/js/dataTable.js") }}"></script>
    <script src="{{ asset("/asset/js/ckeditor.js") }}"></script>
    <script src="{{ asset("/asset/js/darkpan.js") }}"></script>
    <script src="{{ asset("/asset/js/app.js") }}"></script>

    @yield('script')

</body>

</html>
