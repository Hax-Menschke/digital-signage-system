<?php
session_start();
require_once __DIR__ . '/config.php';

// Prüfen ob eingeloggt
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$conn = new mysqli("localhost", "root", "", "showtimerx");
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $duration = intval($_POST['duration']);
    $message = $_POST['message'];
    $image = ""; // Bild-Handling später
    if (!isset($_SESSION['user_id'])) {
    die('Benutzer nicht eingeloggt.');
}
$creator = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO timers (title, duration, message, image, created_by) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sissi", $title, $duration, $message, $image, $creator);
    $stmt->execute();
    $stmt->close();
}

$result = $conn->query("SELECT * FROM timers ORDER BY id DESC");

echo "<h2>Timer Übersicht</h2>";
echo "<form method='POST'>
    Titel: <input type='text' name='title' required>
    Dauer (Sek.): <input type='number' name='duration' required>
    Nachricht: <input type='text' name='message'>
    <input type='submit' value='Erstellen'>
</form><br>";

while($row = $result->fetch_assoc()) {
    echo "⏱ <strong>{$row['title']}</strong> ({$row['duration']}s): {$row['message']}<br>";
}

$conn->close();
?>