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
    background-color: #ffffff;
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
    color: #000;
}

.time-left {
    float: left;
    color: #999;
}
</style>
<h1><?= $judul ?></h1>
<hr>
<?php if(!empty($post)) : ?>
<?php foreach($post as $key => $value) : ?>
<div class="showback">
    <?php if(!empty($value['tema'])) : ?>
    <span class="time-right"><?= date('d-m-Y h:i', strtotime($value['tgl'])) ?></span>
    <?php if($value['tipe'] == "pdf") : ?>
    <img src="<?= site_url('assets/icons/file-text.svg') ?>" style="width:100%;">
    <?php else : ?>
    <img src="<?= site_url('assets/icons/film.svg') ?>" style="width:100%;">
    <?php endif; ?>
    <p><?= $value['tema'] ?></p>
    <p><a href="<?= site_url('assets/upload/materi/'.$value['file']) ?>" download>Download file</a></p>
    <?php endif; ?>

    <?php if(!empty($value['perintah'])) : ?>
    <span class="time-right"><?= date('d-m-Y h:i', strtotime($value['tgl'])) ?></span>
    <h2 style="font-weight: bold; color:red;">Tugas!!</h2>
    <p><?= $value['perintah'] ?></p>
    <?php if($kumpul === false) : ?>
    <p><a href="#" data-toggle="modal" data-target="#uploadTugas">Upload Tugas</a></p>
    <div class="modal fade" id="uploadTugas" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Upload Tugas</h4>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('siswa/kelas/'.$kode.'/tugas?kodetugas='.$value['kodetugas']) ?>"
                        method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="kelas" id="kelas" value="<?= $kode ?>">
                        <div class="form-group row">
                            <label for="upload" class="col-md-4 col-form-label">Upload Tugas</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control-file" name="upload" id="upload"
                                    accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.openxmlformats-officedocument.presentationml.slideshow, application/vnd.openxmlformats-officedocument.presentationml.presentation">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Upload</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <?php else : ?>
    <p>Sudah dikumpulkan</p>
    <?php endif; ?>
    <?php endif; ?>

    <?php if(!empty($value['kodeujian'])) : ?>
    <span class="time-right"><?= date('d-m-Y h:i', strtotime($value['tgl'])) ?></span>
    <h2 style="font-weight: bold; color:green;">Ujian!!</h2>
    <p>Ujian pada tanggal <?= $value['tglujian'] ?></p>
    <?php if($value['tglujian'] == date('Y-m-d')) : ?>
    <a onclick="return confirm('Apa anda siap?')"
        href="<?= site_url('siswa/kelas/'.$value['kodekelas'].'/ujian?kodeujian='.$value['kodeujian']) ?>">Kerjakan</a>
    <?php endif; ?>
    <?php endif; ?>
</div>
<?php endforeach; ?>
<?php endif; ?>
<?= $this->endSection() ?>