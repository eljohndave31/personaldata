<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- <h1 class="form-title">Personal Data</h1> -->
    <form action="submit.php" method="POST" id="personalForm" class="personal-form">
        <!-- Personal Data Section -->
        <h2 class="section-title">Personal Data</h2>
        <div class="form-group">
            <label for="last_name" class="form-label">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required pattern="^[A-Za-z\s]+$" class="form-input">
        </div>

        <div class="form-group">
            <label for="first_name" class="form-label">First Name:</label>
            <input type="text" id="first_name" name="first_name" required class="form-input">
        </div>

        <div class="form-group">
            <label for="middle_name" class="form-label">Middle Initial:</label>
            <input type="text" id="middle_name" name="middle_name" required class="form-input">
        </div>
        
        <div class="form-group">
            <label for="dob" class="form-label">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required class="form-input">
        </div>
        
        <div class="form-group full-width">
            <label class="form-label">Sex:</label>
            <div class="radio-group">
                <input type="radio" id="male" name="sex" value="Male" required class="form-radio">
                <label for="male" class="radio-label">Male</label>
                <input type="radio" id="female" name="sex" value="Female" required class="form-radio">
                <label for="female" class="radio-label">Female</label>
            </div>
        </div>

        <div class="form-group">
            <label for="civil_status" class="form-label">Civil Status:</label>
            <select name="civil_status" id="civil_status" required class="form-select">
                <option value="single">Single</option>
                <option value="married">Married</option>
                <option value="widowed">Widowed</option>
                <option value="legally_separated">Legally Separated</option>
                <option value="others">Others</option>
            </select>
        </div>
    
        <div class="form-group">
            <label for="tax_id" class="form-label">Tax ID:</label>
            <input type="text" id="tax_id" name="tax_id" pattern="\d+" placeholder="Numbers only" class="form-input">
        </div> 
     
        <div class="form-group">
            <label for="nationality" class="form-label">Nationality:</label>
            <input type="text" id="nationality" name="nationality" required class="form-input">
        </div>

        <div class="form-group">
            <label for="religion" class="form-label">Religion:</label>
            <input type="text" id="religion" name="religion" class="form-input">
        </div>

        <!-- Address Section -->
        <h2 class="section-title">Place of Birth</h2>
        <div class="form-group">
            <label for="birth_rm_unit" class="form-label">RM/FLR/Unit No. & Bldg. Name:</label>
            <input type="text" id="birth_rm_unit" name="birth_rm_unit" class="form-input">
        </div>

        <div class="form-group">
            <label for="birth_house" class="form-label">House/Lot & Blk. No:</label>
            <input type="text" id="birth_house" name="birth_house" class="form-input">
        </div>

        <div class="form-group">
            <label for="birth_street" class="form-label">Street Name:</label>
            <input type="text" id="birth_street" name="birth_street" required class="form-input">
        </div>

        <div class="form-group">
            <label for="birth_subdivision" class="form-label">Subdivision:</label>
            <input type="text" id="birth_subdivision" name="birth_subdivision" class="form-input">
        </div>

        <div class="form-group">
            <label for="birth_barangay" class="form-label">Barangay/District/Locality:</label>
            <input type="text" id="birth_barangay" name="birth_barangay" class="form-input">
        </div>

        <div class="form-group">
            <label for="birth_city" class="form-label">City/Municipality:</label>
            <input type="text" id="birth_city" name="birth_city" required class="form-input">
        </div>

        <div class="form-group">
            <label for="birth_province" class="form-label">Province:</label>
            <input type="text" id="birth_province" name="birth_province" class="form-input">
        </div>

        <div class="form-group">
            <label for="birth_country" class="form-label">Country:</label>
            <select name="birth_country" id="birth_country" class="form-select">
                <?php 
                    $countries = [
                        "Philippines" , "Canada", "UK", "Australia","USA", "India", "Germany", "France", "Italy", 
                        "Spain", "Japan", "China", "Mexico", "Brazil", "South Korea", "Russia", "South Africa", 
                        "Argentina", "Egypt", "Nigeria", "Saudi Arabia", "Turkey", "Sweden", "Netherlands", "Belgium", 
                        "Switzerland", "Norway", "Denmark", "Finland", "Poland", "New Zealand", "Singapore", "Malaysia"
                    ]; 
                    foreach ($countries as $country) {
                        echo "<option value='$country'>$country</option>";
                    }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="birth_zip" class="form-label">Zip Code:</label>
            <input type="text" id="zip_code" name="zip_code" class="form-input">
        </div>

        <h2 class="section-title">Home Address</h2>
        <div class="form-group">
            <label for="home_rm_unit" class="form-label">RM/FLR/Unit No. & Bldg. Name:</label>
            <input type="text" id="home_rm_unit" name="home_rm_unit" class="form-input">
        </div>

        <div class="form-group">
            <label for="home_house" class="form-label">House/Lot & Blk. No:</label>
            <input type="text" id="home_house" name="home_house" class="form-input">
        </div>

        <div class="form-group">
            <label for="home_street" class="form-label">Street Name:</label>
            <input type="text" id="home_street" name="home_street" required class="form-input">
        </div>

        <div class="form-group">
            <label for="home_subdivision" class="form-label">Subdivision:</label>
            <input type="text" id="home_subdivision" name="home_subdivision" class="form-input">
        </div>

        <div class="form-group">
            <label for="home_barangay" class="form-label">Barangay/District/Locality:</label>
            <input type="text" id="home_barangay" name="home_barangay" class="form-input">
        </div>

        <div class="form-group">
            <label for="home_city" class="form-label">City/Municipality:</label>
            <input type="text" id="home_city" name="home_city" required class="form-input">
        </div>

        <div class="form-group">
            <label for="home_province" class="form-label">Province:</label>
            <input type="text" id="home_province" name="home_province" class="form-input">
        </div>

        <div class="form-group">
            <label for="home_country" class="form-label">Country:</label>
            <select name="home_country" id="home_country" class="form-select">
                <?php 
                    foreach ($countries as $country) {
                        echo "<option value='$country'>$country</option>";
                    }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="home_zip" class="form-label">Zip Code:</label>
            <input type="text" id="home_zip" name="home_zip_code" class="form-input">

        </div>

        <div class="form-group">
            <label for="mobile" class="form-label">Mobile Number:</label>
            <input type="text" id="mobile" name="mobile" required pattern="\d+" placeholder="Numbers only" class="form-input">
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email Address:</label>
            <input type="email" id="email" name="email" class="form-input">
        </div>

        <div class="form-group">
            <label for="telephone" class="form-label">Telephone Number:</label>
            <input type="text" id="telephone" name="telephone" pattern="\d+" placeholder="Numbers only" class="form-input">
        </div>

        <!-- Parent's Information Section -->
        <h2 class="section-title">Father's Name</h2>
        <div class="form-group">
            <label for="father_last_name" class="form-label">Last Name:</label>
            <input type="text" id="father_last_name" name="father_last_name" class="form-input">
        </div>

        <div class="form-group">
            <label for="father_first_name" class="form-label">First Name:</label>
            <input type="text" id="father_first_name" name="father_first_name" class="form-input">
        </div>

        <div class="form-group">
            <label for="father_middle_name" class="form-label">Middle Name:</label>
            <input type="text" id="father_middle_name" name="father_middle_name" class="form-input">
        </div>

        <h2 class="section-title">Mother's Maiden Name</h2>
        <div class="form-group">
            <label for="mother_last_name" class="form-label">Last Name:</label>
            <input type="text" id="mother_last_name" name="mother_last_name" class="form-input">
        </div>

        <div class="form-group">
            <label for="mother_first_name" class="form-label">First Name:</label>
            <input type="text" id="mother_first_name" name="mother_first_name" class="form-input">
        </div>

        <div class="form-group">
            <label for="mother_middle_name" class="form-label">Middle Name:</label>
            <input type="text" id="mother_middle_name" name="mother_middle_name" class="form-input">
        </div>

        <input type="submit" value="Submit" class="submit-button">
    </form>
</body>
</html>
