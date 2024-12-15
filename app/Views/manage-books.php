<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Books</title>
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
                    <h4 class="header-line">Manage Books</h4>
                </div>
            </div>

            <?php if (session()->getFlashdata('delmsg')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('delmsg') ?>
                </div>
            <?php elseif (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <div class="panel panel-default">
                <div class="panel-heading">Books Listing</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Book Name</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>ISBN</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cnt = 1; ?>
                                <?php foreach ($books as $book) : ?>
                                    <tr>
                                        <td><?= $cnt ?></td>
                                        <td>
                                            <img src="<?= base_url('bookimg/' . $book['bookImage']) ?>" width="100">
                                            <br><b><?= htmlentities($book['BookName']) ?></b>
                                        </td>
                                        <td><?= htmlentities($book['CategoryName']) ?></td>
                                        <td><?= htmlentities($book['AuthorName']) ?></td>
                                        <td><?= htmlentities($book['ISBNNumber']) ?></td>
                                        <td><?= htmlentities($book['BookPrice']) ?></td>
                                        <td>
                                            <a href="<?= base_url('edit-book/' . $book['id']) ?>" class="btn btn-primary">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a href="<?= base_url('delete-book/' . $book['id']) ?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger">
                                                <i class="fa fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $cnt++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= view('includes/footer') ?>
    <script src="<?= base_url('js/jquery-1.10.2.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.js') ?>"></script>
</body>

</html>
