<?= $this->extend('templates/guru') ?>
<?= $this->section('content') ?>
<div class="pd-ltr-20">
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="<?= site_url('assets/images/guru/').session()->get('foto') ?>" alt="">
            </div>
            <div class="col-md-8">
                <h4 class="font-20 weight-500 mb-10 text-capitalize">
                    Selamat Datang <div class="weight-600 font-30 text-blue"><?= session()->get('nama') ?>!</div>
                    <?= session()->get('nip') ?>
                </h4>
                <p class="font-18 max-width-600">
                <table class="table table-borderless">
                    <tr>
                        <td width="200">Tempat, Tanggal Lahir</td>
                        <td width="5">:</td>
                        <td>
                            <?= session()->get('tempatLahir') ?>,
                            <?= date("d-F-Y", strtotime(session()->get('tglLahir'))) ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="200">Jenis Kelamin</td>
                        <td width="5">:</td>
                        <td><?= session()->get('kelamin') ?></td>
                    </tr>
                    <tr>
                        <td width="200">Alamat</td>
                        <td width="5">:</td>
                        <td><?= session()->get('alamat') ?></td>
                    </tr>
                    <tr>
                        <td width="200">Jurusan</td>
                        <td width="5">:</td>
                        <td>
                            <?php
                            foreach ($mapel as $key => $value) {
                                if ($value['idmapel'] == session()->get('mapel')) {
                                    echo $value['mapel'];
                                }
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                </p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>