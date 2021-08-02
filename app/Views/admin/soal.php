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
                href="<?= site_url('admin/soal/edit/' . $kode . '?idsoal=' . $value['idsoal']) ?>">Edit</a>
            <p><?php echo $no . ". " . $value['soal']; ?></p>
            <div class="form-group">
                <div class="col">
                    <input type="radio" name="soal<?= $value['idsoal'] ?>"
                        id="soal<?= $value['idsoal'] ?>"><?= $value['pilA'] ?>
                </div>
                <div class="col">
                    <input type="radio" name="soal<?= $value['idsoal'] ?>"
                        id="soal<?= $value['idsoal'] ?>"><?= $value['pilB'] ?><br>
                </div>
                <div class="col">
                    <input type="radio" name="soal<?= $value['idsoal'] ?>"
                        id="soal<?= $value['idsoal'] ?>"><?= $value['pilC'] ?><br>
                </div>
                <div class="col">
                    <input type="radio" name="soal<?= $value['idsoal'] ?>"
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
                    <form action="<?= site_url('admin/soal/' . $kode) ?>" method="post">
                        <input type="hidden" class="form-control" name="kode" id="kode" value="<?= $kode ?>">
                        <div class="form-group row">
                            <label for="soal" class="col-sm-4 col-form-label">Soal</label>
                            <div class="col">
                                <textarea class="form-control" name="soal" id="soal" row="3"></textarea>
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
    <?= $this->endSection() ?>