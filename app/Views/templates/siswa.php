<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning | Halaman Siswa</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/deskapp/vendors/styles/core.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/deskapp/vendors/styles/icon-font.min.css') ?>">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('assets/deskapp/src/plugins/datatables/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('assets/deskapp/src/plugins/datatables/css/responsive.bootstrap4.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/deskapp/vendors/styles/style.css') ?>">
    <link rel="stylesheet" type="text/css"
        href="<?= site_url('assets/deskapp/src/plugins/fullcalendar/fullcalendar.css') ?>">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-119386393-1');
    </script>
</head>

<body>
    <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo"><img width="150px" src="<?= site_url('assets/images/logo.png') ?>" alt=""></div>
            <div class="loader-progress" id="progress_div">
                <div class='bar' id='bar1'></div>
            </div>
            <div class='percent' id='percent1'>0%</div>
            <div class="loading-text">
                Loading...
            </div>
        </div>
    </div>

    <div class="header">
        <div class="header-left">
            <div class="menu-icon dw dw-menu"></div>
        </div>
        <div class="header-right">
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img style="width:50px; height:50px"
                                src="<?= site_url('assets/images/siswa/').session()->get('foto') ?>" alt="">
                        </span>
                        <span class="user-name"><?= session()->get('nama') ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a href="<?= site_url('siswa/logout') ?>" class="dropdown-item"><i class="dw dw-logout"></i>
                            Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="<?= site_url('siswa') ?>">
                <img width="50px" src="<?= site_url('assets/images/logo.png') ?>" alt="">
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li>
                        <a href="<?= site_url('siswa') ?>" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-house-1"></span><span class="mtext">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('siswa/jadwal') ?>" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-calendar-1"></span><span class="mtext">Jadwal</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('siswa/kelas') ?>" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-mortarboard"></span><span class="mtext">Ruang Kelas</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('siswa/nilai') ?>" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-book-1"></span><span class="mtext">Nilai</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <?= $this->renderSection('content') ?>
    </div>

    <!-- js -->
    <script src="<?= site_url('assets/deskapp/vendors/scripts/core.js') ?>"></script>
    <script src="<?= site_url('assets/deskapp/vendors/scripts/script.min.js') ?>"></script>
    <script src="<?= site_url('assets/deskapp/vendors/scripts/process.js') ?>"></script>
    <script src="<?= site_url('assets/deskapp/vendors/scripts/layout-settings.js') ?>"></script>
    <script src="<?= site_url('assets/deskapp/src/plugins/apexcharts/apexcharts.min.js') ?>"></script>
    <script src="<?= site_url('assets/deskapp/src/plugins/datatables/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= site_url('assets/deskapp/src/plugins/datatables/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= site_url('assets/deskapp/src/plugins/datatables/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?= site_url('assets/deskapp/src/plugins/datatables/js/responsive.bootstrap4.min.js') ?>"></script>
    <script src="<?= site_url('assets/deskapp/vendors/scripts/dashboard.js') ?>"></script>
    <script src="<?= site_url('assets/deskapp/src/plugins/fullcalendar/fullcalendar.min.js') ?>"></script>
    <!-- <script src="<?= site_url('assets/deskapp/vendors/scripts/calendar-setting.js') ?>"></script> -->
    <script src="<?= site_url('assets/js/pengaturan-kalender.js') ?>"></script>
</body>

</html>