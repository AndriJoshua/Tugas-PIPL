<?php

namespace App\Controllers;

use App\Models\UserModel;

class StudentBlockController extends BaseController
{
    // Menampilkan halaman daftar siswa
    public function index()
    {
        $userModel = new UserModel();

        // Ambil semua data siswa
        $data['students'] = $userModel->findAll();

        // Flash message (success, error)
        $data['msg'] = session()->getFlashdata('msg');
        $data['error'] = session()->getFlashdata('error');

        return view('reg-students', $data);
    }

    // Fitur blokir siswa
    public function blockStudent($id)
    {
        $userModel = new UserModel();

        // Validasi StudentId
        if (empty($id) || !is_string($id)) {
            return redirect()->to('/reg-students')->with('error', 'Invalid student ID.');
        }

        // Periksa apakah siswa dengan ID tersebut ada
        $student = $userModel->find($id);
        if (!$student) {
            return redirect()->to('/reg-students')->with('error', 'Student not found.');
        }

        // Perbarui status siswa menjadi "Blocked"
        if ($userModel->update($id, ['Status' => 0])) {
            return redirect()->to('/reg-students')->with('msg', 'Student blocked successfully.');
        }

        return redirect()->to('/reg-students')->with('error', 'Failed to block student.');
    }

    // Fitur aktifkan siswa
    public function activateStudent($id)
    {
        $userModel = new UserModel();

        // Validasi StudentId
        if (empty($id) || !is_string($id)) {
            return redirect()->to('/students')->with('error', 'Invalid student ID.');
        }

        // Periksa apakah siswa dengan ID tersebut ada
        $student = $userModel->find($id);
        if (!$student) {
            return redirect()->to('/reg-students')->with('error', 'Student not found.');
        }

        // Perbarui status siswa menjadi "Active"
        if ($userModel->update($id, ['Status' => 1])) {
            return redirect()->to('/reg-students')->with('msg', 'Student activated successfully.');
        }

        return redirect()->to('/reg-students')->with('error', 'Failed to activate student.');
    }
}
