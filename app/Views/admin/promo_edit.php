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
                            <i class="bi bi-collection-fill purple-text header-icon"></i> Edit Promo
                        </h2>
                        <h6>Change the slider information that has been created.</h6>
                        <hr class="left">
                    </div>

                    <div class="row content">
                        <div class="card-panel cf">
                            <div class="col s12">
                                <form action="<?= base_url() ?>/admin/promo/save" enctype="multipart/form-data" method="post" class="modal-form">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="id" value="<?= $promo->id ?>">
                                    <input type="hidden" name="old_brosur" value="<?= $promo->brosur ?>">
                                    <input type="hidden" name="slug" value="<?= $promo->slug ?>">
                                    <input type="hidden" name="id_property" value="<?= $promo->id_property ?>">

                                    <h4>Edit Promo</h4>

                                    <input type="hidden" class="input-bebas" name="bebas" data-value="<?= oldCheck('bebas', $promo->bebas) ?>" data-placeholder="Masukkan Free/bebas" data-secondary-placeholder="+ Free/bebas" data-status="true">
                                    <input type="hidden" class="input-bonus" name="bonus" data-value="<?= oldCheck('bonus', $promo->bonus) ?>" data-secondary-placeholder="+ Bonus" data-status="true">

                                    <div class="col s12 center-align">
                                        <p class="float-text property-name">Promosi Untuk : <span style="--property-color: <?= $color ?>"></span> <?= $type_name ?></p>
                                    </div>

                                    <div class="input-field col s12">
                                        <input type="text" name="nama_promo" id="nama_promo" class="validate <?= validCheck($validation->getError('nama_promo')) ?>" value="<?= oldCheck('nama_promo', $promo->nama_promo) ?>" required>
                                        <label for="nama_promo" <?= errorMsgCheck($validation->getError('nama_promo')) ?>>Nama Promo</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <input type="text" name="promo" id="promo" class="validate <?= validCheck($validation->getError('promo')) ?>" value="<?= oldCheck('promo', $promo->promo) ?>" required>
                                        <label for="promo" <?= errorMsgCheck($validation->getError('promo')) ?>>Tajuk Promo</label>
                                        <span style="position: relative;top: -17px;">contoh: Promo 500 Ribu...</span>
                                    </div>

                                    <div class="input-field col s12">
                                        <textarea name="deskripsi" id="deskripsi" class="materialize-textarea validate <?= validCheck($validation->getError('deskripsi')) ?>" data-length="56" maxlength="56"><?= oldCheck('deskripsi', $promo->deskripsi) ?></textarea>
                                        <label for="deskripsi" <?= errorMsgCheck($validation->getError('tagline')) ?>>Deskripsi Promo</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <label for="bebas" class="active chips-label">Bebas/Free <i>Tekan [&#9166;] Untuk menambah </i> </label>
                                        <div class="chips chips-placeholder chips-bebas focus <?= validCheck($validation->getError('bebas')) ?>">
                                        </div>
                                        <span class="err-validation"><?= $validation->getError('bebas') ?></span>
                                    </div>

                                    <div class="input-field col s12">
                                        <label for="bonus" class="active chips-label">Bonus <i>Tekan [&#9166;] Untuk menambah </i> </label>
                                        <div class="chips chips-placeholder chips-bonus focus <?= validCheck($validation->getError('bonus')) ?>">
                                        </div>
                                        <span class="err-validation"><?= $validation->getError('bonus') ?></span>
                                    </div>

                                    <div class="col m4 s12 img-input">
                                        <p>Gambar Brosur:</p>
                                        <div class="card-panel card-image card-thumb z-depth-2 material-placeholder">
                                            <img class="profile-pic img-preview materialboxed" src="<?= base_url() ?>/assets/img/promo/<?= $promo->brosur ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="file-field input-field col m8 s12">
                                        <div class="btn waves-effect waves-light deep-purple lighten-1">
                                            <span>Ganti Gambar Brosur</span>
                                            <input type="file" name="brosur" accept="image/*" id="img" onchange="previewImg()">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input type="text" class="file-path img-path validate">
                                        </div>
                                        <span class="err-validation"><?= $validation->getError('brosur') ?></span>
                                    </div>

                                    <div class="modal-footer edit col s12">
                                        <div class="row modal-button">
                                            <div class="col m6 s12 center">
                                                <a href="<?= base_url() ?>/admin/promo" class="modal-action btn-flat waves-effect waves-red back-btn"><i class="bi bi-x left"></i>Cancel</a>
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