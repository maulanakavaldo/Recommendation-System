<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?= $this->load->view('template/header', '', TRUE) ?>
<?= $this->load->view('template/sidebar', '', TRUE) ?>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Program Studi</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Detail Program Studi</h4>
                        <div class="card-subtitle">
                            <?= anchor('prodi', 'Kembali', 'class="btn btn-secondary"') ?>
                        </div>
                        <h4>Data Program Studi</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">

                                <tr>
                                    <td width="30%">Nama</td>
                                    <td><?= $prodi->nama_prodi ?></td>
                                </tr>
                                <tr>
                                    <td width="30%">Fakultas</td>
                                    <td><?= $prodi->nama_fakultas ?></td>
                                </tr>

                            </table>
                        </div>
                        <h4>Data</h4>

                        <table class="table table-bordered">

                            <tr>
                                <td width="30%">Akreditasi</td>
                                <td><?= $prodi->akreditasi ?></td>
                            </tr>
                            <tr>
                                <td width="30%">Prospek Kerja</td>
                                <td><?= $prodi->prospek_kerja ?></td>
                            </tr>
                            <tr>
                                <td width="30%">Kuota Beasiswa</td>
                                <td><?= $prodi->kuota_beasiswa ?></td>
                            </tr>
                            <tr>
                                <td width="30%">Daya Tampung</td>
                                <td><?= $prodi->daya_tampung ?></td>
                            </tr>
                            <tr>
                                <td width="30%">Jumlah Peminat</td>
                                <td><?= $prodi->jumlah_peminat ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?= $this->load->view('template/copyright', '', TRUE) ?>
</div>
</div>

<?= $this->load->view('template/js', '', TRUE) ?>
<?= $this->load->view('template/footer', '', TRUE) ?>