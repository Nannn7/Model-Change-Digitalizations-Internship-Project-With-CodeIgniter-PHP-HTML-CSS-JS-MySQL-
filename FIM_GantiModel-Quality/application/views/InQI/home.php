<div class="flash-data" data-flashdata="<?= $this->session->flashdata("flash"); ?>"></div>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0" id="headerQI">Silahkan Lakukan Pengukuran Hari</h1>
            </div>
        </div><!-- /.row -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-lg-7">
                <div class="card card-primary card-outline">
                    <div class="card-header" id="HeaderGM">
                        <h5 class="card-title m-0">Ganti Model</h5>
                        <!-- <div class="row">
                                <div class="col-sm-11"></div>
                                <div class="col-sm-1">
                                    <button type="button" id="btnAntrian" title="Data Antrian Pengukuran Ganti Model" class="btn btn-warning btn-sm btnAntrian" data-toggle="modal" data-target="#ModalAntrianGM">Antrian</button>
                                </div>
                            </div> -->
                    </div>
                    <div class="card-body">
                        <!-- <div class="row">
                            <?php $count = 0; ?>
                            <?php foreach ($ganmod as $gm) : ?>
                                <?php
                                $statusData = array_filter($stts, function ($item) use ($gm) {
                                    return $item->id_gm == $gm->id_gm;
                                });

                                $status = !empty($statusData) && isset($statusData[0]) ? $statusData[0]->status : null;

                                if (empty($gm->finish_gm)) :
                                    if ($count % 2 === 0) :
                                        echo '</div><div class="row">';
                                    endif;
                                ?>
                                    <div class="col-lg-6" id="gmCard_<?= $gm->id_gm; ?>">
                                        <div class="small-box bg-primary">
                                            <div class="inner">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <h4><b>Ganti Model <h3 id="valIDGM" hidden>ID GM : <?= $gm->id_gm; ?></h3></b></h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <h5 id="forLine"><b>Line : <?= $gm->line; ?></b></h5>
                                                    </div>
                                                    <div class="col">
                                                        <?php
                                                        $countOK = 0;
                                                        $countNG = 0;

                                                        foreach ($stts as $statusData) {
                                                            if ($statusData->id_gm == $gm->id_gm) {
                                                                if ($statusData->status == 1) {
                                                                    $countOK++;
                                                                } elseif ($statusData->status == 0) {
                                                                    $countNG++;
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                        <h4><b>OK : <?= $countOK; ?></b></h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <h5 id="forProduk"><b>Product : <?= $gm->product; ?></b></h5>
                                                    </div>
                                                    <div class="col">
                                                        <h4><b>NG : <?= $countNG; ?></b></h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <h5 id="forStartgm">Start GM : <?= date('d-m-Y, H:i', strtotime($gm->start_gm)); ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="button" id="btnPilihUkur" class="btn btn-block btn-default btnPilihUkur" data-toggle="modal" data-target="#PilihUkur">
                                                        Pilih Pengukuran <i class="fas fa-arrow-circle-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $count++; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div> -->
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
                        <table id="TabelData2" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th hidden>ID GM</th>
                                    <th>Line</th>
                                    <th>Product</th>
                                    <th>Start GM</th>
                                    <th>Progres</th>
                                    <th>Aksi</th>
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
                                            <td id="id_gm" class="id_gm" hidden><?= $gm->id_gm; ?></td>
                                            <td id="forLine"><?= $gm->line; ?></td>
                                            <td id="forProduk"><?= $gm->product; ?></td>
                                            <td id="forStartgm"><?= $gm->start_gm; ?></td>
                                            <?php
                                            $statusCounts = countStatus($stts, $gm->id_gm);
                                            ?>
                                            <td>OK = <?= $statusCounts['OK']; ?> | NG = <?= $statusCounts['NG']; ?></td>
                                            <td>
                                                <button type="button" id="btnPilihUkur" class="btn btn-default btnPilihUkur" data-toggle="modal" data-target="#PilihUkur">Pilih Pengukuran</button>
                                                <button type="button" id="btnDetailUkur" class="btn btn-warning btnDetailUkur" data-id="<?= $gm->id_gm; ?>" data-toggle="modal" data-target="#DetailUkur" title="Lihat List Data Pengukuran"><i class="fas fa-list-ul"></i></button>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="card-title m-0">Daily Check</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('In_QI/startdaily'); ?>" method="post" id="dailyCheckForm">
                            <div class="row">
                                <div class="col-6">
                                    <label>Pilih Line</label>
                                    <select name="lineDY" id="lineDY" class="form-control" required>
                                        <option disabled selected>-- Pilih Line --</option>
                                        <?php foreach ($line as $l) : ?>
                                            <option value="<?= $l->line; ?>"><?= $l->line; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label>Pilih Product</label>
                                    <select name="produkDY" id="produkDY" class="form-control" required>
                                        <option disabled selected>-- Pilih Product --</option>
                                        <?php foreach ($produk as $p) : ?>
                                            <option value="<?= $p->nama_produk; ?>"><?= $p->nama_produk; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label>Pilih Proses & Tipe Ukur</label>
                                    <select name="ukurDY" id="ukurDY" class="form-control" required>
                                        <option disabled selected>-- Pilih Proses & Tipe Ukur --</option>
                                        <?php foreach ($tipeukur as $tu) : ?>
                                            <option value="<?= $tu->proses . ' - ' . $tu->tipe_pengukuran; ?>">
                                                <?= $tu->proses . ' - ' . $tu->tipe_pengukuran; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label>Pilih Start Daily</label>
                                    <input type="datetime-local" name="start_ukur" id="start_ukur" class="form-control" required>
                                </div>
                            </div>
                        </form>
                        <div class="mt-4 mb-3">
                            <center><button type="submit" class="btn btn-primary MulaiDaily" id="MulaiDaily">Submit</button></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Tabel Antrian Ganti Model</h5>
                    </div>
                    <div class="card-body">
                        <table id="TabelAntrian" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th hidden>ID GM</th>
                                    <th>Line</th>
                                    <th>Product</th>
                                    <th>Tipe Ukur</th>
                                    <th>In Ukur</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ($measuregm as $mgm) : ?>
                                    <?php if (empty($mgm->on_ukur)) : ?>
                                        <tr>
                                            <td>
                                                <?php $i++ ?>
                                                <?php echo $i ?>
                                            </td>
                                            <td id="id" hidden><?= $mgm->id_gm; ?></td>
                                            <td><?= $mgm->line; ?></td>
                                            <td><?= $mgm->product; ?></td>
                                            <td><?= $mgm->ukur; ?></td>
                                            <td><?= $mgm->start_ukur; ?></td>
                                            <td>
                                                <button type="button" title="Hapus GM" class="btn btn-danger btn-small" onclick="hapusDataGM(<?= $mgm->id; ?>)">
                                                    <i class="fas fa-trash delGM"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Tabel Antrian Daily Check</h5>
                    </div>
                    <div class="card-body">
                        <table id="TabelData" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th hidden>ID</th>
                                    <th>Line</th>
                                    <th>Product</th>
                                    <th>Tipe Ukur</th>
                                    <th>In Ukur</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ($measuredy as $mdy) : ?>
                                    <?php if (empty($mdy->on_ukur)) : ?>
                                        <tr>
                                            <td>
                                                <?php $i++ ?>
                                                <?php echo $i ?>
                                            </td>
                                            <td id="id" hidden><?= $mdy->id; ?></td>
                                            <td><?= $mdy->line; ?></td>
                                            <td><?= $mdy->product; ?></td>
                                            <td><?= $mdy->ukur; ?></td>
                                            <td><?= $mdy->start_ukur; ?></td>
                                            <td>
                                                <button type="button" title="Hapus Daily" class="btn btn-danger btn-small" onclick="hapusDataDY(<?= $mdy->id; ?>)">
                                                    <i class="fas fa-trash delDY"></i>
                                                </button>
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
</div>

<!-- Modal Detail Ukur -->
<form method="post">
    <div class="modal fade" id="DetailUkur">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div id="modalDetaiLUkur"></div>
                <div class="modal-header">
                    <h4 class="modal-title">
                        <label>Detail Ukur Ganti Model</label>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label hidden>ID GM</label>
                                    <input type="hidden" name="id_gm" id="id_gm" class="form-control">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-header">
                                    <h3 class="card-title">Progres Ganti Model</h3>
                                </div>
                                <div class="card-body">
                                    <table id="TabelDetailUkur" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Line</th>
                                                <th>Product</th>
                                                <th>Tipe Ukur</th>
                                                <th>Hasil Ukur</th>
                                                <th>In Ukur</th>
                                                <th>On Ukur</th>
                                                <th>Out Ukur</th>
                                                <th>File</th>
                                                <th>Catatan</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyUkur"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Antrian GM -->
<!-- <form method="post">
    <div class="modal fade" id="ModalAntrianGM">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div id="ModalGM"></div>
                <div class="modal-header">
                    <h4 class="modal-header">
                        <label>Data Antrian Pengukuran Ganti Model</label>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-header">
                                    <h3 class="card-title">Data</h3>
                                </div>
                                <div class="card-body">
                                    <table id="TabelAntrianGM" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th hidden>ID GM</th>
                                                <th>Line</th>
                                                <th>Product</th>
                                                <th>Tipe Ukur</th>
                                                <th>Start Ukur</th>
                                                <th hidden>On Ukur</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyAntrian"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form> -->
<!-- <div id="ModalAntrianGM" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Antrian Pengukuran Ganti Model</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="modalBody">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-header">
                                <h3 class="card-title">Data</h3>
                            </div>
                            <div class="card-body">
                                <table id="TabelData" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Line</th>
                                            <th>Product</th>
                                            <th>Tipe Ukur</th>
                                            <th>Start Ukur</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyAntrian"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->


<!-- Modal for Pilih Pengukuran -->
<div class="modal fade" id="PilihUkur" tabindex="-1" role="dialog" aria-labelledby="PilihUkurLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PilihUkurLabel">Pilih Pengukuran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="pengukuranForm" method="post" action="<?= base_url('In_QI/startUkurGM'); ?>">
                    <div class="form-group">
                        <label for="IDGMUkur">ID GM:</label>
                        <input type="text" name="id_gmUkur" id="id_gmUkur" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="lineUkur">Line:</label>
                        <input type="text" class="form-control" id="lineUkur" name="lineUkur" readonly>
                    </div>
                    <div class="form-group">
                        <label for="produkUkur">Product:</label>
                        <input type="text" class="form-control" id="produkUkur" name="produkUkur" readonly>
                    </div>
                    <div class="form-group">
                        <label for="startgmUkur">Start GM:</label>
                        <input type="text" class="form-control" id="startgmUkur" name="startgmUkur" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tipeprosesUkur">Pilih Proses & Jenis Pengukuran</label>
                        <select name="tipeprosesUkur" id="tipeprosesUkur" class="form-control" required>
                            <option disabled selected>-- Pilih Proses & Jenis Ukur --</option>
                            <?php foreach ($tipeukur as $tu) : ?>
                                <option value="<?= $tu->proses . ' - ' . $tu->tipe_pengukuran; ?>">
                                    <?= $tu->proses . ' - ' . $tu->tipe_pengukuran; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="startUkur">Start Ukur:</label>
                        <input type="datetime-local" name="startUkur" id="startUkur" class="form-control" required>
                    </div>
                    <div style="display: flex; align-items: flex-end; justify-content: flex-end;">
                        <button type="button" class="btn btn-primary mulaiPengukuran" id="mulaiPengukuran">UKUR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('Template/footer_inqi'); ?>

<script>
    $(document).ready(function() {
        var headerQI = document.getElementById('headerQI');

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
            headerQI.innerHTML = "Silahkan Lakukan Pengukuran Hari " + new Intl.DateTimeFormat('in', options).format(new Date);
        }, 1000);
    })
</script>

<script>
    $(document).ready(function() {
        var countDetail = 0;

        function showDetailModal(idGM) {
            $("#modalDetaiLUkur").html("<div class='overlay d-flex justify-content-center align-items-center'>" +
                "<i class='fas fa-2x fa-sync fa-spin'></i>" +
                "</div>");

            $.ajax({
                type: "POST",
                url: "<?= site_url('In_QI/ListGMOnGoing'); ?>",
                data: {
                    idGM: idGM
                },
                success: function(data) {
                    try {
                        var items = [];
                        var i = 1;
                        $.each(JSON.parse(data), function(key, val) {
                            var tr = "<tr>";
                            tr += "<td>" + i + "</td>";
                            tr += "<td>" + val.line + "</td>";
                            tr += "<td>" + val.product + "</td>";
                            tr += "<td>" + val.ukur + "</td>";
                            // tr += "<td>" + val.status + "</td>";
                            var stat = val.status;
                            if (stat == 0) tr += "<td><span class='badge badge-danger'>NG</span></td>";
                            else if (stat == 1) tr += "<td><span class='badge badge-success'>OK</span></td>";
                            else if (stat == 9) tr += "<td><span class='badge badge-warning'>Belum Ukur</span></td>";
                            tr += "<td>" + val.start_ukur + "</td>";
                            tr += "<td>" + val.on_ukur + "</td>";
                            tr += "<td>" + val.finish_ukur + "</td>";
                            // tr += "<td>" + val.file + "</td>";
                            tr += "<td><a href='assets/uploads/" + val.file + "' download>" + val.file + "</a></td>";
                            tr += "<td>" + val.catatan + "</td>";
                            var stat = val.status;
                            if (stat == 9) tr += "<td><span class='badge badge-danger'><i class='fas fa-times'></i></span></td>";
                            else if (stat == 1) tr += "<td><span class='badge badge-success'><i class='icon fas fa-check'></i></span></td>";
                            else if (stat == 0) tr += "<td><span class='badge badge-warning'><i class='icon fas fa-check'></i></span></td>";
                            tr += "</tr>";
                            items.push(tr);
                            i++;
                        });
                        $('#tbodyUkur').html(items);
                        if (countDetail == 0) {
                            $("#TabelDetailUkur").DataTable({
                                "responsive": true,
                                "autoWidth": false,
                            });
                            countDetail++;
                        }
                        $("#modalDetaiLUkur").html("");
                    } catch (e) {
                        console.error(e);
                    }
                },
                error: function(err) {
                    console.error(err);
                },
            });
        }

        $("#TabelData").on('click', '.btnDetailUkur', function() {
            var currentRow = $(this).closest("tr");
            var colIDGM = currentRow.find("td:eq(1)").text();

            // Tampilkan modal detail dengan data sesuai idGM
            showDetailModal(colIDGM);
        });
    });
</script>

<script>
    function hapusDataGM(id) {
        $.ajax({
            type: "POST",
            url: "<?= site_url('In_QI/deleteGM'); ?>",
            data: {
                id: id
            },
            dataType: 'json', // Add this line to ensure correct data type
            success: function(response) {
                console.log(response);

                if (response.success) {
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Data GM berhasil dihapus.',
                        icon: 'success'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Refresh halaman atau lakukan operasi lain
                            location.reload(); // Contoh: Refresh halaman
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Gagal',
                        text: 'Terjadi kesalahan saat menghapus data GM.',
                        icon: 'error'
                    });
                }
            },
            error: function() {
                Swal.fire({
                    title: 'Gagal',
                    text: 'Terjadi kesalahan saat menghubungi server.',
                    icon: 'error'
                });
            }
        });
    }
