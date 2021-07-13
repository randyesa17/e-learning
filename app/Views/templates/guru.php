<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning | Halaman Guru</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= site_url('assets/dashgum/css/bootstrap.css') ?>">
    <!--external css-->
    <link rel="stylesheet" href="<?= site_url('assets/dashgum/font-awesome/css/font-awesome.css') ?>">
    <link rel="stylesheet" href="<?= site_url('assets/dashgum/css/zabuto_calendar.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?= site_url('assets/dashgum/js/gritter/css/jquery.gritter.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?= site_url('assets/dashgum/lineicons/style.css') ?>" type="text/css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?= site_url('assets/dashgum/css/style.css') ?>">
    <link rel="stylesheet" href="<?= site_url('assets/dashgum/css/style-responsive.css') ?>">

    <script src="<?= site_url('assets/dashgum/js/chart-master/Chart.js') ?>"></script>
</head>

<body>
    <section id="container">
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="<?= site_url('guru') ?>" class="logo"><b>Halaman Guru</b></a>
            <!-- logo end -->
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?= site_url('guru/logout') ?>">Logout</a></li>
                </ul>
            </div>
        </header>
        <!--header end-->
        <?php
        $uri = service('uri');
        ?>
        <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        <aside>
            <div class="nav-collapse" id="sidebar">
                <!-- sidebar menu start -->
                <ul class="sidebar-menu" id="nav-accordion">
                    <p class="centered"><img src="<?= site_url('assets/images/guru/'.session()->get('foto')) ?>"
                            class="img-circle" width="60" height="60"></p>
                    <h5 class="centered"><?= session()->get('nama') ?></h5>

                    <li class="mt">
                        <a href="<?= site_url('guru') ?>" class="<?= ($uri->getSegment(2) == '' ? 'active' : null) ?>">
                            <i class="fa fa-dashboard"></i>
                            <span>Beranda</span>
                        </a>
                    </li>

                    <li class="mt">
                        <a href="<?= site_url('guru/kelas') ?>"
                            class="<?= ($uri->getSegment(2) == 'kelas' ? 'active' : null) ?>">
                            <i class="fa fa-group"></i>
                            <span>Kelas</span>
                        </a>
                    </li>

                    <li class="mt">
                        <a href="<?= site_url('guru/nilai') ?>"
                            class="<?= ($uri->getSegment(2) == 'nilai' ? 'active' : null) ?>">
                            <i class="fa fa-book"></i>
                            <span>Nilai</span>
                        </a>
                    </li>
                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->

        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <?= $this->renderSection('content') ?>
            </section>
        </section>
        <!--main content end-->

        <!--footer start-->
        <footer class="site-footer">
            <div class="text-center">
                2021 - Esa
                <a href="#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?= site_url('assets/dashgum/js/jquery.js') ?>"></script>
    <script src="<?= site_url('assets/dashgum/js/jquery-1.8.3.min.js') ?>"></script>
    <script src="<?= site_url('assets/dashgum/js/bootstrap.min.js') ?>"></script>
    <script src="<?= site_url('assets/dashgum/js/jquery.dcjqaccordion.2.7.js') ?>" class="include"
        type="text/javascript"></script>
    <script src="<?= site_url('assets/dashgum/js/jquery.scrollTo.min.js') ?>"></script>
    <script src="<?= site_url('assets/dashgum/js/jquery.nicescroll.js') ?>" type="text/javascript"></script>
    <script src="<?= site_url('assets/dashgum/js/jquery.sparkline.js') ?>"></script>

    <!--common script for all pages-->
    <script src="<?= site_url('assets/dashgum/js/common-scripts.js') ?>"></script>

    <script src="<?= site_url('assets/dashgum/js/gritter/js/jquery.gritter.js') ?>" type="text/javascript"></script>
    <script src="<?= site_url('assets/dashgum/js/gritter.conf.js') ?>" type="text/javascript"></script>
</body>

</html>