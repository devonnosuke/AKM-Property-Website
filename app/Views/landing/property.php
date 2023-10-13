<?= $this->extend('landing/templates/base') ?>
<?= $this->section('content') ?>
<section class="portfolio greyen-4">
    <div class="container">

        <div class="heading-text">    
            <h2 class="grey-text text-darken-3 left-align">Proyek Kami</h2>
            <div class="left"></div>
        </div>

        <div class="row">
            <div class="col s12 m6">
                <div class="collection with-header hoverable z-depth-2">

                    <ul>

                        <li class="collection-header">
                            <h4>Alamat Kantor <i class="bi bi-buildings-fill left color-base"></i></h4>
                        </li>

                        <li class="collection-item">
                            <i class="bi bi-geo-alt-fill left color-base"></i>
                            <?= $contact->address ?>
                        </li>

                        <li class="collection-item">
                            <i class="bi bi-mailbox2 left color-base"></i>
                            <?= $contact->country ?>
                        </li>

                        <li class="collection-item">
                            <i class="bi bi-phone-fill left color-base"></i>
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
                            <a href="#" class="btn btn-large bg-btn">Tampilkan Penunjuk Arah <i class="bi bi-geo-fill right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col s12 m6">
                <iframe style="width: 100%;" class="hoverable" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=119.87933635711671%2C-0.9010268385335538%2C119.88232970237733%2C-0.899393574854254&amp;layer=mapnik&amp;marker=-0.9002102067853512%2C119.88083302974701" style="border: 1px solid black"></iframe><br /><small><a href="https://www.openstreetmap.org/?mlat=-0.90021&amp;mlon=119.88083#map=19/-0.90021/119.88083">View Larger Map</a></small>
            </div>
        </div>
        <div class="row center valign-wrapper">
            <div class="col s12">
                <div class="card-panel card-contact left white darken-2 grey-text text-darken-2 hoverable">
                    <i class="bi bi-whatsapp"></i>
                    <h6>Kirim pertanyaan langsung ke WA</h6>
                    <form action="<?= base_url() ?>/sendMail" method="POST" class="contact">
                        <div class="input-field">
                            <input type="text" name="name" id="name" required class="validate">
                            <label class="" for="name">nama</label>
                        </div>
                        <div class="input-field">
                            <textarea name="message" rows="55" id="message" class="materialize-textarea" required ></textarea>
                            <label class="" for="message">Tulis pertanyaanmu disini</label>
                        </div>
                        <button class="btn waves-effect waves-light right btn-large bg-btn">Kirim Ke WA Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>