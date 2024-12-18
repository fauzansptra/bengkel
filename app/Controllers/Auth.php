<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    // cek jika ada session yang aktif maka akan diarahkan ke halaman user atau home
    public function __construct()
    {
        $session = session();
        $request = service('request');
        $currentMethod = $request->getUri()->getSegment(2); // Mendapatkan metode saat ini dari URL

        // Kecualikan metode logout dari pengecekan
        if ($currentMethod !== 'logout') {
            if ($session->get('logged_in')) {
                if ($session->get('role') == 'admin') {
                    return redirect()->to('user')->send();
                } else {
                    return redirect()->to('/')->send();
                }
            }
        }
    }

    public function index()
    {
        helper(['form']);
        return view('auth/login');
    }

    public function authenticate()
    {
        helper(['form', 'url']);
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $model = new UserModel();
        $data = $model->checkDataLogin($username, sha1($password));
        if ($data) {
            $sessdata = [
                'id' => $data->id,
                'username' => $data->username,
                'nama' => $data->name,
                'role' => $data->role,
                'logged_in' => TRUE
            ];
            $session->set($sessdata);
            if ($data->role == 'admin') {
                return redirect()->to('user');
            } else {
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('error', 'Username/Password Salah');
            return redirect()->to('auth/login');
        }
    }

    public function register()
    {
        helper(['form']);
        $data = [];
        if (session()->has('validation')) {
            $data['validation'] = session('validation');
        }
        return view('auth/register', $data);
    }

    // public function store()
    public function store()
    {
        $data = [
            'name'     => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'phone'    => $this->request->getPost('phone'),
            'role'     => 'user',
        ];


        $userModel = new UserModel();
        if (!$userModel->validate($data)) {
            return redirect()->back()->withInput()->with('validation', $userModel->errors());
        }
        $data['password'] = sha1($this->request->getPost('password'));
        $userModel->insert($data);

        $session = session();
        $session->setFlashdata('success', 'Akun berhasil dibuat, silahkan login');
        return redirect()->to('auth/login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('auth/login');
    }
}
