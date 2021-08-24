<?= $this->extend('templates/siswa') ?>
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
                            <li class="breadcrumb-item"><a href="<?= site_url('siswa') ?>">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="<?= site_url('siswa/kelas') ?>">Kelas</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ruang Kelas</li>
                        </ol>
                    </nav>
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
                            <h2 style="font-weight: bold; color:red;">Tugas!!</h2>
                            <p><?= $value['perintah'] ?></p>
                            <?php if($kumpul === false) : ?>
                            <p><a href="#" data-toggle="modal" data-target="#uploadTugas">Upload Tugas</a></p>
                            <div class="modal fade" id="uploadTugas" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Upload Tugas</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form
                                                action="<?= site_url('siswa/kelas/'.$kode.'/tugas?kodetugas='.$value['kodetugas']) ?>"
                                                method="post" enctype="multipart/form-data">
                                                <input type="hidden" class="form-control" name="kelas" id="kelas"
                                                    value="<?= $kode ?>">
                                                <div class="form-group row">
                                                    <label for="upload" class="col-md-4 col-form-label">Upload
                                                        Tugas</label>
                                                    <div class="col-md-8">
                                                        <input type="file" class="form-control-file" name="upload"
                                                            id="upload"
                                                            accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.openxmlformats-officedocument.presentationml.slideshow, application/vnd.openxmlformats-officedocument.presentationml.presentation">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary" type="submit">Upload</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <small><?= date('d-m-Y h:i', strtotime($value['tgl'])) ?></small>
                            <?php else : ?>
                            <p>Sudah dikumpulkan</p>
                            <small><?= date('d-m-Y h:i', strtotime($value['tgl'])) ?></small>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="tab-pane fade" id="ujian" role="tabpanel">
                        <?php foreach($ujian as $key => $value) : ?>
                        <div class="pd-20 card-box mb-30">
                            <?php if(!empty($value['kodeujian'])) : ?>
                            <h2 style="font-weight: bold; color:green;">Ujian!!</h2>
                            <p>Ujian pada tanggal <?= date('d-m-Y', strtotime($value['tglujian'])) ?></p>
                            <?php if($value['tglujian'] == date('Y-m-d')) : ?>
                            <?php if($value['sudah'] === false) : ?>
                            <a onclick="return confirm('Apa anda siap?')"
                                href="<?= site_url('siswa/kelas/'.$value['koderuang'].'/ujian?kodeujian='.$value['kodeujian']) ?>">Kerjakan</a>
                            <?php endif; ?>
                            <?php endif; ?>
                            <br>
                            <small><?= date('d-m-Y h:i', strtotime($value['tgl'])) ?></small>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>