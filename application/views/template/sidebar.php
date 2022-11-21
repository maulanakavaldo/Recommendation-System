<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> <a class="waves-effect waves-dark" href="http://localhost/ahp_prodi" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Home</span></a>
                </li>
                <?php if ($this->session->userdata('role') == 'admin') : ?>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('fakultas') ?>" aria-expanded="false"><i class="mdi mdi-reorder-horizontal"></i><span class="hide-menu">Fakultas</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('prodi') ?>" aria-expanded="false"><i class="mdi mdi-view-list"></i><span class="hide-menu">Program Studi</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('kriteria') ?>" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Kriteria</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('alternatif') ?>" aria-expanded="false"><i class="mdi mdi-reorder-horizontal"></i><span class="hide-menu">Alternatif</span></a>
                    </li>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('hasil') ?>" aria-expanded="false"><i class="mdi mdi-check-circle"></i><span class="hide-menu">Hasil Penilaian</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('grafik') ?>" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Grafik</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('pengguna') ?>" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Pengguna</span></a>
                    </li>

                <?php elseif ($this->session->userdata('role') == 'user') : ?>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('fakultas') ?>" aria-expanded="false"><i class="mdi mdi-reorder-horizontal"></i><span class="hide-menu">Fakultas</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('prodi') ?>" aria-expanded="false"><i class="mdi mdi-account-box"></i><span class="hide-menu">Program Studi</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('kriteria') ?>" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Kriteria</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('alternatif') ?>" aria-expanded="false"><i class="mdi mdi-reorder-horizontal"></i><span class="hide-menu">Alternatif</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('hasil') ?>" aria-expanded="false"><i class="mdi mdi-check-circle"></i><span class="hide-menu">Hasil Penilaian</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('grafik') ?>" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Grafik</span></a>
                    </li>
                <?php endif; ?>
                <li> <a class="waves-effect waves-dark" href="<?= site_url('password') ?>" aria-expanded="false"><i class="mdi mdi-account-settings-variant"></i><span class="hide-menu">Ubah Password</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="<?= site_url('login/logout') ?>" aria-expanded="false"><i class="mdi mdi-logout"></i><span class="hide-menu">Logout</span></a>
                </li>
            </ul>
        </nav>
    </div>
</aside>