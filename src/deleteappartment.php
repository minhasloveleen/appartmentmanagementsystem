<?php
include 'includes/database.php';
$sql="delete from appartment_photos WHERE id=".$_GET["apptno"];
if($GLOBALS['mysqli']->query($sql))
{
    $sql="delete from appartment WHERE appartment=".$_GET["apptno"];
    $GLOBALS['mysqli']->query($sql);
    header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'appartmentinfo.php?message=appartment deleted sucessfully');
}
else{
    header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'appartmentinfo.php?message=appartment deleted unsucessfully');

}
?>