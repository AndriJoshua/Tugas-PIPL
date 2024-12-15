<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['UserName', 'Password'];

    public function validateAdmin($username, $password)
    {
        return $this->where(['UserName' => $username, 'Password' => $password])->first();
    }
    public function verifyPassword($username, $password)
    {
        return $this->where(['UserName' => $username, 'Password' => $password])->first();
    }

    // Perbarui password admin
    public function updatePassword($username, $newPassword)
    {
        return $this->where('UserName', $username)->set(['Password' => $newPassword])->update();
    }
}
