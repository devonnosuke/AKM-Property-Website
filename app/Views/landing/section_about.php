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
                <div class="card medium hoverable">
                    <div class="card-image waves-effect waves-light waves-block">
                    <img src="<?= base_url(); ?>/assets/img/property/<?= $property->image; ?>" class="activator">
                    </div>
                    <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4 truncate"><?= $property->type_name; ?><i class="material-icons">more_vert</i></span>
                    <p>Alamat: <?= $property->address; ?></p>
                    <p>Lt/lb: <?= $property->luas_tanah; ?>, <?= $property->luas_bangunan; ?></p>
                    <a href="<?= base_url(); ?>/properti/<?= $property->slug; ?>">Lihat Selengkapnya</a>
                    </div>
                    <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4"><?= $property->type_name; ?> <i class="material-icons right">close</i></span>
                        <h6>Deskripsi:</h6>
                        <p><span><?= $property->description; ?></span></p>
                        <p>Pondasi: <span><?= $property->pondasi; ?></span></p>
                        <p>dinding: <span><?= $property->dinding; ?></span></p>
                        <p>Atap: <span><?= $property->atap; ?></span></p>
                        <p>Plafon: <span><?= $property->plafon; ?></span></p>
                        <p>Listrik: <span><?= $property->listrik; ?></span></p>
                        <p>Lantai: <span><?= $property->lantai; ?></span></p>
                        <p>Kusen: <span><?= $property->kusen; ?></span></p>
                        <p>Kloset: <span><?= $property->kloset; ?></span></p>
                        <p><a href="<?= base_url(); ?>/properti/<?= $property->slug; ?>">Lihat Properti selengkapnya</a></p>
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
</section>