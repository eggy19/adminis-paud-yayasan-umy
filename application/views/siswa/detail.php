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
                <a href="<?= base_url('kelas') ?>" class="ml-2">Kembali</a><br>
                <?= $this->session->flashdata('msg'); ?>
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
                                                <label class="col-sm-2 col-form-label">Nomor Induk</label>
                                                <div class="col">
                                                    <input type="text" readonly class="form-control" value="<?= $guru->nama ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col">
                                                    <input type="text" readonly class="form-control" value="<?= $guru->nama ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Gender</label>
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
                                                <label class="col-sm-2 col-form-label">Kelas</label>
                                                <div class="col">
                                                    <input type="text" readonly class="form-control" value="<?= $guru->tmt ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Orang Tua</label>
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
                                <button type="button" class="diklat btn btn-primary mb-3" data="<?= $guru->id ?>">
                                    Tambah Diklat
                                </button>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Diklat</th>
                                            <th>Lokasi</th>
                                            <th>Tanggal</th>
                                            <th>sertifikat</th>
                                            <th></th>

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
                                                <td class="project-actions text-center">
                                                    <a href="<?= base_url('guru/hapus_diklat/') . $i->id ?>" class="btn btn-danger">hapus</a>
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
                                <button type="button" class="organis btn btn-primary mb-3" data="<?= $guru->id ?>">
                                    Tambah Organisasi
                                </button>
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
                                                <td><?= $i->sertifikat ?></td>
                                                <td class="project-actions text-center">
                                                    <a href="<?= base_url('guru/hapus_organisasi/') . $i->id ?>" class="btn btn-danger">hapus</a>

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

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
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
        $('.diklat').click(function() {
            var id = $(this).attr("data");
            $.ajax({
                url: '<?php echo base_url('/guru/tambah_diklat'); ?>',
                method: 'post',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#myModal').modal("show");
                    $('#tampil_modal').html(data);
                    document.getElementById("judul").innerHTML = 'Tambah Diklat';
                }
            });
        });

        $('.hapus').click(function() {

            var id = $(this).attr("data");
            $.ajax({
                url: '<?php echo base_url(); ?>/guru/hapus',
                method: 'post',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#myModal').modal("show");
                    $('#tampil_modal').html(data);
                    document.getElementById("judul").innerHTML = 'Hapus Data';
                    // console.log(id);
                }
            });
        });


        $('.organis').click(function() {
            var id = $(this).attr("data");
            $.ajax({
                url: '<?php echo base_url('/guru/tambah_organisasi'); ?>',
                method: 'post',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#myModal').modal("show");
                    $('#tampil_modal').html(data);
                    document.getElementById("judul").innerHTML = 'Tambah Organisasi';
                }
            });
        });

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