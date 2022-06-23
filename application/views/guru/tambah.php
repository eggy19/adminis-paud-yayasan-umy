<form method="post" enctype="multipart/form-data" id="form">
    <div class=" form-group">
        <label for="email">Nama Guru:</label>
        <input type="text" class="form-control" name="nm_guru" placeholder="Masukan Nama Guru">
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="email">Tempat Lahir:</label>
                <input type="text" class="form-control" name="t_lahir">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="email">Tanggal Lahir:</label>
                <input type="date" class="form-control" name="tgl_lahir">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="email">Alamat:</label>
        <input type="text" class="form-control" name="alamat">
    </div>
    <div class="form-group">
        <label for="email">TMT:</label>
        <input type="text" class="form-control" name="tmt">
    </div>
    <div class="form-group">
        <label for="email">NBM:</label>
        <input type="text" class="form-control" name="nbm">
    </div>
    <div class="form-group">
        <label for="email">No Telepon:</label>
        <input type="text" class="form-control" name="no_hp">
    </div>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Pilih Foto</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile" name="foto">
                <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
            </div>
            <div class="input-group-append">
                <span class="input-group-text">Upload</span>
            </div>
        </div>
    </div>
    <div id="pesan">
    </div>
    <button id="tombol_tambah" type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>

<!-- bs-custom-file-input -->
<script src="<?= base_url('assets/templates/') ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
    $(function() {
        bsCustomFileInput.init();
    });

    // $(document).ready(function() {
    //     $("#tombol_tambah").click(function() {
    //         var data = $('#form').serialize();
    //         $.ajax({
    //             type: 'POST',
    //             url: "<?php echo base_url(); ?>guru/simpanGuru",
    //             data: data,
    //             dataType: json,
    //             cache: false,
    //             success: function(data) {
    //                 $('#tampil').load("<?php echo base_url(); ?>/guru/tampilGuru");
    //                 console.log(data);
    //             }
    //         });
    //     });
    // });
    $(document).ready(function() {

        $("#form").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?php echo base_url(); ?>guru/simpanGuru",
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
                        alert(data.success);
                    } else {
                        console.log(data.error);
                        $("#pesan").html('<div class="alert alert-danger"><small>' + data.error + '</small></div>');
                    }
                }
            });
        });
    });
    // $(document).ready(function() {
    // });
</script>