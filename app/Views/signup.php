<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Perpustakaan Online | Signup</title>
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
                    <h4 class="header-line">User Signup</h4>
                </div>
            </div>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-9 col-md-offset-1">
                    <div class="panel panel-danger">
                        <div class="panel-heading">SIGNUP FORM</div>
                        <div class="panel-body">
                            <form method="post" action="/register">
                                <div class="form-group">
                                    <label>Masukan Nama Lengkap</label>
                                    <input class="form-control" type="text" name="fullanme" value="<?= old('fullanme') ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Nomor HP</label>
                                    <input class="form-control" type="text" name="mobileno" value="<?= old('mobileno') ?>" maxlength="15" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email" value="<?= old('email') ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input class="form-control" type="password" name="confirmpassword" required>
                                </div>
                                <button type="submit" class="btn btn-danger">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= view('includes/footer') ?>
</body>

</html>
