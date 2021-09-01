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

.container img {
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
                            <li class="breadcrumb-item"><a href="<?= site_url('guru/kelas/'.$kelas) ?>">Ruang Kelas</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Soal Ujian</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahSoal">Tambah
                        Soal</button>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <?php if (!empty($soal)) : ?>
            <?php foreach ($soal as $key => $value) : ?>
            <a class="btn btn-primary pull-right"
                href="<?= site_url('guru/kelas/' . $kelas . '/ujian/edit?idsoal=' . $value['idsoal']) ?>">Edit</a>
            <a class="btn btn-danger pull-right"
                href="<?= site_url('guru/kelas/' . $kelas . '/ujian/hapus?idsoal=' . $value['idsoal']) ?>">Hapus</a>
            <p><?php echo $no . ". " . $value['soal']; ?></p>
            <img src="<?= site_url('assets/images/soal/'.$value['gambar']) ?>" alt="" style="width:150px;">
            <div class="form-group">
                <div class="col">
                    A. <input type="radio" name="soal<?= $value['idsoal'] ?>"
                        id="soal<?= $value['idsoal'] ?>"><?= $value['pilA'] ?>
                </div>
                <div class="col">
                    B. <input type="radio" name="soal<?= $value['idsoal'] ?>"
                        id="soal<?= $value['idsoal'] ?>"><?= $value['pilB'] ?><br>
                </div>
                <div class="col">
                    C. <input type="radio" name="soal<?= $value['idsoal'] ?>"
                        id="soal<?= $value['idsoal'] ?>"><?= $value['pilC'] ?><br>
                </div>
                <div class="col">
                    D. <input type="radio" name="soal<?= $value['idsoal'] ?>"
                        id="soal<?= $value['idsoal'] ?>"><?= $value['pilD'] ?><br>
                </div>
                <hr>
                <?php $no++;
                endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambahSoal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Tugas</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('guru/kelas/ujian/soal') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="kode" id="kode" value="<?= $kode ?>">
                        <input type="hidden" class="form-control" name="kelas" id="kelas" value="<?= $kelas ?>">
                        <div class="form-group row">
                            <label for="soal" class="col-sm-4 col-form-label">Soal</label>
                            <div class="col">
                                <textarea class="form-control" name="soal" id="soal" row="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gambar" class="col-sm-4 col-form-label">Gambar</label>
                            <div class="col">
                                <input type="file" class="form-control-file" name="gambar" id="gambar" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pilA" class="col-sm-4 col-form-label">Pilihan A</label>
                            <div class="col">
                                <input type="text" class="form-control" name="pilA" id="pilA">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pilB" class="col-sm-4 col-form-label">Pilihan B</label>
                            <div class="col">
                                <input type="text" class="form-control" name="pilB" id="pilB">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pilC" class="col-sm-4 col-form-label">Pilihan C</label>
                            <div class="col">
                                <input type="text" class="form-control" name="pilC" id="pilC">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pilD" class="col-sm-4 col-form-label">Pilihan D</label>
                            <div class="col">
                                <input type="text" class="form-control" name="pilD" id="pilD">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kunci" class="col-sm-4 col-form-label">Jawaban</label>
                            <div class="col">
                                <select class="form-control" name="kunci" id="kunci">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
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
</div>
<?= $this->endSection() ?>