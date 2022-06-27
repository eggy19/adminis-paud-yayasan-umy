<div class="row">
    <div class="col-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Tabel Data Guru</h3>
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
                            <th>Nama Guru</th>
                            <th>TTL</th>
                            <th>Alamat</th>
                            <th>No Handphone</th>
                            <th>TMT</th>
                            <th>NBM</th>
                            <th>Foto</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $a = 1;
                        foreach ($guru as $i) { ?>
                            <tr>
                                <td><?= $a++ ?></td>
                                <td><?= $i->nama ?></td>
                                <td><?= $i->t_lahir .  ' ' . $i->tgl_lahir ?></td>
                                <td><?= $i->alamat ?></td>
                                <td><?= $i->no_hp ?></td>
                                <td><?= $i->tmt ?></td>
                                <td><?= $i->nbm ?></td>
                                <td><?= $i->foto ?></td>
                                <td class="project-actions text-center">
                                    <a href="<?= base_url('guru/detail/') . $i->id ?>" class="btn btn-info btn-sm">Detail</a>
                                    <button class="hapus btn btn-danger btn-sm" data='<?= $i->id ?>'><i class="fas fa-trash"></i>Hapus</button>
                                    <button class="ubah btn btn-warning btn-sm" data='<?= $i->id ?>'><i class="fas fa-edit"> </i>Edit</button>
                                </td>
                            </tr>
                        <?php  } ?>
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

<script>
    $(document).ready(function() {

        $('.tambah').click(function() {
            var aksi = 'Tambah Guru';
            $.ajax({
                url: '<?php echo base_url('/guru/tambah'); ?>',
                method: 'post',
                data: {
                    aksi: aksi
                },
                success: function(data) {
                    $('#myModal').modal("show");
                    $('#tampil_modal').html(data);
                    document.getElementById("judul").innerHTML = 'Tambah Data Guru';

                }
            });
        });

        $('.ubah').click(function() {

            var id = $(this).attr("data");
            $.ajax({
                url: '<?php echo base_url(); ?>/guru/ubah',
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