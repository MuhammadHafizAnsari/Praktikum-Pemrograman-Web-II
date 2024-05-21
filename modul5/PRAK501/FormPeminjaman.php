<?php
require('./Model.php');
if (isset($_GET['id_peminjaman'])) {
    $result = EditPeminjaman($_GET['id_peminjaman']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman</title>
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
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 500px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
            width: 100%;
        }
        button:hover {
            background-color: #0056b3;
        }
        .button-group {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <?php echo (isset($_GET['id_peminjaman'])) ? "<h1>Update Data Peminjaman</h1>" : "<h1>Tambah Data Peminjaman</h1>" ?>
    <form action="" method="post">
        <label for="id_member">Id Member</label>
        <input type="text" id="id_member" name="id_member" <?php echo (isset($_GET['id_peminjaman'])) ? "value='" . $result['id_member'] . "'" : "value=''"; ?> required>

        <label for="id_buku">Id Buku</label>
        <input type="text" id="id_buku" name="id_buku" <?php echo (isset($_GET['id_peminjaman'])) ? "value='" . $result['id_buku'] . "'" : "value=''"; ?> required>

        <label for="tgl_pinjam">Tanggal Peminjaman</label>
        <input type="date" id="tgl_pinjam" name="tgl_pinjam" <?php echo (isset($_GET['id_peminjaman'])) ? "value='" . $result['tgl_pinjam'] . "'" : "value=''"; ?> required>

        <label for="tgl_kembali">Tanggal Kembali</label>
        <input type="date" id="tgl_kembali" name="tgl_kembali" <?php echo (isset($_GET['id_peminjaman'])) ? "value='" . $result['tgl_kembali'] . "'" : "value=''"; ?> required>

        <div class="button-group">
            <?php
            if (isset($_GET['id_peminjaman'])) {
                echo "<button type='submit' name='update'>Update</button>";
            } else {
                echo "<button type='submit' name='submit'>Tambah</button>";
            }
            ?>
        </div>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        AddPeminjaman($_POST['id_member'], $_POST['id_buku'], $_POST['tgl_pinjam'], $_POST['tgl_kembali']);
    }
    if (isset($_POST['update'])) {
        UpdatePeminjaman($_GET['id_peminjaman'], $_POST['id_member'], $_POST['id_buku'], $_POST['tgl_pinjam'], $_POST['tgl_kembali']);
    }
    ?>
</body>
</html>