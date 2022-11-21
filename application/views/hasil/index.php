<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?= $this->load->view('template/header', '', TRUE) ?>
<?= $this->load->view('template/sidebar', '', TRUE) ?>
<?php

?>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Hasil Penilaian</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Data Hasil Penilaian</h4>

                        <?php if (empty($id_pengguna)) : ?>
                            <?= form_open('hasil', 'method=get') ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-md-12">Nama</label>
                                        <div class="col-md-12">
                                            <select name="id_pengguna" class="form-control form-control-line" required>
                                                <option value="">Pilih...</option>
                                                <?php foreach ($role as $row) : ?>
                                                    <option value="<?= $row->id_pengguna ?>" <?= set_select('id_pengguna', $row->id_pengguna) ?>><?= $row->nama_lengkap ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" name="proses" class="btn btn-success" value="1">Proses</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?= form_close() ?>
                        <?php else : ?>
                            <div class="table-responsive">
                                <h4>Hasil Rekomendasi</h4>
                                <div class="text-right">
                                    <?= anchor('hasil/cetak/' . $id_pengguna, 'Cetak PDF', 'class="btn btn-info" target="_blank"') ?>
                                </div>
                                <br><br>
                                <table class="table table-striped table-bordered mt-2">
                                    <thead>
                                        <h4 class="text-center font-weight-bold"><?= $user->nama_lengkap ?></h4>
                                        <hr>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Program Studi</th>
                                            <!-- <th class="text-center">Fakultas</th> -->
                                            <th class="text-center">Nilai AHP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($hasil as $row) :
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= ++$no ?></td>
                                                <td><?= $row->nama_prodi ?></td>
                                                <!-- <td><?= $row->nama_fakultas ?></td> -->
                                                <td class="text-center font-weight-bold"><?= $row->nilai_hasil ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="card">

                    <!-- Rekomendasi Semua Pendaftar -->
                    <div class="card-block">
                        <h4 class="card-title">Data Hasil Penilaian</h4>
                        <hr>
                        <?php
                        $lim = 0;
                        if (empty($lim)) : ?>
                            <?= form_open('hasil', 'method=get') ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-md-12">Jumlah Prodi Teratas</label>
                                        <div class="col-md-12">
                                            <select name="lim" class="form-control form-control-line" required>
                                                <option value="">Pilih...</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" name="proses" class="btn btn-success" value="1">Proses</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?= form_close() ?>
                            <?php
                            $lim = isset($_GET['lim']) ? $_GET['lim'] : '';
                            // $lim = 3;
                            ?>
                        <?php
                            $lim = isset($_GET['lim']) ? $_GET['lim'] : '';
                        else : ?>
                            <div class="text-right">
                                <?= anchor('hasil/cetak_per_lim/' . $lim, 'Cetak PDF', 'class="btn btn-info" target="_blank"') ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="dataTables1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Program Studi</th>
                                                <!-- <th>Fakultas</th> -->
                                                <th>Nilai AHP</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach ($rek_prod as $row) : ?>
                                                <tr>
                                                    <td><?= ++$no ?></td>
                                                    <td><?= $row->nama ?></td>
                                                    <td><?= $row->nama_prodi ?></td>
                                                    <!-- <td><?= $row->nama_fakultas ?></td> -->
                                                    <td><?= $row->nilai_hasil ?></td>

                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>

                            <?= $this->session->flashdata('success') ?>
                            <?= $this->session->flashdata('failure') ?>
                            <!-- <div class="card-subtitle"><? //= anchor('fakultas/tambah', 'Tambah Data', 'class="btn btn-primary"') 
                                                            ?></div> -->
                            <div class="text-right">
                                <?php
                                $lim = isset($_GET['lim']) ? $_GET['lim'] : '';
                                // $lim = 3;
                                ?>
                                <?= anchor('hasil/cetak_per_lim/' . $lim, 'Cetak PDF', 'class="btn btn-info" target="_blank"');

                                ?>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="dataTables1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Program Studi</th>
                                            <!-- <th>Fakultas</th> -->
                                            <th>Nilai AHP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($rek_prod as $row) : ?>
                                            <tr>
                                                <td><?= ++$no ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td><?= $row->nama_prodi ?></td>
                                                <!-- <td><?= $row->nama_fakultas ?></td> -->
                                                <td><?= $row->nilai_hasil ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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

<?= $this->load->view('template/js', '', TRUE) ?>
<?= $this->load->view('template/footer', '', TRUE) ?>