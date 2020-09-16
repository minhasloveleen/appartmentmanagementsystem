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
        <?PHP
        if(isset($_GET['message']))
        {
            ?><div class="message" ><?=$_GET['message']?></div><?php
        }
        else
        {
            ?><div class="message" style="display:none;" >appartment added successfully</div> <?php
        }
         ?>
        
        <form id="form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
            <label for="appartmentdropdown" id="appartmentdropdownlabel">Select Appartment</label>
            <select name="appartment" id="appartmentdropdown">
                <option value="all">All</option>
<?php
$sql = "SELECT * from appartment where status='rented'";
$result = $GLOBALS['mysqli']->query($sql);
$result->num_rows;
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    if(isset($_GET['search']) && $row['appartment']==$_GET['appartment'])
    {
        ?><option value="<?=$row['appartment']?>" selected><?=$row['appartment']?></option> 
        <?php
    }
    ?><option value="<?=$row['appartment']?>"><?=$row['appartment']?></option>
<?php
}
?>
            </select> 
            <input type="submit" name="search" id="search"value="search">
        </form>
        <a href="apartmentrent.php" id="newappartmentbutton">+Rent Appartment </a>
        <table class="infotable">
        <tr>
            <th>Appartment no.</th>
            <th>Floor No.</th>
            <th>Appartment type</th>
            <th>Description</th>
            <th>Status</th>
            <th>Details</th>
            
        </tr>
           
<?php
$sql = "SELECT * from appartment where status='rented'";
if(isset($_GET['search']))
{
    if($_GET['appartment']=="all")
    {
        $sql="SELECT * from appartment where status='rented'" ;
    }
    else
    {
        $sql="SELECT * from appartment where status='rented' and appartment=".$_GET['appartment'];
    }
}

$result = $GLOBALS['mysqli']->query($sql);
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    ?>
        <tr>
            <td><?=$row['appartment']?></td>
            <td><?=$row['floor']?></td>
            <td><?=$row['appttype']?></td>
            <td><?=$row['Description']?></td>
            <td><?=$row['status']?></td>
            <td><a href="details.php?apptno=<?=$row['id']?>&appt=<?=$row['appartment']?>">Details</a></td>
        </tr>
<?php
}
?>
        </table>
        </br>
</br>
    </div>

</div>
<?php 
    }   
    else{
        header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'login.php');
    }
    include_once("includes/footer.php");
?>
