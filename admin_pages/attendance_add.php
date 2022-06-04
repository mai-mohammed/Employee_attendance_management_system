
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Records</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="sidebar_style.css">
    <link rel="stylesheet" href="attendance_style.css">

</head>
<body>
    <!-- Form  -->
    <div class="a_container">
        <a href="attendance_view.php">View</a>
        <a href="attendance_add.php">Add</a>
    </div>
<?php

include_once("connect.php");
$connect = connect();
if(mysqli_connect_errno()){
    die("can not connect to database" . mysqli_connect_error());
}

if (isset($_POST['Insert'])){
    $id = $_POST['id'] ;
    $selectquery = mysqli_query($connect,"SElECT * FROM Employees WHERE Id= '$id'");
    $result1 = mysqli_fetch_assoc($selectquery);
    $name =$result1['Name'];
    $date = $_POST['date'];
    $attend = $_POST['attend'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $notes = $_POST['notes'];
    $query = "INSERT INTO `attendance_record` 
    VALUES('$id' ,'$name', '$date' , '$attend' , '$start' ,'$end' , '$notes')" ;
    $result =mysqli_query($connect,$query);
    if($result){
        header('Refresh:0;URL=attendance_view.php');
    }
}

 $connect->close();
?>


    <div class="main_div">
        <p class="caption">Add Attendance Record </p>
    
    <form class="form" action="" method="POST">

        <label for="id" >Id & Name :</label>
        <select  name="id" class="select">
        <?php
                include_once("connect.php");
                $connect = connect();
                if(mysqli_connect_errno()){
                    die("can not connect to database" . mysqli_connect_error());
                }

                $query = "SELECT Id , Name  FROM `employees`";
                $result =mysqli_query($connect,$query);
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option value='".$row['Id']."'>
                                ".$row['Id']." : ".$row['Name']."
                            </option>";
                    }
                }
                mysqli_free_result($result);
                $connect->close();
                ?>
        </select>    
    </br>

        <label id="date" for="date">Date : </label>
        <input type="date" name="date" value="<?php echo date("Y-m-d"); ?>">
    </br>
    <div class="radio">
        <div style="margin-bottom: 5px;">Attends : </div>
        <input id="attendY" type="radio" name="attend"  value="1" onclick="show(1)">
        <label for="attendY">Yes</label>
        <input id="attendN" type="radio" name="attend" value="0"  onclick="show(0)">
        <label for="attendN">No</label>
    </div>

        <div id="hidden_part" style="display: none ;" >
        <label for="start">Came :</label>
        <input id="start" type="time" name="start" min="09:00" max="18:00" >
        </br>
        <label for="end">Left : </label>
        <input id="end" type="time" name="end"  min="09:00" max="18:00">
        </br>
        <label for="notes">Notes</label>
        </br>
        <textarea  id="notes" name="notes" ></textarea>
        </div>
    </br>
        <div class="add_attend"></div>
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
        <script>
       function show(Value){
        ele = document.getElementById("hidden_part");
           if(Value==1){
             ele.style.display='block';
            }
            else{
             ele.style.display='none';
            }
            return ;
       }
   </script>

</body>
</html>