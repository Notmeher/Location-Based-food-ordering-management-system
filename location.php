<?php
  $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,"http://ip-api.com/json");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
  $result=curl_exec($ch);
  $result=json_decode($result);

    //displaying in array
    if($result->status=='success'){
      echo "Country - ".$result->country.'<br/>';
      echo "City - ".$result->city.'<br/>';
      echo "Time Zone - ".$result->timezone.'<br/>';
      echo "Region - ".$result->regionName.'<br/>';

    //session to get lat and longitude
    if(isset($result->lat) && isset($result->lon)){
      echo "Latitude - ".$result->lat.'<br/>';
      echo "Longitude - ".$result->lon.'<br/>';
    }
      echo "IP Address - ".$result->query.'<br/>';
    }
?>
