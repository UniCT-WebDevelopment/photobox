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
    <link rel="icon" href="images/fav.png">

    <!-- ========== STYLESHEETS ========== -->
    <!-- Bootstrap CSS -->
    <link href="css/cocoon/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts Icon CSS -->
    <link href="css/cocoon/font-awesome.min.css" rel="stylesheet">
    <link href="css/cocoon/et-line.css" rel="stylesheet">
    <link href="css/cocoon/ionicons.min.css" rel="stylesheet">

    <!-- Carousel CSS -->
    <link href="css/cocoon/slick.css" rel="stylesheet">

    <!-- Magnific-popup -->
    <link rel="stylesheet" href="css/cocoon/magnific-popup.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/cocoon/animate.min.css">

    <!-- Custom styles for this template -->
    <link href="css/cocoon/main.css" rel="stylesheet">

    <!-- Dropzone CSS -->
    <link href="css/cocoon/dropzone.css" rel="stylesheet">

    <!-- Cropper CSS -->
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
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

                <!--filter menu -->
                {{-- <div class="side_menu_section">
                    <h4 class="side_title">filtra per:</h4>
                    <ul id="filtr-container" class="filter_nav">
                        <li data-filter="*" class="active"><a href="javascript:void(0)">tutte</a></li>
                        <li data-filter=".branding"> <a href="javascript:void(0)">top of the week</a></li>
                        <li data-filter=".design"><a href="javascript:void(0)">top of the mounth</a></li>
                        <li data-filter=".photography"><a href="javascript:void(0)">the best of ever</a></li>
                    </ul>
                </div> --}}
                <!--filter menu end -->

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
    <!-- jquery -->
    <script src="js/cocoon/jquery.min.js"></script>

    <!-- bootstrap -->
    <script src="js/cocoon/popper.js"></script>
    <script src="js/cocoon/bootstrap.min.js"></script>
    <script src="js/cocoon/waypoints.min.js"></script>

    <!--slick carousel -->
    <script src="js/cocoon/slick.min.js"></script>

    <!--Portfolio Filter-->
    <script src="js/cocoon/imgloaded.js"></script>
    <script src="js/cocoon/isotope.js"></script>

    <!-- Magnific-popup -->
    <script src="js/cocoon/jquery.magnific-popup.min.js"></script>

    <!--Counter-->
    <script src="js/cocoon/jquery.counterup.min.js"></script>

    <!-- WOW JS -->
    <script src="js/cocoon/wow.min.js"></script>

    <!-- Main JS -->
    <script src="js/cocoon/main.js"></script>

    <!-- Function JS -->
    <script src="js/cocoon/function.js"></script>
</body>

</html>