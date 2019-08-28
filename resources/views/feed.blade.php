@extends('layout')

@section('nome_utente')
    {{ $user->nome }} {{ $user->cognome }}
@endsection

@section('content')
    <html lang="it">
    <head>
        <!-- ========== Meta Tags ========== -->
        <meta charset="UTF-8">
        <meta name="description" content="Cocoon -Portfolio">
        <meta name="keywords" content="Cocoon , Portfolio">
        <meta name="author" content="Pharaohlab">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
    <div class="body-container container-fluid">
            <a class="menu-btn" href="javascript:void(0)">
                <i class="ion ion-grid"></i>
            </a>

        <h1>Bacheca</h1>
        <div class="row">
            <!-- Photo Start-->
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-4">
                <div class="photo-container">
                    <div class="row photo-user">
                        <div class="col-md-7">
                            {{ $user->nickname }}
                        </div>
                        <div class="col-md-5 text-right">
                            28/08/2019
                        </div>
                    </div>
                    <div class="photo-border"></div>
                    <img class="img-fluid" src="images/cocoon/portfolio/home-port4.png">
                    <div class="photo-icons">
                        <div class="row">
                            <div class="col-md-4">
                                <i class="fa fa-thumbs-up"></i>&nbsp;+1
                            </div>
                            <div class="col-md-4">
                                <i class="fa fa-thumbs-down"></i>&nbsp;-1
                            </div>
                            <div class="col-md-4">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Map
                            </div>
                        </div>
                    </div>
                    <div class="photo-container-description">
                        <span class="photo-description">
                            Configuration and logfile names: If the filenames you specify for many, Configuration and logfile names: If the filenames you specify for many, Configuration and logfile names: If the filenames you specify for many, Configuration and logfile names: If th.
                        </span>
                    </div>
                </div>
            </div>
            <!-- Photo End-->

             <!-- Photo Start-->
             <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-4">
                <div class="photo-container">
                    <div class="row photo-user">
                        <div class="col-md-7">
                            {{ $user->nickname }}
                        </div>
                        <div class="col-md-5 text-right">
                            28/08/2019
                        </div>
                    </div>
                    <div class="photo-border"></div>
                    <img class="img-fluid" src="images/cocoon/portfolio/home-port4.png">
                    <div class="photo-icons">
                        <div class="row">
                            <div class="col-md-4">
                                <i class="fa fa-thumbs-up"></i>&nbsp;+1
                            </div>
                            <div class="col-md-4">
                                <i class="fa fa-thumbs-down"></i>&nbsp;-1
                            </div>
                            <div class="col-md-4">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Map
                            </div>
                        </div>
                    </div>
                    <div class="photo-container-description">
                        <span class="photo-description">
                            Configuration and logfile names: If the filenames you specify for many, Configuration and logfil.
                        </span>
                    </div>
                </div>
            </div>
            <!-- Photo End-->

            <!-- Photo Start-->
            <div class="col-md-3">
                <div class="photo-container">
                    <div class="row photo-user">
                        <div class="col-md-8">
                            {{ $user->nickname }}
                        </div>
                        <div class="col-md-4 text-right">
                            28/08/2019
                        </div>
                    </div>
                    <div class="photo-border"></div>
                    <img src="images/cocoon/portfolio/home-port5.png" alt="cocoon">
                    <div class="photo-icons">
                        <div class="row">
                            <div class="col-md-4">
                                <i class="fa fa-thumbs-up"></i>&nbsp;+1
                            </div>
                            <div class="col-md-4">
                                <i class="fa fa-thumbs-down"></i>&nbsp;-1
                            </div>
                            <div class="col-md-4 text-md-left">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Position
                            </div>
                        </div>
                    </div>
                    <div class="photo-container-description">
                        <span class="photo-description">
                            Configuration and logfile names: If the filenames you specify for many
                            Configuration and logfile names: If the filenames you specify for many
                            Configuration and logfile names:
                        </span>
                    </div>
                </div>
            </div>
            <!-- Photo End-->

            <!-- Photo Start-->
            <div class="col-md-3">
                <div class="photo-container">
                    <div class="row photo-user">
                        <div class="col-md-8">
                            {{ $user->nickname }}
                        </div>
                        <div class="col-md-4 text-right">
                            28/08/2019
                        </div>
                    </div>
                    <div class="photo-border"></div>
                    <img src="images/cocoon/portfolio/home-port6.png" alt="cocoon">
                    <div class="photo-icons">
                        <div class="row">
                            <div class="col-md-4">
                                <i class="fa fa-thumbs-up"></i>&nbsp;+1
                            </div>
                            <div class="col-md-4">
                                <i class="fa fa-thumbs-down"></i>&nbsp;-1
                            </div>
                            <div class="col-md-4 text-md-left">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Position
                            </div>
                        </div>
                    </div>
                    <div class="photo-container-description">
                        <span class="photo-description">
                            Configuration and logfile names: If the filenames you specify for many
                            Configuration and lo
                        </span>
                    </div>
                </div>
            </div>
            <!-- Photo End-->
        </div>
    </div>
@endsection