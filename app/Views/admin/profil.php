<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <h2><?= $judul ?></h2>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
        <table class="table">
            <tr>
                <td width="170">Nama Lengkap</td>
                <td width="10">:</td>
                <td>
                    <div id="tNama"><?= $admin['nama'] ?></div>
                    <form action="<?= site_url('admin/profil/nama') ?>" method="post">
                        <input style="display: none;" type="text" name="iNama" id="iNama" value="<?= $admin['nama'] ?>">
                </td>
                <td><button class="btn btn-sm btn-primary" style="display: none;" id="bNama" type="submit">UBAH</button>
                </td>
                </form>
                <td><a id="lNama" role="button" onClick="klikNama()">[ubah]</a></td>
            </tr>
            <tr>
                <td width="120">Username</td>
                <td width="10">:</td>
                <td colspan="3"><?= $admin['username'] ?></a></td>
            </tr>
            <tr>
                <td width="150">Password</td>
                <td width="10">:</td>
                <td colspan="3"><a href="<?= site_url('admin/profil/password') ?>">[ubah]</a></td>
            </tr>
        </table>
    </div>
</div>
<script>
function klikNama() {
    var i = document.getElementById("iNama");
    var t = document.getElementById("tNama");
    var b = document.getElementById("bNama");
    var l = document.getElementById("lNama");
    if (i.style.display === "none") {
        i.style.display = "block";
        b.style.display = "block";
        t.style.display = "none";
        l.innerHTML = "[batal]";
    } else {
        i.style.display = "none";
        b.style.display = "none";
        t.style.display = "block";
        l.innerHTML = "[ubah]";
    }
}
</script>
<?= $this->endSection() ?>