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
                            <li class="breadcrumb-item"><a href="<?= site_url('admin/guru') ?>">Guru</a></li>
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
                    <h4 class="text-blue h4">Tambah Data Guru</h4>
                </div>
            </div>
            <form action="<?= site_url('admin/inputGuru') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="nip" class="col-sm-12 col-md-2 col-form-label">Nomor Induk Pegawai</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="text" class="form-control" name="nip" id="nip" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-12 col-md-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tempatLahir" class="col-sm-12 col-md-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="text" class="form-control" name="tempatLahir" id="tempatLahir" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tglLahir" class="col-sm-12 col-md-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="date" class="form-control" name="tglLahir" id="tglLahir" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelamin" class="col-sm-12 col-md-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-12 col-md-10">
                        <label class="radio-inline">
                            <input type="radio" class="form-control" name="kelamin" id="kelamin" value="cowo"> Laki-laki
                        </label>
                        <label class="radio-inline">
                            <input type="radio" class="form-control" name="kelamin" id="kelamin" value="cewe"> Perempuan
                        </label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-12 col-md-2 col-form-label">Alamat</label>
                    <div class="col-sm-12 col-md-10">
                        <textarea class="form-control" name="alamat" id="alamat" row="3" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mapel" class="col-sm-12 col-md-2 col-form-label">Mata Pelajaran</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="form-control" name="mapel" id="mapel">
                            <option value="-1">--Pilih Mata Pelajaran--</option>
                            <?php foreach ($mapel as $key => $value) : ?>
                            <option value="<?= $value['idmapel'] ?>"><?= $value['mapel'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-12 col-md-2 col-form-label">Foto</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="file" class="form-control" name="foto" id="foto" accept="image/*" required>
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