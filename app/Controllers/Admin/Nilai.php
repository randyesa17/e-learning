<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\NilaiModel;
use App\Models\SiswaModel;
use App\Models\MapelModel;
use App\Models\JurusanModel;

class Nilai extends BaseController
{
    public function index()
    {
        $model = new NilaiModel();
        $modelSiswa = new SiswaModel();
        $modelMapel = new MapelModel();
        // $modelJurusan = new JurusanModel();

        $nilai = $model->findAll();
        $siswa = $modelSiswa->findAll();
        $mapel = $modelMapel->findAll();
        // $jurusan = $modelJurusan->findAll();
        $data = [
            'judul' => 'Daftar Nilai',
            'nilai' => $nilai,
            'siswa' => $siswa,
            'mapel' => $mapel,
            // 'jurusan' => $jurusan,
        ];
        return view('admin/nilai', $data);
    }

    public function cari()
    {
        $model = new NilaiModel();
        $modelMapel = new MapelModel();
        $modelSiswa = new SiswaModel();
        // $modelJurusan = new JurusanModel();

        $nilai = $model->where('nis', $this->request->getGet('nis'))->findAll();
        $mapel = $modelMapel->findAll();
        $siswa = $modelSiswa->where('nis', $this->request->getGet('nis'))->first();
        $nama=$siswa['nama'];
        $siswa = $modelSiswa->findAll();
        // $jurusan = $modelJurusan->findAll();
        $data = [
            'judul' => 'Daftar Nilai '.$nama,
            'nilai' => $nilai,
            'mapel' => $mapel,
            'siswa' => $siswa,
            'kode' => $this->request->getGet('nis'),
        ];
        return view('admin/nilai', $data);
        // echo $_GET['idmapel'];
    }

    public function rekap()
    {
        if (!empty($this->request->getGet('nis'))) {
            $model = new NilaiModel();

            $nilai = $model->where('nis', $this->request->getGet('nis'))->findAll();

            foreach ($nilai as $key => $value) {
                $nTugas = $value['nilaiTugas'];
                $nUTS = $value['nilaiUTS'];
                $nUAS = $value['nilaiUAS'];
                $nAkhir = ((40/100) * $nUAS)+((30/100) * $nUTS)+((30/100)*$nTugas);
                
                $data = [
                    'nilaiAkhir' => $nAkhir,
                ];
                $model->where('idmapel', $value['idmapel'])->set($data)->update();
            }
            return redirect()->to(site_url('admin/nilai/cari?nis='.$this->request->getGet('nis')));
        } else {
            $model = new NilaiModel();

            $nilai = $model->findAll();

            foreach ($nilai as $key => $value) {
                $nTugas = $value['nilaiTugas'];
                $nUTS = $value['nilaiUTS'];
                $nUAS = $value['nilaiUAS'];
                $nAkhir = ((40/100) * $nUAS)+((30/100) * $nUTS)+((30/100)*$nTugas);
                
                $data = [
                    'nilaiAkhir' => $nAkhir,
                ];
                $model->update($value['no'], $data);
            }
            return redirect()->to(site_url('admin/nilai'));
        }
    }
}