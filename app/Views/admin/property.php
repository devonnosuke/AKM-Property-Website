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
                                <a href="#add-property-modal" class="modal-trigger btn btn-large blue waves-effect waves-dark hoverable"><i class="bi bi-plus left"></i> Tambah Properti</a>
                            </h2>
                        </div>
                    </div>

                    <div class="row content content-slider">
                        <?php foreach ($property as $prop) : ?>
                            <div class="col m4 s12 col-sliders-card">
                                <div class="card medium hoverable card-slider">

                                    <div class="card-image">
                                        <img src="<?= base_url() ?>/assets/img/property/<?= $prop->image ?>" class="img-slider">
                                        <span class="card-title center-align flow-text"><?= $prop->type_name ?></span>
                                    </div>

                                    <div class="card-content desc">
                                        <p id="<?= $prop->id ?>">https://akmproperti.com/properti/<?= $prop->slug ?></p>
                                        <?= cutString($prop->description) ?>
                                    </div>

                                    <div class="card-action center z-depth-1">
                                        
                                        <button class="btn orange darken-2 waves-effect waves-light btn-card-more btn-link" onclick="copyToClipboard('#<?= $prop->id ?>')">Salin Link <i class="bi bi-link-45deg"></i></button>
                                        <!-- Dropdown Trigger -->
                                        <button class='dropdown-button btn purple darken-1 btn-card-more' data-activates='dropdown<?= $prop->id ?>'><i class="bi bi-list"></i></button>
                                        <!-- Dropdown Structure -->
                                        <ul id='dropdown<?= $prop->id ?>' class='dropdown-content'>
                                        <li><a href="<?= base_url() ?>/admin/property-image/<?= $prop->id ?>"><i class="bi bi-images"></i>Lihat Gallery Foto</a></li>
                                        <li><a href="<?= base_url() ?>/admin/property/<?= $prop->id ?>" class="waves-effect waves-dark"><i class="bi bi-pencil-fill"></i>Edit</a></li>
                                        <li class="divider"></li>
                                        <li class="divider"></li>
                                        <li><a data-href="<?= base_url() ?>/admin/property/<?= $prop->id ?>/<?= $prop->image ?>" class="waves-effect waves-dark delete-btn"><i class="bi bi-trash-fill"></i>Hapus</a></li>
                                        </ul>

                                        <!-- <button data-href="<?= base_url() ?>/admin/property/<?= $prop->id ?>/<?= $prop->image ?>" class="btn red darken-2 waves-effect waves-dark delete-btn tooltipped btn-card-more" data-tooltip="Delete" data-delay="150" data-position="bottom">
                                            <i class="bi bi-trash-fill"></i>
                                        </button> -->
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
<!-- Add Property Structure -->
<div class="modal" id="add-property-modal">
    <div class="modal-content contact-content">
        <form action="<?= base_url() ?>/admin/property/save/true" enctype="multipart/form-data" method="post" class="modal-form">
            <?= csrf_field() ?>
            <input type="hidden" class="feature-field" name="features" data-feature="<?= old('features') ?>" data-status="true">
            <div class="row card-panel card-form-modal">
                <h4>Input Informasi Properti</h4>
                <ul class="collapsible collapsible-property input popout" data-collapsible="expandable">
                    <li class="flow-text">
                        <div class="collapsible-header active"><i class="material-icons">info</i>Info Dasar</div>
                        <div class="collapsible-body">
                            <div class="col s12">
                                <div class="input-field">
                                    <input id="type_name" type="text" name="type_name" class="<?= validCheck($validation->getError('type_name')) ?>" value="<?= old('type_name') ?>" data-length="56" maxlength="56">
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

                                <div class="row">
                                    <div class="col s6">
                                        <input id="luas_tanah" type="text" name="luas_tanah" class="<?= validCheck($validation->getError('luas_tanah')) ?>" value="<?= old('luas_tanah') ?>" data-length="3" maxlength="3">
                                        <label for="luas_tanah" <?= errorMsgCheck($validation->getError('luas_tanah')) ?>>Luas Tanah m<sup>2</sup> </label>
                                    </div>
                                    <div class="col s6">
                                        <input id="luas_bangunan" type="text" name="luas_bangunan" class="<?= validCheck($validation->getError('luas_bangunan')) ?>" value="<?= old('luas_bangunan') ?>" data-length="10" maxlength="10">
                                        <label for="luas_bangunan" <?= errorMsgCheck($validation->getError('luas_bangunan')) ?>>Luasan Bangunan</label>
                                    </div>
                                </div>
                                
                                <div class="input-field swatch">
                                    <div id="swatch">
                                        <input type="color" id="color" name="color" value="#D80E0E">
                                        <div class="info">
                                            <span>Pilih Warna Properti</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="file-field input-field col m9 s12">
                                <div class="btn waves-effect waves-light deep-purple lighten-1">
                                    <span>Pilih 1 Gambar Utama</span>
                                    <input type="file" name="image" accept="image/*" id="image" onchange="previewImg()">
                                </div>
                                <div class="file-path-wrapper">
                                    <input type="text" class="file-path img-path validate">
                                </div>
                                <span class="err-validation"><?= $validation->getError('image') ?></span>
                            </div>
                            <div class="upload__box">
                                <div class="file-field input-field col s12 upload__btn-box">
                                    <div class="btn waves-effect waves-light deep-purple lighten-1 upload__btn">
                                        <span>Pilih Banyak gambar</span>
                                        <input type="file" multiple data-max_length="20" name="img[]" class="upload__inputfileonly">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input type="text" class="file-path img-path validate <?= validCheck($validation->getError('img')) ?>">
                                    </div>
                                    <span class="err-validation"><?= $validation->getError('img') ?></span>
                                </div>
                                <div class="upload__img-wrap"></div>
                            </div>
                        </div>
                    </li>
                    <li class="flow-text">
                        <div class="collapsible-header active"><i class="material-icons">layers</i>Spesifikasi</div>
                        <div class="collapsible-body">
                            <div class="col s12">
                                <div class="input-field">
                                    <input id="pondasi" type="text" name="pondasi" class="<?= validCheck($validation->getError('pondasi')) ?>" value="<?= old('pondasi') ?>" data-length="56" maxlength="56">
                                    <label for="pondasi" <?= errorMsgCheck($validation->getError('pondasi')) ?>>Pondasi</label>
                                </div>

                                <div class="input-field">
                                    <input id="dinding" type="text" name="dinding" class="<?= validCheck($validation->getError('dinding')) ?>" value="<?= old('dinding') ?>" data-length="56" maxlength="56">
                                    <label for="dinding" <?= errorMsgCheck($validation->getError('dinding')) ?>>dinding</label>
                                </div>

                                <div class="input-field">
                                    <input id="atap" type="text" name="atap" class="<?= validCheck($validation->getError('atap')) ?>" value="<?= old('atap') ?>" data-length="56" maxlength="56">
                                    <label for="atap" <?= errorMsgCheck($validation->getError('atap')) ?>>Atap</label>
                                </div>
                                
                                <div class="input-field">
                                    <input id="plafon" type="text" name="plafon" class="<?= validCheck($validation->getError('plafon')) ?>" value="<?= old('plafon') ?>" data-length="56" maxlength="56">
                                    <label for="plafon" <?= errorMsgCheck($validation->getError('plafon')) ?>>Plafon</label>
                                </div>
                                
                                <div class="input-field">
                                    <input id="listrik" type="text" name="listrik" class="<?= validCheck($validation->getError('listrik')) ?>" value="<?= old('listrik') ?>" data-length="56" maxlength="56">
                                    <label for="listrik" <?= errorMsgCheck($validation->getError('listrik')) ?>>Listrik</label>
                                </div>
                                
                                <div class="input-field">
                                    <input id="lantai" type="text" name="lantai" class="<?= validCheck($validation->getError('lantai')) ?>" value="<?= old('lantai') ?>" data-length="56" maxlength="56">
                                    <label for="lantai" <?= errorMsgCheck($validation->getError('lantai')) ?>>Lantai</label>
                                </div>
                                
                                <div class="input-field">
                                    <input id="kusen" type="text" name="kusen" class="<?= validCheck($validation->getError('kusen')) ?>" value="<?= old('kusen') ?>" data-length="56" maxlength="56">
                                    <label for="kusen" <?= errorMsgCheck($validation->getError('kusen')) ?>>Kusen</label>
                                </div>
                                
                                <div class="input-field">
                                    <input id="kloset" type="text" name="kloset" class="<?= validCheck($validation->getError('kloset')) ?>" value="<?= old('kloset') ?>" data-length="56" maxlength="56">
                                    <label for="kloset" <?= errorMsgCheck($validation->getError('kloset')) ?>>Tipe Kloset</label>
                                </div>
                                
                                <div class="input-field">
                                    <input id="lantai_kmwc" type="text" name="lantai_kmwc" class="<?= validCheck($validation->getError('lantai_kmwc')) ?>" value="<?= old('lantai_kmwc') ?>" data-length="56" maxlength="56">
                                    <label for="lantai_kmwc" <?= errorMsgCheck($validation->getError('lantai_kmwc')) ?>>Lantai(Km/Wc)</label>
                                </div>
                                
                                <div class="input-field">
                                    <input id="dinding_kmwc" type="text" name="dinding_kmwc" class="<?= validCheck($validation->getError('dinding_kmwc')) ?>" value="<?= old('dinding_kmwc') ?>" data-length="56" maxlength="56">
                                    <label for="dinding_kmwc" <?= errorMsgCheck($validation->getError('dinding_kmwc')) ?>>Dinding(Km/Wc)</label>
                                </div>

                            </div>
                        </div>
                    </li>
                    <li class="flow-text">
                        <div class="collapsible-header active"><i class="material-icons">local_hotel</i>Fasilitas</div>
                        <div class="collapsible-body facility">
                            <div class="input-field">
                                <label for="features" class="active chips-label">Fasilitas <i>Tekan [Enter]/[&#9166;] Untuk menambah </i> </label>
                                <div class="chips chips-placeholder focus <?= validCheck($validation->getError('features')) ?>">
                                </div>
                                <span class="err-validation"><?= $validation->getError('features') ?></span>
                            </div>
                        </div>
                    </li>
                    <li class="flow-text">
                        <div class="collapsible-header active"><i class="material-icons">home</i>Denah Rumah</div>
                        <div class="collapsible-body">
                            <div class="file-field input-field col m9 s12">
                                <div class="btn waves-effect waves-light deep-purple lighten-1">
                                    <span>Pilih 1 Gambar Denah Rumah</span>
                                    <input type="file" name="denah" accept="image/*" id="denah" onchange="previewImg()">
                                </div>
                                <div class="file-path-wrapper">
                                    <input type="text" class="file-path img-path validate">
                                </div>
                                <span class="err-validation"><?= $validation->getError('denah') ?></span>
                            </div>
                        </div>
                    </li>
                   
                </ul>
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