<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Author</title>
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
                    <h4 class="header-line">Edit Author</h4>
                </div>
            </div>

            <!-- Flash messages -->
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger">
                    <strong>Error:</strong> <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <strong>Success:</strong> <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Author Info
                        </div>
                        <div class="panel-body">
                            <form method="post" action="<?= base_url('author/update/' . $author['id']) ?>">
                                <div class="form-group">
                                    <label>Author Name</label>
                                    <input class="form-control" type="text" name="author" value="<?= htmlentities($author['AuthorName']) ?>" required />
                                </div>

                                <button type="submit" class="btn btn-info">Update</button>
                            </form>
                        </div>
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
