<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            background-color: #393E46;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: #EEEEEE;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
            background-color: #222831;
            color: #fff;
            padding: 20px;
            border-radius: 10px 10px 0 0;
        }

        .content {
            margin-bottom: 30px;
            text-align: center;
        }

        h1 {
            font-size: 28px;
            font-weight: bold;
            color: #fff;
            margin: 0;
        }

        h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .btn-info {
            background-color: #00ADB5;
            border: none;
        }

        .btn-info:hover {
            background-color: #138496;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            background-color: #fff;
        }

        .table th,
        .table td {
            padding: 10px;
            border: 1px solid #ddd;
            vertical-align: middle;
        }

        .table th {
            background-color: #f8f9fa;
            color: #333;
            font-weight: bold;
            text-align: left;
        }

        .right-align {
            text-align: right;
        }

        .table-actions {
            display: flex;
            gap: 5px;
            align-items: center;
        }

        .table-actions a,
        .table-actions form {
            display: inline-block;
            margin: 0;
        }

        .logout-container {
            text-align: center;
            margin-top: 20px;
        }

        .header,
        .content,
        .table-container {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Selamat Datang di Perpustakaan</h1>
        </div>

        <div class="content">
            <h2>Daftar Buku</h2>
            <a class="btn btn-info" href="<?= base_url('/buku/create') ?>">Tambah Data</a>
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($buku as $key => $value): ?>
                    <tr>
                        <td><?= $value['judul'] ?></td>
                        <td><?= $value['penulis'] ?></td>
                        <td><?= $value['penerbit'] ?></td>
                        <td><?= $value['tahun_terbit'] ?></td>
                        <td class="table-actions">
                            <a href="<?= base_url('/buku/' . $value['id'] . '/edit') ?>" class="btn btn-info btn-sm">Edit</a>
                            <form action="<?= base_url('/buku/' . $value['id'] . '/delete') ?>" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this item?')" style="display:inline;">
                                <input type="hidden" name="_method" value="DELETE" class="form-hidden">
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="logout-container">
            <a href="<?= base_url('logout') ?>" class="btn btn-info">Logout</a>
        </div>
    </div>
</body>

</html>