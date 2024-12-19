<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\QueueModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Queue extends BaseController
{
    public function __construct()
    {
        $session = session();
        $request = service('request');
        $currentMethod = $request->getUri()->getSegment(2); // Mendapatkan metode saat ini dari URL

        // Kecualikan metode store
        if ($currentMethod !== 'store') {
            if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
                return redirect()->to('forbidden')->send();
            }
        }
    }

    public function index()
    {
        $model = new QueueModel();
        $data = [
            'title' => 'Data Antrian',
            'getData' => $model->getAllData(),
        ];
        return view('service_page', $data);
    }

    public function create()
    {
        helper('form');
        $dataPengguna = new UserModel();
        $data = [
            'title' => 'Tambah Data Antrian',
            'dataPengguna' => $dataPengguna->where('deleted_at', null)->findAll(),
        ];

        if (session()->has('validation')) {
            $data['validation'] = session('validation');
        }
        return view('antrian/create', $data);
    }

    public function store()
    {
        $data = [
            'user_id'  => $this->request->getPost('user_id'),
            'status'   => $this->request->getPost('status') ?? 'menunggu',
        ];

        $userModel = new QueueModel();
        if (!$userModel->validate($data)) {
            return redirect()->back()->withInput()->with('validation', $userModel->errors());
        }
        $data['action_by'] = session()->get('id');
        $data['password'] = sha1($this->request->getPost('password'));
        $userModel->insert($data);

        $session = session();
        // cek role user
        if (session()->get('role') == 'admin') {
            $session->setFlashdata('success', 'Data Antrian berhasil disimpan');
            return redirect()->to('antrian');
        } else {
            return redirect()->to('/');
        }
    }

    public function edit($id)
    {
        helper('form');
        $model = new QueueModel();
        $dataPengguna = new UserModel();
        $data = [
            'title' => 'Edit Data Antrian',
            'getData' => $model->find($id),
            'dataPengguna' => $dataPengguna->where('deleted_at', null)->findAll(),
        ];

        if (session()->has('validation')) {
            $data['validation'] = session('validation');
        }
        return view('antrian/edit', $data);
    }

    public function update($id)
    {
        $model = new QueueModel();
        $data = [
            'status'   => $this->request->getPost('status'),
        ];
        $data['action_by'] = session()->get('id');
        $model->update($id, $data);
        $session = session();
        $session->setFlashdata('success', 'Data Antrian berhasil diubah');
        return redirect()->to('antrian');
    }

    public function delete($id)
    {
        if ($id === null) {
            return redirect()->to('antrian');
        }

        $model = new QueueModel();
        $data = ['status' => 'selesai'];
        $model->update($id, $data);
        $model->delete($id);

        $session = session();
        $session->setFlashdata('success', 'Data Antrian berhasil dihapus');
        return redirect()->to('antrian');
    }
}
