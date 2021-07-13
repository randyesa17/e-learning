<?= $this->extend('templates/guru') ?>
<?= $this->section('content') ?>
<h1><?= $judul ?></h1>
<hr>
<button type="button" class="btn btn-theme" data-toggle="modal" data-target="#tambah">Tambah Kelas</button>
<?php if(!empty($kelas)) : ?>
<?php foreach($kelas as $key => $value) : ?>
<div class="showback">
    <a class="btn btn-theme04 btn-sm pull-right" href="<?= site_url('guru/kelas/'.$value['kodekelas']) ?>">Masuk</a>
    <p><?= $value['namakelas'] ?></p>
</div>
<?php endforeach; ?>
<?php endif; ?>

<div class="modal fade" id="tambah" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Kelas</h4>
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
                                <option value="-1">--Pilih Jurusan--</option>
                                <?php foreach($jurusan as $key => $value) : ?>
                                <option value="<?= $value['idjurusan'] ?>"><?= $value['jurusan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-theme" type="submit">Buat</button>
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