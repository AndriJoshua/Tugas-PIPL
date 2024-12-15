<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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
                    <h4 class="header-line">Dashboard Admin</h4>
                </div>
            </div>

            <div class="row">
                <a href="<?= base_url('manage-books') ?>">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-book fa-5x"></i>
                            <h3><?= $booksCount ?></h3>
                            Daftar Buku
                        </div>
                    </div>
                </a>

                <a href="<?= base_url('manage_issued_books') ?>">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="alert alert-warning back-widget-set text-center">
                            <i class="fa fa-recycle fa-5x"></i>
                            <h3><?= $notReturnedBooksCount ?></h3>
                            Buku yang belum dikembalikan
                        </div>
                    </div>
                </a>

                <a href="<?= base_url('reg-students') ?>">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="alert alert-danger back-widget-set text-center">
                            <i class="fa fa-users fa-5x"></i>
                            <h3><?= $usersCount ?></h3>
                            Pengguna terdaftar
                        </div>
                    </div>
                </a>

                <a href="<?= base_url('manage-authors') ?>">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-user fa-5x"></i>
                            <h3><?= $authorsCount ?></h3>
                            Daftar Penulis
                        </div>
                    </div>
                </a>
            </div>

            <div class="row">
                <a href="<?= base_url('manage-categories') ?>">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-file-archive-o fa-5x"></i>
                            <h3><?= $categoriesCount ?></h3>
                            Kategori Terdaftar
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <?= view('includes/footer') ?>
    <script src="<?= base_url('js/jquery-1.10.2.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.js') ?>"></script>
</body>

</html>
