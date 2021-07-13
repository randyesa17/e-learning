<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('tentang', 'Home::tentang');
$routes->group('admin', function($routes){
	$routes->add('/', 'Admin\Admin::login');
	$routes->add('home', 'Admin\Admin::index', ['filter' => 'AuthAdmin']);
	$routes->add('atur', 'Admin\Admin::atur', ['filter' => 'AuthAdmin']);
	$routes->add('tambah', 'Admin\Admin::tambah', ['filter' => 'AuthAdmin']);
	$routes->add('hapus/(:any)', 'Admin\Admin::hapus/$1', ['filter' => 'AuthAdmin']);
	$routes->add('profil', 'Admin\Admin::profil', ['filter' => 'AuthAdmin']);
	$routes->add('profil/nama', 'Admin\Admin::nama', ['filter' => 'AuthAdmin']);
	$routes->add('profil/password', 'Admin\Admin::password', ['filter' => 'AuthAdmin']);
	$routes->add('inputSiswa', 'Admin\Admin::inputSiswa', ['filter' => 'AuthAdmin']);
	$routes->add('inputGuru', 'Admin\Admin::inputGuru', ['filter' => 'AuthAdmin']);
	$routes->add('inputJurusan', 'Admin\Admin::inputJurusan', ['filter' => 'AuthAdmin']);
	$routes->add('inputMapel', 'Admin\Admin::inputMapel', ['filter' => 'AuthAdmin']);
	$routes->add('siswa', 'Admin\Admin::siswa', ['filter' => 'AuthAdmin']);
	$routes->add('hapusSiswa/(:any)', 'Admin\Admin::hapusSiswa/$1', ['filter' => 'AuthAdmin']);
	$routes->add('editSiswa/(:any)', 'Admin\Admin::editSiswa/$1', ['filter' => 'AuthAdmin']);
	$routes->add('guru', 'Admin\Admin::guru', ['filter' => 'AuthAdmin']);
	$routes->add('hapusGuru/(:any)', 'Admin\Admin::hapusGuru/$1', ['filter' => 'AuthAdmin']);
	$routes->add('editGuru/(:any)', 'Admin\Admin::editGuru/$1', ['filter' => 'AuthAdmin']);
	$routes->add('jurusan', 'Admin\Admin::jurusan', ['filter' => 'AuthAdmin']);
	$routes->add('hapusJurusan/(:any)', 'Admin\Admin::hapusJurusan/$1', ['filter' => 'AuthAdmin']);
	$routes->add('mapel', 'Admin\Admin::mapel', ['filter' => 'AuthAdmin']);
	$routes->add('hapusMapel/(:any)', 'Admin\Admin::hapusMapel/$1', ['filter' => 'AuthAdmin']);
	$routes->add('nilai', 'Admin\Nilai::index', ['filter' => 'AuthAdmin']);
	$routes->add('nilai/cari', 'Admin\Nilai::cari', ['filter' => 'AuthAdmin']);
	$routes->add('nilai/rekap', 'Admin\Nilai::rekap', ['filter' => 'AuthAdmin']);
	$routes->add('logout', 'Admin\Admin::logout', ['filter' => 'AuthAdmin']);
});

$routes->group('guru', function($routes){
	$routes->add('login', 'Guru\Guru::login');
	$routes->add('/', 'Guru\Guru::index', ['filter' => 'AuthGuru']);
	$routes->add('profil', 'Guru\Guru::profil', ['filter' => 'AuthGuru']);
	$routes->add('kelas', 'Guru\Kelas::index', ['filter' => 'AuthGuru']);
	$routes->add('kelas/tambah', 'Guru\Kelas::tambah', ['filter' => 'AuthGuru']);
	$routes->add('kelas/materi', 'Guru\Kelas::materi', ['filter' => 'AuthGuru']);
	$routes->add('kelas/tugas', 'Guru\Kelas::tugas', ['filter' => 'AuthGuru']);
	$routes->add('kelas/ujian/soal', 'Guru\Ujian::soal', ['filter' => 'AuthGuru']);
	$routes->add('kelas/(:any)/tugasMurid', 'Guru\Kelas::tugasMurid/$1', ['filter' => 'AuthGuru']);
	$routes->add('kelas/(:any)/ujian', 'Guru\Ujian::index/$1', ['filter' => 'AuthGuru']);
	$routes->add('kelas/(:any)/hapus/materi', 'Guru\Kelas::hapusMateri/$1', ['filter' => 'AuthGuru']);
	$routes->add('kelas/(:any)/hapus/tugas', 'Guru\Kelas::hapusTugas/$1', ['filter' => 'AuthGuru']);
	$routes->add('kelas/(:any)/hapus', 'Guru\Kelas::hapusUjian/$1', ['filter' => 'AuthGuru']);
	$routes->add('kelas/(:any)', 'Guru\Kelas::ruang/$1', ['filter' => 'AuthGuru']);
	$routes->add('nilai', 'Guru\Nilai::index', ['filter' => 'AuthGuru']);
	$routes->add('nilai/tugas', 'Guru\Nilai::tugas', ['filter' => 'AuthGuru']);
	$routes->add('logout', 'Guru\Guru::logout', ['filter' => 'AuthGuru']);
});

$routes->group('siswa', function($routes){
	$routes->add('login', 'Siswa\Siswa::login');
	$routes->add('/', 'Siswa\Siswa::index', ['filter' => 'AuthSiswa']);
	$routes->add('kelas', 'Siswa\Kelas::index', ['filter' => 'AuthSiswa']);
	$routes->add('kelas/tambah', 'Siswa\Kelas::tambah', ['filter' => 'AuthSiswa']);
	$routes->add('kelas/(:any)/tugas', 'Siswa\Kelas::tugas/$1', ['filter' => 'AuthGuru']);
	$routes->add('kelas/(:any)/ujian', 'Siswa\Ujian::index/$1', ['filter' => 'AuthGuru']);
	$routes->add('kelas/(:any)', 'Siswa\Kelas::ruang/$1', ['filter' => 'AuthSiswa']);
	$routes->add('nilai', 'Siswa\Siswa::nilai', ['filter' => 'AuthSiswa']);
	$routes->add('logout', 'Siswa\Siswa::logout', ['filter' => 'AuthSiswa']);
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}