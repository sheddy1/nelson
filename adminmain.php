<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin.css">

</head>
<body>
    <div id="header">
    <div id="header"><!-- header starts-->
        <img src="images/CU_LOGO.jpg" class="header-logo">

        <a href="adminlogin.php"><img src="images/icons8-exit-50.png" class="header-icon"></a>
        
        <?php
        session_start();

        $user="root";
        $pass="";
        $db="nelson";
        $db = new mysqli('localhost',$user,$pass,$db) 
        or die ("could not connect");
    
    //get photo val25 starts
    $id1 = $_SESSION['id1'];

    $val25= "SELECT * FROM adminreg WHERE user = '$id1' ";
            
                $val26 = mysqli_query($db,$val25);
            
                $val27 = mysqli_fetch_array($val26);
            
            $name = $val27['user'];



            echo"<label class='header-label'>
            Welcome $name
            </label>";
        ?>
    </div><!-- header ends-->
    </div>

    <div id="students">
        <label class="student_center">
            STUDENTS CENTER
        </label>

        <?php
        $user = "root";
        $pass = "";
        $db ="nelson";
        $db = new mysqli('localhost',$user,$pass,$db)
         or die("could not connect");

         

         $con1="SELECT * FROM reg ";

                $con1a = mysqli_query($db,$con1);

                $con1b  = mysqli_num_rows($con1a);
              
              $no1= $con1b;

              

        echo"<table class='studentreg-tablebody' border='1'>";

        echo"
            <tr>
            <td class='device1-label'>Name</td>
            <td class='device1-label'>Matric</td></td>
            <td class='device1-label'>Hall</td>
            <td class='head-label'>Level</td>
            <td class='head-label'>Room</td>
            <td class='head-label'>Email</td>
            <td class='head-label'>Unique Id</td>
            <td class='head-label'>Reg</td>
            
        </tr>
            
            ";

        for($x = 0; $x<$no1; $x++)
        {
           
            $row = mysqli_fetch_array($con1a);
            

            echo"<tr>";
            
            echo"<td class='device1-label'>".$row['name']."</td>";
            echo"<td  class='device1-label'>".$row['matric']."</td>";
            echo"<td  class='device1-label'>".$row['hall']."</td>";
            echo"<td  class='device1-label'>".$row['level']."</td>";
            echo"<td  class='device1-label'>".$row['room']."</td>";
            echo"<td  class='device1-label'>".$row['email']."</td>";
            echo"<td  class='device1-label'>".$row['id']."</td>";
            echo"<td  class='device1-label'>".$row['regno']."</td>";
            //echo"<td  class='device1-label'>".$row['sip']."</td>";

            echo"</tr>";
            
        }
            
        echo"</table>";
    ?>
       
        <div class="student-delete">
            <form action="" method="post">
            <label class="student-deletetop">
               *Delete Students from database*
            </label>
            
            <input type="text" name="delete" class="student-delete-input" placeholder="Unique ID">

            <input type="submit" class="student-delete-button" value="Delete">
            </form>

            <?php
                if(isset($_POST['delete']))
                {
                    $delete = $_POST['delete'];

                    $user = "root";
            $pass = "";
            $db ="nelson";
            $db = new mysqli('localhost',$user,$pass,$db)
             or die("could not connect");

             $delete1 = "DELETE FROM reg WHERE id='$delete'";
             mysqli_query($db, $delete1);
                }
            ?>
        </div>

        <div class="student-check">
            <form action="" method="post" class="student-check-form">
             <input type="text" class="student-check-i" placeholder="Enter unique code to check" name="stu"> 
            <br>

             <button class="student-check-b" type= "submit">
                Check Values
            </button>

            </form>
            
            <?php
                if(isset($_POST['stu']))
                {
                    $stu= $_POST['stu'];

                    $_SESSION['stud'] = $stu;

                   
                }
            ?>

            <?php
                $user = "root";
                $pass = "";
                $db ="nelson";
                $db = new mysqli('localhost',$user,$pass,$db)
                 or die("could not connect");

                 $stu = $_SESSION['stud']; 

                 $con1="SELECT * FROM reg where id='$stu' ";

                $con1a = mysqli_query($db,$con1);

                $row = mysqli_fetch_array($con1a);

                $name =$row['name'];

                $mat =$row['matric'];

                $reg =$row['regno'];

                echo"
                <div class='sname'>
                <label>
                    Name
                </label> <br>
                
                $name

                </div>
                ";

                echo"
                <div class='smat'>
                <label>
                    Matric Number number
                </label> <br>
                
                $mat

                $reg

                </div>
                ";
            ?>


            
        </div>

        <div class="student-add">
            <label class='student-add-top'>
                *Register Student*
            </label>

            <form action="" method="post">
                <div class="student-add-name">
                    <label class="student-add-name1">
                        Name
                    </label>

                    <input type="text" name="name1" class="student-add-name2">
                </div>

                <div class="student-add-matric">
                    <label class="student-add-name1">
                        Matric
                    </label>

                    <input type="text" name="matric1" class="student-add-name2">
                </div>

                <div class="student-add-hall">
                    <label class="student-add-name1">
                        Hall
                    </label>

                    <input type="text" name="hall1" class="student-add-name2">
                </div>

                <div class="student-add-level">
                    <label class="student-add-name1">
                        Level
                    </label>

                    <input type="text" name="level1" class="student-add-name2">
                </div>

                <div class="student-add-room">
                    <label class="student-add-name1">
                        Room
                    </label>

                    <input type="text" name="room1" class="student-add-name2">
                </div>

                <div class="student-add-email">
                    <label class="student-add-name1">
                        Email
                    </label>
                    

                    <input type="text" name="email1" class="student-add-name2">
                </div>

                <div class="student-add-reg">
                    <label class="student-add-name1">
                        Reg Number
                    </label>
                    

                    <input type="text" name="regno" class="student-add-name2">
                </div>

                <div class="student-add-check">
                    <label class="student-add-name1">
                        Matric Check
                    </label>
                    

                    <select name="check" class="student-add-name2">
                    <option value="yes">
                        Student has matric number
                    </option>

                    <option value="no">
                        Student does not have a matric number
                    </option>

            </select>
                </div>

                <input type="submit" class="student-add-button" value="Register">

                
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
        </div>
    </div>

    <div id="device">
        <label class="student_center">
            Device Center
        </label>

        <?php
        $user = "root";
        $pass = "";
        $db ="nelson";
        $db = new mysqli('localhost',$user,$pass,$db)
         or die("could not connect");

         

         $con1="SELECT * FROM device ";

                $con1a = mysqli_query($db,$con1);

                $con1b  = mysqli_num_rows($con1a);
              
              $no1= $con1b;

              

        echo"<table class='studentreg-tablebody' border='1'>";

        echo"
            <tr>
            <td class='device1-label'>Name</td>
            <td class='device1-label'>Serial Number</td></td>
            <td class='device1-label'>Date Registered</td>
            <td class='head-label'>Color</td>
            <td class='head-label'>Marks</td>
            <td class='head-label'>IP enterd</td>
            <td class='head-label'>Unique Id</td>
            <td class='head-label'>Device Id</td>
            <td class='head-label'>Generated Ip</td>
            <td class='head-label'>Device type</td>
            
        </tr>
            
            ";

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
            echo"<td  class='device1-label'>".$row['id']."</td>";
            echo"<td  class='device1-label'>".$row['did']."</td>";
            echo"<td  class='device1-label'>".$row['sip']."</td>";
            echo"<td  class='device1-label'>".$row['type']."</td>";

            echo"</tr>";
            
        }
            
        echo"</table>";
    ?>
       
        <div class="student-delete">
            <form action="" method="post">
            <label class="student-deletetop">
               *Delete Device from database*
            </label>
            
            <input type="text" name="delete" class="student-delete-input" placeholder="Device ID">

            <input type="submit" class="student-delete-button" value="Delete">
            </form>

            <?php
                if(isset($_POST['delete']))
                {
                    $delete = $_POST['delete'];

                    $user = "root";
            $pass = "";
            $db ="nelson";
            $db = new mysqli('localhost',$user,$pass,$db)
             or die("could not connect");

             $delete1 = "DELETE FROM device WHERE did='$delete'";
             mysqli_query($db, $delete1);
                }
            ?>
        </div>

        <div class="student-check">
            <form action="" method="post" class="student-check-form">
             <input type="text" class="student-check-i" placeholder="Enter Device ID to check" name="stu"> 
            <br>

             <button class="student-check-b" type= "submit">
                Check Values
            </button>

            </form>
            
            <?php
                if(isset($_POST['stu']))
                {
                    $stu= $_POST['stu'];

                    $_SESSION['did'] = $stu;

                   
                }
            ?>

            <?php
                $user = "root";
                $pass = "";
                $db ="nelson";
                $db = new mysqli('localhost',$user,$pass,$db)
                 or die("could not connect");

                 $stu = $_SESSION['did']; 

                 $con1="SELECT * FROM device where did='$stu' ";

                $con1a = mysqli_query($db,$con1);

                $row = mysqli_fetch_array($con1a);

                $name =$row['name'];

                $mat =$row['type'];

                $reg =$row['id'];

                echo"
                <div class='sname'>
                <label>
                    Name
                </label> <br>
                
                $name

                </div>
                ";

                echo"
                <div class='smat'>
                <label>
                    Device Type and Unique Id
                </label> <br>
                
                $mat

                $reg

                </div>
                ";
            ?>


            
        </div>

        <div class="student-add">
            <label class='student-add-top'>
                *Register Student*
            </label>

            <form action="" method="post">
                <div class="student-add-name">
                    <label class="student-add-name1">
                        Name
                    </label>

                    <input type="text" name="name1" class="student-add-name2">
                </div>

                <div class="student-add-matric">
                    <label class="student-add-name1">
                        Matric
                    </label>

                    <input type="text" name="matric1" class="student-add-name2">
                </div>

                <div class="student-add-hall">
                    <label class="student-add-name1">
                        Hall
                    </label>

                    <input type="text" name="hall1" class="student-add-name2">
                </div>

                <div class="student-add-level">
                    <label class="student-add-name1">
                        Level
                    </label>

                    <input type="text" name="level1" class="student-add-name2">
                </div>

                <div class="student-add-room">
                    <label class="student-add-name1">
                        Room
                    </label>

                    <input type="text" name="room1" class="student-add-name2">
                </div>

                <div class="student-add-email">
                    <label class="student-add-name1">
                        Email
                    </label>

                    <input type="text" name="email1" class="student-add-name2">
                </div>

                <input type="submit" class="student-add-button" value="Register">

        <?php
            if(isset($_POST['name1']) && isset($_POST['matric1'])   && isset($_POST['hall1']) && isset($_POST['level1']) && isset($_POST['room1']) && isset($_POST['email1']))
                {
                    $user = "root";
            $pass = "";
            $db ="nelson";
            $db = new mysqli('localhost',$user,$pass,$db)
             or die("could not connect");

             $name1 = $_POST['name1'];
        $matric1 = $_POST['matric1'];
        $hall1= $_POST['hall1'];
        $level1 = $_POST['level1'];
        $room1 = $_POST['room1'];
        $email1= $_POST['email1'];

        if($name1 == "" && $matric1 == "" && $hall1 == "" && $level1 == "" && $room1 = "" && $email1 == "")
        {
            echo"<script>alert('Please fill in the blanc spaces!!')</script>";
        }
        else{
            $idnum = rand(1000,9999);

             $insert = "INSERT INTO reg
            (name,matric,hall,level,room,email,id) 
            VALUES ('$name1','$matric1','$hall1','$level1','$room1','$email1','$idnum')" ;
              
              mysqli_query($db,$insert);
              
        }

                }
        ?>
            </form>
        </div>
    </div>

    
  

    <div id="device">
        <label class="student_center">
            Device Center
        </label>

        <?php
        $user = "root";
        $pass = "";
        $db ="nelson";
        $db = new mysqli('localhost',$user,$pass,$db)
         or die("could not connect");

         

         $con1="SELECT * FROM device ";

                $con1a = mysqli_query($db,$con1);

                $con1b  = mysqli_num_rows($con1a);
              
              $no1= $con1b;

              

        echo"<table class='studentreg-tablebody' border='1'>";

        echo"
            <tr>
            <td class='device1-label'>Name</td>
            <td class='device1-label'>Serial Number</td></td>
            <td class='device1-label'>Date Registered</td>
            <td class='head-label'>Color</td>
            <td class='head-label'>Marks</td>
            <td class='head-label'>IP enterd</td>
            <td class='head-label'>Unique Id</td>
            <td class='head-label'>Device Id</td>
            <td class='head-label'>Generated Ip</td>
            <td class='head-label'>Device type</td>
            
        </tr>
            
            ";

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
            echo"<td  class='device1-label'>".$row['id']."</td>";
            echo"<td  class='device1-label'>".$row['did']."</td>";
            echo"<td  class='device1-label'>".$row['sip']."</td>";
            echo"<td  class='device1-label'>".$row['type']."</td>";

            echo"</tr>";
            
        }
            
        echo"</table>";
    ?>
       
        <div class="student-delete">
            <form action="" method="post">
            <label class="student-deletetop">
               *Delete Device from database*
            </label>
            
            <input type="text" name="delete" class="student-delete-input" placeholder="Device ID">

            <input type="submit" class="student-delete-button" value="Delete">
            </form>

            <?php
                if(isset($_POST['delete']))
                {
                    $delete = $_POST['delete'];

                    $user = "root";
            $pass = "";
            $db ="nelson";
            $db = new mysqli('localhost',$user,$pass,$db)
             or die("could not connect");

             $delete1 = "DELETE FROM device WHERE did='$delete'";
             mysqli_query($db, $delete1);
                }
            ?>
        </div>

        <div class="student-check">
            <form action="" method="post" class="student-check-form">
             <input type="text" class="student-check-i" placeholder="Enter Device ID to check" name="stu"> 
            <br>

             <button class="student-check-b" type= "submit">
                Check Values
            </button>

            </form>
            
            <?php
                if(isset($_POST['stu']))
                {
                    $stu= $_POST['stu'];

                    $_SESSION['did'] = $stu;

                   
                }
            ?>

            <?php
                $user = "root";
                $pass = "";
                $db ="nelson";
                $db = new mysqli('localhost',$user,$pass,$db)
                 or die("could not connect");

                 $stu = $_SESSION['did']; 

                 $con1="SELECT * FROM device where did='$stu' ";

                $con1a = mysqli_query($db,$con1);

                $row = mysqli_fetch_array($con1a);

                $name =$row['name'];

                $mat =$row['type'];

                $reg =$row['id'];

                echo"
                <div class='sname'>
                <label>
                    Name
                </label> <br>
                
                $name

                </div>
                ";

                echo"
                <div class='smat'>
                <label>
                    Device Type and Unique Id
                </label> <br>
                
                $mat

                $reg

                </div>
                ";
            ?>


            
        </div>

        <div class="student-add">
            <label class='student-add-top'>
                *Register Student*
            </label>

            <form action="" method="post">
                <div class="student-add-name">
                    <label class="student-add-name1">
                        Name
                    </label>

                    <input type="text" name="name1" class="student-add-name2">
                </div>

                <div class="student-add-matric">
                    <label class="student-add-name1">
                        Matric
                    </label>

                    <input type="text" name="matric1" class="student-add-name2">
                </div>

                <div class="student-add-hall">
                    <label class="student-add-name1">
                        Hall
                    </label>

                    <input type="text" name="hall1" class="student-add-name2">
                </div>

                <div class="student-add-level">
                    <label class="student-add-name1">
                        Level
                    </label>

                    <input type="text" name="level1" class="student-add-name2">
                </div>

                <div class="student-add-room">
                    <label class="student-add-name1">
                        Room
                    </label>

                    <input type="text" name="room1" class="student-add-name2">
                </div>

                <div class="student-add-email">
                    <label class="student-add-name1">
                        Email
                    </label>

                    <input type="text" name="email1" class="student-add-name2">
                </div>

                <input type="submit" class="student-add-button" value="Register">

        <?php
            if(isset($_POST['name1']) && isset($_POST['matric1'])   && isset($_POST['hall1']) && isset($_POST['level1']) && isset($_POST['room1']) && isset($_POST['email1']))
                {
                    $user = "root";
            $pass = "";
            $db ="nelson";
            $db = new mysqli('localhost',$user,$pass,$db)
             or die("could not connect");

             $name1 = $_POST['name1'];
        $matric1 = $_POST['matric1'];
        $hall1= $_POST['hall1'];
        $level1 = $_POST['level1'];
        $room1 = $_POST['room1'];
        $email1= $_POST['email1'];

        if($name1 == "" && $matric1 == "" && $hall1 == "" && $level1 == "" && $room1 = "" && $email1 == "")
        {
            echo"<script>alert('Please fill in the blanc spaces!!')</script>";
        }
        else{
            $idnum = rand(1000,9999);

             $insert = "INSERT INTO reg
            (name,matric,hall,level,room,email,id) 
            VALUES ('$name1','$matric1','$hall1','$level1','$room1','$email1','$idnum')" ;
              
              mysqli_query($db,$insert);
              
        }

                }
        ?>
            </form>
        </div>
    </div>

