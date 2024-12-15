<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Issued Books</title>
    <link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
</head>

<body>
    <?= view('includes/header') ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Manage Issued Books</h4>
                </div>
            </div>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('delmsg')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('delmsg') ?></div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Student Name</th>
                                <th>Book Name</th>
                                <th>ISBN</th>
                                <th>Issued Date</th>
                                <th>Return Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $cnt = 1; foreach ($issuedBooks as $book): ?>
                                <tr>
                                    <td><?= $cnt++ ?></td>
                                    <td><?= htmlentities($book['FullName']) ?></td>
                                    <td><?= htmlentities($book['BookName']) ?></td>
                                    <td><?= htmlentities($book['ISBNNumber']) ?></td>
                                    <td><?= htmlentities($book['IssuesDate']) ?></td>
                                    <td>
                                        <?= empty($book['ReturnDate']) ? '<span class="text-danger">Not Returned Yet</span>' : htmlentities($book['ReturnDate']) ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('/update-issued-bookdetails/' . $book['rid']) ?>" class="btn btn-primary">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?= view('includes/footer') ?>
</body>

</html>
