<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthorModel extends Model
{
    protected $table = 'tblauthors';
    protected $primaryKey = 'id';
    protected $allowedFields = ['AuthorName', 'creationDate', 'UpdationDate'];

    // Ambil semua data author
    public function getAuthors()
    {
        return $this->orderBy('creationDate', 'DESC')->findAll();
    }

    // Hapus author berdasarkan ID
    public function deleteAuthor($id)
    {
        return $this->delete($id);
    }

    public function getAuthorById($id)
    {
        return $this->find($id);
    }

    public function updateAuthor($id, $data)
    {
        return $this->update($id, $data);
    }

}
