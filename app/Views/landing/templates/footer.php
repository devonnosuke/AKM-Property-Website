<!-- *** Footer Section *** -->
<footer class="page-footer cyan darken-3">
    <div class="container">
        <div class="row">
            <?php $col = 'l6'; ?>
            <?php if ($title != "Contact us") : ?>
                <?php $col = 'l3'; ?>
                <div class="col l6 s12 col contact-col">
                    <div class="card-panel card-contact left white darken-2 grey-text text-darken-2">
                        <h5>Send us a message</h5>
                        <form action="<?= base_url() ?>/sendMail" method="POST">
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
            <?php endif; ?>
            <div class="col <?= $col ?> s12">
                <h5 class="white-text">Member Team B.U.L.L.Y
                    Kerja Kerja Kerja, eh jadi CEO!</h5>
                <ul class="f-list">
                    <li><a class="white-text" href="#!">Fajri Arahim</a></li>
                    <li><a class="white-text" href="#!">Kaze Xandro</a></li>
                    <li><a class="white-text" href="#!">Devon Nosuke</a></li>
                    <li><a class="white-text" href="#!">Giano Jerman</a></li>
                    <li><a class="white-text" href="#!">Irvan PermanaX</a></li>
                    <li><a class="white-text" href="#!">Jindan Manusia</a></li>
                    <li><a class="white-text" href="#!">Pandye</a></li>
                </ul>
            </div>
            <div class="col <?= $col ?> s12">
                <h5>#Akasaka_Devonosuke</h5>
                <h5 class="white-text footer-h5"><b>Follow us</b></h5>
                <ul class="sosmed-footer">
                    <li>
                        <?php foreach ($social as $s) : ?>
                            <a href="<?= $s->link ?>" target="_blank">
                                <i class="bi bi-<?= $s->contact_type ?>"></i>
                                <p style="display: none;"><?= $s->contact_type ?></p>
                            </a>
                        <?php endforeach; ?>
                    </li>
                    <hr style="border: 1px solid white" class="left" width="15%">
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <span class="grey-text text-lighten-4">Copyright 2021 © Yura Studios</span>
            <a class="grey-text text-lighten-4 right" href="#">Development by Akasaka Devonosuke / Dai Jumana Pradha</a>
        </div>
    </div>
</footer>