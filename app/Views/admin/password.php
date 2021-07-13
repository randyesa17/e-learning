<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
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
<div class="row">
    <div class="col">
        <form action="<?= site_url('admin/profil/password') ?>" method="post">
            <div style="margin-bottom: 10px" class="row mb-3">
                <label for="passwordlama" class="col-sm-3 col-form-label">Password Lama</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="passwordlama" id="passwordlama" required>
                </div>
            </div>
            <div style="margin-bottom: 10px" class="row mb-3">
                <label for="password" class="col-sm-3 col-form-label">Password Baru</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
            </div>
            <div style="margin-bottom: 10px" class="row mb-3">
                <label for="re-password" class="col-sm-3 col-form-label">Masukkan Kembali Password Baru</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="re-password" id="re-password" required>
                </div>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary" type="submit">UBAH</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>