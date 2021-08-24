<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use App\Models\NilaiModel;
use App\Models\KelasModel;
use App\Models\JadwalModel;
use App\Models\MapelModel;

class Siswa extends BaseController
{
    public function index()
    {
    	$modelKelas = new KelasModel();

        $kelas = $modelKelas->findAll();

        $data = [
            'judul' => 'Selamat Datang '.session()->get('nama'),
            'kelas' => $kelas,
        ];
		return view('siswa/home', $data);
    }

    public function login()
    {
        if($this->request->getMethod() == 'post'){
    	    $model = new SiswaModel();

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $siswa = $model->where(['nis' => $username, 'password' => $password])->first();

            if(empty($siswa)){
                session()->setFlashdata('info', 'Username atau Password Salah!');
                return redirect()->to(site_url('siswa/login'));
            } else {
                $this->setSession($siswa);
                return redirect()->to(site_url('siswa'));
            }
        } else {
            $data = [
                'judul' => 'Login Siswa',
                'action' => site_url('siswa/login'),
            ];
            return view('templates/login', $data);
        } 
    }

    public function setSession($siswa)
    {
        $data = [
            'nis' => $siswa['nis'],
            'nisn' => $siswa['nisn'],
            'nama' => $siswa['nama'],
            'tempatLahir' => $siswa['tempatLahir'],
            'tglLahir' => $siswa['tglLahir'],
            'kelamin' => $siswa['kelamin'],
            'alamat' => $siswa['alamat'],
            'idkelas' => $siswa['idkelas'],
            'foto' => $siswa['foto'],
            'password' => $siswa['password'],
            'loggedIn' => true
        ];

        session()->set($data);
    }

    public function jadwal()
    {
        $model = new JadwalModel();
        $jadwal = $model->orderBy('tgl', 'desc')->findAll();
        $data = [
          'judul' => 'Jadwal Pelajaran',
          'jadwal' => $jadwal,
        ];

        return view('siswa/jadwal', $data);
    }

    public function nilai()
    {
        $model = new NilaiModel();
        $modelMapel = new MapelModel();

        $nilai = $model->where('nis', session()->get('nis'))->findAll();
        $mapel = $modelMapel->findAll();
        $data = [
            'judul' => 'Daftar Nilai',
            'nilai' => $nilai,
            'mapel' => $mapel,
        ];
        return view('siswa/nilai', $data);
        // echo "nilai";
    }
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('siswa/login'));
    }
}