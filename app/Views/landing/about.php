<?= $this->extend('landing/templates/base') ?>
<?= $this->section('content') ?>
<section class="portfolio greyen-4">
    <div class="container">

        <div class="heading-text">    
            <h2 class="grey-text text-darken-3 left-align">Tentang Kami</h2>
            <div class="left"></div>
        </div>

        <img src="<?= base_url(); ?>/about.png" alt="about AKM Property" class="responsive-img">

        <div class="row">
            <div class="col s12">
                <h4>Profile perusahaan</h4>
                <?= $about['profile'] ?>
            </div>
            <div class="col s6">
                <h5>Visi</h5>
                <?= $about['visi'] ?>
            </div>
            <div class="col s6">
                <h5>Misi</h5>
                <?= $about['misi'] ?>
            </div>
        </div>
    </div>
</section>
<?= $this->include('landing/section_wa') ?>
<?= $this->endSection() ?>