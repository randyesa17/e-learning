<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\UjianModel;
use App\Models\SoalModel;
use App\Models\PostModel;
use App\Models\NilaiModel;

class Ujian extends BaseController
{
    public function index($kodeKelas)
    {
        $db = \Config\Database::connect();

        if($this->request->getMethod() == 'post'){
            $kode = $_GET['kodeujian'];
            $sql = "SELECT * FROM soal WHERE kodeujian='$kode'";
            $hasil = $db->query($sql);
            $hitung = $hasil->getNumRows();
            $nilaiSoal = 100/$hitung;
            $nilai = 0;
            $benar = 0;

            for ($i=0; $i < $hitung; $i++) { 
                $no = $i+1;
                $sql = "SELECT * FROM soal WHERE kodeujian='$kode' AND no='$no'";
                $hasil = $db->query($sql);
                $soal = $hasil->getResult('array');
                if ($this->request->getPost('soal'.$no) == $soal[0]['kunci']) {
                    $benar = $benar + 1;
                    $nilai = $benar * $nilaiSoal;
                }
            }

            $model = new NilaiModel();
            $sql = "SELECT * FROM kelas WHERE kodekelas='$kodeKelas'";
            $hasil = $db->query($sql);
            $mapel = $hasil->getResult('array');
            $data = [
                'nis' => session()->get('nis'),
                'idmapel' => $mapel[0]['idmapel'],
                'nilaiUjian' => $nilai,
            ];
            $model->insert($data);
            return redirect()->to(site_url('siswa/nilai'));
            // print_r($data);
        } else {
            $model = new SoalModel();

            $kode = $_GET['kodeujian'];
            $sql = "SELECT * FROM soal WHERE kodeujian='$kode' ORDER BY no ASC";
            $hasil = $db->query($sql);
            $soal = $hasil->getResult('array');
            $total = $hasil->getNumRows();
            
            $data = [
                'judul' => 'Ujian',
                'kode' => $_GET['kodeujian'],
                'soal' => $soal,
                'total' => $total,
                'kelas' => $kodeKelas,
            ];
            return view('siswa/ujian', $data);
        }
    }
}