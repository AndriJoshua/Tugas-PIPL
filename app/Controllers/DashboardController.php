<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class DashboardController extends BaseController
{
    public function index()
    {
        //cek session
        if (!session()->get('login')) {
            return redirect()->to('/login');
        }
        
        // Memuat model
        
        $dashboardModel = new DashboardModel();

        // Mendapatkan jumlah daftar buku
        $listdbooks = $dashboardModel->getTotalBooks();

        // Mendapatkan jumlah buku yang belum dikembalikan
        $sid = session()->get('stdid');
        $returnedbooks = $dashboardModel->getPendingReturns($sid);

        // Mengirim data ke view
        return view('dashboard', [
            'listdbooks' => $listdbooks,
            'returnedbooks' => $returnedbooks
        ]);
    }
}
