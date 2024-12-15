<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password</title>
    <link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
    <script>
        function valid() {
            const newPassword = document.chngpwd.newpassword.value;
            const confirmPassword = document.chngpwd.confirmpassword.value;
            if (newPassword !== confirmPassword) {
                alert("Password baru dan konfirmasi password tidak cocok!");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <?= view('includes/header') ?>

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Ubah Password</h4>
                </div>
            </div>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Ubah Password
                        </div>
                        <div class="panel-body">
                            <form action="/updatepw" method="post" onsubmit="return valid();">

                                <div class="form-group">
                                    <label>Password Saat Ini</label>
                                    <input class="form-control" type="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input class="form-control" type="password" name="newpassword" required>
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password Baru</label>
                                    <input class="form-control" type="password" name="confirmpassword" required>
                                </div>
                                <button type="submit" class="btn btn-info">Ubah Password</button>
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