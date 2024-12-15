<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Authors</title>
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
                    <h4 class="header-line">Manage Authors</h4>
                </div>
            </div>

            <!-- Flash messages -->
            <?php if (!empty($successMessage)) : ?>
                <div class="alert alert-success">
                    <strong>Success:</strong> <?= $successMessage ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($errorMessage)) : ?>
                <div class="alert alert-danger">
                    <strong>Error:</strong> <?= $errorMessage ?>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Authors Listing
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Author</th>
                                            <th>tanggal Dibuat</th>
                                            <th>Tanggal Diupdate</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($authors)) : ?>
                                            <?php $cnt = 1; ?>
                                            <?php foreach ($authors as $author) : ?>
                                                <tr>
                                                    <td><?= $cnt++ ?></td>
                                                    <td><?= htmlentities($author['AuthorName']) ?></td>
                                                    <td><?= htmlentities($author['creationDate']) ?></td>
                                                    <td><?= htmlentities($author['UpdationDate']) ?></td>
                                                    <td>
                                                        <a href="<?= base_url('author/edit-author/' . $author['id']) ?>" class="btn btn-primary">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                        <a href="<?= base_url('author/delete/' . $author['id']) ?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger">
                                                            <i class="fa fa-trash"></i> Hapus
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="5" class="text-center">No authors found.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
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
