<?= $this->extend('admin/templates/index') ?>

<?= $this->section('main') ?>

<main>
    <div class="section">
        <div class="row">
            <div class="col s12 m9 right main-wrapper">
                <div class="menu-wraper text-color">
                    <span class="flash-data" data-flashdata="" data-type="Tagline"></span>

                    <div class="heading-wrapper white">
                        <h2 class="header center-on-small-only">
                            <i class="bi bi-collection-fill purple-text header-icon"></i> Change Service
                        </h2>
                        <h6>Change the service information that has been created.</h6>
                        <hr class="left">
                    </div>

                    <div class="row content">
                        <div class="card-panel cf">
                            <div class="col s12">
                                <form action="<?= base_url() ?>/admin/service/save" enctype="multipart/form-data" method="post" class="modal-form">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="id" value="<?= $service->id ?>">
                                    <input type="hidden" name="old_img" value="<?= $service->img ?>">
                                    <input type="hidden" class="feature-field" name="features" data-feature="<?= oldCheck('features', $service->features) ?>" data-status="true">
                                    <h4>Change Service Information</h4>
                                    <div class="row row-input">
                                        <div class="col s12">
                                            <div class="input-field">
                                                <textarea name="name" id="name" class="materialize-textarea validate <?= validCheck($validation->getError('name')) ?>" data-length="56" maxlength="56"><?= oldCheck('name', $service->name) ?></textarea>
                                                <label for="name" class="txtarea-label" <?= errorMsgCheck($validation->getError('name')) ?>>Service name</label>
                                            </div>
                                            <div class="input-field">
                                                <textarea name="description" id="description" class="materialize-textarea validate <?= validCheck($validation->getError('description')) ?>" data-length="450" maxlength="450"><?= oldCheck('description', $service->description) ?></textarea>
                                                <label for="description" class="txtarea-label" <?= errorMsgCheck($validation->getError('description')) ?>>Description</label>
                                            </div>
                                            <div class="input-field">
                                                <label for="features" class="active chips-label">Features <i>Click Enter after fill features</i> </label>
                                                <div class="chips chips-placeholder focus <?= validCheck($validation->getError('features')) ?>">
                                                </div>
                                                <span class="err-validation"><?= $validation->getError('features') ?></span>
                                            </div>
                                        </div>
                                        <div class="col s12 m4 img-input">
                                            <div class="card-panel card-thumb z-depth-2">
                                                <img class="profile-pic img-preview materialboxed" src="<?= base_url() ?>/assets/img/services/<?= $service->img ?>">
                                            </div>
                                        </div>
                                        <div class="file-field input-field col m8 s12">
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
                                    <div class="modal-footer edit">
                                        <div class="row modal-button">
                                            <div class="col m6 s12 center">
                                                <a href="<?= base_url() ?>/admin/services" class="modal-action btn-flat waves-effect waves-red back-btn"><i class="bi bi-x left"></i>Cancel</a>
                                            </div>
                                            <div class="col m6 s12 center">
                                                <button type="submit" class="modal-action btn-submit btn-flat waves-effect waves-green">
                                                    <span class="btn-text"><i class="bi bi-check left"></i>Save</span>
                                                    <img src="<?= base_url() ?>/loading.webp" class="loading-icon-modal">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
<?= $this->endSection() ?>