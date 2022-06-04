<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="employee_style.css">
    <link rel="stylesheet" href="sidebar_style.css">
    <title>Employee Dashboard</title>
</head>
<body>

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
            <div class="content">
               <div class="header">
                 <?php 
                       session_start();   
                     echo "Welcome " .$_SESSION['USER'] ;   
                   
                 ?>
               </div>
         
            </div>

  
</body>
</html>