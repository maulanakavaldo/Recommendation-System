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
                <?= form_open_multipart('prodi/tambah', 'class="form-horizontal form-material"') ?>
                <h4 class="card-title">Tambah Program Studi</h4>
                <?= $this->session->flashdata('success') ?>
                <div class="row">
                    <div class="col-6">
                        <h4>Data Program Studi</h4>

                        <div class="form-group">
                            <label class="col-md-12">Nama Prodi</label>
                            <div class="col-md-12">
                                <input type="text" name="nama_prodi" class="form-control form-control-line" value="<?= set_value('nama_prodi') ?>">
                                <div class="text-danger"><?= form_error('nama_prodi') ?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Fakultas</label>
                            <div class="col-md-12">
                                <select name="id_fakultas" class="form-control form-control-line">
                                    <option value="">Pilih...</option>
                                    <?php foreach ($fakultas as $row) : ?>
                                        <option value="<?= $row->id_fakultas ?>" <?= set_select('id_fakultas', $row->id_fakultas) ?>><?= $row->nama_fakultas ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="text-danger"><?= form_error('id_fakultas') ?></div>
                            </div>
                        </div>


                    </div>
                    <!-- Kriteria Penilaian -->
                    <div class="col-6" float>
                        <h4>Data</h4>
                        <!-- <?php foreach ($kriteria as $row) : ?>
                            <div class="form-group">
                                <label class="col-md-12"><?= $row->nama_kriteria ?></label>
                                <div class="col-md-12">
                                    <input type="text" name="kriteria<?= $row->id_kriteria ?>" class="form-control form-control-line" value="<?= set_value('kriteria' . $row->id_kriteria) ?>" placeholder="1 - 5">
                                    <div class="text-danger"><?= form_error('kriteria' . $row->id_kriteria) ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?> -->

                        <div class="form-group">
                            <label class="col-md-12">Akreditasi</label>
                            <div class="col-md-12">
                                <select name="akreditasi" class="form-control form-control-line">
                                    <option value="">Pilih...</option>
                                    <option value="Unggul">Unggul</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="Belum Akredtasi">Belum Akredtasi</option>
                                </select>
                                <div class="text-danger"><?= form_error('akreditasis') ?></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Prospek Kerja</label>
                            <div class="col-md-12">
                                <select name="prospek_kerja" class="form-control form-control-line">
                                    <option value="">Pilih...</option>
                                    <option value="Sangat Baik">Sangat Baik</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Cukup">Cukup</option>
                                    <option value="Kurang">Kurang</option>
                                    <option value="Buruk">Buruk</option>
                                </select>
                                <div class="text-danger"><?= form_error('prospek_kerja') ?></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Kuota Beasiswa</label>
                            <div class="col-md-12">
                                <input type="text" name="kuota_beasiswa" class="form-control form-control-line" value="<?= set_value('nama_prodi') ?>">
                                <div class="text-danger"><?= form_error('kuota_beasiswa') ?></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Daya Tampung</label>
                            <div class="col-md-12">
                                <input type="text" name="daya_tampung" class="form-control form-control-line" value="<?= set_value('nama_prodi') ?>">
                                <div class="text-danger"><?= form_error('daya_tampung') ?></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Jumlah Peminat</label>
                            <div class="col-md-12">
                                <input type="text" name="jumlah_peminat" class="form-control form-control-line" value="<?= set_value('nama_prodi') ?>">
                                <div class="text-danger"><?= form_error('jumlah_peminat') ?></div>
                            </div>
                        </div>



                    </div>
                </div>

                <br>
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