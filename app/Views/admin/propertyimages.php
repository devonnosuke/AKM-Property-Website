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
                            <i class="bi bi-images purple-text header-icon"></i> <span class="table-name">Property : <?= $property->type_name; ?></span>
                        </h2>
                        <h6>A place to save photos, images or screenshots for portfolios.</h6>
                        <hr class="left">
                    </div>

                    <div class="row content">

                        <div class="card-panel gal-panel z-depth-1">

                            <!-- <h4 class="center title-gal">Images and Youtube Videos</h4> -->

                            <div class="row">
                                <?php if (!$propertyImages) : ?>
                                    <div class="col s12 center center-align empty-alert">
                                        <h1><i class="bi bi-exclamation-triangle"></i></h1>
                                        <h5>Images empty.</h5>
                                    </div>
                                <?php endif; ?>
                                <?php foreach ($propertyImages as $p) : ?>
                                    <div class="col m3 s12 div-portfolio">
                                        <div class="card small hoverable">
                                            <div class="card-image card-gal material-placeholder">
                                                <img src="<?= base_url() ?>/assets/img/property/<?= $p->image_name ?>" data-caption="<?= $property->type_name ?>" class="responsive-img image-portfolio materialboxed">
                                            </div>
                                        </div>
                                        <button data-href="<?= base_url() ?>/admin/propertyimage/<?= $p->image_name ?>" class="btn-floating waves-effect waves-dark red del-gal delete-btn tooltipped" data-tooltip="Delete" data-delay="150" data-position="bottom">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </div>
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
                            </div>

                            <div class="card-footer">
                                <p class="grey-text darken-3">Total: <b><?= count($propertyImages) ?> Gambar</b> dari Properti <b><?= $property->type_name; ?></b></p>
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

        <form action="<?= base_url() ?>/admin/propertyimage/save" method="POST" enctype="multipart/form-data" class="modal-form">
            <?= csrf_field() ?>
            <input type="hidden" name="id_property" value="<?= $property->id; ?>">
            <div class="row card-panel card-form-modal">

                <h4>Add Picture</h4>

                <!-- <div class="input-field col m3 s12">
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
                </div> -->

                <div class="upload__box">
                        <div class="file-field input-field col s12 upload__btn-box">
                            <div class="btn waves-effect waves-light deep-purple lighten-1 upload__btn">
                                <span>Select Picture</span>
                                <input type="file" multiple data-max_length="20" name="img[]" class="upload__inputfileonly">
                            </div>
                            <div class="file-path-wrapper hidee">
                                <input type="text" class="file-path img-path validate <?= validCheck($validation->getError('img')) ?>">
                            </div>
                            <span class="err-validation"><?= $validation->getError('img') ?></span>
                        </div>
                        <div class="upload__img-wrap"></div>
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

<?= $this->endSection() ?>