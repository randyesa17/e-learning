<!DOCTYPE html>
<html lang="en">
<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Site Metas -->
<title>E-Learning SMAN 1 Sindang</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<!-- site icon -->
<link rel="icon" href="images/fevicon.png" type="image/png" />
<!-- Bootstrap core CSS -->
<link href="<?= site_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
<!-- FontAwesome Icons core CSS -->
<link href="<?= site_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
<!-- Custom animate styles for this template -->
<link href="<?= site_url('assets/css/animate.css') ?>" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="<?= site_url('assets/css/style.css') ?>" rel="stylesheet">
<!-- Responsive styles for this template -->
<link href="<?= site_url('assets/css/responsive.css') ?>" rel="stylesheet">
<!-- Colors for this template -->
<link href="<?= site_url('assets/css/colors.css') ?>" rel="stylesheet">
<!-- light box gallery -->
<link href="<?= site_url('assets/css/ekko-lightbox.css') ?>" rel="stylesheet">
<!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
   <![endif]-->
</head>

<body id="home_page" class="home_page">
    <!-- header -->
    <header class="header">

        <div class="header_top_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="full">
                            <div class="logo">
                                <a href="<?= site_url() ?>"><img width="150px"
                                        src="<?= site_url('assets/images/logo.png') ?>" alt="#" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 site_information">
                        <div class="full">
                            <div class="main_menu">
                                <nav class="navbar navbar-inverse navbar-toggleable-md">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#cloapediamenu" aria-controls="cloapediamenu" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                        <span class="float-left">Menu</span>
                                        <span class="float-right"><i class="fa fa-bars"></i> <i
                                                class="fa fa-close"></i></span>
                                    </button>
                                    <div class="collapse navbar-collapse justify-content-md-center" id="cloapediamenu">
                                        <ul class="navbar-nav">
                                            <li class="nav-item active">
                                                <a class="nav-link" href="<?= site_url() ?>">Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link color-aqua-hover"
                                                    href="<?= site_url('tentang') ?>">Tentang</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link color-grey-hover"
                                                    href="<?= site_url('siswa') ?>">Login Siswa</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link color-grey-hover"
                                                    href="<?= site_url('guru') ?>">Login Guru</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <!-- end header -->

    <!-- section -->
    <section class="main_full banner_section_top">
        <div class="container-fluid">
            <div class="row">
                <div class="full">
                    <div class="slider_banner">
                        <img class="img-responsive"
                            style="opacity: 0.6; position: relative; margin:20px 0; border-radius:  50% / 10%;"
                            src="<?= site_url('assets/images/slider_img.jpg') ?>" alt="#" />
                        <div class="slide_cont">
                            <?= $this->renderSection('content') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->


    <div class="cpy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>&copy; Copyright 2021. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer -->
    <!-- Core JavaScript
         ================================================== -->
    <script src="<?= site_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= site_url('assets/js/tether.min.js') ?>"></script>
    <script src="<?= site_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= site_url('assets/js/parallax.js') ?>"></script>
    <script src="<?= site_url('assets/js/animate.js') ?>"></script>
    <script src="<?= site_url('assets/js/ekko-lightbox.js') ?>"></script>
    <script src="<?= site_url('assets/js/custom.js') ?>"></script>
</body>

</html>