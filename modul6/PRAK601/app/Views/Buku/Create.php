<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Buku</title>
    <style>
        body {
            background-color: #393E46;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            background-color: #EEEEEE;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #222831;
            color: #fff;
            border-radius: 10px 10px 0 0;
            padding: 10px 20px;
            text-align: center;
        }

        .form-title {
            margin: 0;
            font-size: 24px;
        }

        .form-body {
            padding: 20px;
            background-color: #fff;
            border-radius: 0 0 10px 10px;
        }

        .form-label {
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #00ADB5;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 0 auto;
            display: block;
        }

        .btn:hover {
            background-color: #138496;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: -15px;
            margin-bottom: 15px;
            display: none;
        }

        .button-container {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2 class="form-title">Tambah Data Buku</h2>
        </div>
        <div class="form-body">
            <form id="bukuForm" action="<?= base_url('/buku/create') ?>" method="post" onsubmit="return validateForm()">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul">
                <div class="error-message" id="judulError">Judul harus diisi dan berupa string.</div>

                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis">
                <div class="error-message" id="penulisError">Penulis harus diisi dan berupa string.</div>

                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit">
                <div class="error-message" id="penerbitError">Penerbit harus diisi dan berupa string.</div>

                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit">
                <div class="error-message" id="tahunError">Tahun Terbit harus diisi dan berupa angka antara 1800 dan 2024.</div>

                <div class="button-container">
                    <button type="submit" class="btn">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateForm() {
        
            document.getElementById('judulError').style.display = 'none';
            document.getElementById('penulisError').style.display = 'none';
            document.getElementById('penerbitError').style.display = 'none';
            document.getElementById('tahunError').style.display = 'none';

            let isValid = true;

            const judul = document.getElementById('judul').value;
            if (judul === '' || !isNaN(judul)) {
                document.getElementById('judulError').style.display = 'block';
                isValid = false;
            }

            const penulis = document.getElementById('penulis').value;
            if (penulis === '' || !isNaN(penulis)) {
                document.getElementById('penulisError').style.display = 'block';
                isValid = false;
            }

            const penerbit = document.getElementById('penerbit').value;
            if (penerbit === '' || !isNaN(penerbit)) {
                document.getElementById('penerbitError').style.display = 'block';
                isValid = false;
            }

            const tahunTerbit = document.getElementById('tahun_terbit').value;
            const tahunTerbitNumber = parseInt(tahunTerbit);
            if (isNaN(tahunTerbitNumber) || tahunTerbitNumber < 1800 || tahunTerbitNumber > 2024) {
                document.getElementById('tahunError').style.display = 'block';
                isValid = false;
            }

            return isValid;
        }
    </script>
</body>

</html>