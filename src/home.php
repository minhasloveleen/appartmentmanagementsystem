<?php
include 'includes/database.php';
?>

<!DOCTYPE html>
<html>
<title>Find Your Appartment</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
</style>
<body class="w3-light-grey">

<!-- Navigation Bar -->
<div class="w3-bar w3-white w3-large">
  <a href="#" class="w3-bar-item w3-button w3-red w3-mobile"><i class="fa fa-bed w3-margin-right"></i>My Appartment</a>

  <a href="login.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Signin</a>
</div>
<!-- Header -->
<header class="w3-display-container w3-content" style="max-width:1500px;">
  <img class="w3-image" src="images/hotel.jpg" alt="The Hotel" style="min-width:1000px" width="1500" height="800">
  <div class="w3-display-left w3-padding w3-col l6 m8">
    <div class="w3-container w3-red">
      <h2><i class="fa fa-bed w3-margin-right"></i>Let's Find Your Appartment today!</h2>
    </div>
</header>

<!-- Page content -->
<div class="w3-content" style="max-width:1532px;">

<div class="tab">
                <button class="tablinks" id="btnHtml" onclick="showProject(event, 'html')">Studio</button>
                <button class="tablinks" id="btnAndroid" onclick="showProject(event, 'android')">&nbsp;2<sup>1</sup>&frasl;<sub>2</sub>&nbsp;</button>
                <button class="tablinks" id="btnCpp" onclick="showProject(event, 'cpp')">&nbsp;3<sup>1</sup>&frasl;<sub>2</sub>&nbsp;</button>
                <button class="tablinks" id="btnReact" onclick="showProject(event, 'react')">&nbsp;4<sup>1</sup>&frasl;<sub>2</sub>&nbsp;</button>
                <button class="tablinks" id="btnJs" onclick="showProject(event, 'js')">&nbsp;5<sup>1</sup>&frasl;<sub>2</sub>&nbsp;</button>

            </div>
  
  

  <div class="w3-row-padding w3-padding-16">
  <?php 
  $sql = "SELECT * from appartment where status='vacant'";
  $result = $GLOBALS['mysqli']->query($sql);
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
  ?>
    <div class="w3-third w3-margin-bottom">
      <img src="images/room_single.jpg" alt="Norway" style="width:100%">
      <div class="w3-container w3-white">
        <h6 class="w3-opacity"> From $<?=$row['orginalrent']?></h6>
        <p>All Included</p>
        <p> <?=$row['appttype']?></p>
        <button class="w3-button w3-block w3-black w3-margin-bottom">Details</button>
      </div>
    </div>
    <?php
}
    ?>
    
  </div>

 
  
  <div class="w3-row-padding w3-large w3-center" style="margin:32px 0">
    <div class="w3-third"><i class="fa fa-map-marker w3-text-red"></i> 123 Montreal, Quebec, CA</div>
    <div class="w3-third"><i class="fa fa-phone w3-text-red"></i> Phone: +1 1234567890</div>
    <div class="w3-third"><i class="fa fa-envelope w3-text-red"></i> Email: mail@mail.com</div>
  </div>

  <div class="w3-container" id="contact">
    <h2>Contact</h2>
    <p>If you have any questions, do not hesitate to ask them.</p>
    <i class="fa fa-map-marker w3-text-red" style="width:30px"></i> 123 Montreal, Quebec, CA<br>
    <i class="fa fa-phone w3-text-red" style="width:30px"></i> Phone: +1 1234567890<br>
    <i class="fa fa-envelope w3-text-red" style="width:30px"> </i> Email: mail@mail.com<br>
    <?php 
    if(isset($_POST['submit']))
    {
      date_default_timezone_set("America/Toronto");
      $date=date("Y-m-d h:i:sa");
      $name=$_POST['name'];
      $email=$_POST['email'];
      $message=$_POST['message'];
      $sql="insert into queries(name,email,message,time) value('$name','$email','$message','$date')";
      $result = $GLOBALS['mysqli']->query($sql);
      if($result)
      {
        echo "<script type='text/javascript'>alert('thank you! message has been sent');</script>";
      }
      else
      {
        echo "<script type='text/javascript'>alert('Sorry! Technical error.. try again...');</script>";
      }
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="name"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Email" required name="email"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message" required name="message"></p>
      <p><button class="w3-button w3-black w3-padding-large" name="submit" type="submit">SEND MESSAGE</button></p>
    </form>
  </div>

<!-- End page content -->
</div>



</body>
</html>