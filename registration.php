<?php
            $user = "root";
            $pass = "";
            $db ="nelson";
            $db = new mysqli('localhost',$user,$pass,$db) 
            or die("could not connect");

            session_start();
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>


    <div id="registration"><!-- reg starts -->
        <form action="" method="post" class="reg-form"><!-- form starts -->
            <label class="reg-header">
                *Register here and get your unique 
                number*
            </label>
        
        <div class="reg-name">
                <label class="reg-name1">
                    Name
                </label>
                <input type="text" name="name" class="reg-name2" placeholder="Type your name here">

            </div>

            <div class="reg-matric">
            <label class="reg-name1">
                    Matric Number
                </label>
                <input type="text" name="matric" class="reg-name2" placeholder="Type your matric no here">

            </div>

            <div class="reg-hall">
            <label class="reg-name1">
                    Hall
                </label>

                <select name="hall" class="reg-name2">
                    <option value="none ">
                        hall
                    </option>

                    <option value="peter">
                        Peter
                    </option>

                    <option value="john">
                        john
                    </option>

                    <option value="paul">
                        Paul
                    </option>

                    <option value="joseph">
                        Joseph
                    </option>

                    <option value="daniel">
                        Daniel
                    </option>

                    <option value="mary">
                        Mary
                    </option>

                    <option value="deborah">
                        Deborah
                    </option>

                    <option value="dorcas">
                        Dorcas
                    </option>

                    <option value="hannah">
                        Hannah
                    </option>

                    <option value="peace">
                        Peace
                    </option>
                </select>
            </div>

            <div class="reg-level">
            <label class="reg-name1">
                    Level
                </label>
                
                <select name="level" class="reg-name2">
                    <option value="none ">
                        Level
                    </option>

                    <option value="100">
                        100
                    </option>

                    <option value="200">
                        200
                    </option>

                    <option value="300">
                        300
                    </option>

                    <option value="400">
                        400
                    </option>

                    <option value="500">
                        500
                    </option>

            
                </select>

            </div>

            <div class="reg-room">
            <label class="reg-name1">
                    Room Number
                </label>
                <input type="text" name="room" class="reg-name2" placeholder="Type your Room here">

            </div>

            <div class="reg-email">
            <label class="reg-name1">
                    Email adress
                </label>
                <input type="text" name="email" class="reg-name2" placeholder="Type your email here">
            </div>
            
            <div class="reg-reg">
            <label class="reg-name1">
                    REG NO
                </label>
                <input type="text" name="regno" class="reg-name2" placeholder="Type your reg no here">
            </div>

            <div class="reg-select">
            <label class="reg-name1">
                    Matric Check
                </label>
           <select name="check" class="reg-name2">
                    <option value="yes">
                        I have a matric number
                    </option>

                    <option value="no">
                        i dont have a matric number
                    </option>

            </select>
            </div>
            
            <input type="submit" value="REGISTER" class="reg-button">
        </form>

        <?php
        if(isset($_POST['name']) && isset($_POST['email'])   && isset($_POST['matric']) && isset($_POST['hall']) && isset($_POST['level']) && isset($_POST['room']) && isset($_POST['regno']) && isset($_POST['check']))
        { 
           // 
            $user = "root";
            $pass = "";
            $db ="nelson";
            $db = new mysqli('localhost',$user,$pass,$db)
             or die("could not connect");

             $name = $_POST['name'];
        $matric = $_POST['matric'];
        $email = $_POST['email'];
        $hall = $_POST['hall'];
        $level = $_POST['level'];
        $room = $_POST['room'];
        $regno = $_POST['regno'];
        $check = $_POST['check'];



        
        
        if($name == "" && $email == "" && $matric == "" && $hall == "" && $level == "" && $room == "" && $regno == "" )
        {
            echo"<script>alert('Please fill in the blanc spaces!!')</script>";
        }
        else{

            if($check == "yes")
            {

                if (strpos($matric, 'AA')!==false or strpos($matric, 'CH')!== false or strpos($matric, 'AB')!== false
                or strpos($matric, 'AC')!== false or strpos($matric, 'AD')!== false or strpos($matric, 'AE')!== false
                or strpos($matric, 'CG')!== false or strpos($matric, 'AF')!== false or strpos($matric, 'BG')!== false
                or strpos($matric, 'BE')!== false or strpos($matric, 'BC')!== false or strpos($matric, 'AH')!== false
                or strpos($matric, 'CJ')!== false or strpos($matric, 'AK')!== false or strpos($matric, 'AI')!== false
                or strpos($matric, 'BB')!== false or strpos($matric, 'CF')!== false or strpos($matric, 'CK')!== false
                or strpos($matric, 'CA')!== false or strpos($matric, 'CI')!== false or strpos($matric, 'CM')!== false
                or strpos($matric, 'CO')!== false or strpos($matric, 'CP')!== false or strpos($matric, 'CQ')!== false
                or strpos($matric, 'CC')!== false or strpos($matric, 'CE')!== false 
                ) {

        if (strpos($email, 'gmail.com')!==false or strpos($email, 'yahoo.com')!==false) 
    {
        $idnum = rand(1000,9999);

           
        $_SESSION['id'] = $idnum;
        

        $reg1 = "none";

      $insert = "INSERT INTO reg
      (name,matric,hall,level,room,email,id,regno) 
      VALUES ('$name','$matric','$hall','$level','$room','$email','$idnum','$reg1')" ;
        
        mysqli_query($db,$insert);

        //header("Location: main.php");

        echo"<script>
        location.href= 'main.php';
        </script>";
    }
    else 
    {
        echo"<script>alert('Invalid Email given')</script>";
    }

                   
                }

                else{
                    echo"<script>alert('This is not a valid matic no')</script>";
                }
                
           

            }
            else 
            {
        if (strpos($email, 'gmail.com')!==false or strpos($email, 'yahoo.com')!==false) 
        {
            $idnum = rand(1000,9999);

           
            $_SESSION['id'] = $idnum;


          $insert = "INSERT INTO reg
          (name,matric,hall,level,room,email,id,regno) 
          VALUES ('$name','$matric','$hall','$level','$room','$email','$idnum','$regno')" ;
            
            mysqli_query($db,$insert);

            //header("Location: main.php");

            echo"<script>
            location.href= 'main.php';
            </script>";
        }
        else{
            echo"<script>alert('Invalid Email given')</script>";
        }
               
    
            }
          
             
        }
    }

        ?>

        <!--<label class="unique1">
            <?php
            /*$id = $_SESSION['id'];
            ?>
            Your Unique ID is 
            
                <?php 
                echo"
                <label >
                $id
                </label>
                "*/
                ?>
            
        </label>-->
    </div><!-- reg ends -->

    <div id="bleed1"><!-- header starts-->
        <img src="images/CU_LOGO.jpg" class="bleed-logo">

       

        <label class="bleed-icon">
            Already Have a unique code? 
            <a href="login.php">Login</a>
        </label>
        
        
    </div><!-- header ends-->
</body>
</html>