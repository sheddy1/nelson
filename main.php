<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
        <link rel="stylesheet" href="main.css">

        <style>
          

        </style>
</head>
<body>
<?php
        //echo "<script> alert('Login Succcessful') </script>";
    ?>

<div id="header"><!-- header starts-->
        <img src="images/CU_LOGO.jpg" class="header-logo">

        <img src="images/user.png" class="header-icon">
        
        <?php
        session_start();

        $user="root";
        $pass="";
        $db="nelson";
        $db = new mysqli('localhost',$user,$pass,$db) or die ("could not connect");
    
    //get photo val25 starts
    $id = $_SESSION['id'];

    $val25= "SELECT * FROM reg WHERE id = $id ";
            
                $val26 = mysqli_query($db,$val25);
            
                $val27 = mysqli_fetch_array($val26);
            
            $name = $val27['name'];



            echo"<label class='header-label'>
            Welcome $name
            </label>";
        ?>
    </div><!-- header ends-->

    <div id="register"><!-- register starts-->
    
    <form action="" method="post" class="reg-form"><!-- form starts -->
            <label class="reg-header">
                *REGISTER YOUR DEVICE HERE*
            </label>
        
        <div class="reg-name">
                <label class="reg-name1">
                     Name of device
                </label>
                <input type="text" name="name" class="reg-name2" placeholder="Type device name here">

            </div>

            <div class="reg-matric">
            <label class="reg-name1">
                    Serial Number
                </label>
                <input type="text" name="serial" class="reg-name2" placeholder="Type your serial no here">

            </div>

            <div class="reg-hall">
            <label class="reg-name1">
                    Date
                </label>

                <input type="text" name="date" class="reg-name2" placeholder="Type in the date here">

            </div>

            <div class="reg-level">
            <label class="reg-name1">
                    Color
                </label>

                <input type="text" name="color" class="reg-name2" placeholder="Type in the color here">

            </div>

            <div class="reg-room">
            <label class="reg-name1">
                    Notable Marks
                </label>
                <input type="text" name="marks" class="reg-name2" placeholder="Type notable marks here">

            </div>

            <div class="reg-email">
            <label class="reg-name1">
                    IP adress
                </label>
                <input type="text" name="ip" class="reg-name2" placeholder="Type your IP Adress here">
            </div>

            
            <input type="submit" value="REGISTER" class="reg-button">
        </form>

<?php
        if(isset($_POST['name']) && isset($_POST['serial'])   && isset($_POST['date']) && isset($_POST['color']) && isset($_POST['marks']) && isset($_POST['ip']))
        { 
            $user = "root";
            $pass = "";
            $db ="nelson";
            $db = new mysqli('localhost',$user,$pass,$db)
             or die("could not connect");

             $name = $_POST['name'];
        $serial = $_POST['serial'];
        $date = $_POST['date'];
        $color = $_POST['color'];
        $marks = $_POST['marks'];
        $ip = $_POST['ip'];

        if($name == "" && $serial == "" && $date == "" && $color == "" && $mark == "" && $ip == "")
        {
            echo"<script>alert('Please fill in the blanc spaces!!')</script>";
        }
        else{
            $idnum = rand(10000,99999);

            
            /*$insert = "INSERT INTO device
            (name,serial,date,color,marks,ip,id) 
            VALUES ('$name','$serial','$date','$color','$marks','$ip','$idnum')" ;
              
              mysqli_query($db,$insert);*/

              //echo"<script>alert('Your device has been registered')</script>";
        }


        }
        

        ?>
        
</div>


<div id="device">


    <?php
        $user = "root";
        $pass = "";
        $db ="nelson";
        $db = new mysqli('localhost',$user,$pass,$db)
         or die("could not connect");

         $id = $_SESSION['id'];

         $con1="SELECT * FROM device";

                $con1a = mysqli_query($db,$con1);

                $con1b  = mysqli_num_rows($con1a);
              
              $no1= $con1b;

              echo $no1;

        echo"<table class='device1' border='1'>";

        for($x = 0; $x<$no1; $x++)
        {
           
            $row = mysqli_fetch_array($con1a);
            echo"<tr>";
            
            echo"<td class='device1-label'>".$row['name']."</td>";
            echo"<td  class='device1-label'>".$row['serial']."</td>";
            echo"<td  class='device1-label'>".$row['date']."</td>";
            echo"<td  class='device1-label'>".$row['color']."</td>";
            echo"<td  class='device1-label'>".$row['marks']."</td>";
            echo"<td  class='device1-label'>".$row['ip']."</td>";
            echo"<td  class='device1-label'> #".$row['id']."</td>";
           
            echo"</tr>";
            
        }
            
        echo"</table>";
    ?>
</div>

<div id="track">
    
</div>
</body>
</html>