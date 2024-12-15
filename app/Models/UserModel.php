<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tblstudents';
    protected $primaryKey = 'StudentId';
    protected $allowedFields = ['EmailId', 'Password', 'StudentId', 'Status'];

    public function verifyPassword($email, $password)
    {
        return $this->where(['EmailId' => $email, 'Password' => $password])->first();
    }

    public function updatePassword($email, $newPassword)
    {
        return $this->where('EmailId', $email)->set(['Password' => $newPassword])->update();
    }

    public function getUserDetails($studentid)
    {
        return $this->db->table('tblstudents')
            ->select('FullName, Status, EmailId, MobileNumber')
            ->where('StudentId', $studentid)
            ->get()
            ->getRow();
    }
}
