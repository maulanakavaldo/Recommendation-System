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

        <div class="card">
            <div class="card-block">
                <?= form_open_multipart('prodi/ubah/' . $prodi->id_prodi, 'class="form-horizontal form-material"') ?>
                <h4 class="card-title">Ubah Program Studi</h4>
                <?= $this->session->flashdata('success') ?>
                <div class="row">
                    <div class="col-6">
                        <h4>Data Program Studi</h4>

                        <div class="form-group">
                            <label class="col-md-12">Program Studi</label>
                            <div class="col-md-12">
                                <input type="text" name="nama_prodi" class="form-control form-control-line" value="<?= set_value('nama_prodi', $prodi->nama_prodi) ?>">
                                <div class="text-danger"><?= form_error('nama_prodi') ?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Fakultas</label>
                            <div class="col-md-12">
                                <select name="id_fakultas" class="form-control form-control-line">
                                    <option value="">Pilih...</option>
                                    <?php foreach ($fakultas as $row) : ?>
                                        <option value="<?= $row->id_fakultas ?>" <?= set_select('id_fakultas', $row->id_fakultas, $prodi->id_fakultas == $row->id_fakultas ? TRUE : FALSE) ?>><?= $row->nama_fakultas ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="text-danger"><?= form_error('id_fakultas') ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <h4>Data</h4>
                        <div class="form-group">
                            <label class="col-md-12">Akreditasi</label>
                            <div class="col-md-12">
                                <select name="akreditasi" class="form-control form-control-line">

                                    <?php
                                    if ($prodi->akreditasi == 'Unggul') {
                                        echo '<option value="Unggul" selected="selected">Unggul</option>';
                                        echo '<option value="A">A</option>';
                                        echo '<option value="B">B</option>';
                                        echo '<option value="C">C</option>';
                                        echo '<option value="Belum Akreditasi">Belum Akreditasi</option>';
                                    } else if ($prodi->akreditasi == 'A') {
                                        echo '<option value="Unggul">Unggul</option>';
                                        echo '<option value="A" selected="selected">A</option>';
                                        echo '<option value="B">B</option>';
                                        echo '<option value="C">C</option>';
                                        echo '<option value="Belum Akreditasi">Belum Akreditasi</option>';
                                    } else if ($prodi->akreditasi == 'B') {
                                        echo '<option value="Unggul">Unggul</option>';
                                        echo '<option value="A">A</option>';
                                        echo '<option value="B" selected="selected">C</option>';
                                        echo '<option value="C">B</option>';
                                        echo '<option value="Belum Akreditasi">Belum Akreditasi</option>';
                                    } else if ($prodi->akreditasi == 'C') {
                                        echo '<option value="Unggul">Unggul</option>';
                                        echo '<option value="A">A</option>';
                                        echo '<option value="B">B</option>';
                                        echo '<option value="C" selected="selected">C</option>';
                                        echo '<option value="Belum Akreditasi">Belum Akreditasi</option>';
                                    } else {
                                        echo '<option value="Unggul">Unggul</option>';
                                        echo '<option value="A">A</option>';
                                        echo '<option value="B">B</option>';
                                        echo '<option value="C">C</option>';
                                        echo '<option value="Belum Akreditasi" selected="selected">Belum Akreditasi</option>';
                                    }
                                    ?>

                                </select>
                                <div class="text-danger"><?= form_error('akreditasis') ?></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Prospek Kerja</label>
                            <div class="col-md-12">
                                <select name="prospek_kerja" class="form-control form-control-line">

                                    <?php
                                    if ($prodi->prospek_kerja == 'Sangat Baik') {
                                        echo '<option value="Sangat Baik" selected="selected">Sangat Baik</option>';
                                        echo '<option value="Baik">Baik</option>';
                                        echo '<option value="Cukup">Cukup</option>';
                                        echo '<option value="Kurang">Kurang</option>';
                                        echo '<option value="Buruk">Buruk</option>';
                                    } else if ($prodi->prospek_kerja == 'Baik') {
                                        echo '<option value="Sangat Baik">Sangat Baik</option>';
                                        echo '<option value="Baik" selected="selected">Baik</option>';
                                        echo '<option value="Cukup">Cukup</option>';
                                        echo '<option value="Kurang">Kurang</option>';
                                        echo '<option value="Buruk">Buruk</option>';
                                    } else if ($prodi->prospek_kerja == 'Cukup') {
                                        echo '<option value="Sangat Baik">Sangat Baik</option>';
                                        echo '<option value="Baik">Baik</option>';
                                        echo '<option value="Cukup" selected="selected">Cukup</option>';
                                        echo '<option value="Kurang">Kurang</option>';
                                        echo '<option value="Buruk">Buruk</option>';
                                    } else if ($prodi->prospek_kerja == 'Kurang') {
                                        echo '<option value="Sangat Baik">Sangat Baik</option>';
                                        echo '<option value="Baik">Baik</option>';
                                        echo '<option value="Cukup">Cukup</option>';
                                        echo '<option value="Kurang" selected="selected">Kurang</option>';
                                        echo '<option value="Buruk">Buruk</option>';
                                    } else {
                                        echo '<option value="Sangat Baik">Sangat Baik</option>';
                                        echo '<option value="Baik">Baik</option>';
                                        echo '<option value="Cukup">Cukup</option>';
                                        echo '<option value="Kurang">Kurang</option>';
                                        echo '<option value="Buruk" selected="selected">Buruk</option>';
                                    }
                                    ?></select>
                                <div class="text-danger"><?= form_error('prospek_kerja') ?></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Kuota Beasiswa</label>
                            <div class="col-md-12">
                                <input type="text" name="kuota_beasiswa" class="form-control form-control-line" value="<?= set_value('kuota_beasiswa', $prodi->kuota_beasiswa) ?>">
                                <div class="text-danger"><?= form_error('kuota_beasiswa') ?></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Daya Tampung</label>
                            <div class="col-md-12">
                                <input type="text" name="daya_tampung" class="form-control form-control-line" value="<?= set_value('daya_tampung', $prodi->daya_tampung) ?>">
                                <div class="text-danger"><?= form_error('daya_tampung') ?></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Jumlah Peminat</label>
                            <div class="col-md-12">
                                <input type="text" name="jumlah_peminat" class="form-control form-control-line" value="<?= set_value('jumlah_peminat', $prodi->jumlah_peminat) ?>">
                                <div class="text-danger"><?= form_error('jumlah_peminat') ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" name="save" class="btn btn-success">Simpan</button>
                                <?= anchor('prodi', 'Kembali', 'class="btn btn-secondary"') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>

    </div>
    <?= $this->load->view('template/copyright', '', TRUE) ?>
</div>
</div>

<?= $this->load->view('template/js', '', TRUE) ?>
<?= $this->load->view('template/footer', '', TRUE) ?>