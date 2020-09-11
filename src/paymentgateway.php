<?php 
    include 'includes/database.php';
    include_once("includes/header.php");
?>
<?php

?>
<div class="main">
    <?php 
        include_once("includes/adminmenu.php");
    ?>
    <div class="section" style="padding-top:0px">
        <h1 style="margin-left:15px">Rent Payment</h1>
        <form onsubmit="successAlert()" method="post" enctype="multipart/form-data">
        <input type="text" id="fielddropdown" style="width:92.5%;" name="apptno" required placeholder="Appartment no.">
      
        <input  id="fielddropdown" type="month" id="start" name="start" required 
       min="2020-07" value="2020-09">
        <input type="text" id="fielddropdown" name="size" required placeholder="Enter the payment Amount $">
        <textarea id="fielddropdown" style="width:937px; height:100px;" name="desc" required placeholder="Message "></textarea>
        <input type="submit" name="add" id="newappartmentbutton" style=" margin-right:50px; margin-top:10px; background-color: green; " value="PAY RENT">
        <br><br><br></form>
        <script>
            function successAlert(){
                alert("Your payment has been successfully processed")
            }
            </script>
    </div>
</div>

<?php 
    include_once("includes/footer.php");
?>