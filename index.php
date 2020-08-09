<?php
include 'includes/database.php';

?>
<html>
<head><title></title>
<link type="text/css" rel="stylesheet" href="css/styleindex.css" />
</head>
<body>
<?php 
    include_once("includes/header.php");
?>
<br>
<h1>Landing page</h1>
//db connection test
<?php
$sql = "SELECT * from user";
$result = $GLOBALS['mysqli']->query($sql);
$result->num_rows;
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
  echo"<h1>minhas</h1>";
}
?>
<br>
<?php 
    include_once("includes/footer.php");
?>
</body>
</html>