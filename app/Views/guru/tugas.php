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
                            <li class="breadcrumb-item"><a href="<?= site_url('guru/kelas') ?>">Kelas</a></li>
                            <li class="breadcrumb-item"><a href="<?= site_url('guru/kelas/'.$kelas) ?>">Ruang Kelas</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Kumpulan Tugas</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>File</th>
                    </tr>
                    <?php $no = 1; foreach($tugas as $key => $value) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['nis'] ?></td>
                        <td>
                            <?php
                            foreach ($siswa as $keyS => $valueS) {
                                if ($value['nis'] == $valueS['nis']) {
                                    echo $valueS['nama'];
                                }
                            }
                            ?>
                        </td>
                        <td><a href="<?= site_url('assets/upload/tugas/'.$value['file']) ?>"
                                download><?= $value['file'] ?></a></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>