
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passwort zurücksetzen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
        }
        .reset-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .reset-box {
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
    <div class="reset-container">
        <div class="reset-box">
            <h3 class="text-center mb-4">Passwort zurücksetzen</h3>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $email = $_POST['email'];
                $conn = new mysqli("localhost", "root", "", "showtimerx");
                if ($conn->connect_error) {
                    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
                }
                
                // Check if email exists in users table
                $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    $reset_token = bin2hex(random_bytes(50));
                    echo '<div class="alert alert-success">Passwort zurücksetzen E-Mail gesendet.</div>';
                } else {
                    echo '<div class="alert alert-danger">E-Mail-Adresse nicht gefunden.</div>';
                }
                $stmt->close();
                $conn->close();
            }
            ?>
            <form method="POST">
                <div class="form-group">
                    <label for="email">E-Mail:</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">E-Mail senden</button>
            </form>
        </div>
    </div>
</body>
</html>
