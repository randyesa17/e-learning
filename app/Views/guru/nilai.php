<?= $this->extend('templates/guru') ?>
<?= $this->section('content') ?>
<h1><?= $judul ?></h1>
<hr>
<table class="table table-dark table-bordered">
    <tr class="text-center">
        <th width="5%">No</th>
        <th width="20%">NIS</th>
        <th colspan="2" width="25%">Nilai Tugas</th>
        <th width="25%">Nilai Ujian</th>
        <th colspan="2" width="25%">Nilai Akhir</th>
    </tr>
    <?php $no = 1; foreach($nilai as $key => $value) : ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $value['nis'] ?></td>
        <?php if ($value['nilaiTugas'] != "") : ?>
        <td colspan="2"><?= $value['nilaiTugas'] ?></td>
        <?php else : ?>
        <td>Belum Ada</td>
        <td><a href="#" data-toggle="modal" data-target="#tugas">[Masukkan Nilai]</a></td>
        <div class="modal fade" id="tugas" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Input Nilai Tugas</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= site_url('guru/nilai/tugas') ?>" method="post">
                            <input type="hidden" name="nis" value="<?= $value['nis'] ?>">
                            <div class="form-group row">
                                <label for="nilai" class="col-sm-2 col-form-label">Nilai</label>
                                <div class="col">
                                    <input type="number" class="form-control" name="nilai" id="nilai" max="100">
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Masukkan</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <?php endif; ?>

        <?php if ($value['nilaiUjian'] != "") : ?>
        <td><?= $value['nilaiUjian'] ?></td>
        <?php else : ?>
        <td>Belum Ada</td>
        <?php endif; ?>

        <?php if ($value['nilaiAkhir'] != "") : ?>
        <td colspan="2"><?= $value['nilaiAkhir'] ?></td>
        <?php else : ?>
        <td>Belum Ada</td>
        <td><a href="#" id="akhir" onClick="klikAkhir()"></a></td>
        <?php endif; ?>
    </tr>
    <?php endforeach; ?>
</table>
<?= $this->endSection() ?>