<?= $this->extend('templates/guru') ?>
<?= $this->section('content') ?>
<h2><?= $judul ?></h2>
<hr>
<form action="<?= site_url('guru/kelas/tambah') ?>" method="post">
    <div class="form-group row">
        <label for="kode" class="col-sm-2 col-form-label">Kode</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="kode" id="kode" value="<?= $kode ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
        <div class="col-sm-4">
            <select class="form-control form-control-sm" name="jurusan" id="jurusan">
                <option value="-1">--Pilih Kelas--</option>
                <?php foreach($jurusan as $key => $value) : ?>
                <option value="<?= $value['idjurusan'] ?>"><?= $value['jurusan'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</form>
<?= $this->endSection() ?>