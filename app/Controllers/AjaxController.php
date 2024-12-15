<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\BookModel;

class AjaxController extends BaseController
{
    public function getStudent()
    {
        // Ambil data dari request
        $studentId = $this->request->getPost('studentid');

        if (!$studentId) {
            return $this->response->setBody('Student ID is required.');
        }

        // Model untuk mengambil data siswa
        $studentModel = new StudentModel();
        $student = $studentModel->where('id', $studentId)->first();

        if ($student) {
            return $this->response->setBody("Student Name: {$student['name']}");
        } else {
            return $this->response->setBody('Student not found.');
        }
    }

    public function getBook()
    {
        // Ambil data dari request
        $bookId = $this->request->getPost('bookid');

        if (!$bookId) {
            return $this->response->setBody('Book ID is required.');
        }

        // Model untuk mengambil data buku
        $bookModel = new BookModel();
        $book = $bookModel->where('id', $bookId)->first();

        if ($book) {
            return $this->response->setBody("Book Title: {$book['title']}, ISBN: {$book['isbn']}");
        } else {
            return $this->response->setBody('Book not found.');
        }
    }
}
