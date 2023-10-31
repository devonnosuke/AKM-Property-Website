<!-- *** Slider Section ***-->
<div class="slider slider-promo">
    <ul class="slides">
        <?php foreach ($promos as $promo) : ?>
            <li>
                <img src="<?= base_url() ?>/assets/img/property/<?= $promo->image ?>" alt="<?= $promo->slug ?>">
                <div class="caption left-align">
                    <h1 class="promo"><span>Promo!</span> <?= $promo->nama_promo ?></h1>
                    <h2 class="white-text info">Harga Jual <?= rupiah($promo->harga_jual) ?></h2>
                    <div>
                        <h3><?= $promo->type_name ?></h3>
                        <?php $bebas = splitString($promo->bebas, ',') ?>
                        <?php $bebas = array_slice($bebas, 0, 4) ?>
                        <span>Bebas : 
                        <?php foreach ($bebas as $beb) : ?>
                            <div class="chip"><i class="bi bi-check-circle left"></i><?= $beb; ?></div>
                        <?php endforeach; ?>
                        </span>
                                
                        <?php $bonus = splitString($promo->bonus, ',') ?>
                        <?php $bonus = array_slice($bonus, 0, 4) ?>
                        <span>Bonus : 
                        <?php foreach ($bonus as $bon) : ?>
                            <div class="chip"><i class="bi bi-check-circle left"></i><?= $bon; ?></div>
                        <?php endforeach; ?>
                        </span>
                        
                 

                        <span>- Dll...</span>
                    </div>
                    <a href="<?= base_url() ?>/promo/<?= $promo->slug ?>" class="btn more btn-large green darken-2 waves-effect waves-light z-depth-0 modal-trigger">Cek Sekarang!</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>