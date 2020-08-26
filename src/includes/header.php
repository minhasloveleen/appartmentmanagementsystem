<html>
<head><title></title>
<link type="text/css" rel="stylesheet" href="css/styleindex.css" />
</head>
<body>
<header id="top">
	<img  src="images/logo.png" alt="logo" style="margin-top:10px;"/>
    <h1 >Delta <span style="color:#54514d">Management<span></h1>
    <p> Hi!  <?php session_start();
            if(isset($_SESSION["username"]))
            {
                echo $_SESSION["username"] ;
                ?><a href="logout.php">   Logout</a><?php
            }
            else 
            {
                echo "Guest" ;
                ?><a href="login.php">   Signup</a><?php
            }?> </p>
	
</header>
