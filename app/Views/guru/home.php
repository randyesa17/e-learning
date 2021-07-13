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
<hr>
<div class="row text-center">
    <div class="col">
        <h5><?= session()->get('nip') ?></h5>
    </div>
</div>
<div class="row text-center">
    <div class="col">
        <h5><?= session()->get('nama') ?></h5>
    </div>
</div>
<table class="table table-borderless">
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
            <h5><?= session()->get('mapel') ?></h5>
        </td>
    </tr>
</table>

<?= $this->endSection() ?>