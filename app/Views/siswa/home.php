<?= $this->extend('templates/siswa') ?>
<?= $this->section('content') ?>
<div class="row text-center">
    <div class="col">
        <h1><?= $judul ?></h1>
    </div>
</div>
<hr>
<div class="row text-center">
    <div class="col">
        <img width="150px" src="<?= site_url('assets/images/siswa/').session()->get('foto') ?>"
            class="rounded-circle img-fluid img-thumbnail" alt="<?= session()->get('nama') ?>">
    </div>
</div>
<hr>
<div class="row text-center">
    <div class="col">
        <h4><?= session()->get('nis') ?></h4>
    </div>
</div>
<div class="row text-center">
    <div class="col">
        <h4><?= session()->get('nama') ?></h4>
    </div>
</div>
<table class="table table-borderless">
    <tr>
        <td width="200">
            <h5>NISN</h5>
        </td>
        <td width="5">
            <h5>:</h5>
        </td>
        <td>
            <h5><?= session()->get('nisn') ?></h5>
        </td>
    </tr>
    <tr>
        <td width="200">
            <h5>Tempat, Tanggal Lahir</h5>
        </td>
        <td width="5">
            <h5>:</h5>
        </td>
        <td>
            <h5><?= session()->get('tempatLahir') ?>, <?= date("d-F-Y", strtotime(session()->get('tglLahir'))) ?></h5>
        </td>
    </tr>
    <tr>
        <td width="200">
            <h5>Jenis Kelamin</h5>
        </td>
        <td width="5">
            <h5>:</h5>
        </td>
        <td>
            <h5><?= session()->get('kelamin') ?></h5>
        </td>
    </tr>
    <tr>
        <td width="200">
            <h5>Alamat</h5>
        </td>
        <td width="5">
            <h5>:</h5>
        </td>
        <td>
            <h5><?= session()->get('alamat') ?></h5>
        </td>
    </tr>
    <tr>
        <td width="200">
            <h5>Jurusan</h5>
        </td>
        <td width="5">
            <h5>:</h5>
        </td>
        <td>
            <h5><?= session()->get('jurusan') ?></h5>
        </td>
    </tr>
</table>
<?= $this->endSection() ?>