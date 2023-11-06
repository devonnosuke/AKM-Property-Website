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
                                <i class="bi bi-house-fill color-base header-icon"></i> Daftar <span class="table-name">Promo</span>
                            </h2>
                            <h6>Daftar Property yang sedang promo dari ®️AKM Property.</h6>
                            <hr class="left">
                        </div>
                        <div class="col s3 m4 right">
                            <h2 class="header center-on-small-only">
                                <a href="#add-property-modal" class="modal-trigger btn btn-large blue waves-effect waves-dark hoverable"><i class="bi bi-plus"></i> <span class="hide-on-med-and-down">Tambah Promo</span></a>
                            </h2>
                        </div>
                    </div>

                    <div class="row content promo-item">
                        <?php foreach ($promos as $promo) : ?>
                            <div class="col m4 s12 col-sliders-card">
                                <div class="card medium hoverable card-slider">

                                    <div class="card-image">
                                        <img src="<?= base_url() ?>/assets/img/promo/<?= $promo->brosur ?>" class="img-slider" alt="<?= $promo->nama_promo ?>">
                                        <span class="card-title center-align flow-text"><?= $promo->nama_promo ?></span>
                                    </div>

                                    <div class="card-content desc">
                                        <p><b>Bonus: </b> <?= $promo->bonus ?></p>
                                        <p><b>Free: </b> <?= $promo->bebas ?></p>
                                        <p><b>Deskripsi: </b> <?= $promo->deskripsi ?></p>
                                    </div>

                                    <div class="card-action center z-depth-1 row">
                                        <p style="display:none" id="<?= $promo->id ?>"><?= base_url() ?>/promo/<?= $promo->slug ?></p>
                                        <div class="col s4">
                                            <a href="<?= base_url() ?>/admin/promo/<?= $promo->id ?>" class="btn orange darken-2 waves-effect waves-dark tooltipped btn-card" data-position="bottom" data-delay="150" data-tooltip="Change"><i class="bi bi-pencil-fill"></i></a>
                                        </div>
                                        
                                        <div class="col s4">
                                            <button class="btn green darken-1 waves-effect waves-light btn-card-more btn-link" onclick="copyToClipboard('#<?= $promo->id ?>')">
                                            <i class="bi bi-link-45deg"></i> 
                                            </button>
                                        </div>
                                        
                                        <div class="col s4">
                                            <button data-href="<?= base_url() ?>/admin/promo/<?= $promo->id ?>/<?= $promo->brosur ?>" class="btn red darken-2 waves-effect waves-dark delete-btn tooltipped" data-tooltip="Delete" data-delay="150" data-position="bottom">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                       
                        <div class="col s12">
                            <p class="grey-text darken-3">Total: <?= count($promos) ?> Promo</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
<!-- Add Property Structure -->
<div class="modal" id="add-property-modal">
    <div class="modal-content contact-content">
        <form action="<?= base_url() ?>/admin/promo/save/true" enctype="multipart/form-data" method="post" class="modal-form">
            <?= csrf_field() ?>
            <input type="hidden" class="input-bebas" name="bebas" data-value="<?= old('bebas') ?>" data-placeholder="Masukkan Free/bebas" data-secondary-placeholder="+ Free/bebas" data-status="true">
            <input type="hidden" class="input-bonus" name="bonus" data-value="<?= old('bonus') ?>" data-secondary-placeholder="+ Bonus" data-status="true">
            <div class="row card-panel card-form-modal">
                <h4>Input Promosi</h4>

                <!-- <div class="input-field col m3 s3 center-align select-col">
                    <p class="float-text right"><label style="font-size: 1.5em" for="id_property">Pilih Properti</label></p>
                </div> -->

                <div class="input-field col s12">
                    <select name="id_property" id="id_property" style="display: none" class="select-property">
                        <option value="" disabled selected>Pilih Properti</option>
                        <?php foreach($property as $properties): ?>
                            <option value="<?= $properties->id; ?>" <?= checkAvaiable($properties->id, $promos); ?> <?= selectCheck($properties->id, '', old('id_property')) ; ?> ><?= $properties->type_name;?> <?= readAvaiable($properties->id, $promos); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label style="font-size:1rem">Properti yang akan dipromosi</label>
                </div>

                <div class="input-field col s12">
                    <input type="text" name="nama_promo" id="nama_promo" class="validate <?= validCheck($validation->getError('nama_promo')) ?>" value="<?= old('nama_promo') ?>" required>
                    <label for="nama_promo" <?= errorMsgCheck($validation->getError('nama_promo')) ?>>Nama Promo</label>
                </div>

                <div class="input-field col s12">
                    <textarea name="deskripsi" id="deskripsi" class="materialize-textarea validate <?= validCheck($validation->getError('deskripsi')) ?>"><?= old('deskripsi') ?></textarea>
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

                <div class="input-field col m3 s12">
                    <div class="card-panel card-thumb z-depth-2">
                        <img src="<?= base_url() ?>/assets/img/noimg.png" class="portfolio-view img-preview materialboxed" id="brosur-preview">
                    </div>
                </div>
                <div class="file-field input-field col m9 s12">
                    <div class="btn waves-effect waves-light bg-base">
                        <span>Pilih 1 Gambar Brosur</span>
                        <input type="file" name="brosur" accept="image/*" id="brosur" onchange="previewImg('#brosur',false,'#brosur-preview')" required>
                    </div>
                    <div class="file-path-wrapper">
                        <input type="text" class="file-path img-path validate">
                    </div>
                    <span class="err-validation"><?= $validation->getError('brosur') ?></span>
                </div>

              
            </div>

            <div class="modal-footer col s12 white z-depth-1">
                <div class="row modal-button">
                    <div class="col s6 center">
                        <a class="modal-action btn-flat waves-effect waves-red modal-close">Batal</a>
                    </div>
                    <div class="col s6 center">
                        <button type="submit" class="modal-action btn-flat waves-effect waves-green">
                            <span class="btn-text">Simpan</span>
                            <img src="<?= base_url() ?>/loading.webp" class="loading-icon-modal">
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
<?= $this->endSection() ?>