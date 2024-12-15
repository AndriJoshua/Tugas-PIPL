<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminDashboardModel extends Model
{
    // Hitung jumlah buku
    public function countBooks()
    {
        return $this->db->table('tblbooks')->countAllResults();
    }

    // Hitung jumlah buku yang belum dikembalikan
    public function countNotReturnedBooks()
    {
        return $this->db->table('tblissuedbookdetails')
            ->where('RetrunStatus', '')
            ->orWhere('RetrunStatus', null)
            ->countAllResults();
    }

    // Hitung jumlah pengguna terdaftar
    public function countRegisteredUsers()
    {
        return $this->db->table('tblstudents')->countAllResults();
    }

    // Hitung jumlah penulis
    public function countAuthors()
    {
        return $this->db->table('tblauthors')->countAllResults();
    }

    // Hitung jumlah kategori
    public function countCategories()
    {
        return $this->db->table('tblcategory')->countAllResults();
    }
}
