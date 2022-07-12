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
                        <a href="<?= base_url('laporan/kelas') ?>">Kembali</a>
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Table Data Kelas</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>

                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Induk</th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $a = 1;
                                        foreach ($kelas as $i) { ?>
                                            <tr>
                                                <td><?= $a++ ?></td>
                                                <td><?= $i->nomor_induk ?></td>
                                                <td><?= $i->nama ?></td>
                                                <td><?= $i->kelas ?></td>
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
    });
</script>

</body>

</html>