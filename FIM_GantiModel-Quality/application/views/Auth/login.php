<div class="flash-data" data-flashdata="<?= $this->session->flashdata("flash"); ?>"></div>

<div class="login-box" style="width: 400px;">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="text-center">
            <img src="<?= base_url('assets'); ?>/dist/img/FIM_Logo.png" class="rounded" alt="AdminLTE Logo" style="width: 100px;">
        </div>
        <div class="card-header text-center">
            <h3><b>PT. FEDERAL IZUMI MANUFACTURING</b></h3>
        </div>
        <div class="card-body">
            <p id="msg" class="login-box-msg">Silahkan login terlebih dahulu</p>
            <div class="input-group mb-3">
                <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <button type="submit" id="login" class="btn btn-primary btn-block">Login</button>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<?php $this->view('Template/footer_blank'); ?>

<script>
    $(document).ready(function() {
        var txtMsg = document.getElementById("msg");

        $('#username').keyup(function(e) {
            if (e.keyCode == 13)
                $('#login').click();
        })

        $('#password').keyup(function(e) {
            if (e.keyCode == 13)
                $('#login').click();
        })

        $('#login').on("click", function(e) {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            $.ajax({
                type: "POST",
                url: "<?= site_url('Login/login'); ?>",
                data: {
                    username: username,
                    password: password
                },
                success: (function(data) {
                    var obj = jQuery.parseJSON(data);
                    if (obj.cek > 0) {
                        txtMsg.style.color = "green";
                        txtMsg.innerHTML = obj.msg;
                        if (obj.role == 1) {
                            window.location.replace("<?= site_url('Superadmin'); ?>");
                        } else if (obj.role == 2) {
                            window.location.replace("<?= site_url('Operator_Gantimodel'); ?>");
                        } else if (obj.role == 3) {
                            window.location.replace("<?= site_url('Operator_Quality'); ?>")
                        } else if (obj.role == 4) {
                            window.location.replace("<?= site_url('In_QI'); ?>")
                        }
                    } else {
                        txtMsg.style.color = "red";
                        txtMsg.innerHTML = obj.msg;
                    }
                }),
            });
        });
    })
</script>