<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Perpustakaan Online | Dashboard user</title>
    <link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <?= view('includes/header') ?>

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Dashboard User</h4>
                </div>
            </div>

            <div class="row">
                <a href="<?= base_url('listed-books') ?>">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-book fa-5x"></i>
                            <h3><?= htmlentities($listdbooks) ?></h3>
                            Daftar Buku
                        </div>
                    </div>
                </a>

                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="alert alert-warning back-widget-set text-center">
                        <i class="fa fa-recycle fa-5x"></i>
                        <h3><?= htmlentities($returnedbooks) ?></h3>
                        Buku Yang Belum Dikembalikan
                    </div>
                </div>

                <a href="<?= base_url('issued-books') ?>">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="alert alert-success back-widget-set text-center">
                            <i class="bi bi-book-half fa-5x"></i>
                            <h3>&nbsp;</h3>
                            Buku Yang Dipinjam
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <?= view('includes/footer') ?>

    <script src="<?= base_url('js/jquery-1.10.2.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('js/custom.js') ?>"></script>
</body>

</html>
