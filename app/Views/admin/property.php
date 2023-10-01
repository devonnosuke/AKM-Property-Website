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

                    <div class="heading-wrapper white row">
                        <div class="col s9 m8 left">
                            <h2 class="header center-on-small-only">
                                <i class="bi bi-house-fill purple-text header-icon"></i> Daftar <span class="table-name">Properti</span>
                            </h2>
                            <h6>Daftar Seluluh Property dari ®️AKM Property.</h6>
                            <hr class="left">
                        </div>
                        <div class="col s3 m4 right">
                            <h2 class="header center-on-small-only">
                                <a href="#add-slider-modal" class="modal-trigger btn btn-large blue waves-effect waves-dark hoverable"><i class="bi bi-plus left"></i> Tambah Properti</a>
                            </h2>
                        </div>
                    </div>

                    <div class="row content content-slider">
                        <?php foreach ($property as $prop) : ?>
                            <div class="col m4 s12 col-sliders-card">
                                <div class="card medium hoverable card-slider">

                                    <div class="card-image">
                                        <img src="<?= base_url() ?>/assets/img/property/<?= $prop->img ?>" class="img-slider">
                                        <span class="card-title center-align flow-text"><?= $prop->type_name ?></span>
                                    </div>

                                    <div class="card-content desc">
                                        <?= cutString($prop->description) ?>
                                    </div>

                                    <div class="card-action center z-depth-1">
                                        <a href="<?= base_url() ?>/admin/property/<?= $prop->id ?>" class="btn orange darken-2 waves-effect waves-dark tooltipped btn-card" data-position="bottom" data-delay="150" data-tooltip="Change"><i class="bi bi-pencil-fill"></i></a>

                                        <button data-href="<?= base_url() ?>/admin/property/<?= $prop->id ?>/<?= $prop->img ?>" class="btn red darken-2 waves-effect waves-dark delete-btn tooltipped" data-tooltip="Delete" data-delay="150" data-position="bottom">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                       
                        <div class="col s12">
                            <p class="grey-text darken-3">Total: <?= count($property) ?> Properti</p>
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
        <form action="<?= base_url() ?>/admin/property/save/true" enctype="multipart/form-data" method="post" class="modal-form">
            <?= csrf_field() ?>
            <div class="row card-panel card-form-modal">
                <h4>Input Informasi Properti</h4>

                <div class="row row-input">
                    <div class="col s12">
                        <div class="input-field">
                            <textarea name="type_name" id="type_name" class="materialize-textarea validate <?= validCheck($validation->getError('type_name')) ?>" data-length="56" maxlength="56"><?= old('type_name') ?></textarea>
                            <label for="type_name" <?= errorMsgCheck($validation->getError('type_name')) ?>>Nama/Tipe Property</label>
                        </div>

                        <div class="input-field">
                            <textarea name="address" id="address" class="materialize-textarea validate <?= validCheck($validation->getError('address')) ?>" data-length="56" maxlength="56"><?= old('address') ?></textarea>
                            <label for="address" <?= errorMsgCheck($validation->getError('address')) ?>>Alamat Properti</label>
                        </div>

                        <div class="input-field">
                            <textarea name="description" id="description" class="materialize-textarea validate <?= validCheck($validation->getError('description')) ?>" data-length="56" maxlength="56"><?= old('description') ?></textarea>
                            <label for="description" <?= errorMsgCheck($validation->getError('description')) ?>>Deskripsi Properti</label>
                        </div>
                    </div>
                    <div class="upload__box">
                        <div class="file-field input-field col s12 upload__btn-box">
                            <div class="btn waves-effect waves-light deep-purple lighten-1 upload__btn">
                                <span>Select Picture</span>
                                <input type="file" multiple data-max_length="20" name="img[]" class="upload__inputfile">
                            </div>
                            <div class="file-path-wrapper">
                                <input type="text" class="file-path img-path validate <?= validCheck($validation->getError('img')) ?>">
                            </div>
                            <span class="err-validation"><?= $validation->getError('img') ?></span>
                        </div>
                        <div class="upload__img-wrap"></div>
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