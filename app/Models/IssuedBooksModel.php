<?php

namespace App\Models;

use CodeIgniter\Model;

class IssuedBooksModel extends Model
{
    protected $table = 'tblissuedbookdetails';
    protected $primaryKey = 'id';

    public function getIssuedBooks()
    {
        $builder = $this->db->table($this->table);
        $builder->select('
            tblissuedbookdetails.id as rid,
            tblstudents.FullName,
            tblbooks.BookName,
            tblbooks.ISBNNumber,
            tblissuedbookdetails.IssuesDate,
            tblissuedbookdetails.ReturnDate
        ');
        $builder->join('tblstudents', 'tblstudents.StudentId = tblissuedbookdetails.StudentId');
        $builder->join('tblbooks', 'tblbooks.id = tblissuedbookdetails.BookId');
        $builder->orderBy('tblissuedbookdetails.id', 'DESC');
        return $builder->get()->getResultArray();
    }
}
