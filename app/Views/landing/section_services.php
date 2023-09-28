<!-- *** Skills Section *** -->
<div class="parallax-container scrollspy" id="services">
    <div class="parallax">
        <img src="<?= base_url() ?>/assets/img/parallax/qqq.png" alt="Paralax Image">
    </div>
    <div class="row container">
        <h3 class="center white-text">Services</h3>
        <div class="row services">
            <?php foreach ($services as $service) : ?>
                <div class="col-service">
                    <div class="card medium hoverable service-image">

                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="#modalpkg<?= $service->id ?>" class="modal-trigger">
                                <img src="<?= base_url() ?>/assets/img/services/<?= $service->img ?>">
                                <span class="card-title">
                                    <h4><?= $service->name ?></h4>
                                </span>
                            </a>
                        </div>

                        <div class="card-content">
                            <h5><?= $service->name ?></h5>
                            <p><?= $service->description ?></p>
                        </div>

                        <div class="card-action">
                            <a href="#modalpkg<?= $service->id ?>" class="btn btn-small cyan darken-1 modal-trigger waves-effect waves-dark">More...</a>
                        </div>

                    </div>

                    <!-- Modal Paket -->

                    <div id="modalpkg<?= $service->id ?>" class="modal modal-fixed-footer">

                        <div class="modal-content">

                            <img src="<?= base_url() ?>/assets/img/services/<?= $service->img ?>" class="responsive-img img-service">

                            <div class="card-panel">

                                <h4>
                                    <span class="grey-text text-darken-2"><?= $service->name ?></span>
                                </h4>
                                <p class="desc-service flow-text"><?= $service->description ?></p>

                                <h5 class="grey-text text-darken-2">Features</h5>

                                <ul class="features-list">
                                    <?php $feature = explode(',', $service->features) ?>
                                    <?php foreach ($feature as $ftr) : ?>
                                        <li class="flow-text"><?= $ftr ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="cta-service center row">
                                    <div class="col s12 m4">
                                        <a href="https://api.whatsapp.com/send?phone=<?= $cta[0]->cta_value ?>&text=<?= $cta[3]->cta_value ?>" target="_blank" class="btn green darken-1"><i class="bi bi-whatsapp left"></i> Whastapp Now</a>
                                    </div>
                                    <div class="col s12 m4">
                                        <a href="mailto:<?= $cta[2]->cta_value ?>" target="_blank" class="btn orange darken-1"><i class="bi bi-envelope-open left"></i> Mail Now</a>
                                    </div>
                                    <div class="col s12 m4">
                                        <a href="tel:<?= $cta[1]->cta_value ?>" class="btn blue darken-1"><i class="bi bi-telephone left"></i> Call Now</a>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="modal-footer">
                            <a href="#!" class="modal-action modal-close waves-effect waves-orange btn-flat">Close</a>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>