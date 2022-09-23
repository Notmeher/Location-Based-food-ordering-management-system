<?php
session_start();
if(isset($_POST['lat']) && isset($_POST['lon'])){
  $_SESSION['lat']=$_POST['lat'];
  $_SESSION['lon']=$_POST['lon'];
  print_r($_SESSION);

}

 ?>
