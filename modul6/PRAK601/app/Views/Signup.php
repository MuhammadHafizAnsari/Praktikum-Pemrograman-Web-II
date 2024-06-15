<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
        h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
            text-align: center;
        }
        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .form-control {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #00ADB5;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .btn:hover {
            background-color: #00ADB5;
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
        .alert .btn-close:hover {
            color: #000;
        }
        .link {
            text-align: center;
            margin-top: 20px;
        }
        a {
            color: #00ADB5;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <!-- Display alerts for success or validation errors -->
        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="display: none;">
            <span class="alert-message"></span>
            <button type="button" class="btn-close" aria-label="Close">&times;</button>
        </div>
        <form action="/signup" method="post" onsubmit="return validateForm()">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
            <button type="submit" class="btn">Register</button>
        </form>
        <div class="link">
            Already have an account? <a href="/login">Login here</a>
        </div>
    </div>
    <script>
        function validateForm() {
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const alertBox = document.querySelector('.alert');
            const alertMessage = document.querySelector('.alert-message');

            alertBox.style.display = 'none';
            alertMessage.textContent = '';

            if (!username || !email || !password || !confirmPassword) {
                alertMessage.textContent = 'Semua kolom harus diisi.';
                alertBox.style.display = 'block';
                return false;
            }

            if (password !== confirmPassword) {
                alertMessage.textContent = 'Kata sandi tidak cocok.';
                alertBox.style.display = 'block';
                return false;
            }

            return true; // Form is valid
        }

        document.querySelectorAll('.btn-close').forEach(button => {
            button.addEventListener('click', () => {
                button.parentElement.style.display = 'none';
            });
        });
    </script>
</body>
</html>
