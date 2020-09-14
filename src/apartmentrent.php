<?php 
    include 'includes/database.php';
    include_once("includes/header.php");
     session_start();
    if(isset($_SESSION["username"]))
    {
            
?>

<div class="main">
    <?php 
        include_once("includes/adminmenu.php");
    ?>
    <div class="section">
        <h1>Rent an Appartment</h1>
        <select id="fielddropdown"  required  name="type">
        <option value="" default selected>Appartment</option>
        <option value="21/2">2 <sup>1</sup>&frasl;<sub>2</sub></option>
        <option value="31/2">3 <sup>1</sup>&frasl;<sub>2</sub></option>
        <option value="41/2">4 <sup>1</sup>&frasl;<sub>2</sub></option>
        </select>
        <input type="text" id="fielddropdown" name="originalrent" required placeholder="Rent of an Appartment $">
        <input type="text" id="fielddropdown" name="leasesign"  required onfocus="(this.type='date')" placeholder="Date of lease sign">
        <input type="text" id="fielddropdown" name="leaseexpire" required  onfocus="(this.type='date')"placeholder="Date of lease expire">
        <fieldset id="fieldsetid">
            <legend>Monthly Rental Resource Includes</legend>
            <input type="checkbox"  style="width:40px;" id="electricity"name="electricity">
            <label for="electricity">Electricity</label><br>
            <input type="checkbox"  style="width:40px;" id="heat"name="heat" >
            <label for="heat">Heat</label><br>
            <input type="checkbox" style="width:40px;" id="water"  name="water" >
            <label for="water">Water</label><br>
        </fieldset>
        <fieldset id="fieldsetid">
            <legend>User details</legend>
            <select id="fielddropdown"  required  name="principal">
            <option value="" default selected>Principal Tenant</option>
            <option value="21/2">2 <sup>1</sup>&frasl;<sub>2</sub></option>
            <option value="31/2">3 <sup>1</sup>&frasl;<sub>2</sub></option>
            <option value="41/2">4 <sup>1</sup>&frasl;<sub>2</sub></option>
            </select>
            <input type="text" id="fielddropdown" style="width:35.5%;" name="sin1" required placeholder="Sin No. Principal tenant">
            <select id="fielddropdown"  required  name="subTenant1">
            <option value="" default selected>SubTenant 1</option>
            <option value="21/2">2 <sup>1</sup>&frasl;<sub>2</sub></option>
            <option value="31/2">3 <sup>1</sup>&frasl;<sub>2</sub></option>
            <option value="41/2">4 <sup>1</sup>&frasl;<sub>2</sub></option>
            </select>
            <input type="text" id="fielddropdown" style="width:35.5%;" name="sin21" required placeholder="Sin No. SubTenant1">
            <select id="fielddropdown"  required  name="subTenant2">
            <option value="" default selected>SubTenant 2</option>
            <option value="21/2">2 <sup>1</sup>&frasl;<sub>2</sub></option>
            <option value="31/2">3 <sup>1</sup>&frasl;<sub>2</sub></option>
            <option value="41/2">4 <sup>1</sup>&frasl;<sub>2</sub></option>
            </select>
            <input type="text" id="fielddropdown" style="width:35.5%;" name="sin22" required placeholder="Sin No. SubTenant2">
            <select id="fielddropdown"  required  name="subTenant3">
            <option value="" default selected>SubTenant 3</option>
            <option value="21/2">2 <sup>1</sup>&frasl;<sub>2</sub></option>
            <option value="31/2">3 <sup>1</sup>&frasl;<sub>2</sub></option>
            <option value="41/2">4 <sup>1</sup>&frasl;<sub>2</sub></option>
            </select>
            <input type="text" id="fielddropdown" style="width:35.5%;" name="sin23" required placeholder="Sin No. SubTenant3">
        </fieldset>
        <textarea id="fielddropdown" style="width:937px; height:100px;" name="desc" required placeholder="Any thing extra to specify"></textarea>
        <input type="submit" name="add" id="newappartmentbutton" style=" margin-right:50px; margin-top:10px; " value="Next">
        <br><br><br><br><br><br>
    </div>

</div>
<?php 
    }   
    else{
        header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'login.php');
    }
    include_once("includes/footer.php");
?>
