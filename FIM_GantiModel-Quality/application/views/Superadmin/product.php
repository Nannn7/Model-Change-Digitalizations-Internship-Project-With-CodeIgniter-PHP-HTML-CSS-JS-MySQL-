<div class="flash-data" data-flashdata="<?= $this->session->flashdata("flash"); ?>"></div>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-11">
                    <h1>Kelola Product</h1>
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
                            <h3 class="card-title">Data Product</h3>
                        </div>
                        <div class="card-body">
                            <table id="TabelData" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th hidden>ID</th>
                                        <th>Line</th>
                                        <th>Product</th>
                                        <th>Status</th>
                                        <th hidden>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ($product as $p) { ?>
                                        <tr>
                                            <td>
                                                <?php $i++; ?>
                                                <?php echo $i ?>
                                            </td>
                                            <td hidden><?= $p->id; ?></td>
                                            <td><?= $p->line; ?></td>
                                            <td><?= $p->nama_produk; ?></td>
                                            <td><?php
                                                $stat = $p->status_produk;
                                                if ($stat == 0) echo "<span class='right badge badge-danger'>Tidak Aktif</span>";
                                                else if ($stat == 1) echo "<span class='right badge badge-info'>Aktif</span>";
                                                ?>
                                            </td>
                                            <td hidden><?= $p->status_produk; ?></td>
                                            <td>
                                                <button id="btnEdit" title="Edit Data Product" type="button" data-toggle="modal" data-target="#modal-lg" class="btn btn-default btn-xs">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <?php
                                                if ($stat == 1) echo "<button id='btnAktif' type='button' data-toggle='modal' data-target='#modal-status' class='btn btn-warning btn-xs' title='Nonaktifkan Product'><i class='fas fa-times'></i></button>";
                                                else if ($stat == 0) echo "<button id='btnNonaktif' type='button' data-toggle='modal' data-target='#modal-status' class='btn btn-info btn-xs' title='Aktifkan Product'><i class='fas fa-check'></i></button>";
                                                ?>
                                                <button class="btn btn-danger btn-xs" title="Hapus Data Product" type="button" onclick="hapusProduct(<?= $p->id; ?>)">
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
<form method="post" role="form" id="formInput" action="<?php echo site_url('SA_Product/tambahEdit') ?>">
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <label id="headerModal">Masukan Data Product</label>
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
                                    <input id="status_produk" name="status_produk" type="hidden" />
                                    <label>Line</label>
                                    <select name="line" id="line" class="form-control" required>
                                        <option disabled selected>-- Pilih Line --</option>
                                        <?php foreach ($line as $l) : ?>
                                            <option value="<?= $l->line; ?>"><?= $l->line; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label>Product</label>
                                    <input type="text" id="nama_produk" name="nama_produk" class="form-control" required>
                                    <ul class="list-group" id="productList"></ul>
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
<form role="form" action="<?php echo site_url('SA_Product/editStatus') ?>" method="post">
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
        var line = document.getElementById('line');
        var nama_produk = document.getElementById('nama_produk');
        var status_produk = document.getElementById('status_produk');

        var id2 = document.getElementById('txtID2');
        var txtConfirm = document.getElementById('txtConfirm');
        var headerModal = document.getElementById('headerModal');

        var operation = document.getElementById('operation');

        function clear() {
            line.value = "";
            nama_produk.value = "";
        }

        $("#TabelData").on('click', '#btnEdit', function() {
            var currentRow = $(this).closest("tr");
            var colID = currentRow.find("td:eq(1)").text();
            var colLine = currentRow.find("td:eq(2)").text();
            var colNamaproduk = currentRow.find("td:eq(3)").text();
            var colStatusproduk = currentRow.find("td:eq(5)").text();

            headerModal.innerHTML = "Edit Data Product";
            id.value = colID;
            line.value = colLine;
            nama_produk.value = colNamaproduk;
            status_produk.value = colStatusproduk;

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
            headerModal.innerHTML = "Masukkan Data Product";
            id.value = "";
            status_produk.value = "";
            clear();
        });

        $('#btnClear').on("click", function(e) {
            clear();
        });
    });
</script>

<script>
    function hapusProduct(id) {
        Swal.fire({
            title: 'Konfirmasi Hapus Data Product',
            text: 'Apakah Anda Yakin Ingin Menghapus Data Product?',
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
                    url: '<?= site_url('SA_Product/deleteProduct'); ?>',
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

<script>
    $(document).ready(function() {
        $('#nama_produk').keyup(function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>SA_Product/get_product_suggestion",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#productList').fadeIn();
                        $('#productList').html('');
                        data = JSON.parse(data);
                        data.forEach(function(product) {
                            $('#productList').append('<li class="list-group-item">' + product.nama_produk + '</li>');
                        });
                    }
                });
            }
        });
        $(document).on('click', 'li', function() {
            $('#nama_produk').val($(this).text());
            $('#productList').fadeOut();
        });
    });
</script>