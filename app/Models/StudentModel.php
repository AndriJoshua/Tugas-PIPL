<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'tblstudents';
    protected $primaryKey = 'StudentId';
    protected $allowedFields = ['EmailId', 'Password', 'FullName', 'MobileNumber', 'RegDate', 'Status'];

    // Mengambil semua data mahasiswa
    public function getAllStudents()
    {
        return $this->findAll();
    }

    // Memperbarui status mahasiswa (aktif/blokir)
    public function updateStudentStatus($id, $status)
    {
        if (empty($id) || !isset($status)) {
            log_message('error', 'Invalid update parameters: ID or Status is empty.');
            return false;
        }

        log_message('debug', "Updating student ID {$id} with status {$status}");

        return $this->update($id, ['Status' => $status]);
    }

    // Memverifikasi password mahasiswa berdasarkan email
    public function verifyPassword($email, $password)
    {
        return $this->where(['EmailId' => $email, 'Password' => $password])->first();
    }

    // Memperbarui password mahasiswa
    public function updatePassword($email, $newPassword)
    {
        return $this->where('EmailId', $email)->set(['Password' => $newPassword])->update();
    }
}
