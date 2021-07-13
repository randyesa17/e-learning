<?= $this->extend('templates/guru') ?>
<?= $this->section('content') ?>
<h1><?= $judul ?></h1>
<hr>
<table class="table table-dark">
    <tr>
        <th>No</th>
        <th>NIS</th>
        <th>File</th>
    </tr>
    <?php $no = 1; foreach($tugas as $key => $value) : ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $value['nis'] ?></td>
        <td><a href="<?= site_url('assets/upload/tugas/'.$value['file']) ?>" download><?= $value['file'] ?></a></td>
    </tr>
    <?php endforeach; ?>
</table>
<?= $this->endSection() ?>