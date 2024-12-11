<?php
    include 'db_con.php';
    session_start();
    $showAlert = false;
    $existUser = false;
    $passMiss = false;
    $exists = false;
    if(isset($_POST['submit'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $phone=$_POST['contact'];
        $email=$_POST['email'];
        $age=$_POST['age'];
        $blood_type=$_POST['blood_type'];
        $house=$_POST['place'];
        $town=$_POST['town'];
        $pin=$_POST['pin'];
        $district=$_POST['district'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];

        if($pass == $cpass && $exists == false){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql="insert into users(fname,lname,phoneno,email,pass,age,bloodtyp,house,town,pin,district) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            //prepare statement
            $stmt = $conn->prepare($sql);
    
            //bind paramters
            $stmt->bind_param("sssssssssss", $fname, $lname, $phone, $email, $hash, $age, $blood_type, $house, $town, $pin, $district);
  
            //execute statement
            $stmt->execute();
            $result = $stmt->get_result();
    
            if($result){
                $showAlert = true;
                echo "DATA INSERTED";
            }
        }
        else if($pass != $cpass){
            $passMiss = true;
        }
        else{
            $existUser = true;
        }
        $stmt->close();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register as Donor</title>
    <!-- Poppins Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- bootstrap link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="style.css">
</head>
<body>
<section id="register" >
    <section class="header">
        <nav>
            <ul>
                <li>Blood Donation Initiative</li>
                <li><a href="index.php">Home</a><a href="login.php">Login</a></li>
                
            </ul>
        </nav>
    </section>
    <?php 
        if($showAlert){
           echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account is created and you can login now.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </button>
            </div>'; 
        }
        if($passMiss){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Password Mismatch.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        if($existUser){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Username already exists. Please enter a unique username
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    ?>
    <div class="form-container">
        <form action="" method="post">
            <p class="heading">Register as a Donor</p>

            <!-- Personal Information -->
            <div class="wrapper">
                <div class="wrap">
                    <label for="fname">First Name:<span style="color:red">*</span></label>
                    <input type="text" id="fname" name="fname" required>
                </div>
                <div class="wrap">
                    <label for="lname">Last Name:<span style="color:red">*</span></label>
                    <input type="text" id="lname" name="lname" required>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="wrapper">
                <div class="wrap">
                    <label for="contact">Contact Number (+91):<span style="color:red">*</span></label>
                    <input type="number" id="contact" name="contact" required>
                </div>
                <div class="wrap">
                    <label for="email">Email:<span style="color:red">*</span></label>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>

            <!-- Additional Details -->
            <div class="wrapper">
                <div class="wrap">
                    <label for="age">Age:<span style="color:red">*</span></label>
                    <input type="number" id="age" name="age" required>
                </div>
                <div class="wrap">
                    <label for="blood_type">Blood Type:<span style="color:red">*</span></label>
                    <select id="blood_type" name="blood_type" required>
                        <option>Select</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
            </div>

            <!-- Address Details -->
            <div class="wrapper">
                <div class="wrap">
                    <label for="place">House/Locality/Street:<span style="color:red">*</span></label>
                    <input type="text" id="place" name="place" required>
                </div>
                <div class="wrap">
                    <label for="town">Town/Village:<span style="color:red">*</span></label>
                    <input type="text" id="town" name="town" required>
                </div>
            </div>

            <div class="wrapper">
                <div class="wrap">
                    <label for="pin">PIN Code:<span style="color:red">*</span></label>
                    <input type="number" id="pin" name="pin" required>
                </div>
                <div class="wrap">
                    <label for="district">District:<span style="color:red">*</span></label>
                    <input type="text" id="district" name="district" required>
                </div>
            </div>

            <!-- Password Details -->
            <div class="wrapper">
                <div class="wrap">
                    <label for="pass">Password:<span style="color:red">*</span></label>
                    <input type="password" id="pass" name="pass" required>
                </div>
                <div class="wrap">
                    <label for="cpass">Confirm Password:<span style="color:red">*</span></label>
                    <input type="password" id="cpass" name="cpass" required>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="wrapper" style="justify-content: center;">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>

    <section class="footer">
        <p>&copy; 2024 Blood Donation Initiative. All rights reserved.</p>
    </section>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
