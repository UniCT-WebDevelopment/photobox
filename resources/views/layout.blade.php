<!DOCTYPE html>
<html lang="it">
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta name="author" content="{{ env('AUTHORS') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- ========== Title ========== -->
    <title>{{ env('APP_NAME') }}</title>

    <!-- ========== Favicon Ico ========== -->
    <!--<link rel="icon" href="fav.ico">-->

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
            <div id="colorlib-aside" class="logo_box">
                <h1 id="colorlib-logo">
                    <span class="img" style="background-image: url(images/users/author.jpg);"></span>
                    <a href="#">@yield('nome_utente')</a>
                </h1>
            </div>
            <!-- profile photo end-->

            <!--main menu -->
            <div class="side_menu_section">
                <ul class="menu_nav">
                    <li class="active">
                        <a href="feed">Home</a>
                    </li>
                    <li>
                        <a href="#">Carica foto</a>
                    </li>
                    <li>
                        <a href="#">Le mie foto</a>
                    </li>
                    <li>
                        <a href="profile">Il mio Profilo</a>
                    </li>
                    <li>
                        <a href="logout">Esci</a>
                    </li>
                </ul>
            </div>
            <!--main menu end -->

            <!--filter menu -->
            <div class="side_menu_section">
                <h4 class="side_title">filtra per:</h4>
                <ul  id="filtr-container"  class="filter_nav">
                    <li  data-filter="*" class="active"><a href="javascript:void(0)" >tutte</a></li>
                    <li data-filter=".branding"> <a href="javascript:void(0)">top of the week</a></li>
                    <li data-filter=".design"><a href="javascript:void(0)">top of the mounth</a></li>
                    <li data-filter=".photography"><a href="javascript:void(0)">the best of ever</a></li>
                </ul>
            </div>
            <!--filter menu end -->

            <!--social and copyright -->
            <div class="side_menu_bottom">
                <div class="side_menu_bottom_inner">
                    <div class="copy_right">
                        <p>© 2019 {{ env('APP_NAME') }}. All rights reserved </p>
                        <p>Design by: {{ env('AUTHORS') }}</p>
                    </div>
                </div>
            </div>
            <!--social and copyright end -->

        </div>
        <!--=================== side menu end====================-->

        <!--=================== content body ====================-->
        <div class="col-lg-10 col-md-9 col-12 body_block  align-content-center">
            @yield('content')
        </div>
        <!--=================== content body end ====================-->
    </div>
</div>

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

    <!-- Custom js -->
    <script src="js/cocoon/main.js"></script>
</body>
</html>