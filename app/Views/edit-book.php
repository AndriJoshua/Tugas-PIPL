<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit-buku</title>
    <link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
</head>

<body>
    <?= view('includes/header_admin') ?>

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Edit Book</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                    <?php endif; ?>

                    <form method="post" action="<?= base_url('book/update/' . $book['id']) ?>">
                        <div class="panel panel-info">
                            <div class="panel-heading">Book Info</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Book Image</label><br>
                                            <img src="<?= base_url('bookimg/' . $book['bookImage']) ?>" alt="Book Image" width="100">
                                            <br>
                                            <a href="<?= base_url('book/change-image/' . $book['id']) ?>" class="btn btn-info btn-sm mt-2">Change Book Image</a>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Book Name<span style="color:red;">*</span></label>
                                            <input class="form-control" type="text" name="bookname" value="<?= $book['BookName'] ?>" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category<span style="color:red;">*</span></label>
                                            <select class="form-control" name="category" required>
                                                <?php foreach ($categories as $category) : ?>
                                                    <option value="<?= $category['id'] ?>" <?= $category['id'] == $book['CatId'] ? 'selected' : '' ?>>
                                                        <?= $category['CategoryName'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Author<span style="color:red;">*</span></label>
                                            <select class="form-control" name="author" required>
                                                <?php foreach ($authors as $author) : ?>
                                                    <option value="<?= $author['id'] ?>" <?= $author['id'] == $book['AuthorId'] ? 'selected' : '' ?>>
                                                        <?= $author['AuthorName'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ISBN Number</label>
                                            <input class="form-control" type="text" value="<?= $book['ISBNNumber'] ?>" readonly />
                                            <p class="help-block">An ISBN is an International Standard Book Number and must be unique.</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price<span style="color:red;">*</span></label>
                                            <input class="form-control" type="number" name="price" value="<?= $book['BookPrice'] ?>" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="<?= base_url('/manage-books') ?>" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <?= view('includes/footer') ?>
    <script src="<?= base_url('js/jquery-1.10.2.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.js') ?>"></script>
</body>

</html>