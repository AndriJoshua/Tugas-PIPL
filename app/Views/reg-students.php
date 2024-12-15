<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur MahaSiswa Terdaftar</title>
    <link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?= base_url('js/dataTables/dataTables.bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
</head>

<body>
    <?= view('includes/header_admin') ?>

    <div class="container mt-4">
        <h4 class="header-line">Atur Masiswa terdaftar</h4>

        <!-- Flash Messages -->
        <div class="row">
            <?php if (!empty($msg)) : ?>
                <div class="alert alert-success col-md-12">
                    <strong>Success:</strong> <?= $msg ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger col-md-12">
                    <strong>Error:</strong> <?= $error ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Students Table -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                Registered Students
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Student ID</th>
                                <th>Nama Student</th>
                                <th>Email</th>
                                <th>Nomor Telepon</th>
                                <th>Tanggal Bergabung</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($students)) : ?>
                                <?php $cnt = 1; ?>
                                <?php foreach ($students as $student) : ?>
                                    <tr>
                                        <td><?= $cnt++ ?></td>
                                        <td><?= htmlentities($student['StudentId']) ?></td>
                                        <td><?= htmlentities($student['FullName']) ?></td>
                                        <td><?= htmlentities($student['EmailId']) ?></td>
                                        <td><?= htmlentities($student['MobileNumber']) ?></td>
                                        <td><?= htmlentities($student['RegDate']) ?></td>
                                        <td>
                                            <?= $student['Status'] == 1 ? 'Active' : 'Blocked' ?>
                                        </td>
                                        <td>
                                            <?php if ($student['Status'] == 1) : ?>
                                                <a href="<?= base_url('student/block/' . $student['StudentId']) ?>" onclick="return confirm('Are you sure you want to block this student?');" class="btn btn-danger btn-sm">Block</a>
                                            <?php else : ?>
                                                <a href="<?= base_url('student/activate/' . $student['StudentId']) ?>" onclick="return confirm('Are you sure you want to activate this student?');" class="btn btn-primary btn-sm">Activate</a>
                                            <?php endif; ?>
                                            <a href="<?= base_url('student/history/' . $student['StudentId']) ?>" class="btn btn-success btn-sm">Details</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="8" class="text-center">Tidak Ditemukan</td>
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