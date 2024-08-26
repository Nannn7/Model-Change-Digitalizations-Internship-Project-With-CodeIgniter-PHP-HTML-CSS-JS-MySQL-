<div class="flash-data" data-flashdata="<?= $this->session->flashdata("flash"); ?>"></div>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Incoming Check Jig</h1>
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
                            <h2 class="card-title">Input Data Jig Baru</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            $success_message = $this->session->flashdata('success_message');
                            $error_message = $this->session->flashdata('error_message');
                            if ($success_message) {
                                echo "<script>swal('Sukses', '$success_message', 'success');</script>";
                            } elseif ($error_message) {
                                echo "<script>swal('Gagal', '$error_message', 'error');</script>";
                            }
                            ?>
                            <?php
                            // Tampilkan pesan kesalahan jika ada
                            if ($this->session->flashdata('error_message')) {
                                echo '<div class="alert alert-danger">' . $this->session->flashdata('error_message') . '</div>';
                            }

                            // Tampilkan pesan sukses jika ada
                            if ($this->session->flashdata('success_message')) {
                                echo '<div class="alert alert-success">' . $this->session->flashdata('success_message') . '</div>';
                            }
                            ?>
                            <form action="<?= base_url('DataBaruJig/inputdata'); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="CodeJig">Kode Jig</label>
                                    <input type="text" name="CodeJig" id="CodeJig" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="DetailJig">Detail Jig</label>
                                    <textarea class="form-control" name="DetailJig" id="DetailJig" cols="30" rows="2" placeholder="Silahkan Masukan Detail Data Jig" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="Mesin">Pilih Mesin</label>
                                    <select name="Mesin" id="Mesin" class="form-control" required>
                                        <option disabled selected>-- Pilih Mesin --</option>
                                        <?php foreach ($mesin as $m) : ?>
                                            <option value="<?= $m->id; ?>"><?= $m->namaMesin; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Lokasi">Pilih Lokasi</label>
                                    <select name="Lokasi" id="Lokasi" class="form-control" required>
                                        <option>GM</option>
                                        <?php foreach ($line as $l) : ?>
                                            <option value="<?= $l->nama_line; ?>"><?= $l->nama_line; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="GambarJig">Input Gambar</label>
                                    <input type="file" class="form-control-file" id="GambarJig" name="GambarJig" accept=".jpg, .png, .jpeg" onchange="previewImage(event)" required>
                                </div>
                                <div class="form-group" id="previewContainer" style="display: none;">
                                    <label for="preview">Preview Gambar</label>
                                    <img id="preview" src="#" alt="Preview" style="max-width: 100%; max-height: 100%;">
                                </div>
                                <div id="ukuranContainer" class="row">
                                    <div class="col-md-2">
                                        <div class="ukuran-input">
                                            <label for="A">A</label>
                                            <input type="text" name="A" id="A" class="form-control ukuran" required>
                                        </div>
                                    </div>
                                </div>
                                <div id="diameterContainer" class="row">
                                    <div class="col-md-2 mt-3">
                                        <div class="diameter-input">
                                            <label for="D1">D1</label>
                                            <input type="text" name="D1" id="D1" class="form-control ukuran" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="Status" id="Status" class="form-control">
                                </div>
                                <div class="form-group" style="margin-top: 10px;">
                                    <button type="button" class="btn btn-default tambah-ukuran" style="float: left;">Tambah Ukuran</button>
                                    <button type="button" class="btn btn-default tambah-diameter" style="float: left; margin-left: 5px;">Tambah Diameter</button>
                                    <button type="submit" class="btn btn-primary post-jig" style="float: right;">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>


<?php $this->load->view('Template/footer'); ?>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview');
        const previewContainer = document.getElementById('previewContainer');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.style.display = 'block'; // Menampilkan kontainer preview
            }

            reader.readAsDataURL(input.files[0]); // Membaca file gambar sebagai URL data
        }
    }
</script>
<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const tambahUkuranBtn = document.querySelector('.tambah-ukuran');
        const ukuranContainer = document.getElementById('ukuranContainer');
        const ukuranOptions = ['B', 'C', 'D', 'E', 'F'];

        tambahUkuranBtn.addEventListener('click', function() {
            const newUkuran = ukuranOptions.shift(); // Ambil ukuran berikutnya dari array
            if (!newUkuran) return; // Jika sudah mencapai Z, berhenti

            const divUkuranInput = document.createElement('div');
            divUkuranInput.className = 'col-md-3';

            const divUkuranInputGroup = document.createElement('div');
            divUkuranInputGroup.className = 'ukuran-input';

            const labelUkuran = document.createElement('label');
            labelUkuran.textContent = newUkuran;

            const inputUkuran = document.createElement('input');
            inputUkuran.type = 'text';
            inputUkuran.name = 'ukuran[]';
            inputUkuran.className = 'form-control ukuran';

            divUkuranInputGroup.appendChild(labelUkuran);
            divUkuranInputGroup.appendChild(inputUkuran);

            divUkuranInput.appendChild(divUkuranInputGroup);

            ukuranContainer.appendChild(divUkuranInput);
        });
    });
