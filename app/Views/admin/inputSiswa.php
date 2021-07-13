<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2><?= $judul ?></h2>
        </div>
    </div>
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
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
        <div class="row">
            <div class="col">
                <form action="<?= site_url('admin/inputSiswa') ?>" method="post" enctype="multipart/form-data">
                    <div style="margin-bottom: 10px" class="row mb-3 mt-4">
                        <label for="nis" class="col-sm-5 col-form-label">Nomor Induk Siswa</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" name="nis" id="nis" required>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="row mb-3 mt-4">
                        <label for="nisn" class="col-sm-5 col-form-label">Nomor Induk Siswa Nasional</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" name="nisn" id="nisn" required>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="row mb-3 mt-4">
                        <label for="nama" class="col-sm-5 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" name="nama" id="nama" required>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="row mb-3 mt-4">
                        <label for="tempatLahir" class="col-sm-5 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" name="tempatLahir" id="tempatLahir"
                                required>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="row mb-3 mt-4">
                        <label for="tglLahir" class="col-sm-5 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control form-control-sm" name="tglLahir" id="tglLahir"
                                required>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="row mb-3">
                        <label for="kelamin" class="col-sm-5 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-6">
                            <label class="radio-inline">
                                <input type="radio" name="kelamin" id="kelamin" value="cowo"> Laki-laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="kelamin" id="kelamin" value="cewe"> Perempuan
                            </label>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="row mb-3 mt-4">
                        <label for="alamat" class="col-sm-5 col-form-label">Alamat</label>
                        <div class="col-sm-6">
                            <textarea class="form-control form-control-sm" name="alamat" id="alamat" row="3"
                                required></textarea>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="row mb-3">
                        <label for="jurusan" class="col-sm-5 col-form-label">Jurusan</label>
                        <div class="col-sm-6">
                            <select class="form-control form-control-sm" name="jurusan" id="jurusan">
                                <option value="-1">--Pilih Kelas--</option>
                                <?php foreach($jurusan as $key => $value) : ?>
                                <option value="<?= $value['jurusan'] ?>"><?= $value['jurusan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="row mb-3 mt-4">
                        <label for="foto" class="col-sm-5 col-form-label">Foto</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control-file form-control-sm" name="foto" id="foto"
                                accept="image/*" required>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="form-group text-center">
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>