<div class="flash-data" data-flashdata="<?= $this->session->flashdata("flash"); ?>"></div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark" id="headerSA">Data Jig Di GantiModel</h1>
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
                                        <th>Code Jig</th>
                                        <th>Nama Jig</th>
                                        <th>Lokasi Jig</th>
                                        <th>Status Jig</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ($jiggm as $jgm) { ?>
                                        <tr>
                                            <td>
                                                <?php $i++; ?>
                                                <?php echo $i ?>
                                            </td>
                                            <td><?= $jgm->CodeJig; ?></td>
                                            <td><?= $jgm->DetailJig; ?></td>
                                            <td><?= $jgm->Lokasi; ?></td>
                                            <td>
                                                <?php
                                                $stat = $jgm->Status;
                                                if ($stat == 0) echo "<span class='right badge badge-danger'>Disposal</span>";
                                                else if ($stat == 1) echo "<span class='right badge badge-info'>Aktif</span>";
                                                ?>
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
    <!-- /.content -->
</div>

<?php $this->load->view('Template/footer'); ?>