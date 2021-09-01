<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RuangKelasModel;
use App\Models\GuruModel;
use App\Models\KelasModel;
use App\Models\MapelModel;

class Ruang extends BaseController
{
	public function index()
	{
		$model = new RuangKelasModel();
		$modelGuru = new GuruModel();
		$modelKelas = new KelasModel();
		$modelMapel = new MapelModel();
		$ruang = $model->findAll();
		$guru = $modelGuru->findAll();
		$kelas = $modelKelas->findAll();
		$mapel = $modelMapel->findAll();
		$data = [
			'judul' => 'Data Ruang Kelas',
			'ruang' => $ruang,
			'guru' => $guru,
			'kelas' => $kelas,
			'mapel' => $mapel,
		];

		return view('admin/ruang', $data);
	}
}