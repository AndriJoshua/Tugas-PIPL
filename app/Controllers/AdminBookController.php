<?php

namespace App\Controllers;

use App\Models\AdminBookModel;

class AdminBookController extends BaseController
{
    public function manageBooks()
    {
        $session = session();
        if (!$session->get('alogin')) {
            return redirect()->to('/adminlogin')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $bookModel = new AdminBookModel();
        $books = $bookModel->getBooks();

        return view('manage-books', ['books' => $books]);
    }

    public function deleteBook($id)
    {
        $session = session();
        if (!$session->get('alogin')) {
            return redirect()->to('/adminlogin')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $bookModel = new AdminBookModel();
        if ($bookModel->deleteBook($id)) {
            $session->setFlashdata('delmsg', 'Book deleted successfully.');
        } else {
            $session->setFlashdata('error', 'Failed to delete the book.');
        }

        return redirect()->to('/manage-books');
    }
}
