<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // Mendapatkan jumlah buku
    public function getTotalBooks()
    {
        $query = $this->db->query("SELECT id FROM tblbooks");
        return $query->getNumRows(); // Mengembalikan jumlah buku
    }

    // Mendapatkan jumlah buku yang belum dikembalikan
    public function getPendingReturns($sid)
    {
        $query = $this->db->query("
            SELECT id FROM tblissuedbookdetails
            WHERE StudentID = ?
            AND (RetrunStatus = 0 OR RetrunStatus IS NULL OR RetrunStatus = '')",
            [$sid]
        );
        return $query->getNumRows(); // Mengembalikan jumlah buku yang belum dikembalikan
    }
}
