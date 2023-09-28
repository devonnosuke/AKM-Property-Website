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
                            <i class="bi bi-question-circle-fill purple-text header-icon"></i> My <span class="table-name">FAQ</span>s
                        </h2>
                        <h6>Frequently Asked Questions.</h6>
                        <hr class="left">
                    </div>


                    <div class="row content center-align">
                        <div class="card-panel hoverable cf card-skill">

                            <div class="col s12 card-col">
                                <h4>FAQ List</h4>

                            </div>
                            <div class="col s12">
                                <ul class="collapsible" data-collapsible="expandable">
                                    <?php $no = 1;
                                    foreach ($faqs as $faq) : ?>
                                        <li>
                                            <div class="collapsible-header"><?= $no++ . '. ' . $faq->questions ?></div>
                                            <div class="collapsible-body">
                                                <span class="flow-text"><?= $faq->answer ?></span>
                                                <div style="padding: 25px 0; margin: 5px;" class="center">

                                                    <a href="#edit-faq-modal-<?= $faq->id ?>" class="btn modal-trigger orange darken-2 waves-effect waves-dark tooltipped" data-position="bottom" data-delay="150" data-tooltip="Change"><i class="bi bi-pencil-fill"></i></a>

                                                    <button data-href="<?= base_url() ?>/admin/faq/<?= $faq->id ?>" class="btn red darken-2 waves-effect waves-dark delete-btn tooltipped" data-tooltip="Delete" data-delay="150" data-position="bottom">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Edit Modal -->
                                        <div class="modal modal-small" id="edit-faq-modal-<?= $faq->id ?>">
                                            <div class="modal-content contact-content">
                                                <form action="<?= base_url() ?>/admin/faq_save" method="post" class="modal-form">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="id" value="<?= $faq->id ?>">
                                                    <div class="row card-panel card-form-modal">

                                                        <h4>Change FAQ</h4>
                                                        <div class="input-field col s12">
                                                            <textarea name="questions" id="questions" class="materialize-textarea <?= validCheck($validation->getError('questions')) ?>" data-length="75" maxlength="75" required><?= oldCheck('questions', $faq->questions) ?></textarea>
                                                            <label for="questions" <?= errorMsgCheck($validation->getError('questions')) ?>>Questions</label>
                                                        </div>

                                                        <div class="input-field col s12">
                                                            <textarea name="answer" id="answer" class="materialize-textarea <?= validCheck($validation->getError('answer')) ?>" data-length="400" maxlength="400" required><?= oldCheck('answer', $faq->answer) ?></textarea>
                                                            <label for="answer" <?= errorMsgCheck($validation->getError('answer')) ?>>Answer</label>
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
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="col s12 center">
                                <a href="#add-faq-modal" class="modal-trigger btn btn-large blue waves-effect waves-dark hoverable"><i class="bi bi-plus left"></i> Add FAQ</a>
                            </div>
                            <div class="col s12 card-col left-align">
                                <p class="grey-text darken-3">Total: <?= count($faqs) ?> FAQ</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Add Modal -->
<div class="modal modal-small" id="add-faq-modal">
    <div class="modal-content contact-content">
        <form action="<?= base_url() ?>/admin/faq_save" method="post" class="modal-form">
            <?= csrf_field() ?>
            <div class="row card-panel card-form-modal">

                <h4>Add FAQ</h4>


                <div class="input-field col s12">
                    <textarea name="questions" id="questions" class="materialize-textarea <?= validCheck($validation->getError('questions')) ?>" data-length="75" maxlength="75" required><?= old('questions') ?></textarea>
                    <label for="questions" <?= errorMsgCheck($validation->getError('questions')) ?>>Questions</label>
                </div>

                <div class="input-field col s12">
                    <textarea name="answer" id="answer" class="materialize-textarea <?= validCheck($validation->getError('answer')) ?>" data-length="400" maxlength="400" required><?= old('answer') ?></textarea>
                    <label for="answer" <?= errorMsgCheck($validation->getError('answer')) ?>>Answer</label>
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