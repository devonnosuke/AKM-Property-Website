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
                <div class="col s12 m4"   style="--color-pro: var(--color)">
                    <div class="card card-property">
                        <div class="card-image">
                            <img src="<?= base_url() ?>/assets/img/promo/<?= $pro->brosur; ?>">
                            <span class="card-title"><?= $pro->nama_promo; ?></span>
                        </div>
                        <div class="card-content">
                            <p class="inline"><b>Bebas:</b>
                                <?php $bebas = getPromoByIdPro($pro->id_property) ?>
                                <?php $bebas = explode(',' , $bebas['bebas']) ?>
                                <?php foreach ($bebas  as $be) : ?>
                                    <div class="chip small"><i class="bi bi-check-circle left"></i><?= $be; ?></div>
                                <?php endforeach;?>
                            </p>
                            <p class="inline"><b>Bonus:</b> 
                                <?php $bonus = getPromoByIdPro($pro->id_property) ?>
                                <?php $bonus = explode(',' , $bonus['bonus']) ?>
                                <?php foreach ($bonus  as $bo) : ?>
                                    <div class="chip small"><i class="bi bi-check-circle left"></i><?= $bo; ?></div>
                                <?php endforeach;?>
                            </p>
                        </div>
                        <div class="card-action">
                            <a href="<?= base_url(); ?>/promo/<?= $pro->slug; ?>" class="btn btn medium bg-btn waves-effect waves-dark">Cek Promo</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?= $this->include('landing/section_wa') ?>
<?= $this->endSection() ?>