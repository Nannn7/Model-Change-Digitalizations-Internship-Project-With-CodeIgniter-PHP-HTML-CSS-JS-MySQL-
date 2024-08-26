<!DOCTYPE html>
<html lang="en">

<?php
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="600">
    <title><?= $title; ?></title>

    <link rel="icon" href="<?= base_url('assets') ?>/dist/img/logo_fim.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/summernote/summernote-bs4.min.css">
    <!-- Select -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Dropzone.js -->
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <style>
        .card-header {
            display: flex;
            align-items: center;
            /* Pusatkan secara vertikal */
        }

        .card-header-back {
            margin-right: 10px;
            /* Atur jarak antara tombol dan teks */
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url('assets'); ?>/dist/img/logo_fim.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Super Admin</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Logout -->
                <li class="nav-item">
                    <a href="<?= site_url('Login'); ?>" class="nav-link" role="button">
                        <i class="fas fa-sign-out-alt"> Logout</i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="<?= base_url('assets'); ?>/dist/img/logo_fim.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">PT. FIM</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets'); ?>/dist/img/5856.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $this->session->userdata('nama'); ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?= site_url('Superadmin'); ?>" class="nav-link <?= ($activePage == 'Superadmin') ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('SA_User'); ?>" class="nav-link <?= ($activePage == 'SA_User') ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                        <li class="nav-item
                            <?= ($activePage == 'MasterDataJig') ? 'menu-open' : ''; ?>
                            <?= ($activePage == 'DataBaruJigCon') ? 'menu-open' : ''; ?>
                            <?= ($activePage == 'DataJigLineCon') ? 'menu-open' : ''; ?>
                            <?= ($activePage == 'DataJigCon') ? 'menu-open' : ''; ?>
                            <?= ($activePage == 'DataBaruJig') ? 'menu-open' : ''; ?>
                            <?= ($activePage == 'DataJigLine') ? 'menu-open' : ''; ?>
                            <?= ($activePage == 'DataJig') ? 'menu-open' : ''; ?>
                            <?= ($activePage == 'SA_Tool') ? 'menu-open' : ''; ?>
                            <?= ($activePage == 'SA_Product') ? 'menu-open' : ''; ?>
                            <?= ($activePage == 'SA_Line') ? 'menu-open' : ''; ?>
                            <?= ($activePage == 'SA_ProgramMesin') ? 'menu-open' : ''; ?>">

                            <a href="#" class="nav-link
                            <?= ($activePage == 'MasterDataJig') ? 'active' : ''; ?>
                            <?= ($activePage == 'DataBaruJigCon') ? 'active' : ''; ?>
                            <?= ($activePage == 'DataJigLineCon') ? 'active' : ''; ?>
                            <?= ($activePage == 'DataJigCon') ? 'active' : ''; ?>
                            <?= ($activePage == 'DataBaruJig') ? 'active' : ''; ?>
                            <?= ($activePage == 'DataJigLine') ? 'active' : ''; ?>
                            <?= ($activePage == 'DataJig') ? 'active' : ''; ?>
                            <?= ($activePage == 'SA_Tool') ? 'active' : ''; ?>
                            <?= ($activePage == 'SA_Product') ? 'active' : ''; ?>
                            <?= ($activePage == 'SA_Line') ? 'active' : ''; ?>
                            <?= ($activePage == 'SA_ProgramMesin') ? 'active' : ''; ?>">

                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    Master Data
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item
                                    <?= ($activePage == 'DataBaruJig') ? 'menu-open' : ''; ?>
                                    <?= ($activePage == 'DataJigLine') ? 'menu-open' : ''; ?>
                                    <?= ($activePage == 'DataJig') ? 'menu-open' : ''; ?>
                                    <?= ($activePage == 'DataBaruJigCon') ? 'menu-open' : ''; ?>
                                    <?= ($activePage == 'DataJigLineCon') ? 'menu-open' : ''; ?>
                                    <?= ($activePage == 'DataJigCon') ? 'menu-open' : ''; ?>">

                                    <a href="#" class="nav-link
                                        <?= ($activePage == 'DataBaruJig') ? 'active' : ''; ?>
                                        <?= ($activePage == 'DataJigLine') ? 'active' : ''; ?>
                                        <?= ($activePage == 'DataJig') ? 'active' : ''; ?>
                                        <?= ($activePage == 'DataBaruJigCon') ? 'active' : ''; ?>
                                        <?= ($activePage == 'DataJigLineCon') ? 'active' : ''; ?>
                                        <?= ($activePage == 'DataJigCon') ? 'active' : ''; ?>">
                                        <i class="nav-icon fas fa-hockey-puck"></i>
                                        <p>
                                            Master Data Jig
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="<?= site_url('DataBaruJig'); ?>" class="nav-link
                                                <?= ($activePage == 'DataBaruJig') ? 'active' : ''; ?>
                                                <?= ($activePage == 'DataBaruJigCon') ? 'active' : ''; ?>">
                                                <i class="nav-icon fas fa-hockey-puck"></i>
                                                <p>
                                                    Incoming Check Jig
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= site_url('DataJigLine'); ?>" class="nav-link
                                                <?= ($activePage == 'DataJigLine') ? 'active' : ''; ?>
                                                <?= ($activePage == 'DataJigLineCon') ? 'active' : ''; ?>">
                                                <i class="nav-icon fas fa-hockey-puck"></i>
                                                <p>
                                                    Data Jig Di Line
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= site_url('DataJig'); ?>" class="nav-link
                                                <?= ($activePage == 'DataJig') ? 'active' : ''; ?>
                                                <?= ($activePage == 'DataJigCon') ? 'active' : ''; ?>">
                                                <i class="nav-icon fas fa-hockey-puck"></i>
                                                <p>
                                                    Data Jig Di GM
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <!-- <li class="nav-item">
                                    <a href="<?= site_url('SA_Tool'); ?>" class="nav-link <?= ($activePage == 'SA_Tool') ? 'active' : ''; ?>">
                                        <i class="fas fa-toolbox nav-icon"></i>
                                        <p>
                                            Master Data Tool
                                        </p>
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="<?= site_url('SA_Product'); ?>" class="nav-link <?= ($activePage == 'SA_Product') ? 'active' : ''; ?>">
                                        <i class="fas fa-box nav-icon"></i>
                                        <p>
                                            Master Data Product
                                        </p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="<?= site_url('SA_Line'); ?>" class="nav-link <?= ($activePage == 'SA_Line') ? 'active' : ''; ?>">
                                        <i class="fas fa-grip-lines nav-icon"></i>
                                        <p>
                                            Master Data Line
                                        </p>
                                    </a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a href="<?= site_url('SA_ProgramMesin'); ?>" class="nav-link <?= ($activePage == 'SA_ProgramMesin') ? 'active' : ''; ?>">
                                        <i class="fas fa-desktop nav-icon"></i>
                                        <p>
                                            Master Program Mesin
                                        </p>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('SA_Ongoing'); ?>" class="nav-link <?= ($activePage == 'SA_Ongoing') ? 'active' : ''; ?>">
                                <i class="fas fa-ruler-combined nav-icon"></i>
                                <p>
                                    Measurement On Going
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('SA_Preview'); ?>" class="nav-link <?= ($activePage == 'SA_Preview') ? 'active' : ''; ?>">
                                <i class="nav-icon far fa-eye"></i>
                                <p>
                                    Measurement Preview
                                </p>
                            </a>
                        </li>
                        <li class="nav-item
                            <?= ($activePage == 'Cetak_GM') ? 'menu-open' : ''; ?>
                            <?= ($activePage == 'Cetak_DY') ? 'menu-open' : ''; ?>">

                            <a href="#" class="nav-link
                                <?= ($activePage == 'Cetak_GM') ? 'active' : ''; ?>
                                <?= ($activePage == 'Cetak_DY') ? 'active' : ''; ?>">

                                <i class="nav-icon fas fa-print"></i>
                                <p>
                                    Cetak
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= site_url('Cetak_GM'); ?>" class="nav-link <?= ($activePage == 'Cetak_GM') ? 'active' : ''; ?>">
                                        <i class="fas fa-tachometer-alt nav-icon"></i>
                                        <p>
                                            Cetak Ganti Model
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('Cetak_DY'); ?>" class="nav-link <?= ($activePage == 'Cetak_DY') ? 'active' : ''; ?>">
                                        <i class="fas fa-clipboard nav-icon"></i>
                                        <p>
                                            Cetak Daily Check
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>