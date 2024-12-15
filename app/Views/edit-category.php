<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
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
                    <h4 class="header-line">Edit Category</h4>
                </div>
            </div>

            <!-- Display Messages -->
            <div class="row">
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="col-md-12">
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">Category Info</div>
                        <div class="panel-body">
                            <form role="form" method="post" action="<?= base_url('/category/update/' . $category['id']) ?>">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input class="form-control" type="text" name="category" value="<?= htmlentities($category['CategoryName']) ?>" required />
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" value="1" <?= $category['Status'] == 1 ? 'checked' : '' ?>> Active
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" value="0" <?= $category['Status'] == 0 ? 'checked' : '' ?>> Inactive
                                        </label>
                                    </div>
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
