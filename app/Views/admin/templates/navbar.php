<header>
    <!-- Menu Bar -->
    <ul id="nav-mobile" class="side-nav fixed fourth-color white-text">
        <li class="title first-color white-text z-depth-2">
            <h5 class="container center">Admin Panel</h5>
        </li>
        <li class="divider"></li>
        <li class="menu-item <?= (isset($dashboard_active) ? $dashboard_active : '') ?>">
            <a class="waves-effect waves-light white-text menu-link" href="<?= base_url() ?>/dashboard">
                <i class="white-text bi bi-house-fill"></i>Dashboard
            </a>
        </li>
        <li class="divider"></li>
        <li class="menu-item <?= (isset($personal_active) ? $personal_active : '') ?>">
            <a class="waves-effect waves-light white-text menu-link" href="<?= base_url() ?>/admin/personal">
                <i class="white-text bi bi-person-fill"></i>Personal About
            </a>
        </li>
        <li class="divider"></li>
        <li class="menu-item <?= (isset($skills_active) ? $skills_active : '') ?>">
            <a class="waves-effect waves-light white-text menu-link" href="<?= base_url() ?>/admin/skills">
                <i class="white-text bi bi-pie-chart-fill"></i>Skills
            </a>
        </li>
        <li class="divider"></li>
        <li class="menu-item <?= (isset($contacts_active) ? $contacts_active : '') ?>">
            <a class="waves-effect waves-light white-text menu-link" href="<?= base_url() ?>/admin/contacts">
                <i class="white-text bi bi-telephone-fill"></i>Contacts
            </a>
        </li>
        <li class="divider"></li>
        <li class="menu-item <?= (isset($portfolio_active) ? $portfolio_active : '') ?>">
            <a class="waves-effect waves-light white-text menu-link" href="<?= base_url() ?>/admin/portfolio">
                <i class="white-text bi bi-images"></i>Portfolio
            </a>
        </li>
        <li class="divider"></li>
        <li class="menu-item <?= (isset($sliders_active) ? $sliders_active : '') ?>">
            <a class="waves-effect waves-light white-text menu-link" href="<?= base_url() ?>/admin/sliders">
                <i class="white-text bi bi-collection-fill"></i>Sliders
            </a>
        </li>
        <li class="divider"></li>
        <li class="menu-item <?= (isset($educational_active) ? $educational_active : '') ?>">
            <a class="waves-effect waves-light white-text menu-link" href="<?= base_url() ?>/admin/educational">
                <i class="white-text bi bi-trophy-fill"></i>Educational
            </a>
        </li>
        <li class="divider"></li>
        <li class="menu-item <?= (isset($services_active) ? $services_active : '') ?>">
            <a class="waves-effect waves-light white-text menu-link" href="<?= base_url() ?>/admin/services">
                <i class="white-text bi bi-grid-fill"></i>Services
            </a>
        </li>
        <li class="divider"></li>
        <li class="menu-item <?= (isset($faq_active) ? $faq_active : '') ?>">
            <a class="waves-effect waves-light white-text menu-link" href="<?= base_url() ?>/admin/faq">
                <i class="white-text bi bi-question-circle-fill"></i>FAQ
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
                    Subaru<sub>Admin</sub>
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