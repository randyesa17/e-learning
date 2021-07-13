<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\NilaiModel;
use App\Models\MapelModel;

class Nilai extends BaseController
{
    public function index()
    {
        $model = new NilaiModel();
        $modelMapel = new MapelModel();

        $mapel = $modelMapel->findAll();
        foreach ($mapel as $key => $value) {
            if ($value['mapel'] == session()->get('mapel')) {
                $pelajaran = $value['idmapel'];
            }
        }
        $nilai = $model->where('idmapel', $pelajaran)->findAll();
        $data = [
            'judul' => 'Daftar Nilai',
            'nilai' => $nilai,
        ];
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