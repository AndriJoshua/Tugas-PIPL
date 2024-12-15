<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'tblcategory';
    protected $primaryKey = 'id';
    protected $allowedFields = ['CategoryName', 'Status', 'CreationDate', 'UpdationDate'];

    public function getCategories($id)
    {
        return $this->where('id', $id)->first();
    }

    public function deleteCategory($id)
    {
        return $this->delete($id);
    }
}
