<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issued Book Details</title>
    <link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
</head>

<body>
    <?= view('includes/header_admin') ?>

    <div class="container mt-4">
        <h4 class="header-line">Issued Book Details</h4>
        <div class="card">
            <div class="card-header bg-primary text-white">
                Issued Book Details
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('issue-book/return/' . $issuedBook->rid) ?>">
                    <input type="hidden" name="bookid" value="<?= $issuedBook->bid ?>">

                    <h4>Student Details</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Student ID:</strong> <?= $issuedBook->StudentId ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Student Name:</strong> <?= $issuedBook->FullName ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Email:</strong> <?= $issuedBook->EmailId ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Contact:</strong> <?= $issuedBook->MobileNumber ?></p>
                        </div>
                    </div>

                    <h4>Book Details</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Book Image:</strong></p>
                            <img src="<?= base_url('bookimg/' . $issuedBook->bookImage) ?>" width="120">
                        </div>
                        <div class="col-md-6">
                            <p><strong>Book Name:</strong> <?= $issuedBook->BookName ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>ISBN:</strong> <?= $issuedBook->ISBNNumber ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Issued Date:</strong> <?= $issuedBook->IssuesDate ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Returned Date:</strong>
                                <?= $issuedBook->ReturnDate ? $issuedBook->ReturnDate : 'Not Returned Yet' ?>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Fine:</strong>
                                <?php if (!$issuedBook->fine) : ?>
                                    <input type="text" name="fine" class="form-control" required>
                                <?php else : ?>
                                    <?= $issuedBook->fine ?>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>

                    <?php if ($issuedBook->RetrunStatus == 0) : ?>
                        <button type="submit" class="btn btn-success">Return Book</button>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <?= view('includes/footer') ?>
    <script src="<?= base_url('js/jquery-1.10.2.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.js') ?>"></script>
</body>

</html>
