<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<style>
@media print {
    body * {
        visibility: hidden;
    }

    #section-to-print,
    #section-to-print * {
        visibility: visible;
    }

    #section-to-print {
        position: absolute;
        left: 0;
        top: 0;
    }

    #print {
        visibility: hidden;
    }

    #nis {
        visibility: hidden;
    }

    #hid {
        visibility: hidden;
    }
}
</style>
<div class="pd-ltr-20 xs-pd-20-10" id="section-to-print">
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
                            <li class="breadcrumb-item active" aria-current="page">Nilai</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <form action="<?= site_url('admin/nilai/cari') ?>" method="get">
                        <select class="form-control btn custom-select2" onchange="this.form.submit()" name="nis"
                            id="nis">
                            <option value="-1">--Pilih Siswa--</option>
                            <?php foreach($siswa as $key => $value) : ?>
                            <option value="<?= $value['nis'] ?>"><?= $value['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th width="5%">No</th>
                        <th>NIS</th>
                        <th>Mata Pelajaran</th>
                        <th>Nilai Tugas</th>
                        <th>Nilai UTS</th>
                        <th>Nilai UAS</th>
                        <th>Nilai Akhir</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($nilai as $key => $value) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['nis'] ?></td>
                        <td>
                            <?php
                                foreach($mapel as $key1 => $value1){
                                    if ($value['idmapel'] == $value1['idmapel']) {
                                        echo $value1['mapel'];
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if ($value['nilaiTugas'] != "") {
                                    echo $value['nilaiTugas'];
                                } else {
                                    echo "Belum Ada";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if ($value['nilaiUTS'] != "") {
                                    echo $value['nilaiTS'];
                                } else {
                                    echo "Belum Ada";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if ($value['nilaiUAS'] != "") {
                                    echo $value['nilaiUAS'];
                                } else {
                                    echo "Belum Ada";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if ($value['nilaiAkhir'] != "") {
                                    echo $value['nilaiAkhir'];
                                } else {
                                    echo "Belum Ada";
                                }
                            ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <?php if(!empty($nilai)) : ?>
            <?php if(empty($_GET['idmapel'])) : ?>
            <a href="<?= site_url('admin/nilai/rekap') ?>" id="hid" class="btn btn-primary">Rekap Semua Data</a>
            <?php else : ?>
            <a href="<?= site_url('admin/nilai/rekap?koderuang='.$kode) ?>" id="hid" class="btn btn-primary">Rekap Semua
                Data</a>
            <?php endif; ?>
            <?php endif; ?>
            <input id="print" class="btn btn-primary pull-right" onclick="window.print()" value="PRINT">
        </div>
    </div>
</div>
<?= $this->endSection() ?>