<?php

namespace App\Controllers;

use App\Models\IssuedBookModel;

class IssuedBookController extends BaseController
{
    public function index()
    {
        // Periksa apakah user login
        if (!session()->get('login')) {
            return redirect()->to('/login');
        }

        $studentId = session()->get('stdid'); // Mengambil ID siswa dari session
        $issuedBookModel = new IssuedBookModel();
        $issuedBooks = $issuedBookModel->getIssuedBooks($studentId);

        // Kirim data ke view
        return view('issued-books', ['issuedBooks' => $issuedBooks]);
    }
}
