<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('index'); // Memuat tampilan login
    }

    public function login()
    {
        $session = session();
        $email = $this->request->getPost('emailid');
        $password = md5($this->request->getPost('password')); // Hindari MD5, gunakan hashing lebih aman (bcrypt)

        $userModel = new UserModel();
        $user = $userModel->where('EmailId', $email)->where('Password', $password)->first();

        if ($user) {
            if ($user['Status'] == 1) {
                $session->set('stdid', $user['StudentId']);
                $session->set('login', $email);
                return redirect()->to('/dashboard'); // Redirect ke dashboard
            } else {
                return redirect()->back()->with('error', 'Your Account Has been blocked. Please contact admin.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Details');
        }
    }
}
