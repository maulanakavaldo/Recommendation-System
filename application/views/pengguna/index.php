<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?= $this->load->view('template/header', '', TRUE) ?>
<?= $this->load->view('template/sidebar', '', TRUE) ?>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Pengguna</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Data Pengguna</h4>
                        <?= $this->session->flashdata('success') ?>
                        <div class="card-subtitle"><?= anchor('pengguna/tambah', 'Tambah Data', 'class="btn btn-primary"') ?></div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="dataTables1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th class="text-center" width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pengguna as $row) : ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $row->nama_lengkap ?></td>
                                            <td><?= $row->username ?></td>
                                            <td><?= $row->role ?></td>
                                            <td class="text-center">
                                                <?php if ($row->username != "admin") : ?>
                                                    <a href="<?= site_url('pengguna/ubah/' . $row->id_pengguna) ?>" class="btn btn-success btn-xs" title="Ubah">Ubah</a>
                                                    <a href="#" data-href="<?php echo site_url('pengguna/hapus/' . $row->id_pengguna); ?>" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-xs" title="Hapus">Hapus</a>
                                                <?php endif; ?>
                                            </td>
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
    <?= $this->load->view('template/copyright', '', TRUE) ?>
</div>
</div>

<?= $this->load->view('template/js', '', TRUE) ?>
<script src="<?= base_url('public/assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('public/assets/plugins/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        var t = $('#dataTables1').DataTable({
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
            "responsive": true,
            "bLengthChange": true,
            "bInfo": true,
            "oLanguage": {
                "sSearch": "<i class='fa fa-search fa-fw'></i> Cari : ",
                "sLengthMenu": "_MENU_ &nbsp;&nbsp;data per halaman",
                "sInfo": "Menampilkan _START_ s/d _END_ dari <b>_TOTAL_ data</b>",
                "sInfoEmpty": "",
                "sInfoFiltered": "(difilter dari _MAX_ total data)",
                "sZeroRecords": "Pencarian tidak ditemukan",
                "sEmptyTable": "Tidak ada data"
            }
        });

        t.on('order.dt search.dt', function() {
            t.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Anda yakin akan menghapus data ini ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger btn-ok">Hapus</a>
            </div>
        </div>
    </div>
</div>

<?= $this->load->view('template/footer', '', TRUE) ?>