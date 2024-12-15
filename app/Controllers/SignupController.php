<?php

namespace App\Controllers;

use App\Models\SignupModel;

class SignupController extends BaseController
{
    public function index()
    {
        // Tampilkan halaman signup
        return view('signup');
    }

    public function register()
    {
        // Validasi input
        $validation = $this->validate([
            'fullanme' => 'required',
            'mobileno' => 'required|max_length[15]',
            'email' => 'required|valid_email|is_unique[tblstudents.EmailId]',
            'password' => 'required|min_length[6]',
            'confirmpassword' => 'required|matches[password]',
        ]);

        if (!$validation) {
            return view('signup', [
                'validation' => $this->validator,
            ]);
        }

        // Ambil data input
        $data = [
            'StudentId' => $this->generateStudentId(),
            'FullName' => $this->request->getPost('fullanme'),
            'MobileNumber' => $this->request->getPost('mobileno'),
            'EmailId' => $this->request->getPost('email'),
            'Password' => md5($this->request->getPost('password')),
            'Status' => 1,
        ];

        // Simpan ke database
        $signupModel = new SignupModel();
        if ($signupModel->insert($data)) {
            return redirect()->to('/signup')->with('success', 'Pendaftaran berhasil. ID siswa Anda: ' . $data['StudentId']);
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    private function generateStudentId()
    {
        // Membaca dan memperbarui ID siswa dari file teks
        $filePath = WRITEPATH . 'studentid.txt';
        if (!file_exists($filePath)) {
            file_put_contents($filePath, 0);
        }

        $id = (int)file_get_contents($filePath) + 1;
        file_put_contents($filePath, $id);

        return $id;
    }
}
