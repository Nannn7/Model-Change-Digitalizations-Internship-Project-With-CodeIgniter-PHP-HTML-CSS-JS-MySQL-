<div class="flash-data" data-flashdata="<?= $this->session->flashdata("flash"); ?>"></div>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-11">
                    <!-- <h1>Kelola User</h1> -->
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
                            <h2 class="card-title">Form Ganti Model</h3>
                        </div>
                        <div class="card-body">
                            <form id="startGantiModelForm">
                                <div class="mb-3">
                                    <label>Pilih Line</label>
                                    <select name="line" id="line" class="form-control" required>
                                        <option disabled selected>-- Pilih Line --</option>
                                        <?php foreach ($line as $l) : ?>
                                            <option value="<?= $l->line; ?>"><?= $l->line; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Pilih Product</label>
                                    <select name="nama_produk" id="nama_produk" class="form-control" required>
                                        <option disabled selected>-- Pilih Product --</option>
                                        <?php foreach ($produk as $p) : ?>
                                            <option value="<?= $p->nama_produk; ?>"><?= $p->nama_produk; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </form>
                            <center><button type="submit" class="btn btn-primary" id="btnStartGM" data-toggle="modal" data-target="#modalStartGM">Submit</button></center>
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
                            <table id="TabelData" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th hidden>ID GM</th>
                                        <th>Line</th>
                                        <th>Product</th>
                                        <th>Start GantiModel</th>
                                        <th>Hasil Ukur</th>
                                        <th>Total Pengukuran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ($ganmod as $gm) { ?>
                                        <?php if (empty($gm->finish_gm)) { ?>
                                            <tr>
                                                <td>
                                                    <?php $i++; ?>
                                                    <?php echo $i ?>
                                                </td>
                                                <td id="id_gm" class="id_gm" hidden><?= $gm->id_gm; ?></td>
                                                <td><?= $gm->line; ?></td>
                                                <td><?= $gm->product; ?></td>
                                                <td><?= $gm->start_gm; ?></td>
                                                <?php
                                                $statusCounts = countStatus($stts, $gm->id_gm);
                                                ?>
                                                <td>OK = <?= $statusCounts['OK']; ?> | NG = <?= $statusCounts['NG']; ?></td>
                                                <td>
                                                    <?php foreach ($total_measurements as $total) : ?>
                                                        <?php if ($gm->id_gm == $total->id_gm) : ?>
                                                            <?= $total->total_pengukuran; ?> Pengukuran
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td>
                                                    <button id="btnDetailUkur" title="Detail Data Measure On Going" type="button" class="btn btn-primary btn-small btnDetailUkur" data-id="<?= $gm->id_gm; ?>" data-toggle="modal" data-target="#DetailUkur">
                                                        <i class="fas fa-list-ul"></i>
                                                    </button>
                                                    <?php if (empty($gm->user_qc) || empty($gm->pass_qc)) : ?>
                                                        <button type="button" id="btnQC" title="QC" class="btn btn-warning btn-small btnQC" data-toggle="modal" data-target="#QCModal" data-id="<?= $gm->id_gm; ?>" onclick="inputqc(<?= $gm->id_gm; ?>)">
                                                            QC
                                                        </button>
                                                    <?php else : ?>
                                                        <button type="button" id="btnSelesaiGM" title="Selesai Ganti Model" data-toggle="modal" data-target="#SelesaiGM" class="btn btn-success btn-small" onclick="prepareSelesaiGMModal(<?= $gm->id_gm; ?>)">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                    <button type="button" title="Hapus GM" class="btn btn-danger btn-small" data-toggle="modal" data-target="#deleteModal" onclick="prepareDeleteModal(<?= $gm->id_gm; ?>)">
                                                        <i class="fas fa-trash delGM"></i>
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
</div>

<!-- Modal Start GM -->
<form action="<?= site_url('GM_Start/mulaiGM'); ?>" method="post" role="form" id="formTglStart">
    <div class="modal fade" id="modalStartGM">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <label>Form Ganti Model</label>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <input type="hidden" name="id_gm" id="id_gm">
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label for="txtLine" class="form-label">Line</label>
                            </div>
                            <div class="col-md-8 ms-auto">
                                <input type="text" name="txtLine" id="txtLine" class="form-control" readonly required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label for="txtProduct" class="form-label">Product</label>
                            </div>
                            <div class="col-md-8 ms-auto">
                                <input type="text" name="txtProduct" id="txtProduct" class="form-control" readonly required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label for="start_gm" class="form-label">Start GM</label>
                            </div>
                            <div class="col-md-8 ms-auto">
                                <input type="datetime-local" name="start_gm" id="start_gm" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btnMulaiGM">Start</button>
                </div>
            </div>
        </div>
    </div>
</form>

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

<!-- ModalQC -->
<form id="qcForm" action="<?= site_url('GM_Start/otentikasiQC'); ?>" method="post" role="form">
    <div class="modal fade" id="QCModal" tabindex="-1" aria-labelledby="QCModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="QCModalLabel">Masukan User QC Untuk Autentikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_gm_qc" id="id_gm_qc">
                    <input type="hidden" name="line_qc" id="line_qc">
                    <input type="hidden" name="produk_qc" id="produk_qc">
                    <input type="hidden" name="start_gm_qc" id="start_gm_qc">
                    <div class="form-group">
                        <label for="user_qc">Username</label>
                        <input type="text" class="form-control" id="user_qc" name="user_qc" required>
                    </div>
                    <div class="form-group">
                        <label for="pass_qc">Password</label>
                        <input type="password" class="form-control" id="pass_qc" name="pass_qc" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Selesai GM -->
<form id="selesaiGMForm" action="<?= site_url('GM_Start/selesaiGM'); ?>" method="post">
    <div class="modal fade" id="SelesaiGM" tabindex="-1" role="dialog" aria-labelledby="SelesaiGMLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="SelesaiGMLabel">Silahkan Masukan User Machining Untuk Menyelesaikan GantiModel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_gm_selesai" id="id_gm_selesai">
                    <input type="hidden" name="line_selesai" id="line_selesai">
                    <input type="hidden" name="produk_selesai" id="produk_selesai">
                    <input type="hidden" name="start_gm_selesai" id="start_gm_selesai">
                    <div class="form-group">
                        <label for="finish_gm">Tanggal Finish GM</label>
                        <input type="datetime-local" class="form-control" id="finish_gm" name="finish_gm" placeholder="YYYY-MM-DD HH:mm" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal untuk menghapus data GM -->
<form action="<?= site_url('GM_Start/deleteGM'); ?>" method="post" id="validationDeleteGM">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Masukan User dan Password Sebelum Menghapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_gm_delete" id="id_gm_delete">
                    <input type="hidden" name="line_delete" id="line_delete">
                    <input type="hidden" name="produk_delete" id="produk_delete">
                    <input type="hidden" name="start_gm_delete" id="start_gm_delete">
                    <div class="form-group">
                        <label for="user_del">Username</label>
                        <input type="text" class="form-control" id="user_del" name="user_del" required>
                    </div>
                    <div class="form-group">
                        <label for="pass_del">Password</label>
                        <input type="password" class="form-control" id="pass_del" name="pass_del" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php $this->load->view('Template/footer'); ?>

<script>
    $(document).ready(function() {
        $("#line").change(function() {
            var selectedLine = $(this).val();

            $.ajax({
                url: "<?= site_url('GM_Start/getProductsByLine'); ?>",
                type: "POST",
                dataType: "json",
                data: {
                    line: selectedLine
                },
                success: function(data) {
                    $("#nama_produk").empty();
                    $.each(data, function(key, value) {
                        $("#nama_produk").append('<option value ="' + value.nama_produk + '">' + value.nama_produk + '</option>');
                    });
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        var lineSelect = $("#line");
        var productSelect = $("#nama_produk");
        var submitBtn = $("#btnStartGM");
        var form = $("#startGantiModelForm");

        submitBtn.prop("disabled", true);

        lineSelect.change(validateForm);
        productSelect.change(validateForm);

        function validateForm() {
            // Periksa apakah kedua pemilihan telah dipilih
            if (lineSelect.val() !== "-- Pilih Line --" && productSelect.val() !== "-- Pilih Produk --") {
                // Aktifkan tombol Submit jika keduanya telah dipilih
                submitBtn.prop("disabled", false);
            } else {
                // Nonaktifkan tombol Submit jika salah satu atau keduanya belum dipilih
                submitBtn.prop("disabled", true);
            }
        }

        submitBtn.click(function() {
            var selectedLine = lineSelect.val();
            var selectedProduct = productSelect.val();

            $("#txtLine").val(selectedLine);
            $("#txtProduct").val(selectedProduct);
        });
        submitBtn.click(function() {
            var selectedLine = lineSelect.val();
            var selectedProduct = productSelect.val();

            // Panggil validasi di sisi server menggunakan Ajax
            $.ajax({
                url: "<?= base_url('GM_Start/validasiNilai'); ?>", // Ubah dengan alamat skrip validasi Anda
                method: "POST",
                data: {
                    line: selectedLine,
                    product: selectedProduct
                },
                success: function(response) {
                    if (response == "valid") {
                        // Jika validasi berhasil, kirim formulir
                        $('#modalStartGM').modal('show');
                    } else {
                        // Jika validasi gagal, tampilkan pesan kesalahan menggunakan SweetAlert2
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response, // Pesan kesalahan dari server
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            // Jika pengguna menekan tombol "OK", reload halaman
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan jika terjadi
                    alert("An error occurred: " + error);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#formTglStart").submit(function(e) {
            e.preventDefault();

            var formData = {
                id_gm: $("#id_gm").val(),
                txtLine: $("#txtLine").val(),
                txtProduct: $("#txtProduct").val(),
                start_gm: $("#start_gm").val()
            };

            $.ajax({
                url: $(this).attr("action"),
                type: "POST",
                data: formData,
                success: function(response) {
                    console.log(response);
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: 'Ganti Model Berhasil Dilakukan, Silahkan Melakukan Pilih Pengukuran',
                    }).then((result) => {
                        // Reload halaman jika pengguna menekan "OK"
                        if (result.isConfirmed || result.isDismissed) {
                            window.location.reload();
                        }
                    });
                },
                error: function(error) {
                    // Handle kesalahan (jika diperlukan)
                    console.error(error);

                    // Tampilkan SweetAlert untuk error
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan. Silakan coba lagi.',
                    });
                }
            });
        });
    });
</script>

<script>
    function prepareDeleteModal(id_gm) {
        $("#id_gm_delete").val(id_gm);
        $("#deleteModal").modal("show");
    }
</script>
<script>
    $(document).ready(function() {
        $('#validationDeleteGM').submit(function(event) {
            event.preventDefault(); // Mencegah pengiriman form default

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == 'success') {
                        // Tampilkan SweetAlert sukses
                        swal("Sukses!", response.message, "success")
                            .then((value) => {
                                // Redirect ke halaman GM_Start
                                window.location.reload();
                            });
                    } else {
                        // Tampilkan SweetAlert error
                        swal("Gagal!", response.message, "error")
                            .then((value) => {
                                // Reload halaman
                                window.location.reload();
                            });
                    }
                }
            });
        });
    });
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
            // $("#modalDetaiLUkur").html("<div class='overlay d-flex justify-content-center align-items-center'>" +
            //     "<i class='fas fa-2x fa-sync fa-spin'></i>" +
            //     "</div>");

            $.ajax({
                type: "POST",
                url: "<?= site_url('GM_Start/ListGMOnGoing'); ?>",
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

        $("#TabelData").on('click', '.btnDetailUkur', function() {
            var currentRow = $(this).closest("tr");
            var colIDGM = currentRow.find("td:eq(1)").text();

            // Tampilkan modal detail dengan data sesuai idGM
            DetailUkurGM(colIDGM);
        });
    });
</script>

<script>
    function inputqc(id_gm) {
        $("#id_gm_qc").val(id_gm);
        $("#QCModal").modal("show");
    }
</script>
<script>
    $(document).ready(function() {
        $('#qcForm').submit(function(event) {
            event.preventDefault(); // Mencegah pengiriman form default

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == 'success') {
                        // Tampilkan SweetAlert sukses
                        swal("Sukses!", response.message, "success")
                            .then((value) => {
                                // Redirect ke halaman GM_Start
                                window.location.reload();
                            });
                    } else {
                        // Tampilkan SweetAlert error
                        swal("Gagal!", response.message, "error")
                            .then((value) => {
                                // Reload halaman
                                window.location.reload();
                            });
                    }
                }
            });
        });
    });
</script>

<script>
    function prepareSelesaiGMModal(id_gm) {
        $("#id_gm_selesai").val(id_gm);
        $("#SelesaiGM").modal("show");
    }
</script>
<script>
    $(document).ready(function() {
        $('#selesaiGMForm').submit(function(e) {
            e.preventDefault(); // Prevent the form from submitting normally

            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: 'Proses Ganti Model Akan Selesai, Lanjutkan?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user clicks "Yes", submit the form
                    $(this).unbind('submit').submit(); // Unbind the submit event and submit the form

                    // Show success message after the form is submitted
                    Swal.fire(
                        'Selesai!',
                        'Proses Ganti Model Telah Selesai.',
                        'success'
                    ).then(() => {
                        // Reload the page after the user clicks OK in the success message
                        location.reload();
                    });
                }
            });
        });
    });
</script>