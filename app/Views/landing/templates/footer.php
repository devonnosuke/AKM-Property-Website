<!-- *** Footer Section *** -->
<footer class="page-footer grey darken-4">
    <div class="container">
        <div class="row">
            <div class="col m6 s12">
                <h5 class="white-text">AKM Properti</h5>
                <div class="bordering left"></div>

                <ul class="f-list">
                    <li><a class="white-text" href="#!">Fajri Arahim</a></li>
                    <li><a class="white-text" href="#!">Kaze Xandro</a></li>
                    <li><a class="white-text" href="#!">Devon Nosuke</a></li>
                    <li><a class="white-text" href="#!">Giano Jerman</a></li>
                </ul>
            </div>
            <div class="col m6 s12">
                <h5>#AKM_Properti</h5>
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
    <div class="footer-copyright grey darken-4">
        <div class="container center">
            <span class="grey-text text-lighten-4">Copyright 2021 © Yura Studios</span>
        </div>
    </div>
</footer>