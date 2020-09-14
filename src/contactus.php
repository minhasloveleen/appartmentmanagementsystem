<?php 
    include 'includes/database.php';
    include_once("includes/header.php");
?>
<?php

?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="main">
    <?php 
        include_once("includes/adminmenu.php");
    ?>
    <div class="section" style="padding-top:0px">
        <h1 style="margin-left:15px">Contact Us</h1>
        <?php
        $DispDiv ="display:none;";

       

    ?>
       
       <div class="w3-container" id="contact">
 
    <p>If you have any questions, do not hesitate to ask us.</p>
    <i class="fa fa-map-marker w3-text-red" style="width:30px"></i> 123 Montreal, Quebec, CA<br>
    <i class="fa fa-phone w3-text-red" style="width:30px"></i> Phone: +1 1234567890<br>
    <i class="fa fa-envelope w3-text-red" style="width:30px"> </i> Email: mail@mail.com<br>
    <?php 
    if(isset($_POST['submit']))
    {
      date_default_timezone_set("America/New_York");
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
       
    </div>
</div>

<?php 
    include_once("includes/footer.php");
?>