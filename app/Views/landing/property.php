<?= $this->extend('landing/templates/base') ?>
<?= $this->section('content') ?>
<section class="portfolio greyen-4">
    <div class="container">

        <div class="heading-text">    
            <h2 class="grey-text text-darken-3 left-align">Proyek Kami</h2>
            <div class="left"></div>
        </div>

        <div class="row">
            <div class="col s12 m7">
            <div class="card card-property">
                <div class="card-image">
                <img src="<?= base_url() ?>/assets/img/property/properti 03 Oct 2023 [05.01-PM] 1696370489.jpg">
                <span class="card-title">Tipe/Nama Properti</span>
                </div>
                <div class="card-content">
                <p>Alamat/nama jalan</p>
                <p>lt/lb</p>
                <p>area</p>
                </div>
                <div class="card-action">
                <a href="#" class="btn btn medium bg-btn waves-effect waves-dark">Lihat Selengkapnya</a>
                </div>
            </div>
            </div>
        </div>
        <?= $this->include('landing/section_wa') ?>
    </div>
</section>
<?= $this->endSection() ?>