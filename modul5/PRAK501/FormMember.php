<?php require('./Model.php');
if (isset($_GET['id_member'])) {
    EditMember();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo (isset($_GET['id_member'])) ? "<title>Update Data | Member</title>" : "<title>Tambah Data | Member</title>" ?>
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
        input[type="datetime-local"],
        input[type="date"],
        textarea {
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
    <?php echo (isset($_GET['id_member'])) ? "<h1>Update Data Member</h1>" : "<h1>Tambah Data Member</h1>" ?>
    <form action="" method="post">
        <label for="nama_member">Nama</label>
        <input type="text" id="nama_member" name="nama_member" <?php echo (isset($_GET['id_member'])) ? "value='" . $result[0]["nama_member"] . "'" : "value=''"; ?> required>

        <label for="nomor_member">Nomor Member</label>
        <input type="text" id="nomor_member" name="nomor_member" <?php echo (isset($_GET['id_member'])) ? "value='" . $result[0]["nomor_member"] . "'" : "value=''"; ?> required>

        <label for="alamat">Alamat</label>
        <textarea id="alamat" name="alamat" cols="30" rows="4" required><?php echo (isset($_GET['id_member'])) ? $result[0]["alamat"] : ""; ?></textarea>

        <label for="tgl_daftar">Tanggal Mendaftar</label>
        <input type="datetime-local" id="tgl_daftar" name="tgl_daftar" <?php echo (isset($_GET['id_member'])) ? "value='" . date('Y-m-d\TH:i', strtotime($result[0]["tgl_mendaftar"])) . "'" : "value=''"; ?> required>

        <label for="tgl_terakhir_bayar">Tanggal Terakhir Bayar</label>
        <input type="date" id="tgl_terakhir_bayar" name="tgl_terakhir_bayar" <?php echo (isset($_GET['id_member'])) ? "value='" . $result[0]["tgl_terakhir_bayar"] . "'" : "value=''"; ?> required>

        <div class="button-group">
            <?php
            if (isset($_GET['id_member'])) {
                echo "<button type='submit' name='update'>Update</button>";
            } else {
                echo "<button type='submit' name='submit'>Tambah</button>";
            }
            ?>
        </div>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $tgl_daftar = date_create($_POST['tgl_daftar']);
        $tgl_daftar = date_format($tgl_daftar, "Y-m-d H:i:s");
        AddMember($_POST['nama_member'], $_POST['nomor_member'], $_POST['alamat'], $tgl_daftar, $_POST['tgl_terakhir_bayar']);
    }
    if (isset($_POST['update'])) {
        $tgl_daftar = date('Y-m-d H:i:s', strtotime($_POST['tgl_daftar']));
        UpdateMember($_GET['id_member'], $_POST['nama_member'], $_POST['nomor_member'], $_POST['alamat'], $tgl_daftar, $_POST['tgl_terakhir_bayar']);
    }
    ?>
</body>
</html>