<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Perpustakaan Online | Buku Dipinjam</title>
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
                    <h4 class="header-line">Manajemen Buku yang Dipinjam</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Buku yang Dipinjam
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Buku</th>
                                            <th>ISBN</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Denda</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($issuedBooks)) : ?>
                                            <?php $cnt = 1; ?>
                                            <?php foreach ($issuedBooks as $book) : ?>
                                                <tr class="odd gradeX">
                                                    <td class="center"><?= $cnt ?></td>
                                                    <td class="center"><?= htmlentities($book->BookName) ?></td>
                                                    <td class="center"><?= htmlentities($book->ISBNNumber) ?></td>
                                                    <td class="center"><?= htmlentities($book->IssuesDate) ?></td>
                                                    <td class="center">
                                                        <?php if (empty($book->ReturnDate)) : ?>
                                                            <span style="color:red">Belum Dikembalikan</span>
                                                        <?php else : ?>
                                                            <?= htmlentities($book->ReturnDate) ?>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="center"><?= htmlentities($book->fine) ?></td>
                                                </tr>
                                                <?php $cnt++; ?>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="6" class="text-center">Tidak ada data buku yang dipinjam.</td>
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