</script>

<script>
    function hapusDataDY(id) {
        $.ajax({
            type: "POST",
            url: "<?= site_url('In_QI/deleteDY'); ?>",
            data: {
                id: id
            },
            dataType: 'json', // Add this line to ensure correct data type
            success: function(response) {
                console.log(response);

                if (response.success) {
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Data DY berhasil dihapus.',
                        icon: 'success'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Refresh halaman atau lakukan operasi lain
                            location.reload(); // Contoh: Refresh halaman
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Gagal',
                        text: 'Terjadi kesalahan saat menghapus data DY.',
                        icon: 'error'
                    });
                }
            },
            error: function() {
                Swal.fire({
                    title: 'Gagal',
                    text: 'Terjadi kesalahan saat menghubungi server.',
                    icon: 'error'
                });
            }
        });
    }
</script>

<script>
    function DetailUkurGM(id_gm) {
        $("#idGM").val(id_gm);
        $("#DetailUkur").modal("show");
    }
</script>
<script>
    $(document).ready(function() {
        var countDetail = 0;

        function DetailUkurGM(idGM) {
            $("#modalDetaiLUkur").html("<div class='overlay d-flex justify-content-center align-items-center'>" +
                "<i class='fas fa-2x fa-sync fa-spin'></i>" +
                "</div>");

            $.ajax({
                type: "POST",
                url: "<?= site_url('In_QI/ListGMOnGoing'); ?>",
                data: {
                    idGM: idGM
                },
                success: function(data) {
                    try {
                        var items = [];
                        var i = 1;
                        $.each(JSON.parse(data), function(key, val) {
                            var tr = "<tr>";
                            tr += "<td>" + i + "</td>";
                            tr += "<td>" + val.line + "</td>";
                            tr += "<td>" + val.product + "</td>";
                            tr += "<td>" + val.ukur + "</td>";
                            var stat = val.status;
                            if (stat == 0) tr += "<td><span class='badge badge-danger'>NG</span></td>";
                            else if (stat == 1) tr += "<td><span class='badge badge-success'>OK</span></td>";
                            else if (stat == 9) tr += "<td><span class='badge badge-warning'>Belum Ukur</span></td>";
                            tr += "<td>" + val.start_ukur + "</td>";
                            tr += "<td>" + val.on_ukur + "</td>";
                            tr += "<td>" + val.finish_ukur + "</td>";
                            tr += "<td><a href='assets/uploads/" + val.file + "' download>" + val.file + "</a></td>";
                            tr += "<td>" + val.catatan + "</td>";
                            var stat = val.status;
                            if (stat == 9) tr += "<td><span class='badge badge-danger'><i class='fas fa-times'></i></span></td>";
                            else if (stat == 1) tr += "<td><span class='badge badge-success'><i class='icon fas fa-check'></i></span></td>";
                            else if (stat == 0) tr += "<td><span class='badge badge-warning'><i class='icon fas fa-check'></i></span></td>";
                            tr += "</tr>";
                            items.push(tr);
                            i++;
                        });

                        $('#tbodyUkur').html(items);
                        if (countDetail == 0) {
                            $("#TabelDetailUkur").DataTable({
                                "responsive": true,
                                "autoWidth": false,
                            });
                            countDetail++;
                        }
                        $("#modalDetaiLUkur").html("");
                    } catch (e) {
                        console.error(e);
                    }
                },
                error: function(err) {
                    console.error(err);
                },
            });
        }

        $("#TabelData2").on('click', '.btnDetailUkur', function() {
            var currentRow = $(this).closest("tr");
            var colIDGM = currentRow.find("td:eq(1)").text();

            // Tampilkan modal detail dengan data sesuai idGM
            DetailUkurGM(colIDGM);
        });
    });
