
<?php session_start();
    $id = $_SESSION['ID'];
    $name = $_SESSION['USER'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD Employee</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="sidebar_style.css">
    <link rel="stylesheet" href="request_style.css">
</head>
<body>

    
        <?php
        include_once("connect.php");
        $connect = connect();
        if(mysqli_connect_errno()){
            die("can not connect to database" . mysqli_connect_error());
        }

        if (isset($_POST['Send'])){
            $req = $_POST['request'];
            $query = "INSERT INTO Request  
            VALUES('$id' , '$name' , '$req' , NULL )" ;
            $result =mysqli_query($connect,$query);
            if($result){
                header('Refresh:0;URL=done.html');
            }
        }

        $connect->close();
        ?>


    <div class="main_div">
        <p class="caption">Vacation Request Form</p>
    
    <form class="form" action="" method="POST">
        <label for="request">Details : </label>
        </br>
        <textarea  id="request" name="request" rows="8" ></textarea>
        <input type="submit" name="Send"value="Send" >
        </form>
    </div> 


    <!--Side Bar -->
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