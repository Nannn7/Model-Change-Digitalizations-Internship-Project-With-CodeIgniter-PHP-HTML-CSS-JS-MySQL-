<div class="flash-data" data-flashdata="<?= $this->session->flashdata("flash"); ?>"></div>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-11">
                    <!-- <h1>Daily Check</h1> -->
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
                            <h4>Data Daily Check</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('GM_CetakDY'); ?>" method="get">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label>Tanggal Awal</label>
                                            <input type="date" name="start_ukur" id="start_ukur" value="<?= @$_GET['start_ukur']; ?>" class="form-control start_ukur" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label>Tanggal Akhir</label>
                                            <input type="date" name="finish_ukur" id="finish_ukur" value="<?= @$_GET['finish_ukur']; ?>" class="form-control finish_ukur" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label style="color:white">.</label>
                                            <button type="submit" name="filter" value="true" class="btn btn-block btn-info">Tampilkan</button>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="form-group">
                                            <label style="color:white">.</label>
                                            <a href="<?= $url_cetak; ?>" class="btn btn-block btn-warning"><i class="fas fa-file-pdf"></i> PDF
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5"></div>
                                <?php
                                if (isset($_GET['filter']))
                                    echo '<a href="' . base_url('GM_CetakDY') . '" class="btn btn-default mb-3">Reset</a>';
                                ?>
                            </form>
                            <table id="TabelData" class="table table-striped table-hover">
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
                                        <!-- <th>Status</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ($daily as $dy) { ?>
                                        <?php if (!empty($dy->finish_ukur)) { ?>
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
                                                    ?>
                                                </td>
                                                <td><?= $dy->start_ukur; ?></td>
                                                <td><?= $dy->on_ukur; ?></td>
                                                <td><?= $dy->finish_ukur; ?></td>
                                                <td><a href="<?= base_url('assets/uploads/') . $dy->file; ?>" download><?= $dy->file; ?></a></td>
                                                <td><?= $dy->catatan; ?></td>
                                                <!-- <td><?php
                                                            $stat = $dy->status;
                                                            if ($stat == 9) echo "<span class='badge badge-danger'><i class='fas fa-times'></i></span>";
                                                            else if ($stat == 1) echo "<span class='badge badge-success'><i class='icon fas fa-check'></i></span>";
                                                            else if ($stat == 0) echo "<span class='badge badge-warning'><i class='icon fas fa-check'></i></span>";
                                                            ?>
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

<?php $this->load->view('Template/footer'); ?>