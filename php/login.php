
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .form-control {
            margin-bottom: 10px;
            border-radius: 5px;
            padding: 10px;
        }
        .link-btn {
            background-color: transparent;
            border: none;
            color: #007bff;
            cursor: pointer;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user = $_POST['username'];
                $pass = $_POST['password'];

                // Handle login
                if ($user == 'admin' && $pass == 'admin') {
                    // Redirect to the correct path after successful login
                    header('Location: /ShowTimerX_Full/php/overview.php');
                    exit;
                } else {
                    echo '<div class="error-message"><i class="fas fa-times-circle"></i> Benutzer nicht gefunden</div>';
                }
            }
            ?>
            <h3 class="text-center mb-4">Login</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="username">Benutzername:</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Passwort:</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>

            <div class="mt-3 text-center">
                <button class="link-btn" onclick="location.href='/ShowTimerX_Full/php/registration.php'">Benutzer registrieren</button>
                <br>
                <button class="link-btn" onclick="location.href='/ShowTimerX_Full/php/reset_password.php'">Passwort zurücksetzen</button>
            </div>
        </div>
    </div>
</body>
</html>
