<?php

namespace App\Controllers;

use App\Models\IssuedBookDetailsModel;
use App\Models\BookModel;

class IssuedBookDetailsController extends BaseController
{
    public function view($id)
    {
        $model = new IssuedBookDetailsModel();
        $details = $model->getIssuedBookDetails($id);

        if (!$details) {
            return redirect()->to('/manage-issued-books')->with('error', 'Book details not found.');
        }

        return view('/update-issued-bookdetails', ['details' => $details]);
    }

    public function update($id)
    {
        if ($this->request->getMethod() === 'post') {
            $fine = $this->request->getPost('fine');
            $bookId = $this->request->getPost('bookid');

            $data = [
                'fine' => $fine,
                'RetrunStatus' => 1,
                'ReturnDate' => date('Y-m-d H:i:s'),
            ];

            $model = new IssuedBookDetailsModel();
            $bookModel = new BookModel();

            if ($model->updateReturnDetails($id, $data)) {
                // Update the book's issued status
                $bookModel->update($bookId, ['isIssued' => 0]);

                return redirect()->to('/manage-issued-books')->with('msg', 'Book returned successfully.');
            } else {
                return redirect()->to('/update-issue-bookdetails/' . $id)->with('error', 'Failed to update book return.');
            }
        }
    }
}
