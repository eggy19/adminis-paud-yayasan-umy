<form method="post" id="form">
    <div class="form-group">
        <label for="email">Nama Guru:</label>
        <input type="text" class="form-control" hidden name="id_guru" value="<?= $guru->id ?>">
        <input type="text" class="form-control" hidden name="user_id" value="<?= $guru->user_id ?>">
        <input type="text" class="form-control" name="nm_guru" value="<?= $guru->nama ?>" placeholder="Masukan nama Guru">
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="email">Tempat Lahir:</label>
                <input type="text" class="form-control" name="t_lahir" value="<?= $guru->t_lahir ?>">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="email">Tanggal Lahir:</label>
                <input type="date" class="form-control" name="tgl_lahir" value="<?= $guru->tgl_lahir ?>">
            </div>
        </div>
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
        <input type="hidden" value="<?= $guru->foto ?>" name="exist_foto">
    </div>
    <div class="row">
        <div class="col">
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
        </div>
        <div class="col-md-4">
            <div class="form-group ml-4">
                <img src="<?= base_url('assets/img/foto_guru/') . $guru->foto ?>" style="width:100px;">
            </div>
        </div>
    </div>

    <button id="tombol_tambah" type="submit" class="btn btn-primary">Simpan</button>
</form>

<!-- bs-custom-file-input -->
<script src="<?= base_url('assets/templates/') ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script type="text/javascript">
    $(function() {
        bsCustomFileInput.init();
    });

    $(document).ready(function() {
        $("#form").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?php echo base_url(); ?>guru/ubahGuru",
                type: 'POST',
                dataType: 'json',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $('#tampil').load("<?php echo base_url(); ?>/guru/tampilGuru");
                        $('#myModal').modal('hide');
                        console.log(data.success);
                        alert(data.success);
                    } else {
                        console.log(data.error);
                        $("#pesan").html('<div class="alert alert-danger"><small>' + data.error + '</small></div>');
                    }
                }
            });
        });
    });
</script>