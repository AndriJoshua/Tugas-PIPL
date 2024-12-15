<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'tblstudents';
    protected $primaryKey = 'StudentId';
    protected $allowedFields = ['FullName', 'MobileNumber', 'UpdationDate'];

    public function getProfile($studentId)
    {
        return $this->where('StudentId', $studentId)->first();
    }

    public function updateProfile($studentId, $data)
    {
        return $this->where('StudentId', $studentId)->set($data)->update();
    }
}
