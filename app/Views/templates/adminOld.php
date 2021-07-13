<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= site_url('assets/css/styleAdmin.css') ?>" rel="stylesheet">
    <title>Admin Page</title>
</head>

<body>
    <?php
        $uri = service('uri');
    ?>
    <nav class="mnb navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="ic fa fa-bars"></i>
                </button>
                <div style="padding: 15px 0;">
                    <a href="#" id="msbo"><i class="ic fa fa-bars"></i></a>
                </div>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"><?= session()->get('nama') ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= site_url('admin/profil') ?>">Profil</a></li>
                            <!-- <li><a href="#">Upgrade</a></li>
                            <li><a href="#">Help</a></li> -->
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= site_url('admin/logout') ?>">Logout</a></li>
                        </ul>
                    </li>
                    <!-- <li><a href="#"><i class="fa fa-bell-o"></i></a></li>
                    <li><a href="#"><i class="fa fa-comment-o"></i></a></li> -->
                </ul>
            </div>
        </div>
    </nav>
    <!--msb: main sidebar-->
    <div class="msb" id="msb">
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <div class="brand-wrapper">
                    <!-- Brand -->
                    <div class="brand-name-wrapper">
                        <a class="navbar-brand" href="<?= site_url('admin/home') ?>">
                            ADMIN PAGE
                        </a>
                    </div>

                </div>

            </div>

            <!-- Main Menu -->
            <div class="side-menu-container">
                <ul class="nav navbar-nav">

                    <li class="<?= ($uri->getSegment(2) == 'home' ? 'active' : null) ?>">
                        <a href="<?= site_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="panel panel-default" id="dropdown">
                        <a data-toggle="collapse" href="#dropdown-lvl1">
                            <i class="fa fa-edit"></i> Input
                            <span class="caret"></span>
                        </a>
                        <!-- Dropdown level 1 -->
                        <div id="dropdown-lvl1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?= site_url('admin/inputSiswa') ?>">Siswa</a></li>
                                    <li><a href="<?= site_url('admin/inputGuru') ?>">Guru</a></li>
                                    <li><a href="<?= site_url('admin/inputJurusan') ?>">Jurusan</a></li>
                                    <li><a href="<?= site_url('admin/inputMapel') ?>">Mata Pelajaran</a></li>

                                    <!-- Dropdown level 2 -->
                                    <!-- <li class="panel panel-default" id="dropdown">
                                        <a data-toggle="collapse" href="#dropdown-lvl2">
                                            <i class="glyphicon glyphicon-off"></i> Sub Level <span
                                                class="caret"></span>
                                        </a>
                                        <div id="dropdown-lvl2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <ul class="nav navbar-nav">
                                                    <li><a href="#">Link</a></li>
                                                    <li><a href="#">Link</a></li>
                                                    <li><a href="#">Link</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="<?= ($uri->getSegment(2) == 'siswa' ? 'active' : null) ?>">
                        <a href="<?= site_url('admin/siswa') ?>"><i class="fa fa-puzzle-piece"></i> Siswa</a>
                    </li>
                    <li class="<?= ($uri->getSegment(2) == 'guru' ? 'active' : null) ?>">
                        <a href="<?= site_url('admin/guru') ?>"><i class="fa fa-puzzle-piece"></i> Guru</a>
                    </li>
                    <li class="<?= ($uri->getSegment(2) == 'jurusan' ? 'active' : null) ?>">
                        <a href="<?= site_url('admin/jurusan') ?>"><i class="fa fa-puzzle-piece"></i> Jurusan</a>
                    </li>
                    <li class="<?= ($uri->getSegment(2) == 'mapel' ? 'active' : null) ?>">
                        <a href="<?= site_url('admin/mapel') ?>"><i class="fa fa-puzzle-piece"></i> Mata Pelajaran</a>
                    </li>
                    <li class="<?= ($uri->getSegment(2) == 'nilai' ? 'active' : null) ?>">
                        <a href="<?= site_url('admin/nilai') ?>"><i class="fa fa-puzzle-piece"></i> Nilai</a>
                    </li>
                    <li class="<?= ($uri->getSegment(2) == 'atur' ? 'active' : null) ?>">
                        <a href="<?= site_url('admin/atur') ?>"><i class="fa fa-puzzle-piece"></i> Admin</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>
    <!--main content wrapper-->
    <div class="mcw">
        <!--navigation here-->
        <!--main content view-->
        <div class="container">
            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"> -->
    </script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?= site_url('assets/js/scriptAdmin.js') ?>"></script>
</body>

</html>