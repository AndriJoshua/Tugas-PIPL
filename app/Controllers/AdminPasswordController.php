<?php

namespace App\Controllers;

use App\Models\AdminModel;

class AdminPasswordController extends BaseController
{
    // Menampilkan halaman ubah password
    public function index()
    {
        // Pastikan admin sudah login
        if (!session()->get('alogin')) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        return view('change-password-admin');
    }

    // Proses pengubahan password
    public function update()
    {
        // Pastikan admin sudah login
        if (!session()->get('alogin')) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Ambil data dari form
        $username = session()->get('alogin');
        $currentPassword = md5($this->request->getPost('password'));
        $newPassword = md5($this->request->getPost('newpassword'));
        $confirmPassword = md5($this->request->getPost('confirmpassword'));

        // Validasi password baru dan konfirmasi password
        if ($newPassword !== $confirmPassword) {
            return redirect()->to('/change-password-admin')->with('error', 'Password baru dan konfirmasi password tidak cocok.');
        }

        $adminModel = new AdminModel();

        // Verifikasi password saat ini
        $admin = $adminModel->verifyPassword($username, $currentPassword);
        if (!$admin) {
            return redirect()->to('/change-password-admin')->with('error', 'Password saat ini salah.');
        }

        // Perbarui password
        $updated = $adminModel->updatePassword($username, $newPassword);
        if ($updated) {
            return redirect()->to('/change-password-admin')->with('success', 'Password berhasil diubah.');
        } else {
            return redirect()->to('/change-password-admin')->with('error', 'Gagal mengubah password.');
        }
    }
}