<div class="device-track">
<?php
    $user = "root";
    $pass = "";
    $db ="nelson";
    $db = new mysqli('localhost',$user,$pass,$db)
     or die("could not connect");

     

     $con1="SELECT * FROM track";

            $con1a = mysqli_query($db,$con1);

            $con1b  = mysqli_num_rows($con1a);
          
          $no1= $con1b;

          

    echo"<table  border='1'>";

    echo"
        <tr>
        <td class='head-label'>Date of Login</td>
        <td class='head-label'>Time of Login</td></td>
        <td class='head-label'>Details of Login</td>
        <td class='head-label'>Device Used</td>
        <td class='head-label'>Ip Adress</td>
        <td class='head-label'>Operating System </td>
        <td class='head-label'>Unique Id </td>
    </tr>
        
        ";

    for($x = 0; $x<$no1; $x++)
    {
       
        $row = mysqli_fetch_array($con1a);
        

        echo"<tr>";
        
        echo"<td class='device1-label'>".$row['date']."</td>";
        echo"<td  class='device1-label'>".$row['time']."</td>";
        echo"<td  class='device1-label'>".$row['detail']."</td>";
        echo"<td  class='device1-label'>".$row['device']."</td>";
        echo"<td  class='device1-label'>".$row['ip']."</td>";
        echo"<td  class='device1-label'>".$row['os']."</td>";
        echo"<td  class='device1-label'>".$row['id']."</td>";
        //echo"<td  class='device1-label'>".$row['type']."</td>";
        //echo"<td  class='device1-label'>".$row['sip']."</td>";

        echo"</tr>";
        
    }
        
    echo"</table>";
