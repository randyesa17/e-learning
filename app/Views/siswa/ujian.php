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
                            id="soal<?= $value['idsoal'] ?>"><?= $value['pilA'] ?>
                    </div>
                    <div class="col">
                        <input type="radio" name="soal<?= $value['idsoal'] ?>" value="B"
                            id="soal<?= $value['idsoal'] ?>"><?= $value['pilB'] ?><br>
                    </div>
                    <div class="col">
                        <input type="radio" name="soal<?= $value['idsoal'] ?>" value="C"
                            id="soal<?= $value['idsoal'] ?>"><?= $value['pilC'] ?><br>
                    </div>
                    <div class="col">
                        <input type="radio" name="soal<?= $value['idsoal'] ?>" value="D"
                            id="soal<?= $value['idsoal'] ?>"><?= $value['pilD'] ?><br>
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
window.onbeforeunload = function() {
    return "Dude, are you sure you want to leave? Think of the kittens!";
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
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Keluarkan hasil dalam elemen dengan id = "demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
        minutes + "m " + seconds + "s ";

    // Jika hitungan mundur selesai, tulis beberapa teks 
    if (distance < 0) {
        clearInterval(x);
        alert(countDownDate);
        document.getElementById("ujian").submit();
    }
}, 1000);
</script>
<?= $this->endSection() ?>