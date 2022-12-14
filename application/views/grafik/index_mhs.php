<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?= $this->load->view('template/header', '', TRUE) ?>
<?= $this->load->view('template/sidebar', '', TRUE) ?>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Grafik</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Grafik Hasil Penilaian</h4>
                        <hr>
                        <?php if (empty($id_pengguna)) : ?>
                            <?= form_open('grafik', 'method=get') ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-md-12">Grafik Penilaian</label>
                                        <div class="col-md-12">
                                            <select name="id_pengguna" class="form-control form-control-line" required>
                                                <option value="">Pilih...</option>
                                                <?php foreach ($pengguna as $row) : ?>
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
                            <div class="grafik" style="height: 700px;"></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?= $this->load->view('template/copyright', '', TRUE) ?>
</div>
</div>
<style>
    .ct-series-a .ct-bar {
        stroke: green;
    }
</style>
<?= $this->load->view('template/js', '', TRUE) ?>
<script>
    new Chartist.Bar('.grafik', {
        labels: [
            <?php foreach ($hasil as $row) : ?>
                <?= "'" . str_replace("'", "", $row->nama_prodi) . "'" ?>,
            <?php endforeach; ?>
        ],
        series: [
            [
                <?php foreach ($hasil as $row) : ?>
                    <?= $row->nilai_hasil ?>,
                <?php endforeach; ?>
            ]
        ]
    }, {
        seriesBarDistance: 0,
        reverseData: false,
        horizontalBars: true,
        axisY: {
            offset: 70
        }
    });
</script>
<?= $this->load->view('template/footer', '', TRUE) ?>