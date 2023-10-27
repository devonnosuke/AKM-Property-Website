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
                        <h3><?= $promo->type_name ?></h3>
                        <?php $bebas = splitString($promo->bebas, ',') ?>
                        <?php $bebas = array_slice($bebas, 0, 3) ?>
                        <?php $bebas = implode(", ", $bebas) ?>
                        <span style="display: block; font-size: 1.5rem">- Bebas <?= $bebas; ?></span>
                        
                        <?php $bonus = splitString($promo->bonus, ',') ?>
                        <?php $bebas = array_slice($bonus, 0, 3) ?>
                        <?php $bonus = implode(", ", $bonus) ?>
                        <span style="display: block; font-size: 1.5rem">- Bonus 
                            <?= $bonus; ?>
                        </span>

                        <span style="display: block; font-size: 1.5rem">- Dll...</span>
                    </div>
                    <a href="<?= base_url() ?>/promo/<?= $promo->slug ?>" class="btn more btn-large green darken-2 waves-effect waves-light z-depth-0 modal-trigger">Cek Sekarang!</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>