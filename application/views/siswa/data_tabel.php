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
            <th>Aksi</th>

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
                <td class="project-actions text-center">
                    <button class="hapus btn btn-danger btn-sm" data='<?= $i->id ?>'><i class="fas fa-trash"> Hapus</i></button>
                    <button class="ubah btn btn-warning btn-sm" data='<?= $i->id ?>'><i class="fas fa-edit"> Edit </i></button>
                </td>
            </tr>
        <?php } ?>

        </tfoot>
</table>

<script>
    $(document).ready(function() {

        $('.ubah').click(function() {

            var id = $(this).attr("data");
            $.ajax({
                url: '<?php echo base_url(); ?>/siswa/ubah',
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
                url: '<?php echo base_url(); ?>/siswa/hapus',
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