<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Issued Book Details</title>
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
                    <h4 class="header-line">Update Issued Book Details</h4>
                </div>
            </div>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
            <?php endif; ?>

            <form method="post" action="<?= base_url('/update-issue-book/' . $details['rid']) ?>">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Student Details</h4>
                        <p><strong>Student ID:</strong> <?= htmlentities($details['StudentId']) ?></p>
                        <p><strong>Name:</strong> <?= htmlentities($details['FullName']) ?></p>
                        <p><strong>Email:</strong> <?= htmlentities($details['EmailId']) ?></p>
                        <p><strong>Contact:</strong> <?= htmlentities($details['MobileNumber']) ?></p>
                    </div>

                    <div class="col-md-6">
                        <h4>Book Details</h4>
                        <img src="<?= base_url('bookimg/' . $details['bookImage']) ?>" width="100" alt="Book Image">
                        <p><strong>Book Name:</strong> <?= htmlentities($details['BookName']) ?></p>
                        <p><strong>ISBN:</strong> <?= htmlentities($details['ISBNNumber']) ?></p>
                        <p><strong>Issued Date:</strong> <?= htmlentities($details['IssuesDate']) ?></p>
                        <p><strong>Return Date:</strong>
                            <?= empty($details['ReturnDate']) ? 'Not Returned Yet' : htmlentities($details['ReturnDate']) ?>
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label>Fine (in USD):</label>
                    <input type="text" class="form-control" name="fine" value="<?= htmlentities($details['fine']) ?>" required>
                </div>

                <input type="hidden" name="bookid" value="<?= $details['bookid'] ?>">

                <button type="submit" class="btn btn-primary">Return Book</button>
            </form>
        </div>
    </div>

    <?= view('includes/footer') ?>
    <script src="<?= base_url('js/jquery-1.10.2.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.js') ?>"></script>
</body>

</html>
