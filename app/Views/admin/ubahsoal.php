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
                            <li class="breadcrumb-item"><a href="<?= site_url('admin/ujian') ?>">Ujian</a></li>
                            <li class="breadcrumb-item"><a href="<?= site_url('admin/soal/' . $kode) ?>">Soal Ujian</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Ubah Soal Ujian</li>
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
            <form action="<?= site_url('admin/soal/edit/' . $kode . '?idsoal=' . $soal['idsoal']) ?>" method="post">
                <input type="hidden" class="form-control" name="kode" id="kode" value="<?= $kode ?>">
                <div class="form-group row">
                    <label for="soal" class="col-sm-4 col-form-label">Soal</label>
                    <div class="col">
                        <textarea class="form-control" name="soal" id="soal" row="3"><?= $soal['soal'] ?></textarea>
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