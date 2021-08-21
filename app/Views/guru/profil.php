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
                            <li class="breadcrumb-item"><a href="<?= site_url('admin/home') ?>">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profil</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td width="170">Nama Lengkap</td>
                        <td width="10">:</td>
                        <td>
                            <div id="tNama"><?= $admin['nama'] ?></div>
                            <form action="<?= site_url('admin/profil/nama') ?>" method="post">
                                <input style="display: none;" type="text" name="iNama" id="iNama"
                                    value="<?= $admin['nama'] ?>">
                        </td>
                        <td><button class="btn btn-sm btn-primary" style="display: none;" id="bNama"
                                type="submit">UBAH</button>
                        </td>
                        </form>
                        <td><a id="lNama" role="button" onClick="klikNama()">[ubah]</a></td>
                    </tr>
                    <tr>
                        <td width="120">Username</td>
                        <td width="10">:</td>
                        <td colspan="3"><?= $admin['username'] ?></a></td>
                    </tr>
                    <tr>
                        <td width="150">Password</td>
                        <td width="10">:</td>
                        <td colspan="3"><a href="<?= site_url('admin/profil/password') ?>">[ubah]</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row text-center">
    <div class="col">
        <h1><?= $judul ?></h1>
    </div>
</div>
<hr>
<div class="row text-center">
    <div class="col">
        <img width="150px" src="<?= site_url('assets/images/guru/').session()->get('foto') ?>"
            class="rounded-circle img-fluid img-thumbnail" alt="<?= session()->get('nama') ?>">
    </div>
</div>
<?= $this->endSection() ?>