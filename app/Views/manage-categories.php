<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Kategori</title>
    <link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/dataTables.bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
</head>

<body>
    <?= view('includes/header_admin') ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Atur Kategori</h4>
                </div>
            </div>

            <!-- Tampilkan Pesan Sukses atau Error -->
            <div class="row">
                <?php if (!empty($successMessage)) : ?>
                    <div class="col-md-12">
                        <div class="alert alert-success">
                            <strong>Success: </strong><?= $successMessage ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($errorMessage)) : ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <strong>Error: </strong><?= $errorMessage ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Tabel Kategori -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Kategori Listing</div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kategori</th>
                                            <th>Status</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Tanggal Diperbarui</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($categories)) : ?>
                                            <?php $cnt = 1; ?>
                                            <?php foreach ($categories as $category) : ?>
                                                <tr>
                                                    <td><?= $cnt++ ?></td>
                                                    <td><?= esc($category['CategoryName']) ?></td>
                                                    <td>
                                                        <?php if ($category['Status'] == 1) : ?>
                                                            <span class="btn btn-success btn-xs">Active</span>
                                                        <?php else : ?>
                                                            <span class="btn btn-danger btn-xs">Inactive</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?= esc($category['CreationDate']) ?></td>
                                                    <td><?= esc($category['UpdationDate']) ?></td>
                                                    <td>
                                                        <a href="<?= base_url('edit-category/' . $category['id']) ?>" class="btn btn-primary">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                        <a href="<?= base_url('delete-category/' . $category['id']) ?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="6" class="text-center">No categories found.</td>
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
    <script src="<?= base_url('js/dataTables/jquery.dataTables.js') ?>"></script>
    <script src="<?= base_url('js/dataTables/dataTables.bootstrap.js') ?>"></script>
    <script src="<?= base_url('js/custom.js') ?>"></script>
</body>

</html>
