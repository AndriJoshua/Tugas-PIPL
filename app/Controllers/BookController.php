<?php

namespace App\Controllers;

use App\Models\BookModel;

class BookController extends BaseController
{
    public function listedBooks()
    {
        $bookModel = new BookModel();

        // Ambil semua data buku
        $books = $bookModel->getBooks();

        // Kirim data ke view
        return view('listed-books', ['books' => $books]);
    }
}
