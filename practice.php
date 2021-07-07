<?php
         $user_ip = getenv('REMOTE_ADDR');
         echo $user_ip;

         $ip1= "154.32.97.172";
     
         $settings = [
             "apiKey" => "f51d9a40068b4981a5dd4956e789d15e",
             "ip" => "23.248.181.255",
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

         /*$user_ip = getenv('REMOTE_ADDR');
    $user_ip = "231.22.46.227";

    $geo = unserialize(file_get_contents("https://api.ipgeolocation.io/ipgeo?"));
    $country = $geo["geoplugin_countryName;"];
    $city = $geo["geoplugin_city;"];
    $region = $geo["geoplugin_region;"];
    
    echo $city;*/
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <iframe width="100%" height="500" src="https://maps.google.com/maps?q='lagos'" frameborder="0">
        
    </iframe>
</body>
</html>