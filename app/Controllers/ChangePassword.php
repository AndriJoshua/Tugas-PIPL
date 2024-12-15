<?php

namespace App\Controllers;

use App\Models\PasswordModel;

class PasswordController extends BaseController
{
    public function updatePassword()
    {
        $email = session()->get('login'); // Email pengguna yang login
        $currentPassword = md5($this->request->getPost('password')); // Password saat ini (terenkripsi)
        $newPassword = md5($this->request->getPost('newpassword')); // Password baru (terenkripsi)
        $confirmPassword = md5($this->request->getPost('confirmpassword')); // Konfirmasi password baru

        // Validasi input
        if ($newPassword !== $confirmPassword) {
            return redirect()->to('/change-password')->with('error', 'Password baru dan konfirmasi password tidak cocok.');
        }

        $passwordModel = new PasswordModel();

        // Verifikasi password saat ini
        $user = $passwordModel->verifyPassword($email, $currentPassword);
        if (!$user) {
            return redirect()->to('/change-password')->with('error', 'Password saat ini salah.');
        }

        // Perbarui password
        $updated = $passwordModel->updatePassword($email, $newPassword);
        if ($updated) {
            return redirect()->to('/change-password')->with('success', 'Password berhasil diubah.');
        } else {
            return redirect()->to('/change-password')->with('error', 'Gagal mengubah password.');
        }
    }
}
