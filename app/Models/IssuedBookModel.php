<?php

namespace App\Models;

use CodeIgniter\Model;

class IssuedBookModel extends Model
{
    protected $table = 'tblissuedbookdetails';
    protected $primaryKey = 'id';
    protected $allowedFields = ['StudentID', 'BookId', 'IssuesDate', 'ReturnDate'];

    public function getIssuedBooks($studentId)
    {
        $builder = $this->db->table($this->table)
            ->select('tblbooks.BookName, tblbooks.ISBNNumber, tblissuedbookdetails.IssuesDate, tblissuedbookdetails.ReturnDate, tblissuedbookdetails.fine')
            ->join('tblstudents', 'tblstudents.StudentId = tblissuedbookdetails.StudentId')
            ->join('tblbooks', 'tblbooks.id = tblissuedbookdetails.BookId')
            ->where('tblstudents.StudentId', $studentId)
            ->orderBy('tblissuedbookdetails.id', 'DESC');

        return $builder->get()->getResult();
    }
    public function issueBook($data)
    {
        return $this->insert($data);
    }

    public function getAllIssuedBooks()
    {
        return $this->db->table($this->table)
            ->select('tblstudents.FullName, tblbooks.BookName, tblbooks.ISBNNumber, tblissuedbookdetails.IssuesDate, tblissuedbookdetails.ReturnDate, tblissuedbookdetails.id as rid')
            ->join('tblstudents', 'tblstudents.StudentId = tblissuedbookdetails.StudentId')
            ->join('tblbooks', 'tblbooks.id = tblissuedbookdetails.BookId')
            ->orderBy('tblissuedbookdetails.id', 'DESC')
            ->get()
            ->getResult();
    }

    public function getIssuedBookDetails($rid)
    {
        return $this->db->table($this->table)
            ->select('tblstudents.StudentId, tblstudents.FullName, tblstudents.EmailId, tblstudents.MobileNumber, tblbooks.BookName, tblbooks.ISBNNumber, tblissuedbookdetails.IssuesDate, tblissuedbookdetails.ReturnDate, tblissuedbookdetails.id as rid, tblissuedbookdetails.fine, tblissuedbookdetails.RetrunStatus, tblbooks.id as bid, tblbooks.bookImage')
            ->join('tblstudents', 'tblstudents.StudentId = tblissuedbookdetails.StudentId')
            ->join('tblbooks', 'tblbooks.id = tblissuedbookdetails.BookId')
            ->where('tblissuedbookdetails.id', $rid)
            ->get()
            ->getRow();
    }

    public function returnBook($rid, $fine, $bookid)
    {
        $this->db->transStart();

        $this->db->table($this->table)
            ->where('id', $rid)
            ->update([
                'fine' => $fine,
                'RetrunStatus' => 1
            ]);

        $this->db->table('tblbooks')
            ->where('id', $bookid)
            ->update([
                'isIssued' => 0
            ]);

        $this->db->transComplete();

        return $this->db->transStatus();
    }

}
