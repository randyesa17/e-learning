<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\GuruModel;
use App\Models\JadwalModel;
use App\Models\MapelModel;
use App\Models\RuangKelasModel;

class Guru extends BaseController
{
    public function index()
    {
    		$modelMapel = new MapelModel();

        $mapel = $modelMapel->findAll();

        $data = [
          'judul' => 'Selamat datang '.session()->get('idmapel'),
          'mapel' => $mapel,
        ];

		    return view('guru/home', $data);
    }
    
    public function login()
    {
        if($this->request->getMethod() == 'post'){
    		  $model = new GuruModel();

          $username = $this->request->getPost('username');
          $password = $this->request->getPost('password');

          $guru = $model->where(['nip' => $username, 'password' => $password])->first();

          if(empty($guru)){
              session()->setFlashdata('info', 'Username atau Password Salah!');
              return redirect()->to(site_url('guru/login'));
          } else {
              $this->setSession($guru);
              return redirect()->to(site_url('guru'));
          }
        } else {
          $data = [
              'judul' => 'Login Guru',
              'action' => site_url('guru/login'),
          ];
          return view('templates/login', $data);
        } 
    }

    public function setSession($guru)
    {
        $data = [
          'nip' => $guru['nip'],
          'nama' => $guru['nama'],
          'tempatLahir' => $guru['tempatLahir'],
          'tglLahir' => $guru['tglLahir'],
          'kelamin' => $guru['kelamin'],
          'alamat' => $guru['alamat'],
          'idmapel' => $guru['idmapel'],
          'foto' => $guru['foto'],
          'password' => $guru['password'],
          'loggedIn' => true
        ];

        session()->set($data);
    }

    public function profil()
    {
        $model = new GuruModel();

        $id = session()->get('nip');
        $guru = $model->find($id);
        $judul = "PROFIL ".$guru['nama'];
        $data = [
          'judul' => $judul,
          'guru' => $guru,
        ];
        return view('guru/profil', $data);
    }

    public function jadwal()
    {
        $model = new JadwalModel();
        $modelRuang = new RuangKelasModel();
        $ruang = $modelRuang->where('nip', session()->get('nip'))->first();
        $jadwal = $model->where('ruang', $ruang['koderuang'])->orderBy('tgl', 'desc')->findAll();
        $data = [
          'judul' => 'Jadwal Pengajaran',
          'jadwal' => $jadwal,
        ];

        return view('guru/jadwal', $data);
    }

    public function loadJadwal()
    {
        $event = new JadwalModel();
        $modelRuang = new RuangKelasModel();

        $start = $this->request->getVar('start');
        $end = $this->request->getVar('end');
        // on page load this ajax code block will be run
        $data = $event->where([
          'nip' => session()->get('nip'),
          'tgl >=' => $start,
          'tgl <=' => $end,
        ])->findAll();
        foreach ($data as $key => $value) {
          $data[$key]['start'] = $value['tgl'];
          $data[$key]['end'] = $value['tgl'];
          $data[$key]['title'] = $value['namajadwal'];
        }

        return json_encode($data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('guru/login'));
    }
}