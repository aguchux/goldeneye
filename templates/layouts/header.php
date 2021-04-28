<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <base href="<?= $self->config('domain') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- All CSS -->
    <link rel="stylesheet" href="<?= $assets ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $assets ?>/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= $assets ?>/css/slick.css">
    <link rel="stylesheet" href="<?= $assets ?>/css/animate.min.css">
    <link rel="stylesheet" href="<?= $assets ?>/css/flaticon.css">
    <link rel="stylesheet" href="<?= $assets ?>/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= $assets ?>/css/meanmenu.css">
    <link rel="stylesheet" href="<?= $assets ?>/css/default.css">
    <link rel="stylesheet" href="<?= $assets ?>/css/style.css?var=29208229">
    <link rel="stylesheet" href="<?= $assets ?>/css/responsive.css">

    <title><?= $title ?></title>

    <script type="text/javascript" src="translate_a/f.txt?cb=googleTranslateElementInit"></script>
    <style>
        /* styles for google translate */
        #google_translate_element {
            position: relative;
            top: 7px;
        }

        .goog-te-banner-frame,
        .goog-logo-link {
            display: none !important;
        }

        .goog-te-gadget {
            color: transparent !important;
        }

        body {
            top: 0px !important;
        }

        .goog-te-combo {
            border-radius: 25px;
            padding: 4px 0px !important;
        }

        .goog-te-combo:focus {
            outline: none !important;
        }

        .translateBtn {
            margin: 0px !important;
            vertical-align: middle;
        }
    </style>
</head>

<body style="padding-top: 0;">

    <!-- loading  -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="sk-double-bounce">
                    <div class="sk-child sk-double-bounce1"></div>
                    <div class="sk-child sk-double-bounce2"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- loading end -->
    <!-- header -->
    <header>

        <div id="sticky-header" class="main-header header-r-p" style="margin-top: 0;">
            <div class="containers conremove">
                <div class="row align-items-center containers conremove">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="./"><img width="193" style="display: none;" class="hidesticky" src="<?= $assets ?>/img/logo-c.png" alt="logo"><img style="display: none;" width="193" class="showsticky" src="<?= $assets ?>/img/logo1.png" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-10 text-right">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="hovereffect platformslist"><a href="/pages/platforms">TRADING PLATFORMS</a></li>

                                    <li class="educationlist"><a href="#">Education <i class="fas fa-angle-down"></i></a>
                                        <ul class="submenu dropdownlinks">
                                            <li><a href="/pages/education/economic-calendar">Economic Calendar</a></li>
                                            <li><a href="/pages/education/trading-signals">Trading Signals</a></li>
                                            <li><a href="/pages/education/market">Market Analysis</a></li>
                                            <li><a href="/pages/education/training">Training</a></li>

                                        </ul>
                                    </li>


                                    <li class="servicelist"><a href="#">Our Service <i class="fas fa-angle-down"></i></a>
                                        <ul class="submenu dropdownlinks">
                                            <li><a href="/pages/services/mam-pamm">MAM&nbsp;&&nbsp;PAMM&nbsp;Accounts</a></li>
                                            <li><a href="/pages/services/copy-trading">Copy Trading</a></li>
                                            <li><a href="/pages/services/autochartist">Autochartist</a></li>

                                        </ul>
                                    </li>
                                    <li class="aboutlist"><a href="#">About <i class="fas fa-angle-down"></i></a>
                                        <ul class="submenu dropdownlinks">
                                            <li><a href="/pages/about">Who we are</a></li>
                                            <li><a href="/pages/contact">Contact Us</a></li>

                                        </ul>
                                    </li>
                                    <li class="loginbtn first"><a href="/auth/login">Login</a></li>
                                    <li class="loginbtn last"><a href="/auth/register">Register</a></li>
                                    <li class="translateBtn">
                                        <div id="google_translate_element"></div>
                                        <script type="text/javascript">
                                            function googleTranslateElementInit() {
                                                new google.translate.TranslateElement({
                                                    pageLanguage: 'en'
                                                }, 'google_translate_element');
                                            }
                                        </script>
                                    </li>
                                    <li class="languages last" style="display: none;"><a href="#"><img src="<?= $assets ?>/img/en-flag.jpg" alt="En">English <i class="fas fa-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="/de/index.php"><img src="<?= $assets ?>/img/ge-flag.png" alt="">German</a></li>
                                            <li><a href="/it/index.php"><img src="<?= $assets ?>/img/it-flag.jpg" alt="">Italian</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                        <div class="mobile-menu"></div>
                    </div>



                </div>
            </div>
        </div>
    </header>

    <!-- header-end -->