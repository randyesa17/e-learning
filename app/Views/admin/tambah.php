<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2><?= $judul ?></h2>
        </div>
    </div>
    <hr>
    <div class="col">
        <?php if(!empty(session()->getFlashdata('info'))) : ?>
        <div class="alert alert-danger" role="alert">
            <?php 
            echo session()->getFlashdata('info'); 
        ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
        <div class="row">
            <div class="col">
                <form action="<?= site_url('admin/tambah') ?>" method="post">
                    <input type="hidden" class="form-control form-control-sm" name="idadmin" id="idadmin"
                        value="<?= $kode ?>" required>
                    <div style="margin-bottom: 10px" class="row mb-3 mt-4">
                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" name="nama" id="nama" required>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="row mb-3">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" name="username" id="username"
                                required>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="row mb-3">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control form-control-sm" name="password" id="password"
                                required>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="form-group text-center">
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>