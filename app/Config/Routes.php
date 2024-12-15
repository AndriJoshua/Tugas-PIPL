<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//halaman utama sekalian login
$routes->get('/', 'LoginController::index');
$routes->post('/login','LoginController::login');

//dashboard user
$routes->get('/dashboard','DashboardController::index');
$routes->get('/logout','AuthController::logout');

//register
$routes->get('/signup','SignupController::index');
$routes->post('/register','SignupController::register');

//buku terdaftar dan dipinjam
$routes->get('/listed-books','BookController::listedBooks');
$routes->get('/issued-books','IssuedBookController::index');

//edit profil
$routes->get('/profile', 'ProfileController::index');
$routes->post('/update','UpdateData::update');

//ubah password
$routes->get('/change-password', 'PasswordController::index');
$routes->post(' /updatepw', 'PassChangeController::update');

//login admin
$routes->get('/adminlogin', 'AdminController::index'); 
$routes->post('/adminlogin', 'AdminController::login'); 
$routes->get('/admin/logout', 'AdminController::logout'); 

//dashboard admin
$routes->get('/dashboard-admin', 'AdminDashboardController::index');

$routes->get('/manage-books', 'AdminBookController::manageBooks');
$routes->get('/delete-book/(:num)', 'AdminBookController::deleteBook/$1');

$routes->get('/manage_issued_books', 'IssuedBooksController::index');
$routes->get('/update_issued_book/(:num)', 'IssuedBooksController::update/$1');
$routes->get('/delete_issued_book/(:num)', 'IssuedBooksController::delete/$1');

$routes->get('/update-issued-bookdetails/(:num)', 'IssuedBookDetailsController::view/$1');
$routes->post('/update-issued-bookdetails/(:num)', 'IssuedBookDetailsController::update/$1');

$routes->get('/add-category', 'CategoryController::index');
$routes->post('/add-category', 'CategoryController::create');

$routes->get('/manage-categories', 'CategoryControllerManage::index');
$routes->get('/delete-category/(:num)', 'CategoryControllerManage::delete/$1');

$routes->get('/add-author', 'AuthorController::add'); // Menampilkan form
$routes->post('/author/create', 'AuthorController::create'); // Proses tambah author

$routes->get('/edit-category/(:num)', 'CategoryControllerManage::edit/$1'); // Menampilkan form edit kategori
$routes->post('/category/update/(:num)', 'CategoryControllerManage::update/$1'); // Memperbarui data kategori

// Manage Authors
$routes->get('/manage-authors', 'AuthorControllerManage::index');
$routes->get('/author/delete/(:num)', 'AuthorControllerManage::delete/$1');

// Edit and Update Author
$routes->get('/author/edit-author/(:num)', 'AuthorControllerManage::edit/$1');
$routes->post('/author/update/(:num)', 'AuthorControllerManage::update/$1');

$routes->get('/add-book', 'BookControllerAdmin::addBook');
$routes->post('/book/save', 'BookControllerAdmin::saveBook');

$routes->get('/edit-book/(:num)', 'BookControllerAdmin::editBook/$1');
$routes->post('/book/update/(:num)', 'BookControllerAdmin::updateBook/$1');

$routes->get('/issue-book', 'IssueBookController::index');
$routes->post('/issue-book/submit', 'IssueBookController::issueBook');

$routes->get('issue-book', 'IssueBookController::index');
$routes->post('issue-book/get-student', 'IssueBookController::getStudentDetails');
$routes->post('issue-book/get-book', 'IssueBookController::getBookDetails');
$routes->post('issue-book/issue', 'IssueBookController::issueBook');

$routes->get('/manage-issued-books', 'IssuedBooksController::index');

$routes->get('update-issue-book-details/(:num)', 'IssueBookController::viewDetails/$1');
$routes->post('issue-book/return/(:num)', 'IssueBookController::returnBook/$1');

//$routes->get('reg-students', 'StudentController::index');
//$routes->post('student/block/(:num)', 'StudentController::blockStudent/$1');
//$routes->post('student/activate/(:num)', 'StudentController::activateStudent/$1');
//$routes->get('student/history/(:any)', 'StudentHistoryController::index'); 

$routes->get('student/history/(:any)', 'StudentHistoryController::index/$1');


$routes->get('change-password-admin', 'AdminPasswordController::index');
$routes->post('admin-password/update', 'AdminPasswordController::update');

$routes->get('reg-students', 'StudentBlockController::index');
$routes->get('student/block/(:any)', 'StudentBlockController::blockStudent/$1');
$routes->get('student/activate/(:any)', 'StudentBlockController::activateStudent/$1');

$routes->get('book/change-image/(:num)', 'BookControllerAdmin::changeBookImage/$1');
$routes->post('book/update-image/(:num)', 'BookControllerAdmin::updateBookImage/$1');




