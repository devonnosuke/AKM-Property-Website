<?= $this->extend('admin/templates/index') ?>

<?= $this->section('main') ?>
<main>
    <div class="section">
        <div class="row">
            <div class="col s12 m9 right main-wrapper">
                <div class="menu-wraper">
                    <span class="flash-data" data-flashdata="" data-type="Tagline"></span>
                    <h2 class="header center-on-small-only center text-color">Welcome <?= user()->username ?>!</h2>
                    <h6 class="center text-color">This website is used to manage data on the John Doe website</h6>
                    <hr class="center">
                    <div class="row content">
                        <div class="col s12">
                            <div class="card-panel hoverable center card-content-color">
                                <h5>My Own Template Responsive Admin Page</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>