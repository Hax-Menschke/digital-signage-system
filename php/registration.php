
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benutzerregistrierung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
        }
        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-box {
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
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-box">
            <h3 class="text-center mb-4">Benutzerregistrierung</h3>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password_confirm = $_POST['password_confirm'];
                
                if ($password === $password_confirm) {
                    $conn = new mysqli("localhost", "root", "", "showtimerx");
                    if ($conn->connect_error) {
                        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
                    }
                    
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, 'Gast')");
                    $stmt->bind_param("ss", $username, $hashed_password);
                    if ($stmt->execute()) {
                        echo '<div class="alert alert-success">Benutzer erfolgreich registriert!</div>';
                    } else {
                        echo '<div class="alert alert-danger">Fehler bei der Registrierung. Versuchen Sie es später.</div>';
                    }
                    $stmt->close();
                    $conn->close();
                } else {
                    echo '<div class="alert alert-danger">Passwörter stimmen nicht überein!</div>';
                }
            }
            ?>
            <form method="POST">
                <div class="form-group">
                    <label for="username">Benutzername:</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Passwort:</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirm">Passwort bestätigen:</label>
                    <input type="password" class="form-control" name="password_confirm" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Registrieren</button>
            </form>
        </div>
    </div>
</body>
</html>
