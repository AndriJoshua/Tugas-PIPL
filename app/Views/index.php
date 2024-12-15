<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Perpustakaan Online</title>
    <link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
</head>

<body>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <!-- Memuat Header -->
    <?= view('includes/header') ?>

    <div class="content-wrapper">
        <!--slider-->
        <div class="row">
            <div class="col-md-10 col-sm-8 col-xs-12 col-md-offset-1">
                <div id="carousel-example" class="carousel slide slide-bdr" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="<?= base_url('img2/perpus12Rombak.jpg') ?>" alt="" />
                        </div>
                        <div class="item">
                            <img src="<?= base_url('img2/perpus11Rombak.jpg') ?>" alt="" />
                        </div>
                        <div class="item">
                            <img src="<?= base_url('img2/perpus3Rombak.jpg') ?>" alt="" />
                        </div>
                    </div>
                    <!--INDICATORS-->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example" data-slide-to="1"></li>
                        <li data-target="#carousel-example" data-slide-to="2"></li>
                    </ol>
                    <!--PREVIUS-NEXT BUTTONS-->
                    <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
        <!--slider-->
        <hr />
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">USER LOGIN</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            LOGIN FORM
                        </div>
                        <div class="panel-body">
                            <form action="/login" method="post">
                                <div class="form-group">
                                    <label>Masukan Email Id</label>
                                    <input class="form-control" type="text" name="emailid" required />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="password" required />
                                </div>
                                <button type="submit" class="btn btn-info" style="background-color:#ec961b">LOGIN</button>
                                <a href="<?= base_url('signup') ?>">Belum Daftar? Daftar Disini</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Memuat Footer -->
    <?= view('includes/footer') ?>

    <script src="<?= base_url('js/jquery-1.10.2.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('js/custom.js') ?>"></script>
</body>

</html>