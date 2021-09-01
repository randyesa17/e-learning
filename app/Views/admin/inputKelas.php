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
                            <li class="breadcrumb-item"><a href="<?= site_url('admin/kelas') ?>">Kelas</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $judul ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <div class="col">
                <?php if (!empty(session()->getFlashdata('info'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                        $error = session()->getFlashdata('info');
                        foreach ($error as $key => $value) {
                            echo $value;
                            echo "<br>";
                        }
                        ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Tambah Data Kelas</h4>
                </div>
            </div>
            <form action="<?= site_url('admin/inputKelas') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="kelas" class="col-sm-12 col-md-2 col-form-label">Kelas</label>
                    <div class="col-sm-12 col-md-10">
                        <div class="row">
                            <div class="col-2">
                                <select class="form-control" name="kelas" id="kelas" required>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <select class="form-control" name="jurusan" id="jurusan" required>
                                    <option value="MIPA">MIPA</option>
                                    <option value="IPS">IPS</option>
                                    <option value="Bahasa">Bahasa</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <input type="text" class="form-control" name="ruang" id="ruang" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row text-center">
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>