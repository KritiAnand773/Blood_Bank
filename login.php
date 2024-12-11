<?php
    include './db_con.php';

    $passMiss = false;
    $userNotFound = false;
    $login = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $sql = "SELECT `fname` , `pass` FROM users where email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            if(password_verify($pass, $row['pass'])){
                echo "passwords match. LOGGED IN!";
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['name'] = $row['fname'];
                header("location:./home.php");
                exit();
            }
            else{
                $passMiss = true;
            }
        }
        else{
            $userNotFound = true;
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Blood Donation</title>
    <link rel="stylesheet" href="style.css">
    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

</head>
<body>
    <section id="register" >
        <section class="header">
            <nav>
                <ul>
                    <li>Blood Donation Initiative</li>
                    <li><a href="index.php">Home</a><a href="donor-register.php">Register</a></li>
                </ul>
            </nav>
        </section>

        <?php
            if($userNotFound){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> You do not have an account with us! .
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
        ?>

        <div class="log">
            <div class="login">
                <form action="" method="post">
                    <div class="email">
                        <label>Email</label><br>
                        <input type="email" name="email">
                        <div>
                            <div class="pass">
                                <label>Password</label><br>
                                <input type="password" name="password">
                            </div>
                        </div>
                        <button style="color: rgb(206, 212, 217);" class="sub">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>