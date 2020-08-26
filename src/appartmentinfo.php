<?php 
    include 'includes/database.php';
    include_once("includes/header.php");
?>
<div class="main">
    <?php 
        include_once("includes/adminmenu.php");
    ?>
    <div class="section">
        <div class="message">appartment added successfully</div>
        <form id="form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
            <label for="appartmentdropdown" id="appartmentdropdownlabel">Select Appartment</label>
            <select name="appartment" id="appartmentdropdown">
<?php
$sql = "SELECT * from appartment";
$result = $GLOBALS['mysqli']->query($sql);
$result->num_rows;
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    ?><option value="<?=$row['appartmentno']?>"><?=$row['appartmentno']?></option>
<?php
}
?>
            </select> 
            <input type="submit" name="search" id="search"value="search">
        </form>
        <a href="addappartment.php" id="newappartmentbutton">+Add New Appartment </a>
        <table class="infotable">
        <tr>
            <th>Appartment no.</th>
            <th>Floor No.</th>
            <th>Appartment type</th>
            <th>Description</th>
            <th>Status</th>
            <th>Delete/Modify</th>
            
        </tr>
           
<?php
$sql = "SELECT * from appartment";
if(isset($_GET['search']))
{
    $sql="SELECT * from appartment where appartmentno=".$_GET['appartment'];
}

$result = $GLOBALS['mysqli']->query($sql);
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    ?>
        <tr>
            <td><?=$row['appartmentno']?></td>
            <td><?=$row['floor']?></td>
            <td><?=$row['appttype']?></td>
            <td><?=$row['Description']?></td>
            <td><?=$row['status']?></td>
            <td><a href="deleteappartment.php?apptno=<?=$row['appartmentno']?>">Delete</a> / <a href="modifyappartment.php?apptno=<?=$row['appartmentno']?>">Modify</a></td>
        </tr>
<?php
}
?>
        </table>
    </div>
</div>
<?php 
    include_once("includes/footer.php");
?>
