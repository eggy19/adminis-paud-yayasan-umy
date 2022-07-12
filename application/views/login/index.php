<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
    <!-- Logo Tab -->
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/logoAisy.png" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="text-center mb-2">
            <img src="<?= base_url('assets/img/Aisyiyah220x220.png') ?>" class="rounded " alt="image-profil">
        </div>
        <div class="login-logo">
            <b>SIM</b>PauD
        </div>
        <?= $this->session->flashdata('messege'); ?>
        <?= $this->session->flashdata('warning'); ?>

        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Login untuk memulai</p>

                <form action="<?php base_url('auth') ?>" method="post">
                    <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?= set_value('email') ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" value="<?= set_value('password') ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-8">

                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-success btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1 mt-4">
                    <a href="#" id="forgot">Saya lupa password</a>
                </p>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/templates') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/templates') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/templates') ?>/dist/js/adminlte.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#forgot').click(function() {
                alert('Lupa Password?\nSilahkan Hubungi Admin');
            });
        });
    </script>
</body>

</html>