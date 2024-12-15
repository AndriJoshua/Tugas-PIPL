<?php

namespace App\Controllers;

use App\Models\IssuedBooksModel;
use App\Models\IssuedBookModel;

class IssuedBooksController extends BaseController
{
   public function index()
    {
        $model = new IssuedBookModel();

        // Mengambil semua data issued books
        $data['issuedBooks'] = $model->getAllIssuedBooks();

        // Flash messages (success, error, delete)
        $data['msg'] = session()->getFlashdata('msg');
        $data['error'] = session()->getFlashdata('error');  
        $data['delmsg'] = session()->getFlashdata('delmsg');

        return view('manage-issued-book', $data);
    }

    public function delete($id)
    {
        $model = new IssuedBooksModel();
        if ($model->delete($id)) {
            return redirect()->to('/manage_issued_books')->with('delmsg', 'Issued book record deleted successfully.');
        } else {
            return redirect()->to('/manage_issued_books')->with('error', 'Failed to delete record.');
        }
    }
    
}
