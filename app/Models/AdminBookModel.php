<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminBookModel extends Model
{
    protected $table = 'tblbooks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['BookName', 'CatId', 'AuthorId', 'ISBNNumber', 'BookPrice', 'bookImage'];

    public function getBooks()
    {
        return $this->select('tblbooks.*, tblcategory.CategoryName, tblauthors.AuthorName')
                    ->join('tblcategory', 'tblcategory.id = tblbooks.CatId')
                    ->join('tblauthors', 'tblauthors.id = tblbooks.AuthorId')
                    ->findAll();
    }

    public function deleteBook($id)
    {
        return $this->delete($id);
    }
}
