<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>AKM Admin App | <?= $title ?></title>
    <!-- CSS Materialize -->
    <link href="<?= base_url() ?>/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <!-- Roboto Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

    <!-- Own CSS -->
    <link href="<?= base_url() ?>/css/form_style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link class="css-href" href="<?= base_url() ?>/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/lightgallery.min.css" />
    
    <!-- Bootsrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body style="--color:#aa0000ff;">
    <div class="preloader center">
        <div class="loading card-panel">
            <div class="preloader-wrapper small active">
                <div class="spinner-layer spinner-red-only center">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mini-preloader">
        <div class="card-panel mini-loading z-depth-2">
            <div class="preloader-wrapper extra-small active">
                <div class="spinner-layer spinner-blue-only">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('admin/templates/navbar') ?>
    <?= $this->renderSection('main') ?>
    <?= $this->include('admin/templates/footer') ?>
    <!-- Scripts -->
    <!-- <script src="<?= base_url() ?>/js/jquery-3.4.1.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
    <!-- <script src="<?= base_url() ?>/js/sweetalert2.all.min.js"></script> -->
    <script src="<?= base_url() ?>/js/materialize.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script> -->

    <script src="<?= base_url() ?>/assets/js/lightgallery.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/lg-fullscreen.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/lg-zoom.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/lg-thumbnail.min.js"></script>

    <script src="<?= base_url() ?>/js/init.js"></script>
</body>

</html>