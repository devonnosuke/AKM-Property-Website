<?= $this->extend('landing/templates/base') ?>
<?= $this->section('content') ?>
<!-- *** Portfolio Section *** -->
<div class="mini-preloader">
    <div class="card-panel mini-loading z-depth-2">
        <div class="preloader-wrapper extra-small active">
            <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="portfolio greyen-4 scrollspy" id="portfolio">
    <div class="container">
        <h1 class="header center cyan-text text-darken-1">My Portfolio</h1>
        <div class="row center">
            <h5 class="header col s12">A place of my photos, images or screenshots for portfolios.</h5>
        </div>
        <div class="row">
            <?php foreach ($portfolio as $folio) : ?>
                <!-- display image if image -->
                <?php if ($folio->type == 'image') : ?>
                    <div class="col m3 s12 div-portfolio">
                        <div class="card small hoverable">
                            <div class="card-image material-placeholder">
                                <img src="<?= base_url() ?>/assets/img/gallery/pic/<?= $folio->file_name ?>" data-caption="<?= $folio->captions ?>" class="responsive-img image-portfolio materialboxed" alt="<?= $folio->captions ?>">
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <!-- display Youtube Videos if type is video -->
                    <div class="col m3 s12 div-portfolio">
                        <div class="card small hoverable">
                            <div class="video-container">
                                <iframe src="https://www.youtube.com/embed/<?= $folio->file_name ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>