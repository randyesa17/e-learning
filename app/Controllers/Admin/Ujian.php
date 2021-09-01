<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UjianModel;
use App\Models\PostModel;
use App\Models\SoalModel;
use App\Models\RuangKelasModel;
use App\Models\MapelModel;
use App\Models\KelasModel;
use App\Models\JadwalModel;
use App\Models\GuruModel;

class Ujian extends BaseController
{
    public function index()
    {
        $model = new UjianModel();
        $modelRuang = new RuangKelasModel();
        $modelMapel = new MapelModel();
        $modelKelas = new KelasModel();

        $ujian = $model->orderBy('tgl', 'desc')->findAll();
        $ruang = $modelRuang->findAll();
        $mapel = $modelMapel->findAll();
        $kelas = $modelKelas->findAll();

        $data = [
            'judul' => 'Data Ujian',
            'ujian' => $ujian,
            'ruang' => $ruang,
            'mapel' => $mapel,
            'kelas' => $kelas,
        ];

        return view('admin/ujian', $data);
    }

    public function tambah()
    {
        if ($this->request->getMethod() == 'post') {
            $model = new UjianModel();
            $modelRuang = new RuangKelasModel();
            $modelJadwal = new JadwalModel();
            $modelGuru = new GuruModel();
            helper('text');

            $kode = random_string('alpha', 10);

            $data = [
                'kodeujian' => $kode,
                'koderuang' => $this->request->getPost('ruang'),
                'jenis' => $this->request->getPost('jenis'),
                'tglujian' => $this->request->getPost('tgl'),
            ];

            $model->insert($data);
            if (!$model->errors()) {
                $ruang = $modelRuang->where('koderuang', $this->request->getPost('ruang'))->first();
                $guru = $modelGuru->where('nip', $ruang['nip'])->first();
                $namajadwal = "Ruang Kelas : ".$ruang['namaruang']."\n".$this->request->getPost('jenis')."\n"."Guru : ".$guru['nama'];

                $dataJadwal = [
                    'judul' => $this->request->getPost('jenis'),
                    'namajadwal' => $namajadwal,
                    'ruang' => $this->request->getPost('ruang'),
                    'nip' => $guru['nip'],
                    'jenis' => 'Ujian',
                    'tgl' => $this->request->getPost('tgl'),
                ];
                $modelJadwal->insert($dataJadwal);
                return redirect()->to(site_url('admin/ujian'));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(site_url('admin/inputUjian'));
            }
        } else {
            $modelRuang = new RuangKelasModel();

            $ruang = $modelRuang->findAll();

            $data = [
                'judul' => 'Tambah Ujian',
                'ruang' => $ruang,
            ];
            return view('admin/inputUjian', $data);
        }
    }

    public function hapus($id = null)
    {
        $model = new UjianModel();
        $modelSoal = new SoalModel();
        $modelJadwal = new JadwalModel();

        $ujian = $model->where('kodeujian', $id)->first();
        $modelJadwal->where([
            'judul' => $ujian['jenis'],
            'ruang' => $ujian['koderuang'],
            'tgl' => $ujian['tglujian'],
        ])->delete();
        $model->delete($id);
        $modelSoal->where('kodeujian', $id)->delete();

        return redirect()->to(site_url('admin/ujian'));
    }

    public function soal($kode)
    {
        $modelSoal = new SoalModel();
        if ($this->request->getMethod() == 'post') {

            $file = $this->request->getFile('gambar');
            $name = $file->getName();
            if (!empty($name)) {
                $name = $file->getRandomName();
            }

            $data = [
                'kodeujian' => $kode,
                'soal' => $this->request->getPost('soal'),
                'gambar' => $name,
                'pilA' => $this->request->getPost('pilA'),
                'pilB' => $this->request->getPost('pilB'),
                'pilC' => $this->request->getPost('pilC'),
                'pilD' => $this->request->getPost('pilD'),
                'kunci' => $this->request->getPost('kunci'),
            ];
            $filee = $this->request->getFile('gambar');
            echo "<pre>";
            print_r($data);
            $modelSoal->insert($data);
            if (!$modelSoal->errors()) {
                if(!empty($name))
                    $file->move('./assets/images/soal/', $name);
                return redirect()->to(site_url('admin/soal/' . $kode));
            } else {
                $error = $modelSoal->errors();
                session()->setFlashdata('info', 'Gagal Menambah Soal');
                return redirect()->to(site_url('admin/soal/' . $kode));
            }
        } else {
            $soal = $modelSoal->where('kodeujian', $kode)->findAll();
            $data = [
                'judul' => 'Soal Ujian kode=' . $kode,
                'kode' => $kode,
                'soal' => $soal,
                'no' => 1,
            ];
            return view('admin/soal', $data);
        }
    }

    public function ubahsoal($kode)
    {
        $modelSoal = new SoalModel();
        if ($this->request->getMethod() == 'post') {

            $file = $this->request->getFile('gambar');
            $name = $file->getName();

            if (empty($name)) {
                $name = $this->request->getPost('gambar');
            } else {
                $name = $file->getRandomName();
                $file->move('./assets/images/soal/', $name);
            }

            $data = [
                'kodeujian' => $kode,
                'soal' => $this->request->getPost('soal'),
                'gambar' => $name,
                'pilA' => $this->request->getPost('pilA'),
                'pilB' => $this->request->getPost('pilB'),
                'pilC' => $this->request->getPost('pilC'),
                'pilD' => $this->request->getPost('pilD'),
                'kunci' => $this->request->getPost('kunci'),
            ];
            // print_r($data);
            // echo '<br>' . $this->request->getGet('idsoal');
            $modelSoal->update($this->request->getGet('idsoal'), $data);
            if (!$modelSoal->errors()) {
                return redirect()->to(site_url('admin/soal/' . $kode));
            } else {
                $error = $modelSoal->errors();
                session()->setFlashdata('info', 'Gagal Menambah Soal');
                return redirect()->to(site_url('admin/soal/edit/' . $kode . '?idsoal=' . $this->request->getGet('idsoal')));
            }
        } else {
            $soal = $modelSoal->where('idsoal', $this->request->getGet('idsoal'))->first();
            $data = [
                'judul' => 'Ubah Soal Ujian kode=' . $kode,
                'kode' => $kode,
                'soal' => $soal,
                'no' => 1,
            ];
            return view('admin/ubahsoal', $data);
        }
    }

    public function hapussoal($kode)
    {
        $model = new SoalModel();

        $model->delete($this->request->getGet('idsoal'));

        return redirect()->to(site_url('admin/soal/' . $kode));
    }
}