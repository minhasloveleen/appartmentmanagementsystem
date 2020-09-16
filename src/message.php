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
        
        
        <h1>Messages</h1>
        
           
<?php
$sql = "SELECT * from queries order by `time` DESC";
$result = $GLOBALS['mysqli']->query($sql);
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    ?>
    <div style="width:90%;border:2px solid #89c499; margin-bottom:10px;padding-left:15px; border-radius:5px ;">
        <p  style="width:50%;float:left; margin-bottom:6px; margin-top:15px;"><b style="text-transform:capitalize"><?=$row['name']?></b><span style="font-size:14px;color:#c1c9c4;">&#8826;<?=$row['email']?>&#8827;</span></p> 
        <p style="font-size:14px;margin-top:15px;margin-bottom:6px;width:45%;float:left;text-align:right;color:#c1c9c4"><?=$row['time']?></p>
        <p style="width:95%;text-align:justify;padding:0 5px; word-wrap: break-word;background-color:#aab3ad;clear: both;"><?=$row['message']?></p>
    </div>
<?php
}
?>
        
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

