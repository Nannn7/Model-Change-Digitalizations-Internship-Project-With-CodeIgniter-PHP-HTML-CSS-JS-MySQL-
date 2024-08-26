<div class="flash-data" data-flashdata="<?= $this->session->flashdata("flash"); ?>"></div>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-11">
                    <h1>Measurement On Going</h1>
                </div>
                <div class="col-sm-1">
                    <!-- <button type="button" id="btnTambah" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg">Tambah</button> -->
                </div>
            </div>
        </div>
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Permintaan Pengukuran</h3>
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
                                        <th hidden>ID GM</th>
                                        <th>Line</th>
                                        <th>Product</th>
                                        <th>Tipe Ukur</th>
                                        <th>Hasil Ukur</th>
                                        <th hidden>File</th>
                                        <th hidden>Catatan</th>
                                        <th>In Ukur</th>
                                        <th>On Ukur</th>
                                        <th>Waiting Time</th>
                                        <th>Mulai Ukur</th>
                                        <th hidden>Out Ukur</th>
                                        <th>Waktu Ukur</th>
                                        <th>Waktu Total</th>
                                        <th hidden>Status</th>
                                        <th>Hasil Ukur</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ($measure as $m) : ?>
                                        <?php if ($m->status == 9) : ?>
                                            <tr>
                                                <td>
                                                    <?php $i++; ?>
                                                    <?php echo $i ?>
                                                </td>
                                                <td id="id_gm" hidden><?= $m->id_gm; ?></td>
                                                <td><?= $m->line; ?></td>
                                                <td><?= $m->product; ?></td>
                                                <td><?= $m->ukur; ?></td>
                                                <td>
                                                    <?php
                                                    $stat = $m->status;
                                                    if ($stat == 0) echo "<span class='badge badge-danger'>NG</span>";
                                                    else if ($stat == 1) echo "<span class='badge badge-success'>OK</span>";
                                                    else if ($stat == 9) echo "<span class='badge badge-warning'>Belum Ukur</span>";
                                                    ?>
                                                </td>
                                                <td hidden><?= $m->file; ?></td>
                                                <td hidden><?= $m->catatan; ?></td>
                                                <td><?= $m->start_ukur; ?></td>
                                                <td><?= $m->on_ukur; ?></td>
                                                <?php
                                                $waktu_aktual = strtotime(date("Y-m-d H:i:s"));
                                                $start_time = strtotime($m->start_ukur);
                                                $on_time = strtotime($m->on_ukur);
                                                // $total_waiting_time = round(($on_time - $start_time) / 60);
                                                $total_waiting_time = ($m->on_ukur != null) ? round(($on_time - $start_time) / 60) : round(($waktu_aktual - $start_time) / 60);
                                                ?>
                                                <td><?= $total_waiting_time . " menit"; ?></td>
                                                <td>
                                                    <?php
                                                    if (empty($m->on_ukur)) {
                                                        echo "<button id='dataGMOnUkur' class='btn btn-primary btn-xs dataGMOnUkur' data-toggle='modal' data-target='#ModalGMOnUkur' data-tipeukur='" . $m->ukur . "' data-id='" . $m->id . "' onclick='mulaiGMOnUkur(this)'>Mulai Ukur</button>";
                                                    }
                                                    ?>
                                                </td>
                                                <td hidden><?= $m->finish_ukur; ?></td>
                                                <?php
                                                $waktu_aktual = strtotime(date("Y-m-d H:i:s"));
                                                $on_time = strtotime($m->on_ukur);
                                                $finish_time = strtotime($m->finish_ukur);
                                                // $total_ukur_time = round(($finish_time - $on_time) / 60);
                                                $total_ukur_time = ($m->finish_ukur != null) ? round(($finish_time - $on_time) / 60) : round(($waktu_aktual - $on_time) / 60);
                                                ?>
                                                <td><?= $total_ukur_time . " menit"; ?></td>
                                                <td>
                                                    <?php
                                                    $total_time = $total_waiting_time + $total_ukur_time;
                                                    echo $total_time . " menit";
                                                    ?>
                                                </td>
                                                <td hidden>
                                                    <?php
                                                    $stat = $m->status;
                                                    if ($stat == 9) echo "<span class='badge badge-danger'><i class='fas fa-times'></i></span>";
                                                    elseif ($stat == 0) echo "<span class='badge badge-success'><i class='icon fas fa-check'></i></span>";
                                                    elseif ($stat == 1) echo "<span class='badge badge-success'><i class='icon fas fa-check'></i></span>";
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (!empty($m->on_ukur)) {
                                                        echo "<button id='dataGMFinishUkur' class='btn btn-warning btn-xs dataGMFinishUkur' data-toggle='modal' data-target='#ModalGMFinishUkur' data-tipeukur='" . $m->ukur . "' data-id='" . $m->id . "' onclick='hasilGMFinishUkur(this)'>Hasil Ukur</button>";
                                                    }
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

    <!-- <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Measurement On Going Daily Check</h3>
                        </div>
                        <div class="card-body">
                            <table id="TabelData2" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th hidden>ID</th>
                                        <th>Line</th>
                                        <th>Product</th>
                                        <th>Tipe Ukur</th>
                                        <th>Hasil Ukur</th>
                                        <th hidden>File</th>
                                        <th hidden>Catatan</th>
                                        <th>In Ukur</th>
                                        <th>On Ukur</th>
                                        <th>Waiting Time</th>
                                        <th>Mulai Ukur</th>
                                        <th hidden>Out Ukur</th>
                                        <th>Waktu Ukur</th>
                                        <th>Waktu Total</th>
                                        <th hidden>Status</th>
                                        <th>Hasil Ukur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ($measure as $m) : ?>
                                        <?php if ($m->id_gm == '-' && $m->id_dy == '-' && $m->status == 9) : ?>
                                            <tr>
                                                <td>
                                                    <?php $i++; ?>
                                                    <?php echo $i ?>
                                                </td>
                                                <td id="id" hidden><?= $m->id; ?></td>
                                                <td><?= $m->line; ?></td>
                                                <td><?= $m->product; ?></td>
                                                <td><?= $m->ukur; ?></td>
                                                <td>
                                                    <?php
                                                    $stat = $m->status;
                                                    if ($stat == 0) echo "<span class='badge badge-danger'>NG</span>";
                                                    else if ($stat == 1) echo "<span class='badge badge-success'>OK</span>";
                                                    else if ($stat == 9) echo "<span class='badge badge-warning'>Belum Ukur</span>";
                                                    ?>
                                                </td>
                                                <td hidden><?= $m->file; ?></td>
                                                <td hidden><?= $m->catatan; ?></td>
                                                <td><?= $m->start_ukur; ?></td>
                                                <td><?= $m->on_ukur; ?></td>
                                                <?php
                                                $start_time = strtotime($m->start_ukur);
                                                $on_time = strtotime($m->on_ukur);
                                                $total_waiting_time = round(($on_time - $start_time) / 60);
                                                ?>
                                                <td><?= $total_waiting_time . " menit"; ?></td>
                                                <td>
                                                    <?php
                                                    if (empty($m->on_ukur)) {
                                                        echo "<button id='dataDYOnUkur' class='btn btn-primary btn-xs dataDYOnUkur' data-toggle='modal' data-target='#ModalDYOnUkur' data-tipeukur='" . $m->ukur . "' data-id='" . $m->id . "' onclick='mulaiDYOnUkur(this)'>Mulai Ukur</button>";
                                                    }
                                                    ?>
                                                </td>
                                                <td hidden><?= $m->finish_ukur; ?></td>
                                                <?php
                                                $on_time = strtotime($m->on_ukur);
                                                $finish_time = strtotime($m->finish_ukur);
                                                $total_ukur_time = round(($finish_time - $on_time) / 60);
                                                ?>
                                                <td><?= $total_ukur_time . " menit"; ?></td>
                                                <td>
                                                    <?php
                                                    $total_time = $total_waiting_time + $total_ukur_time;
                                                    echo $total_time . " menit";
                                                    ?>
                                                </td>
                                                <td hidden>
                                                    <?php
                                                    $stat = $m->status;
                                                    if ($stat == 9) echo "<span class='badge badge-danger'><i class='fas fa-times'></i></span>";
                                                    elseif ($stat == 0) echo "<span class='badge badge-success'><i class='icon fas fa-check'></i></span>";
                                                    elseif ($stat == 1) echo "<span class='badge badge-success'><i class='icon fas fa-check'></i></span>";
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (!empty($m->on_ukur)) {
                                                        echo "<button id='dataDYFinishUkur' class='btn btn-warning btn-xs dataDYFinishUkur' data-toggle='modal' data-target='#ModalDYFinishUkur' data-tipeukur='" . $m->ukur . "' data-id='" . $m->id . "' onclick='hasilDYFinishUkur(this)'>Hasil Ukur</button>";
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
    </section> -->
</div>

<!-- Modal On Ukur GM -->
<form id="GMOnUkur" action="<?= site_url('Qty_Ongoing/GMstartOnUkur'); ?>" method="post">
    <div class="modal fade" id="ModalGMOnUkur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Masukan Data On Ukur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 id="tipeUkurGM1">#</h5>
                    <input type="hidden" name="idGM" id="idGM">
                    <input type="hidden" name="id_gm_onukur" id="id_gm_onukur">
                    <input type="hidden" name="line_onukur" id="line_onukur">
                    <input type="hidden" name="produk_onukur" id="produk_onukur">
                    <input type="hidden" name="ukur_onukur" id="ukur_onukur">
                    <input type="hidden" name="status_onukur" id="status_onukur">
                    <input type="hidden" name="start_ukur_onukur" id="start_ukur_onukur">
                    <div class="form-group">
                        <label for="on_ukur_gm">Tanggal On Ukur</label>
                        <input type="datetime-local" name="on_ukur_gm" id="on_ukur_gm" class="form-control" placeholder="YYYY-MM-DD HH:mm" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Finish GM -->
<form id="GMFinishUkur" action="<?= site_url('Qty_Ongoing/GMfinishUkur'); ?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="ModalGMFinishUkur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Masukan Data Untuk Menyelesaikan Pengukuran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 id="tipeUkurGM2">#</h5>
                    <input type="hidden" name="idGMF" id="idGMF">
                    <input type="hidden" name="id_gm_finishukur" id="id_gm_finishukur">
                    <input type="hidden" name="line_finishukur" id="line_finishukur">
                    <input type="hidden" name="produk_finishukur" id="produk_finishukur">
                    <input type="hidden" name="ukur_finishukur" id="ukur_finishukur">
                    <input type="hidden" name="start_ukur_finishukur" id="start_ukur_finishukur">
                    <input type="hidden" name="on_ukur_finishukur" id="on_ukur_finishukur">
                    <div class="form-group">
                        <label for="hasilukur_finishukur">Hasil Ukur</label>
                        <select class="form-control" name="hasilukur_finishukur" id="hasilukur_finishukur">
                            <option selected>Pilih Hasil Ukur</option>
                            <option value="0">NG</option>
                            <option value="1">OK</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="file_finishukur">Pilih File</label>
                        <input type="file" class="form-control-file" accept=".pdf, .jpg, .png, .jpeg, .doc, .docx" name="file_finishukur" id="file_finishukur" capture="environment" onchange="previewFile()">
                    </div>
                    <div class="form-group">
                        <label for="catatan_finishukur">Catatan</label>
                        <textarea class="form-control" name="catatan_finishukur" id="catatan_finishukur" cols="30" rows="3" placeholder="Silahkan Masukan Catatan Pengukuran"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gm_finishukur">Pilih Tanggal Finish Pengukuran</label>
                        <input type="datetime-local" name="gm_finishukur" id="gm_finishukur" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Hasil Ukur</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal On Ukur DY -->
<form id="DYOnUkur" action="<?= site_url('Qty_Ongoing/DYstartOnUkur'); ?>" method="post">
    <div class="modal fade" id="ModalDYOnUkur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Modal DY On Ukur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 id="tipeUkurDY1">#</h5>
                    <input type="hidden" name="idDY" id="idDY">
                    <div class="form-group">
                        <label for="on_ukur_dy">Tanggal On Ukur</label>
                        <input type="datetime-local" name="on_ukur_dy" id="on_ukur_dy" class="form-control" placeholder="YYYY-MM-DD HH:mm" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Finish DY -->
<form id="DYFinishUkur" action="<?= site_url('Qty_Ongoing/DYfinishUkur'); ?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="ModalDYFinishUkur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">Modal DY Finish Ukur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 id="tipeUkurDY2">#</h5>
                    <input type="hidden" name="idDYF" id="idDYF">
                    <div class="form-group">
                        <label for="hasilukur_dy_finish">Hasil Ukur</label>
                        <select class="form-control" name="hasilukur_dy_finish" id="hasilukur_dy_finish">
                            <option selected>Pilih Hasil Ukur</option>
                            <option value="0">NG</option>
                            <option value="1">OK</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="file_dy_finish">Pilih File</label>
                        <input type="file" class="form-control-file" accept=".pdf, .jpg, .png, .jpeg, .doc, .docx" name="file_dy_finish" id="file_dy_finish" onchange="previewFile()">
                    </div>
                    <div class="form-group">
                        <label for="catatan_dy_finish">Catatan</label>
                        <textarea class="form-control" name="catatan_dy_finish" id="catatan_dy_finish" cols="30" rows="3" placeholder="Silahkan Masukan Catatan Pengukuran"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="finish_ukur_dy">Pilih Tanggal Finish Pengukuran</label>
                        <input type="datetime-local" name="finish_ukur_dy" id="finish_ukur_dy" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Hasil Ukur</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php $this->load->view('Template/footer'); ?>

<!-- Script GM On Ukur -->
<!-- <script>
    function mulaiGMOnUkur(id) {
        $("#idGM").val(id);
        $("#ModalGMOnUkur").modal("show");
    }
</script> -->
<script>
    function mulaiGMOnUkur(button) {
        var id = $(button).data('id');
        var tipeUkurGM1 = $(button).data('tipeukur');
        $("#idGM").val(id);
        $("#tipeUkurGM1").text(tipeUkurGM1); // Menampilkan Tipe Ukur di dalam modal
        $("#ModalGMOnUkur").modal("show");
    }
</script>
<script>
    $(document).ready(function() {
        $('#GMOnUkur').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'On Ukur Sudah Di Buat',
                text: 'Silahkan Lanjutkan Pengukuran',
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).unbind('submit').submit();

                    Swal.fire(
                        'Berhasil',
                        'Proses On Ukur Sudah Disimpan.',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                }
            });
        });
    });
