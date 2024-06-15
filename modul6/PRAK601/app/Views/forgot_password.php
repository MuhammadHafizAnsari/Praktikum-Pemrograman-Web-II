<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            background-color: #393E46;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #EEEEEE;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
            text-align: center;
        }

        .form-outline {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        .btn {
            display: inline-block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #00ADB5;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color:#138496;
        }

        .text-center {
            text-align: center;
        }

        .alert {
            padding: 15px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            margin-bottom: 20px;
            position: relative;
        }

        .alert-dismissible .btn-close {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #721c24;
        }

        .mt-4 {
            margin-top: 20px;
        }

        .alert .btn-close:hover {
            color: #000;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php if (!empty(session()->getFlashdata('pesan'))) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo session()->getFlashdata('pesan'); ?>
            <button type="button" class="btn-close" aria-label="Close">&times;</button>
        </div>
        <?php endif; ?>
        <div class="forgot-password-form">
            <h2 class="form-title">Forgot Password</h2>
            <form action="<?= base_url('/forgot-password') ?>" method="post">
                <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email address</label>
                    <input id="email" class="form-control" name="email" />
                </div>

                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
            <div class="text-center mt-4">
                <p><a href="<?= base_url('/login') ?>">Back to Login</a></p>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.btn-close').forEach(button => {
            button.addEventListener('click', () => {
                button.parentElement.style.display = 'none';
            });
        });
    </script>
</body>

</html>
