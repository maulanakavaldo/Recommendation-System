<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('public/assets/images/logo-light-icon.png') ?>">
    <title>SRP Program Studi - AHP</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('public/assets/plugins/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- earning money -->
    <link href="<?= base_url('public/assets/plugins/sb-admin/sb-admin-2.css') ?>" rel="stylesheet">

    <!-- <link href="<?= base_url('public/assets/plugins/sb-admin/sb-admin-2.min.css') ?>" rel="stylesheet"> -->

    <!-- chartist CSS -->
    <link href="<?= base_url('public/assets/plugins/chartist-js/dist/chartist.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/plugins/chartist-js/dist/chartist-init.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') ?>" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="<?= base_url('public/assets/plugins/c3-master/c3.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/plugins/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url('public/css/style.css') ?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?= base_url('public/css/colors/blue.css') ?>" rel="stylesheet">

    <!-- sb_admin -->
    <!-- <link href="<?= base_url('public/css/admin/css/sb-admin-2.css') ?>" rel="stylesheet"> -->
    <!-- <link href="<?= base_url('public/css/admin/css/sb-admin-2.min.css') ?>" rel="stylesheet"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?= base_url() ?>" style="font-size: 20px">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->

                            <!-- Light Logo icon -->
                            <!-- <i class="mdi mdi-account-box light-logo"></i> -->
                            <!-- <a href='<?php echo base_url() ?>'><img src="<?php echo base_url() . 'public/assets/images/home_icon.jpg' ?>" width="150px"></a> -->

                        </b>
                        <!--End Logo icon -->
                        <span class="light-logo">SRP Program Studi</span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- <ul>
                   <h2 class="nav-link dropdown-toggle text-muted waves-effect waves-dark">Sistem Rekomendasi Penentuan Program Studi</h2>

                </ul> -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-1">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url('public/assets/images/users/user.png') ?>" alt="user" class="profile-pic m-r-10" /><?= $this->session->userdata('nama_lengkap') ?></a>
                            <!-- = $this->session->userdata('nama_lengkap')  -->
                        </li>
                    </ul>
                </div>
            </nav>
        </header>