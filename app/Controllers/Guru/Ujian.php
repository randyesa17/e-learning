<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\UjianModel;
use App\Models\SoalModel;
use App\Models\PostModel;

class Ujian extends BaseController
{
    public function index($kodeKelas=null)
    {
        if($this->request->getMethod() == 'post'){
            $model = new UjianModel();
            $modelPost = new PostModel();

            $kode = $this->request->getPost('kelas');
            $data = [
                'kodeujian' => $this->request->getPost('kode'),
                'kodekelas' => $this->request->getPost('kelas'),
                'tgl' => $this->request->getPost('tgl'),
            ];
            
            $model->insert($data);
            if(!$model->errors()){
                $dataUjian = [
                    'kodeujian' => $this->request->getPost('kode'),
                    'kodekelas' => $this->request->getPost('kelas'),
                    'tglujian' => $this->request->getPost('tgl'),
                ];
                $modelPost->insert($dataUjian);
                return redirect()->to(site_url('guru/kelas/'.$kode.'/ujian?kodeujian='.$this->request->getPost('kode')));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(site_url('guru/kelas/'.$kode));
            }
        } else {
            $model = new SoalModel();

            $soal = $model->where('kodeujian', $_GET['kodeujian'])->findAll();
            $data = [
                'judul' => 'Ujian',
                'kode' => $_GET['kodeujian'],
                'soal' => $soal,
                'kelas' => $kodeKelas,
            ];
            return view('guru/ujian', $data);
        }
    }

    public function soal()
    {
        if($this->request->getMethod() == 'post')
        {
            $model = new SoalModel();

            $data = [
                'kodeujian' => $this->request->getPost('kode'),
                'no' => $this->request->getPost('no'),
                'soal' => $this->request->getPost('soal'),
                'pilA' => $this->request->getPost('pilA'),
                'pilB' => $this->request->getPost('pilB'),
                'pilC' => $this->request->getPost('pilC'),
                'pilD' => $this->request->getPost('pilD'),
                'kunci' => $this->request->getPost('kunci'),
            ];
            $model->insert($data);
            if(!$model->errors()){
                return redirect()->to(site_url('guru/kelas/'.$this->request->getPost('kelas').'/ujian?kodeujian='.$this->request->getPost('kode')));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(site_url('guru/kelas/'.$this->request->getPost('kelas').'/ujian?kodeujian='.$this->request->getPost('kode')));
            }
        }
    }
}