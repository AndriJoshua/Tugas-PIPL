<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Book Image</title>
    <link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
</head>

<body>
    <?= view('includes/header_admin') ?>

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Change Book Image</h4>
                </div>
            </div>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <form method="post" action="<?= base_url('book/update-image/' . $book['id']) ?>" enctype="multipart/form-data">
                <div class="panel panel-info">
                    <div class="panel-heading">Current Book Image</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="<?= base_url('bookimg/' . $book['bookImage']) ?>" alt="Book Image" width="150">
                            </div>
                            <div class="col-md-6">
                                <label>New Book Image</label>
                                <input type="file" name="bookImage" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">Update Image</button>
                                <a href="<?= base_url('/manage-books') ?>" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?= view('includes/footer') ?>
    <script src="<?= base_url('js/jquery-1.10.2.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.js') ?>"></script>
</body>

</html>
