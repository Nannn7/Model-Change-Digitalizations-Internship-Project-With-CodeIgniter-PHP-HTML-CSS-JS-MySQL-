<div class="flash-data" data-flashdata="<?= $this->session->flashdata("flash"); ?>"></div>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-11">
                    <h1>Ganti Model</h1>
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
                            <h4>Data Ganti Model</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('GM_CetakGM'); ?>" method="get">
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
                                    echo '<a href="' . base_url('GM_CetakGM') . '" class="btn btn-default mb-3">Reset</a>';
                                ?>
                            </form>
                            <table id="TabelData" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th hidden>ID GM</th>
                                        <th>Line</th>
                                        <th>Product</th>
                                        <th>Tanggal Mulai GantiModel</th>
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
                                                    <a href="<?= site_url('GM_CetakGM/gantimodel/' . $gm->id_gm); ?>" class="btn btn-warning" title="Cetak Data GM" type="button">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>
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

<?php $this->load->view('Template/footer'); ?>