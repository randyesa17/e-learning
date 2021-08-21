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

            $kode = $this->request->getPost('kelas');
            $data = [
                'kodeujian' => $this->request->getPost('kode'),
                'kodekelas' => $this->request->getPost('kelas'),
                'tgl' => $this->request->getPost('tgl'),
            ];
            
            $model->insert($data);
            if(!$model->errors()){
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
                'judul' => 'Soal Ujian',
                'kode' => $_GET['kodeujian'],
                'soal' => $soal,
                'kelas' => $kodeKelas,
                'no' => 1,
            ];
            return view('guru/ujian', $data);
        }
    }

    public function soal()
    {
        if($this->request->getMethod() == 'post')
        {
            $model = new SoalModel();

            $file = $this->request->getFile('gambar');
            $name = $file->getRandomName();

            $data = [
                'kodeujian' => $this->request->getPost('kode'),
                'no' => $this->request->getPost('no'),
                'soal' => $this->request->getPost('soal'),
                'gambar' => $name,
                'pilA' => $this->request->getPost('pilA'),
                'pilB' => $this->request->getPost('pilB'),
                'pilC' => $this->request->getPost('pilC'),
                'pilD' => $this->request->getPost('pilD'),
                'kunci' => $this->request->getPost('kunci'),
            ];
            $model->insert($data);
            if(!$model->errors()){
                $file->move('./assets/images/soal/', $name);
                return redirect()->to(site_url('guru/kelas/'.$this->request->getPost('kelas').'/ujian?kodeujian='.$this->request->getPost('kode')));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(site_url('guru/kelas/'.$this->request->getPost('kelas').'/ujian?kodeujian='.$this->request->getPost('kode')));
            }
        }
    }

    public function edit($kodeKelas)
    {
        if($this->request->getMethod() == 'post')
        {
            $model = new SoalModel();

            $file = $this->request->getFile('gambar');
            $name = $file->getName();

            if (empty($name)) {
                $name = $this->request->getPost('gambar');
            } else {
                $name = $file->getRandomName();
                $file->move('./assets/images/soal/', $name);
            }

            $data = [
                'kodeujian' => $this->request->getPost('kode'),
                'no' => $this->request->getPost('no'),
                'soal' => $this->request->getPost('soal'),
                'gambar' => $name,
                'pilA' => $this->request->getPost('pilA'),
                'pilB' => $this->request->getPost('pilB'),
                'pilC' => $this->request->getPost('pilC'),
                'pilD' => $this->request->getPost('pilD'),
                'kunci' => $this->request->getPost('kunci'),
            ];
            $model->update($this->request->getGet('idsoal'), $data);
            if(!$model->errors()){
                return redirect()->to(site_url('guru/kelas/'.$this->request->getPost('kelas').'/ujian?kodeujian='.$this->request->getPost('kode')));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(site_url('guru/kelas/'.$this->request->getPost('kelas').'/ujian/edit?idsoal='.$this->request->getGet('idsoal')));
            }
        } else {
            $model = new SoalModel();

            $soal = $model->where('idsoal', $this->request->getGet('idsoal'))->first();
            $data = [
                'judul' => 'Soal Ujian',
                'kode' => $soal['kodeujian'],
                'soal' => $soal,
                'kelas' => $kodeKelas,
                'no' => 1,
            ];
            return view('guru/editSoal', $data);
        }
    }

    public function hapus($kodeKelas)
    {
        $model = new SoalModel();

        $model->delete($this->request->getGet('idsoal'));

        return redirect()->to(site_url('guru/kelas/'.$kodeKelas.'/ujian?kodeujian='.$this->request->getPost('kode')));
    }
}