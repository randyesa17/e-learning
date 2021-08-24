<?= $this->extend('templates/siswa') ?>
<?= $this->section('content') ?>
<div class="pd-ltr-20 xs-pd-20-10" id="section-to-print">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4><?= $judul ?></h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url('siswa') ?>">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kelas</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah
                        Kelas</button>
                </div>
                <div class="col">
                    <?php if (!empty(session()->getFlashdata('info'))) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                        $error = session()->getFlashdata('info');
                        echo $error;
                        ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if(!empty($ruang)) : ?>
        <?php foreach($ruang as $key => $value) : ?>
        <div class="pd-20 card-box mb-30">
            <a class="btn btn-primary btn-sm pull-right"
                href="<?= site_url('siswa/kelas/'.$value['koderuang']) ?>">Masuk</a>
            <p><?= $value['namaruang'] ?></p>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<div class="modal fade" id="tambah" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kelas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>