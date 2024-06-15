<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $user = new UserModel();
        $username = $this->request->getPost('username');
        $pw = $this->request->getPost('password');

        if (empty($username) || empty($pw)) {
            session()->setFlashdata('pesan', 'Username dan password harus diisi');
            return redirect()->to(base_url('login'));
        }

        $dataUser = $user->where('username', $username)->orWhere('email', $username)->first();
        if (!$dataUser) {
            session()->setFlashdata('pesan', 'Username atau email tidak ditemukan');
            return redirect()->to(base_url('login'));
        }

        if (!password_verify($pw, $dataUser['password'])) {
            session()->setFlashdata('pesan', 'Password salah');
            return redirect()->to(base_url('login'));
        }

        session()->set([
            'username' => $dataUser['username'],
            'email' => $dataUser['email'],
            'logged_in' => true
        ]);
        return redirect()->to(base_url('buku'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }

    public function signUp()
    {
        if (session()->get('logged_in')) {
            return redirect()->to(base_url('buku'));
        }
        return view('signup');
    }

    public function signUpProcess()
    {
        $rules = [
            'username' => 'required|min_length[5]|max_length[20]|is_unique[user.username]',
            'email' => 'required|valid_email|is_unique[user.email]',
            'password' => 'required|min_length[8]',
            'confirm_password' => 'matches[password]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/signup')->withInput()->with('errors', $this->validator->getErrors());
        }

        $user = new UserModel();
        $newData = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        $user->save($newData);

        session()->set([
            'username' => $newData['username'],
            'email' => $newData['email'],
            'logged_in' => true
        ]);
        
        session()->setFlashdata('success', 'Pendaftaran berhasil. Anda sekarang masuk.');
        return redirect()->to('/buku');
    }

    public function forgotPassword()
    {
        return view('forgot_password');
    }

    public function forgotPasswordProcess()
    {
        $email = $this->request->getPost('email');
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            session()->setFlashdata('pesan', 'Email tidak ditemukan.');
            return redirect()->to(base_url('/forgot-password'));
        }

        session()->setFlashdata('pesan', 'Email untuk reset password telah dikirim.');
        return redirect()->to(base_url('/forgot-password'));
    }
}