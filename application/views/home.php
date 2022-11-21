<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?= $this->load->view('template/header', '', TRUE) ?>
<?= $this->load->view('template/sidebar', '', TRUE) ?>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Home</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-block text-center mb-4" style=" font-size: 25px">
                        Selamat Datang di Sistem Rekomendasi Penentuan Program Studi <br> Menggunakan Metode Analytical Hierarchy Process (AHP)
                    </div>
                    <br><br><br>
                    <div class="card-block text-center mb-4" style="font-size: 20px">
                        Petunjuk Penggunaan: </div>
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-3 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <ul>
                                                <li>Menentukan perbandingan kriteria pada tab <a href="http://localhost/ahp_prodi/kriteria/prioritas">Perbandingan Kriteria</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <ul>
                                                <li>Menentukan perbandingan alternatif terhadap masing-masing kriteria pada tab <a href="http://localhost/ahp_prodi/alternatif/prioritas">Perbandingan Alternatif</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <ul>
                                                <li>Melakukan perhitungan dengan metode AHP pada tab <a href="http://localhost/ahp_prodi/hasil">Hasil Penilaian</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-bg font-weight-bold text-primary text-uppercase mb-1">
                                    Fakultas Pertanian (Faperta)
                                </div><br>
                                <?php foreach ($faperta as $row) : ?>
                                    <div class="text-lg mb-0 font-weight-bold text-gray-800">
                                        <a href="#">
                                            <h6>
                                                <li><?= $row->nama_prodi ?></li>
                                            </h6>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-bg font-weight-bold text-primary text-uppercase mb-1">
                                    Fakultas Perikanan (FPIK)
                                </div><br>

                                <?php foreach ($fpik as $row) : ?>
                                    <div class="text-lg mb-0 font-weight-bold text-gray-800">
                                        <a href="#">
                                            <h6>
                                                <li><?= $row->nama_prodi ?></li>
                                            </h6>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-bg font-weight-bold text-primary text-uppercase mb-1">
                                    Fakultas Kehutanan dan Lingkungan
                                </div><br>
                                <?php foreach ($fkl as $row) : ?>
                                    <div class="text-lg mb-0 font-weight-bold text-gray-800">
                                        <a href="#">
                                            <h6>
                                                <li><?= $row->nama_prodi ?></li>
                                            </h6>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-bg font-weight-bold text-primary text-uppercase mb-1">
                                    Fakultas Teknologi Pertanian (Fateta)
                                </div><br>

                                <?php foreach ($fateta as $row) : ?>
                                    <div class="text-lg mb-0 font-weight-bold text-gray-800">
                                        <a href="#">
                                            <h6>
                                                <li><?= $row->nama_prodi ?></li>
                                            </h6>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-bg font-weight-bold text-primary text-uppercase mb-1">
                                    Fakultas Matematika dan Ilmu Pengetahuan Alam (FMIPA)
                                </div><br>

                                <?php foreach ($faperta as $row) : ?>
                                    <div class="text-lg mb-0 font-weight-bold text-gray-800">
                                        <a href="#">
                                            <h6>
                                                <li><?= $row->nama_prodi ?></li>
                                            </h6>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-bg font-weight-bold text-primary text-uppercase mb-1">
                                    Fakultas Ekonomi dan Manajemen (FEM)
                                </div><br>

                                <?php foreach ($fem as $row) : ?>
                                    <div class="text-lg mb-0 font-weight-bold text-gray-800">
                                        <a href="#">
                                            <h6>
                                                <li><?= $row->nama_prodi ?></li>
                                            </h6>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-bg font-weight-bold text-primary text-uppercase mb-1">
                                    Fakultas Ekologi Manusia (Fema)
                                </div><br>

                                <?php foreach ($fema as $row) : ?>
                                    <div class="text-lg mb-0 font-weight-bold text-gray-800">
                                        <a href="#">
                                            <h6>
                                                <li><?= $row->nama_prodi ?></li>
                                            </h6>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-bg font-weight-bold text-primary text-uppercase mb-1">
                                    Fakultas Kedokteran Hewan
                                </div><br>

                                <?php foreach ($fkh as $row) : ?>
                                    <div class="text-lg mb-0 font-weight-bold text-gray-800">
                                        <a href="#">
                                            <h6>
                                                <li><?= $row->nama_prodi ?></li>
                                            </h6>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-bg font-weight-bold text-primary text-uppercase mb-1">
                                    Sekolah Bisnis (SB) </div><br>

                                <?php foreach ($sb as $row) : ?>
                                    <div class="text-lg mb-0 font-weight-bold text-gray-800">
                                        <a href="#">
                                            <h6>
                                                <li><?= $row->nama_prodi ?></li>
                                            </h6>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->load->view('template/copyright', '', TRUE) ?>
</div>
</div>

<div class=" text-center mb-4">

    <!-- <br><a href='<?php //echo base_url() 
                        ?>'><img src="<?php //echo base_url() . 'public/assets/images/' 
                                        ?>" width="600px"></a></br> -->
</div>
<div class="text-center mb-4">
    <span style="font-size: 2rem">
        <!-- <b>
                                <i class="mdi mdi-account-box light-logo"></i>
                            </b> -->
        <!-- <span class="light-logo"><strong>SRP</strong> PROGRAM STUDI - AHP</span> -->
    </span>

</div>
<!-- <center><strong><?= $this->session->userdata('id_pengguna') ?></strong></center>
                    <center><strong><?= $this->session->userdata('nama_lengkap') ?></strong></center> -->

<?= $this->load->view('template/js', '', TRUE) ?>
<?= $this->load->view('template/footer', '', TRUE) ?>