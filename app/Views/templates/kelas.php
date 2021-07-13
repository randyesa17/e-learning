<?= $this->extend('templates/guru') ?>
<?= $this->section('content') ?>
<style>
.container {
    border: 2px;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 2px;
}

.lighter {
    border-color: #dedede;
    background-color: #f1f1f1;
}

.container::after {
    content: "";
    clear: both;
    display: table;
}

.container img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
}

.container img.right {
    float: right;
    margin-left: 20px;
    margin-right: 0;
}

.time-right {
    float: right;
    color: #aaa;
}

.time-left {
    float: left;
    color: #999;
}
</style>
<h1><?= $judul ?></h1>
<hr>
<div class="row mb-4">
    <div class="col-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah Kelas</button>
    </div>
</div>
<?php if(!empty($kelas)) : ?>
<?php foreach($kelas as $key => $value) : ?>
<div class="container lighter">
    <p><?= $value['namakelas'] ?></p>
    <span class="time-right"><a class="btn btn-info btn-sm"
            href="<?= site_url('guru/kelas/'.$value['kodekelas']) ?>">Masuk</a></span>
</div>
<?php endforeach; ?>
<?php endif; ?>

<div class="modal fade" id="tambah" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kelas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
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
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Buat</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

</div>
<?= $this->endSection() ?>