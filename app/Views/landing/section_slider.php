<!-- *** Slider Section ***-->
<div class="slider">
    <ul class="slides">
        <?php foreach ($sliders as $slide) : ?>
            <li>
                <img src="<?= base_url() ?>/assets/img/slider/<?= $slide->img ?>" alt="<?= $slide->tagline ?>">
                <div class="caption <?= $slide->align ?>-align">
                    <h1 class="light"><?= $slide->tagline ?></h1>
                    <h5 class="light grey-text text-lighten-3">"<?= $slide->description ?>"</h5>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>