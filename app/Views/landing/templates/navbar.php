    <!-- Back to top button -->
    <a class="btn-to-top btn btn-medium waves-effect bg-btn white-text waves-dark tooltipped back-to-top" href="#home" data-position="left" data-delay="50" data-tooltip="Back to top"><i class="bi bi-chevron-bar-up"></i></a>
    <!-- <a class="wa-btn btn btn-medium waves-effect bg-btn white-text waves-dark tooltipped back-to-top" href="#about" data-position="left" data-delay="50" data-tooltip="Chat WA"><i class="bi bi-whatsapp"></i></a> -->
    <a href="#wa-chat" class="btn wa-btn green darken-3 btn-floating pulse"><i class="bi bi-whatsapp"></i></a>
    <!-- **** Navbar Secion ***-->
    <div class="navbar-fixed" id="navbar">
        <nav class="nav-index bg-nav">
            <div class=" container">
                <div class="nav-wrapper">
                    <?php
                    $base = '';
                    ($title != 'Landing Pages' ) ? $base = base_url() . '/' : $base = '';
                    ?>
                    <!-- Menu Button -->
                    <a href="#" data-activates="slide-out" class="button-collapse nav-link"><i class="bi bi-list"></i></a>
                    <!-- The Logo Brand -->
                    <a href="<?= $base ?>#home" class="brand-logo nav-link">
                    <svg
                    viewBox="0 0 342.19336 40.430176"
                    version="1.1"
                    id="svg5"
                    xml:space="preserve"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:svg="http://www.w3.org/2000/svg"><defs
                        id="defs2" /><g
                        id="layer1"
                        transform="translate(-14540.16,-4341.2148)"><text
                        xml:space="preserve"
                        style="font-style:normal;font-variant:normal;font-weight:500;font-stretch:normal;font-size:26.3788px;font-family:Oswald;-inkscape-font-specification:'Oswald, Medium';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal;text-align:center;text-anchor:middle;fill-opacity:1;stroke:none;stroke-width:4.18439;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;paint-order:markers stroke fill"
                        x="14744.63"     
                        y="4372.0869"
                        id="text366"><tspan
                            id="tspan364"
                            x="14744.63"
                            y="4372.0869"
                            style="font-style:normal;font-variant:normal;font-weight:500;font-stretch:normal;font-size:26.3788px;font-family:Oswald;-inkscape-font-specification:'Oswald, Medium';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal;fill-opacity:1;stroke:none;stroke-width:4.18439;stroke-dasharray:none">PT. AGUNG <tspan
                    style="fill-opacity:1;stroke:none;stroke-width:4.18439"
                    id="tspan362">KARYA MANDIRI</tspan></tspan></text><path
                        id="path356"
                        style="fill-opacity:1;stroke-width:0.45258;stroke-linecap:round;paint-order:markers stroke fill"
                        d="m 14568.899,4381.5979 -14.369,0.017 -14.37,-0.017 6.974,-19.3576 7.396,-21.0217 7.395,21.0217 z" /><path
                        id="path358"
                        style="fill:none;stroke-width:0.888899;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:1;paint-order:markers stroke fill"
                        d="m 14560.738,4353.3697 10.608,27.8311 h 9.915 l -10.605,-27.8311 z m 11.433,0 10.448,27.8311 h 9.917 l -10.446,-27.8311 z m 11.128,0 10.425,27.8245 h 9.919 l -10.426,-27.8245 z" /><path
                        id="path360"
                        style="fill-opacity:1;stroke-width:0.609123;stroke-linecap:round;paint-order:markers stroke fill"
                        d="m 14555.876,4341.2146 h 42.231 l -4.855,10.3774 h -33.317 z" /></g></svg>
                    </a>
                    <!-- %%% Dekstop Nav %%% -->
                    <ul class="right hide-on-med-and-down">
                        <li class="<?= (isset($index_active) ? $index_active : '') ?>"><a class="nav-link" href="<?= base_url() ?>/">Home</a></li>
                        <li class="<?= (isset($property_active) ? $property_active : '') ?>"><a class="nav-link" href="<?= base_url() ?>/properti">Properti</a></li>
                        <li class="<?= (isset($promo_active) ? $promo_active : '') ?>"><a class="nav-link" href="<?= base_url() ?>/promo">Promo</a></li>
                        <li class="<?= (isset($contact_active) ? $contact_active : '') ?>"><a class="nav-link" href="<?= base_url() ?>/contact">Alamat Kami</a></li>
                    </ul>
                    <!-- %%% Mobile Nav %%% -->
                    <ul id="slide-out" class="side-nav grey darken-4">
                        <ul class="collapsible" data-collapsible="accordion">
                            <li class="daftar-menu">
                                <div class="collapsible-header waves-effect waves-light black-text grey-text text-darken-4">
                                    <span class="icon-nav-menu">
                                        <img src="<?= base_url() ?>/assets/img/logo-small.png" class="left" alt="">
                                        <span>AKM</span>
                                    </span>
                                </div>
                            </li>
                        </ul>
                        <li><a class="subheader">Menu Navigasi</a></li>
                        <li class="<?= (isset($index_active) ? $index_active : '') ?>"><a class="waves-effect waves-light mobile" href="<?= base_url() ?>/"><i class="bi bi-house-fill left"></i>Halaman Utama</a></li>
                        <li class="<?= (isset($property_active) ? $property_active : '') ?>"><a class="waves-effect waves-light mobile" href="<?= base_url() ?>/properti"><i class="bi bi-houses-fill left"></i>Properti</a></li>
                        <li class="<?= (isset($promo_active) ? $promo_active : '') ?>"><a class="waves-effect waves-light mobile" href="<?= base_url() ?>/promo"><i class="bi bi-tags-fill left"></i>Promo</a></li>
                        <li class="<?= (isset($contact_active) ? $contact_active : '') ?>"><a class="waves-effect waves-light mobile" href="<?= base_url() ?>/contact"><i class="bi bi-geo-alt-fill left"></i>Alamat Kami</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>