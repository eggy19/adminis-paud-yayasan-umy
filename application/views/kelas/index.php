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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Table Data Siswa Paud</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <button class="btn btn-primary mb-3" id="tambah-siswa">Tambah Data</button>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Induk</th>
                                            <th>Nama Siswa</th>
                                            <th>Gender</th>
                                            <th>Tgl Lahir</th>
                                            <th>Usia</th>
                                            <th>Berat Badan (Kg)</th>
                                            <th>Tinggi Badan (cm)</th>
                                            <th>Lingkar Kepala (cm)</th>
                                            <th>Nama Orang Tua</th>
                                            <th>Alamat</th>
                                            <th>No Handphone</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet
                                                Explorer 4.0
                                            </td>
                                            <td>Win 95+</td>
                                            <td> 4</td>
                                            <td>X</td>
                                            <td>X</td>
                                            <td>X</td>
                                            <td>X</td>
                                            <td>X</td>
                                            <td>X</td>
                                            <td>X</td>
                                            <td>X</td>
                                            <td>
                                                <button class="btn btn-danger">Hapus</button>
                                                <button class="btn btn-warning">Ubah</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet
                                                Explorer 4.0
                                            </td>
                                            <td>Win 95+</td>
                                            <td> 4</td>
                                            <td>X</td>
                                            <td>X</td>
                                            <td>X</td>
                                            <td>X</td>
                                            <td>X</td>
                                            <td>X</td>
                                            <td>X</td>
                                            <td>X</td>
                                            <td>X</td>
                                        </tr>
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
    $(function() {
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