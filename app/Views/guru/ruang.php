<?= $this->extend('templates/guru') ?>
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
                            <li class="breadcrumb-item"><a href="<?= site_url('guru') ?>">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="<?= site_url('guru/kelas') ?>">Kelas</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ruang Kelas</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahMateri"
                        <?= $statusMateri ?>>Upload
                        Materi</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahTugas"
                        <?= $statusTugas ?>>Tambah
                        Tugas</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahUjian">Tambah
                        Ujian</button>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active text-blue" data-toggle="tab" href="#materi" role="tab"
                            aria-selected="true">Materi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-blue" data-toggle="tab" href="#tugas" role="tab"
                            aria-selected="false">Tugas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-blue" data-toggle="tab" href="#ujian" role="tab"
                            aria-selected="false">Ujian</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="materi" role="tabpanel">
                        <?php foreach($materi as $key => $value) : ?>
                        <div class="pd-20 card-box mb-30">
                            <?php if(!empty($value['tema'])) : ?>
                            <span style="float: right"><a class="btn btn-danger btn-sm"
                                    href="<?= site_url('guru/kelas/'.$kode.'/hapus/materi?idmateri='.$value['idmateri']) ?>">Hapus</a></span>
                            <?php if($value['tipe'] == "pdf") : ?>
                            <img src="<?= site_url('assets/icons/file-text.svg') ?>" style="width: 50px;">
                            <?php else : ?>
                            <img src="<?= site_url('assets/icons/film.svg') ?>" style="width: 50px;">
                            <?php endif; ?>
                            <p><?= $value['tema'] ?></p>
                            <p><a href="<?= site_url('assets/upload/materi/'.$value['file']) ?>" target="_blank">Lihat
                                    file</a></p>
                            <small><?= date('d-m-Y h:i', strtotime($value['tgl'])) ?></small>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="tab-pane fade" id="tugas" role="tabpanel">
                        <?php foreach($tugas as $key => $value) : ?>
                        <div class="pd-20 card-box mb-30">
                            <?php if(!empty($value['perintah'])) : ?>
                            <span style="float: right"><a class="btn btn-danger btn-sm"
                                    href="<?= site_url('guru/kelas/'.$value['koderuang'].'/hapus/tugas?kodetugas='.$value['kodetugas']) ?>">Hapus</a></span>
                            <h2 style="font-weight: bold; color:red;">Tugas!!</h2>
                            <p><?= $value['perintah'] ?></p>
                            <a
                                href="<?= site_url('guru/kelas/'.$value['koderuang'].'/tugasMurid?kodetugas='.$value['kodetugas']) ?>">Lihat
                                Tugas Murid</a><br>
                            <small><?= date('d-m-Y h:i', strtotime($value['tgl'])) ?></small>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="tab-pane fade" id="ujian" role="tabpanel">
                        <div class="pd-20 card-box mb-30">
                            <?php if(!empty($ujian['kodeujian'])) : ?>
                            <span style="float: right"><a class="btn btn-danger btn-sm"
                                    href="<?= site_url('guru/kelas/'.$ujian['koderuang'].'/hapus?kodeujian='.$ujian['kodeujian']) ?>">Hapus</a></span>
                            <h2 style="font-weight: bold; color:green;">Ujian!!</h2>
                            <p>Ujian pada tanggal <?= $ujian['tglujian'] ?></p>
                            <a
                                href="<?= site_url('guru/kelas/'.$ujian['koderuang'].'/ujian?kodeujian='.$ujian['kodeujian']) ?>">Masuk</a><br>
                            <?php if($ujian['tglujian'] == date('Y-m-d')) : ?>
                            <?php endif; ?>
                            <small><?= date('d-m-Y h:i', strtotime($ujian['tgl'])) ?></small>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahMateri" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Materi</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('guru/kelas/materi') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="kode" id="kode" value="<?= $kode ?>">
                    <input type="hidden" class="form-control" name="kelas" id="kelas"
                        value="<?= $ruang['koderuang'] ?>">
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
                <h4 class="modal-title">Tambah Tugas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('guru/kelas/tugas') ?>" method="post">
                    <input type="hidden" class="form-control" name="kode" id="kode" value="<?= $kode ?>">
                    <input type="hidden" class="form-control" name="kelas" id="kelas"
                        value="<?= $ruang['koderuang'] ?>">
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
                <h4 class="modal-title">Tambah Ujian</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('guru/kelas/'.$ruang['koderuang'].'/ujian') ?>" method="post">
                    <input type="hidden" class="form-control" name="kode" id="kode" value="<?= $kode ?>">
                    <input type="hidden" class="form-control" name="kelas" id="kelas"
                        value="<?= $ruang['koderuang'] ?>">
                    <div class="form-group row">
                        <label for="jenis" class="col-sm-5 col-form-label">Jenis Ujian</label>
                        <div class="col-sm-6">
                            <select name="jenis" id="jenis" class="form-control">
                                <option value="UTS">UTS</option>
                                <option value="UAS">UAS</option>
                            </select>
                        </div>
                    </div>
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