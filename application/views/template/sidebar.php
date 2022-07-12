<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?php echo base_url('assets') ?>/img/logoAisy.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light ml-2">YAYASAN AISYIYAH</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <?php if ($this->session->userdata('role_id') != 1) { ?>
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info ml-3">
                    <a href="#" class="d-block">Administrator Sekolah</a>
                </div>
            </div>
        <?php } ?>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <?php if ($this->session->userdata('role_id') == 2) { ?>
                        <a href="<?= base_url('user/sekolah') ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Beranda
                            </p>
                        </a>
                    <?php } else { ?>
                        <a href="<?= base_url('admin') ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Beranda
                            </p>
                        </a>
                    <?php } ?>
                </li>
                <?php if ($this->session->userdata('role_id') == 2) { ?>
                    <li class="nav-header">SEKOLAH</li>
                    <li class="nav-item                     ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Master Data
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('kelas') ?>" class="nav-link <?= $this->uri->segment(1) == 'kelas' ? 'active' : '' ?>">
                                    <i class="text-warning far fa-circle nav-icon"></i>
                                    <p>Data Kelas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('siswa') ?>" class="nav-link <?= $this->uri->segment(1) == 'siswa' ? 'active' : '' ?>">
                                    <i class="text-warning far fa-circle nav-icon"></i>
                                    <p>Data Siswa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('guru') ?>" class="nav-link <?= $this->uri->segment(1) == 'guru' ? 'active' : '' ?>">
                                    <i class="text-warning far fa-circle nav-icon"></i>
                                    <p>Data Guru</p>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="pages/forms/validation.html" class="nav-link">
                                    <i class="text-warning far fa-circle nav-icon"></i>
                                    <p>Data Kelompok</p>
                                </a>
                            </li> -->
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-school"></i>
                            <p>
                                Sekolah
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('profil') ?>" class="nav-link">
                                    <i class="text-info far fa-circle nav-icon"></i>
                                    <p>Data Profil</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('prestasi') ?>" class="nav-link">
                                    <i class="text-info far fa-circle nav-icon"></i>
                                    <p>Data Prestasi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('albums') ?>" class="nav-link">
                                    <i class="text-info far fa-circle nav-icon"></i>
                                    <p>Galeri Kegiatan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-credit-card"></i>
                            <p>
                                Keuangan RAPB
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('keuangan/pendapatan') ?>" class="nav-link">
                                    <i class="text-danger far fa-circle nav-icon"></i>
                                    <p>Pengeluaran</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('keuangan/pengeluaran') ?>" class="nav-link">
                                    <i class="text-danger far fa-circle nav-icon"></i>
                                    <p>Pendapatan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('user/download') ?>" class="nav-link">
                            <i class="nav-icon fas fa-download"></i>
                            <p>Download</p>
                        </a>
                    </li>
                    <li class="nav-header">Laporan</li>
                    <li class="nav-item">
                        <a href="<?= base_url('siswa/laporan') ?>" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Siswa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('kelas/laporan') ?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Kelas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('guru/laporan') ?>" class="nav-link">
                            <i class="nav-icon fa fa-chalkboard"></i>
                            <p>Guru</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('keuangan/laporandapat') ?>" class="nav-link">
                            <i class="nav-icon fa fa-arrow-up"></i>
                            <p>Pendapatan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('keuangan/laporankeluar') ?>" class="nav-link">
                            <i class="nav-icon fa fa-arrow-down"></i>
                            <p>Penggunaan</p>
                        </a>
                    </li>


                <?php } elseif ($this->session->userdata('role_id') == 1) { ?>
                    <li class="nav-header">ADMINISTRATOR</li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/akun') ?>" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Akun Sekolah</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/uploadfile') ?>" class="nav-link">
                            <i class="nav-icon fas fa-upload"></i>
                            <p>Upload File</p>
                        </a>
                    </li>
                    <li class="nav-header">LAPORAN</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                Data Sekolah
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('laporan/kelas') ?>" class="nav-link">
                                    <i class="text-success far fa-circle nav-icon"></i>
                                    <p>Kelas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('laporan/siswa') ?>" class="nav-link">
                                    <i class="text-success far fa-circle nav-icon"></i>
                                    <p>Siswa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('laporan/guru') ?>" class="nav-link">
                                    <i class="text-success far fa-circle nav-icon"></i>
                                    <p>Guru</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-folder-open"></i>
                            <p>
                                Keuangan Sekolah
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('laporan/pendapatan') ?>" class="nav-link">
                                    <i class="text-success far fa-circle nav-icon"></i>
                                    <p>Pendapatan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('laporan/penggunaan') ?>" class="nav-link">
                                    <i class="text-success far fa-circle nav-icon"></i>
                                    <p>Penggunaan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>