<?= $this->extend('admin/templates/index') ?>

<?= $this->section('main') ?>

<main>
    <div class="section">
        <div class="row">
            <div class="col s12 m9 right main-wrapper">
                <div class="menu-wraper text-color">
                    <span class="flash-data" data-flashdata="" data-type="Tagline"></span>

                    <div class="heading-wrapper white row">
                        <div class="col s9 m8 left">
                            <h2 class="header center-on-small-only">
                                <i class="bi bi-collection-fill purple-text header-icon"></i> Edit Properti
                            </h2>
                            <h6>Ubah informasi properti yang telah dibuat.</h6>
                            <hr class="left">
                        </div>
                        <div class="col s3 m4 right">
                            <h2 class="header center-on-small-only">
                                <a href="<?= base_url() ?>/admin/property" class="modal-trigger btn color-base white waves-effect waves-dark"><i class="bi bi-arrow-left left"></i></a>
                            </h2>
                        </div>
                    </div>

                    <div class="row content">
                        <div class="card-panel cf">
                            <div class="col s12">
                                <form action="<?= base_url() ?>/admin/property/save" enctype="multipart/form-data" method="post" class="modal-form">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="id" value="<?= $property->id ?>">
                                    <input type="hidden" name="old_img" value="<?= $property->image ?>">
                                    <input type="hidden" name="old_denah" value="<?= $property->denah ?>">
                                    <input type="hidden" name="slug" value="<?= $property->slug ?>">
                                    <input type="hidden" class="feature-field input-feature" name="features" data-value="<?= oldCheck('features', $property->features) ?>" data-placeholder="Masukkan Fasilitas" data-secondary-placeholder="+ Fasilitas" data-status="true">
                                    <ul class="collapsible collapsible-property input popout" data-collapsible="expandable">
                                        <li class="flow-text">
                                            <div class="collapsible-header active"><i class="material-icons">info</i>Info Dasar</div>
                                            <div class="collapsible-body">
                                                <div class="col s12">
                                                    <div class="input-field">
                                                        <input id="type_name" type="text" name="type_name" class="<?= validCheck($validation->getError('type_name')) ?>" value="<?= oldCheck('type_name', $property->type_name) ?>" data-length="56" maxlength="56">
                                                        <label for="type_name" <?= errorMsgCheck($validation->getError('type_name')) ?>>Nama/Tipe Property</label>
                                                    </div>
                                                    
                                                    <div class="input-field">
                                                        <textarea name="address" id="address" class="materialize-textarea validate <?= validCheck($validation->getError('address')) ?>" data-length="56" maxlength="56"><?= oldCheck('address', $property->address) ?></textarea>
                                                        <label for="address" <?= errorMsgCheck($validation->getError('address')) ?>>Alamat Properti</label>
                                                    </div>

                                                    <div class="input-field">
                                                        <input id="harga_jual" type="text" name="harga_jual" class="<?= validCheck($validation->getError('harga_jual')) ?>" value="<?= oldCheck('harga_jual', $property->harga_jual) ?>" data-length="56" maxlength="56">
                                                        <label for="harga_jual" <?= errorMsgCheck($validation->getError('harga_jual')) ?>>Harga Jual</label>
                                                    </div>

                                                    <div class="input-field">
                                                        <textarea name="description" id="description" class="materialize-textarea validate <?= validCheck($validation->getError('description')) ?>" data-length="56" maxlength="56"><?= oldCheck('description', $property->description) ?></textarea>
                                                        <label for="description" <?= errorMsgCheck($validation->getError('description')) ?>>Deskripsi Properti</label>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col s6">
                                                            <input id="luas_tanah" type="text" name="luas_tanah" class="<?= validCheck($validation->getError('luas_tanah')) ?>" value="<?= oldCheck('luas_tanah', $property->luas_tanah) ?>" data-length="3" maxlength="3">
                                                            <label for="luas_tanah" <?= errorMsgCheck($validation->getError('luas_tanah')) ?>>Luas Tanah m<sup>2</sup> </label>
                                                        </div>
                                                        <div class="col s6">
                                                            <input id="luas_bangunan" type="text" name="luas_bangunan" class="<?= validCheck($validation->getError('luas_bangunan')) ?>" value="<?= oldCheck('luas_bangunan', $property->luas_bangunan) ?>" data-length="10" maxlength="10">
                                                            <label for="luas_bangunan" <?= errorMsgCheck($validation->getError('luas_bangunan')) ?>>Luas Bangunan</label>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="input-field swatch">
                                                        <div id="swatch">
                                                            <input type="color" id="color" name="color" value="<?= oldCheck('color', $property->color) ?>">
                                                            <div class="info">
                                                                <span>Pilih Warna Properti</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col s12 m4 img-input">
                                                    <p>Gambar Utama:</p>
                                                    <div class="card-panel card-image card-thumb z-depth-2 material-placeholder">
                                                        <img class="profile-pic img-preview materialboxed responsive-img" id="image-preview" src="<?= base_url() ?>/assets/img/property/<?= $property->image ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="file-field input-field col m9 s12">
                                                    <div class="btn waves-effect waves-light bg-base lighten-1">
                                                        <span>Ganti Gambar Utama</span>
                                                        <input type="file" name="image" accept="image/*" id="image" onchange="previewImg('#image',false, '#image-preview')">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input type="text" class="file-path img-path validate">
                                                    </div>
                                                    <span class="err-validation"><?= $validation->getError('image') ?></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="flow-text">
                                            <div class="collapsible-header active"><i class="material-icons">layers</i>Spesifikasi</div>
                                            <div class="collapsible-body">
                                                <div class="col s12">
                                                    <div class="input-field">
                                                        <input id="pondasi" type="text" name="pondasi" class="<?= validCheck($validation->getError('pondasi')) ?>" value="<?= oldCheck('pondasi', $property->pondasi) ?>" data-length="56" maxlength="56">
                                                        <label for="pondasi" <?= errorMsgCheck($validation->getError('pondasi')) ?>>Pondasi</label>
                                                    </div>

                                                    <div class="input-field">
                                                        <input id="dinding" type="text" name="dinding" class="<?= validCheck($validation->getError('dinding')) ?>" value="<?= oldCheck('dinding', $property->dinding) ?>" data-length="56" maxlength="56">
                                                        <label for="dinding" <?= errorMsgCheck($validation->getError('dinding')) ?>>dinding</label>
                                                    </div>

                                                    <div class="input-field">
                                                        <input id="atap" type="text" name="atap" class="<?= validCheck($validation->getError('atap')) ?>" value="<?= oldCheck('atap', $property->atap) ?>" data-length="56" maxlength="56">
                                                        <label for="atap" <?= errorMsgCheck($validation->getError('atap')) ?>>Atap</label>
                                                    </div>
                                                    
                                                    <div class="input-field">
                                                        <input id="plafon" type="text" name="plafon" class="<?= validCheck($validation->getError('plafon')) ?>" value="<?= oldCheck('plafon', $property->plafon) ?>" data-length="56" maxlength="56">
                                                        <label for="plafon" <?= errorMsgCheck($validation->getError('plafon')) ?>>Plafon</label>
                                                    </div>
                                                    
                                                    <div class="input-field">
                                                        <input id="listrik" type="text" name="listrik" class="<?= validCheck($validation->getError('listrik')) ?>" value="<?= oldCheck('listrik', $property->listrik) ?>" data-length="56" maxlength="56">
                                                        <label for="listrik" <?= errorMsgCheck($validation->getError('listrik')) ?>>Listrik</label>
                                                    </div>
                                                    
                                                    <div class="input-field">
                                                        <input id="lantai" type="text" name="lantai" class="<?= validCheck($validation->getError('lantai')) ?>" value="<?= oldCheck('lantai', $property->lantai) ?>" data-length="56" maxlength="56">
                                                        <label for="lantai" <?= errorMsgCheck($validation->getError('lantai')) ?>>Lantai</label>
                                                    </div>
                                                    
                                                    <div class="input-field">
                                                        <input id="kusen" type="text" name="kusen" class="<?= validCheck($validation->getError('kusen')) ?>" value="<?= oldCheck('kusen', $property->kusen) ?>" data-length="56" maxlength="56">
                                                        <label for="kusen" <?= errorMsgCheck($validation->getError('kusen')) ?>>Kusen</label>
                                                    </div>
                                                    
                                                    <div class="input-field">
                                                        <input id="kloset" type="text" name="kloset" class="<?= validCheck($validation->getError('kloset')) ?>" value="<?= oldCheck('kloset', $property->kloset) ?>" data-length="56" maxlength="56">
                                                        <label for="kloset" <?= errorMsgCheck($validation->getError('kloset')) ?>>Tipe Kloset</label>
                                                    </div>
                                                    
                                                    <div class="input-field">
                                                        <input id="lantai_kmwc" type="text" name="lantai_kmwc" class="<?= validCheck($validation->getError('lantai_kmwc')) ?>" value="<?= oldCheck('lantai_kmwc', $property->lantai_kmwc) ?>" data-length="56" maxlength="56">
                                                        <label for="lantai_kmwc" <?= errorMsgCheck($validation->getError('lantai_kmwc')) ?>>Lantai(Km/Wc)</label>
                                                    </div>
                                                    
                                                    <div class="input-field">
                                                        <input id="dinding_kmwc" type="text" name="dinding_kmwc" class="<?= validCheck($validation->getError('dinding_kmwc')) ?>" value="<?= oldCheck('dinding_kmwc', $property->dinding_kmwc) ?>" data-length="56" maxlength="56">
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
                                                    <div class="chips chips-placeholder chips-features focus <?= validCheck($validation->getError('features')) ?>">
                                                    </div>
                                                    <span class="err-validation"><?= $validation->getError('features') ?></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="flow-text">
                                            <div class="collapsible-header active"><i class="material-icons">home</i>Denah Rumah</div>
                                            <div class="collapsible-body">
                                                <div class="file-field input-field col m9 s12">
                                                    
                                                    <div class="col s12 m4 img-input">
                                                        <p>Gambar Denah:</p>
                                                        <div class="card-panel card-image card-thumb z-depth-2 material-placeholder">
                                                            <img class="profile-pic img-preview materialboxed responsive-img" id="denah-preview" src="<?= base_url() ?>/assets/img/property/<?= $property->denah ?>">
                                                        </div>
                                                    </div>

                                                    <div class="btn waves-effect waves-light bg-base lighten-1">
                                                        <span>Ganti Gambar Denah Rumah</span>
                                                        <input type="file" name="denah" accept="image/*" id="denah" onchange="previewImg('#denah',false, '#denah-preview')">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input type="text" class="file-path img-path validate">
                                                    </div>
                                                    <span class="err-validation"><?= $validation->getError('denah') ?></span>
                                                </div>
                                            </div>
                                        </li>
                                    
                                    </ul>

                                    <div class="modal-footer edit">
                                        <div class="row modal-button">
                                            <div class="col m6 s12 center">
                                                <a href="<?= base_url() ?>/admin/property" class="modal-action btn-flat waves-effect waves-red back-btn"><i class="bi bi-arrow-left left"></i>Kembali</a>
                                            </div>
                                            <div class="col m6 s12 center">
                                                <button type="submit" class="modal-action btn-submit btn-flat waves-effect waves-green">
                                                    <span class="btn-text"><i class="bi bi-check left"></i>Simpan</span>
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