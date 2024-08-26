<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="600">
    <title><?= $title; ?></title>

    <link rel="icon" href="<?= base_url('assets') ?>/dist/img/logo_fim.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
    <!-- Dropzone.js -->
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <a href="<?= base_url('assets') ?>/index3.html" class="navbar-brand">
                <img src="<?= base_url('assets') ?>/dist/img/logo_fim.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <!-- <span class="brand-text font-weight-light">AdminLTE 3</span> -->
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link">In QI | <?= $this->session->userdata('nama'); ?></a>
                    </li>
                </ul>
            </div>

            <!-- Right navbar links -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <!-- Logout -->
                <li class="nav-item">
                    <a href="<?= site_url('Login'); ?>" class="nav-link" role="button">
                        <i class="fas fa-sign-out-alt"> Logout</i>
                    </a>
                </li>
            </ul>

        </nav>