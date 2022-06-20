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
                                <h3 class="card-title">Ubah Profil</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('profil/update'); ?>" method="post">
                                    <div class="row">
                                        <?php foreach ($profil as $i) : ?>
                                            <div class="col-md-4">
                                                <label for="inputName">Logo Sekolah</label>
                                                <input type="text" hidden name="id" value="<?= $i->id ?>">
                                                <input type="text" hidden name="id_user" value="<?= $i->user_id ?>">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">File input</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="logo">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <button type="submit" class="btn btn-primary form-control">Update Profil</button>
                                                </div>
                                                <div class="form-group">
                                                    <a href="<?= base_url('profil') ?>" class="btn btn-danger form-control">Kembali</a>
                                                </div>
                                            </div>
                                            <div class="col ml-4 isi-profil">
                                                <div class="form-group">
                                                    <label for="inputName">Nama Sekolah</label>
                                                    <input type="text" id="inputName" class="form-control" name="sekolah" value="<?= $i->nama_sekolah ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName">NPSN</label>
                                                    <input type="text" id="inputName" class="form-control" name="npsn" value="<?= $i->npsn ?>">
                                                </div>
                                                <div class=" form-group">
                                                    <label for="inputDescription">Alamat</label>
                                                    <textarea id="inputDescription" class="form-control" rows="4" name="alamat"><?= $i->alamat ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputDescription">Visi</label>
                                                    <textarea id="inputDescription" class="form-control" rows="4" name="visi"><?= $i->visi ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputDescription">Misi</label>
                                                    <textarea id="inputDescription" class="form-control" rows="4" name="misi"><?= $i->misi ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputDescription">Tujuan</label>
                                                    <textarea id="inputDescription" class="form-control" rows="4" name="tujuan"><?= $i->tujuan ?></textarea>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </form>
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
<!-- bs-custom-file-input -->
<script src="<?= base_url('assets/templates/') ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>

</body>

</html>