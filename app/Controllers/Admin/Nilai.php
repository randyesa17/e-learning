<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\NilaiModel;
use App\Models\RuangKelasModel;
use App\Models\MapelModel;
use App\Models\JurusanModel;

class Nilai extends BaseController
{
    public function index()
    {
        $model = new NilaiModel();
        $modelRuang = new RuangKelasModel();
        $modelMapel = new MapelModel();
        // $modelJurusan = new JurusanModel();

        $nilai = $model->findAll();
        $ruang = $modelRuang->findAll();
        $mapel = $modelMapel->findAll();
        // $jurusan = $modelJurusan->findAll();
        $data = [
            'judul' => 'Daftar Nilai',
            'nilai' => $nilai,
            'ruang' => $ruang,
            'mapel' => $mapel,
            // 'jurusan' => $jurusan,
        ];
        return view('admin/nilai', $data);
    }

    public function cari()
    {
        $model = new NilaiModel();
        $modelMapel = new MapelModel();
        $modelRuang = new RuangKelasModel();
        // $modelJurusan = new JurusanModel();

        $ruang = $modelRuang->where('koderuang', $_GET['koderuang'])->findAll();
        $nama=$ruang[0]['namaruang'];

        foreach ($ruang as $key => $value) {
            $nilai[$key] = $model->where('nis', $value['nis'])->first();
        }
        
        $mapel = $modelMapel->findAll();
        $ruang = $modelRuang->findAll();
        // $jurusan = $modelJurusan->findAll();
        $data = [
            'judul' => 'Daftar Nilai '.$nama,
            'nilai' => $nilai,
            'mapel' => $mapel,
            'ruang' => $ruang,
            'kode' => $_GET['koderuang'],
        ];
        return view('admin/nilai', $data);
        // echo $_GET['idmapel'];
    }

    public function rekap()
    {
        if (!empty($_GET['koderuang'])) {
            $model = new NilaiModel();

            $ruang = $modelRuang->where('koderuang', $_GET['koderuang'])->findAll();

            foreach ($ruang as $key => $value) {
                $nilai[$key] = $model->where('nis', $value['nis'])->first();
            }

            foreach ($nilai as $key => $value) {
                $nTugas = $value['nilaiTugas'];
                $nUjian = $value['nilaiUjian'];
                $nAkhir = ((60/100) * $nUjian)+((40/100)*$nTugas);
                
                $data = [
                    'nilaiAkhir' => $nAkhir,
                ];
                $model->where('idmapel', $value['idmapel'])->set($data)->update();
                return redirect()->to(site_url('admin/nilai/cari?koderuang='.$_GET['koderuang']));
            }
        } else {
            $model = new NilaiModel();

            $nilai = $model->findAll();

            foreach ($nilai as $key => $value) {
                $nTugas = $value['nilaiTugas'];
                $nUjian = $value['nilaiUjian'];
                $nAkhir = ((60/100) * $nUjian)+((40/100)*$nTugas);
                
                $data = [
                    'nilaiAkhir' => $nAkhir,
                ];
                $model->update($value['no'], $data);
                return redirect()->to(site_url('admin/nilai'));
            }
        }
    }
}