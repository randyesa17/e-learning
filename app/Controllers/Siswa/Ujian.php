<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\UjianModel;
use App\Models\SoalModel;
use App\Models\PostModel;
use App\Models\NilaiModel;
use App\Models\RuangKelasModel;
use App\Models\PengerjaanModel;

class Ujian extends BaseController
{
    public function index($kodeKelas)
    {
        $modelPengerjaan = new PengerjaanModel();
        $db = \Config\Database::connect();

        if($this->request->getMethod() == 'post'){
            $kode = $_GET['kodeujian'];
            $sql = "SELECT * FROM soal WHERE kodeujian='$kode'";
            $hasil = $db->query($sql);
            $result = $hasil->getResult('array');
            $hitung = $hasil->getNumRows();
            $nilaiSoal = 100/$hitung;
            $nilai = 0;
            $benar = 0;

            foreach ($result as $key => $value) {
                if ($this->request->getPost('soal'.$value['idsoal']) == $value['kunci']) {
                    $benar = $benar + 1;
                    $nilai = $benar * $nilaiSoal;
                }
            }

            $model = new NilaiModel();
            $modelRuang = new RuangKelasModel();
            $mapel = $modelRuang->where('koderuang', $kodeKelas)->first();
            $Arrnilai = $model->where('idmapel', $mapel['idmapel'])->first();
            if (!empty($Arrnilai)) {
                $data = [
                    'nilaiUjian' => $nilai,
                ];
                $model->update($Arrnilai['no'], $data);
            } else {
                $data = [
                    'nis' => session()->get('nis'),
                    'idmapel' => $mapel['idmapel'],
                    'nilaiUjian' => $nilai,
                ];
                $model->insert($data);
            }
            $data = [
                'nilai' => $nilai,
            ];
            $pengerjaan = $modelPengerjaan->where('kodeujian', $kode)->first();
            $modelPengerjaan->update($pengerjaan['no'], $data);
            return redirect()->to(site_url('siswa/nilai'));
            // print_r($this->request->getPost());
        } else {
            $model = new SoalModel();
            $modelPengerjaan = new PengerjaanModel();

            $kode = $_GET['kodeujian'];
            $sql = "SELECT * FROM soal WHERE kodeujian='$kode' ORDER BY RAND()";
            $hasil = $db->query($sql);
            $soal = $hasil->getResult('array');
            $total = $hasil->getNumRows();
            
            $waktuSekarang = date("YmdGis");
            $waktuUjian = $total * 90;
            $menit = $waktuUjian/60;
            $detik = $waktuUjian%60;
            $menitend = date("i") + $menit;
            $detikend = date("s") + $detik;
            // $waktuSekarang->add(new DateInterval('PT'.$menit.'M'.$detik.'S'));
            $limitwaktu = date("YmdGis", strtotime($waktuSekarang." + ".$menit." minute + ".$detik." second"));
            $tglselesai = date("Y-m-d G:i:s", strtotime($limitwaktu));
            // echo "<pre>";
            // print_r($waktuSekarang);
            $sudah = $modelPengerjaan->where(['nis' => session()->get('nis'), 'kodeujian' => $_GET['kodeujian']])->first();
            if (empty($sudah)) {
                $tambah = [
                    'nis' => session()->get('nis'),
                    'kodeujian' => $_GET['kodeujian'],
                    'tglselesai' => $tglselesai,
                ];
                $modelPengerjaan->insert($tambah);
                $sudah = $modelPengerjaan->where(['nis' => session()->get('nis'), 'kodeujian' => $_GET['kodeujian']])->first();
                $tanggal = $sudah['tglselesai'];
                // print_r('kosong');
            } else {
                $sudah = $modelPengerjaan->where(['nis' => session()->get('nis'), 'kodeujian' => $_GET['kodeujian']])->first();
                $tanggal = $sudah['tglselesai'];
                // print_r('ada');
            }
            
            $data = [
                'judul' => 'Ujian',
                'kode' => $_GET['kodeujian'],
                'soal' => $soal,
                'total' => $total,
                'tglselesai' => $tanggal,
                'kelas' => $kodeKelas,
                'no' => 1,
            ];
            return view('siswa/ujian', $data);
        }
    }
}