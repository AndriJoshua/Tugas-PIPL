<?php

namespace App\Models;

use CodeIgniter\Model;

class PasswordModel extends Model
{
    protected $table = 'tblstudents';
    protected $primaryKey = 'StudentId';
    protected $allowedFields = ['Password'];

    public function verifyPassword($email, $password)
    {
        return $this->where(['EmailId' => $email, 'Password' => $password])->first();
    }

    public function updatePassword($email, $newPassword)
    {
        return $this->where('EmailId', $email)->set(['Password' => $newPassword])->update();
    }
}
