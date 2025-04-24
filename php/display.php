<?php
$conn = require_once __DIR__ . '/config.php';
$conn = new mysqli("localhost", "root", "", "showtimerx");

$code = $_GET['code'] ?? 'default';

// Falls Display nicht bekannt, anlegen
$stmt = $conn->prepare("INSERT IGNORE INTO displays (code) VALUES (?)");
$stmt->bind_param("s", $code);
$stmt->execute();

// Hole aktuellen Timer
$stmt = $conn->prepare("SELECT t.* FROM displays d LEFT JOIN timers t ON d.assigned_timer = t.id WHERE d.code = ?");
$stmt->bind_param("s", $code);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo "<h1>{$row['title']}</h1>";
    echo "<p>{$row['message']}</p>";
    echo "<p><strong>Dauer:</strong> {$row['duration']} Sekunden</p>";
} else {
    echo "<h2>Kein Timer zugewiesen</h2>";
}

$stmt->close();
$conn->close();
?>