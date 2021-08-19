<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4><?= $judul ?></h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url('admin/home') ?>">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="<?= site_url('admin/atur') ?>">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $judul ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <div class="col">
                <?php if (!empty(session()->getFlashdata('info'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                        $error = session()->getFlashdata('info');
                        foreach ($error as $key => $value) {
                            echo $value;
                            echo "<br>";
                        }
                        ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Tambah Data Admin</h4>
                </div>
            </div>
            <form action="<?= site_url('admin/tambah') ?>" method="post">
                <input type="hidden" class="form-control" name="idadmin" id="idadmin" value="<?= $kode ?>" required>
                <div class="form-group row">
                    <label for="nama" class="col-sm-12 col-md-2 col-form-label">Nama</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                </div>
                <div style="margin-bottom: 10px" class="row mb-3">
                    <label for="username" class="col-sm-12 col-md-2 col-form-label">Username</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                </div>
                <div style="margin-bottom: 10px" class="row mb-3">
                    <label for="password" class="col-sm-12 col-md-2 col-form-label">Password</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                </div>
                <div class="form-group row text-center">
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>