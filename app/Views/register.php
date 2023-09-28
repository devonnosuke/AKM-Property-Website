<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Subaru Admin Panel | Login Form</title>
    <!-- CSS Materialize -->
    <!-- <link href="<?= base_url() ?>/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection" /> -->
    <link href="<?= base_url() ?>/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <!-- Roboto Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

    <!-- Own CSS -->
    <link href="<?= base_url() ?>/css/form_style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link class="css-href" href="<?= base_url() ?>/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <!-- Bootsrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
        .card-panel {
            padding: 2rem;
            margin: 4vh 30vw;
        }

        @media only screen and (max-width:601px) {
            .card-panel {
                margin: 8px 8vw;
                padding: 2rem 0 !important;
            }

            .input-field {
                width: 90%;
            }

            .submit-field {
                padding: 15px 0;
                margin: -1em auto !important;
            }

            img.responsive-img {
                width: 35vw;
            }
        }

        .card-panel {
            padding: 10px 30px;
        }

        .input-field {
            margin: 1.5em auto;
            margin-bottom: 1.5rem;
            width: 80%;
        }

        .checkbox {
            margin: 1.5em auto;
            margin-bottom: 1.5rem;
            display: inline-block;
            width: 5%;
        }

        .submit-field {
            margin: 2.5em auto;
            margin-bottom: 1.5rem;
            width: 75%;
        }

        h4 {
            text-align: center !important;
            font-weight: bolder;
            font-size: 20pt;
            margin-bottom: 20pt;
        }

        body {
            overflow-y: hidden;
        }


        p.checkbox,
        label i.bi {
            cursor: pointer;
        }

        .container {
            width: 80% !important;
        }

        .input-field.pwd {
            display: inline-block;
            width: 90%;
        }
    </style>
</head>

<body>
    <div class="row container-login login-img" style="padding: 0; margin: 0">

        <div class="col s12" style="margin: 0; padding: 2%;">

            <div class="card-panel hoverable">

                <div class="center">
                    <h4 class="purple-text text-darken-2"><?= lang('Auth.register') ?></h4>
                </div>

                <?php
                function errorMsgCheck($errMsg)
                {
                    if ($errMsg) {
                        return 'data-error="' . $errMsg . '"';
                    }
                }
                if (session()->has('error')) : ?>
                    <div class="alert alert-danger" data-message="<?= session('error') ?>">

                    </div>
                <?php endif ?>

                <form action="<?= route_to('register') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="input-field">
                        <input type="email" class="<?php if (session('errors.email')) : ?>invalid<?php endif ?>" name="email" value="<?= old('email') ?>">
                        <label for="email" <?= errorMsgCheck(session('errors.email')) ?>><?= lang('Auth.email') ?></label>
                        <!-- <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small> -->
                    </div>

                    <div class="input-field">
                        <input type="text" class="<?php if (session('errors.username')) : ?>invalid<?php endif ?>" name="username" value="<?= old('username') ?>">
                        <label for="username" <?= errorMsgCheck(session('errors.username')) ?>><?= lang('Auth.username') ?></label>
                    </div>

                    <div class="input-field">
                        <input type="password" name="password" class="<?php if (session('errors.password')) : ?>invalid<?php endif ?>" autocomplete="off">
                        <label for="password" <?= errorMsgCheck(session('errors.password')) ?>><?= lang('Auth.password') ?></label>
                    </div>

                    <div class="input-field">
                        <input type="password" name="pass_confirm" class="<?php if (session('errors.pass_confirm')) : ?>invalid<?php endif ?>" autocomplete="off">
                        <label for="pass_confirm" <?= errorMsgCheck(session('errors.pass_confirm')) ?>><?= lang('Auth.repeatPassword') ?></label>
                    </div>

                    <div class="submit-field center-align">

                        <button type="submit" class="btn btn-submit purple darken-2 waves-effect waves-light btn-large">
                            <span class="btn-text"> <i class="bi bi-box-arrow-in-left right"></i> <?= lang('Auth.register') ?></span>
                            <img src="<?= base_url() ?>/loading.webp" class="loading-icon">
                        </button>

                    </div>
                </form>

            </div>

        </div>


    </div>
    <div class="row">
        <div class="col s12 m12 footer" style="padding: 0; margin: 0">

            <!-- Footer -->

            <footer class="page-footer first-color footer-copyright">

                <div class="container">

                    <span class="hide-on-small-only">Yura Development</span>

                    <a class="grey-text text-lighten-4 right" href="https://yura.co.id/pada suatu hari">© 2021 Yura Company.</a>

                </div>

            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
    <!-- <script src="<?= base_url() ?>/js/sweetalert2.all.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/js/materialize.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

    <script src="<?= base_url() ?>/js/init.js"></script>
</body>

</html>