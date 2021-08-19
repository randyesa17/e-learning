<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JadwalModel;
use App\Models\PostModel;
use App\Models\RuangKelasModel;
use App\Models\GuruModel;

class Jadwal extends BaseController
{
	public function __construct()
	{
		helper(["html"]);
	}

	public function index()
	{
		$model = new JadwalModel();
		$modelGuru = new GuruModel();
		$modelRuang = new RuangKelasModel();
		$jadwal = $model->orderBy('tgl', 'desc')->findAll();
		$guru = $modelGuru->findAll();
		$ruang = $modelRuang->findAll();
		$data = [
			'judul' => 'Jadwal Pengajaran',
			'jadwal' => $jadwal,
			'guru' => $guru,
			'ruang' => $ruang,
		];

		return view('admin/jadwal', $data);
	}

	public function input()
	{
		if ($this->request->getMethod() == 'post') {
            $model = new JadwalModel();

            $data = [
                'namajadwal' => $this->request->getPost('judul'),
                'ruang' => $this->request->getPost('ruang'),
                'jenis' => $this->request->getPost('jenis'),
                'tgl' => $this->request->getPost('tgl'),
            ];

            $model->insert($data);
            if (!$model->errors()) {
                return redirect()->to(site_url('admin/jadwal'));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', "Gagal Menyimpan");
                return redirect()->to(site_url('admin/jadwal/input'));
            }
        } else {
            $modelRuang = new RuangKelasModel();

            $ruang = $modelRuang->findAll();

            $data = [
                'judul' => 'Tambah Jadwal',
                'ruang' => $ruang,
            ];
            return view('admin/inputJadwal', $data);
        }
	}

	public function edit($id)
	{
		if ($this->request->getMethod() == 'post') {
            $model = new JadwalModel();

            $data = [
                'namajadwal' => $this->request->getPost('judul'),
                'ruang' => $this->request->getPost('ruang'),
                'jenis' => $this->request->getPost('jenis'),
                'tgl' => $this->request->getPost('tgl'),
            ];

            $model->update($id, $data);
            if (!$model->errors()) {
                return redirect()->to(site_url('admin/jadwal'));
            } else {
                $error = $model->errors();
                session()->setFlashdata('info', "Gagal Menyimpan");
                return redirect()->to(site_url('admin/jadwal/edit/'.$id));
            }
        } else {
            $model = new JadwalModel();
            $modelRuang = new RuangKelasModel();

			$jadwal = $model->where('idjadwal', $id)->first();
			$ruang = $modelRuang->findAll();

            $data = [
                'judul' => 'Edit Jadwal',
                'jadwal' => $jadwal,
                'ruang' => $ruang,
            ];
            return view('admin/editJadwal', $data);
        }
	}

	public function hapus($id = null)
    {
        $model = new JadwalModel();
		
        $model->delete($id);

        return redirect()->to(site_url('admin/jadwal'));
    }

	public function loadData()
	{
		$event = new JadwalModel();
		$start = $this->request->getVar('start');
		$end = $this->request->getVar('end');
		// on page load this ajax code block will be run
		$data = $event->where([
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

	public function ajax()
	{
		$event = new JadwalModel();

		switch ($this->request->getVar('type')) {

				// For add EventModel
			case 'add':
				$data = [
					'namajadwal' => $this->request->getVar('nama'),
					'ruang' => $this->request->getVar('ruang'),
					'kode' => $this->request->getVar('kode'),
					'tgl' => $this->request->getVar('tgl'),
				];
				$event->insert($data);
				return json_encode($event);
				break;

				// For update EventModel        
			case 'update':
				$data = [
					'namajadwal' => $this->request->getVar('title'),
					'ruang' => $this->request->getVar('ruang'),
					'kode' => $this->request->getVar('kode'),
					'tgl' => $this->request->getVar('start'),
				];

				$event_id = $this->request->getVar('idjadwal');

				$event->update($event_id, $data);

				return json_encode($event);
				break;

				// For delete EventModel    
			case 'delete':

				$event_id = $this->request->getVar('idjadwal');

				$event->delete($event_id);

				return json_encode($event);
				break;

			default:
				break;
		}
	}
}