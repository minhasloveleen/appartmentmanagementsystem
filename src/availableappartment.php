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
        
        
        <h1>Available appartment</h1>
        <table class="infotable">
        <tr>
            <th>Appartment no.</th>
            <th>Floor No.</th>
            <th>Appartment type</th>
            <th>Description</th>
            <th>Rent Appartment</th>
            
        </tr>
           
<?php
$sql = "SELECT * from appartment where status='vacant'";
$result = $GLOBALS['mysqli']->query($sql);
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    ?>
        <tr>
            <td><?=$row['appartment']?></td>
            <td><?=$row['floor']?></td>
            <td><?=$row['appttype']?></td>
            <td><?=$row['Description']?></td>
            <td><a href="rentappartment.php">click here</td>
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

