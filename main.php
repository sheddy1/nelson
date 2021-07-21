<?php
    session_start();

    $id = $_SESSION['id'];

      echo"<script>
      alert('Your unique ID is: $id')
      </script>";

      //track save code

      

      $user_ip = getenv('REMOTE_ADDR');
      //echo $user_ip;

      $ip1= "";
  
      $settings = [
          "apiKey" => "f51d9a40068b4981a5dd4956e789d15e",
          "ip" => "$ip1",
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
         // $_SESSION['detail'] = $result;
         require('userinfo.php');

         $user = "root";
            $pass = "";
            $db ="nelson";
            $db = new mysqli('localhost',$user,$pass,$db)
             or die("could not connect");

          $device =  UserInfo::get_device();
    
          
        
          $date = date("d/m/Y");
          $time = date("h:i:sa");
          $ip = UserInfo::get_ip();
          $os = UserInfo::get_os();
          $id = $_SESSION['id'];
          $detail = implode(" ",$result);

          $insert = "INSERT INTO track
            (date,time,detail,device,ip,os,id) 
            VALUES ('$date','$time','$detail','$device','$ip','$os','$id')"  ;
              
              mysqli_query($db,$insert);

          //print_r($result);
          echo"<br> \n";
      }
  
      curl_close($ch);

    

    
    
      
?>

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

        <a href="login.php"><img src="images/icons8-exit-50.png" class="header-icon"></a>
        
        <?php
        //session_start();

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

            <div class="reg-select">
            <label class="reg-name1">
                    Device Type
                </label>
               
            <select name="check" class="reg-name2">
                    <option value="laptop">
                        Laptop
                    </option>

                    <option value="tablet">
                        Tablet
                    </option>

                    <option value="ipod">
                        Ipod
                    </option>

            </select>
            </div>

            
            <input type="submit" value="REGISTER" class="reg-button">
        </form>

<?php
        if(isset($_POST['name']) && isset($_POST['serial'])   && isset($_POST['date']) && isset($_POST['color']) && isset($_POST['marks']) && isset($_POST['ip']) && isset($_POST['check']))
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
        $check = $_POST['check'];

        if($name == "" && $serial == "" && $date == "" && $color == "" && $mark == "" && $ip == "" && $check == "")
        {
            echo"<script>alert('Please fill in the blanc spaces!!')</script>";
        }
        else{
            $idnum = $_SESSION['id'];
            $idnum1 = rand(10000,99999);
            $sip = getenv('REMOTE_ADDR');

            
            $insert = "INSERT INTO device
            (name,serial,date,color,marks,ip,id,did,sip,type) 
            VALUES ('$name',' $serial','$date','$color','$marks','$ip','$idnum','$idnum1', '$sip','$check')"  ;
              
              mysqli_query($db,$insert);

              //echo"<script>alert('Your device has been registered')</script>";
        }


        }
        

        ?>
        
</div>


<div id="device">

    <!--<table  class="head" border="1">
        <tr>
            <td class="head-label">sdsd</td>
            <td class="head-label">sdsd</td>
            <td class="head-label">sdsd</td>
            <td class="head-label">sdsd</td>
            <td class="head-label">sdsd</td>
            <td class="head-label">sdsd</td>
            <td class="head-label">sdsd</td>
            <td class="head-label">sdsd</td>
        </tr>
    </table>-->


    <?php
        $user = "root";
        $pass = "";
        $db ="nelson";
        $db = new mysqli('localhost',$user,$pass,$db)
         or die("could not connect");

         $id = $_SESSION['id'];

         $con1="SELECT * FROM device WHERE id = '$id'";

                $con1a = mysqli_query($db,$con1);

                $con1b  = mysqli_num_rows($con1a);
              
              $no1= $con1b;

              

        echo"<table class='device1' border='1'>";

        echo"
            <tr>
            <td class='head-label'>Device Name</td>
            <td class='head-label'>Serial Number</td></td>
            <td class='head-label'>Date</td>
            <td class='head-label'>Color</td>
            <td class='head-label'>Marks</td>
            <td class='head-label'>Ip Adress</td>
            <td class='head-label'>Device Id</td>
            <td class='head-label'>Type</td>
            
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
            echo"<td  class='device1-label'>".$row['did']."</td>";
            echo"<td  class='device1-label'>".$row['type']."</td>";
            //echo"<td  class='device1-label'>".$row['sip']."</td>";

            echo"</tr>";
            
        }
            
        echo"</table>";
    ?>
</div>

<div id = "track-table">
        <?php
        $user = "root";
        $pass = "";
        $db ="nelson";
        $db = new mysqli('localhost',$user,$pass,$db)
         or die("could not connect");

         $id = $_SESSION['id'];

         $con1="SELECT * FROM track WHERE id = '$id'";

                $con1a = mysqli_query($db,$con1);

                $con1b  = mysqli_num_rows($con1a);
              
              $no1= $con1b;

              

        echo"<table class='device1' border='1'>";

        echo"
            <tr>
            <td class='head-label'>Date of Sign in</td>
            <td class='head-label'>Time of sign in</td></td>
            <td class='head-label'>Details</td>
            <td class='head-label'>Device Used</td>
            <td class='head-label'>IP Adress</td>
            <td class='head-label'>Operating System</td>
            <td class='head-label'>ID Number</td>
            
            
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
         //echo $user_ip;

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
             echo"<br> \n";
         }
     
         curl_close($ch);
            }

        }
        ?>


    </div >

    <form action="" method="post" class="corordinates-input">
    <input type="text" name="cord1" class="corordinates-input1" placeholder="latitude">
    <input type="text" name="cord2" class="corordinates-input2" placeholder="longitude">  
    
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
   
</div>
</body>
</html>