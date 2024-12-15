<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\UserModel;
use CodeIgniter\Controller;
use App\Models\IssuedBookModel;

class IssueBookController extends Controller
{
    public function index()
    {
        return view('issue-book');
    }

    public function getStudentDetails()
    {
        $studentid = $this->request->getPost('studentid');
        $userModel = new UserModel();
        $student = $userModel->getUserDetails($studentid);

        if ($student) {
            if ($student->Status == 0) {
                echo "<span style='color:red'>Student ID Blocked</span><br />";
                echo "<b>Student Name: </b>" . $student->FullName;
                echo "<script>$('#submit').prop('disabled', true);</script>";
            } else {
                echo $student->FullName . "<br>" . $student->EmailId . "<br>" . $student->MobileNumber;
                echo "<script>$('#submit').prop('disabled', false);</script>";
            }
        } else {
            echo "<span style='color:red'>Invalid Student ID</span>";
            echo "<script>$('#submit').prop('disabled', true);</script>";
        }
    }

    public function getBookDetails()
    {
        $bookid = $this->request->getPost('bookid');
        $bookModel = new BookModel();

        if (!empty($bookid)) {
            $results = $bookModel->getBookDetails($bookid);

            if (!empty($results)) {
                $output = '<table border="1"><tr>';
                foreach ($results as $result) {
                    $output .= '<th style="padding-left:5%; width: 10%;">';
                    $output .= '<img src="' . base_url('bookimg/' . $result->bookImage) . '" width="120"><br />';
                    $output .= htmlentities($result->BookName) . '<br />';
                    $output .= htmlentities($result->AuthorName) . '<br />';

                    if ($result->isIssued == 1) {
                        $output .= '<p style="color:red;">Book Already Issued</p>';
                    } else {
                        $output .= '<input type="radio" name="bookid" value="' . htmlentities($result->id) . '" required>';
                    }
                    $output .= '</th>';
                }
                $output .= '</tr></table>';
                echo $output;
                echo "<script>$('#submit').prop('disabled', false);</script>";
            } else {
                echo "<p>Record not found. Please try again.</p>";
                echo "<script>$('#submit').prop('disabled', true);</script>";
            }
        } else {
            echo "<p>Book ID cannot be empty.</p>";
            echo "<script>$('#submit').prop('disabled', true);</script>";
        }
    }

    public function issueBook()
    {
        $studentid = strtoupper($this->request->getPost('studentid'));
        $bookid = $this->request->getPost('bookid');

        $bookModel = new BookModel();
        if ($bookModel->issueBook($studentid, $bookid)) {
            return redirect()->to('/manage-issued-books')->with('msg', 'Book issued successfully');
        } else {
            return redirect()->to('/manage-issued-books')->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function viewDetails($rid)
    {
        $model = new IssuedBookModel();

        // Mengambil data issued book berdasarkan ID
        $data['issuedBook'] = $model->getIssuedBookDetails($rid);

        if (!$data['issuedBook']) {
            return redirect()->to('/manage-issued-books')->with('error', 'Issued book not found.');
        }

        return view('update-issue-bookdetails', $data);
    }

    public function returnBook($rid)
    {
        $model = new IssuedBookModel();

        $fine = $this->request->getPost('fine');
        $bookid = $this->request->getPost('bookid');

        if ($model->returnBook($rid, $fine, $bookid)) {
            return redirect()->to('/manage-issued-books')->with('msg', 'Book returned successfully.');
        }

        return redirect()->to('/manage-issued-books')->with('error', 'Failed to return book.');
    }
}
