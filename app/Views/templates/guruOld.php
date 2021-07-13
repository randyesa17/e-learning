<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/css/tether.min.css" rel="stylesheet">
    <link href="<?= site_url('assets/css/styleGuru.css') ?>" rel="stylesheet">
    <title>Laman Guru</title>
</head>

<body>
    <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <div class="sidebar-header">
                    <div class="sidebar-brand">
                        <a href="#">Page Guru</a>
                    </div>
                </div>
                <li><a href="<?= site_url('guru') ?>"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="<?= site_url('guru/kelas') ?>"><i class="fa fa-group"></i> Kelas</a></li>
                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-group"></i> Kelas <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu animated fadeInLeft" role="menu">
                        <div class="dropdown-header">Dropdown heading</div>
                        <li><a href="#pictures">Pictures</a></li>
                        <li><a href="#videos">Videeos</a></li>
                        <li><a href="#books">Books</a></li>
                        <li><a href="#art">Art</a></li>
                        <li><a href="#awards">Awards</a></li>
                    </ul>
                </li> -->
                <li><a href="<?= site_url('guru/nilai') ?>"><i class="fa fa-book"></i> Nilai</a></li>
                <li><a href="<?= site_url('guru/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <?= $this->renderSection('content') ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js"></script>
    <script src="<?= site_url('assets/js/scriptGuru.js') ?>"></script>
</body>

</html>