</script> -->
<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const tambahUkuranBtn = document.querySelector('.tambah-ukuran');
        const ukuranContainer = document.getElementById('ukuranContainer');
        const ukuranOptions = ['B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];

        tambahUkuranBtn.addEventListener('click', function() {
            const newUkuran = ukuranOptions.shift(); // Ambil ukuran berikutnya dari array
            if (!newUkuran) return; // Jika sudah mencapai Z, berhenti

            const divUkuranInput = document.createElement('div');
            divUkuranInput.className = 'col-md-3';

            const divUkuranInputGroup = document.createElement('div');
            divUkuranInputGroup.className = 'ukuran-input';

            const labelUkuran = document.createElement('label');
            labelUkuran.textContent = newUkuran;

            const inputUkuran = document.createElement('input');
            inputUkuran.type = 'text';
            inputUkuran.name = 'ukuran[' + newUkuran + ']'; // Beri nama spesifik
            inputUkuran.id = 'ukuran' + newUkuran; // Beri id spesifik
            inputUkuran.className = 'form-control ukuran';

            divUkuranInputGroup.appendChild(labelUkuran);
            divUkuranInputGroup.appendChild(inputUkuran);

            divUkuranInput.appendChild(divUkuranInputGroup);

            ukuranContainer.appendChild(divUkuranInput);
        });
    });
</script> -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tambahUkuranBtn = document.querySelector('.tambah-ukuran');
        const ukuranContainer = document.getElementById('ukuranContainer');
        let ukuranOptions = ['B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];

        tambahUkuranBtn.addEventListener('click', function() {
            const newUkuran = ukuranOptions.shift(); // Ambil ukuran berikutnya dari array
            if (!newUkuran) return; // Jika sudah mencapai Z, berhenti

            const divUkuranInput = document.createElement('div');
            divUkuranInput.className = 'col-md-2';

            const divUkuranInputGroup = document.createElement('div');
            divUkuranInputGroup.className = 'ukuran-input';

            const labelUkuran = document.createElement('label');
            labelUkuran.textContent = newUkuran;

            const inputUkuran = document.createElement('input');
            inputUkuran.type = 'text';
            inputUkuran.name = newUkuran; // Beri nama spesifik
            inputUkuran.id = newUkuran; // Beri id spesifik
            inputUkuran.className = 'form-control ukuran';

            divUkuranInputGroup.appendChild(labelUkuran);
            divUkuranInputGroup.appendChild(inputUkuran);

            divUkuranInput.appendChild(divUkuranInputGroup);

            ukuranContainer.appendChild(divUkuranInput);
        });

        // Fungsi untuk mengisi kembali opsi ukuran jika ada ukuran yang dihapus
        function refillUkuranOptions() {
            const existingUkurans = document.querySelectorAll('.ukuran-input label');
            const existingLabels = Array.from(existingUkurans).map(label => label.textContent);
            ukuranOptions = ['B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'].filter(ukuran => !existingLabels.includes(ukuran));
        }

        // Jika ada ukuran yang dihapus, perbaharui kembali opsi ukuran
        ukuranContainer.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-ukuran')) {
                event.preventDefault();
                event.target.parentElement.parentElement.parentElement.remove();
                refillUkuranOptions();
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tambahDiameterBtn = document.querySelector('.tambah-diameter');
        const diameterContainer = document.getElementById('diameterContainer');
        let diameterOptions = ['D2', 'D3', 'D4', 'D5', 'D6', 'D7', 'D8'];

        tambahDiameterBtn.addEventListener('click', function() {
            const newDiameter = diameterOptions.shift(); // Ambil ukuran berikutnya dari array
            if (!newDiameter) return; // Jika sudah mencapai Z, berhenti

            const divDiameterInput = document.createElement('div');
            divDiameterInput.className = 'col-md-2 mt-3';

            const divDiameterInputGroup = document.createElement('div');
            divDiameterInputGroup.className = 'diameter-input';

            const labelDiameter = document.createElement('label');
            labelDiameter.textContent = newDiameter;

            const inputDiameter = document.createElement('input');
            inputDiameter.type = 'text';
            inputDiameter.name = newDiameter; // Beri nama spesifik
            inputDiameter.id = newDiameter; // Beri id spesifik
            inputDiameter.className = 'form-control diameter';

            divDiameterInputGroup.appendChild(labelDiameter);
            divDiameterInputGroup.appendChild(inputDiameter);

            divDiameterInput.appendChild(divDiameterInputGroup);

            diameterContainer.appendChild(divDiameterInput);
        });

        // Fungsi untuk mengisi kembali opsi ukuran jika ada ukuran yang dihapus
        function refillDiameterOptions() {
            const existingDiameters = document.querySelectorAll('.diameter-input label');
            const existingLabels = Array.from(existingDiameters).map(label => label.textContent);
            diameterOptions = ['D2', 'D3', 'D4', 'D5', 'D6', 'D7', 'D8'].filter(diameter => !existingLabels.includes(diameter));
        }

        // Jika ada ukuran yang dihapus, perbaharui kembali opsi ukuran
        diameterContainer.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-diameter')) {
                event.preventDefault();
                event.target.parentElement.parentElement.parentElement.remove();
                refillDiameterOptions();
            }
        });
    });
</script>
<script>
    // Fungsi untuk menyembunyikan pesan alert setelah beberapa detik
    setTimeout(function() {
        $(".alert").fadeOut("slow");
    }, 5000); // Waktu dalam milidetik (5000 = 5 detik)
</script>