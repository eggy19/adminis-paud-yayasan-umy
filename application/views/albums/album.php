<div class="container">
    <section class="row">

        <?php
        foreach ($album as $i) { ?>

            <article class="col-xs-12 col-sm-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="<?php echo base_url() . 'assets/img/albums/' . $i->id ?>" judul="<?php echo $i->judul ?>" class="zoom">
                            <img class="thumb" src="<?php echo base_url() .  'assets/img/albums/' . $i->gambar ?>" alt="<?php echo $i->judul ?>" />
                            <span class="overlay">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </div>
                    <div class="panel-footer">
                        <h4><a href="<?php echo base_url() . 'album/' . $i->id ?>" judul="<?php echo $i->judul ?>"><?php echo $i->judul ?></a></h4>
                        <span style="float: right">
                            <a class="btn btn-default btn-xs" href="<?php echo base_url() . 'albums/album/edit/' . $i->id ?>" aria-label="Edit">
                                <i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>
                            </a>
                            <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'albums/album/deactivate/' . $i->id ?>" aria-label="Delete">
                                <i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
                            </a>
                        </span>
                    </div>
                </div>
            </article>
        <?php } ?>


    </section>
</div>


<script>
    // maintain height == width of thumbnail
    var imgWidth = $('.panel-body').width();
    $('.thumb').css({
        'height': imgWidth + 'px'
    });
</script>