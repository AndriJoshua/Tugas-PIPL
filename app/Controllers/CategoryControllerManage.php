<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryControllerManage extends BaseController
{
    public function index()
    {
        $categoryModel = new CategoryModel();

        // Ambil semua data kategori
        $data['categories'] = $categoryModel->findAll();

        // Ambil pesan sukses dan error dari session
        $data['successMessage'] = session()->getFlashdata('success');
        $data['errorMessage'] = session()->getFlashdata('error');

        return view('manage-categories', $data);
    }

    public function add()
    {
        return view('add-category');
    }

    public function create()
    {
        $categoryName = $this->request->getPost('category');
        $status = $this->request->getPost('status');

        if (empty($categoryName)) {
            session()->setFlashdata('error', 'Category name cannot be empty.');
            return redirect()->back();
        }

        $categoryModel = new CategoryModel();
        $data = [
            'CategoryName' => $categoryName,
            'Status' => $status,
        ];

        if ($categoryModel->save($data)) {
            session()->setFlashdata('success', 'Category added successfully.');
        } else {
            session()->setFlashdata('error', 'Failed to add category.');
        }

        return redirect()->to('/manage-categories');
    }

    public function edit($id)
    {
        $categoryModel = new CategoryModel();
        $category = $categoryModel->find($id);

        if (!$category) {
            session()->setFlashdata('error', 'Category not found.');
            return redirect()->to('/manage-categories');
        }

        return view('edit-category', ['category' => $category]);
    }

    public function update($id)
    {
        $categoryName = $this->request->getPost('category');
        $status = $this->request->getPost('status');

        if (empty($categoryName)) {
            session()->setFlashdata('error', 'Category name cannot be empty.');
            return redirect()->back();
        }

        $categoryModel = new CategoryModel();
        $data = [
            'CategoryName' => $categoryName,
            'Status' => $status,
        ];

        if ($categoryModel->update($id, $data)) {
            session()->setFlashdata('success', 'Category updated successfully.');
        } else {
            session()->setFlashdata('error', 'Failed to update category.');
        }

        return redirect()->to('/manage-categories');
    }

    public function delete($id)
    {
        $categoryModel = new CategoryModel();

        if ($categoryModel->delete($id)) {
            session()->setFlashdata('success', 'Category deleted successfully.');
        } else {
            session()->setFlashdata('error', 'Failed to delete category.');
        }

        return redirect()->to('/manage-categories');
    }
}
