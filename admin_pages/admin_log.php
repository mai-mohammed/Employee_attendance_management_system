<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="admin_log_style.css"/>
</head>
<body>
 
<div class="main_div">
        <p class="caption">Admin Login</p>
        <div id="result" ></div>
    
    <form class="form" action="check_ad.php" method="POST">
        <label for="user" >Username</label>
        <input type="text" name="user" >
       </br> 

        <label for="pass">Password</label>
        <input type="Password" name="pass" >
        </br>
        <input type="submit" value="Insert" >
        </form>
        </div> 

</body>
</html>