<!DOCTYPE html>
<html lang="en">

<?php
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Under Construction</title>
    <link rel="icon" href="<?= base_url('assets') ?>/dist/img/logo_fim.png">
    <script>
        // Set waktu untuk mereload halaman kembali ke dashboard
        const reloadTimeInSeconds = 5; // ganti dengan waktu yang diinginkan, dalam detik

        // Fungsi untuk menghitung waktu mundur dan mereload halaman
        function countdownAndReload() {
            let count = reloadTimeInSeconds;
            const countdown = document.getElementById('countdown');

            const timer = setInterval(() => {
                countdown.textContent = count;
                count--;

                if (count < 0) {
                    clearInterval(timer);
                    // Mereload halaman kembali ke dashboard
                    window.location.href = '<?php echo base_url("Superadmin"); ?>'; // ganti 'dashboard' dengan nama fungsi atau URL dashboard Anda
                }
            }, 1000);
        }

        // Jalankan fungsi countdown saat halaman dimuat
        window.onload = countdownAndReload;
    </script>
    <style>
        /* CSS untuk tata letak halaman under construction */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Halaman Sedang Dibangun</h1>
        <p>Halaman ini sedang dalam proses pembangunan. Mohon tunggu beberapa saat...</p>
        <p>Halaman akan kembali ke dashboard dalam <span id="countdown"></span> detik.</p>
    </div>
</body>

</html>