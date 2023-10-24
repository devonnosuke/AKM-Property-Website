<!-- *** Slider Section ***-->
<div class="slider slider-promo">
    <ul class="slides">
        <?php foreach ($promos as $promo) : ?>
            <li>
                <img src="<?= base_url() ?>/assets/img/promo/<?= $promo->brosur ?>" alt="<?= $promo->slug ?>">
                <div class="caption left-align">
                    <h1 class="promo"><span>Promo!</span> <?= $promo->nama_promo ?></h1>
                    <h2 class="white-text info">Promo <?= $promo->promo ?></h2>
                    <div>
                        <h3>sdasd</h3>
                        <?php $bonus = splitString($promo->bonus, ',') ?>
                        <?php foreach($bonus as $bon): ?>
                            <span style="display: block; font-size: 1.5rem">- Bonus <?= $bon; ?></span>
                        <?php endforeach; ?>

                        <?php $bebas = splitString($promo->bebas, ',') ?>
                        <?php foreach($bebas as $be): ?>
                            <span style="display: block; font-size: 1.5rem">- Gratis <?= $be; ?></span>
                        <?php endforeach; ?>
                        <span style="display: block; font-size: 1.5rem">- Dll...</span>
                    </div>
                    <a href="#" class="btn more btn-large green waves-effect waves-light z-depth-0 modal-trigger">Cek Sekarang!</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>