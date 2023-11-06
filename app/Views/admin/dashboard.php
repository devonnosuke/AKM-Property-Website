<?= $this->extend('admin/templates/index') ?>

<?= $this->section('main') ?>
<?= showAlert(session()->getFlashdata('alert')) ?>
<?= showModalValidation(session()->getFlashdata('showModal')) ?>
<main>
    <div class="section">
        <div class="row">
            <div class="col s12 m9 right main-wrapper">
                <div class="menu-wraper">
                    <span class="flash-data" data-flashdata="" data-type="Tagline"></span>
                    <h2 class="header center-on-small-only center text-color">Selamat Datang <?= user()->username ?>!</h2>
                    <h6 class="center text-color">This website is used to manage data on AKM Property website</h6>
                    <hr class="center">
                    <div class="row content">
                        <div class="col s12 m6">
                            <div class="card-panel card-visitor hoverable center card-content-color row">
                                <h4 class="left-align">Profil Perusahaan</h4>
                                <div class="flow-text left-align"><?= $personal['profile']; ?></div>
                                <a href="#edit-profile" class="btn-floating waves-effect waves-dark yellow darken-3 right z-depth-1 tooltipped modal-trigger" data-tooltip="Edit" data-delay="70" data-position="bottom">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="card-panel card-visitor hoverable center card-content-color row">
                                <div class="col s4">
                                    <p class="flow-text" style="text-align:center !important;">Pengunjung Hari ini</p>
                                    <b><?= $visitor['pengunjunghariini'] ?></b>
                                </div>
                                <div class="col s4">
                                    <p class="flow-text" style="text-align:center !important;">Total Pengunjung</p>
                                    <b><?= $visitor['totalpengunjung'] ?></b>
                                </div>
                                <div class="col s4">
                                    <p class="flow-text" style="text-align:center !important;">Pegunjung online</p>
                                    <b><?= $visitor['pengunjungonline'] ?></b>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="card-panel card-visitor hoverable center card-content-color row">
                                <h4 class="left-align">Visi</h4>
                                <div class="flow-text left-align"><?= $personal['visi']; ?></div>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="card-panel card-visitor hoverable center card-content-color row">
                                <h4 class="left-align">Misi</h4>
                                <div class="flow-text left-align"><?= $personal['misi']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Add Property Structure -->
<div class="modal" id="edit-profile">
    <div class="modal-content contact-content">
        <form action="<?= base_url() ?>/admin/personal/save" enctype="multipart/form-data" method="post" class="modal-form">
            <?= csrf_field() ?>
            <input type="hidden" name="id" value="<?= $personal['id']; ?>">
            <div class="row card-panel card-form-modal">
                <h4>Edit Profil Perusahaan</h4>

                <div class="input-field col s12">
                    <textarea name="profile" id="profile" class="materialize-textarea validate <?= validCheck($validation->getError('profile')) ?>" data-length="1500" maxlength="1500"><?= oldCheck('profile', $personal['profile']) ?></textarea>
                    <label for="profile" <?= errorMsgCheck($validation->getError('profile')) ?>>Profile Perusahaan</label>
                </div>
               
                <div class="input-field col s12">
                    <textarea name="visi" id="visi" class="materialize-textarea validate <?= validCheck($validation->getError('visi')) ?>" data-length="1500" maxlength="1500"><?= oldCheck('visi', $personal['visi']) ?></textarea>
                    <label for="visi" <?= errorMsgCheck($validation->getError('tagline')) ?>>Visi Perusahaan</label>
                </div>
               
                <div class="input-field col s12">
                    <textarea name="misi" id="misi" class="materialize-textarea validate <?= validCheck($validation->getError('misi')) ?>" data-length="1500" maxlength="1500"><?= oldCheck('misi', $personal['misi']) ?></textarea>
                    <label for="misi" <?= errorMsgCheck($validation->getError('tagline')) ?>>Misi Perusahaan</label>
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