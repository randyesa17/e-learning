<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\GuruModel;

class Guru extends BaseController
{
    public function index()
    {
        $data = [
          'judul' => 'Selamat datang '.session()->get('nama'),
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
          'mapel' => $guru['idmapel'],
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

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('guru/login'));
    }
}