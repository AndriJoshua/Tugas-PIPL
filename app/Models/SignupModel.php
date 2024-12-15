<?php

namespace App\Models;

use CodeIgniter\Model;

class SignupModel extends Model
{
    protected $table = 'tblstudents';
    protected $primaryKey = 'id';
    protected $allowedFields = ['StudentId', 'FullName', 'MobileNumber', 'EmailId', 'Password', 'Status'];
}
