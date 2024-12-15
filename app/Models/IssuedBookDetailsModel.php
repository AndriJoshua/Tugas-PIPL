<?php

namespace App\Models;

use CodeIgniter\Model;

class IssuedBookDetailsModel extends Model
{
    protected $table = 'tblissuedbookdetails';
    protected $primaryKey = 'id';
    protected $allowedFields = ['fine', 'RetrunStatus', 'ReturnDate'];

    // Get issued book details by ID
    public function getIssuedBookDetails($id)
    {
        return $this->db->table($this->table)
            ->select('
                tblissuedbookdetails.id as rid,
                tblstudents.StudentId,
                tblstudents.FullName,
                tblstudents.EmailId,
                tblstudents.MobileNumber,
                tblbooks.BookName,
                tblbooks.ISBNNumber,
                tblbooks.id as bookid,
                tblbooks.bookImage,
                tblissuedbookdetails.IssuesDate,
                tblissuedbookdetails.ReturnDate,
                tblissuedbookdetails.fine,
                tblissuedbookdetails.RetrunStatus
            ')
            ->join('tblstudents', 'tblstudents.StudentId = tblissuedbookdetails.StudentId')
            ->join('tblbooks', 'tblbooks.id = tblissuedbookdetails.BookId')
            ->where('tblissuedbookdetails.id', $id)
            ->get()
            ->getRowArray();
    }

    // Update return status and fine
    public function updateReturnDetails($id, $data)
    {
        return $this->update($id, $data);
    }
}
