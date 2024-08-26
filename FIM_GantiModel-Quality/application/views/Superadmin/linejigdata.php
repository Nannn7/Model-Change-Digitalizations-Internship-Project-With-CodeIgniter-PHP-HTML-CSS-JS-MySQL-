<div class="flash-data" data-flashdata="<?= $this->session->flashdata("flash"); ?>"></div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Data Lokasi Jig Di Line</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Data Jig</h3>
                        </div>
                        <div class="card-body">
                            <table id="TabelData" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Lokasi Jig</th>
                                        <th>Mesin</th>
                                        <th>Code Jig</th>
                                        <th>Nama Jig</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ($jigline as $jl) { ?>
                                        <tr>
                                            <td>
                                                <?php $i++; ?>
                                                <?php echo $i ?>
                                            </td>
                                            <td><?= $jl->Lokasi; ?></td>
                                            <td><?= $jl->Mesin; ?></td>
                                            <td><?= $jl->CodeJig; ?></td>
                                            <td><?= $jl->DetailJig; ?></td>
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
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('Template/footer'); ?>