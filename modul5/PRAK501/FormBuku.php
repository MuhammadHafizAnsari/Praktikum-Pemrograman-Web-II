<?php require('./Model.php');
if (isset($_GET['id_buku'])) {
    EditBuku();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku</title>
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
        input[type="text"] {
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
    <?php echo (isset($_GET['id_buku'])) ? "<h1>Update Data Buku</h1>" : "<h1>Tambah Data Buku</h1>" ?>
    <form action="" method="post">
        <label for="judul">Judul Buku</label>
        <input type="text" id="judul" name="judul" <?php echo (isset($_GET['id_buku'])) ? "value='" . $result[0]["judul_buku"] . "'" : "value=''"; ?> required>

        <label for="penulis">Nama Penulis</label>
        <input type="text" id="penulis" name="penulis" <?php echo (isset($_GET['id_buku'])) ? "value='" . $result[0]["penulis"] . "'" : "value=''"; ?> required>

        <label for="penerbit">Penerbit</label>
        <input type="text" id="penerbit" name="penerbit" <?php echo (isset($_GET['id_buku'])) ? "value='" . $result[0]["penerbit"] . "'" : "value=''"; ?> required>

        <label for="tahunterbit">Tahun Terbit</label>
        <input type="text" id="tahunterbit" name="tahunterbit" <?php echo (isset($_GET['id_buku'])) ? "value='" . $result[0]["tahun_terbit"] . "'" : "value=''"; ?> required>

        <div class="button-group">
            <?php
            if (isset($_GET['id_buku'])) {
                echo "<button type='submit' name='edit'>Update</button>";
            } else {
                echo "<button type='submit' name='submit'>Tambah</button>";
            }
            ?>
        </div>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        AddBuku($_POST['judul'], $_POST['penulis'], $_POST['penerbit'], $_POST['tahunterbit']);
    }
    if (isset($_POST['edit'])) {
        UpdateBuku($_GET['id_buku'], $_POST['judul'], $_POST['penulis'], $_POST['penerbit'], $_POST['tahunterbit']);
    }
    ?>
</body>
</html>