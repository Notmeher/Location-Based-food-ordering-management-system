<?php
include('config/constants.php');

$loadFun="";
if(isset($_SESSION['lat']) && isset($_SESSION['lon'])){
  $lat=$_SESSION['lat'];
  $lon=$_SESSION['lon'];

  $res=mysqli_query($conn,"SELECT table_food.*, table_category.title,
    (3959*acos(
    cos(radians($lat))
    *cos(radians(table_category.latitude))
    *cos(radians(table_category.longitude)-radians($lon))
    +sin(radians($lat))
    *sin(radians(table_category.latitude))
    )
  ) AS distance
  FROM table_food, table_category WHERE table_category.id=table_food.category_id
  HAVING distance < 5
  ORDER BY distance");
}else{
  $res=mysqli_query($conn,"SELECT table_food.*,table_category.title FROM table_food,table_category WHERE
  table_category.id=table_food.category_id");
  $loadFun="onload='getLocation()'";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering System</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <!-- User Location Pop Up Function -->
    <script>
    function error(err){
      //alert(err.message);
    }
    function success(pos){
      var lat=pos.coords.latitude;
      var lon=pos.coords.longitude;
      jQuery.ajax({
        url:'setLatLong.php',
        data:'lat='+lat+'&lon='+lon,
        type:'post',
        success:function(result){
          window.location.href='index.php'
        }
      })
    }
    function getLocation(){
      if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(success,error);
      }else{

      }
    }

    </script>
</head>

<body <?php echo $loadFun?>>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="index.php" title="Logo">
                    <img src="images/nsu.png" alt="Website Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>

                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Restaurants</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>location.php">Get Location</a>
                    </li>

                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->
