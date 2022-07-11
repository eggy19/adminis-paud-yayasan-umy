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
                <?= $this->session->flashdata('msg'); ?>

                <div class="row">
                    <div class="col-md-5">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Ubah Password</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <?php echo form_open_multipart('auth/ubahPassword') ?>
                                <div class="form-group">
                                    <label for="email">Password Lama:</label>
                                    <input type="text" class="form-control" name="email" value="<?= $this->session->userdata('email') ?>" hidden>
                                    <input type="text" class="form-control" name="pass_lama" value="<?= set_value('pass_lama') ?>">
                                    <?= form_error('pass_lama', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Password Baru:</label>
                                    <input type="text" class="form-control" name="pass_baru" value="<?= set_value('pass_baru') ?>">
                                    <?= form_error('pass_baru', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Ulang Password:</label>
                                    <input type="text" class="form-control" name="pass_baru2">
                                    <?= form_error('pass_baru2', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </div>
                            <!-- /.card-Footer -->
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                    <div class="col">

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