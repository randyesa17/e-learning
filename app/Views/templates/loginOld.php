<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning | <?= $judul ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= site_url('assets/dashgum/css/bootstrap.css') ?>">
    <!--external css-->
    <link rel="stylesheet" href="<?= site_url('assets/dashgum/font-awesome/css/font-awesome.css') ?>">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?= site_url('assets/dashgum/css/style.css') ?>">
    <link rel="stylesheet" href="<?= site_url('assets/dashgum/css/style-responsive.css') ?>">
</head>

<body>
    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->

    <div id="login-page">
        <div class="container">
            <form action="<?= $action ?>" method="post" class="form-login">
                <h2 class="form-login-heading"><?= $judul ?></h2>
                <div class="login-wrap">
                    <div class="col">
                        <?php if(!empty(session()->getFlashdata('info'))) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php 
                                echo session()->getFlashdata('info'); 
                            ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username"
                        autofocus>
                    <br>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <label class="checkbox">
                        <span class="pull-right">
                            <a data-toggle="modal" href="#" data-target="#myModal">Lupa Password?</a>
                        </span>
                    </label>
                    <button type="submit" class="btn btn-theme btn-block"><i class="fa fa-lock"></i> Login</button>
                    <?php if($judul != "Login Admin") : ?>
                    <div class="registration">
                        <br>
                        <a href="<?= site_url() ?>"><i class="fa fa-angle-left"></i> Kembali ke Halaman Utama</a>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Modal -->
                <div class="modal fade" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
                    id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Lupa Password ?</h4>
                            </div>
                            <div class="modal-body">
                                <p>Silahkan Hubungi Admin</p>
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">Oke</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->
            </form>
        </div>
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?= site_url('assets/dashgum/js/jquery.js') ?>"></script>
    <script src="<?= site_url('assets/dashgum/js/bootstrap.min.js') ?>"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?= site_url('assets/dashgum/js/jquery.backstretch.min.js') ?>"></script>
    <script>
    $.backstretch("<?= site_url('assets/images/slider_img.jpg') ?>", {
        speed: 500
    });
    </script>
</body>

</html>