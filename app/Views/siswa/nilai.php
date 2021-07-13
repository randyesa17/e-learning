<?= $this->extend('templates/siswa') ?>
<?= $this->section('content') ?>
<h1><?= $judul ?></h1>
<hr>
<table class="table table-success">
    <tr>
        <th>No</th>
        <th>Mata Pelajaran</th>
        <th>Nilai Tugas</th>
        <th>Nilai Ujian</th>
        <th>Nilai Akhir</th>
    </tr>
    <?php $no = 1; foreach($nilai as $key => $value) : ?>
    <tr>
        <td><?= $no++ ?></td>
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
<?= $this->endSection() ?>