<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?= $this->load->view('template/header', '', TRUE) ?>
<?= $this->load->view('template/sidebar', '', TRUE) ?>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Fakultas</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Ubah Fakultas</h4>
                        <?= form_open('fakultas/ubah/' . $fakultas->id_fakultas, 'class="form-horizontal form-material"') ?>
                        <?= $this->session->flashdata('success') ?>
                        <div class="form-group">
                            <label class="col-md-12">Fakultas</label>
                            <div class="col-md-12">
                                <input type="text" name="nama_fakultas" class="form-control form-control-line" value="<?= set_value('nama_fakultas', $fakultas->nama_fakultas) ?>">
                            </div>
                            <div class="text-danger"><?= form_error('nama_fakultas') ?></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" name="save" class="btn btn-success">Simpan</button>
                                <?= anchor('fakultas', 'Kembali', 'class="btn btn-secondary"') ?>
                            </div>
                        </div>
                        <?= form_close(); ?>
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