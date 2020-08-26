<?php
include 'includes/database.php';
$sql="delete from appartment_photos WHERE appartmentno=".$_GET["apptno"];
if($GLOBALS['mysqli']->query($sql))
{
    $sql="delete from appartment WHERE appartmentno=".$_GET["apptno"];
    $GLOBALS['mysqli']->query($sql);
    header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'appartmentinfo.php');
}
header('Location:'.$GLOBALS['CONFIG_CLIENT_PORTAL_ROOT_URL'].'appartmentinfo.php');
?>