<?php 
    include 'includes/database.php';
    include_once("includes/header.php");
?>
<div class="main">
    <?php 
        include_once("includes/adminmenu.php");
    ?>
    <div class="section" style="padding-top:0px">
        <h1 style="margin-left:15px">Add New Appartment</h1>
        <form>
        <select id="fielddropdown" name="floor" >
        <option selected="selected">Floor no.</option>
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        <option value="fiat">Fiat</option>
        <option value="audi">Audi</option>
        </select>
        <select id="fielddropdown"  name="type">
        <option selected="selected">Appartment Type</option>
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        <option value="fiat">Fiat</option>
        <option value="audi">Audi</option>
        </select>
        <input type="text" id="fielddropdown" name="fname" placeholder="Size of appartment ex 200cm x 200cm">
        <input type="text" id="fielddropdown" name="fname" placeholder="Original rent $">
        <textarea id="fielddropdown" style="width:937px; height:100px;" placeholder="Description about the appartment"></textarea>
        <fieldset id="fieldsetid">
            <legend>Add pictures</legend>
            <input type="file" id="fielddropdown" style="width:400px;" name="avatar" accept="image/png, image/jpeg">
            <input type="file" id="fielddropdown" style="width:400px;" name="avatar" accept="image/png, image/jpeg">
            <input type="file" id="fielddropdown"style="width:400px;" name="avatar" accept="image/png, image/jpeg">
        </fieldset>
        <input type="submit" name="submit" id="newappartmentbutton" style="float:left; margin-left:15px; margin-top:10px;"value="Cancel">
        <input type="submit" name="submit" id="newappartmentbutton" style=" margin-right:50px; margin-top:10px; " value="Add Appartment">
        </form>
    </div>
</div>

<?php 
    include_once("includes/footer.php");
?>