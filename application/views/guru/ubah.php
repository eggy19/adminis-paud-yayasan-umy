<form method="post" id="form">
    <div class="form-group">
        <label for="email">Nama Guru:</label>
        <input type="text" class="form-control" hidden name="id_guru" value="<?= $guru->id ?>">
        <input type="text" class="form-control" name="nama" value="<?= $guru->nama ?>" placeholder="Masukan Nama Kelas">
    </div>
    <div class="form-group">
        <label for="email">Tempat Lahir:</label>
        <input type="text" class="form-control" name="t_lahir" value="<?= $guru->t_lahir ?>">
    </div>
    <div class="form-group">
        <label for="email">Tanggal Lahir:</label>
        <input type="date" class="form-control" name="tgl_lahir">
    </div>
    <div class="form-group">
        <label for="email">Alamat:</label>
        <input type="text" class="form-control" name="alamat" value="<?= $guru->alamat ?>">
    </div>
    <div class="form-group">
        <label for="email">TMT:</label>
        <input type="text" class="form-control" name="tmt" value="<?= $guru->tmt ?>">
    </div>
    <div class="form-group">
        <label for="email">NBM:</label>
        <input type="text" class="form-control" name="nbm" value="<?= $guru->nbm ?>">
    </div>

    <div class="form-group">
        <label for="email">No Telepon:</label>
        <input type="text" class="form-control" name="no_hp" value="<?= $guru->no_hp ?>">
    </div>
    </div>
    <label for="email">Foto:</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Upload</span>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="foto">
            <label class="custom-file-label">Pilih Foto</label>
        </div>
    </div>
    <div class="form-group">
    </div>
    <button id="tombol_tambah" type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tombol_edit").click(function() {
            var data = $('#form').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>/mahasiswa/editMahasiswa",
                data: data,
                cache: false,
                success: function(data) {
                    $('#tampil').load("<?php echo base_url(); ?>/mahasiswa/tampilMahasiswa");
                }
            });
        });
    });
</script>