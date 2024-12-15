<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function logout()
    {
        // Menghapus semua session
        session()->start();
        session()->destroy();

        // Redirect ke halaman login atau beranda
        return redirect()->to('/');
    }
}
