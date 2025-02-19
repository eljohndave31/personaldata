<?php
// filepath: /c:/xampp/htdocs/Personal_Data/view.php
include 'db.php';

$result = $conn->query("SELECT * FROM personal_info");

if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Date of Birth</th>
        <th>Sex</th>
        <th>Civil Status</th>
        <th>Nationality</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["id"]. "</td>
        <td>" . $row["last_name"]. "</td>
        <td>" . $row["first_name"]. "</td>
        <td>" . $row["middle_name"]. "</td>
        <td>" . $row["dob"]. "</td>
        <td>" . $row["sex"]. "</td>
        <td>" . $row["civil_status"]. "</td>
        <td>" . $row["nationality"]. "</td>
        <td>" . $row["mobile"]. "</td>
        <td>" . $row["email"]. "</td>
        <td><a href='edit.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete.php?id=" . $row["id"] . "'>Delete</a></td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>