?>
</div>


    <div id="track">
    <label class="track-header">
       *Track your Device*
    </label>

    <label class="track-steps">
        Step1: input IP Adress. Step2: 
        input logitude and latitude
    </label>

    <form action="" method="post" class="ipadress">
        <input type="text" name="ip" class="ipadress-input">
        
        <input type="submit" value="Get Co-ordinates" class="ipadress-button">

        
    </form>

    <div class="coordinates">
        <?php
        if(isset($_POST['ip']))
        {
            $ip = $_POST['ip'];

            if($name == "")
            {
                echo"<script>alert('Please input the right ip Adress')</script>";
            }
            else{

                $user_ip = getenv('REMOTE_ADDR');
         echo $user_ip;

         $ip1= "$ip";
     
         $settings = [
             "apiKey" => "f51d9a40068b4981a5dd4956e789d15e",
             "ip" => "$ip",
             "lang" => "en",
             "fields" => "*"
         ];
     
         $url = "https://api.ipgeolocation.io/ipgeo?";
      
         foreach($settings as $k=>$v) 
         {  
             $url .= urlencode($k) . "=" . urlencode($v) . "&";
     
         } 
     
         $url = substr($url, 0, -1);
     
         $ch =  curl_init();
     
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     
         $result= curl_exec($ch);
         if(curl_errno($ch))
         {
             echo curl_error($ch);
         }
         else{
             $result = json_decode($result, 1);
             print_r($result);
             echo" \n";
         }
     
         curl_close($ch);
            }

        }
        ?>


    </div >

    <form action="" method="post" class="corordinates-input">
    <input type="text" name="cord1" class="corordinates-input1" placeholder="longitude">
    <input type="text" name="cord2" class="corordinates-input2" placeholder="latitude">  
    
        <input type="submit" value="Get Location" class="corordinates-button">
    </form>

    <div class="google">

    <?php
    if(isset($_POST['cord1']) && isset($_POST['cord2']))
        {
            $cord1 = $_POST['cord1'];
            $cord2 = $_POST['cord2'];
            
            if($cord1 == "" && $cord2="")
            {
                echo"<script>alert('Please input the right ip Adress')</script>";
            }
            else{
                echo"
                <iframe class='google1' src='https://maps.google.com/maps?q=$cord1, $cord2 &output=embed' frameborder='0'>
        
                    </iframe>
                ";
            }
        }

        ?>
    </div>
</body>
</html>