<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record
    $stmt = $conn->prepare("DELETE FROM personal_info WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: view.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    header("Location: view.php");
    exit();
}

$conn->close();
?>