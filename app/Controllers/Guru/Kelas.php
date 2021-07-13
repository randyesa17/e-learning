<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\GuruModel;
use App\Models\JurusanModel;
use App\Models\MapelModel;
use App\Models\MateriModel;
use App\Models\TugasModel;
use App\Models\PostModel;
use App\Models\SoalModel;
use App\Models\UjianModel;
use App\Models\KumpulTugasModel;

class Kelas extends BaseController
{
    public function index()
    {
        $model = new KelasModel();
        $modelJurusan = new JurusanModel();

        $kelas = $model->where('nip', session()->get('nip'))->findAll();

        $jurusan = $modelJurusan->findAll();

        helper('text');

        $kode = random_string('alpha', 5);

        $data = [
            'judul' => 'Kelas',
            'kelas' => $kelas,
            'kode' => $kode,
            'jurusan' => $jurusan,
        ];
		return view('guru/kelas', $data);
    }

    public function tambah()
    {
        if($this->request->getMethod() == 'post'){
            $model = new KelasModel();
            $modelJurusan = new JurusanModel();
            $modelMapel = new MapelModel();

            $mapel = session()->get('mapel');
            $idmapel = $modelMapel->where('mapel', $mapel)->findAll();

            $jurusan = $modelJurusan->where('idjurusan', $this->request->getPost('jurusan'))->findAll();

            $namakelas = $jurusan[0]['jurusan']." ".$idmapel[0]['mapel'];
            $data = [
                'kodekelas' => $this->request->getPost('kode'),
                'namakelas' => $namakelas,
                'idmapel' => $idmapel[0]['idmapel'],
                'idjurusan' => $this->request->getPost('jurusan'),
                'nip' => session()->get('nip'),
            ];

            $model->insert($data);
            if(!$model->errors()){
                return redirect()->to(site_url('guru/kelas'));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(site_url('guru/kelas'));
            }
        }
    }

    public function ruang($kode = null)
    {
        $model = new KelasModel();
        $modelGuru = new GuruModel();

        $db = \Config\Database::connect();

        $nip = session()->get('nip');

		$sql = "SELECT * FROM kelas WHERE kodekelas='$kode' AND nip='$nip'";
		$result = $db->query($sql);
		$row = $result->getResult('array');

        if(empty($row)){
            return redirect()->to(site_url('guru/kelas'));
        } else {
            helper('text');

            $sql = "SELECT * FROM posts WHERE kodekelas='$kode' ORDER BY tgl DESC";
            $hasil = $db->query($sql);
            $post = $hasil->getResult('array');

            $kelas = $kode;
            $kode = random_string('alpha', 10);
            $data = [
                'judul' => 'Kelas '.$row[0]['namakelas'],
                'kode' => $kode,
                'kelas' => $kelas,
                'post' => $post,
            ];
            return view('guru/ruang', $data);
        }
    }

    public function materi()
    {
        if($this->request->getMethod() == 'post'){
            $model = new MateriModel();
            $modelKelas = new KelasModel();
            $modelPost = new PostModel();

            $kode = $this->request->getPost('kelas');
            $kelas = $modelKelas->where('kodekelas', $kode)->first();

            $file = $this->request->getFile('upload');
            $name = $file->getRandomName();
            
            $data = [
                'idmateri' => $this->request->getPost('kode'),
                'tema' => $this->request->getPost('tema'),
                'kodekelas' => $this->request->getPost('kelas'),
                'tipe' => $this->request->getPost('tipe'),
                'file' => $name,
            ];
            $model->insert($data);
            if(!$model->errors()){
                $modelPost->insert($data);
                $file->move('./assets/upload/materi', $name);
                return redirect()->to(site_url('guru/kelas/'.$kode));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(site_url('guru/kelas/'.$kode));
            }
        }
    }

    public function hapusMateri($kodeKelas)
    {
        $model = new MateriModel();
        $modelPost = new PostModel();

        $model->delete($_GET['idmateri']);
        $modelPost->where('idmateri', $_GET['idmateri'])->delete();
        return redirect()->to(site_url('guru/kelas/'.$kodeKelas));
    }

    public function tugas()
    {
        if($this->request->getMethod() == 'post'){
            $model = new TugasModel();
            $modelPost = new PostModel();

            $kode = $this->request->getPost('kelas');
            $data = [
                'kodetugas' => $this->request->getPost('kode'),
                'kodekelas' => $this->request->getPost('kelas'),
                'perintah' => $this->request->getPost('perintah'),
            ];
            
            $model->insert($data);
            if(!$model->errors()){
                $modelPost->insert($data);
                return redirect()->to(site_url('guru/kelas/'.$kode));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(site_url('guru/kelas/'.$kode));
            }
        }
    }

    public function tugasMurid($kodeKelas)
    {
        $model = new KumpulTugasModel();

        $tugas = $model->where('kodetugas', $_GET['kodetugas'])->findAll();

        $data = [
            'judul' => 'Tugas Yang Dikumpulkan',
            'kelas' => $kodeKelas,
            'tugas' => $tugas,
        ];
        
        return view('guru/tugas', $data);
        echo $kodeKelas." = ".$_GET['kodetugas'];
    }

    public function hapusTugas($kodeKelas)
    {
        $model = new TugasModel();
        $modelPost = new PostModel();

        $model->delete($_GET['kodetugas']);
        $modelPost->where('kodetugas', $_GET['kodetugas'])->delete();
        return redirect()->to(site_url('guru/kelas/'.$kodeKelas));
    }

    public function ujian($kodeKelas=null){

        $data = [
            'judul' => 'Buat Ujian Kelas',
        ];
        return view('guru/ujian', $data);
    }

    public function hapusUjian($kodeKelas)
    {
        $model = new UjianModel();
        $modelSoal = new SoalModel();
        $modelPost = new PostModel();

        $model->delete($_GET['kodeujian']);
        $modelSoal->where('kodeujian', $_GET['kodeujian'])->delete();
        $modelPost->where('kodeujian', $_GET['kodeujian'])->delete();
        return redirect()->to(site_url('guru/kelas/'.$kodeKelas));
    }
}