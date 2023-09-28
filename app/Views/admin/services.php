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

                    <div class="heading-wrapper white">
                        <h2 class="header center-on-small-only">
                            <i class="bi bi-grid-fill purple-text header-icon"></i> My <span class="table-name">Service</span>s
                        </h2>
                        <h6>What services are offered and their features.</h6>
                        <hr class="left">
                    </div>

                    <div class="row content content-slider">
                        <div class="col s12">
                            <div class="card-panel row">
                                <h5 class="">Change CTA Button</h5>
                                <?php foreach ($cta as $ctas) : ?>
                                    <?php
                                    $tag = '';
                                    switch ($ctas->cta_type) {
                                        case 'whatsapp':
                                            $tag = '+';
                                            $class = 'wa-text';
                                            $colM = 'm4';
                                            break;
                                        case 'telephone':
                                            $class = 'tel-text';
                                            $colM = 'm4';
                                            break;
                                        case 'envelope':
                                            $class = 'email-text';
                                            $colM = 'm4';
                                            break;
                                        case 'whatsapp_text':
                                            $tag = '<span class="fw-500">Whatsapp text: </span>';
                                            $class = 'wa-chat-text';
                                            $colM = 'm12';
                                            break;
                                    }
                                    ?>
                                    <div class="col s12 <?= $colM ?> text-grey text-darken-4">
                                        <div class="card-panel card-cta <?= $class ?> hoverable">
                                            <h6><i class="bi bi-<?= $ctas->cta_type ?> left"></i> <?= str_replace('%20', ' ', $tag . $ctas->cta_value) ?></h6>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <a href="#change-cta" class="modal-trigger btn-floating waves-effect waves-dark blue right z-depth-1 hoverable tooltipped" data-tooltip="Change" data-delay="70" data-position="bottom">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="card-panel row">
                                <h5 class="text-center">Services List</h5>
                                <?php foreach ($services as $service) : ?>
                                    <div class="col m4 s12 col-sliders-card">

                                        <div class="card medium hoverable service-image">

                                            <div class="card-image">
                                                <img src="<?= base_url() ?>/assets/img/services/<?= $service->img ?>" class="img-slider">
                                                <span class="card-title">
                                                    <h5><?= $service->name ?></h5>
                                                </span>
                                            </div>

                                            <div class="card-content">
                                                <h5><?= $service->name ?></h5>
                                                <p><?= $service->description ?></p>
                                                <h5 class="grey-text text-darken-2">Features</h5>
                                                <ul class="features-list">
                                                    <?php $feature = explode(',', $service->features) ?>
                                                    <?php foreach ($feature as $ftr) : ?>
                                                        <li><?= $ftr ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>

                                            <div class="card-action center z-depth-1">
                                                <a href="<?= base_url() ?>/admin/services/<?= $service->id ?>" class="btn orange darken-2 waves-effect waves-dark tooltipped btn-card" data-position="bottom" data-delay="150" data-tooltip="Change"><i class="bi bi-pencil-fill"></i></a>

                                                <button data-href="<?= base_url() ?>/admin/service/<?= $service->id ?>/<?= $service->img ?>" class="btn red darken-2 waves-effect waves-dark delete-btn tooltipped" data-tooltip="Delete" data-delay="150" data-position="bottom">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="col s12 center">
                                    <a href="#add-services-modal" class="modal-trigger btn btn-large blue waves-effect waves-dark hoverable"><i class="bi bi-plus left"></i> Add Service</a>
                                </div>
                                <div class="col s12">
                                    <p class="grey-text darken-3">Total: <?= count($services) ?> Services</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
<!-- Modal Structure -->
<div class="modal" id="add-services-modal">
    <div class="modal-content contact-content">
        <form action="<?= base_url() ?>/admin/services/save/true" enctype="multipart/form-data" method="post" class="modal-form">
            <?= csrf_field() ?>
            <input type="hidden" class="feature-field" name="features" data-feature="<?= old('features') ?>" data-status="true">

            <div class="row card-panel card-form-modal">
                <h4>Service Information</h4>

                <div class="row row-input">
                    <div class="col s12">
                        <div class="input-field">
                            <textarea name="name" id="name" class="materialize-textarea validate <?= validCheck($validation->getError('name')) ?>" data-length="56" maxlength="56"><?= old('name') ?></textarea>
                            <label for="name" <?= errorMsgCheck($validation->getError('name')) ?>>Service Name</label>
                        </div>

                        <div class="input-field">
                            <textarea name="description" id="description" class="materialize-textarea validate <?= validCheck($validation->getError('description')) ?>" data-length="450" maxlength="450"><?= old('description') ?></textarea>
                            <label for="description" <?= errorMsgCheck($validation->getError('description')) ?>>Description</label>
                        </div>
                        <div class="input-field">
                            <label for="features" class="active chips-label">Features <i>Click Enter after fill features</i> </label>
                            <div class="chips chips-placeholder <?= validCheck($validation->getError('features')) ?>">
                            </div>
                            <span class="err-validation"><?= $validation->getError('features') ?></span>
                        </div>
                    </div>
                    <div class="input-field col m3 s12">
                        <div class="card-panel card-thumb z-depth-2">
                            <img src="<?= base_url() ?>/assets/img/noimg.png" class="thumb-pic img-preview materialboxed">
                        </div>
                    </div>
                    <div class="file-field input-field col m9 s12">
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

<!-- Change CTA Modal -->
<div class="modal modal-small" id="change-cta">
    <div class="modal-content contact-content">

        <form action="<?= base_url() ?>/admin/cta_save" method="post" class="modal-form">
            <?= csrf_field() ?>
            <div class="row card-panel card-form-modal">
                <h4>Change CTA Links</h4>

                <div class="input-field col s12">
                    <input id="telephone" type="number" placeholder="(+_ _ _) _ _ _ _ _ _ _ _ _ _ _" name="cta_telephone" class="validate" required value="<?= $cta[1]->cta_value ?>">
                    <label for="telephone">Telephone/Phone Number</label>
                </div>
                <div class="input-field col s12">
                    <input id="email" type="email" name="cta_email" class="validate" required value="<?= $cta[2]->cta_value ?>">
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s12">
                    <input id="whatsapp" type="number" placeholder="(+_ _ _) _ _ _ _ _ _ _ _ _ _ _" name="cta_whatsapp" class="validate" required value="<?= $cta[0]->cta_value ?>">
                    <label for="whatsapp">Whatsapp Number</label>
                </div>
                <div class="input-field col s12">
                    <input id="wa-text" type="text" name="cta_whatsapp_text" class="validate" required value="<?= $cta[3]->cta_value ?>">
                    <label for="wa-text">Whatsapp text chat</label>
                </div>
            </div>

            <div class="modal-footer col s12 white z-depth-1">
                <div class="row modal-button">
                    <div class="col s6 center">
                        <a class="modal-action btn-flat waves-effect waves-red modal-close">Cancel</a>
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