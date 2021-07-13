<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\NilaiModel;
use App\Models\MapelModel;
use App\Models\JurusanModel;

class Nilai extends BaseController
{
    public function index()
    {
        $model = new NilaiModel();
        $modelMapel = new MapelModel();
        // $modelJurusan = new JurusanModel();

        $nilai = $model->findAll();
        $mapel = $modelMapel->findAll();
        // $jurusan = $modelJurusan->findAll();
        $data = [
            'judul' => 'Daftar Nilai',
            'nilai' => $nilai,
            'mapel' => $mapel,
            // 'jurusan' => $jurusan,
        ];
        return view('admin/nilai', $data);
    }

    public function cari()
    {
        $model = new NilaiModel();
        $modelMapel = new MapelModel();
        // $modelJurusan = new JurusanModel();

        $nilai = $model->where('idmapel', $_GET['idmapel'])->findAll();
        $mapel = $modelMapel->findAll();
        // $jurusan = $modelJurusan->findAll();
        $data = [
            'judul' => 'Daftar Nilai',
            'nilai' => $nilai,
            'mapel' => $mapel,
        ];
        return view('admin/nilai', $data);
        // echo $_GET['idmapel'];
    }

    public function rekap()
    {
        if (!empty($_GET['idmapel'])) {
            $model = new NilaiModel();

            $nilai = $model->where('idmapel', $_GET['idmapel'])->findAll();

            foreach ($nilai as $key => $value) {
                $nTugas = $value['nilaiTugas'];
                $nUjian = $value['nilaiUjian'];
                $nAkhir = ((60/100) * $nUjian)+((40/100)*$nTugas);
                
                $data = [
                    'nilaiAkhir' => $nAkhir,
                ];
                $model->where('idmapel', $_GET['idmapel'])->set($data)->update();
                return redirect()->to(site_url('admin/nilai/cari?idmapel='.$_GET['idmapel']));
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