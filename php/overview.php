
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Übersicht - ShowTimerX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
        }
        .overview-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .overview-box {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
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
    <div class="overview-container">
        <div class="overview-box">
            <h3 class="text-center mb-4">Willkommen bei ShowTimerX!</h3>
            <p class="text-center">Hier ist die Übersicht Ihrer Funktionen.</p>
            <div class="text-center mb-4">
                <button class="btn btn-primary" onclick="location.href='/ShowTimerX_Full/php/timer.php'">Timer Verwaltung</button>
            </div>
            <div class="text-center mb-4">
                <button class="btn btn-primary" onclick="location.href='/ShowTimerX_Full/php/display.php'">Bildschirm Steuerung</button>
            </div>
            <div class="text-center">
                <button class="btn btn-danger" onclick="location.href='/ShowTimerX_Full/php/logout.php'">Logout</button>
            </div>
        </div>
    </div>
</body>
</html>
