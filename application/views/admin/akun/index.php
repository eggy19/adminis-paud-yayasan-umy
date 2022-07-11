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
                    <div class="col-md-4">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Akun</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?php base_url('admin/akun') ?>" method="post">
                                    <div class="form-group">
                                        <label for="email">Nama:</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukan nama" value="<?= set_value('nama') ?>">
                                        <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" name="email" placeholder="Masukan email" value="<?= set_value('email') ?>">
                                        <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Role Akses:</label>

                                        <select name="role" id="" class="form-control">
                                            <option value="1">Administrator</option>
                                            <option value="2">Sekolah</option>
                                            <option value="3">Yayasan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Password:</label>
                                        <input type="password" class="form-control" name="password1" value="<?= set_value('password1') ?>">
                                        <?= form_error('password1', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Ulang Password:</label>
                                        <input type="password" class="form-control" name="password2">
                                    </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">Daftar</button>
                            </div>
                            <!-- /.card-Footer -->
                            </form>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Tabel Data Akun Pengguna</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Date Created</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $n = 1;
                                        foreach ($user as $i) : ?>
                                            <tr>
                                                <td><?= $n++ ?></td>
                                                <td><?= $i->nama ?></td>
                                                <td><?= $i->email ?></td>
                                                <td><?= $i->role ?></td>
                                                <td><?= date('d F Y', $i->created_at) ?></td>
                                                <td class="project-actions text-center">
                                                    <a href="<?= base_url('auth/lupaPassword/') . $i->id ?>" class="btn btn-info btn-sm">Lupa Password</a>
                                                    <button class="hapus btn btn-danger btn-sm" data="<?= $i->id ?>"><i class="fas fa-trash"> Hapus</i></button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tfoot>
                                </table>
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
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
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
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('assets/templates/plugins') ?>/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/templates/plugins') ?>/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/templates/plugins') ?>/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/templates/plugins') ?>/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/templates/plugins') ?>/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('assets/templates/plugins') ?>/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/templates/plugins') ?>/jszip/jszip.min.js"></script>
<script src="<?php echo base_url('assets/templates/plugins') ?>/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url('assets/templates/plugins') ?>/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url('assets/templates/plugins') ?>/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url('assets/templates/plugins') ?>/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('assets/templates/plugins') ?>/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(document).ready(function() {

        $('.tambah').click(function() {
            var aksi = 'Tambah Kelas';
            $.ajax({
                url: '<?php echo base_url('/admin/akun/tambah_akun'); ?>',
                method: 'post',
                data: {
                    aksi: aksi
                },
                success: function(data) {
                    $('#myModal').modal("show");
                    $('#tampil_modal').html(data);
                    document.getElementById("judul").innerHTML = 'Tambah Data Kelas';

                }
            });
        });

        $('.ubah').click(function() {

            var kode_kelas = $(this).attr("kode_kelas");
            $.ajax({
                url: '<?php echo base_url(); ?>/guru/ubah',
                method: 'post',
                data: {
                    kode_kelas: kode_kelas
                },
                success: function(data) {
                    $('#myModal').modal("show");
                    $('#tampil_modal').html(data);
                    document.getElementById("judul").innerHTML = 'Edit Data';
                }
            });
        });

        $('.hapus').click(function() {

            var id = $(this).attr("data");
            $.ajax({
                url: '<?php echo base_url(); ?>admin/hapusAkun',
                method: 'post',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#myModal').modal("show");
                    $('#tampil_modal').html(data);
                    document.getElementById("judul").innerHTML = 'Hapus Data';
                }
            });
        });

        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

</body>

</html>