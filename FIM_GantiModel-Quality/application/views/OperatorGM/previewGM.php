<div class="flash-data" data-flashdata="<?= $this->session->flashdata("flash"); ?>"></div>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-11">
                    <h1>Measurement Preview</h1>
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
                            <div class="card-header-back" title="Kembali Ke Halaman Sebelumnya">
                                <a href="<?= site_url('GM_Preview') ?>" class="btn btn-primary btn-sm"><i class="fas fa-arrow-circle-left"></i></a>
                            </div>
                            <h4>Data Measurement Preview Ganti Model</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('GM_Preview/previewGM'); ?>" method="get">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label>Tanggal Awal</label>
                                            <input type="date" name="start_gm" id="start_gm" value="<?= @$_GET['start_gm']; ?>" class="form-control start_gm" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label>Tanggal Akhir</label>
                                            <input type="date" name="finish_gm" id="finish_gm" value="<?= @$_GET['finish_gm']; ?>" class="form-control finish_gm" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label style="color:white">.</label>
                                            <button type="submit" name="filter" value="true" class="btn btn-block btn-info">Tampilkan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5"></div>
                                <?php
                                if (isset($_GET['filter']))
                                    echo '<a href="' . base_url('GM_Preview/previewGM') . '" class="btn btn-default mb-3">Reset</a>';
                                ?>
                            </form>
                            <table id="TabelData" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th hidden>ID GM</th>
                                        <th>Line</th>
                                        <th>Product</th>
                                        <th>Start Ganti Model</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ($gmdata as $gm) { ?>
                                        <?php if (!empty($gm->finish_gm)) { ?>
                                            <tr>
                                                <td>
                                                    <?php $i++; ?>
                                                    <?php echo $i ?>
                                                </td>
                                                <td hidden><?= $gm->id_gm; ?></td>
                                                <td><?= $gm->line; ?></td>
                                                <td><?= $gm->product; ?></td>
                                                <td><?= $gm->start_gm; ?></td>
                                                <td>
                                                    <button id="btnDetail" title="Preview Ganti Model" type="button" class="btn btn-default btn-small btnDetail" data-id="<?= $gm->id_gm; ?>" data-toggle="modal" data-target="#modal-detail-ongoing">
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
</div>

<!-- Modal Detail GM -->
<form method="post">
    <div class="modal fade" id="modal-detail-ongoing">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div id="modalGM"></div>
                <div class="modal-header">
                    <h4 class="modal-title">
                        <label>Detail Ganti Model</label>
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
                                <!-- <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label hidden>Line</label>
                                            <input type="hidden" name="LineTxt" id="LineTxt" class="form-control" value="<?= $gm->line; ?>" disabled required>
                                        </div>
                                        <div class="col-6">
                                            <label hidden>Product</label>
                                            <input type="hidden" name="ProdukTxt" id="ProdukTxt" class="form-control" value="<?= $gm->product; ?>" disabled required>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-header">
                                    <h3 class="card-title">Data Ganti Model</h3>
                                </div>
                                <div class="card-body">
                                    <table id="TabelDataDetail" class="table table-striped table-hover">
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
                                        <tbody id="tbodyDetail"></tbody>
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

<?php $this->load->view('Template/footer'); ?>

<script>
    $(document).ready(function() {
        var countDetail = 0;

        function showDetailModal(idGM) {
            // $("#modalGM").html("<div class='overlay d-flex justify-content-center align-items-center'>" +
            //     "<i class='fas fa-2x fa-sync fa-spin'></i>" +
            //     "</div>");

            $.ajax({
                type: "POST",
                url: "<?= site_url('GM_Preview/ListGMOnGoing'); ?>",
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
                        $('#tbodyDetail').html(items);
                        if (countDetail == 0) {
                            $("#TabelDataDetail").DataTable({
                                "responsive": true,
                                "autoWidth": false,
                            });
                            countDetail++;
                        }
                        $("#modalGM").html("");
                    } catch (e) {
                        console.error(e);
                    }
                },
                error: function(err) {
                    console.error(err);
                },
            });
        }

        $("#TabelData").on('click', '.btnDetail', function() {
            var currentRow = $(this).closest("tr");
            var colIDGM = currentRow.find("td:eq(1)").text();

            // Tampilkan modal detail dengan data sesuai idGM
            showDetailModal(colIDGM);
        });
    });
</script>