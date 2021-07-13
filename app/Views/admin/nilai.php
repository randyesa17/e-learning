<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<h1><?= $judul ?></h1>
<hr>
<form action="<?= site_url('admin/nilai/cari') ?>" method="get">
    <div class="form-group">
        <select class="form-control" onchange="this.form.submit()" name="idmapel" id="idmapel">
            <option value="-1">--Pilih Mata Pelajaran--</option>
            <?php foreach($mapel as $key => $value) : ?>
            <option value="<?= $value['idmapel'] ?>"><?= $value['mapel'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</form>
<table class="table table-success">
    <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Mata Pelajaran</th>
        <th>Nilai Tugas</th>
        <th>Nilai Ujian</th>
        <th>Nilai Akhir</th>
    </tr>
    <?php $no = 1; foreach($nilai as $key => $value) : ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $value['nis'] ?></td>
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
<?php if(!empty($nilai)) : ?>
<?php if(empty($_GET['idmapel'])) : ?>
<a href="<?= site_url('admin/nilai/rekap') ?>" class="btn btn-primary">Rekap Semua Data</a>
<?php else : ?>
<a href="<?= site_url('admin/nilai/rekap?idmapel='.$_GET['idmapel']) ?>" class="btn btn-primary">Rekap Semua Data</a>
<?php endif; ?>
<?php endif; ?>
<input class="btn btn-primary pull-right" onclick="window.print()" value="PRINT">
<?= $this->endSection() ?>