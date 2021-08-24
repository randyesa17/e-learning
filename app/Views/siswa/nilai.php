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
                            <li class="breadcrumb-item active" aria-current="page">Nilai</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Mata Pelajaran</th>
                        <th>Nilai Tugas</th>
                        <th>Nilai Ujian</th>
                        <th>Nilai Akhir</th>
                    </tr>
                    <?php $no = 1; foreach($nilai as $key => $value) : ?>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
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
                                if ($value['nilaiUjian'] != "") {
                                    echo $value['nilaiUjian'];
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
        </div>
    </div>
</div>
<?= $this->endSection() ?>