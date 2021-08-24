<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\NilaiModel;
use App\Models\MapelModel;
use App\Models\RuangKelasModel;

class Nilai extends BaseController
{
    public function index()
    {
        $model = new NilaiModel();
        $modelMapel = new MapelModel();
        $modelRuang = new RuangKelasModel();

        $ruang = $modelRuang->where('nip', session()->get('nip'))->findAll();
        $mapel = $modelMapel->findAll();
        foreach ($mapel as $key => $value) {
            if ($value['idmapel'] == session()->get('idmapel')) {
                $pelajaran = $value['idmapel'];
            }
        }
        $nilai = $model->where('idmapel', $pelajaran)->findAll();
        $data = [
            'judul' => 'Daftar Nilai',
            'nilai' => $nilai,
            'ruang' => $ruang,
        ];
        return view('guru/nilai', $data);
    }

    public function cari()
    {
        $model = new NilaiModel();
        $modelMapel = new MapelModel();
        $modelRuang = new RuangKelasModel();

        $ruang = $modelRuang->where('nip', session()->get('nip'))->findAll();
        $ruangan = $modelRuang->where(['koderuang' => $this->request->getGet('ruang'), 'nis !=' => ''])->findAll();
        $mapel = $modelMapel->findAll();
        foreach ($mapel as $key => $value) {
            if ($value['idmapel'] == session()->get('idmapel')) {
                $pelajaran = $value['idmapel'];
            }
        }
        if (!empty($ruangan)) {
            foreach ($ruangan as $key => $value) {
                $nilai[$key] = $model->where('nis', $value['nis'])->first();
            }
        } else {
            $nilai="";
        }
        $data = [
            'judul' => 'Daftar Nilai',
            'nilai' => $nilai,
            'ruang' => $ruang,
        ];
        // echo "<pre>";
        // print_r($nilai);
        return view('guru/nilai', $data);
    }

    public function tugas()
    {
        $model = new NilaiModel();

        $nis = $this->request->getPost('nis');
        $data = [
            'nilaiTugas' => $this->request->getPost('nilai'),
        ];

        $model->where('nis', $nis)->set($data)->update();
        if(!$model->errors()){
            return redirect()->to(site_url('guru/nilai'));
        }
        // print_r($this->request->getPost());
    }
}