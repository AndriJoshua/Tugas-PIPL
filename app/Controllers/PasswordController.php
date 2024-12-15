<?php

namespace App\Controllers;

use App\Models\UserModel;

class PasswordController extends BaseController
{
    public function index()
    {
        if (!session()->get('login')) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        return view('change-password');
    }

    public function updatePassword()
    {
        dd($this->request->getMethod());
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to('/change-password')->with('error', 'Invalid request method.');
        }
        if ($this->request->getMethod() === 'post') {
            $email = session()->get('login');
            $currentPassword = md5($this->request->getPost('password'));
            $newPassword = md5($this->request->getPost('newpassword'));
            $confirmPassword = md5($this->request->getPost('confirmpassword'));

            if ($newPassword !== $confirmPassword) {
                return redirect()->to('/change-password')->with('error', 'Password baru dan konfirmasi password tidak cocok.');
            }

            $userModel = new UserModel();

            // Verifikasi password saat ini
            $user = $userModel->verifyPassword($email, $currentPassword);
            if (!$user) {
                return redirect()->to('/change-password')->with('error', 'Password saat ini salah.');
            }

            // Perbarui password
            $updated = $userModel->updatePassword($email, $newPassword);
            if ($updated) {
                return redirect()->to('/change-password')->with('success', 'Password berhasil diubah.');
            } else {
                return redirect()->to('/change-password')->with('error', 'Gagal mengubah password.');
            }
        }
    }
}
