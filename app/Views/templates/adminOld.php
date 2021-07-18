<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning | Halaman Admin</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= site_url('assets/dashgum/css/bootstrap.css') ?>">
    <!--external css-->
    <link rel="stylesheet" href="<?= site_url('assets/dashgum/font-awesome/css/font-awesome.css') ?>">
    <link rel="stylesheet" href="<?= site_url('assets/dashgum/css/zabuto_calendar.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?= site_url('assets/dashgum/js/gritter/css/jquery.gritter.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?= site_url('assets/dashgum/lineicons/style.css') ?>" type="text/css">

    <!-- Custom styles for this template -->
    <link href="<?= site_url('assets/css/styleAdmin.css') ?>" rel="stylesheet">
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
            <a href="<?= site_url('admin/home') ?>" class="logo"><b>Halaman Admin</b></a>
            <!-- logo end -->
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?= site_url('admin/logout') ?>">Logout</a></li>
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
                    <h5 class="centered"><?= session()->get('nama') ?></h5>

                    <li class="mt">
                        <a href="<?= site_url('admin/home') ?>"
                            class="<?= ($uri->getSegment(2) == 'home' ? 'active' : null) ?>">
                            <i class="fa fa-dashboard"></i>
                            <span>Beranda</span>
                        </a>
                    </li>

                    <li class="mt">
                        <a href="<?= site_url('admin/siswa') ?>"
                            class="<?= ($uri->getSegment(2) == 'siswa' ? 'active' : null) ?>">
                            <i class="fa fa-group"></i>
                            <span>Siswa</span>
                        </a>
                    </li>

                    <li class="mt">
                        <a href="<?= site_url('admin/guru') ?>"
                            class="<?= ($uri->getSegment(2) == 'guru' ? 'active' : null) ?>">
                            <i class="fa fa-male"></i>
                            <span>Guru</span>
                        </a>
                    </li>

                    <li class="mt">
                        <a href="<?= site_url('admin/jurusan') ?>"
                            class="<?= ($uri->getSegment(2) == 'jurusan' ? 'active' : null) ?>">
                            <i class="fa fa-graduation-cap"></i>
                            <span>Jurusan</span>
                        </a>
                    </li>

                    <li class="mt">
                        <a href="<?= site_url('admin/mapel') ?>"
                            class="<?= ($uri->getSegment(2) == 'mapel' ? 'active' : null) ?>">
                            <i class="fa fa-star"></i>
                            <span>Mata Pelajaran</span>
                        </a>
                    </li>

                    <li class="mt">
                        <a href="<?= site_url('admin/nilai') ?>"
                            class="<?= ($uri->getSegment(2) == 'nilai' ? 'active' : null) ?>">
                            <i class="fa fa-book"></i>
                            <span>Nilai</span>
                        </a>
                    </li>

                    <li class="mt">
                        <a href="<?= site_url('admin/atur') ?>"
                            class="<?= ($uri->getSegment(2) == 'kelas' ? 'active' : null) ?>">
                            <i class="fa fa-child"></i>
                            <span>Admin</span>
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