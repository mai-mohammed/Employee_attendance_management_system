<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="update_style.css">
    <link rel="stylesheet" href="sidebar_style.css">
    <title>Update Employee Info</title>
</head>
<body>
<div class="main_div" >
<?php
    include_once("connect.php");
    $connect = connect();
    if(mysqli_connect_errno()){
        die("can not connect to database" . mysqli_connect_error());
    }

    $query = "SELECT * FROM `employees`";
    $result =mysqli_query($connect,$query);
    if($result){
        echo "<table>";
        echo "  <caption>List Of Employee</caption>";
        echo "  <thead>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Password</th>
          <th>Update</th>
        </tr>
     </thead>";
     echo "<tbody>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
                    <td>".$row['Id']."</td>

                    <td>".$row['Name']."</td>

                    <td>".$row['Phone']."</td>

                    <td>".$row['Address']."</td>

                    <td>".$row['Pass']."</td>
                    
                    <td><a href='update_form.php?Id=".$row['Id'].
                    "&Name=".$row['Name'].
                    "&Phone=".$row['Phone'].
                    "&Address=".$row['Address'].
                    "' class='updatebtn'>Update</a></td>
                </tr>";
        }
        echo "  </tbody>";
        echo "</table>";
    }
    mysqli_free_result($result);
    $connect->close();
    ?>
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