</script>

<!-- <script>
    $(document).ready(function() {
        $('#btnPilihUkur').on('click', function() {
            // Assuming you have jQuery loaded

            // Get data from the selected card
            var line = $(this).closest('.small-box').find('.row:eq(2) .col:eq(0) h5').text().trim().split(':')[1].trim();
            var product = $(this).closest('.small-box').find('.row:eq(3) .col:eq(0) h5').text().trim().split(':')[1].trim();
            var start_gm = $(this).closest('.small-box').find('.row:eq(4) .col h5').text().trim();

            // Populate modal fields
            $('#line').val(line);
            $('#product').val(product);
            $('#start_gm').val(start_gm);
        });

        // Add event listener for form submission
        $('#pengukuranForm').submit(function(e) {
            e.preventDefault();

            // Add your code to handle form submission (POST data and update database)
            // You can use AJAX or submit the form traditionally
        });
    });
</script> -->
<script>
    $(document).ready(function() {
        $('.btnPilihUkur').on('click', function() {
            var id_gm = $(this).closest('tr').find('#id_gm').text().trim();
            var line = $(this).closest('tr').find('#forLine').text().trim();
            var product = $(this).closest('tr').find('#forProduk').text().trim();
            var start_gm = $(this).closest('tr').find('#forStartgm').text().trim();

            $('#lineUkur').val(line);
            $('#produkUkur').val(product);
            $('#startgmUkur').val(start_gm);
            $('#id_gmUkur').val(id_gm);
        });

        // Add event listener for "UKUR" button
        $('.mulaiPengukuran').on('click', function() {
            // Submit the form using AJAX
            $.ajax({
                type: "POST",
                url: $('#pengukuranForm').attr('action'),
                data: $('#pengukuranForm').serialize(),
                success: function(response) {
                    // Assuming you have included SweetAlert library
                    Swal.fire({
                        title: 'Permintaan Pengukuran Berhasil Dikirim!',
                        text: 'Silahkan Menunggu Hasil Pengukuran',
                        icon: 'success',
                    });
                    // Reload the page after showing the SweetAlert
                    location.reload();
                },
                error: function(error) {
                    console.error('Error:', error);
                    // Handle the error, show a message, etc.
                }
            });
        });

        // Remove the submit event listener for form submission
        $('#pengukuranForm').off('submit');
    });
