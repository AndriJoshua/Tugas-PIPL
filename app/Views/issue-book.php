<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue a New Book</title>
    <link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
    <style>
        .container {
            margin-top: 30px;
        }

        .form-container {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
            font-weight: bold;
        }

        label {
            font-weight: bold;
        }

        .btn {
            width: 100%;
        }

        .card {
            background-color: #ffffff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        footer {
            margin-top: 30px;
            text-align: center;
            color: #777;
        }
    </style>
</head>

<body>
    <?= view('includes/header_admin') ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-container">
                    <h3 class="form-header">Peminjaman Buku Baru</h3>
                    <form method="post" action="<?= base_url('issue-book/issue') ?>">
                        <div class="form-group">
                            <label for="studentid">ID Student:</label>
                            <input type="text" name="studentid" id="studentid" class="form-control" onblur="getStudentDetails()" placeholder="Masukan ID Student" required>
                            <div id="get_student_name" class="mt-2"></div>
                        </div>
                        <div class="form-group">
                            <label for="bookid">ID Buku:</label>
                            <input type="text" name="bookid" id="bookid" class="form-control" onblur="getBookDetails()" placeholder="Masukan ID Buku" required>
                            <div id="get_book_name" class="mt-2"></div>
                        </div>
                        <button type="submit" id="submit" class="btn btn-primary">Pinjamkan Buku</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?= view('includes/footer') ?>

    <script src="<?= base_url('js/jquery-1.10.2.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('js/custom.js') ?>"></script>
    <script>
        function getStudentDetails() {
            $.post('<?= base_url('issue-book/get-student') ?>', {
                studentid: $('#studentid').val()
            }, function(data) {
                $('#get_student_name').html(data);
            });
        }

        function getBookDetails() {
            $.post('<?= base_url('issue-book/get-book') ?>', {
                bookid: $('#bookid').val()
            }, function(data) {
                $('#get_book_name').html(data);
            });
        }
    </script>
</body>

</html>
