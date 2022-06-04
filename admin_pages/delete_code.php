<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD Employee</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="sidebar_style.css">
    <style>
        .main_div{
        background-color:#c8d8e4 ;
        border-radius: 10px;
        height: 290px;
        width: 340px;
        padding: 20px;
        position: absolute ;
        left : 50% ; 
        top : 50% ; 
        transform: translate(-50% , -50%);
        }
        p{
            font-weight: bold;
            position: absolute ;
            left : 50%;
            top : 50%;
            transform: translate(-50% ,-50%);
            font-size: 20px;
            white-space :nowrap;
            margin-top: 5px; 
        }
    </style>
</head>
<body>
 
<?php

include_once("connect.php");
$connect = connect();
if(mysqli_connect_errno()){
    die("can not connect to database" . mysqli_connect_error());
}


    $id = $_GET['Id']; 
    $query = "DELETE FROM  Employees  WHERE Id='$id' ";
    $result =mysqli_query($connect,$query);
    if($result){
        echo "<div class='main_div'>
        <p>employee Information Deleted</p>
        </div>"; 
    }


$connect->close();
?>


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