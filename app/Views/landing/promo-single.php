<?= $this->extend('landing/templates/base') ?>
<?= $this->section('content') ?>
    <div class="container">

        <div class="heading-text">    
            <h2 class="grey-text text-darken-3 left-align"><?= $promo['nama_promo']; ?>!</h2>
            <div class="left"></div>
        </div>

        <div class="row promo">
            <div class="col s12 m6">
                <div id="promo-img" class="card-panel hoverable">
                    <a href="<?= base_url() ?>/assets/img/promo/<?= $promo['brosur']; ?>">
                        <img src="<?= base_url() ?>/assets/img/promo/<?= $promo['brosur']; ?>" class="responsive-img" alt="<?= $promo['slug']; ?>">
                    </a>
                </div>
            </div>
            <div class="col s12 m6">
                <blockquote class="flow-text">
                    <p><span>Nama Promo : </span><?= $promo['nama_promo']; ?></p>
                </blockquote>
                <blockquote class="flow-text">
                    <p>
                        <span>Bonus: </span>
                        <?php $bonus = splitString($promo['bonus'], ',') ?>
                        <?php foreach($bonus as $bo): ?>
                            <div class="chip"><i class="bi bi-check-circle left"></i><?= $bo; ?></div>
                            <?php endforeach; ?>
                        </p>
                </blockquote>
                <blockquote class="flow-text">
                    <p>
                        <span>Bebas/Free: </span>
                        <?php $bebas = splitString($promo['bebas'], ',') ?>
                        <?php foreach($bebas as $be): ?>
                            <div class="chip"><i class="bi bi-check-circle left"></i><?= $be; ?></div>
                            <?php endforeach; ?>
                        </p>
                    </blockquote>
                <blockquote class="flow-text">
                    <p><span>deskripsi: </span><?= $promo['deskripsi']; ?></p>
                </blockquote>

                <a href="<?= base_url() ?>/properti/<?= $property['slug']; ?>" class="btn more btn-large light-green darken-3 waves-effect waves-dark z-depth-0 btn-cta">Cek Properti Selengkapnya!</a>
                
                <p>*Klik tombol diatas untuk informasi Hunian selengkapnya </p>
            </div>
        </div>
    </div>
</section>
<?= $this->include('landing/section_wa') ?>
<?= $this->endSection() ?>