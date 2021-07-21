<?php
    session_start();
    session_unset();
    //session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login">
        <img src="images/CU_LOGO.jpg" class="login-logo">

        <form action="" method="post">
        <input type="text" class="login-input" name="username" placeholder="Enter Unique pin here">
        <button type="submit" class="login-button">
            Sign In
        </button>

        <label class="sign-up">
            Don't have a unique number?
            <a href="registration.php">Sign Up</a>
            </label>
        </form>

        <?php
        if(isset($_POST['username'])  )    
        {
            $username= $_POST['username'];

            if($username == "" )
        {
            echo"<script>alert('Please fill in the blanc space!!')</script>";
        }
        else{
            $user = "root";
            $pass = "";
            $db ="nelson";
            $db = new mysqli('localhost',$user,$pass,$db) 
            or die("could not connect");

            $con1 = "SELECT * FROM reg 
            WHERE id = '$username'";

            $con1a = mysqli_query($db,$con1);
            
            $con1b = mysqli_fetch_assoc($con1a);

            $con1c = $con1b['id'];

            if($username == $con1c)
            {
                //session_start();
                $_SESSION['id'] = $con1c;
                
                      
                      echo "<script> alert('Login Succcessful') </script>";
                      
                   header("Location: main.php");
            }

            else
                {
                    echo"<script>alert('Password is incorrect')</script>";
                }
        }
        
        }
        
        ?>

    </div>

    <div class="scroll">
        <img src="images/firmbee-com-jrh5lAq-mIs-unsplash.jpg" class="scroll-image">

        <label class="scroll-label">
            Cu students Device Management System
        </label>
    </div>
</body>
</html>