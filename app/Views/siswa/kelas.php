<?= $this->extend('templates/siswa') ?>
<?= $this->section('content') ?>
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
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah
    Kelas</button>

<?php if(!empty($kelas)) : ?>
<?php foreach($kelas as $key => $value) : ?>
<div class="showback">
    <a class="btn btn-danger btn-sm pull-right" href="<?= site_url('siswa/kelas/'.$value['kodekelas']) ?>">Masuk</a>
    <p class><?= $value['namakelas'] ?></p>
</div>
<?php endforeach; ?>
<?php endif; ?>

<div class="modal fade" id="tambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Kelas</h4>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>