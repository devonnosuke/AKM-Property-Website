<?= $this->extend('admin/templates/index') ?>

<?= $this->section('main') ?>

<main>
    <div class="section">
        <div class="row">
            <div class="col s12 m9 right main-wrapper">
                <div class="menu-wraper text-color">

                    <?= showAlert(session()->getFlashdata('alert')) ?>
                    <?= showModalValidation(session()->getFlashdata('showModal')) ?>
                    <span class="flash-data" data-flashdata="" data-type="Tagline"></span>

                    <div class="heading-wrapper white">
                        <h2 class="header center-on-small-only">
                            <i class="bi bi-collection-fill purple-text header-icon"></i> My <span class="table-name">Slider</span>s
                        </h2>
                        <h6>Sliders are useful for displaying slogans, quotes or product advantages for marketing needs.</h6>
                        <hr class="left">
                    </div>

                    <div class="row content content-slider">
                        <?php foreach ($sliders as $slide) : ?>
                            <div class="col m4 s12 col-sliders-card">
                                <div class="card medium hoverable card-slider">

                                    <div class="card-image">
                                        <img src="<?= base_url() ?>/assets/img/slider/<?= $slide->img ?>" class="img-slider">
                                        <span class="card-title <?= $slide->align ?>-align flow-text"><?= $slide->tagline ?></span>
                                    </div>

                                    <div class="card-content">
                                        <?= $slide->description ?>
                                    </div>

                                    <div class="card-action center z-depth-1">
                                        <a href="<?= base_url() ?>/admin/sliders/<?= $slide->id ?>" class="btn orange darken-2 waves-effect waves-dark tooltipped btn-card" data-position="bottom" data-delay="150" data-tooltip="Change"><i class="bi bi-pencil-fill"></i></a>

                                        <button data-href="<?= base_url() ?>/admin/sliders/<?= $slide->id ?>/<?= $slide->img ?>" class="btn red darken-2 waves-effect waves-dark delete-btn tooltipped" data-tooltip="Delete" data-delay="150" data-position="bottom">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="col s12 center">
                            <a href="#add-slider-modal" class="modal-trigger btn btn-large blue waves-effect waves-dark hoverable"><i class="bi bi-plus left"></i> Add Slider</a>
                        </div>
                        <div class="col s12">
                            <p class="grey-text darken-3">Total: <?= count($sliders) ?> Sliders</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
<!-- Modal Structure -->
<div class="modal" id="add-slider-modal">
    <div class="modal-content contact-content">
        <form action="<?= base_url() ?>/admin/sliders/save/true" enctype="multipart/form-data" method="post" class="modal-form">
            <?= csrf_field() ?>
            <div class="row card-panel card-form-modal">
                <h4>Slider Information</h4>

                <div class="row row-input">
                    <div class="col s12 m6">
                        <div class="input-field">
                            <textarea name="tagline" id="tagline" class="materialize-textarea validate <?= validCheck($validation->getError('tagline')) ?>" data-length="56" maxlength="56"><?= old('tagline') ?></textarea>
                            <label for="tagline" <?= errorMsgCheck($validation->getError('tagline')) ?>>Tagline</label>
                        </div>

                        <div class="input-field">
                            <textarea name="description" id="description" class="materialize-textarea validate <?= validCheck($validation->getError('description')) ?>" data-length="56" maxlength="56"><?= old('description') ?></textarea>
                            <label for="description" <?= errorMsgCheck($validation->getError('description')) ?>>Slogan</label>
                        </div>
                    </div>
                    <div class="col s12 m6">
                        <h5>Slider description</h5>
                        <img src="<?= base_url() ?>/assets/img/example.png" class="materialboxed help-pic">
                    </div>

                    <div class="col s12">
                        <div class="row input-radio">
                            <h5>Text Aligment</h5>
                            <div class="col s6 m2">
                                <p>
                                    <input type="radio" class="with-gap" name="align" value="left" id="left" required <?= radioCheck('left', old('align')) ?>>
                                    <label for="left">Left</label>
                                </p>
                            </div>
                            <div class="col s6 m2">
                                <p>
                                    <input type="radio" class="with-gap" name="align" value="center" id="center" required <?= radioCheck('center', old('align')) ?>>
                                    <label for="center">Center</label>
                                </p>
                            </div>
                            <div class="col s12 m2">
                                <p>
                                    <input type="radio" class="with-gap" name="align" value="right" id="right" required <?= radioCheck('right', old('align')) ?>>
                                    <label for="right">Right</label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="input-field col m3 s12">
                        <div class="card-panel card-thumb z-depth-2">
                            <img src="<?= base_url() ?>/assets/img/noimg.png" class="thumb-pic img-preview materialboxed">
                        </div>
                    </div>
                    <div class="file-field input-field col m9 s12">
                        <div class="btn waves-effect waves-light deep-purple lighten-1">
                            <span>Select Picture</span>
                            <input type="file" name="img" accept="image/*" id="img" onchange="previewImg()">
                        </div>
                        <div class="file-path-wrapper">
                            <input type="text" class="file-path img-path validate">
                        </div>
                        <span class="err-validation"><?= $validation->getError('img') ?></span>
                    </div>
                </div>
            </div>

            <div class="modal-footer col s12 white z-depth-1">
                <div class="row modal-button">
                    <div class="col s6 center">
                        <a class="modal-action btn-flat waves-effect waves-red modal-close">Cancel</a>
                    </div>
                    <div class="col s6 center">
                        <button type="submit" class="modal-action btn-flat waves-effect waves-green">
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