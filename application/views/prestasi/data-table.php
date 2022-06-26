<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kegiatan</th>
            <th>Tanggal</th>
            <th>lokasi</th>
            <th>Sertifikat</th>
            <th></th>

        </tr>
    </thead>
    <tbody>
        <?php $n = 1;
        foreach ($prestasi as $i) : ?>
            <tr>
                <td><?= $n++ ?></td>
                <td><?= $i->nama_kegiatan ?></td>
                <td><?= $i->tanggal ?></td>
                <td><?= $i->lokasi ?></td>
                <td><a href="<?= base_url('assets/sertifikat/prestasi/') . $i->sertifikat ?>" target="_blank"><?= $i->sertifikat ?></a></td>
                <td class="project-actions text-center">
                    <button class="hapus btn btn-danger btn-sm" data="<?= $i->id ?>"><i class="fas fa-trash"> Hapus</i></button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tfoot>
</table>

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('assets/templates/plugins') ?>/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/templates/plugins') ?>/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.hapus').click(function() {

            var id = $(this).attr("data");
            $.ajax({
                url: '<?php echo base_url(); ?>/prestasi/hapus',
                method: 'post',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#myModal').modal("show");
                    $('#tampil_modal').html(data);
                    document.getElementById("judul").innerHTML = 'Hapus Data Prestasi';
                }
            });
        });

        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        });

    });
</script>