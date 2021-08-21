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
                            <li class="breadcrumb-item"><a
                                    href="<?= site_url('guru/kelas/'.$kelas.'/ujian?kodeujian='.$kode) ?>">Soal
                                    Ujian</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Soal</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <form action="<?= site_url('guru/kelas/' . $kode . '/ujian/edit?idsoal=' . $soal['idsoal']) ?>"
                method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="kode" id="kode" value="<?= $kode ?>">
                <input type="hidden" class="form-control" name="kelas" id="kelas" value="<?= $kelas ?>">
                <input type="hidden" class="form-control" name="gambar" id="gambar" value="<?= $soal['gambar'] ?>">
                <div class="form-group row">
                    <label for="soal" class="col-sm-4 col-form-label">Soal</label>
                    <div class="col">
                        <textarea class="form-control" name="soal" id="soal" row="3"><?= $soal['soal'] ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gambar" class="col-sm-4 col-form-label">Gambar</label>
                    <div class="col">
                        <input type="file" class="form-control-file form-control-sm" name="gambar" id="gambar"
                            accept="image/*">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pilA" class="col-sm-4 col-form-label">Pilihan A</label>
                    <div class="col">
                        <input type="text" class="form-control" name="pilA" id="pilA" value="<?= $soal['pilA'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pilB" class="col-sm-4 col-form-label">Pilihan B</label>
                    <div class="col">
                        <input type="text" class="form-control" name="pilB" id="pilB" value="<?= $soal['pilB'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pilC" class="col-sm-4 col-form-label">Pilihan C</label>
                    <div class="col">
                        <input type="text" class="form-control" name="pilC" id="pilC" value="<?= $soal['pilC'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pilD" class="col-sm-4 col-form-label">Pilihan D</label>
                    <div class="col">
                        <input type="text" class="form-control" name="pilD" id="pilD" value="<?= $soal['pilD'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kunci" class="col-sm-4 col-form-label">Jawaban</label>
                    <div class="col">
                        <select class="form-control" name="kunci" id="kunci">
                            <option value="A" <?php if ($soal['kunci'] == 'A') echo "selected" ?>>A</option>
                            <option value="B" <?php if ($soal['kunci'] == 'B') echo "selected" ?>>B</option>
                            <option value="C" <?php if ($soal['kunci'] == 'C') echo "selected" ?>>C</option>
                            <option value="D" <?php if ($soal['kunci'] == 'D') echo "selected" ?>>D</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>