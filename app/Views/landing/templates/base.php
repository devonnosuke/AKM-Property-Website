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

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

  <!-- Load Style -->
  <link href="<?= base_url() ?>/assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

  <!-- Bootsrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body id="home" class="scrollspy" data-info="<?= session()->getFlashdata('info') ?>">

  <?= $this->include('landing/templates/navbar') ?>
  <?= $this->renderSection('content') ?>
  <?= $this->include('landing/templates/footer') ?>
  <!-- Scripts -->
  <!-- <script src="/assets/js/jquery-3.4.1.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <!-- <script src="<?= base_url() ?>/assets/js/materialize.min.js"></script> -->
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script src="<?= base_url() ?>/assets/js2/init.js"></script>
</body>

</html>