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
                    Timer :<span id="timer"></span>
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
                        <input type="radio" name="soal<?= $value['idsoal'] ?>" value="A"
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
var test = 1 * (<?= $no ?> - 1);
// localStorage.clear();
document.addEventListener('DOMContentLoaded', function() {

    if (typeof localStorage.getItem("min") !== 'undefined' && typeof localStorage.getItem("sec") !==
        'undefined' &&
        localStorage.getItem("min") != null && localStorage.getItem("sec") != null) {
        var min = localStorage.getItem("min");
        var sec = localStorage.getItem("sec");
    } else {
        console.log("c2");
        var min = "0" + test;
        var sec = "0" + 5;
    }
    var time;

    setInterval(function() {

        localStorage.setItem("min", min);
        localStorage.setItem("sec", sec);
        time = min + " : " + sec;
        document.getElementById("timer").innerHTML = time;
        if (sec == 00) {
            if (min != 0) {
                min--;
                sec = 59;
                if (min < 10) {
                    min = "0" + min;
                }
            } else {
                alert("Waktu Sudah Habis!");
                localStorage.clear();
                document.getElementById("ujian").submit();
            }
        } else {
            sec--;
            if (sec < 10) {
                sec = "0" + sec;
            }
        }
    }, 1000);
});


// var count = 90 * <?= $total ?>;
// var interval = setInterval(function() {
//     var hours = parseInt(count / 3600) % 24;
//     var minutes = parseInt(count / 60) % 60;
//     var seconds = count % 60;
//     var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (
//         seconds < 10 ? "0" + seconds : seconds);

//     document.getElementById('count').innerHTML = result;
//     count--;
//     if (count === 0) {
//         clearInterval(interval);
//         document.getElementById('count').innerHTML = 'Done';
//         // or...
//         alert("You're out of time!");
//         document.getElementById("ujian").submit();
//     }
// }, 1000);
</script>
<?= $this->endSection() ?>