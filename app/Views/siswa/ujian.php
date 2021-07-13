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
<h1><?= $judul ?></h1>
<hr>
<div id="count">Waktu</div>
<hr>
<h2>Soal</h2>
<form action="<?= site_url('siswa/kelas/'.$kelas.'/ujian?kodeujian='.$kode) ?>" id="ujian" method="post">
    <?php if(!empty($soal)) : ?>
    <?php foreach($soal as $key => $value) : ?>
    <div class="container lighter">
        <p><?php echo $value['no'].". ".$value['soal'];?></p>
        <div class="form-group">
            <div class="col">
                <input type="radio" name="soal<?= $value['no'] ?>" id="soal<?= $value['no'] ?>"
                    value="A"><?= $value['pilA'] ?>
            </div>
            <div class="col">
                <input type="radio" name="soal<?= $value['no'] ?>" id="soal<?= $value['no'] ?>"
                    value="B"><?= $value['pilB'] ?><br>
            </div>
            <div class="col">
                <input type="radio" name="soal<?= $value['no'] ?>" id="soal<?= $value['no'] ?>"
                    value="C"><?= $value['pilC'] ?><br>
            </div>
            <div class="col">
                <input type="radio" name="soal<?= $value['no'] ?>" id="soal<?= $value['no'] ?>"
                    value="D"><?= $value['pilD'] ?><br>
            </div>
        </div>
        <?php $no=$value['no'] ?>
        <?php endforeach; ?>
        <?php endif; ?>
        <!-- <a class="btn btn-danger" href="#">Hapus Semua Soal</a> -->
        <button class="btn btn-primary mt-4" type="submit">Submit</button>
</form>
<script>
var test = 90;
if (localStorage.getItem("counter1")) {
    if (localStorage.getItem("counter1") <= 0) {
        var value = test;
        alert(value);
    } else {
        var value = localStorage.getItem("counter1");
    }
} else {
    var value = test;
}
document.getElementById('count').innerHTML = value;

var counter = function() {
    if (value <= 0) {
        localStorage.setItem("counter1", test);
        value = test;
    } else {
        value = parseInt(value) - 1;
        localStorage.setItem("counter1", value);
    }
    document.getElementById('count').innerHTML = value;
};

var interval = setInterval(function() {
    counter();
}, 1000);
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