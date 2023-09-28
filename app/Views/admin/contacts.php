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
                            <i class="bi bi-telephone-fill purple-text header-icon"></i> <span class="table-name">My Contact</span>s
                        </h2>
                        <h6>About the company's social media, email and call centers.</h6>
                        <hr class="left">
                    </div>

                    <div class="row content">

                        <div class="col m6 s12">
                            <h4>Contact Address Preview</h4>
                            <div class="collection with-header hoverable z-depth-2">

                                <ul>

                                    <li class="collection-header">
                                        <h4>Kantor Kami</h4>
                                    </li>

                                    <li class="collection-item">
                                        <i class="bi bi-geo-alt-fill left"></i>
                                        <?= $contact->address ?>
                                    </li>

                                    <li class="collection-item">
                                        <i class="bi bi-mailbox2 left"></i>
                                        <?= $contact->country ?>
                                    </li>

                                    <li class="collection-item">
                                        <i class="bi bi-telephone-fill left"></i>
                                        <?= $contact->telephone ?>
                                    </li>

                                    <li class="collection-item">
                                        <i class="bi bi-phone-fill left"></i>
                                        <?= $contact->phone ?>
                                    </li>

                                    <li class="collection-item">
                                        <i class="bi bi-envelope-fill left"></i>
                                        <?= $contact->email ?>
                                    </li>

                                </ul>
                            </div>

                            <div class="col s12 center card-col">
                                <a href="#modal-address" class="modal-trigger btn btn-large blue waves-effect waves-dark hoverable"><i class="bi bi-pencil-fill left"></i> Change Address</a>
                            </div>
                        </div>

                        <div class="col m6 s12">
                            <h4>Social Media Preview</h4>
                            <?php foreach ($social as $s) : ?>
                                <div class="col m6 s12 contact-col">
                                    <div class="card-panel hoverable center card-contact">
                                        <a class="contact-link" target="_blank" href="<?= $s->link ?>">
                                            <i class="bi bi-<?= $s->contact_type ?> contact-icons"></i>
                                            <h5 class="flow-text contact-link truncate">
                                                <b><?= ($s->contact_type == 'envelope') ? 'Email' : $s->contact_type ?>:</b>
                                                <?= $s->link ?>
                                            </h5>
                                        </a>
                                        <button data-href="<?= base_url() ?>/admin/social/<?= $s->id ?>" class="btn-floating waves-effect waves-dark red right z-depth-1 hoverable delete-btn tooltipped" data-tooltip="Delete" data-delay="70" data-position="bottom">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="col s12 center card-col">
                                <a href="#add-social-modal" class="modal-trigger btn btn-large blue waves-effect waves-dark hoverable"><i class="bi bi-plus left"></i> Add Social Media</a>
                            </div>
                        </div>

                        <div class="col s12 card-col right-align">
                            <p class="grey-text darken-3">Total: <?= count($social) ?> Links</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Add Social Media Modal -->
<div class="modal modal-small" id="add-social-modal">
    <div class="modal-content contact-content">

        <form action="<?= base_url() ?>/admin/social_save" method="post" class="modal-form">
            <?= csrf_field() ?>
            <div class="row card-panel card-form-modal">
                <h4>Add Link's, Email or Call center</h4>

                <div class="col m4 s3 center-align select-col">
                    <p class="float-text"><label class="grey-text text-darken-2 float-text" for="title">Contact Type</label></p>
                </div>
                <div class="col m8 s9 select-col">
                    <select name="contact_type" id="contact_type" onchange="checkContactType()">
                        <option value="envelope">
                            Email
                        </option>
                        <option value="telephone">
                            Phone number
                        </option>
                        <option value="youtube">
                            youtube
                        </option>
                        <option value="instagram">
                            instagram
                        </option>
                        <option value="facebook">
                            facebook
                        </option>
                        <option value="whatsapp">
                            whatsapp
                        </option>
                        <option value="twitter">
                            twitter
                        </option>
                        <option value="discord">
                            discord
                        </option>
                        <option value="pinterest">
                            pinterest
                        </option>
                        <option value="github">
                            github
                        </option>
                        <option value="linkedin">
                            linkedin
                        </option>
                        <option value="messenger">
                            messenger
                        </option>
                        <option value="reddit">
                            reddit
                        </option>
                        <option value="skype">
                            skype
                        </option>
                        <option value="telegram">
                            telegram
                        </option>
                        <option value="twitch">
                            twitch
                        </option>
                        <option value="chat-fill">
                            Other
                        </option>
                    </select>
                </div>
                <div class="input-field col s12">
                    <input id="link" type="email" name="link" class="validate" required>
                    <label for="link" id="contact_label">Email</label>
                </div>
                <div class="col s12">
                    <p>For number phone must be use country code <strong><i>ex:+6281234567891</i></strong></p>
                    <p>Note for link: must add <strong>https://</strong> or <strong>http://</strong> at the beginning of the link. example: <strong>https://www.facebook.com/jhon_doe</strong></p>
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

<!-- Change Address Modal -->
<div class="modal modal-medium" id="modal-address">
    <div class="modal-content contact-content">
        <form action="<?= base_url() ?>/admin/address_save" method="post" class="modal-form">
            <?= csrf_field() ?>
            <div class="row card-panel card-form-modal">

                <h4>Change Address</h4>

                <div class="input-field col s12">
                    <i class="bi bi-geo-alt-fill prefix form-icon-modal"></i>
                    <input type="text" name="address" value="<?= oldCheck('address', $contact->address) ?>" id="address" class="validate" required>
                    <label for="address">Address</label>
                </div>

                <div class="input-field col s12">
                    <i class="bi bi-mailbox2 prefix form-icon-modal"></i>
                    <input type="text" name="country" value="<?= oldCheck('country', $contact->country) ?>" id="country" class="validate" required>
                    <label for="country">County</label>
                </div>

                <div class="input-field col s12">
                    <i class="bi bi-telephone-fill prefix form-icon-modal"></i>
                    <input type="number" name="telephone" value="<?= oldCheck('telephone', $contact->telephone) ?>" id="telephone" class="validate" required>
                    <label for="telephone">Telephone</label>
                </div>

                <div class="input-field col s12">
                    <i class="bi bi-phone-fill prefix form-icon-modal"></i>
                    <input type="number" name="phone" value="<?= oldCheck('phone', $contact->phone) ?>" id="phone" class="validate" required>
                    <label for="phone">Phone</label>
                </div>

                <div class="input-field col s12">
                    <i class="bi bi-envelope-fill prefix form-icon-modal"></i>
                    <input type="email" name="email" value="<?= oldCheck('email', $contact->email) ?>" id="email" class="validate" required>
                    <label for="email">email</label>
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