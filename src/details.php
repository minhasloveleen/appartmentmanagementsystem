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
        <h1>Details about appartment</h1>
        <?php 
        $appartment=$_GET['appt'];
        $type="";
        $floor=0;
        $size="";
        $desc="";
        $rent="";
        $currentrent="";
        $user1="";
        $sin1="";
        
        $sql = "SELECT DISTINCT * from appartment as a join tennantdetails as b 
        on a.id=b.appartmentno join user as c on c.userid=b.userid join leasedetails as d on d.appartment=a.id where a.status='rented' and a.id=".$_GET['apptno']." order by a.appartment desc";
        $result = $GLOBALS['mysqli']->query($sql);
        $i=1;
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $floor=$row['floor'];
            $size=$row['size'];
            $type=$row['appttype'];
            $desc=$row['Description'];
            $rent="$".$row['orginalrent'];
            $currentrent="$".$row['currentrent'];
            $user1.=$i.") ".$row['firstname']."       ".$row['lastname']."<br>&nbsp;&nbsp; &nbsp;&nbsp;    <b>Sin no:</b>  ".$row['sin']."<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Phone number:</b> ".$row['Phonenumber']."<br>";
            $i++;
        }?>
        <h2>Appartment details</h2>
        Appartment Number : <?=$appartment?><br>
        Floor number: <?=$floor?><br>
        Size: <?=$size?><br>
        Type of appartment: <?=$type?><br>
        Description: <?=$desc?><br>
        Original rent: <?=$rent?><br>
        Current rent: <?=$currentrent?><br>
        <h2>Tenants details</h2>
         <?=$user1?>

    </div>

</div>
<?php 
    }   
    else{
        header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'login.php');
    }
    include_once("includes/footer.php");
?>
