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
<h1><?= $judul ?></h1>
<hr>
<div class="row">
    <div class="col">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahSoal">Tambah Soal</button>
    </div>
</div>
<hr>
<h2>Soal</h2>
<!-- <form action="" method="post"> -->
<?php if(!empty($soal)) : ?>
<?php foreach($soal as $key => $value) : ?>
<div class="container lighter">
    <p><?php echo $value['no'].". ".$value['soal'];?></p>
    <div class="form-group">
        <div class="col">
            <input type="radio" name="soal<?= $value['no'] ?>" id="soal<?= $value['no'] ?>"><?= $value['pilA'] ?>
        </div>
        <div class="col">
            <input type="radio" name="soal<?= $value['no'] ?>" id="soal<?= $value['no'] ?>"><?= $value['pilB'] ?><br>
        </div>
        <div class="col">
            <input type="radio" name="soal<?= $value['no'] ?>" id="soal<?= $value['no'] ?>"><?= $value['pilC'] ?><br>
        </div>
        <div class="col">
            <input type="radio" name="soal<?= $value['no'] ?>" id="soal<?= $value['no'] ?>"><?= $value['pilD'] ?><br>
        </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
    <!-- <a class="btn btn-danger" href="#">Hapus Semua Soal</a> -->
    <!-- <button class="btn btn-primary" type="submit">Submit</button> -->
    <!-- </form> -->

    <div class="modal fade" id="tambahSoal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Tugas</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('guru/kelas/ujian/soal') ?>" method="post">
                        <input type="hidden" class="form-control" name="kode" id="kode" value="<?= $kode ?>">
                        <input type="hidden" class="form-control" name="kelas" id="kelas" value="<?= $kelas ?>">
                        <div class="form-group">
                            <?php
                        if (empty($soal) || $soal[0]['no'] != 1) {
                            $no = 1;
                        } else {
                            foreach($soal as $key => $value){
                                $no = $value['no'] + 1;
                            }
                        }
                        echo "Soal No. ".$no;
                        ?>
                        </div>
                        <input type="hidden" class="form-control" name="no" id="no" value="<?= $no ?>">
                        <div class="form-group row">
                            <label for="soal" class="col-sm-4 col-form-label">Soal</label>
                            <div class="col">
                                <textarea class="form-control" name="soal" id="soal" row="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pilA" class="col-sm-4 col-form-label">Pilihan 1</label>
                            <div class="col">
                                <input type="text" class="form-control" name="pilA" id="pilA">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pilB" class="col-sm-4 col-form-label">Pilihan 2</label>
                            <div class="col">
                                <input type="text" class="form-control" name="pilB" id="pilB">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pilC" class="col-sm-4 col-form-label">Pilihan 3</label>
                            <div class="col">
                                <input type="text" class="form-control" name="pilC" id="pilC">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pilD" class="col-sm-4 col-form-label">Pilihan 4</label>
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