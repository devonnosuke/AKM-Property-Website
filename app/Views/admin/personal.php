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
                            <i class="bi bi-person-fill purple-text header-icon"></i> <span class="table-name">Personal</span> About
                        </h2>
                        <h6>A brief description of the John Doe website.</h6>
                        <hr class="left">
                    </div>
                    <div class="row content">
                        <div class="col s12 m12 container">
                            <h3>Preview</h3>
                            <div class="row card-panel personal-data">
                                <div class="col s12 m6">
                                    <div class="center card-profile">
                                        <div class="card-panel card-thumb z-depth-2 card-circle">
                                            <img src="<?= base_url() ?>/assets/img/<?= $personal->img ?>" class="profile-pic circle" alt="foto resmi">
                                        </div>
                                    </div>
                                    <div class="text-content flow-text center-align"><?= $personal->about_text ?></div>
                                </div>
                                <div class="col s12 m6">
                                    <h4 class="center-align">Personal Data</h4>
                                    <div class="row flow-text">
                                        <div class="col s4">
                                            Name <span class="right">:</span>
                                        </div>
                                        <div class="col s8"><?= $personal->fullname ?></div>
                                        <div class="col s4 ">
                                            Born <span class="right">:</span>
                                        </div>
                                        <div class="col s8"><?= $personal->born ?></div>
                                        <div class="col s4 ">
                                            Age <span class="right">:</span>
                                        </div>
                                        <div class="col s8"><?= $personal->age ?></div>
                                        <div class="col s4 ">
                                            Gender <span class="right">:</span>
                                        </div>
                                        <div class="col s8"><?= $personal->gender ?></div>
                                        <div class="col s4 ">
                                            Country <span class="right">:</span>
                                        </div>
                                        <div class="col s8"><?= $personal->country ?></div>
                                        <div class="col s12 center btn-download-wrapper">
                                            <a href="<?= base_url() ?>/download/<?= $personal->cv ?>" class="btn purple waves-effect waves-dark hoverable btn-large">
                                                Download CV <i class="bi bi-file-earmark-pdf-fill right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 center btn-wrapper">
                                    <a class="btn btn-large waves-effect waves-dark red z-depth-2 hoverable modal-trigger" href="#personal-modal"><i class="bi bi-pencil-fill right"></i>Edit</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Edit Modal -->
<div class="modal" id="personal-modal">
    <div class="modal-content contact-content">
        <form action="<?= base_url() ?>/admin/personal/save" method="post" enctype="multipart/form-data" class="modal-form">
            <?= csrf_field() ?>
            <input type="hidden" name="cvOld" value="<?= $personal->cv ?>">
            <input type="hidden" name="imgOld" value="<?= $personal->img ?>">
            <div class="row card-panel contact-panel card-form-modal">
                <h4>Change Personal Data</h4>

                <div class="input-field col s12">
                    <input id="fullname" type="text" name="fullname" class="<?= validCheck($validation->getError('fullname')) ?>" value="<?= oldCheck('fullname', $personal->fullname) ?>">
                    <label for="fullname" <?= errorMsgCheck($validation->getError('fullname')) ?>>Fullname</label>
                </div>

                <div class="input-field col s12">
                    <input id="born" type="text" name="born" class="<?= validCheck($validation->getError('born')) ?>" value="<?= oldCheck('born', $personal->born) ?>">
                    <label for="born" <?= errorMsgCheck($validation->getError('born')) ?>>Born</label>
                </div>

                <div class="input-field col s12">
                    <input id="age" type="number" name="age" class="<?= validCheck($validation->getError('age')) ?> short-num" value="<?= oldCheck('age', $personal->age) ?>">
                    <label for="age" <?= errorMsgCheck($validation->getError('age')) ?>>Age</label>
                </div>

                <div class="input col s12 input-radio">
                    <p>Gender</p>
                    <p>
                        <input class="with-gap" name="gender" type="radio" id="male" value="male" <?= radioCheck('male', $personal->gender, old('gender')) ?> />
                        <label for="male">Male</label>
                    </p>
                    <p>
                        <input class="with-gap" name="gender" type="radio" id="female" value="female" <?= radioCheck('female', $personal->gender, old('gender')) ?> />
                        <label for="female">Female</label>
                    </p>
                </div>

                <div class="input-field col s12">
                    <input id="country" type="text" name="country" class="<?= validCheck($validation->getError('country')) ?>" value="<?= oldCheck('country', $personal->country) ?>">
                    <label for="country" <?= errorMsgCheck($validation->getError('country')) ?>>Country</label>
                </div>

                <div class="input-field col s12">
                    <textarea name="about_text" id="about-text" class="materialize-textarea <?= validCheck($validation->getError('about_text')) ?>" data-length="400" maxlength="400"><?= oldCheck('about_text', $personal->about_text) ?></textarea>
                    <label for="about-text" <?= errorMsgCheck($validation->getError('about_text')) ?>>About Text</label>
                </div>

                <div class="file-field input-field col s12">
                    <div class="btn waves-effect waves-light deep-purple lighten-1">
                        <span>Choose CV File</span>
                        <input type="file" name="cv" accept="application/pdf">
                    </div>
                    <div class="file-path-wrapper">
                        <input type="text" class="file-path <?= validCheck($validation->getError('cv')) ?>" value="<?= $personal->cv ?>">
                    </div>
                    <span><?= $validation->getError('cv') ?></span>
                </div>

                <div class="col s12 m4">
                    <div class="card-panel card-thumb z-depth-2 card-circle">
                        <img class="profile-pic circle img-preview materialboxed" src="<?= base_url() ?>/assets/img/<?= $personal->img ?>">
                    </div>
                </div>
                <div class="file-field input-field col s12 m8">
                    <div class="btn waves-effect waves-light deep-purple lighten-1"> <span>Choose Pic Profile</span>
                        <input type="file" name="img" accept="image/*" id="img" onchange="previewImg()">
                    </div>
                    <div class="file-path-wrapper">
                        <input type="text" class="file-path img-path <?= validCheck($validation->getError('img')) ?>" value="<?= $personal->img ?>">
                    </div>
                    <span><?= $validation->getError('img') ?></span>
                </div>

            </div>

            <div class="modal-footer col s12 white z-depth-1">
                <div class="row modal-button">
                    <div class="col s6 center">
                        <a class="modal-action btn-flat waves-effect waves-red modal-close">Close</a>
                    </div>
                    <div class="col s6 center">
                        <button type="submit" class="btn-modal-submit modal-action btn-flat waves-effect waves-green">
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