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
                    <div class="col-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Table Data Kelas</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <button type="button" class="tambah btn btn-primary mb-3" id="tambah-siswa" data-toggle="modal" data-target="#myModal">
                                    Tambah Data
                                </button>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>

                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kelas</th>
                                            <th>Wali Kelas</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $a = 1;
                                        foreach ($kelas as $i) { ?>
                                            <tr>
                                                <td><?= $a++ ?></td>
                                                <td><?= $i->kelas ?></td>
                                                <td><?= $i->wali_kelas1 . ', <br>' . $i->wali_kelas2  ?></td>
                                                <td class="project-actions text-center">
                                                    <button class="hapus btn btn-danger btn-sm" data='<?= $i->id ?>'><i class="fas fa-trash"> Hapus</i></button>
                                                    <button class="ubah btn btn-warning btn-sm" data='<?= $i->id ?>'><i class="fas fa-edit"> Edit </i></button>
                                                </td>
                                            </tr>
                                        <?php } ?>
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

<script>
    $(document).ready(function() {

        $('.tambah').click(function() {
            var aksi = 'Tambah Kelas';
            $.ajax({
                url: '<?php echo base_url('/kelas/tambah'); ?>',
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

            var id = $(this).attr("data");
            $.ajax({
                url: '<?php echo base_url(); ?>/kelas/ubah',
                method: 'post',
                data: {
                    id: id
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
                url: '<?php echo base_url(); ?>/kelas/hapus',
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
            "autoWidth": false
        });
    });
</script>

</body>

</html>