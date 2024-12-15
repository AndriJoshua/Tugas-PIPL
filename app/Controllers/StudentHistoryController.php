<?php

namespace App\Controllers;

use App\Models\StudentHistoryModel;

class StudentHistoryController extends BaseController
{
    public function index($studentId)
    {
        $model = new StudentHistoryModel();

        // Mengambil data riwayat peminjaman berdasarkan ID mahasiswa
        $data['studentHistory'] = $model->getStudentHistory($studentId);
        $data['studentId'] = $studentId;

        if (empty($data['studentHistory'])) {
            return redirect()->to('/reg-students')->with('error', 'No history found for this student.');
        }

        return view('student-history', $data);
    }
}
