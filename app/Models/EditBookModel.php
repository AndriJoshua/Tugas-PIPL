<?php

namespace App\Models;

use CodeIgniter\Model;

class EditBookModel extends Model
{
    protected $table = 'tblbooks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['BookName', 'CatId', 'AuthorId', 'BookPrice', 'ISBNNumber', 'bookImage'];

    // Get a single book by ID
    public function getBookById($bookId)
    {
        return $this->db->table($this->table)
            ->select('tblbooks.*, tblcategory.CategoryName, tblauthors.AuthorName')
            ->join('tblcategory', 'tblcategory.id = tblbooks.CatId')
            ->join('tblauthors', 'tblauthors.id = tblbooks.AuthorId')
            ->where('tblbooks.id', $bookId)
            ->get()
            ->getRowArray();
    }

    // Update book details
    public function updateBook($bookId, $data)
    {
        return $this->update($bookId, $data);
    }
}
