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

        [type="checkbox"]:checked+label:before {
            border-right: 2px solid #7b1fa2;
            border-bottom: 2px solid #7b1fa2;
        }

        .input-field {
            margin: 1.5em auto;
            margin-bottom: 1.5rem;
            width: 80%;
        }

        .checkbox-field {
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
            margin-top: 0;
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
                    <h4 class="purple-text text-darken-2">Form Login</h4>
                    <img class="responsive-img" width="200" src="<?= base_url() ?>/img/g57664.png">
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

                <form action="<?= route_to('login') ?>" method="post" class="form">
                    <?= csrf_field() ?>

                    <div class="input-field">

                        <input type="text" class="<?= (session('errors.login')) ? 'invalid' : '' ?>" name="login" id="username" value="<?= old("login") ?>">

                        <label for="username" <?= errorMsgCheck(session('errors.login')) ?>>Masukkan Username</label>


                    </div>
                    <div class="input-field">

                        <div class="input-field pwd">

                            <input type="password" class="<?= (session('errors.password')) ? 'invalid' : '' ?>" name="password" id="password">

                            <label for="password" <?= errorMsgCheck(session('errors.password')) ?>>Masukkan Password</label>


                        </div>
                        <p class="checkbox">
                            <!-- <input type="checkbox" name="tooglepwd" id="tooglepwd"> -->
                            <span for="tooglepwd" onclick="tooglePwd()"><i class="bi bi-eye-slash" id="eye"></i></span>
                        </p>

                    </div>
                    <!-- <p>

                        <input type="checkbox" name="remember" id="remember">

                        <label for="remember">Ingat saya</label>

                    </p> -->
                    <?php if ($config->allowRemembering) : ?>
                        <p class="checkbox-field center">
                            <input type="checkbox" name="remember" id="remember" <?php if (old('remember')) : ?> checked <?php endif ?>>
                            <label for="remember"> <?= lang('Auth.rememberMe') ?> <i>(for 7 Days)</i></label>
                        </p>
                    <?php endif; ?>

                    <div class="submit-field center-align">

                        <button type="submit" class="btn btn-submit purple darken-2 waves-effect waves-light btn-large">
                            <span class="btn-text"> <i class="bi bi-box-arrow-in-left right"></i> login</span>
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