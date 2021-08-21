<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\GuruModel;
use App\Models\RuangKelasModel;
use App\Models\MapelModel;
use App\Models\MateriModel;
use App\Models\TugasModel;
use App\Models\PostModel;
use App\Models\SoalModel;
use App\Models\UjianModel;
use App\Models\KumpulTugasModel;
use App\Models\JadwalModel;
use App\Models\SiswaModel;

class Kelas extends BaseController
{
    public function index()
    {
        $model = new RuangKelasModel();
        $modelKelas = new KelasModel();

        $ruang = $model->where('nip', session()->get('nip'))->findAll();

        $kelas = $modelKelas->findAll();

        helper('text');

        $kode = random_string('alpha', 5);

        $data = [
            'judul' => 'Kelas',
            'ruang' => $ruang,
            'kode' => $kode,
            'kelas' => $kelas,
        ];
		return view('guru/kelas', $data);
    }

    public function tambah()
    {
        if($this->request->getMethod() == 'post'){
            $model = new RuangKelasModel();
            $modelKelas = new KelasModel();
            $modelMapel = new MapelModel();

            $mapel = session()->get('idmapel');
            $idmapel = $modelMapel->where('idmapel', $mapel)->first();

            $kelas = $modelKelas->where('idkelas', $this->request->getPost('kelas'))->first();

            $namaruang = $kelas['kelas']." ".$idmapel['mapel'];
            $data = [
                'koderuang' => $this->request->getPost('kode'),
                'namaruang' => $namaruang,
                'idmapel' => $idmapel['idmapel'],
                'idkelas' => $this->request->getPost('kelas'),
                'nip' => session()->get('nip'),
            ];

            $model->insert($data);
            if(!$model->errors()){
                return redirect()->to(site_url('guru/kelas'));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', 'Gagal Menambah Kelas');
                return redirect()->to(site_url('guru/kelas'));
            }
        }
    }

    public function ruang($kode = null)
    {
        $model = new RuangKelasModel();
        $modelGuru = new GuruModel();
        $modelMateri = new MateriModel();
        $modelTugas = new TugasModel();
        $modelUjian = new UjianModel();
        $modelJadwal = new JadwalModel();

        $db = \Config\Database::connect();

        $nip = session()->get('nip');

		$sql = "SELECT * FROM ruangkelas WHERE koderuang='$kode' AND nip='$nip'";
		$result = $db->query($sql);
		$row = $result->getResult('array');

        if(empty($row)){
            session()->setFlashdata('info', 'Kelas Tidak Ada');
            return redirect()->to(site_url('guru/kelas'));
        } else {
            $today=date("Y-m-d");
            helper('text');

            $ruang = $model->where('koderuang', $kode)->first();
            $materi = $modelMateri->where('koderuang', $kode)->orderBy('tgl', 'desc')->findAll();
            $tugas = $modelTugas->where('koderuang', $kode)->orderBy('tgl', 'desc')->findAll();
            $ujian = $modelUjian->where('koderuang', $kode)->orderBy('tgl', 'desc')->findAll();

            $jadwal = $modelJadwal->where('ruang', $kode)->findAll();
            $statusMateri="disabled";
            $statusTugas="disabled";
            $statusUjian="disabled";
            foreach ($jadwal as $key => $value) {
                if ($today == $value['tgl']) {
                    if ($value['jenis'] == 'Materi' && $ruang['nip'] == session()->get('nip')) {
                        $statusMateri="";
                    } elseif ($value['jenis'] == 'Tugas' && $ruang['nip'] == session()->get('nip')) {
                        $statusTugas="";
                    } elseif ($value['jenis'] == 'Ujian' && $ruang['nip'] == session()->get('nip')) {
                        $statusUjian="";
                    }
                }
            }

            $kelas = $ruang['namaruang'];
            $kode = random_string('alpha', 10);
            $data = [
                'judul' => 'Kelas '.$kelas,
                'kode' => $kode,
                'materi' => $materi,
                'tugas' => $tugas,
                'ujian' => $ujian,
                'ruang' => $ruang,
                'statusMateri' => $statusMateri,
                'statusTugas' => $statusTugas,
                'statusUjian' => $statusUjian,
            ];
            return view('guru/ruang', $data);
        }
    }

    public function materi()
    {
        if($this->request->getMethod() == 'post'){
            $model = new MateriModel();
            $modelRuang = new RuangKelasModel();

            $kode = $this->request->getPost('kelas');
            $ruang = $modelRuang->where('koderuang', $kode)->first();

            $file = $this->request->getFile('upload');
            $name = $file->getRandomName();
            
            $data = [
                'idmateri' => $this->request->getPost('kode'),
                'tema' => $this->request->getPost('tema'),
                'koderuang' => $this->request->getPost('kelas'),
                'tipe' => $this->request->getPost('tipe'),
                'file' => $name,
            ];
            $model->insert($data);
            if(!$model->errors()){
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

        $model->delete($_GET['idmateri']);
        return redirect()->to(site_url('guru/kelas/'.$kodeKelas));
    }

    public function tugas()
    {
        if($this->request->getMethod() == 'post'){
            $model = new TugasModel();

            $kode = $this->request->getPost('kelas');
            $data = [
                'kodetugas' => $this->request->getPost('kode'),
                'koderuang' => $this->request->getPost('kelas'),
                'perintah' => $this->request->getPost('perintah'),
            ];
            
            $model->insert($data);
            if(!$model->errors()){
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
        $modelSiswa = new SiswaModel();

        $tugas = $model->where('kodetugas', $_GET['kodetugas'])->findAll();
        $siswa = $modelSiswa->findAll();

        $data = [
            'judul' => 'Tugas Yang Dikumpulkan',
            'kelas' => $kodeKelas,
            'tugas' => $tugas,
            'siswa' => $siswa,
        ];
        
        return view('guru/tugas', $data);
        // echo $kodeKelas." = ".$_GET['kodetugas'];
    }

    public function hapusTugas($kodeKelas)
    {
        $model = new TugasModel();

        $model->delete($_GET['kodetugas']);
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

        $model->delete($_GET['kodeujian']);
        $modelSoal->where('kodeujian', $_GET['kodeujian'])->delete();
        return redirect()->to(site_url('guru/kelas/'.$kodeKelas));
    }
}