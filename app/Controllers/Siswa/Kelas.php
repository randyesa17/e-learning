<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\KumpulTugasModel;

class Kelas extends BaseController
{
    public function index()
    {
        $model = new KelasModel();

        $kelas = $model->where('nis', session()->get('nis'))->findAll();

        $data = [
            'judul' => 'Kelas',
            'kelas' => $kelas,
        ];
		return view('siswa/kelas', $data);
    }

    public function tambah()
    {
        if ($this->request->getMethod() == "post") {
            $model = new KelasModel();
            
            $kelas = $model->where('kodekelas', $this->request->getPost('kode'))->first();
            
            if (empty($kelas[0]['nis'])) {
                $data = [
                    'nis' => session()->get('nis'),
                ];
                $model->update($this->request->getPost('kode'), $data);
                return redirect()->to(site_url('siswa/kelas'));
            } else {
                if (!empty($model->where(['nis' => session()->get('nis'), 'kodekelas' => $this->request->getPost('kode')])->first())) {
                    session()->setFlashdata('info', 'Anda Sudah Gabung Kelas Berikut');
                    return redirect()->to(site_url('siswa/kelas'));
                } else {
                    $data = [
                        'kodekelas' => $this->request->getPost('kode'),
                        'namakelas' => $kelas[0]['namakelas'],
                        'idmapel' => $kelas[0]['idmapel'],
                        'idjurusan' => $kelas[0]['idjurusan'],
                        'nip' => $kelas[0]['nip'],
                        'nis' => session()->get('nis'),
                    ];
        
                    $model->insert($data);
        
                    return redirect()->to(site_url('siswa/kelas'));
                }
            }
        }
    }

    public function ruang($kodekelas)
    {
        $model = new KelasModel();
        
        $kelas = $model->where(['nis' => session()->get('nis'), 'kodekelas' => $kodekelas])->first();

        if (empty($kelas)) {
            return redirect()->to(site_url('siswa/kelas'));
        } else {
            $modelKumpul = new KumpulTugasModel();

            if(!empty($modelKumpul->where(['nis' => session()->get('nis'), 'kodekelas' => $kodekelas])->first()))
            {
                $kumpul = true;
            } else {
                $kumpul = false;
            }
            
            $db = \Config\Database::connect();
            $sql = "SELECT * FROM posts WHERE kodekelas='$kodekelas' ORDER BY tgl DESC";
            $hasil = $db->query($sql);
            $post = $hasil->getResult('array');
            $data = [
                'judul' => 'Kelas '.$kelas['namakelas'],
                'kode' => $kodekelas,
                'post' => $post,
                'kumpul' => $kumpul,
            ];
            return view('siswa/ruang', $data);
        }
    }

    public function tugas($kodeKelas)
    {
        if($this->request->getMethod() == 'post'){
            $model = new KumpulTugasModel();

            $file = $this->request->getFile('upload');
            $name = $file->getRandomName();

            $data = [
                'kodekelas' => $kodeKelas,
                'kodetugas' => $_GET['kodetugas'],
                'nis' => session()->get('nis'),
                'file' => $name,
            ];

            $model->insert($data);
            if(!$model->errors()){
                $file->move('./assets/upload/tugas', $name);
                return redirect()->to(site_url('siswa/kelas/'.$kodeKelas));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(site_url('guru/kelas/'.$kodeKelas));
            }
        }
        // echo $kodeKelas." = ".$_GET['kodetugas'];
    }
}