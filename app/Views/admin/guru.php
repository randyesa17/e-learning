<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<div class="col-8">
    <h2><?= $judul ?></h2>
</div>
<hr>
<a class="btn btn-theme" href="<?= site_url('admin/inputGuru') ?>">Input Guru</a>
<hr>
<div class="col">
    <table class="table table-hover">
        <tr>
            <th width="5%">No</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Mata Pelajaran</th>
            <th>Foto</th>
            <th>Password</th>
            <th colspan="2" width="5%">Aksi</th>
        </tr>
        <?php $no = 1; foreach($guru as $key => $value) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value['nip'] ?></td>
            <td><?= $value['nama'] ?></td>
            <td><?= $value['tempatLahir'] ?>, <?= date("d-m-Y", strtotime($value['tglLahir'])) ?></td>
            <td><?= $value['kelamin'] ?></td>
            <td><?= $value['alamat'] ?></td>
            <td><?= $value['mapel'] ?></td>
            <td><img id="foto" name="foto" src="<?= site_url('assets/images/guru/'.$value['foto']) ?>" width="50px">
            </td>
            <td>
                <div style="display: none;" id="password<?= $no ?>"><?= $value['password'] ?></div>
                <a href="#" id="tampil<?= $no ?>" role="button" onClick="tampil<?= $no ?>()">Tampilkan</a>
            </td>
            <td>
                <a class="btn btn-sm btn-danger" onclick="return confirm('Apa anda yakin?')"
                    href="<?= site_url('admin/hapusGuru/'.$value['nip']) ?>"><i class="fa fa-trash-o"></i></a>
            </td>
            <td>
                <a class="btn btn-sm btn-info" href="<?= site_url('admin/editGuru/'.$value['nip']) ?>"><i
                        class="fa fa-pencil-square-o"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<script>
<?php for($i=1; $i<=$no; $i++) : ?>

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