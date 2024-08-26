<div class="flash-data" data-flashdata="<?= $this->session->flashdata("flash"); ?>"></div>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark" id="headerSA">Selamat Datang Di Dashboard Operator Ganti Model</h1>
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
                            <h2 class="card-title">Data Ganti Model</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            function countStatus($stts, $gmId)
                            {
                                $countOK = 0;
                                $countNG = 0;

                                foreach ($stts as $statusData) {
                                    if ($statusData->id_gm == $gmId) {
                                        if ($statusData->status == 1) {
                                            $countOK++;
                                        } elseif ($statusData->status == 0) {
                                            $countNG++;
                                        }
                                    }
                                }

                                return ['OK' => $countOK, 'NG' => $countNG];
                            }
                            ?>
                            <?php
                            // Set zona waktu ke WIB (UTC +7)
                            date_default_timezone_set('Asia/Jakarta');
                            ?>
                            <table id="TabelData" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th hidden>ID GM</th>
                                        <th>Line</th>
                                        <th>Product</th>
                                        <th>Start Ganti Model</th>
                                        <th>Progres</th>
                                        <th>Total Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ($ganmod as $gm) : ?>
                                        <?php if (empty($gm->finish_gm)) : ?>
                                            <tr>
                                                <td>
                                                    <?php $i++; ?>
                                                    <?php echo $i ?>
                                                </td>
                                                <td id="idgm" hidden><?= $gm->id_gm; ?></td>
                                                <td><?= $gm->line; ?></td>
                                                <td><?= $gm->product; ?></td>
                                                <td><?= $gm->start_gm; ?></td>
                                                <?php
                                                $statusCounts = countStatus($stts, $gm->id_gm);
                                                ?>
                                                <td>OK = <?= $statusCounts['OK']; ?> / 28* / 38** / 42***</td>
                                                <!-- <?php
                                                        $waktu_aktual = strtotime(date("Y-m-d H:i:s"));
                                                        $waktu_gm = strtotime($gm->start_gm);
                                                        $total_waktu = round(($waktu_aktual - $waktu_gm) / 3600);
                                                        ?>
                                                <td><?= $total_waktu . " jam"; ?></td> -->
                                                <td>
                                                    <?php
                                                    $waktu_aktual = strtotime(date("Y-m-d H:i:s"));
                                                    $waktu_ukur = strtotime($gm->start_gm);
                                                    $total_waktu_detik = $waktu_aktual - $waktu_ukur;
                                                    $total_jam = floor($total_waktu_detik / 3600); // Mendapatkan jumlah jam
                                                    $total_menit = floor(($total_waktu_detik % 3600) / 60); // Mendapatkan jumlah menit sisa
                                                    echo $total_jam . " jam " . $total_menit . " menit";
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7">
                                            <em>
                                                Notes:
                                            </em>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <em>
                                                * = Motorcycle / Gasoline || ** = Diesel || *** = 2 Mesin Brother
                                            </em>
                                        </td>
                                    </tr>
                                </tfoot>
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
        var headerSA = document.getElementById('headerSA');

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
            headerSA.innerHTML = "Selamat Datang Di Dashboard Operator Ganti Model " + new Intl.DateTimeFormat('in', options).format(new Date);
        }, 1000);
    })
</script>