</script>

<!-- Script GM Finish Ukur -->
<script>
    function hasilGMFinishUkur(button) {
        var id = $(button).data('id');
        var tipeUkurGM2 = $(button).data('tipeukur');
        $("#idGMF").val(id);
        $("#tipeUkurGM2").text(tipeUkurGM2);
        $("#ModalGMFinishUkur").modal("show");
    }
</script>
<script>
    $(document).ready(function() {
        $('#GMFinishUkur').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Apakah Anda Yakin Menyelesaikan Pengukuran?',
                text: 'Silahkan Cek Kembali Data-Data Yang Sudah Diisi',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).unbind('submit').submit();

                    Swal.fire(
                        'Berhasil',
                        'Pengukuran Berhasil Diselesaikan',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                }
            });
        });
    });
</script>

<!-- Script DY On Ukur -->
<script>
    function mulaiDYOnUkur(button) {
        var id = $(button).data('id');
        var tipeUkurDY1 = $(button).data('tipeukur');
        $("#idDY").val(id);
        $("#tipeUkurDY1").text(tipeUkurDY1);
        $("#ModalDYOnUkur").modal("show");
    }
</script>
<script>
    $(document).ready(function() {
        $('#DYOnUkur').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'On Ukur Sudah Di Buat',
                text: 'Silahkan Lanjutkan Pengukuran',
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).unbind('submit').submit();

                    Swal.fire(
                        'Berhasil',
                        'Proses On Ukur Sudah Disimpan.',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                }
            });
        });
    });
</script>

<!-- Script DY Finish Ukur -->
<script>
    function hasilDYFinishUkur(button) {
        var id = $(button).data('id');
        var tipeUkurDY2 = $(button).data('tipeukur');
        $("#idDYF").val(id);
        $("#tipeUkurDY2").text(tipeUkurDY2);
        $("#ModalDYFinishUkur").modal("show");
    }
</script>
<script>
    $(document).ready(function() {
        $('#DYFinishUkur').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Apakah Anda Yakin Menyelesaikan Pengukuran?',
                text: 'Silahkan Cek Kembali Data-Data Yang Sudah Diisi',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).unbind('submit').submit();

                    Swal.fire(
                        'Berhasil',
                        'Pengukuran Berhasil Diselesaikan',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                }
            });
        });
    });
</script>

<!-- $m->id_gm !== '-' &&  -->