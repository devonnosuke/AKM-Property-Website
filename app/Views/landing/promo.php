<?= $this->extend('landing/templates/base') ?>
<?= $this->section('content') ?>
<section class="portfolio greyen-4">
    <div class="container">

        <div class="heading-text">    
            <h2 class="grey-text text-darken-3 left-align">Promo Terbatas!</h2>
            <div class="left"></div>
        </div>

        <div class="row">
            <?php foreach($promo as $pro): ?>
                <div class="col s12 m4">
                    <div class="card card-property">
                        <div class="card-image">
                            <img src="<?= base_url() ?>/assets/img/promo/<?= $pro->brosur; ?>">
                            <span class="card-title"><?= $pro->nama_promo; ?></span>
                        </div>
                        <div class="card-content">
                            <p><i class="bi bi-geo-alt-fill color-base"></i><b>Alamat:</b> <?= $pro->promo; ?></p>
                            <p><i class="bi bi-border-outer color-base"></i> <b>LT:</b> <?= $pro->bonus; ?>m<sup>2</sup> | <i class="bi bi-border-style color-base"></i> LB: <?= $pro->bebas; ?></p>
                            <p><i class="bi bi-list-columns-reverse color-base"></i> <b>Deskripsi:</b> <?= $pro->bebas; ?></p>
                            <p><i class="bi bi-door-open-fill color-base"></i> <b>Fasilitas:</b> <?= $pro->deskripsi; ?></p>
                        </div>
                        <div class="card-action">
                            <a href="<?= base_url(); ?>/promo/<?= $pro->slug; ?>" class="btn btn medium bg-btn waves-effect waves-dark">Cek Promo</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?= $this->include('landing/section_wa') ?>
    </div>
</section>
<?= $this->endSection() ?>