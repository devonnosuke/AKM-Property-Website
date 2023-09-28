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
                            <i class="bi bi-trophy-fill purple-text header-icon"></i> My <span class='table-name'>education</span>
                        </h2>
                        <h6>About any education or training that has been passed.</h6>
                        <hr class="left">
                    </div>

                    <div class="row content center-align">
                        <div class="card-panel hoverable cf card-skill">

                            <div class="col s12 card-col">
                                <h4>Education List</h4>
                                <div class="fixTableHead edu">
                                    <table class="edu-table responsive-table bordered highlight">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Country Collage</th>
                                                <th>Collage Name</th>
                                                <th>Title</th>
                                                <th>Major</th>
                                                <th>Graduation Date</th>
                                                <th class="center-align">Options</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($educational as $edu) : ?>
                                                <tr class="skill-wrapper">
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $edu->country_collage ?></td>
                                                    <td><?= $edu->collage_name ?></td>
                                                    <td><?= $edu->title ?></td>
                                                    <td><?= $edu->major ?></td>
                                                    <td><?= $edu->year_graduation ?></td>
                                                    <td class="btn-wrapper">
                                                        <div class="show-on-small hide-on-med-and-up">
                                                            <a href="#edit-edu-modal-<?= $edu->id ?>" class="modal-trigger orange-text">Change</a>
                                                            <button data-href="<?= base_url() ?>/admin/educational/<?= $edu->id ?>" class="red-text delete-btn">
                                                                Delete
                                                            </button>
                                                        </div>
                                                        <span class="show-on-medium-and-up hide-on-small-only">
                                                            <a href="#edit-edu-modal-<?= $edu->id ?>" class="modal-trigger btn-floating btn waves-effect waves-light orange btn-skill left tooltipped" data-tooltip="Change" data-delay="70" data-position="bottom">
                                                                <i class="bi bi-pencil-fill"></i>
                                                            </a>

                                                            <button data-href="<?= base_url() ?>/admin/educational/<?= $edu->id ?>" class="btn-floating btn waves-effect waves-light red btn-skill right delete-btn tooltipped" data-tooltip="Delete" data-delay="70" data-position="bottom">
                                                                <i class="bi bi-trash-fill"></i>
                                                            </button>
                                                        </span>
                                                    </td>
                                                </tr>

                                                <!-- Edit Modal -->
                                                <div class="modal modal-small" id="edit-edu-modal-<?= $edu->id ?>">
                                                    <div class="modal-content contact-content">
                                                        <form action="<?= base_url() ?>/admin/educational/save" method="post" class="modal-form">
                                                            <?= csrf_field() ?>
                                                            <input type="hidden" name="id" value="<?= $edu->id ?>">
                                                            <div class="row card-panel card-form-modal left-align">
                                                                <h4>Change Education</h4>

                                                                <div class="input-field col s12">
                                                                    <input type="text" name="country_collage" id="country_collage" class="validate <?= validCheck($validation->getError('country_collage')) ?>" value="<?= oldCheck('country_collage', $edu->country_collage) ?>" required>
                                                                    <label for="country_collage" <?= errorMsgCheck($validation->getError('country_collage')) ?>>Country Collage</label>
                                                                </div>

                                                                <div class="input-field col s12">
                                                                    <input type="text" name="collage_name" id="collage_name" class="validate <?= validCheck($validation->getError('collage_name')) ?>" value="<?= oldCheck('collage_name', $edu->collage_name) ?>" required>
                                                                    <label for="collage_name" <?= errorMsgCheck($validation->getError('collage_name')) ?>>Collage Name</label>
                                                                </div>

                                                                <div class="col m2 s3 center-align select-col">
                                                                    <p class="float-text"><label style="font-size: 1.5em" for="title">Title</label></p>
                                                                </div>
                                                                <div class="col m10 s9 select-col">
                                                                    <select name="title" id="title">
                                                                        <option value="associate" <?= selectCheck('associate', $edu->title, old('title')) ?>>
                                                                            associate</option>
                                                                        <option value="certificate" <?= selectCheck('certificate', $edu->title, old('title')) ?>>
                                                                            certificate</option>
                                                                        <option value="B.A." <?= selectCheck('B.A.', $edu->title, old('title')) ?>>
                                                                            B.A.</option>
                                                                        <option value="BArch" <?= selectCheck('BArch', $edu->title, old('title')) ?>>
                                                                            BArch</option>
                                                                        <option value="BM" <?= selectCheck('BM', $edu->title, old('title')) ?>>
                                                                            BM</option>
                                                                        <option value="BFA" <?= selectCheck('BFA', $edu->title, old('title')) ?>>
                                                                            BFA</option>
                                                                        <option value="B.Sc." <?= selectCheck('B.Sc.', $edu->title, old('title')) ?>>
                                                                            B.Sc.</option>
                                                                        <option value="M.A." <?= selectCheck('M.A.', $edu->title, old('title')) ?>>
                                                                            M.A.</option>
                                                                        <option value="M.B.A" <?= selectCheck('M.B.A', $edu->title, old('title')) ?>>
                                                                            M.B.A</option>
                                                                        <option value="M.F.A" <?= selectCheck('M.F.A', $edu->title, old('title')) ?>>
                                                                            M.F.A</option>
                                                                        <option value="M.Sc." <?= selectCheck('M.Sc.', $edu->title, old('title')) ?>>
                                                                            M.Sc.</option>
                                                                        <option value="J.D." <?= selectCheck('J.D.', $edu->title, old('title')) ?>>
                                                                            J.D.</option>
                                                                        <option value="M.D." <?= selectCheck('M.D.', $edu->title, old('title')) ?>>
                                                                            M.D.</option>
                                                                        <option value="Ph.D" <?= selectCheck('Ph.D', $edu->title, old('title')) ?>>
                                                                            Ph.D</option>
                                                                        <option value="LLM" <?= selectCheck('LLM', $edu->title, old('title')) ?>>
                                                                            LLM</option>
                                                                        <option value="other" <?= selectCheck('other', $edu->title, old('title')) ?>>
                                                                            other</option>
                                                                    </select>
                                                                </div>

                                                                <div class="input-field col s12">
                                                                    <input type="text" name="major" id="major" class="validate <?= validCheck($validation->getError('major')) ?>" value="<?= oldCheck('major', $edu->major) ?>" required>
                                                                    <label for="major" <?= errorMsgCheck($validation->getError('major')) ?>>Major</label>
                                                                </div>

                                                                <div class="input-field col s12">
                                                                    <input type="number" name="year_graduation" id="year_graduation" class="validate <?= validCheck($validation->getError('year_graduation')) ?> short-num" value="<?= oldCheck('year_graduation', $edu->year_graduation) ?>" required>
                                                                    <label for="year_graduation" <?= errorMsgCheck($validation->getError('year_graduation')) ?>>Year Graduation</label>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer col s12 white z-depth-1 edit">
                                                                <div class="row modal-button">
                                                                    <div class="col s6 center">
                                                                        <a class="modal-action btn-flat waves-effect waves-red modal-close" onclick="resetValidate()">Cancel</a>
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
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col s12 center card-col">
                                <a href="#add-edu-modal" class="modal-trigger btn btn-large blue waves-effect waves-dark hoverable"><i class="bi bi-plus left"></i> Add Education</a>
                            </div>

                            <div class="col s12 card-col">
                                <p class="grey-text darken-3">Total: <?= count($educational) ?> Educations</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Add Modal -->
