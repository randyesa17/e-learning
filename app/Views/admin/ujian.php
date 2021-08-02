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
                            <li class="breadcrumb-item active" aria-current="page">Ujian</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a class="btn btn-primary" href="<?= site_url('admin/inputUjian') ?>">Input Ujian</a>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th width="5%">No</th>
                        <th>Kode Ujian</th>
                        <th>Ruang Kelas</th>
                        <th>Kelas</th>
                        <th>Mata Pelajaran</th>
                        <th>Jenis Ujian</th>
                        <th>Tanggal</th>
                        <th colspan="2" width="5%">Aksi</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($ujian as $key => $value) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['kodeujian'] ?></td>
                        <td>
                            <?php
                                foreach ($ruang as $keyR => $valueR) {
                                    if ($value['koderuang'] == $valueR['koderuang']) {
                                        echo $valueR['namaruang'];
                                    }
                                }
                                ?>
                        </td>
                        <td>
                            <?php
                                foreach ($ruang as $keyR => $valueR) {
                                    if ($value['koderuang'] == $valueR['koderuang']) {
                                        foreach ($kelas as $keyK => $valueK) {
                                            if ($valueR['idkelas'] == $valueK['idkelas']) {
                                                echo $valueK['kelas'];
                                            }
                                        }
                                    }
                                }
                                ?>
                        </td>
                        <td>
                            <?php
                                foreach ($ruang as $keyR => $valueR) {
                                    if ($value['koderuang'] == $valueR['koderuang']) {
                                        foreach ($mapel as $keyM => $valueM) {
                                            if ($valueR['idmapel'] == $valueM['idmapel']) {
                                                echo $valueM['mapel'];
                                            }
                                        }
                                    }
                                }
                                ?>
                        </td>
                        <td><?= $value['jenis'] ?></td>
                        <td><?= date('d-m-Y', strtotime($value['tgl'])) ?></td>
                        <td>
                            <a class="btn btn-sm btn-info"
                                href="<?= site_url('admin/soal/' . $value['kodeujian']) ?>">Soal</a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-danger" onclick="return confirm('Apa anda yakin?')"
                                href="<?= site_url('admin/hapusUjian/' . $value['kodeujian']) ?>"><i
                                    class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>