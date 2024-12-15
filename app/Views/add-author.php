<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Author</title>
    <link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
</head>

<body>
    <?= view('includes/header_admin') ?>

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Tambahkan Penulis</h4>
                </div>
            </div>

            <!-- Tampilkan Pesan -->
            <div class="row">
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="col-md-12">
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">Info Author</div>
                        <div class="panel-body">
                            <form role="form" method="post" action="<?= base_url('/author/create') ?>">
                                <div class="form-group">
                                    <label>Nama Author</label>
                                    <input class="form-control" type="text" name="author" autocomplete="off" required />
                                </div>

                                <button type="submit" class="btn btn-info">Tambahkan</button>
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
</body>

</html>
