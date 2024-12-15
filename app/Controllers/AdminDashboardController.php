<?php

namespace App\Controllers;

use App\Models\AdminDashboardModel;

class AdminDashboardController extends BaseController
{
    public function index()
    {
        $session = session();

        // Periksa apakah admin sudah login
        if (!$session->get('alogin')) {
            return redirect()->to('/adminlogin')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $dashboardModel = new AdminDashboardModel();

        // Dapatkan data untuk dashboard
        $data = [
            'booksCount' => $dashboardModel->countBooks(),
            'notReturnedBooksCount' => $dashboardModel->countNotReturnedBooks(),
            'usersCount' => $dashboardModel->countRegisteredUsers(),
            'authorsCount' => $dashboardModel->countAuthors(),
            'categoriesCount' => $dashboardModel->countCategories(),
        ];

        return view('dashboard-admin', $data);
    }
}
