<?php
require('./Model.php');
if (isset($_GET['id_peminjaman'])) {
    DeletePeminjaman($_GET['id_peminjaman']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        table {
            border-collapse: collapse;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            width: 80%;
            margin: 20px 0;
        }
        th, td {
            border: none;
            padding: 15px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Data Peminjaman</h1>
    <div>
        <a href="FormPeminjaman.php"><button>Tambah Data</button></a>
        <a href="index.php"><button>Kembali Ke Index</button></a>
    </div>
    <table>
        <tr>
            <th>Id Peminjaman</th>
            <th>Id Member</th>
            <th>Id Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Aksi</th>
        </tr>
        <?= GetAllData("peminjaman") ?>
    </table>
</body>
</html>