<form method="post" id="form">
    <div class="form-group">
        <label for="email">Nomor Induk:</label>
        <input type="text" class="form-control" name="kode_kelas" placeholder="Masukan Kode Kelas">
    </div>
    <div class="form-group">
        <label for="email">Nama Guru:</label>
        <input type="text" class="form-control" name="nama_kelas" placeholder="Masukan Nama Kelas">
    </div>
    <div class="form-group">
        <label>Kelompok:</label>
        <select class="form-control" name="kelompok">
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="email">TMT:</label>
        <input type="date" class="form-control" name="tmt">
    </div>
    <div class="form-group">
        <label for="email">NBM:</label>
        <input type="text" class="form-control" name="nbm">
    </div>
    <div class="form-group">
        <label for="email">Alamat:</label>
        <input type="text" class="form-control" name="alamat">
    </div>
    <div class="form-group">
        <label for="email">No Telepon:</label>
        <input type="text" class="form-control" name="no_hp">
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