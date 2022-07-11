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
                <a href="<?= base_url('laporan/guru') ?>" class="ml-2">Kembali</a>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Detail Guru</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Email</label>
                                                <div class="col">
                                                    <input type="text" readonly class="form-control" value="<?= $guru->nama ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">TTL:</label>
                                                <div class="col">
                                                    <input type="text" readonly class="form-control" value="<?= $guru->t_lahir . ', ' . $guru->tgl_lahir ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Alamat</label>
                                                <div class="col">
                                                    <textarea name="" class="form-control" readonly><?= $guru->alamat ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">TMT</label>
                                                <div class="col">
                                                    <input type="text" readonly class="form-control" value="<?= $guru->tmt ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">NBM</label>
                                                <div class="col">
                                                    <input type="text" readonly class="form-control" value="<?= $guru->nbm ?>">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col">
                                        <img class="ml-5" src="<?= base_url('assets/img/foto_guru/') . $guru->foto ?>" style="width:200px;">
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->

                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Pengalaman Diklat</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Diklat</th>
                                            <th>Lokasi</th>
                                            <th>Tanggal</th>
                                            <th>sertifikat</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $a = 1;
                                        foreach ($diklat as $i) { ?>
                                            <tr>
                                                <td><?= $i->diklat ?></td>
                                                <td><?= $i->lokasi ?></td>
                                                <td><?= $i->tanggal ?></td>
                                                <td><a href="<?= base_url('assets/sertifikat/' . $i->sertifikat) ?>" target="_blank"><?= $i->sertifikat ?></a>
                                                </td>
                                            </tr>
                                        <?php  } ?>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Pengalaman Organisasi</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Organisasi</th>
                                            <th>Jabatan</th>
                                            <th>Tanggal</th>
                                            <th>sertifikat</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $a = 1;
                                        foreach ($organis as $i) { ?>
                                            <tr>
                                                <td><?= $i->organisasi ?></td>
                                                <td><?= $i->jabatan  ?></td>
                                                <td><?= $i->tanggal ?></td>
                                                <td><a href="<?= base_url('assets/sertifikat/' . $i->sertifikat) ?>" target="_blank"><?= $i->sertifikat ?></a>
                                                </td>
                                            </tr>
                                        <?php  } ?>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
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


<script>
    $(document).ready(function() {

        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        });

        $("#example2").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        });

    });
</script>

</body>

</html>