<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4><?= $judul ?></h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url('admin/home') ?>">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="<?= site_url('admin/ujian') ?>">Jadwal</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $judul ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <div class="col">
                <?php if (!empty(session()->getFlashdata('info'))) : ?>
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
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Tambah Data Jadwal</h4>
                </div>
            </div>
            <form action="<?= site_url('admin/jadwal/input') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="jenis" class="col-sm-12 col-md-2 col-form-label">Judul Jadwal</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Jadwal"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ruang" class="col-sm-12 col-md-2 col-form-label">Ruang Kelas</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control custom-select2" name="ruang" id="ruang">
                            <?php foreach ($ruang as $key => $value) : ?>
                            <option value="<?= $value['koderuang'] ?>"><?= $value['namaruang'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis" class="col-sm-12 col-md-2 col-form-label">Jenis Ujian</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control custom-select2" name="jenis" id="jenis">
                            <option value="Materi">Materi</option>
                            <option value="Tugas">Tugas</option>
                            <option value="Ujian">Ujian</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl" class="col-sm-12 col-md-2 col-form-label">Tanggal Ujian</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tanggal Ujian"
                            min="<?php echo date("Y-m-d"); ?>" required>
                    </div>
                </div>
                <div class="form-group row text-center">
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>