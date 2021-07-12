<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="adminlogin.css">
</head>
<body>
    <div id="login">
        <img src="images/CU_LOGO.jpg" class="login-logo">

        <form action="" method="post">
        <div class="username">
            <label class="username-label">
                Username
            </label>

            <input type="text" name="username" class="username-input">
        </div>

        <div class="password">
            <label class="username-label">
                Password
            </label>

            <input type="password" name="password" class="username-input">
        </div>

        <input type="submit" class="button" value="Sign In">

        </form>
        
        <?php
            if(isset($_POST['username']) && isset($_POST['password']) )    
            {
                $user1= $_POST['username'];
        $pass1 = $_POST['password'];

        if($user1 == "" && $pass1 == "")
        {
            echo"<script>alert('Please fill in the blanc spaces!!')</script>";
        }
        else
        {
            $user = "root";
        $pass = "";
        $db ="nelson";
        $db = new mysqli('localhost',$user,$pass,$db)
         or die("could not connect");

         $con1 = "SELECT * FROM adminreg  WHERE user = '$user1'";

            $con1a = mysqli_query($db,$con1);
            
            $con1b = mysqli_fetch_assoc($con1a);

            $con1c = $con1b['user'];

            $con1d = $con1b['pass'];

            if($user1 == $con1c)
            {
                if($pass1 === $con1d)
                {
                    session_start();
              $_SESSION['id1'] = $con1c;

              echo "<script> alert('Login Succcessful') </script>";
                    
                 header("Location: adminmain.php");
                }
                else{
                    echo"<script>alert('Password is incorrect')</script>";
                }
            }
            else{
                echo"<script>alert('username does not exist!')</script>";
            }
        }
            }
        ?>
    </div>
</body>
</html>