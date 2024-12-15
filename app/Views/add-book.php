<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    <link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
</head>

<body>
    <?= view('includes/header_admin') ?>

    <div class="container">
        <h3>Tambahkan Buku</h3>
        <?= session()->getFlashdata('error') ? '<div class="alert alert-danger">' . session()->getFlashdata('error') . '</div>' : '' ?>
        <?= session()->getFlashdata('success') ? '<div class="alert alert-success">' . session()->getFlashdata('success') . '</div>' : '' ?>

        <form action="<?= base_url('/book/save') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="bookname">Nama Buku</label>
                <input type="text" name="bookname" id="bookname" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="category">Kategori</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['id'] ?>"><?= $category['CategoryName'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <select name="author" id="author" class="form-control" required>
                    <option value="">Select Author</option>
                    <?php foreach ($authors as $author) : ?>
                        <option value="<?= $author['id'] ?>"><?= $author['AuthorName'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="isbn">no ISBN</label>
                <input type="text" name="isbn" id="isbn" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="price">Harga</label>
                <input type="text" name="price" id="price" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="bookpic">Gambar Buku</label>
                <input type="file" name="bookpic" id="bookpic" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>
    </div>
    
    <?= view('includes/footer') ?>
    <script src="<?= base_url('js/jquery-1.10.2.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('/js/custom.js') ?>"></script>

</body>

</html>
