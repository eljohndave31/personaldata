<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing data for the user to edit
    $stmt = $conn->prepare("SELECT * FROM personal_info WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Get the record from the result set
        $row = $result->fetch_assoc();
    } else {
        echo "No record found.";
        exit();
    }
    
    $stmt->close();
} else {
    echo "ID parameter missing.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the updated data from the form
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $dob = $_POST['dob'];
    $sex = $_POST['sex'];
    $civil_status = $_POST['civil_status'];
    $nationality = $_POST['nationality'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

    // Prepare the UPDATE query
    $update_stmt = $conn->prepare("UPDATE personal_info SET last_name = ?, first_name = ?, middle_name = ?, dob = ?, sex = ?, civil_status = ?, nationality = ?, mobile = ?, email = ? WHERE id = ?");
    $update_stmt->bind_param("sssssssssi", $last_name, $first_name, $middle_name, $dob, $sex, $civil_status, $nationality, $mobile, $email, $id);

    if ($update_stmt->execute()) {
        header("Location: view.php"); // Redirect to the view page after updating
        exit();
    } else {
        echo "Error: " . $update_stmt->error;
    }

    $update_stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Personal Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Personal Information</h1>
    <form action="edit.php?id=<?php echo $id; ?>" method="POST" id="editForm" class="personal-form">
        <div class="form-group">
            <label for="last_name" class="form-label">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo $row['last_name']; ?>" required class="form-input">
        </div>

        <div class="form-group">
            <label for="first_name" class="form-label">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo $row['first_name']; ?>" required class="form-input">
        </div>

        <div class="form-group">
            <label for="middle_name" class="form-label">Middle Initial:</label>
            <input type="text" id="middle_name" name="middle_name" value="<?php echo $row['middle_name']; ?>" required class="form-input">
        </div>

        <div class="form-group">
            <label for="dob" class="form-label">Date of Birth:</label>
            <input type="date" id="dob" name="dob" value="<?php echo $row['dob']; ?>" required class="form-input">
        </div>

        <div class="form-group full-width">
            <label class="form-label">Sex:</label>
            <div class="radio-group">
                <input type="radio" id="male" name="sex" value="Male" <?php echo ($row['sex'] == 'Male') ? 'checked' : ''; ?> required class="form-radio">
                <label for="male" class="radio-label">Male</label>
                <input type="radio" id="female" name="sex" value="Female" <?php echo ($row['sex'] == 'Female') ? 'checked' : ''; ?> required class="form-radio">
                <label for="female" class="radio-label">Female</label>
            </div>
        </div>

        <div class="form-group">
            <label for="civil_status" class="form-label">Civil Status:</label>
            <select name="civil_status" id="civil_status" required class="form-select">
                <option value="single" <?php echo ($row['civil_status'] == 'single') ? 'selected' : ''; ?>>Single</option>
                <option value="married" <?php echo ($row['civil_status'] == 'married') ? 'selected' : ''; ?>>Married</option>
                <option value="widowed" <?php echo ($row['civil_status'] == 'widowed') ? 'selected' : ''; ?>>Widowed</option>
                <option value="legally_separated" <?php echo ($row['civil_status'] == 'legally_separated') ? 'selected' : ''; ?>>Legally Separated</option>
                <option value="others" <?php echo ($row['civil_status'] == 'others') ? 'selected' : ''; ?>>Others</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nationality" class="form-label">Nationality:</label>
            <input type="text" id="nationality" name="nationality" value="<?php echo $row['nationality']; ?>" required class="form-input">
        </div>

        <div class="form-group">
            <label for="mobile" class="form-label">Mobile Number:</label>
            <input type="text" id="mobile" name="mobile" value="<?php echo $row['mobile']; ?>" required pattern="\d+" class="form-input">
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email Address:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" class="form-input">
        </div>

        <input type="submit" value="Update" class="submit-button">
    </form>
</body>
</html>
