<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="<?= site_url('assets/css/styleLogin.css') ?>" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?= $judul ?></h5>
                        <div class="col">
                            <?php if(!empty(session()->getFlashdata('info'))) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?php 
                                    echo session()->getFlashdata('info'); 
                                ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <form class="form-signin" action="<?= $action ?>" method="post">
                            <div class="form-label-group">
                                <input type="text" id="inputEmail" name="username" class="form-control"
                                    placeholder="Username" required autofocus>
                                <label for="inputEmail">Username</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword" name="password" class="form-control"
                                    placeholder="Password" required>
                                <label for="inputPassword">Password</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>