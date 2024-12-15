<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Perpustakaan Online | Profile</title>
    <link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
</head>

<body>
    <?= view('includes/header') ?>

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">My Profile</h4>
                </div>
            </div>

            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-9 col-md-offset-1">
                    <div class="panel panel-danger">
                        <div class="panel-heading">My Profile</div>
                        <div class="panel-body">
                            <form action="/update" method="post">
                                <div class="form-group">
                                    <label>Student ID:</label>
                                    <p><?= htmlentities($profile['StudentId']) ?></p>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Register:</label>
                                    <p><?= htmlentities($profile['RegDate']) ?></p>
                                </div>
                                <?php if (!empty($profile['UpdationDate'])) : ?>
                                    <div class="form-group">
                                        <label>Terakhir Diubah:</label>
                                        <p><?= htmlentities($profile['UpdationDate']) ?></p>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <label>Status:</label>
                                    <p>
                                        <?php if ($profile['Status'] == 1) : ?>
                                            <span style="color: green;">Active</span>
                                        <?php else : ?>
                                            <span style="color: red;">Blocked</span>
                                        <?php endif; ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>Masukan Nama Lengkap:</label>
                                    <input class="form-control" type="text" name="fullanme" value="<?= htmlentities($profile['FullName']) ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Nomor HP:</label>
                                    <input class="form-control" type="text" name="mobileno" value="<?= htmlentities($profile['MobileNumber']) ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input class="form-control" type="email" value="<?= htmlentities($profile['EmailId']) ?>" readonly>
                                </div>
                                <button type="submit" class="btn btn-primary">Perbarui</button>
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
    <script src="<?= base_url('js/custom.js') ?>"></script>
</body>

</html>
