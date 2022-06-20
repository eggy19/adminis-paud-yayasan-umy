<!-- Header -->
<?php $this->load->view('template/head'); ?>
<div class="wrapper">

    <!-- Preloader -->


    <!-- Navbar -->
    <?php $this->load->view('template/nav'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php $this->load->view('template/sidebar'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo $judul_halaman ?></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Profil</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <?php foreach ($profil as $i) : ?>
                                        <div class="col-md-4">
                                            <label for="inputName">Logo Sekolah</label>
                                            <div class="text-center mb-5 mt-4">
                                                <img src="<?= base_url('assets/templates/dist/img/avatar.png') ?>" class="rounded " alt="image-profil">
                                            </div>
                                            <div class="form-group">
                                                <a href="<?= base_url('profil/ubah') ?>" class="btn btn-warning form-control">Ubah Data Profil</a>
                                            </div>
                                        </div>
                                        <div class="col ml-4 isi-profil">
                                            <div class="form-group">
                                                <label for="inputName">Nama Sekolah</label>
                                                <input type="text" id="inputName" class="form-control" disabled value="<?= $i->nama_sekolah ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName">NPSN</label>
                                                <input type="text" id="inputName" class="form-control" value="<?= $i->npsn ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputDescription">Alamat</label>
                                                <textarea disabled id="inputDescription" class="form-control" rows="4"><?= $i->alamat ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputDescription">Visi</label>
                                                <textarea disabled id="inputDescription" class="form-control" rows="4"><?= $i->visi ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputDescription">Misi</label>
                                                <textarea disabled id="inputDescription" class="form-control" rows="4"><?= $i->misi ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputDescription">Tujuan</label>
                                                <textarea disabled id="inputDescription" class="form-control" rows="4"><?= $i->tujuan ?></textarea>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- Footer -->
    <?php $this->load->view('template/footer'); ?>

</div>
<!-- ./wrapper -->
<!-- JS -->
<?php $this->load->view('template/js'); ?>

</body>

</html>