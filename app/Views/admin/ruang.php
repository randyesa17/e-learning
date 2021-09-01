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
                            <li class="breadcrumb-item active" aria-current="page">Ruang Kelas</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Ruang Kelas</th>
                        <th>Guru</th>
                        <th>Kelas</th>
                        <th>Mata Pelajaran</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($ruang as $key => $value) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['namaruang'] ?></td>
                        <td>
                            <?php
                            foreach ($guru as $keyG => $valueG) {
                                if ($value['nip'] == $valueG['nip']) {
                                    echo $valueG['nama'];
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            foreach ($kelas as $keyK => $valueK) {
                                if ($value['idkelas'] == $valueK['idkelas']) {
                                    echo $valueK['kelas'];
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            foreach ($mapel as $keyM => $valueM) {
                                if ($value['idmapel'] == $valueM['idmapel']) {
                                    echo $valueM['mapel'];
                                }
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