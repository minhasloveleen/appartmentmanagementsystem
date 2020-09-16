<?php 
    include_once("includes/header.php");
    include 'includes/database.php';
    session_start();
    if(isset($_SESSION["username"]))
    {
?>
<div class="main">
    <?php 
        include_once("includes/adminmenu.php");
    ?>
    <div class="section">
        <?php
        $totalappartment=0;
        $rentedappartment=0;
        $vacantappartment=0;
        $sql = "SELECT count(id)as total from appartment ";
        $sql1 = "SELECT count(id)as total  from appartment where status='vacant' ";
        $sql2 = "SELECT count(id)as total  from appartment where status='rented'";
        $result1 = $GLOBALS['mysqli']->query($sql);
        $result2 = $GLOBALS['mysqli']->query($sql1);
        $result3 = $GLOBALS['mysqli']->query($sql2);
        while ($row = $result1->fetch_array(MYSQLI_ASSOC)) {
            $totalappartment=$row['total'];
          }
          while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {
            $rentappartment=$row['total'];
          }
          while ($row = $result3->fetch_array(MYSQLI_ASSOC)) {
            $vacantappartment=$row['total'];
          }
        ?>
        <div style="width:300px; height:200px;border-radius:5px; background-color:#517865;float:left;margin-right:100px; margin-top:100px; text-align:center;padding-top:10px; color:white;box-shadow: 10px 10px; "><h2>Total Appartment</h2><h1><?=$totalappartment?></h1></div>
        <div style="width:300px; height:200px;border-radius:5px; box-shadow: 10px 10px; background-color:#32a887;float:left;margin-right:100px;  margin-top:100px;text-align:center;padding-top:10px;color:white;"><h2>Vacant Appartment</h2><h1><?=$vacantappartment?></h1></div>
        <div style="width:300px; height:200px;border-radius:5px; box-shadow: 10px 10px; background-color:#325da8;float:left;margin-right:10px;  margin-top:100px;text-align:center;padding-top:10px;color:white;"><h2>Rented Appartment</h2><h1><?=$rentappartment?></h1></div>
    
    </div>
</div>
<?php 
    }   
    else{
        header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'login.php');
    }
    include_once("includes/footer.php");
?>