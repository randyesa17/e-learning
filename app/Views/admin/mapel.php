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
                            <li class="breadcrumb-item active" aria-current="page">Mata Pelajaran</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a class="btn btn-primary" href="<?= site_url('admin/inputMapel') ?>">Input Mata Pelajaran</a>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th width="5%">No</th>
                        <th>Mata Pelajaran</th>
                        <th colspan="2" width="5%">Aksi</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($mapel as $key => $value) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['mapel'] ?></td>
                        <td>
                            <a class="btn btn-sm btn-danger" onclick="return confirm('Apa anda yakin?')"
                                href="<?= site_url('admin/hapusMapel/' . $value['idmapel']) ?>"><i
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