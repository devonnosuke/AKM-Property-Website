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
                                        </div>
                                    </div>
                                    <div class="text-content flow-text center-align">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita dolore corporis, voluptas illo accusantium ipsum eos repudiandae nisi aliquam magni!</div>
                                </div>
                                <div class="col s12 m6">
                                    <h4 class="center-align">Personal Data</h4>
                                    <div class="row flow-text">
                                        <div class="col s4">
                                            Name <span class="right">:</span>
                                        </div>
                                        <div class="col s8">loem</div>
                                        <div class="col s4 ">
                                            Born <span class="right">:</span>
                                        </div>
                                        <div class="col s8"></div>
                                        <div class="col s4 ">
                                            Age <span class="right">:</span>
                                        </div>
                                        <div class="col s8"></div>
                                        <div class="col s4 ">
                                            Gender <span class="right">:</span>
                                        </div>
                                        <div class="col s8"></div>
                                        <div class="col s4 ">
                                            Country <span class="right">:</span>
                                        </div>
                                        <div class="col s8"></div>
                                        <div class="col s12 center btn-download-wrapper">
                                            <a href="" class="btn purple waves-effect waves-dark hoverable btn-large">
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
            <div class="row card-panel contact-panel card-form-modal">
                <h4>Change Personal Data</h4>

                

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