<header>
    <!-- Menu Bar -->
    <ul id="nav-mobile" class="side-nav fixed fourth-color white-text">
        <li class="title first-color white-text z-depth-2">
            <h5 class="container center">AKM App</h5>
        </li>
        <li class="divider"></li>
        <li class="menu-item <?= (isset($dashboard_active) ? $dashboard_active : '') ?>">
            <a class="waves-effect waves-light white-text menu-link" href="<?= base_url() ?>/dashboard">
                <i class="white-text bi bi-speedometer"></i>Dashboard
            </a>
        </li>
        <li class="divider"></li>
        <li class="menu-item <?= (isset($property_active) ? $property_active : '') ?>">
            <a class="waves-effect waves-light white-text menu-link" href="<?= base_url() ?>/admin/property">
                <i class="white-text bi bi-house-fill"></i>Properti/Perumahan
            </a>
        </li>
        <li class="divider"></li>
        <li class="menu-item <?= (isset($promo_active) ? $promo_active : '') ?>">
            <a class="waves-effect waves-light white-text menu-link" href="<?= base_url() ?>/admin/promo">
                <i class="white-text bi bi-tags-fill"></i>Promosi
            </a>
        </li>
        <li class="divider"></li>
        <li class="menu-item <?= (isset($contacts_active) ? $contacts_active : '') ?>">
            <a class="waves-effect waves-light white-text menu-link" href="<?= base_url() ?>/admin/contacts">
                <i class="white-text bi bi-telephone-fill"></i>Kontak Kantor
            </a>
        </li>
        <li class="divider"></li>
        <li class="menu-item">
            <a class="waves-effect waves-red white-text logout-btn" href="<?= base_url('logout') ?>">
                <i class="bi bi-box-arrow-left white-text">arrow_back</i>Logout
            </a>
        </li>
    </ul>

    <!-- topbar -->
    <div class="navbar-fixed">
        <nav class="second-color">
            <div class="nav-wrapper">
                <div class="container">
                    <a href="#" data-activates="nav-mobile" class="button-collapse top-nav waves-effect waves-light circle hide-on-large-only">
                        <i class="bi bi-list"></i>
                    </a>
                </div>
                <a href="#" class=" brand-logo">
                    AKM<sub>Admin</sub>
                </a>
                <div class="menu-wraper">
                    <ul class="right hide-on-med-and-down">
                        <li class="hello flow-text">
                            <span id="hello">Good ......</span>
                        </li>
                        <li>
                            <i class="bi bi-calendar-event left"></i>
                            <span id="date">D, d MM 0000</span>
                        </li>
                        <li>
                            <i class="bi bi-clock left"></i>
                            <span id="jam">00.00</span>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>