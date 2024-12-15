<?php

namespace App\Controllers;

use App\Models\ProfileModel;

class UpdateData extends BaseController
{
    public function update()
    {
        $studentId = session()->get('stdid');
        $data = [
            'FullName' => $this->request->getPost('fullanme'),
            'MobileNumber' => $this->request->getPost('mobileno'),
            'UpdationDate' => date('Y-m-d H:i:s'),
        ];

        $profileModel = new ProfileModel();
        $updated = $profileModel->updateProfile($studentId, $data);

        if ($updated) {
            return redirect()->to('/profile')->with('success', 'Profil berhasil diperbarui.');
        } else {
            return redirect()->to('/profile')->with('error', 'Gagal memperbarui profil.');
        }

        dd($this->request->getMethod()); // Ini akan mencetak 'post' atau 'get'
    }
}
