<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
  <meta name="description" content="<?= $personal->about_text ?>">
  <title><?= $title ?></title>
  <!-- CSS Materialize -->
  <link href="<?= base_url() ?>/assets/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <!-- Compiled and minified CSS -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"> -->

  <!-- Own CSS -->
  <!-- Load Font -->
  <!-- <link href="<?= base_url() ?>/assets/css/font.css" type="text/css" rel="stylesheet" media="screen,projection" /> -->
  <!-- Load Form Style -->
  <!-- <link href="/assets/css/form_style.css" type="text/css" rel="stylesheet" media="screen,projection" /> -->

  <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet"> -->
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;800&family=Oswald:wght@200;300;400;500;600;700&display=swap');
</style>

  <!-- Load Style -->
  <link href="<?= base_url() ?>/assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="<?= base_url() ?>/assets/css/style2.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="<?= base_url() ?>/assets/css/form_style.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/lightgallery.min.css" />
  <!-- Bootsrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body id="home" class="scrollspy" data-info="<?= session()->getFlashdata('info') ?>" style="--color: <?= (isset($property['color']))?"$property[color]":"darkred"?>;">

  <?= $this->include('landing/templates/navbar') ?>
  <?= $this->renderSection('content') ?>
  <?= $this->include('landing/templates/footer') ?>
  <!-- Scripts -->
  <!-- <script src="/assets/js/jquery-3.4.1.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <!-- <script src="<?= base_url() ?>/assets/js/materialize.min.js"></script> -->
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  
  <script src="<?= base_url() ?>/assets/js/lightgallery.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/lg-fullscreen.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/lg-zoom.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/lg-thumbnail.min.js"></script>

  <script src="<?= base_url() ?>/assets/js2/init.js"></script>    
</body>

</html>