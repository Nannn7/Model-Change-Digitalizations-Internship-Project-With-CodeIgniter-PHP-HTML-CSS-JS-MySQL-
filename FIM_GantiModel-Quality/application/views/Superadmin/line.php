<div class="flash-data" data-flashdata="<?= $this->session->flashdata("flash"); ?>"></div>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-11">
                    <h1>Kelola Line</h1>
                </div>
                <div class="col-sm-1">
                    <button type="button" id="btnTambah" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg">Tambah</button>
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
                            <h3 class="card-title">Data Line</h3>
                        </div>
                        <div class="card-body">
                            <table id="TabelData" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th hidden>ID</th>
                                        <th>Nama Line</th>
                                        <th>Status</th>
                                        <th hidden>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ($line as $l) { ?>
                                        <tr>
                                            <td>
                                                <?php $i++; ?>
                                                <?php echo $i ?>
                                            </td>
                                            <td hidden><?= $l->id; ?></td>
                                            <td><?= $l->nama_line; ?></td>
                                            <td><?php
                                                $stat = $l->status_line;
                                                if ($stat == 0) echo "<span class='right badge badge-danger'>Tidak Aktif</span>";
                                                else if ($stat == 1) echo "<span class='right badge badge-info'>Aktif</span>";
                                                ?>
                                            </td>
                                            <td hidden><?= $l->status_line; ?></td>
                                            <td>
                                                <button id="btnEdit" title="Edit Data Product" type="button" data-toggle="modal" data-target="#modal-lg" class="btn btn-default btn-xs">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <?php
                                                if ($stat == 1) echo "<button id='btnAktif' type='button' data-toggle='modal' data-target='#modal-status' class='btn btn-warning btn-xs' title='Nonaktifkan Line'><i class='fas fa-times'></i></button>";
                                                else if ($stat == 0) echo "<button id='btnNonaktif' type='button' data-toggle='modal' data-target='#modal-status' class='btn btn-info btn-xs' title='Aktifkan Line'><i class='fas fa-check'></i></button>";
                                                ?>
                                                <button class="btn btn-danger btn-xs" title="Hapus Data Line" type="button" onclick="hapusLine(<?= $l->id; ?>)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
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

<!-- Modal Tambah Product -->
<form method="post" role="form" id="formInput" action="<?php echo site_url('SA_Line/tambahEdit') ?>">
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <label id="headerModal">Masukan Data Line</label>
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
                                    <input id="operation" name="operation" type="hidden" value="add">
                                    <input id="txtID" name="id" type="hidden" />
                                    <input id="status_line" name="status_line" type="hidden" />
                                    <label>Nama Line</label>
                                    <input type="text" name="nama_line" id="nama_line" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a id="btnClear" class="btn btn-default">Clear</a>
                        <input type="submit" id="submit" value="Simpan" class="btn btn-info" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Edit Status -->
<form role="form" action="<?php echo site_url('SA_Line/editStatus') ?>" method="post">
    <div class="modal fade" id="modal-status">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <input type="hidden" id="txtID2" name="id" class="form-control" />
                    <h5 id="txtConfirm">#</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <button id="btnConfirm" type="submit" class="btn btn-info">Ya</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php $this->load->view('Template/footer'); ?>

<script>
    $(document).ready(function() {
        var id = document.getElementById('txtID');
        var nama_line = document.getElementById('nama_line');
        var status_line = document.getElementById('status_line');

        var id2 = document.getElementById('txtID2');
        var txtConfirm = document.getElementById('txtConfirm');
        var headerModal = document.getElementById('headerModal');

        var operation = document.getElementById('operation');

        function clear() {
            nama_line.value = "";
        }

        $("#TabelData").on('click', '#btnEdit', function() {
            var currentRow = $(this).closest("tr");
            var colID = currentRow.find("td:eq(1)").text();
            var colNamaline = currentRow.find("td:eq(2)").text();
            var colStatusline = currentRow.find("td:eq(4)").text();

            headerModal.innerHTML = "Edit Data Line";
            id.value = colID;
            nama_line.value = colNamaline;
            status_line.value = colStatusline;

            operation.value = "edit";
        });

        $("#TabelData").on('click', '#btnAktif, #btnNonaktif', function() {
            var currentRow = $(this).closest("tr");
            var colID = currentRow.find("td:eq(1)").text();
            var confirmText = ($(this).attr('id') === 'btnAktif') ? "Apakah Anda Ingin Menonaktifkan Data?" : "Apakah Anda Ingin Mengaktifkan Data?";

            $("#txtConfirm").text(confirmText);
            $("#txtID2").val(colID);
        });

        $('#btnTambah').on("click", function(e) {
            headerModal.innerHTML = "Masukkan Data Line";
            id.value = "";
            status_line.value = "";
            clear();
        });

        $('#btnClear').on("click", function(e) {
            clear();
        });
    });
</script>

<script>
    function hapusLine(id) {
        Swal.fire({
            title: 'Konfirmasi Hapus Data Line',
            text: 'Apakah Anda Yakin Ingin Menghapus Data Line?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('SA_Line/deleteLine'); ?>',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire('Sukses!', 'Data berhasil dihapus!', 'success');
                            location.reload();
                        } else {
                            Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus data.', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error!', 'Terjadi kesalahan saat menghubungi server.', 'error');
                    }
                });
            }
        });
    }
</script>