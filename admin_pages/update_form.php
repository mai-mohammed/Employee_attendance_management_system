<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD Employee</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="sidebar_style.css">
    <link rel="stylesheet" href="insert_style.css">
</head>
<body>
 
<?php

include_once("connect.php");
$connect = connect();
if(mysqli_connect_errno()){
    die("can not connect to database" . mysqli_connect_error());
}

if (isset($_POST['Insert'])){
    $id = $_POST['id'] ;
    $user = $_POST['user'] ;
    $phone = $_POST['phone'];
    $address = $_POST['address'];  
    $query = "UPDATE  Employees 
    SET Name='$user', Phone='$phone' , Address='$address' WHERE Id='$id' ";
    $result =mysqli_query($connect,$query);
    if($result){
        header('Refresh:0;URL=insert_true.html');
    }
}

$connect->close();
?>


    <div class="main_div">
        <p class="caption">Update Form</p>
    
    <form class="form" action="" method="POST">
    
        <label for="id" ></label>
        <input type="hidden" name="id" value="<?php echo $_GET['Id']?>" >

        <label for="user" >Username</label>
        <input type="text" name="user" value="<?php echo $_GET['Name']?>" >
    </br>

    <label for="phone">Phone Number </label>
    <input type="text" name="phone" value="<?php echo $_GET['Phone']?>">
    </br>

    <label for="address">Address</label>
    <input type="text" name="address" value="<?php echo $_GET['Address']?>">
    </br>
        <div class="check_pass"></div>
        <input type="submit" name="Insert"value="Insert" >
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
                  <li><a href="attendance_view.php"><i class="fas fa-calendar-check"></i>Attendance</a></li>
                  <li><a href="insert.php"><i class="fas fa-plus"></i>Add Employee</a></li>
                  <li><a href="update.php"><i class="fas fa-pen"></i>Update</a></li>
                  <li><a href="delete.php"><i class="fas fa-minus"></i>Delete</a></li>
                  <li><a href="req_manage.php"><i class="fas fa-bell"></i>Vacation Requests</a></li>
               </ul>
        </nav>
</body>
</html>