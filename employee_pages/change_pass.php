<?php session_start();
$id=$_SESSION['ID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="Change_style.css" >
    <link rel="stylesheet" href="sidebar_style.css" >
    <title>Change Password</title>
</head>
<body>

        <div class="main_div">
            <?php
            include_once("connect.php");
            $connect = connect();
            if(mysqli_connect_errno()){
                die("can not connect to database" . mysqli_connect_error());
            }

            if (isset($_POST['Change'])){
                $pass = $_POST['pass'] ;
                $query = "UPDATE  Employees SET Pass='$pass' WHERE Id='$id' ";
                $result =mysqli_query($connect,$query);

                if($result){
                    header('Refresh:0;URL=done.html');
                }
            }

            $connect->close();
            ?>
        <p class="caption">Change Password</p>
    <form class="form" action="" method="POST">
        <label for="pass">Password</label>
        <input type="Password" name="pass" >
        </br>
        <input type="submit" value="Change" name="Change">
    </form>
        </div>

        <div class="wrapper">
            <input type="checkbox" id="btn" hidden>
            <label for="btn" class="menu-btn">
            <i class="fas fa-bars"></i>
            <i class="fas fa-times"></i>
            </label>
            <nav id="sidebar">
               <div class="title">
                  Management 
               </div>
               <ul class="list-items">
                  <li><a href="../index.html"><i class="fas fa-arrow-circle-left"></i>Logout</a></li>
                  <li><a href="change_pass.php"><i class="fas fa-key"></i>Change Password</a></li>
                  <li><a href="attendance_records.php"><i class="fas fa-file-alt"></i>Attendance Record</a></li>
                  <li><a href="request.php"><i class="fas fa-paper-plane"></i>Vacation Request</a></li>
                  <li><a href="req_status.php"><i class="fas fa-envelope-open"></i>Request Status </a></li>
               </ul>
            </nav>
            </div>
</body>
</html>