<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<div class="col-8">
    <h2><?= $judul ?></h2>
</div>
<hr>
<a class="btn btn-theme" href="<?= site_url('admin/inputMapel') ?>">Input Mata Pelajaran</a>
<hr>
<div class="col">
    <table class="table">
        <tr>
            <th width="5%">No</th>
            <th>Mata Pelajaran</th>
            <th width="15%">Aksi</th>
        </tr>
        <?php $no = 1; foreach($mapel as $key => $value) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value['mapel'] ?></td>
            <td width="20">
                <a class="btn btn-sm btn-danger" onclick="return confirm('Apa anda yakin?')"
                    href="<?= site_url('admin/hapusMapel/'.$value['idmapel']) ?>"><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?= $this->endSection() ?>