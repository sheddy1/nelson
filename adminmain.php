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
            echo"<table class='studentreg-table' border='1'>";

            echo"<tr class='studentreg-tabletop'>
            <td class='studentreg-tabletop1'>
                *Students Registered*
            </td>
            </tr>";

            echo"<tr class='studentreg-tablebodyh'>";
            
            echo"<td class='studentreg-tablebodyh1'>
                name
            </td>";

            echo"<td class='studentreg-tablebodyh1'>
                matric
            </td>";

            echo"<td class='studentreg-tablebodyh1'>
                hall
            </td>";

            echo"<td class='studentreg-tablebodyh1'>
                level
            </td>";

            echo"<td class='studentreg-tablebodyh1'>
                room
            </td>";

            

            echo"<td class='studentreg-tablebodyh1'>
                email
            </td>";

            echo"<td class='studentreg-tablebodyh1'>
                unique Id
            </td>";

            echo"</tr>";

            echo"<table class='studentreg-tablebody' border='1'>";

            $user = "root";
        $pass = "";
        $db ="nelson";
        $db = new mysqli('localhost',$user,$pass,$db)
         or die("could not connect");

         $con1="SELECT * FROM reg";

                $con1a = mysqli_query($db,$con1);

                $con1b  = mysqli_num_rows($con1a);
              
              $no1= $con1b;
            
            for($x = 0; $x<$no1; $x++)
        {
            $row = mysqli_fetch_array($con1a);

            echo"<tr class='device1-label'>";

            echo"<td class='device1-label'>".$row['name']."</td>";
            echo"<td class='device1-label'>".$row['matric']."</td>";

            echo"<td class='device1-label'>".$row['hall']."</td>";

            echo"<td class='device1-label'>".$row['level']."</td>";
            echo"<td class='device1-label'>".$row['room']."</td>";
            echo"<td class='device1-label'>".$row['email']."</td>";
            echo"<td class='device1-label'>".$row['id']."</td>";
            


            echo"</tr>";
            
        }

            
            echo"</table>";
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
            Device CENTER
        </label>

        <?php  
            echo"<table class='studentreg-table' border='1'>";

            echo"<tr class='studentreg-tabletop'>
            <td class='studentreg-tabletop1'>
                *device Registered*
            </td>
            </tr>";

            echo"<tr class='studentreg-tablebodyh'>";
            
            echo"<td class='studentreg-tablebodyh1'>
                name
            </td>";

            echo"<td class='studentreg-tablebodyh1'>
                Serial
            </td>";

            echo"<td class='studentreg-tablebodyh1'>
                Date
            </td>";

            echo"<td class='studentreg-tablebodyh1'>
                color
            </td>";

            echo"<td class='studentreg-tablebodyh1'>
                marks
            </td>";

            

            echo"<td class='studentreg-tablebodyh1'>
                ip
            </td>";

            echo"<td class='studentreg-tablebodyh1'>
                unique Id
            </td>";
            echo"<td class='studentreg-tablebodyh1'>
                Device Id
            </td>";

            echo"</tr>";

            echo"<table class='studentreg-tablebody' border='1'>";

            $user = "root";
        $pass = "";
        $db ="nelson";
        $db = new mysqli('localhost',$user,$pass,$db)
         or die("could not connect");

         $con1="SELECT * FROM device";

                $con1a = mysqli_query($db,$con1);

                $con1b  = mysqli_num_rows($con1a);
              
              $no1= $con1b;
            
            for($x = 0; $x<$no1; $x++)
        {
            $row = mysqli_fetch_array($con1a);

            echo"<tr class='device1-label'>";

            echo"<td class='device1-label'>".$row['name']."</td>";
            echo"<td class='device1-label'>".$row['serial']."</td>";

            echo"<td class='device1-label'>".$row['date']."</td>";

            echo"<td class='device1-label'>".$row['color']."</td>";
            echo"<td class='device1-label'>".$row['marks']."</td>";
            echo"<td class='device1-label'>".$row['ip']."</td>";
            echo"<td class='device1-label'>".$row['id']."</td>";
            echo"<td class='device1-label'>".$row['did']."</td>";


            echo"</tr>";
            
        }

            
            echo"</table>";
            echo"</table>";

        ?>

        <div class="student-delete">
            <form action="" method="post">
            <label class="student-deletetop">
               *Delete Device from database*
            </label>
            
            <input type="text" name="delete_device" class="student-delete-input" placeholder="Unique ID">

            <input type="submit" class="student-delete-button" value="Delete">
            </form>

            <?php
                if(isset($_POST['delete_device']))
                {
                    $delete_device = $_POST['delete_device'];

                    $user = "root";
            $pass = "";
            $db ="nelson";
            $db = new mysqli('localhost',$user,$pass,$db)
             or die("could not connect");

             $delete1 = "DELETE FROM device WHERE did='$delete_device'";
             mysqli_query($db, $delete1);
             //header("Refresh: 1");
                }
            ?>
        </div>

        <div class="student-add">
            <label class='student-add-top'>
                *Register device*
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
                        serial
                    </label>

                    <input type="text" name="matric1" class="student-add-name2">
                </div>

                <div class="student-add-hall">
                    <label class="student-add-name1">
                        Date
                    </label>

                    <input type="text" name="hall1" class="student-add-name2">
                </div>

                <div class="student-add-level">
                    <label class="student-add-name1">
                        color
                    </label>

                    <input type="text" name="level1" class="student-add-name2">
                </div>

                <div class="student-add-room">
                    <label class="student-add-name1">
                        Marks
                    </label>

                    <input type="text" name="room1" class="student-add-name2">
                </div>

                <div class="student-add-email">
                    <label class="student-add-name1">
                        Ip Adress
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
            $idnum1 = rand(1000,9999);

             $insert = "INSERT INTO device
            (name,serial,date,color,marks,ip,id,did) 
            VALUES ('$name1','$matric1','$hall1','$level1','$room1','$email1','$idnum','$idnum1')" ;
              
              mysqli_query($db,$insert);
              
        }

                }
        ?>
            </form>
        </div>
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