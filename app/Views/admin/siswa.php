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
                            <li class="breadcrumb-item active" aria-current="page">Siswa</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a class="btn btn-primary" href="<?= site_url('admin/inputSiswa') ?>">Input Siswa</a>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr class="text-center">
                        <th width="5%">No</th>
                        <th>NIS</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Jurusan</th>
                        <th>Foto</th>
                        <th>Password</th>
                        <th colspan="2" width="5%">Aksi</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($siswa as $key => $value) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['nis'] ?></td>
                        <td><?= $value['nisn'] ?></td>
                        <td><?= $value['nama'] ?></td>
                        <td><?= $value['tempatLahir'] ?>, <?= date("d-m-Y", strtotime($value['tglLahir'])) ?></td>
                        <td><?= $value['kelamin'] ?></td>
                        <td><?= $value['alamat'] ?></td>
                        <td><?= $value['jurusan'] ?></td>
                        <td><img id="foto" name="foto" src="<?= site_url('assets/images/siswa/' . $value['foto']) ?>"
                                width="50px">
                        </td>
                        <td>
                            <div style="display: none;" id="password<?= $no ?>"><?= $value['password'] ?></div>
                            <a href="#" id="tampil<?= $no ?>" role="button" onClick="tampil<?= $no ?>()">Tampilkan</a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-danger" onclick="return confirm('Apa anda yakin?')"
                                href="<?= site_url('admin/hapusSiswa/' . $value['nis']) ?>"><i
                                    class="fa fa-trash-o"></i></a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-info" href="<?= site_url('admin/editSiswa/' . $value['nis']) ?>"><i
                                    class="fa fa-pencil-square-o"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
<?php for ($i = 1; $i <= $no; $i++) : ?>

function tampil<?= $i ?>() {
    var t = document.getElementById("password<?= $i ?>");
    var l = document.getElementById("tampil<?= $i ?>");
    if (t.style.display === "none") {
        t.style.display = "block";
        l.innerHTML = "Sembunyikan";
    } else {
        t.style.display = "none";
        l.innerHTML = "Tampilkan";
    }
}
<?php endfor; ?>
</script>
<?= $this->endSection() ?>