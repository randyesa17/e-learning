<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UjianModel;
use App\Models\PostModel;
use App\Models\SoalModel;
use App\Models\RuangKelasModel;
use App\Models\MapelModel;
use App\Models\KelasModel;

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
            $modelPost = new PostModel();
            helper('text');

            $kode = random_string('alpha', 10);

            $data = [
                'kodeujian' => $kode,
                'koderuang' => $this->request->getPost('ruang'),
                'jenis' => $this->request->getPost('jenis'),
                'tgl' => $this->request->getPost('tgl'),
            ];

            $model->insert($data);
            if (!$model->errors()) {
                $dataUjian = [
                    'kodeujian' => $kode,
                    'koderuang' => $this->request->getPost('ruang'),
                    'jenisujian' => $this->request->getPost('jenis'),
                    'tglujian' => $this->request->getPost('tgl'),
                ];
                $modelPost->insert($dataUjian);
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
                'judul' => 'Tambah Mata Pelajaran',
                'ruang' => $ruang,
            ];
            return view('admin/inputUjian', $data);
        }
    }

    public function hapus($id = null)
    {
        $model = new UjianModel();
        $modelPost = new PostModel();
        $modelSoal = new SoalModel();
        $model->delete($id);
        $modelPost->where('kodeujian', $id)->delete();
        $modelSoal->where('kodeujian', $id)->delete();

        return redirect()->to(site_url('admin/ujian'));
    }

    public function soal($kode)
    {
        $modelSoal = new SoalModel();
        if ($this->request->getMethod() == 'post') {
            $data = [
                'kodeujian' => $kode,
                'soal' => $this->request->getPost('soal'),
                'pilA' => $this->request->getPost('pilA'),
                'pilB' => $this->request->getPost('pilB'),
                'pilC' => $this->request->getPost('pilC'),
                'pilD' => $this->request->getPost('pilD'),
                'kunci' => $this->request->getPost('kunci'),
            ];
            $modelSoal->insert($data);
            if (!$modelSoal->errors()) {
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
            $data = [
                'kodeujian' => $kode,
                'soal' => $this->request->getPost('soal'),
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
}