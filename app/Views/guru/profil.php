<?= $this->extend('templates/guru') ?>
<?= $this->section('content') ?>
<div class="row text-center">
    <div class="col">
        <h1><?= $judul ?></h1>
    </div>
</div>
<hr>
<div class="row text-center">
    <div class="col">
        <img width="150px" src="<?= site_url('assets/images/guru/').session()->get('foto') ?>"
            class="rounded-circle img-fluid img-thumbnail" alt="<?= session()->get('nama') ?>">
    </div>
</div>
<?= $this->endSection() ?>