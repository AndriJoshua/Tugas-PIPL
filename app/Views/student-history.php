<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student History</title>
    <link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?= base_url('js/dataTables/dataTables.bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
</head>

<body>
    <?= view('includes/header_admin') ?>

    <div class="container mt-4">
        <h4 class="header-line">#<?= $studentId ?> Book Issued History</h4>

        <div class="card">
            <div class="card-header bg-primary text-white">
                <?= $studentId ?> Details
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Issued Book</th>
                                <th>Issued Date</th>
                                <th>Returned Date</th>
                                <th>Fine (if any)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($studentHistory)) : ?>
                                <?php $cnt = 1; ?>
                                <?php foreach ($studentHistory as $history) : ?>
                                    <tr>
                                        <td><?= $cnt++ ?></td>
                                        <td><?= htmlentities($history->StudentId) ?></td>
                                        <td><?= htmlentities($history->FullName) ?></td>
                                        <td><?= htmlentities($history->BookName) ?></td>
                                        <td><?= htmlentities($history->IssuesDate) ?></td>
                                        <td>
                                            <?= $history->ReturnDate ? htmlentities($history->ReturnDate) : 'Not returned yet' ?>
                                        </td>
                                        <td>
                                            <?= $history->fine ? htmlentities($history->fine) : 'N/A' ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="7" class="text-center">No history found for this student.</td>
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
