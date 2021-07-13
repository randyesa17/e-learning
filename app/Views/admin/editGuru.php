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
                <form action="<?= site_url('admin/editGuru/'.$guru['nip']) ?>" method="post"
                    enctype="multipart/form-data">
                    <div style="margin-bottom: 10px" class="row mb-3 mt-4">
                        <label for="nip" class="col-sm-5 col-form-label">Nomor Induk Pegawai</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" name="nip" id="nip"
                                value="<?= $guru['nip'] ?>" readonly>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="row mb-3 mt-4">
                        <label for="nama" class="col-sm-5 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" name="nama" id="nama"
                                value="<?= $guru['nama'] ?>" required>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="row mb-3 mt-4">
                        <label for="tempatLahir" class="col-sm-5 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" name="tempatLahir" id="tempatLahir"
                                value="<?= $guru['tempatLahir'] ?>" required>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="row mb-3 mt-4">
                        <label for="tglLahir" class="col-sm-5 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control form-control-sm" name="tglLahir" id="tglLahir"
                                value="<?= $guru['tglLahir'] ?>" required>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="row mb-3">
                        <label for="kelamin" class="col-sm-5 col-form-label">Jenis Kelamin</label>
                        <?php
                        if($guru['kelamin'] == "Laki-laki"){
                            $cowo = "checked";
                            $cewe = "";
                        } else {
                            $cowo = "";
                            $cewe = "checked";
                        }
                        ?>
                        <div class="col-sm-6">
                            <label class="radio-inline">
                                <input type="radio" name="kelamin" id="kelamin" value="cowo" <?= $cowo ?>> Laki-laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="kelamin" id="kelamin" value="cewe" <?= $cewe ?>> Perempuan
                            </label>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="row mb-3 mt-4">
                        <label for="alamat" class="col-sm-5 col-form-label">Alamat</label>
                        <div class="col-sm-6">
                            <textarea class="form-control form-control-sm" name="alamat" id="alamat" row="3"
                                required><?= $guru['alamat'] ?></textarea>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="row mb-3">
                        <label for="mapel" class="col-sm-5 col-form-label">Mata Pelajaran</label>
                        <div class="col-sm-6">
                            <select class="form-control form-control-sm" name="mapel" id="mapel">
                                <option value="-1">--Pilih Mata Pelajaran--</option>
                                <?php foreach($mapel as $key => $value) : ?>
                                <option <?php if($value['mapel'] == $guru['mapel']) echo "selected" ?>
                                    value="<?= $value['mapel'] ?>"><?= $value['mapel'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="row mb-3 mt-4">
                        <label for="foto" class="col-sm-5 col-form-label">Foto</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control form-control-sm" name="foto" id="foto"
                                accept="image/*">
                        </div>
                    </div>
                    <input class="form-control" type="hidden" name="foto" id="foto" value="<?= $guru['foto'] ?>">
                    <div style="margin-bottom: 10px" class="form-group text-center">
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>