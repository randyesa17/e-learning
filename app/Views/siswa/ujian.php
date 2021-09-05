<?= $this->extend('templates/siswa') ?>
<?= $this->section('content') ?>
<style>
.container {
    border: 2px;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 2px;
}

.lighter {
    border-color: #dedede;
    background-color: #f1f1f1;
}

.container::after {
    content: "";
    clear: both;
    display: table;
}

.container img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
}

.container img.right {
    float: right;
    margin-left: 20px;
    margin-right: 0;
}

.time-right {
    float: right;
    color: #aaa;
}

.time-left {
    float: left;
    color: #999;
}
</style>

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
                            <li class="breadcrumb-item"><a href="<?= site_url('siswa') ?>">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="<?= site_url('siswa/kelas') ?>">Kelas</a></li>
                            <li class="breadcrumb-item"><a href="<?= site_url('siswa/kelas/'.$kelas) ?>">Ruang Kelas</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Soal Ujian</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    Waktu :<p id="demo"></p>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            <form action="<?= site_url('siswa/kelas/'.$kelas.'/ujian?kodeujian='.$kode) ?>" id="ujian" method="post">
                <?php if (!empty($soal)) : ?>
                <?php foreach ($soal as $key => $value) : ?>
                <p><?php echo $no . ". " . $value['soal']; ?></p>
                <img src="<?= site_url('assets/images/soal/'.$value['gambar']) ?>" alt="" style="width:150px;">
                <div class="form-group">
                    <div class="col">
                        A. <input type="radio" name="soal<?= $value['idsoal'] ?>" value="A"
                            id="soal<?= $value['idsoal'] ?>A"
                            onclick="jawab<?= $value['idsoal'] ?>(value)"><?= $value['pilA'] ?>
                    </div>
                    <div class="col">
                        B. <input type="radio" name="soal<?= $value['idsoal'] ?>" value="B"
                            id="soal<?= $value['idsoal'] ?>B"
                            onclick="jawab<?= $value['idsoal'] ?>(value)"><?= $value['pilB'] ?><br>
                    </div>
                    <div class="col">
                        C. <input type="radio" name="soal<?= $value['idsoal'] ?>" value="C"
                            id="soal<?= $value['idsoal'] ?>C"
                            onclick="jawab<?= $value['idsoal'] ?>(value)"><?= $value['pilC'] ?><br>
                    </div>
                    <div class="col">
                        D. <input type="radio" name="soal<?= $value['idsoal'] ?>" value="D"
                            id="soal<?= $value['idsoal'] ?>D"
                            onclick="jawab<?= $value['idsoal'] ?>(value)"><?= $value['pilD'] ?><br>
                    </div>
                    <hr>
                </div>
                <?php $no++;
                    endforeach; ?>
                <?php endif; ?>
                <button class="btn btn-primary mt-4" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
<?php foreach ($soal as $key => $value) : ?>

if (typeof localStorage.getItem("soal<?= $value['idsoal'] ?>") !== 'undefined' &&
    localStorage.getItem("soal<?= $value['idsoal'] ?>") != null) {
    if (localStorage.getItem("soal<?= $value['idsoal'] ?>") === 'A') {
        document.getElementById("soal<?= $value['idsoal'] ?>A").checked = true;
    } else if (localStorage.getItem("soal<?= $value['idsoal'] ?>") === 'B') {
        document.getElementById("soal<?= $value['idsoal'] ?>B").checked = true;
    } else if (localStorage.getItem("soal<?= $value['idsoal'] ?>") === 'C') {
        document.getElementById("soal<?= $value['idsoal'] ?>C").checked = true;
    } else if (localStorage.getItem("soal<?= $value['idsoal'] ?>") === 'D') {
        document.getElementById("soal<?= $value['idsoal'] ?>D").checked = true;
    }
}

function jawab<?= $value['idsoal'] ?>(element) {
    var jawaban<?= $value['idsoal'] ?> = element;
    localStorage.setItem("soal<?= $value['idsoal'] ?>", jawaban<?= $value['idsoal'] ?>);
}

<?php endforeach;?>
window.onbeforeunload = function() {
    return "Anda Yakin Mau Keluar?!!";
}

// Mengatur waktu akhir perhitungan mundur
var countDownDate = new Date("<?= date('M d, Y H:i:s', strtotime($tglselesai)) ?>").getTime();

// Memperbarui hitungan mundur setiap 1 detik
var x = setInterval(function() {

    // Untuk mendapatkan tanggal dan waktu hari ini
    var now = new Date().getTime();

    // Temukan jarak antara sekarang dan tanggal hitung mundur
    var distance = countDownDate - now;

    // Perhitungan waktu untuk hari, jam, menit dan detik
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Keluarkan hasil dalam elemen dengan id = "demo"
    document.getElementById("demo").innerHTML = hours + "Jam " +
        minutes + "Menit " + seconds + "Detik ";

    // Jika hitungan mundur selesai, tulis beberapa teks
    if (distance <
        0) {
        clearInterval(x);
        alert("Waktu Sudah Habis");
        document.getElementById("ujian").submit();
    }
}, 1000);
</script>
<?= $this->endSection() ?>