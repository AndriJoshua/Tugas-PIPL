<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public function index()
    {
        return view('add-category'); // Menampilkan form tambah kategori
    }

    public function create()
    {
        $categoryName = $this->request->getPost('category');
        $status = $this->request->getPost('status');

        if (empty($categoryName)) {
            return redirect()->back()->with('error', 'Category name cannot be empty.');
        }

        $categoryModel = new CategoryModel();

        $data = [
            'CategoryName' => $categoryName,
            'Status' => $status,
        ];

        if ($categoryModel->insert($data)) {
            return redirect()->to('/manage-categories')->with('success', 'Category added successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add category. Please try again.');
        }
    }
}
