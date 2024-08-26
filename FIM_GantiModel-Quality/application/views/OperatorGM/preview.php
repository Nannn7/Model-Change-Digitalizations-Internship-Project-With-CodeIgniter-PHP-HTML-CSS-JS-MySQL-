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
                            <h3 class="card-title">Data Measurement Preview</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-6">
                                    <div class="small-box bg-primary">
                                        <div class="inner">
                                            <h2><?= $totalGM; ?></h2>
                                            <h4>Ganti Model</h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-tachometer-alt nav-icon"></i>
                                        </div>
                                        <a href="<?= site_url('GM_Preview/previewGM'); ?>" class="small-box-footer">
                                            Lihat Data <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h2><?= $totalDY; ?></h2>
                                            <h4>Daily Check</h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-clipboard nav-icon"></i>
                                        </div>
                                        <a href="<?= site_url('GM_Preview/previewDY'); ?>" class="small-box-footer">
                                            Lihat Data <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('Template/footer'); ?>