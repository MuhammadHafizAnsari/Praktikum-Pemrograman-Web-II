<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Buku</title>
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
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }
        .form-body {
            padding: 20px;
            background-color: #fff;
            border-radius: 0 0 10px 10px;
        }
        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
            color: #333;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
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
        .error {
            color: #ff0000;
            font-size: 12px;
            margin-bottom: 10px;
        }
        .button-container {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Edit Data Buku</h2>
        </div>
        <div class="form-body">
            <form action="<?= base_url('/buku/' . $buku['id'] . '/edit') ?>" method="post" onsubmit="return validateForm()">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" id="judul" name="judul" class="form-control" value="<?= $buku['judul'] ?>">
                    <div id="judulError" class="error"></div>
                </div>
                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" id="penulis" name="penulis" class="form-control" value="<?= $buku['penulis'] ?>">
                    <div id="penulisError" class="error"></div>
                </div>
                <div class="mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" id="penerbit" name="penerbit" class="form-control" value="<?= $buku['penerbit'] ?>">
                    <div id="penerbitError" class="error"></div>
                </div>
                <div class="mb-3">
                    <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                    <input type="number" id="tahun_terbit" name="tahun_terbit" class="form-control" value="<?= $buku['tahun_terbit'] ?>">
                    <div id="tahunTerbitError" class="error"></div>
                </div>
                <div class="button-container">
                    <button type="submit" class="btn">Edit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateForm() {
            let isValid = true;
            const judul = document.getElementById('judul').value;
            const penulis = document.getElementById('penulis').value;
            const penerbit = document.getElementById('penerbit').value;
            const tahunTerbit = document.getElementById('tahun_terbit').value;

            if (judul === '') {
                document.getElementById('judulError').innerText = 'Judul harus diisi.';
                isValid = false;
            } else {
                document.getElementById('judulError').innerText = '';
            }

            if (penulis === '') {
                document.getElementById('penulisError').innerText = 'Penulis harus diisi.';
                isValid = false;
            } else {
                document.getElementById('penulisError').innerText = '';
            }

            if (penerbit === '') {
                document.getElementById('penerbitError').innerText = 'Penerbit harus diisi.';
                isValid = false;
            } else {
                document.getElementById('penerbitError').innerText = '';
            }

            if (tahunTerbit === '' || isNaN(tahunTerbit) || tahunTerbit < 1800 || tahunTerbit > 2024) {
                document.getElementById('tahunTerbitError').innerText = 'Tahun terbit harus diisi dan berada di antara 1800 dan 2024.';
                isValid = false;
            } else {
                document.getElementById('tahunTerbitError').innerText = '';
            }

            return isValid;
        }
    </script>
</body>
</html>