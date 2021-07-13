<?= $this->extend('templates/siswa') ?>
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
    background-color: #5bc995;
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
<div class="col">
    <?php if(!empty(session()->getFlashdata('info'))) : ?>
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
<div class="row mb-4">
    <div class="col-4">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah">Tambah
            Kelas</button>
    </div>
</div>
<?php if(!empty($kelas)) : ?>
<?php foreach($kelas as $key => $value) : ?>
<div class="container lighter">
    <p><?= $value['namakelas'] ?></p>
    <span class="time-right"><a class="btn btn-danger btn-sm"
            href="<?= site_url('siswa/kelas/'.$value['kodekelas']) ?>">Masuk</a></span>
</div>
<?php endforeach; ?>
<?php endif; ?>

<div class="modal fade" id="tambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kelas</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('siswa/kelas/tambah') ?>" method="post">
                    <div class="form-group row">
                        <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="kode" id="kode">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>