<?php
// filepath: /c:/xampp/htdocs/Personal_Data/delete.php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the delete query
    $stmt = $conn->prepare("DELETE FROM personal_info WHERE id = ?");
    $stmt->bind_param("i", $id); // 'i' indicates an integer parameter

    // Execute the query and check if successful
    if ($stmt->execute()) {
        // Redirect to view.php with a success message
        header("Location: view.php?message=Record deleted successfully.");
        exit();
    } else {
        // Show error message if the query fails
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement and database connection
    $stmt->close();
} else {
    echo "No ID specified.";
}

$conn->close();
?>
