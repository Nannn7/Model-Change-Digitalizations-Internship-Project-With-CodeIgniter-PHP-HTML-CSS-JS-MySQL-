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
                            <h3 class="card-title">Data Measurement On Going Ganti Model</h3>
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
                                                    <button id="btnDetail" title="Detail Data Measure On Going" type="button" class="btn btn-default btn-small btnDetail" data-id="<?= $gm->id_gm; ?>" data-toggle="modal" data-target="#modal-detail-ongoing">
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
                                        <th>Start Ukur</th>
                                        <th>On Ukur</th>
                                        <th>Finish Ukur</th>
                                        <th>File</th>
                                        <th>Catatan</th>
                                        <th>Status</th>
                                        <!-- <th>Aksi</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ($dyongo as $dy) { ?>
                                        <?php if (empty($dy->finish_ukur)) { ?>
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
                                                    else if ($stat == 1) echo "<span class='badge badge-success'>GD</span>";
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
                                                    <button id="btnDaily" title="Detail Data Measure On Going" type="button" class="btn btn-default btn-small btnDaily" data-id="<?= $dy->id; ?>/<?= $dy->line . '/' . $dy->product; ?>" data-toggle="modal" data-target="#modal-daily-ongoing">
                                                        <i class="fas fa-list-ul"></i>
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

<!-- Modal Detail DY -->
<!-- <form method="post">
    <div class="modal fade" id="modal-daily-ongoing">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div id="modalDY"></div>
                <div class="modal-header">
                    <h4 class="modal-title">
                        <label>Detail Daily Check</label>
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
                                    <label hidden>ID</label>
                                    <input type="hidden" name="id" id="id" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <?php foreach ($dyongo as $dy) : ?>
                                            <div class="col-6">
                                                <label>Line</label>
                                                <input type="text" name="line" id="line" class="form-control" value="<?= $dy->line; ?>" disabled required>
                                            </div>
                                            <div class="col-6">
                                                <label>Product</label>
                                                <input type="text" name="product" id="product" class="form-control" value="<?= $dy->product; ?>" disabled required>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-header">
                                    <h3 class="card-title">Data Daily Check</h3>
                                </div>
                                <div class="card-body">
                                    <table id="TabelDataDetail" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tipe Ukur</th>
                                                <th>Hasil Ukur</th>
                                                <th>Start Ukur</th>
                                                <th>On Ukur</th>
                                                <th>Finish Ukur</th>
                                                <th>File</th>
                                                <th>Catatan</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyDaily"></tbody>
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
                url: "<?= site_url('SA_Ongoing/ListGMOnGoing'); ?>",
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

<!-- <script>
    $(document).ready(function() {
        var countDetail = 0;

        function showDailyModal(id) {
            $("#modalDY").html("<div class='overlay d-flex justify-content-center align-items-center'>" +
                "<i class='fas fa-2x fa-sync fa-spin'></i>" +
                "</div>");

            $.ajax({
                type: "POST",
                url: "<?= site_url('SA_Ongoing/ListDYOnGoing'); ?>",
                data: {
                    id: id
                },
                success: function(data) {
                    try {
                        var items = [];
                        var i = 1;
                        $.each(JSON.parse(data), function(key, val) {
                            var tr = "<tr>";
                            tr += "<td>" + i + "</td>";
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
                        $('#tbodyDaily').html(items);
                        if (countDetail == 0) {
                            $("#TabelDailyDetail").DataTable({
                                "responsive": true,
                                "autoWidth": false,
                            });
                            countDetail++;
                        }
                        $("#modalDY").html("");
                    } catch (e) {
                        console.error(e);
                    }
                },
                error: function(err) {
                    console.error(err);
                },
            });
        }

        $("#TabelData2").on('click', '.btnDetail', function() {
            var currentRow = $(this).closest("tr");
            var colID = currentRow.find("td:eq(1)").text();

            // Tampilkan modal detail dengan data sesuai idGM
            showDailyModal(colID);
        });
    });
</script> -->