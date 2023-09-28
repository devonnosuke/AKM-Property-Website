<!-- *** About Us Section *** -->
<section id="about" class="about scrollspy">
    <div class="row container">
        <h2 class="light grey-text text-darken-3 center-align">About Me</h2>
        <div class="col s12 m6 left-profile">
            <div class="layered-card">
                <img src="<?= base_url() ?>/assets/img/<?= $personal->img ?>" id="image-profile" alt="<?= $personal->img ?>" class="responsive-img">
            </div>
            <div class="text-content flow-text justify-align">
                <?= $personal->about_text ?>
            </div>
        </div>
        <div class="col s12 m6 right-profile">
            <div class="card-panel personal-data hoverable">
                <h4 class="center-align">Personal Data</h4>
                <div class="row flow-text">
                    <div class="col s4">
                        Name <span class="right">:</span>
                    </div>
                    <div class="col s8">
                        <?= $personal->fullname ?>
                    </div>
                    <div class="col s4 ">
                        Born <span class="right">:</span>
                    </div>
                    <div class="col s8">
                        <?= $personal->born ?>
                    </div>
                    <div class="col s4 ">
                        Age <span class="right">:</span>
                    </div>
                    <div class="col s8">
                        <?= $personal->age ?>
                    </div>
                    <div class="col s4 ">
                        Gender <span class="right">:</span>
                    </div>
                    <div class="col s8">
                        <?= $personal->gender ?>
                    </div>
                    <div class="col s4 ">
                        Country <span class="right">:</span>
                    </div>
                    <div class="col s8">
                        <?= $personal->country ?>
                    </div>
                    <div class="col s12 center btn-download-wrapper">
                        <!-- Link to download CV Files -->
                        <a href="<?= base_url() ?>/download/<?= $personal->cv ?>" class="btn waves-effect waves-dark btn-large">
                            Download CV <i class="bi bi-file-earmark-pdf-fill right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>