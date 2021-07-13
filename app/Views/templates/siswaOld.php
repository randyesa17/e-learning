<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="<?= site_url('assets/css/styleSiswa.css') ?>" rel="stylesheet">
    <title>Halaman Siswa</title>
</head>

<body>
    <nav class="menu" tabindex="0">
        <div class="smartphone-menu-trigger"></div>
        <header class="avatar">
            <img src="<?= site_url('assets/images/siswa/'.session()->get('foto')) ?>" />
            <h2><?= session()->get('nama') ?></h2>
        </header>
        <ul>
            <li tabindex="0" class="icon-dashboard"><span><a href="<?= site_url('siswa') ?>">Dashboard</a></span></li>
            <li tabindex="0" class="icon-customers"><span><a href="<?= site_url('siswa/kelas') ?>">Kelas</a></span></li>
            <li tabindex="0" class="icon-pen"><span><a href="<?= site_url('siswa/nilai') ?>">Nilai</a></span></li>
            <!-- <li tabindex="0" class="icon-users"><span><a href="">Profil</a></span></li> -->
        </ul>
        <ul>
            <li><a href="<?= site_url('siswa/logout') ?>">Logout</a></li>
        </ul>
    </nav>

    <main>
        <div class="container">
            <?= $this->renderSection('content') ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->
</body>

</html>