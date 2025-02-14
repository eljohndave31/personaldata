<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Function to sanitize input
    function clean_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // Initialize an array to hold errors
    $errors = [];

    // Required Fields Validation
    $required_fields = [
        'last_name', 'first_name', 'middle_name', 'dob', 'sex', 'civil_status', 'nationality',
        'birth_street', 'birth_city', 'birth_country', 'home_street', 'home_city', 'home_country', 'home_zip_code' ,'mobile'
    ];

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = ucfirst(str_replace("_", " ", $field)) . " is required.";
        }
    }

    // Collect and sanitize form data
    $last_name = clean_input($_POST['last_name']);
    $first_name = clean_input($_POST['first_name']);
    $middle_name = clean_input($_POST['middle_name']);
    $dob = clean_input($_POST['dob']);
    $sex = clean_input($_POST['sex']);
    $civil_status = clean_input($_POST['civil_status'] ?? '');
    // If "Others" is selected, use the custom input
    if ($civil_status === "others" && !empty($_POST['othersInput'])) {
        $civil_status = clean_input($_POST['othersInput']);
    }
    $othersInput = clean_input($_POST['othersInput']);
    $tax_id = clean_input($_POST['tax_id']);
    $nationality = clean_input($_POST['nationality']);
    $religion = clean_input($_POST['religion']);
    // birth place
    $birth_rm_unit = clean_input($_POST['birth_rm_unit']);
    $birth_house = clean_input($_POST['birth_house']);
    $birth_street = clean_input($_POST['birth_street']);
    $birth_city = clean_input($_POST['birth_city']);
    $birth_province = clean_input($_POST['birth_province']);
    $birth_country = clean_input($_POST['birth_country']);
    $home_city = clean_input($_POST['home_city']);
    $birth_subdivision = clean_input($_POST['birth_subdivision']);
    $birth_barangay = clean_input($_POST['birth_barangay']);

    // home address
    $home_rm_unit = clean_input($_POST['home_rm_unit']);
    $home_house = clean_input($_POST['home_house']);
    $home_street = clean_input($_POST['home_street']);
    $home_subdivision = clean_input($_POST['home_subdivision']);
    $home_barangay = clean_input($_POST['home_barangay']);
    $home_city = clean_input($_POST['home_city']);
    $home_province = clean_input($_POST['home_province']);
    $home_country = clean_input($_POST['home_country']);    
    $zip_code = clean_input($_POST['zip_code']);
    $mobile = clean_input($_POST['mobile']);
    $email = clean_input($_POST['email']);
    $telephone = clean_input($_POST['telephone']);


    $father_last_name = clean_input($_POST['father_last_name']);
    $father_first_name = clean_input($_POST['father_first_name']);
    $father_middle_name = clean_input($_POST['father_middle_name']);
    $mother_last_name = clean_input($_POST['mother_last_name']);
    $mother_first_name = clean_input($_POST['mother_first_name']);
    $mother_middle_name = clean_input($_POST['mother_middle_name']);

    // Validation for specific fields
    if (!preg_match("/^[A-Za-z\s]+$/", $last_name)) {
        $errors[] = "Last name should only contain letters and spaces.";
    }
    if (!preg_match("/^[A-Za-z\s]+$/", $first_name)) {
        $errors[] = "First name should only contain letters and spaces.";
    }
    if (!preg_match("/^[A-Za-z\s]+$/", $middle_name)) {
        $errors[] = "Middle name should only contain letters and spaces.";
    }
    if (!empty($tax_id) && !preg_match("/^\d+$/", $tax_id)) {
        $errors[] = "Tax ID should contain numbers only.";
    }
    if (!empty($home_zip) && !preg_match("/^\\d+$/", $home_zip)) {
        $errors['home_zip'] = "Zip Code should contain numbers only.";
    }
    if (!preg_match("/^\d+$/", $mobile)) {
        $errors[] = "Mobile Number should contain numbers only.";
    }
    if (!empty($telephone) && !preg_match("/^\d+$/", $telephone)) {
        $errors[] = "Telephone Number should contain numbers only.";
    }
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Age validation
    $dob_date = new DateTime($dob);
    $today = new DateTime();
    $age = $today->diff($dob_date)->y;

    if ($age < 18) {
        $errors[] = "You must be at least 18 years old.";
    }

    // Format full name
    $full_name = "$last_name, $first_name $middle_name";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            width: 900px;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center; 
        }
        h1 {
            color:rgb(12, 201, 72);
        }
        h1 i{
            size: 20px;
        }
        .oops{
            color: red;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #4f46e5;
            color: white;
            text-align: center;
        }
        td {
            background: #f9fafb;
        }
         .btn{
            padding: 5px 10px;
            background: #4f46e5;
            width: 100px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            float: right;
        }
        .btn:hover{
            background: #3e3ce1;
            
        }
        .error {
            color: red;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (!empty($errors)): ?>
            <h1 class="oops">Oops!</h1>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <span class="error"><i class='bx bxs-error-circle'></i><?= $error ?></span><br>
                <?php endforeach; ?>
            </ul>

            <button class="btn" onclick="window.history.back();">Back</button>


        <?php else: ?>
            <h1>Submission Successfully <i class='bx bx-check-circle'></i></h1>
            <table>
                <tr><th colspan="2">Personal Information</th></tr>
                <tr><td>Name:</td><td><?= $full_name ?></td></tr>
                <tr><td>Age:</td><td><?= $age ?></td></tr>
                <tr><td>Sex:</td><td><?= $sex ?></td></tr>
                <tr><td>Civil Status:</td><td><?= htmlspecialchars($civil_status) ?></td></tr>
                <tr><td>Tax Identification Number</td><td><?= !empty($tax_id) ? $tax_id : "N/A" ?></td></tr>
                <tr><td>Nationality:</td><td><?= $nationality ?></td></tr>
                <tr><td>Religion:</td><td><?= $religion ?></td></tr>

                <tr><th colspan="2">Place of Birth</th></tr>
                <tr><td>RM/FLR/Unit No. & Bldg. Name:</td><td><?= $birth_rm_unit?></td></tr>
                <tr><td>House/Lot & Blk. No:</td><td><?= $birth_house?></td></tr>
                <tr><td>Street Name:</td><td><?= $birth_street ?></td></tr>
                <tr><td>Subdivision:</td><td><?= $birth_subdivision ?></td></tr>
                <tr><td>Barangay:</td><td><?= $birth_barangay ?></td></tr>
                <tr><td>City/Municipality:</td><td><?= $birth_city ?></td></tr>
                <tr><td>Province:</td><td><?= $birth_province ?></td></tr>
                <tr><td>Country:</td><td><?= $birth_country ?></td></tr>
                <tr><td>Zip Code:</td><td><?= $zip_code ?></td></tr>

                <tr><th colspan="2">Home Address</th></tr>
                <tr><td>RM/FLR/Unit No. & Bldg. Name:</td><td><?= $home_rm_unit ?></td></tr>
                <tr><td>House/Lot & Blk. No:</td><td><?= $home_house ?></td></tr>
                <tr><td>Street Name:</td><td><?= $home_street ?></td></tr>
                <tr><td>Subdivision:</td><td><?= $home_subdivision ?></td></tr>
                <tr><td>Barangay:</td><td><?= $home_barangay ?></td></tr>
                <tr><td>City/Municipality:</td><td><?= $home_city ?></td></tr>
                <tr><td>Province:</td><td><?= $home_province ?></td></tr>
                <tr><td>Country:</td><td><?= $home_country ?></td></tr>
                <tr><td>Zip Code:</td><td><?= $zip_code ?></td></tr>
                <tr><th colspan="2">Contact Information</th></tr>
                <tr><td>Mobile Number:</td><td><?= $mobile ?></td></tr>
                <tr><td>Email:</td><td><?= !empty($email) ? $email : "N/A" ?></td></tr>
                <tr><td>Telephone:</td><td><?= !empty($telephone) ? $telephone : "N/A" ?></td></tr>
                <tr><th colspan="2">Parent Information</th></tr>
                <tr><td>Father's Name:</td><td><?= "$father_last_name, $father_first_name $father_middle_name" ?></td></tr>
                <tr><td>Mother's Name:</td><td><?= "$mother_last_name, $mother_first_name $mother_middle_name" ?></td></tr>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
