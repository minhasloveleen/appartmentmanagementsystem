<?php
include 'includes/database.php';
$url1="";
$url2="";
$url3="";

print_r ($_POST);



if(isset($_FILES['fileToUpload']))
{
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $url1=basename($_FILES["fileToUpload"]["name"]);
      } else {
        echo "Sorry, there was an error uploading your file.";
       
      }
    }
    
}
if(isset($_FILES['fileToUpload2']))
{
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileToUpload2"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload2"]["name"]). " has been uploaded.";
        $url2=basename($_FILES["fileToUpload2"]["name"]);
      } else {
        echo "Sorry, there was an error uploading your file.";
       
      }
    }
    
}
if(isset($_FILES['fileToUpload3']))
{
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["fileToUpload3"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload3"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileToUpload3"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload3"]["name"]). " has been uploaded.";
        $url3=basename($_FILES["fileToUpload3"]["name"]);
      } else {
        echo "Sorry, there was an error uploading your file.";
       
      }
    }
    
}
$apptno=$_POST['apptno'];
$floor=$_POST['floor'];
$type=$_POST['type'];
$size=$_POST['size'];
$originalrent=$_POST['originalrent'];
$desc=$_POST['desc'];
//modify appartment
if($_POST[add]=="Modify Appartment")
{
  $id=$_POST['id'];
  $sql1="select  * from `appartmentmanagement`.`appartment` where appartment=$apptno and id<>$id ";
  $result = $GLOBALS['mysqli']->query($sql1);
  if ($result->num_rows > 0){
    header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'appartmentinfo.php?message=Appartment number needs to be unique!!! unsucessfull attempt');
  }
  else{
    $sql2 = "UPDATE `appartmentmanagement`.`appartment`SET`appartment` = '$apptno',`floor` =$floor,`appttype` ='$type',`size` = '$size',`orginalrent` = $originalrent,`Description` ='$desc' WHERE `id` =$id;";
    $sql2.="DELETE FROM `appartmentmanagement`.`appartment_photos`WHERE `id` =$id;";
    if($url1!="")
      $sql2.="INSERT INTO `appartmentmanagement`.`appartment_photos`(`id`,`photo`)VALUES($id,'$url1');";
    if($url2!="")
      $sql2.="INSERT INTO `appartmentmanagement`.`appartment_photos`(`id`,`photo`)VALUES($id,'$url2');";
    if($url3!="")
      $sql2.="INSERT INTO `appartmentmanagement`.`appartment_photos`(`id`,`photo`)VALUES($id,'$url3');";
    echo $sql2;
    $result1 = $GLOBALS['mysqli']->multi_query($sql2);
    echo $result1;
    if($result1>0 )
    {
     header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'appartmentinfo.php?message=modify sucessfully');
    }
    else{
      header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'appartmentinfo.php?message=modify unsucessfully');
    }
  }
  
}
//add appartment
else if($_POST[add]=="Add Appartment")
{
  $sql1="select  * from `appartmentmanagement`.`appartment` where appartment=$apptno ";
  $result = $GLOBALS['mysqli']->query($sql1);
  if ($result->num_rows > 0){
    header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'appartmentinfo.php?message=Appartment number needs to be unique!!! unsucessfull attempt');
  }
  else{
    $sql1="select MAX(id) as id from `appartmentmanagement`.`appartment` ";
    $result = $GLOBALS['mysqli']->query($sql1);
    $id=0;
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $id=$row['id']+1;
      }
    } 

    $sql2 = "INSERT INTO `appartmentmanagement`.`appartment`(`appartment`,`floor`,`appttype`,`status`,`size`,`orginalrent`,`Description`)VALUES('$apptno',$floor,'$type','vacant','$size',$originalrent,'$desc');";
    if($url1!="")
      $sql2.="INSERT INTO `appartmentmanagement`.`appartment_photos`(`id`,`photo`)VALUES($id,'$url1');";
    if($url2!="")
      $sql2.="INSERT INTO `appartmentmanagement`.`appartment_photos`(`id`,`photo`)VALUES($id,'$url2');";
    if($url3!="")
      $sql2.="INSERT INTO `appartmentmanagement`.`appartment_photos`(`id`,`photo`)VALUES($id,'$url3');";

    echo $sql2;
    $result1 = $GLOBALS['mysqli']->multi_query($sql2);
    echo $result1;
    if($result1>0 )
    {
    header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'appartmentinfo.php?message=addedsucessfully');
    }
    else{
      header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'appartmentinfo.php?message=unsucessfully');
    }
  }
  

}



?>