<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\CategoryModel;
use App\Models\AuthorModel;

class BookControllerAdmin extends BaseController
{
    public function addBook()
    {
        // Load model kategori dan penulis
        $categoryModel = new CategoryModel();
        $authorModel = new AuthorModel();

        // Ambil kategori dan penulis
        $data['categories'] = $categoryModel->findAll();
        $data['authors'] = $authorModel->findAll();

        return view('add-book', $data);
    }

    public function saveBook()
    {
        $bookModel = new BookModel();

        // Validasi file gambar
        $file = $this->request->getFile('bookpic');
        if ($file && $file->isValid()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'bookimg', $newName);

            $data = [
                'BookName'   => $this->request->getPost('bookname'),
                'CatId'      => $this->request->getPost('category'),
                'AuthorId'   => $this->request->getPost('author'),
                'ISBNNumber' => $this->request->getPost('isbn'),
                'BookPrice'  => $this->request->getPost('price'),
                'bookImage'  => $newName,
            ];

            if ($bookModel->addBook($data)) {
                return redirect()->to('/manage-books')->with('success', 'Book added successfully');
            }
        }

        return redirect()->back()->with('error', 'Failed to add book. Please try again.');
    }

    public function editBook($bookId)
    {
        $bookModel = new BookModel();
        $categoryModel = new CategoryModel();
        $authorModel = new AuthorModel();

        // Ambil data buku berdasarkan ID
        $data['book'] = $bookModel->find($bookId);
        
        if (!$data['book']) {
            return redirect()->to('/manage-books')->with('error', 'Book not found.');
        }

        // Ambil semua kategori dan penulis untuk dropdown
        $data['categories'] = $categoryModel->findAll();
        $data['authors'] = $authorModel->findAll();

        return view('edit-book', $data);
    }

    public function updateBook($bookId)
    {
        $bookModel = new BookModel();

        $data = [
            'BookName' => $this->request->getPost('bookname'),
            'CatId' => $this->request->getPost('category'),
            'AuthorId' => $this->request->getPost('author'),
            'BookPrice' => $this->request->getPost('price'),
        ];

        if ($bookModel->update($bookId, $data)) {
            return redirect()->to('/manage-books')->with('success', 'Book updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update book.');
        }
    }

    public function changeBookImage($id)
    {
        $bookModel = new BookModel();

        // Ambil data buku berdasarkan ID
        $book = $bookModel->getBookById($id);
        if (!$book) {
            return redirect()->to('/manage-books')->with('error', 'Book not found.');
        }

        return view('change-book-image', ['book' => $book]);
    }

    public function updateBookImage($id)
    {
        $bookModel = new BookModel();

        // Validasi file gambar
        $file = $this->request->getFile('bookImage');
        if (!$file->isValid()) {
            return redirect()->back()->with('error', 'Invalid file upload.');
        }

        // Validasi ekstensi file
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($file->getExtension(), $allowedExtensions)) {
            return redirect()->back()->with('error', 'Invalid file format. Only jpg, jpeg, png, gif allowed.');
        }

        // Hapus gambar lama
        $book = $bookModel->getBookById($id);
        if ($book && file_exists('bookimg/' . $book['bookImage'])) {
            unlink('bookimg/' . $book['bookImage']);
        }

        // Simpan gambar baru
        $newFileName = $file->getRandomName();
        $file->move('bookimg', $newFileName);

        // Update database dengan gambar baru
        if ($bookModel->updateBookImage($id, $newFileName)) {
            return redirect()->to('/manage-books')->with('success', 'Book image updated successfully.');
        }

        return redirect()->back()->with('error', 'Failed to update book image.');
    }
}
