<?php

namespace App\Controllers;

use App\Models\ProfileModel;

class ProfileController extends BaseController
{
    public function index()
    {
        // Periksa apakah user login
        if (!session()->get('login')) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $studentId = session()->get('stdid');
        $profileModel = new ProfileModel();

        // Ambil data profil
        $profile = $profileModel->getProfile($studentId);

        return view('profile', ['profile' => $profile]);
    }
}
