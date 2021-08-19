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
                            <li class="breadcrumb-item active" aria-current="page">Jadwal</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a class="btn btn-primary" href="<?= site_url('admin/jadwal/input') ?>">Input Jadwal</a>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr class="text-center">
                        <th width="5%">No</th>
                        <th>Nama Jadwal</th>
                        <th>Kelas</th>
                        <th>Guru</th>
                        <th>Jenis</th>
                        <th>Tanggal</th>
                        <th colspan="2" width="5%">Aksi</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($jadwal as $key => $value) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['namajadwal'] ?></td>
                        <td><?= $value['ruang'] ?></td>
                        <td>
                            <?php
                            foreach ($ruang as $keyR => $valueR) {
                                if ($value['ruang'] == $valueR['koderuang']) {
                                    foreach ($guru as $keyG => $valueG) {
                                        if ($valueR['nip'] == $valueG['nip']) {
                                            echo $valueG['nama'];
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td><?= $value['jenis'] ?></td>
                        <td><?= date("d-m-Y", strtotime($value['tgl'])) ?></td>
                        <td>
                            <a class="btn btn-sm btn-danger" onclick="return confirm('Apa anda yakin?')"
                                href="<?= site_url('admin/jadwal/hapus/' . $value['idjadwal']) ?>"><i
                                    class="fa fa-trash-o"></i></a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-info"
                                href="<?= site_url('admin/jadwal/edit/' . $value['idjadwal']) ?>"><i
                                    class="fa fa-pencil-square-o"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <div class="calendar-wrap">
                <div id='calendar'></div>
            </div>
            <!-- calendar modal -->
            <div id="modal-view-event" class="modal modal-top fade calendar-modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h4 class="h4"><span class="event-icon weight-400 mr-3"></span><span
                                    class="event-title"></span></h4>
                            <div class="event-body"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
var site_url = "<?= site_url('admin') ?>";
</script>
<?= $this->endSection() ?>