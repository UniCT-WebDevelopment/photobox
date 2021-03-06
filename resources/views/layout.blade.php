<!DOCTYPE html>
<html lang="it">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta name="author" content="{{ env('AUTHORS') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ========== Title ========== -->
    <title>{{ env('APP_NAME') }}</title>

    <!-- ========== Favicon Ico ========== -->
    <link rel="icon" href="{{ url('/') }}/images/fav.png">

    <!-- ========== STYLESHEETS ========== -->
    <!-- Bootstrap CSS -->
    <link href="{{ url('/') }}/css/cocoon/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts Icon CSS -->
    <link href="{{ url('/') }}/css/cocoon/font-awesome.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/css/cocoon/et-line.css" rel="stylesheet">
    <link href="{{ url('/') }}/css/cocoon/ionicons.min.css" rel="stylesheet">

    <!-- Carousel CSS -->
    <link href="{{ url('/') }}/css/cocoon/slick.css" rel="stylesheet">

    <!-- Magnific-popup -->
    <link href="{{ url('/') }}/css/cocoon/magnific-popup.css" rel="stylesheet">

    <!-- Animate CSS -->
    <link href="{{ url('/') }}/css/cocoon/animate.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ url('/') }}/css/cocoon/main.css" rel="stylesheet">

    <!-- Dropzone CSS -->
    <link href="{{ url('/') }}/css/cocoon/dropzone.css" rel="stylesheet">

    <!-- Cropper CSS -->
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />

    <!-- jquery UI CSS -->
    <link href="{{ url('/') }}/css/cocoon/jquery-ui.css" rel="stylesheet">

    <!-- ========== SCRIPT ========== -->
    <!-- jquery -->
    <script src="{{ url('/') }}/js/cocoon/jquery.min.js"></script>
</head>

<body>
    <div class="loader">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>
    </div>

    <div class="body-container container-fluid">
        <a class="menu-btn" href="javascript:void(0)">
            <i class="ion ion-grid"></i>
        </a>
        <div class="row justify-content-center">
            <!--=================== side menu ====================-->
            <div class="col-lg-2 col-md-3 col-12 menu_block">
                <!-- profile photo -->
                @component('component.profilePhotoComponent', ['user' => $user]) @endcomponent

                <!--main menu -->
                @component('component.menuComponent', ['page' => $page]) @endcomponent

                <!--social and copyright -->
                @component('component.copyrightComponent') @endcomponent
            </div>

            <!--=================== content body ====================-->
            <div class="col-lg-10 col-md-9 col-12 body_block  align-content-center">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- ========== SCRIPT ========== -->

    <!-- bootstrap -->
    <script src="{{ url('/') }}/js/cocoon/popper.js"></script>
    <script src="{{ url('/') }}/js/cocoon/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/js/cocoon/waypoints.min.js"></script>

    <!--slick carousel -->
    <script src="{{ url('/') }}/js/cocoon/slick.min.js"></script>

    <!--Portfolio Filter-->
    <script src="{{ url('/') }}/js/cocoon/imgloaded.js"></script>
    <script src="{{ url('/') }}/js/cocoon/isotope.js"></script>

    <!-- Magnific-popup -->
    <script src="{{ url('/') }}/js/cocoon/jquery.magnific-popup.min.js"></script>

    <!--Counter-->
    <script src="{{ url('/') }}/js/cocoon/jquery.counterup.min.js"></script>

    <!-- WOW JS -->
    <script src="{{ url('/') }}/js/cocoon/wow.min.js"></script>

    <!-- Main JS -->
    <script src="{{ url('/') }}/js/cocoon/main.js"></script>

    <!-- Function JS -->
    <script src="{{ url('/') }}/js/cocoon/function.js"></script>

    <!-- Jquery UI -->
    <script src="{{ url('/') }}/js/cocoon/jquery-ui.min.js"></script>
</body>

</html>