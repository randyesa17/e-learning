<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2><?= $judul ?></h2>
        </div>
    </div>
    <hr>
    <div class="col">
        <?php if(!empty(session()->getFlashdata('info'))) : ?>
        <div class="alert alert-danger" role="alert">
            <?php 
                $error = session()->getFlashdata('info'); 
                foreach ($error as $key => $value) {
                    echo $value;
                    echo "<br>";
                }
            ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
        <div class="row">
            <div class="col">
                <form action="<?= site_url('admin/inputJurusan') ?>" method="post">
                    <div style="margin-bottom: 10px" class="row mb-3">
                        <label for="jurusan" class="col-sm-5 col-form-label">Jurusan</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" name="jurusan" id="jurusan"
                                required>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="form-group text-center">
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>