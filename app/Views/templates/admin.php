<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning | Halaman Admin</title>

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
                            <img src="<?= site_url('assets/images/testimon.png') ?>" alt="">
                        </span>
                        <span class="user-name"><?= session()->get('nama') ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a href="<?= site_url('admin/profil') ?>" class="dropdown-item"><i class="dw dw-user1"></i>
                            Profil</a>
                        <a href="<?= site_url('admin/logout') ?>" class="dropdown-item"><i class="dw dw-logout"></i>
                            Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="<?= site_url('admin/home') ?>">
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
                        <a href="<?= site_url('admin/home') ?>" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-house-1"></span><span class="mtext">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/siswa') ?>" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-group"></span><span class="mtext">Siswa</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/guru') ?>" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-user-1"></span><span class="mtext">Guru</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/kelas') ?>" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-mortarboard"></span><span class="mtext">Kelas</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/mapel') ?>" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-book"></span><span class="mtext">Mata Pelajaran</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/ujian') ?>" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-edit-file"></span><span class="mtext">Ujian</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/jadwal') ?>" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-calendar-1"></span><span class="mtext">Jadwal</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/nilai') ?>" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-book-1"></span><span class="mtext">Nilai</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/atur') ?>" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-user-13"></span><span class="mtext">Admin</span>
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
</body>

</html>