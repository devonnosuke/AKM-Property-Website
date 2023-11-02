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
                                <i class="bi bi-house-fill color-base header-icon"></i> Daftar <span class="table-name">Properti</span>
                            </h2>
                            <h6>Daftar Seluluh Property dari ®️AKM Property.</h6>
                            <hr class="left">
                        </div>
                        <div class="col s3 m4 right">
                            <h2 class="header center-on-small-only">
                                <a href="#add-property-modal" class="modal-trigger btn btn-large blue waves-effect waves-dark hoverable"><i class="bi bi-plus"></i> <span class="hide-on-med-and-down">Tambah Properti</span></a>
                            </h2>
                        </div>
                    </div>

                    <div class="row content content-slider">
                        <?php foreach ($property as $prop) : ?>
                            <div class="col m4 s12 col-sliders-card">
                                <div class="card medium hoverable card-slider property">

                                    <div class="card-image">
                                        <img src="<?= base_url() ?>/assets/img/property/<?= $prop->image ?>" class="img-slider">
                                        <span class="card-title center-align flow-text"><div class="property-color" style="--color-pro: <?= $prop->color ?>;"></div><?= $prop->type_name ?></span>
                                    </div>

                                    <div class="card-content desc">
                                        <p><b>Alamat: </b> <?= $prop->address ?></p>
                                        <p><b>LT: </b> <?= $prop->luas_tanah ?>m<sup>2</sup> | <b>LB: </b> <?= $prop->luas_bangunan ?></p>
                                        <p><b>Harga Jual: </b> <?= rupiah($prop->harga_jual) ?></p>
                                        <p><b>Fasilitas: </b> <?= $prop->features ?></p>
                                        <p><b>Spesifikasi:</b></p>
                                        <?php $specc =  specGetByProIdSeparate($prop->id); ?>
                                        <?php $i = 0; ?>
                                        <?php foreach($specc['spec_name'] as $spec_name): ?>
                                            <p><b><?= $spec_name; ?>: </b> <?= $specc['spec'][$i] ?></p>
                                        <?php $i++; endforeach; ?>
                                        <p><b>Denah: </b></p>
                                        <div class="card-panel property-denah lightGallery">
                                            <a href="<?= base_url() ?>/assets/img/property/<?= $prop->denah ?>" class="col-md-2">
                                                <img class="responsive-img" src="<?= base_url() ?>/assets/img/property/<?= $prop->denah ?>" alt="<?= $prop->slug; ?>" />
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div class="card-action center z-depth-1 row">
                                        <p style="display:none" id="<?= $prop->id ?>"><?= base_url() ?>/properti/<?= $prop->slug ?></p>
                                        <div class="col s12">
                                            <button class="btn green darken-1 waves-effect waves-light btn-card-more btn-link" onclick="copyToClipboard('#<?= $prop->id ?>')">Salin Link <i class="bi bi-link-45deg"></i></button>
                                        </div>
                                        <div class="col s12">
                                            <!-- Dropdown Trigger -->
                                            <button class='dropdown-button btn bg-base btn-card-more' data-activates='dropdown<?= $prop->id ?>'><i class="bi bi-list"></i></button>
                                            <!-- Dropdown Structure -->
                                            <ul id='dropdown<?= $prop->id ?>' class='dropdown-content'>
                                                <li><a href="<?= base_url() ?>/admin/property-image/<?= $prop->id ?>"><i class="bi bi-images"></i>Lihat Gallery Foto</a></li>
                                                <li><a href="<?= base_url() ?>/admin/property/<?= $prop->id ?>" class="waves-effect waves-dark"><i class="bi bi-pencil-fill"></i>Edit</a></li>
                                                <li class="divider"></li>
                                                <li><a data-href="<?= base_url() ?>/admin/property/<?= $prop->id ?>/<?= $prop->image ?>" class="waves-effect waves-dark delete-btn"><i class="bi bi-trash-fill"></i>Hapus</a></li>
                                            </ul>
                                        </div>
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
        <form action="<?= base_url() ?>/admin/property/save/true" enctype="multipart/form-data" method="post" class="modal-form" onsubmit="loadingUploadBar()">
            <?= csrf_field() ?>
            <input type="hidden" class="feature-field input-feature" name="features" data-value="<?= old('features') ?>" data-placeholder="Masukkan Fasilitas" data-secondary-placeholder="+ Fasilitas" data-status="true">
            <input type="hidden" class="spec_count" name="spec_count"  data-edit="false" value="<?= old('spec_count') ?>">
            <input type="hidden" class="spec_name_old" name="spec_name_old" value="<?= (null !== session()->getFlashdata('spec_name'))?implode(',',session()->getFlashdata('spec_name')):''?>">
            <input type="hidden" class="spec_old" name="spec__old" value="<?= (null !== session()->getFlashdata('spec'))?implode(',',session()->getFlashdata('spec')):''?>">

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
                                    <input id="harga_jual" type="text" name="harga_jual" class="<?= validCheck($validation->getError('harga_jual')) ?>" value="<?= old('harga_jual') ?>" data-length="12" maxlength="12">
                                    <label for="harga_jual" <?= errorMsgCheck($validation->getError('harga_jual')) ?>>Harga Jual</label>
                                </div>

                                <div class="input-field">
                                    <textarea name="description" id="description" class="materialize-textarea validate <?= validCheck($validation->getError('description')) ?>" data-length="56" maxlength="56"><?= old('description') ?></textarea>
                                    <label for="description" <?= errorMsgCheck($validation->getError('description')) ?>>Deskripsi Properti</label>
                                </div>

                                <div class="row">
                                    <div class="col s6 input-field">
                                        <input id="luas_tanah" type="text" name="luas_tanah" class="<?= validCheck($validation->getError('luas_tanah')) ?>" value="<?= old('luas_tanah') ?>" data-length="3" maxlength="3">
                                        <label for="luas_tanah" <?= errorMsgCheck($validation->getError('luas_tanah')) ?>>Luas Tanah m<sup>2</sup> </label>
                                    </div>
                                    <div class="col s6 input-field">
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
                            <div class="col s12 m4 img-input">
                                <p>Gambar Utama:</p>
                                <div class="card-panel card-image card-thumb z-depth-2 material-placeholder">
                                    <img class="profile-pic img-preview materialboxed responsive-img" id="image-preview" src="<?= base_url() ?>/assets/img/noimg.png">
                                </div>
                            </div>
                            <div class="file-field input-field col m9 s12">
                                <div class="btn waves-effect waves-light bg-base">
                                    <span>Pilih 1 Gambar Utama</span>
                                    <input type="file" name="image" accept="image/*" id="image" onchange="previewImg('#image',false, '#image-preview')">
                                </div>
                                <div class="file-path-wrapper hidee">
                                    <input type="text" class="file-path img-path validate">
                                </div>
                                <span class="err-validation"><?= $validation->getError('image') ?></span>
                            </div>
                            <div class="upload__box">
                                <div class="file-field input-field col s12 upload__btn-box">
                                    <div class="btn waves-effect waves-light bg-base upload__btn">
                                        <span>Pilih Banyak gambar</span>
                                        <input type="file" id="file1" multiple data-max_length="20" name="img[]" class="upload__inputfileonly">
                                    </div>
                                    <div class="file-path-wrapper hidee">
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
                                <div class="row spec" id="spec">
                                    <div class="input-field col s6">
                                        <input id="pondasi" type="text" name="spec_name[0]" class="<?= validSpecCheck(getOldSpec(0,'spec_name')) ?>" value="<?= getOldSpec(0,'spec_name') ?>" data-length="56" maxlength="56" required>
                                        <label for="pondasi" <?= errorMsgCheck('Kolom wajib diisi') ?>>Nama Spesifikasi</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="pondasi" type="text" name="spec[0]" class="<?= validSpecCheck(getOldSpec(0,'spec')) ?>" value="<?= getOldSpec(0,'spec') ?>" data-length="56" maxlength="56" required>
                                        <label for="pondasi" <?= errorMsgCheck('Kolom wajib diisi') ?>>Spesifikasi</label>
                                    </div>                         
                                </div>
                                <div class="btn spec-btn">Tambah Spesifikasi</div><div class="btn red delete-spec-btn">Hapus Spesifikasi</div>
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
                                        <img class="profile-pic img-preview materialboxed responsive-img" id="denah-preview" src="<?= base_url() ?>/assets/img/noimg.png">
                                    </div>
                                </div>

                                <div class="btn waves-effect waves-light bg-base">
                                    <span>Pilih 1 Gambar Denah Rumah</span>
                                    <input type="file" name="denah" accept="image/*" id="denah" onchange="previewImg('#denah',false, '#denah-preview')">
                                </div>
                                <div class="file-path-wrapper hidee">
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

<!-- Modal Structure -->
<div id="modal-loading-upload" class="modal loading-upload">
  <div class="modal-content">
    <h4>Mengupload Gambar</h4>
    <div class="progress">
      <div class="indeterminate"></div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>