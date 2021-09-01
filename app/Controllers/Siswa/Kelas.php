<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\RuangKelasModel;
use App\Models\KumpulTugasModel;
use App\Models\MateriModel;
use App\Models\TugasModel;
use App\Models\UjianModel;
use App\Models\NilaiModel;
use App\Models\PengerjaanModel;

class Kelas extends BaseController
{
    public function index()
    {
        $model = new RuangKelasModel();

        $ruang = $model->where('nis', session()->get('nis'))->findAll();

        $data = [
            'judul' => 'Kelas',
            'ruang' => $ruang,
        ];
		return view('siswa/kelas', $data);
    }

    public function tambah()
    {
        if ($this->request->getMethod() == "post") {
            $model = new RuangKelasModel();
            
            $kelas = $model->where([
                    'koderuang' => $this->request->getPost('kode'),
                    'idkelas' => session()->get('idkelas'),
                ])->first();
            
            if (empty($kelas)) {
                session()->setFlashdata('info', 'Ruang Kelas Bukan Untuk Kelas Anda');
                return redirect()->to(site_url('siswa/kelas'));
            } elseif (empty($kelas['nis'])) {
                $data = [
                    'nis' => session()->get('nis'),
                ];
                $model->update($this->request->getPost('kode'), $data);
                return redirect()->to(site_url('siswa/kelas'));
            } else {
                if (!empty($model->where(['nis' => session()->get('nis'), 'koderuang' => $this->request->getPost('kode')])->first())) {
                    session()->setFlashdata('info', 'Anda Sudah Gabung Ruang Kelas Tersebut');
                    return redirect()->to(site_url('siswa/kelas'));
                } else {
                    $data = [
                        'koderuang' => $this->request->getPost('kode'),
                        'namaruang' => $kelas['namaruang'],
                        'idmapel' => $kelas['idmapel'],
                        'idjurusan' => $kelas['idjurusan'],
                        'nip' => $kelas['nip'],
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
        $model = new RuangKelasModel();
        $modelMateri = new MateriModel();
        $modelTugas = new TugasModel();
        $modelUjian = new UjianModel();
        $modelPengerjaan = new PengerjaanModel();
        
        $kelas = $model->where(['nis' => session()->get('nis'), 'koderuang' => $kodekelas])->first();

        if (empty($kelas)) {
            return redirect()->to(site_url('siswa/kelas'));
        } else {
            $modelKumpul = new KumpulTugasModel();
            $modelNilai = new NilaiModel();

            if(!empty($modelKumpul->where(['nis' => session()->get('nis'), 'kodekelas' => $kodekelas])->first()))
            {
                $kumpul = true;
            } else {
                $kumpul = false;
            }

            $ruang = $model->where('koderuang', $kodekelas)->first();
            $materi = $modelMateri->where('koderuang', $kodekelas)->orderBy('tgl', 'desc')->findAll();
            $tugas = $modelTugas->where('koderuang', $kodekelas)->orderBy('tgl', 'desc')->findAll();
            $ujian = $modelUjian->where('koderuang', $kodekelas)->orderBy('tgl', 'desc')->findAll();

            if(!empty($modelNilai->where(['nis' => session()->get('nis'), 'idmapel' => $ruang['idmapel'], 'nilaiUTS !=' => ''])->first()))
            {
                $pengerjaanUTS = true;
            } else {
                $pengerjaanUTS = false;
            }

            if(!empty($modelNilai->where(['nis' => session()->get('nis'), 'idmapel' => $ruang['idmapel'], 'nilaiUAS !=' => ''])->first()))
            {
                $pengerjaanUAS = true;
            } else {
                $pengerjaanUAS = false;
            }

            foreach ($ujian as $key => $value) {
                if (!empty($modelPengerjaan->where(['nis' => session()->get('nis'), 'kodeujian' => $value['kodeujian'], 'nilai !=' => 0])->first())) {
                    $ujian[$key]['sudah'] = true;
                } else {
                    $ujian[$key]['sudah'] = false;
                }
            }

            $data = [
                'judul' => 'Kelas '.$ruang['namaruang'],
                'kode' => $kodekelas,
                'materi' => $materi,
                'tugas' => $tugas,
                'ujian' => $ujian,
                'kumpul' => $kumpul,
                'pengerjaanUTS' => $pengerjaanUTS,
                'pengerjaanUAS' => $pengerjaanUAS,
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