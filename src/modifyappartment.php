<?php 
    include 'includes/database.php';
    include_once("includes/header.php");
    //session_start();
    $url[3]=["","",""];
    if(isset($_SESSION["username"]))
    {


?>
<div class="main">
    <?php 
        include_once("includes/adminmenu.php");
        $sql="SELECT * from appartment where id=".$_GET['apptno'];
        $result = $GLOBALS['mysqli']->query($sql);
        echo $result->num_rows;
        while($row = $result->fetch_assoc()) {
     
    ?>
    <div class="section" style="padding-top:0px">
        <h1 style="margin-left:15px">Modify Appartment</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden"  name="id" value="<?=$_GET['apptno']?>" >
        <input type="text" id="fielddropdown" style="width:92.5%;" name="apptno" value="<?=$row['appartment']?>" required placeholder="Appartment no.">
        <select id="fielddropdown" name="floor" required  >
        <?php
        $sql="SELECT * from floor";
        $result1 = $GLOBALS['mysqli']->query($sql);
        while($r = $result1->fetch_assoc()) {
            if($r['floorno']==$row['floor'])
            {
                ?><option value="<?=$r['floorno']?>" selected><?=$r['floorno']?></option><?php
            }
            else
            {
                ?><option value="<?=$r['floorno']?>"><?=$r['floorno']?></option><?php
            }
            
        }
        ?>
        </select>
        <select id="fielddropdown" required  name="type">
        <?php for($i=0;$i<sizeof($GLOBALS['appttype']);$i++)
        {
            if($GLOBALS['appttypevalue'][$i]==$row['appttype'])
            {
                ?><option value="<?=$GLOBALS['appttypevalue'][$i]?>" selected><?=$GLOBALS['appttype'][$i]?></option><?php
            }
            else
            {
                ?><option value="<?=$GLOBALS['appttypevalue'][$i]?>"><?=$GLOBALS['appttype'][$i]?></option><?php
            }
            
        }?>
       
        </select>
        <input type="text" id="fielddropdown" name="size" value="<?=$row['size']?>" required placeholder="Size of appartment ex 200cm x 200cm">
        <input type="text" id="fielddropdown" name="originalrent"  value="<?=$row['orginalrent']?>" required placeholder="Original rent $">
        <textarea id="fielddropdown" style="width:937px; height:100px;" name="desc"   required placeholder="Description about the appartment"><?=$row['Description']?></textarea>
        <fieldset id="fieldsetid">
            <legend>Add pictures</legend>
            <?php
            $sql2="SELECT * from appartment_photos where id=".$_GET['apptno'];
            $result2 = $GLOBALS['mysqli']->query($sql2);
            $j=0;
            while($ro= $result->fetch_assoc()) {
                $url[$j]=$ro;
                $j++;
            }
            
            ?>
            <input type="file" id="fielddropdown" style="width:400px;" value="<?=$url[0]?>" name="fileToUpload" accept="image/png, image/jpeg">
            <input type="file" id="fielddropdown" style="width:400px;"   value="<?=$url[1]?>"name="fileToUpload2" accept="image/png, image/jpeg">
            <input type="file" id="fielddropdown"style="width:400px;"  value="<?=$url[2]?>"name="fileToUpload3" 
             accept="image/png, image/jpeg">
        </fieldset>
        <input type="submit" name="submit" id="newappartmentbutton" style="float:left; margin-left:15px; margin-top:10px;"value="Cancel">
        <input type="submit" name="add" id="newappartmentbutton" style=" margin-right:50px; margin-top:10px; " value="Modify Appartment">
        <br><br><br></form>
    </div>
</div>

<?php 
        }
    }   
    else{
        header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'login.php');
    }
    include_once("includes/footer.php");
?>