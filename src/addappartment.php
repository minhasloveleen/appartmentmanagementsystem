<?php 
    include 'includes/database.php';
    include_once("includes/header.php");
    session_start();
    if(isset($_SESSION["username"]))
    {
?>
<?php

?>
<div class="main">
    <?php 
        include_once("includes/adminmenu.php");
    ?>
    <div class="section" style="padding-top:0px">
        <h1 style="margin-left:15px">Add New Appartment</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="text" id="fielddropdown" style="width:92.5%;" name="apptno" required placeholder="Appartment no.">
        <select id="fielddropdown" name="floor" required  >
        <option value="" default selected>Floor no.</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        </select>
        <select id="fielddropdown" required  name="type">
        <option value="" default selected>Appartment Type</option>
        <option value="11/2">1 <sup>1</sup>&frasl;<sub>2</sub></option>
        <option value="21/2">2 <sup>1</sup>&frasl;<sub>2</sub></option>
        <option value="31/2">3 <sup>1</sup>&frasl;<sub>2</sub></option>
        <option value="41/2">4 <sup>1</sup>&frasl;<sub>2</sub></option>
        </select>
        <input type="text" id="fielddropdown" name="size" required placeholder="Size of appartment ex 200cm x 200cm">
        <input type="text" id="fielddropdown" name="originalrent" required placeholder="Original rent $">
        <textarea id="fielddropdown" style="width:937px; height:100px;" name="desc" required placeholder="Description about the appartment"></textarea>
        <fieldset id="fieldsetid">
            <legend>Add pictures</legend>
            <input type="file" id="fielddropdown" style="width:400px;" name="fileToUpload" required accept="image/png, image/jpeg">
            <input type="file" id="fielddropdown" style="width:400px;" name="fileToUpload2" required accept="image/png, image/jpeg">
            <input type="file" id="fielddropdown"style="width:400px;" name="fileToUpload3" required accept="image/png, image/jpeg">
        </fieldset>
        <input type="submit" name="submit" id="newappartmentbutton" style="float:left; margin-left:15px; margin-top:10px;"value="Cancel">
        <input type="submit" name="add" id="newappartmentbutton" style=" margin-right:50px; margin-top:10px; " value="Add Appartment">
        <br><br><br></form>
    </div>
</div>

<?php 
    }   
    else{
        header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'login.php');
    }
    include_once("includes/footer.php");
?>