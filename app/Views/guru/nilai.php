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
                            <li class="breadcrumb-item active" aria-current="page">Kumpulan Nilai</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <form action="<?= site_url('guru/nilai/cari') ?>" method="get">
                        <select class="form-control btn custom-select2" onchange="this.form.submit()" name="ruang"
                            id="ruang">
                            <option value="-1">--Pilih Ruang Kelas--</option>
                            <?php foreach($ruang as $key => $value) : ?>
                            <option value="<?= $value['koderuang'] ?>"><?= $value['namaruang'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr class="text-center">
                        <th width="5%">No</th>
                        <th width="20%">NIS</th>
                        <th colspan="2" width="20%">Nilai Tugas</th>
                        <th width="20%">Nilai UTS</th>
                        <th width="20%">Nilai UAS</th>
                        <th colspan="2" width="20%">Nilai Akhir</th>
                    </tr>
                    <?php if (!empty($nilai)) : ?>
                    <?php $no = 1; foreach($nilai as $key => $value) : ?>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td><?= $value['nis'] ?></td>
                        <?php if ($value['nilaiTugas'] != "") : ?>
                        <td colspan="2"><?= $value['nilaiTugas'] ?></td>
                        <?php else : ?>
                        <td>Belum Ada</td>
                        <td><a href="#" data-toggle="modal" data-target="#tugas<?= $value['nis'] ?>">[Masukkan
                                Nilai]</a></td>
                        <div class="modal fade" id="tugas<?= $value['nis'] ?>" role="dialog">
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
                                                    <input type="number" class="form-control" name="nilai" id="nilai"
                                                        max="100">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary" type="submit">Masukkan</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($value['nilaiUTS'] != "") : ?>
                        <td><?= $value['nilaiUTS'] ?></td>
                        <?php else : ?>
                        <td>Belum Ada</td>
                        <?php endif; ?>

                        <?php if ($value['nilaiUAS'] != "") : ?>
                        <td><?= $value['nilaiUAS'] ?></td>
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
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>