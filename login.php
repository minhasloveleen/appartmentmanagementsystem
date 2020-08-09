<?php
include 'includes/database.php';

?>
<!DOCTYPE html>
<html>

<title>Welcome </title>

<head>
    <link type="text/css" rel="stylesheet" href="css/style2.css" />
    <meta name="Description" content=">Welcome to My Apartment" />
</head>

<body>

    <div class="app-header">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <img id="img1"  src="images/logo.png" />

            <div id="form1" class="app-header">Email or Phone<br>
                <input placeholder="<?php echo $emailErr;?>" required pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" name="email_login" /><br>
                </div>

            <div id="form2" class="app-header">Password<br>
                <input placeholder="<?php echo $pwdErr;?>" type="password" name="password_login" /><br>
            </div>
            <button type="submit" name="login" class="submit1">Login</button>
        </form>
    </div>
    </div>
    <div class="app-body">
        <div id="intro1" class="app-body">We make finding an apartment simple for you . Register now and let us find your new home!</div>
        <div id="intro2" class="app-body">Register your account</div>
        <div id="img2" class="app-body"><img src="images/sidebuilding.png" /></div>
        <div id="intro3" class="app-body">Find your Apartment today !</div>
        <div id="form3" class="app-body">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input placeholder="First Name" type="text" required id="namebox" name="first_name" value="<?php echo $fname;?>" /> <span class="error" > <?php echo $fnameErr;?></span>
                <input placeholder="Last Name" type="text" required id="namebox" name="last_name" value="<?php echo $lname;?>" /> <span class="error"> <?php echo $lnameErr;?></span>
                <input placeholder="Age" type="number" required id="namebox" min="15"max="99" name="age" value="<?php echo $age;?>" /><span class="error"> <?php echo $ageErr;?></span>
                <input placeholder="Phone" type="tel" pattern="[123456789][0-9]{9}"  required id="namebox" name="phone" value="<?php echo $phone;?>" /><span class="error"> <?php echo $phoneErr;?></span>
                <input placeholder="Email" type="mail" required pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" id="mailbox" name="email1" value="<?php echo $email1;?>" /><span class="error"> <?php echo $emailErr1;?></span>
                <input placeholder="Password" required type="password" id="mailbox" name="password1" value="<?php echo $pwd1;?>" /><span class="error"> <?php echo $pwdErr1;?></span>
                <!-- <input placeholder="SIN" id="namebox" name="sin" /><br><br><span class="error"> </span> -->
                <br>
                <br>
                <input type="radio" id="r-b" name="usertype" value="admin" checked="true"/>Admin
                <input type="radio" id="r-b" name="usertype" value="other" />Other<br>
                
                <p id="intro4">By clicking Register,Your profile will be created and you can start finding your Apartment.</p>
                <button type="submit" class="myButton" name="register">Register</button>
                <br>
                <hr>
            </form>


        </div>

    </div>

</body>

</html>