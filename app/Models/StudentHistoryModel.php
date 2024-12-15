<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentHistoryModel extends Model
{
    protected $table = 'tblissuedbookdetails';

    public function getStudentHistory($studentId)
    {
        return $this->db->table($this->table)
            ->select('tblstudents.StudentId, tblstudents.FullName, tblbooks.BookName, tblissuedbookdetails.IssuesDate, tblissuedbookdetails.ReturnDate, tblissuedbookdetails.fine')
            ->join('tblstudents', 'tblstudents.StudentId = tblissuedbookdetails.StudentId')
            ->join('tblbooks', 'tblbooks.id = tblissuedbookdetails.BookId')
            ->where('tblstudents.StudentId', $studentId)
            ->get()
            ->getResult();
    }
}
