<?= $this->extend('landing/templates/base') ?>
<?= $this->section('content') ?>
<section class="portfolio greyen-4">
    <div class="container">
        <h1 class="header center cyan-text text-darken-1">Contact us</h1>
        <div class="row center">
            <h5 class="header col s12">A place of my photos, images or screenshots for portfolios.</h5>
        </div>
        <div class="row valign-wrapper">
            <div class="col s12 m6">
                <div class="collection with-header hoverable z-depth-2">

                    <ul>

                        <li class="collection-header">
                            <h4>Office</h4>
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
                            <i class="bi bi-phone-fill left"></i>
                            <?= $contact->phone ?>
                        </li>

                        <li class="collection-item">
                            <i class="bi bi-telephone-fill left"></i>
                            <?= $contact->telephone ?>
                        </li>

                        <li class="collection-item">
                            <i class="bi bi-envelope-fill left"></i>
                            <?= $contact->email ?>
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
                    <h5>Send us a message</h5>
                    <form action="<?= base_url() ?>/sendMail" method="POST" class="contact">
                        <div class="input-field">
                            <input type="text" name="name" id="name" required class="validate">
                            <label class="" for="name">Name</label>
                        </div>
                        <div class="input-field">
                            <input type="email" name="email" id="email" required class="validate">
                            <label class="" for="email">Email</label>
                        </div>
                        <div class="input-field">
                            <textarea name="message" id="message" class="materialize-textarea" required></textarea>
                            <label class="" for="message">Type your message here</label>
                        </div>
                        <button class="btn cyan darken-2 waves-effect waves-light right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>