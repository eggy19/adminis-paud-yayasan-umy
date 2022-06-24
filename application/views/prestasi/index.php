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
                    <?= $this->session->flashdata('msg'); ?>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Akun</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <?php echo form_open_multipart('prestasi/simpan') ?>
                                <div class="form-group">
                                    <label for="email">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" name="prestasi" placeholder="Masukan nama File" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Tanggal Kegiatan:</label>
                                    <input type="text" class="form-control" name="prestasi" placeholder="Masukan nama File" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Lokasi Kegiatan:</label>
                                    <input type="text" class="form-control" name="prestasi" placeholder="Masukan nama File" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Sertifikat:</label>
                                    <input type="file" class="form-control" name="uploadfile" required>
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
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Tabel Data Akun Pengguna</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="tampil-tabel">

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

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="judul"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div id="tampil_modal">
                        <!-- Data akan di tampilkan disini-->
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Footer -->
    <?php $this->load->view('template/footer'); ?>

</div>
<!-- ./wrapper -->
<!-- JS -->
<?php $this->load->view('template/js'); ?>

<script>
    $(document).ready(function() {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url(); ?>prestasi/dataPrestasi",
            cache: false,
            success: function(data) {
                $("#tampil-tabel").html(data);
            }
        });
    });
</script>

</body>

</html>