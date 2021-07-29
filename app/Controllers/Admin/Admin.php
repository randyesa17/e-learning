<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\SiswaModel;
use App\Models\GuruModel;
use App\Models\KelasModel;
use App\Models\MapelModel;

class Admin extends BaseController
{
    public function index()
    {
        return view('admin/home');
    }

    public function atur()
    {
        $model = new AdminModel();

        $admin = $model->findAll();

        $data = [
            'judul' => 'Data Admin',
            'admin' => $admin,
        ];
        return view('admin/atur', $data);
    }

    public function tambah()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $model = new AdminModel();

            $data = [
                'idadmin' => $this->request->getPost('idadmin'),
                'nama' => $this->request->getPost('nama'),
                'username' => $this->request->getPost('username'),
                'password' => md5($this->request->getPost('password')),
            ];

            $model->insert($data);
            if (!$model->errors()) {
                return redirect()->to(site_url('admin/atur'));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(site_url('admin/tambah'));
            }
        } else {
            $idAdmin = "admin" . uniqid();
            $data = [
                'judul' => 'Tambah Admin',
                'kode' => $idAdmin,
            ];
            return view('admin/tambah', $data);
        }
    }

    public function login()
    {
        if ($this->request->getMethod() == 'post') {
            $model = new AdminModel();

            $username = $this->request->getPost('username');
            $password = md5($this->request->getPost('password'));

            $admin = $model->where(['username' => $username, 'password' => $password])->first();

            if (empty($admin)) {
                session()->setFlashdata('info', 'Username atau Password Salah!');
                return redirect()->to(site_url('admin'));
            } else {
                $this->setSession($admin);
                return redirect()->to(site_url('admin/home'));
            }
        } else {
            $data = [
                'judul' => 'Login Admin',
                'action' => site_url('admin'),
            ];
            return view('templates/login', $data);
        }
    }

    public function setSession($admin)
    {
        $data = [
            'idadmin' => $admin['idadmin'],
            'nama' => $admin['nama'],
            'username' => $admin['username'],
            'password' => $admin['password'],
            'loggedIn' => true
        ];

        session()->set($data);
    }

    public function profil()
    {
        $model = new AdminModel();

        $id = session()->get('idadmin');
        $admin = $model->find($id);
        $judul = "PROFIL " . $admin['nama'];
        $data = [
            'judul' => $judul,
            'admin' => $admin,
        ];
        return view('admin/profil', $data);
    }

    public function nama()
    {
        if ($this->request->getMethod() == 'post') {
            $model = new AdminModel();

            $id = session()->get('idadmin');
            $nama = $this->request->getPost('iNama');
            $data = ['nama' => $nama];

            $model->update($id, $data);
            return redirect()->to(site_url('admin/profil'));
        }
    }

    public function password()
    {
        if ($this->request->getMethod() == 'post') {
            $model = new AdminModel();

            $id = session()->get('idadmin');
            $passwordLama = $this->request->getPost('passwordlama');

            $admin = $model->where(['idadmin' => $id])->first();
            if ($admin['password'] == md5($passwordLama)) {
                $password = $this->request->getPost('password');
                $repassword = $this->request->getPost('re-password');
                if ($password == $repassword) {
                    $password = md5($repassword);
                    $data = [
                        'password' => $password,
                    ];
                    $model->update($id, $data);
                    $data['info'] = "Berhasil ganti Password";
                    return redirect()->to(site_url('admin/profil'));
                } else {
                    session()->setFlashdata('info', 'Password Baru Tidak Sama');
                    return redirect()->to(site_url('admin/profil/password'));
                }
            } else {
                session()->setFlashdata('info', 'Password Lama Salah');
                return redirect()->to(site_url('admin/profil/password'));
            }
        } else {
            $data = [
                'judul' => 'Ganti Password',
            ];
            return view('admin/password', $data);
        }
    }

    public function hapus($id = null)
    {
        $model = new AdminModel();
        $model->delete($id);

        return redirect()->to(site_url('admin/atur'));
    }

    public function kelas()
    {
        $model = new KelasModel();

        $kelas = $model->orderBy('kelas', 'asc')->findAll();

        $data = [
            'judul' => 'Data Kelas',
            'kelas' => $kelas,
        ];
        return view('admin/kelas', $data);
    }

    public function siswa()
    {
        $model = new SiswaModel();
        $modelKelas = new KelasModel();

        $siswa = $model->findAll();
        $kelas = $modelKelas->orderBy('kelas', 'asc')->findAll();

        $data = [
            'judul' => 'Data Siswa',
            'siswa' => $siswa,
            'kelas' => $kelas,
        ];
        return view('admin/siswa', $data);
    }

    public function inputSiswa()
    {
        if ($this->request->getMethod() == 'post') {
            $model = new SiswaModel();

            helper('text');
            $rules = [
                'nis' => 'is_unique[siswa.nis]',
                'nisn' => 'is_unique[siswa.nisn]',
            ];
            $model->setValidationRules($rules);

            if ($this->request->getPost('kelamin') == "cowo") {
                $kelamin = "Laki-laki";
            } else {
                $kelamin = "Perempuan";
            }

            $file = $this->request->getFile('foto');
            $name = $file->getRandomName();

            $data = [
                'nis' => $this->request->getPost('nis'),
                'nisn' => $this->request->getPost('nisn'),
                'nama' => $this->request->getPost('nama'),
                'tempatLahir' => $this->request->getPost('tempatLahir'),
                'tglLahir' => $this->request->getPost('tglLahir'),
                'kelamin' => $kelamin,
                'alamat' => $this->request->getPost('alamat'),
                'idkelas' => $this->request->getPost('kelas'),
                'foto' => $name,
                'password' => random_string('alnum', 6),
            ];

            $model->insert($data);
            if (!$model->errors()) {
                $file->move('./assets/images/siswa', $name);
                return redirect()->to(site_url('admin/siswa'));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(site_url('admin/inputSiswa'));
            }
        } else {
            $model = new KelasModel();

            $kelas = $model->findAll();
            $data = [
                'judul' => 'Tambah Siswa',
                'kelas' => $kelas
            ];
            return view('admin/inputSiswa', $data);
        }
    }

    public function editSiswa($nis = null)
    {
        if ($this->request->getMethod() == 'post') {
            $model = new SiswaModel();

            if ($this->request->getPost('kelamin') == "cowo") {
                $kelamin = "Laki-laki";
            } else {
                $kelamin = "Perempuan";
            }

            $file = $this->request->getFile('foto');
            $name = $file->getName();

            if (empty($name)) {
                $name = $this->request->getPost('foto');
            } else {
                $name = $file->getRandomName();
                $file->move('./assets/images/siswa', $name);
            }

            $data = [
                'nis' => $this->request->getPost('nis'),
                'nisn' => $this->request->getPost('nisn'),
                'nama' => $this->request->getPost('nama'),
                'tempatLahir' => $this->request->getPost('tempatLahir'),
                'tglLahir' => $this->request->getPost('tglLahir'),
                'kelamin' => $kelamin,
                'alamat' => $this->request->getPost('alamat'),
                'idkelas' => $this->request->getPost('kelas'),
                'foto' => $name,
            ];

            $model->update($nis, $data);
            if (!$model->errors()) {
                return redirect()->to(site_url('admin/siswa'));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(site_url('admin/editSiswa' . $nis));
            }
        } else {
            $model = new SiswaModel();
            $modelKelas = new KelasModel();

            $siswa = $model->find($nis);
            $kelas = $modelKelas->findAll();

            $data = [
                'judul' => 'Edit Data Siswa',
                'siswa' => $siswa,
                'kelas' => $kelas,
            ];
            return view('admin/editSiswa', $data);
        }
    }

    public function hapusSiswa($nis = null)
    {
        $model = new SiswaModel();
        $model->delete($nis);

        return redirect()->to(site_url('admin/siswa'));
    }

    public function guru()
    {
        $model = new GuruModel();
        $modelMapel = new MapelModel();

        $guru = $model->findAll();
        $mapel = $modelMapel->findAll();

        $data = [
            'judul' => 'Data Guru',
            'guru' => $guru,
            'mapel' => $mapel,
        ];
        return view('admin/guru', $data);
    }

    public function inputGuru()
    {
        if ($this->request->getMethod() == 'post') {
            $model = new GuruModel();

            helper('text');
            $rules = [
                'nip' => 'is_unique[guru.nip]',
            ];
            $model->setValidationRules($rules);

            if ($this->request->getPost('kelamin') == "cowo") {
                $kelamin = "Laki-laki";
            } else {
                $kelamin = "Perempuan";
            }

            $file = $this->request->getFile('foto');
            $name = $file->getRandomName();

            $data = [
                'nip' => $this->request->getPost('nip'),
                'nama' => $this->request->getPost('nama'),
                'tempatLahir' => $this->request->getPost('tempatLahir'),
                'tglLahir' => $this->request->getPost('tglLahir'),
                'kelamin' => $kelamin,
                'alamat' => $this->request->getPost('alamat'),
                'idmapel' => $this->request->getPost('mapel'),
                'foto' => $name,
                'password' => random_string('alnum', 6),
            ];

            $model->insert($data);
            if (!$model->errors()) {
                $file->move('./assets/images/guru', $name);
                return redirect()->to(site_url('admin/guru'));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(site_url('admin/inputGuru'));
            }
        } else {
            $model = new MapelModel();

            $mapel = $model->findAll();
            $data = [
                'judul' => 'Tambah Guru',
                'mapel' => $mapel
            ];
            return view('admin/inputGuru', $data);
        }
    }

    public function editGuru($nip = null)
    {
        if ($this->request->getMethod() == 'post') {
            $model = new GuruModel();

            if ($this->request->getPost('kelamin') == "cowo") {
                $kelamin = "Laki-laki";
            } else {
                $kelamin = "Perempuan";
            }

            $file = $this->request->getFile('foto');
            $name = $file->getName();

            if (empty($name)) {
                $name = $this->request->getPost('foto');
            } else {
                $name = $file->getRandomName();
                $file->move('./assets/images/guru', $name);
            }

            $data = [
                'nama' => $this->request->getPost('nama'),
                'tempatLahir' => $this->request->getPost('tempatLahir'),
                'tglLahir' => $this->request->getPost('tglLahir'),
                'kelamin' => $kelamin,
                'alamat' => $this->request->getPost('alamat'),
                'idmapel' => $this->request->getPost('mapel'),
                'foto' => $name,
            ];

            $model->update($nip, $data);
            if (!$model->errors()) {
                return redirect()->to(site_url('admin/guru'));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(site_url('admin/editGuru/' . $nis));
            }
        } else {
            $model = new GuruModel();
            $modelMapel = new MapelModel();

            $guru = $model->find($nip);
            $mapel = $modelMapel->findAll();

            $data = [
                'judul' => 'Edit Data Guru',
                'guru' => $guru,
                'mapel' => $mapel,
            ];
            return view('admin/editGuru', $data);
        }
    }

    public function hapusGuru($nip = null)
    {
        $model = new GuruModel();
        $model->delete($nip);

        return redirect()->to(site_url('admin/guru'));
    }

    public function inputKelas()
    {
        if ($this->request->getMethod() == 'post') {
            $model = new KelasModel();

            $kelas = $this->request->getPost('kelas') . " " . $this->request->getPost('jurusan') . " " . $this->request->getPost('ruang');

            $data = [
                'kelas' => $kelas,
            ];

            $rules = [
                'kelas' => 'is_unique[kelas.kelas]'
            ];
            $model->setValidationRules($rules);
            $model->insert($data);
            if (!$model->errors()) {
                return redirect()->to(site_url('admin/kelas'));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(site_url('admin/inputKelas'));
            }
        } else {
            $data = [
                'judul' => 'Tambah Kelas',
            ];
            return view('admin/inputKelas', $data);
        }
    }

    public function hapusKelas($id = null)
    {
        $model = new KelasModel();
        $model->delete($id);

        return redirect()->to(site_url('admin/kelas'));
    }

    public function mapel()
    {
        $model = new MapelModel();

        $mapel = $model->findAll();

        $data = [
            'judul' => 'Data Mata Pelajaran',
            'mapel' => $mapel,
        ];
        return view('admin/mapel', $data);
    }

    public function inputMapel()
    {
        if ($this->request->getMethod() == 'post') {
            $model = new MapelModel();

            $data = [
                'mapel' => $this->request->getPost('mapel'),
            ];

            $rules = [
                'mapel' => 'is_unique[mapel.mapel]'
            ];
            $model->setValidationRules($rules);
            $model->insert($data);
            if (!$model->errors()) {
                return redirect()->to(site_url('admin/mapel'));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(site_url('admin/inputMapel'));
            }
        } else {
            $data = [
                'judul' => 'Tambah Mata Pelajaran',
            ];
            return view('admin/inputMapel', $data);
        }
    }

    public function hapusMapel($id = null)
    {
        $model = new MapelModel();
        $model->delete($id);

        return redirect()->to(site_url('admin/mapel'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('admin'));
    }
}