</script>

<script>
    $(document).ready(function() {
        $('#MulaiDaily').on('click', function() {
            $.ajax({
                type: "POST",
                url: $('#dailyCheckForm').attr('action'),
                data: $('#dailyCheckForm').serialize(),
                success: function(response) {
                    Swal.fire({
                        title: 'Permintaan Pengukuran Berhasil Dikirim!',
                        text: 'Silahkan Menunggu Hasil Pengukuran',
                        icon: 'success',
                    });
                    location.reload();
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>

<!-- Script Pilih Line dan Produk DY -->
<script>
    $(document).ready(function() {
        $("#lineDY").change(function() {
            var selectLine = $(this).val();

            $.ajax({
                url: "<?= site_url('In_QI/getProdukByLine'); ?>",
                type: "POST",
                dataType: "json",
                data: {
                    lineDY: selectLine
                },
                success: function(data) {
                    $("#produkDY").empty();
                    $.each(data, function(key, value) {
                        $("#produkDY").append('<option value ="' + value.nama_produk + '">' + value.nama_produk + '</option>');
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        var pilihLine = $("#lineDY");
        var pilihProduk = $("#produkDY");
        var pilihTipeProses = $("#ukurDY");
        var pilihStartDY = $("#start_ukur");
        var BtnDY = $("#MulaiDaily");

        BtnDY.prop("disabled", true);

        pilihLine.change(validateForm);
        pilihProduk.change(validateForm);
        pilihTipeProses.change(validateForm);
        pilihStartDY.change(validateForm);

        function validateForm() {
            if (pilihLine.val() !== "-- Pilih Line --" && pilihProduk.val() !== "-- Pilih Produk --" && pilihTipeProses.val() !== "-- Pilih Proses & Tipe Ukur --" && pilihStartDY.val() !== "") {
                BtnDY.prop("disabled", false);
            } else {
                BtnDY.prop("disabled", true);
            }
        }
    });
</script>