<div class="modal modal-small" id="add-edu-modal">
    <div class="modal-content contact-content">
        <form action="<?= base_url() ?>/admin/educational/save" method="post" class="modal-form">
            <?= csrf_field() ?>
            <div class="row card-panel card-form-modal">
                <h4>Add Education</h4>

                <div class="input-field col s12">
                    <input type="text" name="country_collage" id="country_collage" class="validate <?= validCheck($validation->getError('country_collage')) ?>" value="<?= old('country_collage') ?>" required>
                    <label for="country_collage" <?= errorMsgCheck($validation->getError('country_collage')) ?>>Country Collage</label>
                </div>

                <div class="input-field col s12">
                    <input type="text" name="collage_name" id="collage_name" class="validate <?= validCheck($validation->getError('collage_name')) ?>" value="<?= old('collage_name') ?>" required>
                    <label for="collage_name" <?= errorMsgCheck($validation->getError('collage_name')) ?>>Collage Name</label>
                </div>

                <div class="col m2 s3 center-align select-col">
                    <p class="float-text"><label style="font-size: 1.5em" for="title">Title</label></p>
                </div>
                <div class="col m10 s9 select-col">
                    <select name="title" id="title">
                        <option value="associate" <?= selectCheck('associate', old('title')) ?>>
                            associate</option>
                        <option value="certificate" <?= selectCheck('certificate', old('title')) ?>>
                            certificate</option>
                        <option value="B.A." <?= selectCheck('B.A.', old('title')) ?>>
                            B.A.</option>
                        <option value="BArch" <?= selectCheck('BArch', old('title')) ?>>
                            BArch</option>
                        <option value="BM" <?= selectCheck('BM', old('title')) ?>>
                            BM</option>
                        <option value="BFA" <?= selectCheck('BFA', old('title')) ?>>
                            BFA</option>
                        <option value="B.Sc." <?= selectCheck('B.Sc.', old('title')) ?>>
                            B.Sc.</option>
                        <option value="M.A." <?= selectCheck('M.A.', old('title')) ?>>
                            M.A.</option>
                        <option value="M.B.A" <?= selectCheck('M.B.A', old('title')) ?>>
                            M.B.A</option>
                        <option value="M.F.A" <?= selectCheck('M.F.A', old('title')) ?>>
                            M.F.A</option>
                        <option value="M.Sc." <?= selectCheck('M.Sc.', old('title')) ?>>
                            M.Sc.</option>
                        <option value="J.D." <?= selectCheck('J.D.', old('title')) ?>>
                            J.D.</option>
                        <option value="M.D." <?= selectCheck('M.D.', old('title')) ?>>
                            M.D.</option>
                        <option value="Ph.D" <?= selectCheck('Ph.D', old('title')) ?>>
                            Ph.D</option>
                        <option value="LLM" <?= selectCheck('LLM', old('title')) ?>>
                            LLM</option>
                        <option value="Other" <?= selectCheck('Other', old('title')) ?>>
                            other</option>
                    </select>
                </div>

                <div class="input-field col s12">
                    <input type="text" name="major" id="major" class="validate <?= validCheck($validation->getError('major')) ?>" value="<?= old('major') ?>" required>
                    <label for="major" <?= errorMsgCheck($validation->getError('major')) ?>>Major</label>
                </div>

                <div class="input-field col s12">
                    <input type="number" name="year_graduation" id="year_graduation" class="validate <?= validCheck($validation->getError('year_graduation')) ?> short-num" value="<?= old('year_graduation') ?>" required>
                    <label for="year_graduation" <?= errorMsgCheck($validation->getError('year_graduation')) ?>>Year Graduation</label>
                </div>
            </div>

            <div class="modal-footer col s12 white z-depth-1">
                <div class="row modal-button">
                    <div class="col s6 center">
                        <a class="modal-action btn-flat waves-effect waves-red modal-close" onclick="resetValidate()">Cancel</a>
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