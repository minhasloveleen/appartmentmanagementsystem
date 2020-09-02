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
    <form onsubmit="addAppartmentAlert()">
      <label for="floornum">Floor number:</label>
    <select  id="fielddropdown" name="floor" required>
    <!-- <option selected="selected">Floor no.</option> -->
    <option value="zero">0</option>
    <option value="one">1</option>
    <option value="two">2</option>
    <option value="three">3</option>
    </select>
    <span></span>
    <label for="cars">Appartment Type:</label>
    <select id="fielddropdown"  name="type" required>
    <!-- <option selected="selected">Appartment Type</option>  -->
    <option value="oneandhalf">1 <sup>1</sup>&frasl;<sub>2</sub></option>
    <option value="twoandhalf">2 <sup>1</sup>&frasl;<sub>2</sub></option>
    <option value="threeandhalf">3 <sup>1</sup>&frasl;<sub>2</sub></option>
    <option value="fourandhalf">4 <sup>1</sup>&frasl;<sub>2</sub></option>
    </select>
    <label for="size">Size of appartment:</label>
    <input type="text" required id="fielddropdown" name="fname" type="number" required pattern="[1-9]*[0-9]{1,15}"  placeholder="--cm">
    <label for="size"> X </label>
    <input type="text" required id="fielddropdown" name="fname" type="text" required pattern="[1-9]*[0-9]{1,15}"  placeholder="--cm">
    <label for="size">Original rent:</label>
    <input type="text" required id="fielddropdown" name="fname" type="number" pattern="[1-9]*[0-9]{1,15}" placeholder="--$">
    <textarea id="fielddropdown" required style="width:937px; height:100px;" placeholder="Description about the appartment"></textarea>
    <fieldset id="fieldsetid">
        <legend>Add pictures</legend>
        <input type="file" id="fielddropdown" required style="width:400px;" name="avatar" accept="image/png, image/jpeg">
        <input type="file" id="fielddropdown" required style="width:400px;" name="avatar" accept="image/png, image/jpeg">
        <input type="file" id="fielddropdown" required style="width:400px;" name="avatar" accept="image/png, image/jpeg">
    </fieldset>
    <input  type="submit" name="submit" id="newappartmentbutton" style="float:left; margin-left:15px; margin-top:10px;"value="Cancel">
    <input type="submit" name="submit" id="newappartmentbutton"  style=" margin-right:50px; margin-top:10px; " value="Add Appartment">
    </form>
    <script>
      function addAppartmentAlert() {
        alert("The appartment is successfully added!");
      }
      </script>
</div>
</div>

<?php 
    include_once("includes/footer.php");
?>