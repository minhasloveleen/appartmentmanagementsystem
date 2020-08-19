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
        <a href="" id="newappartmentbutton">+Add New Appartment </a>
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
                $appartmentno=$_REQUEST['appartmentno'];
                include "connection.php";
                $q="delete from appartment where appartmentno='appartmentno'";
                $res=mysqli_query($obj,$q);
                if($res>0)
                {
	              header("location:appartmentinfo.php");
                }
                else
                {
	            echo mysqli_error($obj);
                }
                ?>
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
            <td>Delete/Modify</td>
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
