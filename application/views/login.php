<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

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
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() . 'public/assets/images/favicon.png' ?>">
    <title>Login | SRP Program Studi - AHP</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url() . 'public/assets/plugins/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url() . 'public/css/style.css' ?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?= base_url() . 'public/css/colors/blue.css' ?>" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <!-- <section id="wrapper"> -->
    <div class="row d-flex justify-content-center align-items-center p-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-block">
                    <form action="<?php echo site_url('login/cek'); ?>" method="post">

                        <div class="form-group">
                            <div class="text-center mb-4">
                                <h2><strong> LOGIN </strong></H2>
                            </div>
                            <!-- Image Login -->
                            <div class="text-center mb-4">
                                <!-- <br><a href='<?php echo base_url() ?>'><img src="<?php echo base_url() . 'public/assets/images/login_icon.png' ?>" width="300px"></a></br> -->
                            </div>
                            <!-- Text -->
                            <div class="text-center mb-4">
                                <h4>Sistem Rekomendasi Penentuan <br> Program Studi</h4>
                            </div>
                            <div class="col-sm-12 text-center">
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                            <label class="col-md-12">Username</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="username" value="<?= set_value('username') ?>">
                                <div class="text-danger"><?= form_error('username') ?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="password" name="password" class="form-control form-control-line" value="<?= set_value('password') ?>">
                                <div class="text-danger"><?= form_error('password') ?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" name="login" class="btn btn-success">Login</button>
                            </div>
                            <br>
                            <div class="col-sm-10">
                                Belum punya akun ?
                                <div><?= anchor('signup', 'Daftar') ?></div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- </section> -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url() . 'public/assets/plugins/jquery/jquery.min.js' ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url() . 'public/assets/plugins/bootstrap/js/tether.min.js' ?>"></script>
    <script src="<?= base_url() . 'public/assets/plugins/bootstrap/js/bootstrap.min.js' ?>"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() . 'public/js/waves.js' ?>"></script>
</body>

</html>