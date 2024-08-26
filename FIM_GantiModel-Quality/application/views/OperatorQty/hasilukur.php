<div class="flash-data" data-flashdata="<?= $this->session->flashdata("flash"); ?>"></div>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-11">
                    <h1>Hasil Pengukuran</h1>
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
                            <h3 class="card-title">Data Hasil Pengukuran Ganti Model</h3>
                        </div>
                        <div class="card-body">
                            <table id="TabelData" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th hidden>ID GM</th>
                                        <th>Line</th>
                                        <th>Product</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ($gmdata as $gm) { ?>
                                        <?php if (empty($gm->finish_gm)) { ?>
                                            <tr>
                                                <td>
                                                    <?php $i++; ?>
                                                    <?php echo $i ?>
                                                </td>
                                                <td id="idgm" hidden><?= $gm->id_gm; ?></td>
                                                <td><?= $gm->line; ?></td>
                                                <td><?= $gm->product; ?></td>
                                                <td>
                                                    <button type="button" id="BtnDetailPengukuran" class="btn btn-default btn-sm BtnDetailPengukuran" data-toggle="modal" data-target="#ModalDetailPengukuran" data-id="<?= $gm->id_gm; ?>" onclick="DetailRowGM(<?= $gm->id_gm; ?>)" title="Detail Data Ukur GM">
                                                        <i class="fas fa-list-ul"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                            <h3 class="card-title">Data Hasil Pengukuran Daily Check</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            // Set zona waktu ke WIB (UTC +7)
                            date_default_timezone_set('Asia/Jakarta');
                            $tanggal_aktual = date("Y-m-d");
                            ?>
                            <table id="TabelData2" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th hidden>ID</th>
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
                                        <!-- <th>Aksi</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ($dyongo as $dy) { ?>
                                        <?php if (date("Y-m-d", strtotime($dy->finish_ukur)) === $tanggal_aktual) { ?>
                                            <tr>
                                                <td>
                                                    <?php $i++; ?>
                                                    <?php echo $i ?>
                                                </td>
                                                <td hidden><?= $dy->id; ?></td>
                                                <td><?= $dy->line; ?></td>
                                                <td><?= $dy->product; ?></td>
                                                <td><?= $dy->ukur; ?></td>
                                                <td><?php
                                                    $stat = $dy->status;
                                                    if ($stat == 0) echo "<span class='badge badge-danger'>NG</span>";
                                                    else if ($stat == 1) echo "<span class='badge badge-success'>OK</span>";
                                                    else if ($stat == 9) echo "<span class='badge badge-warning'>Belum Ukur</span>";
                                                    ?>
                                                </td>
                                                <td><?= $dy->start_ukur; ?></td>
                                                <td><?= $dy->on_ukur; ?></td>
                                                <td><?= $dy->finish_ukur; ?></td>
                                                <td><a href="<?= base_url('assets/uploads/') . $dy->file; ?>" download><?= $dy->file; ?></a></td>
                                                <td><?= $dy->catatan; ?></td>
                                                <td><?php
                                                    $stat = $dy->status;
                                                    if ($stat == 9) echo "<span class='badge badge-danger'><i class='fas fa-times'></i></span>";
                                                    else if ($stat == 1) echo "<span class='badge badge-success'><i class='icon fas fa-check'></i></span>";
                                                    else if ($stat == 0) echo "<span class='badge badge-warning'><i class='icon fas fa-check'></i></span>";
                                                    ?>
                                                </td>
                                                <!-- <td>
                                                    <button type="button" id="BtnEditFileDY" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ModalEditFileDY" data-id="<?= $dy->id; ?>" onclick="EditRowDY(<?= $dy->id; ?>)" title="Edit Data Daily">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </td> -->
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Detail Ukur -->
<form method="post" enctype="multipart/form-data">
    <div class="modal fade" id="ModalDetailPengukuran">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div id="ModalHasilUkur"></div>
                <div class="modal-header">
                    <h4 class="modal-title">
                        <label>Hasil Ukur Ganti Model</label>
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
                                    <h3 class="card-title">Data Ganti Model</h3>
                                </div>
                                <div class="card-body">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label hidden>ID GM</label>
                                            <input type="hidden" name="id_gm" id="id_gm" class="form-control">
                                        </div>
                                    </div>
                                    <table id="TabelHasilUkur" class="table table-striped table-hover">
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
                                                <!-- <th>Aksi</th> -->
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyHasilUkur"></tbody>
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

<!-- Modal Edit File GM -->
<form action="<?= site_url('Qty_Hasilukur/editfilegm'); ?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="ModalEditFileGM">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <label>Edit File Hasil Ukur Ganti Model</label>
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
                                    <input type="hidden" name="idgmEditFile" id="idgmEditFile" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="file_editgm">Masukan File Baru</label>
                                    <input type="file" name="file_editgm" id="file_editgm" class="form-control-file" accept=".pdf, .jpg, .png, .jpeg, .doc, .docx" onchange="previewFile()">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="BtnSubmitEditFileGM">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php $this->load->view('Template/footer'); ?>


<script>
    function DetailRowGM(id_gm) {
        $("#idGM").val(id_gm);
        $("#ModalDetailPengukuran").modal("show");
    }
</script>
<script>
    $(document).ready(function() {
        var countDetail = 0;

        function HasilUkurGM(idGM) {
            // var btnEditFileGM = "<button title='Edit File Hasil GM' type='button' class='btn btn-warning btn-xs btnEdit' data-toggle='modal' data-target='#ModalEditFileGM'><i class='fas fa-edit'></button>";

            // $("#ModalHasilUkur").html("<div class='overlay d-flex justify-content-center align-items-center'>" +
            //     "<i class='fas fa-2x fa-sync fa-spin'></i>" +
            //     "</div>");

            $.ajax({
                type: "POST",
                url: "<?= site_url('Qty_Hasilukur/ListGMOnGoing'); ?>",
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
                            // tr += "<td>" + btnEditFileGM + "</td>";
                            tr += "</tr>";
                            items.push(tr);
                            i++;
                        });

                        $('#tbodyHasilUkur').html(items);
                        if (countDetail == 0) {
                            $("#TabelHasilUkur").DataTable({
                                "responsive": true,
                                "autoWidth": false,
                            });
                            countDetail++;
                        }
                        $("#ModalHasilUkur").html("");
                    } catch (e) {
                        console.error(e);
                    }
                },
                error: function(err) {
                    console.error(err);
                },
            });
        }

        $("#TabelData").on('click', '.BtnDetailPengukuran', function() {
            var currentRow = $(this).closest("tr");
            var colIDGM = currentRow.find("td:eq(1)").text();

            // Tampilkan modal detail dengan data sesuai idGM
            HasilUkurGM(colIDGM);
        });

        $("#TabelHasilUkur").on('click', '.btnEdit', function() {
            var currentRow = $(this).closest("tr");
            var idGM = currentRow.find("td:eq(1)").text(); // Gantilah sesuai dengan kolom yang benar
            $("#idgmEditFile").val(idGM);
        });

        $("#BtnSubmitEditFileGM").on('click', function() {
            var formData = new FormData($("#FormEditFileGM")[0]);

            $.ajax({
                type: 'POST',
                url: '<?= site_url('Qty_Hasilukur/editfilegm'); ?>',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    Swal.fire({
                        title: 'Apakah Anda Yakin Melakukan Perubahan File?',
                        text: 'Silahkan Cek Kembali, Apakah File Sudah Benar',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $("#FormEditFileGM").unbind('submit').submit();

                            Swal.fire(
                                'Berhasil',
                                'File Sudah Tersimpan',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        }
                    });
                }
            });
        });
    });
</script>