<?php

namespace App\Controllers;

use App\Models\AuthorModel;

class AuthorController extends BaseController
{
    public function add()
    {
        return view('add-author'); // Menampilkan form tambah author
    }

    public function create()
    {
        $authorName = $this->request->getPost('author');

        if (empty($authorName)) {
            return redirect()->back()->with('error', 'Author name cannot be empty.');
        }

        $authorModel = new AuthorModel();

        $data = [
            'AuthorName' => $authorName,
        ];

        if ($authorModel->insert($data)) {
            return redirect()->to('/manage-authors')->with('success', 'Author added successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add author. Please try again.');
        }
    }

    
}
