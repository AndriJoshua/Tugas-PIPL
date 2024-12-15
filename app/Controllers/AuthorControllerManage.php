<?php

namespace App\Controllers;

use App\Models\AuthorModel;

class AuthorControllerManage extends BaseController
{
    public function index()
    {
        $authorModel = new AuthorModel();

        $data['authors'] = $authorModel->getAuthors(); // Ambil data author
        $data['successMessage'] = session()->getFlashdata('success');
        $data['errorMessage'] = session()->getFlashdata('error');

        return view('manage-authors', $data);
    }

    public function delete($id)
    {
        $authorModel = new AuthorModel();

        if ($authorModel->deleteAuthor($id)) {
            session()->setFlashdata('success', 'Author deleted successfully');
        } else {
            session()->setFlashdata('error', 'Failed to delete author');
        }

        return redirect()->to('/manage-authors');
    }
    public function edit($id)
    {
        $authorModel = new AuthorModel();
        $author = $authorModel->getAuthorById($id);

        if (!$author) {
            return redirect()->to('/manage-authors')->with('error', 'Author not found.');
        }

        $data['author'] = $author;
        return view('edit-author', $data);
    }

    public function update($id)
    {
        $authorModel = new AuthorModel();

        $data = [
            'AuthorName' => $this->request->getPost('author'),
            'UpdationDate' => date('Y-m-d H:i:s'),
        ];

        if ($authorModel->updateAuthor($id, $data)) {
            return redirect()->to('/manage-authors')->with('success', 'Author updated successfully.');
        } else {
            return redirect()->to('/edit-author/' . $id)->with('error', 'Failed to update author.');
        }
    }
}
