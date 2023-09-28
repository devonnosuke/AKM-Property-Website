<?= $this->extend('admin/templates/index') ?>

<?= $this->section('main') ?>
<main>
    <div class="section">
        <div class="row">
            <div class="col s12 m9 right main-wrapper">
                <div class="menu-wraper text-color">

                    <?= showAlert(session()->getFlashdata('alert')) ?>
                    <?= showModalValidation(session()->getFlashdata('showModal')) ?>

                    <div class="heading-wrapper white">
                        <h2 class="header center-on-small-only">
                            <i class="bi bi-images purple-text header-icon"></i> <span class="table-name">Portfolio</span>
                        </h2>
                        <h6>A place to save photos, images or screenshots for portfolios.</h6>
                        <hr class="left">
                    </div>

                    <div class="row content">

                        <div class="card-panel gal-panel z-depth-1">

                            <h4 class="center title-gal">Images and Youtube Videos</h4>

                            <div class="row">
                                <?php if (!$portfolio) : ?>
                                    <div class="col s12 center center-align empty-alert">
                                        <h1><i class="bi bi-exclamation-triangle"></i></h1>
                                        <h5>Image or Videos empty.</h5>
                                    </div>
                                <?php endif; ?>
                                <?php foreach ($portfolio as $p) : ?>
                                    <?php if ($p->type == 'image') : ?>
                                        <div class="col m3 s12 div-portfolio">
                                            <div class="card small hoverable">
                                                <div class="card-image card-gal material-placeholder">
                                                    <img src="<?= base_url() ?>/assets/img/gallery/pic/<?= $p->file_name ?>" data-caption="<?= $p->captions ?>" class="responsive-img image-portfolio materialboxed">
                                                </div>
                                            </div>
                                            <button data-href="<?= base_url() ?>/admin/portfolio/<?= $p->id ?>/<?= $p->file_name ?>" class="btn-floating waves-effect waves-dark red del-gal delete-btn tooltipped" data-tooltip="Delete" data-delay="150" data-position="bottom">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </div>

                                    <?php else : ?>
                                        <!-- display Youtube Videos if type is video -->
                                        <div class="col m3 s12 div-portfolio">
                                            <div class="card small hoverable">
                                                <div class="video-container">
                                                    <iframe src="https://www.youtube.com/embed/<?= $p->file_name ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                            <button data-href="<?= base_url() ?>/admin/portfolio/<?= $p->id ?>" class="btn-floating waves-effect waves-dark red del-gal delete-btn tooltipped" data-tooltip="Delete" data-delay="150" data-position="bottom">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <!-- This a add button to add images or videos -->
                                <div class="col m3 s12 div-portfolio">
                                    <div class="card small hoverable add-btn">
                                        <a href="#modal-picture" class="btn btn-flat add waves-effect waves-purple modal-trigger">
                                            <i class="bi bi-plus-lg"></i>
                                            <i class="bi bi-image header-icon"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col m3 s12 div-portfolio">
                                    <div class="card small hoverable add-btn">
                                        <a href="#modal-video" class="btn btn-flat add waves-effect waves-purple modal-trigger">
                                            <i class="bi bi-plus-lg"></i>
                                            <i class="bi bi-film header-icon"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>


                            <div class="card-footer">

                                <p class="grey-text darken-3">Total: <?= count($portfolio) ?> Portfolio</p>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Image Modal -->
<div class="modal" id="modal-picture">
    <div class="modal-content contact-content">

        <form action="<?= base_url() ?>/admin/portfolio_save" method="POST" enctype="multipart/form-data" class="modal-form">
            <?= csrf_field() ?>
            <input type="hidden" name="type" value="image">
            <div class="row card-panel card-form-modal">

                <h4>Add Picture</h4>

                <div class="input-field col m3 s12">
                    <div class="card-panel card-thumb z-depth-2">
                        <img src="<?= base_url() ?>/assets/img/noimg.png" class="portfolio-view img-preview materialboxed">
                    </div>
                </div>

                <div class="file-field input-field col m7 s12">
                    <div class="btn waves-effect waves-light deep-purple lighten-1">
                        <span>Select Image</span>
                        <input type="file" name="file_name" accept="image/*" id="img" onchange="previewImg()" required>
                    </div>
                    <div class="file-path-wrapper">
                        <input type="text" class="file-path img-path validate">
                    </div>
                </div>

                <div class="input-field col m7 s12">
                    <i class="bi bi-images prefix form-icon-modal"></i>
                    <input type="text" name="captions" id="pic-captions" class="validate" required>
                    <label for="pic-captions">Caption</label>
                </div>

            </div>

            <div class="modal-footer col s12 white z-depth-1">
                <div class="row modal-button">
                    <div class="col s6 center">
                        <a class="modal-action btn-flat waves-effect waves-red modal-close">Cancel</a>
                    </div>
                    <div class="col s6 center">
                        <button type="submit" class="btn-submit-modal modal-action btn-flat waves-effect waves-green">
                            <span class="btn-text">Save</span>
                            <img src="<?= base_url() ?>/loading.webp" class="loading-icon-modal">
                        </button>
                    </div>
                </div>
            </div>

        </form>

    </div>

</div>
<!-- Video Modal -->
<div class="modal modal-small" id="modal-video">
    <div class="modal-content contact-content">

        <form action="<?= base_url() ?>/admin/portfolio_save" method="POST" enctype="multipart/form-data" class="modal-form">
            <?= csrf_field() ?>
            <input type="hidden" name="type" value="video">

            <div class="row card-panel card-form-panel">

                <h4>Add YouTube Video link</h4>

                <div class="input-field col s12">

                    <i class="bi bi-youtube prefix form-icon-modal"></i>

                    <input type="text" name="file_name" id="vid-label" class="validate" required>

                    <label for="vid-label">Youtube video id </label>

                </div>
                <div class="input-field col s12">

                    <i class="bi bi-chat-right-quote-fill prefix form-icon-modal"></i>

                    <input type="text" name="captions" id="vid-caption" class="validate" required>

                    <label for="vid-caption">Vieo Caption</label>

                </div>
                <p>For example, Youtube links is: <br> https://www.youtube.com/watch?v=<b>1HDnwrxXCZk</b> <br>
                    The Youtube video id is = <b>1HDnwrxXCZk</b>
                </p>
            </div>

            <div class="modal-footer col s12 white z-depth-1">
                <div class="row modal-button">
                    <div class="col s6 center">
                        <a class="modal-action btn-flat waves-effect waves-red modal-close">Cancel</a>
                    </div>
                    <div class="col s6 center">
                        <button type="submit" class="btn-submit-modal modal-action btn-flat waves-effect waves-green">
                            <span class="btn-text">Save</span>
                            <img src="<?= base_url() ?>/loading.webp" class="loading-icon-modal">
                        </button>
                    </div>
                </div>
            </div>

        </form>

    </div>

</div>

<?= $this->endSection() ?>