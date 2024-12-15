<?php

namespace App\Controllers;

use App\Models\AdminModel;

class AdminController extends BaseController
{
    public function index()
    {
        return view('/adminlogin');
    }

    public function login()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = md5($this->request->getPost('password')); // Menggunakan md5 untuk hashing (sama seperti project lama)

        $adminModel = new AdminModel();
        $admin = $adminModel->validateAdmin($username, $password);

        if ($admin) {
            $session->set('alogin', $username);
            return redirect()->to('/dashboard-admin');
        } else {
            return redirect()->to('/adminlogin')->with('error', 'Invalid username or password.');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/adminlogin');
    }

    public function changePassword()
    {
        $session = session();

        // Pastikan admin sudah login
        if (!$session->get('alogin')) {
            return redirect()->to('index');
        }

        $data = [];
        $adminModel = new AdminModel();

        if ($this->request->getMethod() === 'post') {
            $username = $session->get('alogin');
            $currentPassword = md5($this->request->getPost('password'));
            $newPassword = md5($this->request->getPost('newpassword'));
            $confirmPassword = md5($this->request->getPost('confirmpassword'));

            // Validasi bahwa kata sandi baru cocok dengan konfirmasi
            if ($newPassword !== $confirmPassword) {
                $data['error'] = 'New Password and Confirm Password do not match!';
            } else {
                // Verifikasi kata sandi saat ini
                $admin = $adminModel->verifyPassword($username, $currentPassword);

                if ($admin) {
                    // Update kata sandi baru
                    if ($adminModel->updatePassword($username, $newPassword)) {
                        $data['msg'] = 'Your password has been successfully changed!';
                    } else {
                        $data['error'] = 'Failed to update password. Please try again!';
                    }
                } else {
                    $data['error'] = 'Your current password is incorrect!';
                }
            }
        }
        return view('change-password-admin', $data);
    }
}
