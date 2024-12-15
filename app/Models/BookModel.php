<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'tblbooks';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'BookName', 'CatId', 'AuthorId', 'ISBNNumber', 'BookPrice', 'bookImage'
    ];
    public function getBooks()
    {
        $query = $this->db->table($this->table)
            ->select('tblbooks.BookName, tblcategory.CategoryName, tblauthors.AuthorName, tblbooks.ISBNNumber, tblbooks.BookPrice, tblbooks.id as bookid, tblbooks.bookImage, tblbooks.isIssued')
            ->join('tblcategory', 'tblcategory.id = tblbooks.CatId')
            ->join('tblauthors', 'tblauthors.id = tblbooks.AuthorId')
            ->get();

        return $query->getResult(); // Mengembalikan semua data sebagai array objek
    }
    public function addBook($data)
    {
        return $this->insert($data);
    }

    public function issueBook($studentid, $bookid)
    {
        $this->db->transStart();

        $this->db->table('tblissuedbookdetails')->insert([
            'StudentID' => $studentid,
            'BookId' => $bookid,
        ]);

        $this->db->table('tblbooks')
            ->where('id', $bookid)
            ->update(['isIssued' => 1]);

        $this->db->transComplete();

        return $this->db->transStatus();
    }

    public function getBookDetails($bookid)
    {
        return $this->db->table($this->table)
            ->select('tblbooks.BookName, tblbooks.id, tblauthors.AuthorName, tblbooks.bookImage, tblbooks.isIssued')
            ->join('tblauthors', 'tblauthors.id = tblbooks.AuthorId')
            ->groupStart()
            ->where('ISBNNumber', $bookid)
            ->orLike('BookName', $bookid)
            ->groupEnd()
            ->get()
            ->getResult();
    }

    public function getBookById($bookId)
    {
        return $this->find($bookId);
    }
    public function updateBookImage($bookId, $newImage)
    {
        return $this->update($bookId, ['bookImage' => $newImage]);
    }
}
