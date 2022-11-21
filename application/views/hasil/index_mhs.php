<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?= $this->load->view('template/header', '', TRUE) ?>
<?= $this->load->view('template/sidebar', '', TRUE) ?>

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

                        <div class="row">
                            <div class="col-md-6">

                                <!-- <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="dataTables1">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Kode Kriteria</th>
                                                <th>Nama Kriteria</th>
                                                <th>Nilai Prioritas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($kriteria as $row) : ?>
                                                <tr>
                                                    <td class="text-center"><?= $row->kode_kriteria ?></td>
                                                    <td><?= $row->nama_kriteria ?></td>
                                                    <td class="text-right"><?= $row->krit_prioritas ?></td>

                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="dataTables1">
                                        <thead>
                                            <tr>
                                                <th>Alternatif</th>
                                                <th>Nama Prodi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach ($prodi as $row) : ?>
                                                <tr>
                                                    <td class="text-center">A <?= ++$no  ?></td>
                                                    <td><?= $row->nama_prodi ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div> -->
                            </div>
                        </div>

                        <!-- ///////////////////////// -->
                        <hr>
                        <div class="table-responsive">
                            <h4>Hasil Prioritas</h4>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>

                                        <th class="text-center">Nama Prodi - Universitas</th>

                                        <!-- Kode Kriteria -->
                                        <?php foreach ($kriteria as $row) : ?>
                                            <th class="text-center"><?= $row->kode_kriteria ?></th>
                                        <?php endforeach; ?>
                                        <!-- End Kode Kriteria -->

                                        <!-- Total Nilai -->
                                        <th class="text-center">Nilai AHP</th>
                                        <!-- End Total Nilai -->



                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Prioritas Kriteria -->
                                    <!-- <th></th>
                                    <th></th>
                                    <?php foreach ($kriteria as $row) : ?>
                                        <th class="text-center"><?= $row->krit_prioritas ?></th>
                                    <?php endforeach; ?> -->
                                    <!-- End Prioritas Kriteria -->
                                    <?php
                                    $no = 0;
                                    foreach ($alternatif as $row_alternatif) :
                                        $total = 0;
                                    ?>

                                        <tr>
                                            <td><?= ++$no ?></td>


                                            <!-- Nama Prodi -->
                                            <td><?= $row_alternatif->nama_prodi ?></td>


                                            <!-- Kode Kriteria -->

                                            <?php foreach ($kriteria as $row_kriteria) :
                                                $total += $nilai_prioritas[$row_alternatif->id_prodi][$row_kriteria->id_kriteria];
                                            ?>
                                                <td class="text-center"><?= $nilai_prioritas[$row_alternatif->id_prodi][$row_kriteria->id_kriteria] ?></td>
                                                <!-- <td class="text-center"><?= $row_alternatif->alt_prioritas[$row_alternatif->id_prodi][$row_kriteria->id_kriteria] ?></td> -->

                                            <?php endforeach; ?>

                                            <!-- End Kode Kriteria -->

                                            <!-- /////////////////// -->

                                            <!-- <td><? //= $row_alternatif->total 
                                                        ?></td> -->


                                            <!-- <td><? //= $row_alternatif->alt_prioritas * $row_alternatif->krit_prioritas
                                                        ?></td> -->
                                            <td class="text-center font-weight-bold"><?= $total ?></td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- ///////////////////////// -->

                        <hr>
                        <div class="table-responsive">
                            <h4>Hasil Rekomendasi</h4>
                            <div class="text-right">
                                <?= anchor('hasil/cetak/' . $id_pengguna, 'Cetak PDF', 'class="btn btn-info" target="_blank"') ?>
                            </div>
                            <table class="table table-striped table-bordered mt-2">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Prodi - Universitas</th>
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
                                            <td><?= $row['nama_prodi'] ?></td>
                                            <td class="text-center font-weight-bold"><?= $row['nilai_hasil'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <h4>Kesimpulan</h4>
                        <p>Berdasarkan hasil penilaian, maka <strong><?= $hasil[0]['nama_prodi'] ?></strong> direkomendasikan sebagai Program Studi - Universitas pilihan pertama.</p>

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