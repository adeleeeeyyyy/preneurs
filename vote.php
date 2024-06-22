<?php
session_start();

if (isset($_POST['stand_id']) && !isset($_SESSION['voted'])) {
    $stand_id = $_POST['stand_id'];

    $conn = new mysqli('localhost', 'root', '', 'voting_db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE stands SET votes = votes + 1 WHERE id = ?");
    $stmt->bind_param("i", $stand_id);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    $_SESSION['voted'] = true;

    header("Location: statistik.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>
