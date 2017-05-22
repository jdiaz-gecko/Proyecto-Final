<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <title>Adminto - Responsive Admin Dashboard Template</title>

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

    <!-- App css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo BASE_URL?>public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL?>public/assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL?>public/assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL?>public/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL?>public/assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL?>public/assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL?>public/assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo BASE_URL?>public/assets/js/modernizr.min.js"></script>

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="<?php echo BASE_URL?>public/assets/js/jquery.min.js"></script>
    <script src="<?php echo BASE_URL?>public/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL?>public/assets/js/detect.js"></script>
    <script src="<?php echo BASE_URL?>public/assets/js/fastclick.js"></script>
    <script src="<?php echo BASE_URL?>public/assets/js/jquery.slimscroll.js"></script>
    <script src="<?php echo BASE_URL?>public/assets/js/jquery.blockUI.js"></script>
    <script src="<?php echo BASE_URL?>public/assets/js/waves.js"></script>
    <script src="<?php echo BASE_URL?>public/assets/js/jquery.nicescroll.js"></script>
    <script src="<?php echo BASE_URL?>public/assets/js/jquery.slimscroll.js"></script>
    <script src="<?php echo BASE_URL?>public/assets/js/jquery.scrollTo.min.js"></script>

    <!-- KNOB JS -->
    <!--[if IE]>
    <script type="text/javascript" src="<?php echo BASE_URL?>public/assets/plugins/jquery-knob/excanvas.js"></script>
    <![endif]-->
    <script src="<?php echo BASE_URL?>public/assets/plugins/jquery-knob/jquery.knob.js"></script>

    <!--Morris Chart-->
    <script src="<?php echo BASE_URL?>public/assets/plugins/morris/morris.min.js"></script>
    <script src="<?php echo BASE_URL?>public/assets/plugins/raphael/raphael-min.js"></script>

    <!-- Dashboard init -->
    <script src="<?php echo BASE_URL?>public/assets/pages/jquery.dashboard.js"></script>

    <!-- App js -->
    <script src="<?php echo BASE_URL?>public/assets/js/jquery.core.js"></script>
    <script src="<?php echo BASE_URL?>public/assets/js/jquery.app.js"></script>

</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="<?php echo BASE_URL?>juego/index" class="logo"><img src="<?php echo BASE_URL?>public/assets/images/games.jpg" height="50px" alt="user-img" title="Mat Helme" class="img-thumbnail img-responsive"></a>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">

                <!-- Page title -->
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <button class="button-menu-mobile open-left">
                            <i class="zmdi zmdi-menu"></i>
                        </button>
                    </li>
                    <li>
                        <h4 class="page-title">Dashboard</h4>
                    </li>
                </ul>

                <!-- Right(Notification and Searchbox -->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <!-- Notification -->
                        <div class="notification-box">
                            <ul class="list-inline m-b-0">
                                <li>
                                    <a href="javascript:void(0);" class="right-bar-toggle">
                                        <i class="zmdi zmdi-notifications-none"></i>
                                    </a>
                                    <div class="noti-dot">
                                        <span class="dot"></span>
                                        <span class="pulse"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- End Notification bar -->
                    </li>
                    <li class="hidden-xs">
                        <form role="search" class="app-search">
                            <input type="text" placeholder="Search..."
                                   class="form-control">
                            <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                </ul>

            </div><!-- end container -->
        </div><!-- end navbar -->
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">

            <!-- User -->
            <div class="user-box">
                <div class="user-img">
                    <img src="<?php echo BASE_URL?>public/assets/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
                    <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
                </div>
                <h5><a href="#">Mat Helme</a> </h5>
                <ul class="list-inline">
                    <li>
                        <a href="#" >
                            <i class="zmdi zmdi-settings"></i>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="text-custom">
                            <i class="zmdi zmdi-power"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End User -->

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <ul>
                    <li class="text-muted menu-title">Navigation</li>

                    <li>
                        <a href="<?php echo BASE_URL?>juego/index" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i> <span> Juegos </span> </a>
                    </li>



                </ul>
                <div class="clearfix"></div>
            </div>
            <!-- Sidebar -->
            <div class="clearfix"></div>

        </div>

    </div>
    <!-- Left Sidebar End -->