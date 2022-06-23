<form action="<?= base_url('kelas/hapusKelas') ?>" method="post" id="form">
    <p>Yakin ingin menghapus <?= $kelas->kelas ?> </p>
    <input type="hidden" name="id_kelas" value=" <?= $kelas->id ?>">
    <input type="hidden" name="kelas" value=" <?= $kelas->kelas ?>">
    <button id="tombol_hapus" type="submit" class="btn btn-danger" data-dismiss="modal">Hapus</button>
</form>