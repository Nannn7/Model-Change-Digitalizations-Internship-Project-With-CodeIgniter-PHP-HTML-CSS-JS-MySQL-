<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">
    <style>
        body {
            background: linear-gradient(to bottom, #00008B, #FFFFFF);
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="register-box" style="width: 500px;">
        <div class="card card-outline card-primary">
            <div class="text-center">
                <img src="<?= base_url('assets'); ?>/dist/img/FIM_Logo.png" class="rounded" alt="AdminLTE Logo" style="width: 100px;">
            </div>
            <div class="card-header text-center">
                <h3><b>PT. FEDERAL IZUMI MANUFACTURING</b></h3>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Form Registrasi User Baru</p>
                <form action="<?= base_url('Login/registration'); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="NRP" id="nrp" name="nrp" value="<?= set_value('nrp'); ?>">
                        <?= form_error('nrp', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nama" id="nama" name="nama" value="<?= set_value('nama'); ?>">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" id="username" name="username" value="<?= set_value('username'); ?>">
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password" value="<?= set_value('password'); ?>">
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-control" id="role" name="role">
                            <option selected>Pilih Role</option>
                            <option value="1">Super Admin</option>
                            <option value="2">Admin Ganti Model</option>
                            <option value="3">Admin Quality</option>
                            <option value="4">IN QC</option>
                        </select>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </form>
                <a href="<?= base_url('Login/index'); ?>" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
</body>

</html>