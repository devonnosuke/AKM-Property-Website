<!-- *** Slider Section ***-->
<div class="slider slider-promo">
    <ul class="slides">
        <?php foreach ($sliders as $slide) : ?>
            <li>
                <img src="<?= base_url() ?>/assets/img/slider/<?= $slide->img ?>" alt="<?= $slide->tagline ?>">
                <div class="caption <?= $slide->align ?>-align">
                    <h1 class="promo"><span>Promo!</span> Nama Promo</h1>
                    <h2 class="white-text info">Potongan harga biaya</h2>
                    <div>
                        <h3>Nama Properti</h3>
                        <span style="display: block; font-size: 1.5rem">- Bebas poin 1</span>
                        <span style="display: block; font-size: 1.5rem">- Bebas poin 2</span>
                        <span style="display: block; font-size: 1.5rem">- Gratis poin 1, Poin 2</span>
                        <span style="display: block; font-size: 1.5rem">- Dll...</span>
                    </div>
                    <a href="#" class="btn more btn-large green waves-effect waves-light z-depth-0 modal-trigger">Cek Sekarang!</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>