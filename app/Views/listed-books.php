<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Perpustakaan Online | Daftar Buku</title>
    <link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?= base_url('js/dataTables/dataTables.bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
</head>

<body>
    <?= view('includes/header') ?>

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Daftar Buku</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Buku
                        </div>
                        <div class="panel-body">
                            <?php if (!empty($books)) : ?>
                                <?php foreach ($books as $book) : ?>
                                    <div class="col-md-4" style="float:left; height:300px;">
                                        <img src="<?= base_url('bookimg/' . $book->bookImage) ?>" width="100">
                                        <br /><b><?= htmlentities($book->BookName) ?></b><br />
                                        <?= htmlentities($book->CategoryName) ?><br />
                                        <?= htmlentities($book->AuthorName) ?><br />
                                        <?= htmlentities($book->ISBNNumber) ?><br />
                                        <?php if ($book->isIssued == '1') : ?>
                                            <p style="color:red;">Buku Sedang Dipinjam</p>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>Tidak ada data buku.</p>
                            <?php endif; ?>
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
