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
        <h1 style="margin-left:15px">Modify Profile</h1>
        <?php
        $DispDiv ="display:none;";

       

    ?>
        <div id="success" style='<?php echo $DispDiv;?>' class="message" >Profile updated successfully</div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"   method="get" enctype="multipart/form-data">
        <input  id="fielddropdown" placeholder="First Name" type="text" required  name="first_name" value="" />
                <input  id="fielddropdown" placeholder="Last Name" type="text" required  name="last_name" value="" /> 
                <input  id="fielddropdown" placeholder="Age" type="number" required  min="15"max="99" name="age" value="" />
                <input  id="fielddropdown" placeholder="Phone" type="tel" pattern="[123456789][0-9]{9}"  required  name="phone" value="" />
                <input  id="fielddropdown" placeholder="Email" type="mail" required pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$"  name="email1" value="" />
                <br><br><br>
                <input type="submit"  name="modifyprofile" id="newappartmentbutton" style=" margin-right:50px; margin-top:10px; " value="Modify">
                <br><br><br></form>
       
    </div>
</div>

<?php 
    include_once("includes/footer.php");
?>