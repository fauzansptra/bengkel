<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
    public function __construct()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to('forbidden')->send();
        }
    }

    public function index()
    {
        $model = new UserModel();
        $data = [
            'title' => 'Data Pengguna',
            'getData' => $model->where('deleted_at', null)->findAll(),
        ];
        return view('user/index', $data);
    }

    public function create()
    {
        helper('form');
        $data = [
            'title' => 'Tambah Data Pengguna',
        ];

        if (session()->has('validation')) {
            $data['validation'] = session('validation');
        }
        return view('user/create', $data);
    }

    public function store()
    {
        $data = [
            'name'     => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'email'    => $this->request->getPost('email'),
            'phone'    => $this->request->getPost('phone'),
            'role'     => $this->request->getPost('role'),
            // 'created_by' => $this->request->getPost('created_by'),
        ];

        $data['created_by'] = session()->get('id');

        $userModel = new UserModel();
        if (!$userModel->validate($data)) {
            return redirect()->back()->withInput()->with('validation', $userModel->errors());
        }
        $data['password'] = sha1($this->request->getPost('password'));
        $userModel->insert($data);

        $session = session();
        $session->setFlashdata('success', 'Data pengguna berhasil disimpan');
        return redirect()->to('user');
    }

    public function edit($id)
    {
        helper('form');
        $model = new UserModel();
        $data = [
            'title' => 'Edit Data Pengguna',
            'getData' => $model->find($id),
        ];
        return view('user/edit', $data);
    }

    public function update($id)
    {
        $model = new UserModel();
        $data = [
            'name'     => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'phone'    => $this->request->getPost('phone'),
            'role'     => $this->request->getPost('role'),
            // 'created_by' => $this->request->getPost('created_by'),
        ];
        $model->update($id, $data);
        $session = session();
        $session->setFlashdata('success', 'Data pengguna berhasil diubah');
        return redirect()->to('user');
    }

    public function delete($id)
    {
        if ($id === null) {
            return redirect()->to('user');
        }

        $model = new UserModel();
        $model->delete($id);

        $session = session();
        $session->setFlashdata('success', 'Data pengguna berhasil dihapus');
        return redirect()->to('user');
    }
}
