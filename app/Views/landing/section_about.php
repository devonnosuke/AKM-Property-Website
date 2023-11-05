<!-- *** About Us Section *** -->
<section id="about" class="about property scrollspy">
    <div class="container">
        
        <div class="heading-text">    
            <h2 class="light grey-text text-darken-3 left-align">Properti Kami</h2>
            <div class="left"></div>
        </div>
   
        <div class="row services">
            <?php foreach ($properties as $property) : ?>
            <div class="col m4 s12 services">
                <div class="card hoverable">
                    <div class="card-image waves-effect waves-light waves-block">
                        <a href="<?= base_url(); ?>/properti/<?= $property->slug; ?>">
                        <img src="<?= base_url(); ?>/assets/img/property/<?= $property->image; ?>">
                        </a>
                    </div>
                    <div class="card-content" style="--color-pro:<?= $property->color; ?>">
                        <span class="card-title grey-text text-darken-4 truncate"><?= $property->type_name; ?></span>
                        <p>Luas Tanah: <?= $property->luas_tanah; ?>m<sup>2</sup> </p>
                        <?php $facilities = explode(',',$property->features) ?>
                        <p>Fasilitas: 
                        <?php foreach ($facilities as $fac) : ?>
                            <div class="chip small"><i class="bi bi-check-circle left"></i><?= $fac; ?></div>
                        <?php endforeach; ?>
                        </p>
                        <a href="<?= base_url(); ?>/properti/<?= $property->slug; ?>">Lihat Selengkapnya</a>
                    </div>
                    
                </div>
            </div>
            <?php endforeach; ?>
        
            <div class="col m4 s12 services">
                <div class="card-panel bg-nav waves-effect waves-light">
                    <a href="<?= base_url() ?>/properti">
                        <div class="wrapper">
                            <i class="bi bi-arrow-right-square-fill white-text"></i>
                            <span class="white-text">Lainya...</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>