<?= $this->extend('landing/templates/base') ?>
<?= $this->section('content') ?>
<section class="contact greyen-4">
    <div class="container">

        <div class="heading-text">    
            <h2 class="grey-text text-darken-3 left-align">Temukan Kami</h2>
            <div class="left"></div>
        </div>

        <div class="row">
            <div class="col s12 m6">
                <div class="collection with-header hoverable z-depth-2">

                    <ul>
                        <li class="collection-header">
                            <h4><?= $contact->office_name ?> <i class="bi bi-buildings-fill left color-base"></i></h4>
                        </li>

                        <li class="collection-item">
                            <i class="bi bi-buildings left color-base"></i>
                            <?= $contact->address ?>
                        </li>

                        <li class="collection-item">
                            <i class="bi bi-whatsapp left color-base"></i>
                            <?= $contact->phone ?>
                        </li>

                        <li class="collection-item">
                            <i class="bi bi-telephone-fill left color-base"></i>
                            <?= $contact->telephone ?>
                        </li>

                        <li class="collection-item">
                            <i class="bi bi-envelope-fill left color-base"></i>
                            <?= $contact->email ?>
                        </li>
                        <li class="collection-item">
                            <a href="https://maps.app.goo.gl/GjscboQX1BTNue698" target="_blank" class="btn btn-large bg-btn">Tampilkan Penunjuk Arah <i class="bi bi-geo-fill right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col s12 m6">    
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.3131476542176!2d119.8751861!3d-0.9117706000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d8bedf41e3d56a5%3A0xf14ef7541c83144c!2sPT.AGUNG%20KARYA%20MANDIRI!5e0!3m2!1sid!2sid!4v1697330278497!5m2!1sid!2sid" width="400" style="border:0; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="hoverable"></iframe>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m7">
                <div class="collection with-header hoverable z-depth-2">

                    <ul>
                        <li class="collection-header">
                            <h4><?= $contact1->office_name ?><i class="bi bi-buildings-fill left color-base"></i></h4>
                        </li>

                        <li class="collection-item">
                            <i class="bi bi-buildings left color-base"></i>
                            <?= $contact1->address ?>
                        </li>

                        <li class="collection-item">
                            <i class="bi bi-whatsapp left color-base"></i>
                            <?= $contact1->phone ?>
                        </li>

                        <li class="collection-item">
                            <i class="bi bi-telephone-fill left color-base"></i>
                            <?= $contact1->telephone ?>
                        </li>

                        <li class="collection-item">
                            <i class="bi bi-envelope-fill left color-base"></i>
                            <?= $contact1->email ?>
                        </li>
                        <li class="collection-item">
                            <a href="https://maps.app.goo.gl/Xeq8bwpYVP4ofgj17" target="_blank" class="btn btn-large bg-btn">Tampilkan Penunjuk Arah <i class="bi bi-geo-fill right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col s12 m5">  
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.3131476542176!2d119.8751861!3d-0.9117706000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d8bedf41e3d56a5%3A0xf14ef7541c83144c!2sPT.AGUNG%20KARYA%20MANDIRI!5e0!3m2!1sid!2sid!4v1697330278497!5m2!1sid!2sid" width="400" style="border:0; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="hoverable"></iframe> -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15957.0156432989!2d119.8966547!3d-0.9637477!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d8bf159dec406b1%3A0x8206a623f21edca7!2sKANTOR%20PEMASARAN%20PERUM%20FAIRUZ%20KALUKUBULA!5e0!3m2!1sid!2sid!4v1697381837539!5m2!1sid!2sid" width="400" height="450" style="border:0; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="hoverable"></iframe>
            </div>
        </div>
    </div>
</section>
<?= $this->include('landing/section_wa') ?>
<?= $this->endSection() ?>