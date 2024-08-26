<div class="flash-data" data-flashdata="<?= $this->session->flashdata("flash"); ?>"></div>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-11">
                    <!-- <h1>Ganti Model</h1> -->
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
                            <!-- <div class="card-header-back" title="Kembali Ke Halaman Sebelumnya">
                                <a href="<?= site_url('Cetak_GM/supcetakgm') ?>" class="btn btn-primary btn-sm"><i class="fas fa-arrow-circle-left"></i></a>
                            </div> -->
                            <!-- <h4>Data Ganti Model</h4> -->
                            <img class="animation__wobble" src="<?= base_url('assets'); ?>/dist/img/FIM_Logo.png" alt="AdminLTELogo" height="50" width="50"> Ganti Model
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <?php foreach ($gmdata as $gm) : ?>
                                        <address>
                                            <b>Line:</b> <?= $gm->line; ?><br>
                                            <b>Type:</b> <?= $gm->product; ?><br>
                                            <b>Tanggal:</b> <?= $gm->start_gm; ?><br>
                                        </address>
                                    <?php endforeach; ?>
                                </div>
                                <div class="col-2">
                                    <a href="<?= base_url('Cetak_GM/pdf'); ?>" class="btn btn-warning"><i class="fas fa-file-pdf"></i> Export PDF</a>
                                </div>
                            </div>
                            <table id="TabelData" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tipe Ukur</th>
                                        <th>Hasil Ukur</th>
                                        <th>File</th>
                                        <th>Catatan</th>
                                        <th>Start Ukur</th>
                                        <th>Waiting Time</th>
                                        <th>On Ukur</th>
                                        <th>Lama Pengukuran</th>
                                        <th>Finish Ukur</th>
                                        <th>Total Waktu</th>
                                        <!-- <th>Status</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ($measure as $m) : ?>
                                        <tr>
                                            <td>
                                                <?php $i++; ?>
                                                <?php echo $i ?>
                                            </td>
                                            <td><?= $m->ukur; ?></td>
                                            <td><?= $m->status; ?></td>
                                            <td><?= $m->file; ?></td>
                                            <td><?= $m->catatan; ?></td>
                                            <td><?= $m->start_ukur; ?></td>
                                            <td>#</td>
                                            <td><?= $m->on_ukur; ?></td>
                                            <td>#</td>
                                            <td><?= $m->finish_ukur; ?></td>
                                            <td>#</td>
                                            <!-- <td><?= $m->status; ?></td> -->
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- <?php $this->load->view('Template/footer'); ?> -->