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
                                            <th>Orang tua</th>
                                            <th>Alamat</th>
                                            <th>No Hp</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $a = 1;
                                        foreach ($siswa as $i) { ?>
                                            <tr>
                                                <td><?= $a++ ?></td>
                                                <td><?= $i->nomor_induk ?></td>
                                                <td><?= $i->nama ?></td>
                                                <td><?= $i->gender ?></td>
                                                <td><?= $i->t_lahir . ', ' . $i->tgl_lahir ?></td>
                                                <td>usia</td>
                                                <td><?= $i->bb ?></td>
                                                <td><?= $i->tb ?></td>
                                                <td><?= $i->lk ?></td>
                                                <td><?= $i->ortu ?></td>
                                                <td><?= $i->alamat ?></td>
                                                <td><?= $i->no_hp ?></td>
                                            </tr>
                                        <?php } ?>

                                        </tfoot>
                                </table>

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