<?= $this->extend('landing/templates/base') ?>
<?= $this->section('content') ?>
<section class="portfolio greyen-4">
    <div class="container">

        <div class="heading-text">    
            <h2 class="grey-text text-darken-3 left-align">Proyek Kami</h2>
            <div class="left"></div>
        </div>

        <div class="row">
            <?php foreach($properties as $property): ?>
                <div class="col s12 m4">
                    <div class="card card-property">
                        <div class="card-image">
                            <img src="<?= base_url() ?>/assets/img/property/<?= $property->image; ?>">
                            <span class="card-title"><?= $property->type_name; ?></span>
                        </div>
                        <div class="card-content">
                            <p><i class="bi bi-geo-alt-fill color-base"></i><b>Alamat:</b> <?= $property->address; ?></p>
                            <p><i class="bi bi-border-outer color-base"></i> <b>LT:</b> <?= $property->luas_tanah; ?>m<sup>2</sup> | <i class="bi bi-border-style color-base"></i> LB: <?= $property->luas_bangunan; ?></p>
                            <p><i class="bi bi-list-columns-reverse color-base"></i> <b>Deskripsi:</b> <?= $property->description; ?></p>
                            <p><i class="bi bi-door-open-fill color-base"></i> <b>Fasilitas:</b> <?= $property->features; ?></p>
                        </div>
                        <div class="card-action">
                            <a href="<?= base_url(); ?>/properti/<?= $property->slug; ?>" class="btn btn medium bg-btn waves-effect waves-dark">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?= $this->include('landing/section_wa') ?>
    </div>
</section>
<?= $this->endSection() ?>