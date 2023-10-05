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
                            <i class="bi bi-collection-fill purple-text header-icon"></i> Change slider
                        </h2>
                        <h6>Change the slider information that has been created.</h6>
                        <hr class="left">
                    </div>

                    <div class="row content">
                        <div class="card-panel cf">
                            <div class="col s12">
                                <form action="<?= base_url() ?>/admin/property/save" enctype="multipart/form-data" method="post" class="modal-form">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="id" value="<?= $property->id ?>">
                                    <input type="hidden" name="old_img" value="<?= $property->image ?>">
                                    <h4>Edit Properti</h4>
                                    <div class="row row-input">
                                        <div class="col s12">
                                            <div class="input-field">
                                                <textarea name="type_name" id="type_name" class="materialize-textarea validate <?= validCheck($validation->getError('type_name')) ?>" data-length="56" maxlength="56"><?= oldCheck('type_name', $property->type_name) ?></textarea>
                                                <label for="type_name" class="txtarea-label" <?= errorMsgCheck($validation->getError('type_name')) ?>>Nama/Tipe Property</label>
                                            </div>
                                            <div class="input-field">
                                                <textarea name="address" id="address" class="materialize-textarea validate <?= validCheck($validation->getError('address')) ?>" data-length="56" maxlength="56"><?= oldCheck('address', $property->address) ?></textarea>
                                                <label for="address" class="txtarea-label" <?= errorMsgCheck($validation->getError('address')) ?>>Alamat Properti</label>
                                            </div>
                                            <div class="input-field">
                                                <textarea name="description" id="description" class="materialize-textarea validate <?= validCheck($validation->getError('description')) ?>" data-length="56" maxlength="56"><?= oldCheck('description', $property->description) ?></textarea>
                                                <label for="description" class="txtarea-label" <?= errorMsgCheck($validation->getError('description')) ?>>Deskripsi Properti</label>
                                            </div>
                                        </div>

                                        <div class="col s12 m4 img-input">
                                            <div class="card-panel card-image card-thumb z-depth-2 material-placeholder">
                                                <img class="profile-pic img-preview materialboxed" src="<?= base_url() ?>/assets/img/property/<?= $property->image ?>">
                                            </div>
                                        </div>

                                        <div class="file-field input-field col s12 m8">
                                            <div class="btn waves-effect waves-light deep-purple lighten-1">
                                                <span>Select Picture</span>
                                                <input type="file" name="image" accept="image/*" id="img" onchange="previewImg()">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input type="text" class="file-path img-path validate">
                                            </div>
                                            <?= $validation->getError('image') ?>
                                        </div>                                        
                                    </div>

                                    <div class="modal-footer edit">
                                        <div class="row modal-button">
                                            <div class="col m6 s12 center">
                                                <a href="<?= base_url() ?>/admin/property" class="modal-action btn-flat waves-effect waves-red back-btn"><i class="bi bi-x left"></i>Cancel</a>
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
</main>
<?= $this->endSection() ?>