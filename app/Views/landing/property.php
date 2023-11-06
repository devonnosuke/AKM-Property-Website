<?= $this->extend('landing/templates/base') ?>
<?= $this->section('content') ?>
<section class="portfolio greyen-4">
    <div class="container">

        <div class="heading-text">    
            <h2 class="grey-text text-darken-3 left-align">Properti Kami</h2>
            <div class="left"></div>
        </div>

        <div class="row">
            <?php foreach($properties as $property): ?>
                <div class="col s12 m4">
                    <div class="card card-property"  style="--color-pro: <?= $property->color; ?>">
                        <div class="card-image">
                            <img src="<?= base_url() ?>/assets/img/property/<?= $property->image; ?>">
                            <span class="card-title"><?= $property->type_name; ?></span>
                        </div>
                        <div class="card-content">
                            <p><i class="bi bi-border-outer color-base"></i> <b>Luas Tanah:</b> <?= $property->luas_tanah; ?>m<sup>2</sup></p>
                            <p class="inline"><b>Bebas:</b> 
                                <?php $promo = getPromoByIdPro($property->id) ?>
                                <?php $bebas = explode(',' , $promo['bebas']) ?>
                                <?php foreach ($bebas  as $be) : ?>
                                    <div class="chip small"><i class="bi bi-check-circle left"></i><?= $be; ?></div>
                                <?php endforeach;?>
                            </p>
                            <p class="inline"><b>Bonus:</b> 
                                <?php $promo = getPromoByIdPro($property->id) ?>
                                <?php $bonus = explode(',' , $promo['bonus']) ?>
                                <?php foreach ($bonus  as $bo) : ?>
                                    <div class="chip small"><i class="bi bi-check-circle left"></i><?= $bo; ?></div>
                                <?php endforeach;?>
                            </p>
                        </div>
                        <div class="card-action">
                            <a href="<?= base_url(); ?>/properti/<?= $property->slug; ?>" class="btn btn medium bg-btn waves-effect waves-dark">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?= $this->include('landing/section_wa') ?>
<?= $this->endSection() ?>