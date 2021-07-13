<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<div class="col-8">
    <h2><?= $judul ?></h2>
</div>
<hr>
<div class="col-6" style="margin-bottom: 5px">
    <a class="btn btn-primary" href="<?= site_url('admin/tambah') ?>">Tambah</a>
</div>
<div class="col">
    <table class="table">
        <tr>
            <th width="5%">No</th>
            <th width="50%">Nama</th>
            <th width="30%">Username</th>
            <th width="15%">Aksi</th>
        </tr>
        <?php $no = 1; foreach($admin as $key => $value) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value['nama'] ?></td>
            <td><?= $value['username'] ?></td>
            <td width="20">
                <?php if($value['idadmin'] != session()->get('idadmin')) : ?>
                <a class="btn btn-sm btn-danger" href="<?= site_url('admin/hapus/'.$value['idadmin']) ?>"><i
                        class="fa fa-trash-o"></i></a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?= $this->endSection() ?>