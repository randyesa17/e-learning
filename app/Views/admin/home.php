<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<link href="<?= site_url('assets/css/styleAdmin.css') ?>" rel="stylesheet">
<section class="main_full banner_section_top">
    <div class="container-fluid">
        <div class="row">
            <div class="full">
                <div class="slider_banner">
                    <img class="img-responsive"
                        style="width: 1080px; opacity: 0.6; position: relative; margin:20px 0; border-radius:  50% / 10%;"
                        src="<?= site_url('assets/images/slider_img.jpg') ?>" alt="#" />
                    <div class="slide_cont">
                        <div style="color: #000" class="slider_cont_inner">
                            <h3>Selamat Datang di</h3>
                            <h3>Web E-Learning</h3>
                            <h3>SMAN 1 Sindang</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>