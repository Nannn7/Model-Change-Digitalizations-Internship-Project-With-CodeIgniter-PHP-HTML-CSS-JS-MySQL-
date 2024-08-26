<div class="flash-data" data-flashdata="<?= $this->session->flashdata("flash"); ?>"></div>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark" id="headerQty">Selamat Datang Di Dashboard Operator Quality</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Pending Pengukuran</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            // Set zona waktu ke WIB (UTC +7)
                            date_default_timezone_set('Asia/Jakarta');
                            ?>
                            <table id="TabelData" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th hidden>ID</th>
                                        <th>Line</th>
                                        <th>Product</th>
                                        <th>Tipe Ukur</th>
                                        <th>Start Pengukuran</th>
                                        <th>Total Waktu</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ($measure as $m) : ?>
                                        <?php if (empty($m->on_ukur)) : ?>
                                            <tr>
                                                <td>
                                                    <?php $i++; ?>
                                                    <?php echo $i ?>
                                                </td>
                                                <td hidden><?= $m->id; ?></td>
                                                <td><?= $m->line; ?></td>
                                                <td><?= $m->product; ?></td>
                                                <td><?= $m->ukur; ?></td>
                                                <td><?= $m->start_ukur; ?></td>
                                                <td>
                                                    <?php
                                                    $waktu_aktual = strtotime(date("Y-m-d H:i:s"));
                                                    $waktu_ukur = strtotime($m->start_ukur);
                                                    $total_waktu_detik = $waktu_aktual - $waktu_ukur;
                                                    $total_jam = floor($total_waktu_detik / 3600); // Mendapatkan jumlah jam
                                                    $total_menit = floor(($total_waktu_detik % 3600) / 60); // Mendapatkan jumlah menit sisa
                                                    echo $total_jam . " jam " . $total_menit . " menit";
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($m->id_gm != '-') {
                                                        echo "<span class='badge badge-primary'>Ganti Model</span>";
                                                    } else {
                                                        echo "<span class='badge badge-warning'>Daily Check</span>";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('Template/footer'); ?>

<script>
    $(document).ready(function() {
        var headerQty = document.getElementById('headerQty');

        var options = {
            hour: 'numeric',
            minute: 'numeric',
            second: 'numeric',
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
        }

        setInterval(function() {
            headerQty.innerHTML = "Selamat Datang Di Dashboard Operator Quality " + new Intl.DateTimeFormat('in', options).format(new Date);
        }, 1000);
    })
</script>