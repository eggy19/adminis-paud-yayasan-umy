<div class="container gallery">
    <div class="row">
        <?php foreach ($album as $album) { ?>
            <div class="col-sm-2">
                <label for=""><?= $album->judul ?></label>
                <a href="<?php echo base_url('assets/img/albums/') . $album->gambar ?>" data-toggle="lightbox" target="_blank">
                    <img src="<?php echo base_url('assets/img/albums/') . $album->gambar ?>" class="img-fluid mb-2" alt="<?= $album->judul ?>" />
                </a>
            </div>
        <?php } ?>

    </div>
</div> <!-- /container -->
<!-- Ekko Lightbox -->
<script src="<?= base_url('assets/templates') ?>/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<script>
    $(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });
    })
</script>