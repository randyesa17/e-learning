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

.showback img {
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
<button type="button" class="btn btn-theme" data-toggle="modal" data-target="#tambahMateri">Upload
    Materi</button>
<button type="button" class="btn btn-theme" data-toggle="modal" data-target="#tambahTugas">Tambah
    Tugas</button>
<button type="button" class="btn btn-theme" data-toggle="modal" data-target="#tambahUjian">Tambah
    Ujian</button>
<hr>
<?php if(!empty($post)) : ?>
<?php foreach($post as $key => $value) : ?>
<div class="showback">
    <?php if(!empty($value['tema'])) : ?>
    <span style="float: right"><a class="btn btn-danger btn-sm"
            href="<?= site_url('guru/kelas/'.$kelas.'/hapus/materi?idmateri='.$value['idmateri']) ?>">Hapus</a></span>
    <?php if($value['tipe'] == "pdf") : ?>
    <img src="<?= site_url('assets/icons/file-text.svg') ?>" style="width:100%;">
    <?php else : ?>
    <img src="<?= site_url('assets/icons/film.svg') ?>" style="width:100%;">
    <?php endif; ?>
    <p><?= $value['tema'] ?></p>
    <p><a href="<?= site_url('assets/upload/materi/'.$value['file']) ?>" target="_blank">Lihat file</a></p>
    <span class="time-right"><?= date('d-m-Y h:i', strtotime($value['tgl'])) ?></span>
    <?php endif; ?>

    <?php if(!empty($value['perintah'])) : ?>
    <span style="float: right"><a class="btn btn-danger btn-sm"
            href="<?= site_url('guru/kelas/'.$kelas.'/hapus/tugas?kodetugas='.$value['kodetugas']) ?>">Hapus</a></span>
    <h2 style="font-weight: bold; color:red;">Tugas!!</h2>
    <p><?= $value['perintah'] ?></p>
    <a href="<?= site_url('guru/kelas/'.$value['kodekelas'].'/tugasMurid?kodetugas='.$value['kodetugas']) ?>">Lihat
        Tugas Murid</a>
    <span class="time-right"><?= date('d-m-Y h:i', strtotime($value['tgl'])) ?></span>
    <?php endif; ?>

    <?php if(!empty($value['kodeujian'])) : ?>
    <span style="float: right"><a class="btn btn-danger btn-sm"
            href="<?= site_url('guru/kelas/'.$kelas.'/hapus?kodeujian='.$value['kodeujian']) ?>">Hapus</a></span>
    <h2 style="font-weight: bold; color:green;">Ujian!!</h2>
    <p>Ujian pada tanggal <?= $value['tglujian'] ?></p>
    <a href="<?= site_url('guru/kelas/'.$value['kodekelas'].'/ujian?kodeujian='.$value['kodeujian']) ?>">Masuk</a>
    <?php if($value['tglujian'] == date('Y-m-d')) : ?>
    <?php endif; ?>
    <span class="time-right"><?= date('d-m-Y h:i', strtotime($value['tgl'])) ?></span>
    <?php endif; ?>
</div>
<?php endforeach; ?>
<?php endif; ?>

<div class="modal fade" id="tambahMateri" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Materi</h4>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('guru/kelas/materi') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="kode" id="kode" value="<?= $kode ?>">
                    <input type="hidden" class="form-control" name="kelas" id="kelas" value="<?= $kelas ?>">
                    <div class="form-group row">
                        <label for="tema" class="col-sm-2 col-form-label">Tema</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tema" id="tema">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipe" class="col-sm-2 col-form-label">Tipe</label>
                        <div class="col-sm-10">
                            <select class="form-control" onchange="uploadType()" name="tipe" id="tipe">
                                <option value="0">--Pilih Tipe Materi--</option>
                                <option value="pdf">E-Book/PDF</option>
                                <option value="video">Video</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="upload" class="col-sm-2 col-form-label">Upload</label>
                        <div class="col-sm-10">
                            <input type="file" class="form--file" name="upload" id="upload" disabled required>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-theme" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="tambahTugas" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Tugas</h4>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('guru/kelas/tugas') ?>" method="post">
                    <input type="hidden" class="form-control" name="kode" id="kode" value="<?= $kode ?>">
                    <input type="hidden" class="form-control" name="kelas" id="kelas" value="<?= $kelas ?>">
                    <div class="form-group row">
                        <label for="perintah" class="col-sm-2 col-form-label">Perintah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="perintah" id="perintah">
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
<div class="modal fade" id="tambahUjian" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Ujian</h4>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('guru/kelas/'.$kelas.'/ujian') ?>" method="post">
                    <input type="hidden" class="form-control" name="kode" id="kode" value="<?= $kode ?>">
                    <input type="hidden" class="form-control" name="kelas" id="kelas" value="<?= $kelas ?>">
                    <div class="form-group row">
                        <label for="tgl" class="col-sm-5 col-form-label">Ujian Untuk Tanggal</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control-date" name="tgl" id="tgl"
                                min="<?php echo date("Y-m-d"); ?>">
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
<script>
function uploadType() {
    var x = document.getElementById("tipe").value;
    if (x === "pdf") {
        document.getElementById("upload").accept = "application/pdf";
        document.getElementById("upload").disabled = false;
    } else if (x === "video") {
        document.getElementById("upload").accept = "video/*";
        document.getElementById("upload").disabled = false;
    } else {
        document.getElementById("upload").disabled = true;
    }
}
</script>
<?= $this->endSection() ?>