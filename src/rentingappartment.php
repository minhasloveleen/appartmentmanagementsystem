<?php

$electricity=false;
if($_POST['electricity'])
$electricity=true;
echo$_POST['leasesign'];
print_r($_POST);
include 'includes/database.php';
if(isset($_FILES['fileToUpload']))
{
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    
    
    // Check if file already exists
    if (file_exists($target_file)) {
      header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'displayrentedappartment.php?message=Sorry, file already exists.');
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    
    
    // Allow certain file formats
    if($imageFileType != "pdf" && $imageFileType != "docx" && $imageFileType != "doc" ) {
      header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'displayrentedappartment.php?message=Sorry, only pdf & docs  files are allowed.');

      echo "Sorry, only pdf & docs  files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'displayrentedappartment.php?message=Sorry, your file was not uploaded.');

      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $url="".basename($_FILES["fileToUpload"]["name"]);
        $appartment=$_POST['type'];
        $currentrent=$_POST['currentrent'];
        $leasesign=$_POST['leasesign'];
        $leaseexpire=$_POST['leaseexpire'];
        $electricity=false;
        if($_POST['electricity'])
        $electricity=true;
        $heat=false;
        if($_POST['heat'])
        $heat=true;
        $water=false;
        if($_POST['water'])
        $water=true;
        $leasesign=$_POST['leasesign'];
        $leaseexpire=$_POST['leaseexpire'];
        $user1=$_POST['principal'];
        $sin1=$_POST['sin1'];
        $sql="INSERT INTO `appartmentmanagement`.`leasedetails`(`appartment`,`currentrent`,`monthlyrenewalcharges`,`iselectricity_included`,`isheat_included`,`isairconditioner_included`,`signindate`,`signoutdate`,`scanoflease`)
        VALUES('$appartment',$currentrent,0,$electricity,$heat,$water,'$leasesign','$leaseexpire','$url');";
        $sql.="INSERT INTO `appartmentmanagement`.`tennantdetails` VALUES
        ($user1,'$sin1','$appartment',1);";
        if($_POST['subTenant1']!=null)
        {
            $user2=$_POST['subTenant1'];
            $sin2=$_POST['sin21'];
            $sql.="INSERT INTO `appartmentmanagement`.`tennantdetails` VALUES
        ($user2,'$sin2','$appartment',0);";
        }
        if($_POST['subTenant2']!=null)
        {
            $user3=$_POST['subTenant2'];
            $sin3=$_POST['sin22'];
            $sql.="INSERT INTO `appartmentmanagement`.`tennantdetails` VALUES
        ($user3,'$sin3','$appartment',0);";
        }
        if($_POST['subTenant3']!=null)
        {
            $user4=$_POST['subTenant3'];
            $sin4=$_POST['sin23'];
            $sql.="INSERT INTO `appartmentmanagement`.`tennantdetails` VALUES
        ($user4,'$sin4','$appartment',0);";
        }
        $sql.="UPDATE `appartmentmanagement`.`appartment`SET`status` = 'rented'WHERE `id` = '$appartment';";
        echo $sql;
        $result1 = $GLOBALS['mysqli']->multi_query($sql);
        if($result1>0 )
    {
   // header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'displayrentedappartment.php?message=Renting appartment done sucessfully');
    }
    else{
     // header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'displayrentedappartment.php?message=unsucessfully attempt');
    }
      } else {
        header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'displayrentedappartment.php?message=Sorry, there was an error uploading your file');
       
      }
    }
    
}

?>