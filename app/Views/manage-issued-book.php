<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Issued Books</title>
    <link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?= base_url('js/dataTables/dataTables.bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
</head>

<body>
    <?= view('includes/header_admin') ?>

    <div class="container mt-4">
        <h4 class="header-line">Atur Peminjaman Buku</h4>

        <!-- Flash Messages -->
        <div class="row">
            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger col-md-12">
                    <strong>Error:</strong> <?= $error ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($msg)) : ?>
                <div class="alert alert-success col-md-12">
                    <strong>Success:</strong> <?= $msg ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($delmsg)) : ?>
                <div class="alert alert-success col-md-12">
                    <strong>Success:</strong> <?= $delmsg ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Issued Books Table -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                Buku Yang Dipinjam
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Mahasiswa</th>
                                <th>Nama Buku</th>
                                <th>ISBN</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($issuedBooks)) : ?>
                                <?php $cnt = 1; ?>
                                <?php foreach ($issuedBooks as $book) : ?>
                                    <tr>
                                        <td><?= $cnt++ ?></td>
                                        <td><?= htmlentities($book->FullName) ?></td>
                                        <td><?= htmlentities($book->BookName) ?></td>
                                        <td><?= htmlentities($book->ISBNNumber) ?></td>
                                        <td><?= htmlentities($book->IssuesDate) ?></td>
                                        <td>
                                            <?= $book->ReturnDate ? htmlentities($book->ReturnDate) : 'Belum Dikembalikan' ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('update-issue-book-details/' . $book->rid) ?>" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="7" class="text-center">Tidak Ditemukan.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?= view('includes/footer') ?>

    <script src="<?= base_url('js/jquery-1.10.2.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('js/dataTables/jquery.dataTables.js') ?>"></script>
    <script src="<?= base_url('js/dataTables/dataTables.bootstrap.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable();
        });
    </script>
</body>

</html>
