<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="attendance_style.css">
    <link rel="stylesheet" href="sidebar_style.css">
    <title>Attendance</title>
</head>
<body>
    <div class="a_container">
        <a href="attendance_view.php">View</a>
        <a href="attendance_add.php">Add</a>
    </div>
    <div class="main_div">
    <form class="search_form" action="" method="POST">
      <label for="search">Time :</label>  
      <select id="search" class="search" name="search" onchange="show_day_mon()">
        <option value="month" >Month</option>
        <option value="date" >Day</option>
      </select>
      <span id ="day_span">
            <label for="day">Day :  &nbsp;  &nbsp;</label>  
            <input id="day" class="day" name="day" type="date" value="<?php echo date("Y-m-d"); ?>" style="width: auto;" />
      </span> 
      <span id ="month_span">
            <label for="month">Month :</label>  
            <input id="month" name="month" class="month" value="<?php echo date("Y-m"); ?>" type="month"style="width: auto;" />
      </span> 
</br>
      <label for="emplo">For :</label>  
      <select id="emplo" class="emplo" value="all" name="emplo" onchange="show_emp()">
        <option value="all">All</option>
        <option value="one">One</option>
      </select>

      <span id="select_em_span">
            <label for="employee">Employee:</label>
            <select  name="id" class="select_em">
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
            </span>
               <span style="max-width: 100px;  visibility: visible;">
                <input type="submit" name="Insert"value="View" >
               </span>
    </form>
    
    <?php 
        include_once("connect.php");
        $connect = connect();
        if(mysqli_connect_errno()){
            die("can not connect to database" . mysqli_connect_error());
        }
        if (isset($_POST['Insert'])){
            $query = null; 
            $first = $_POST['month']."-1";
            $last =  $_POST['month']."-31";
            if($_POST['search']=="date" && $_POST['emplo']=="all"){
                $query = "SELECT * FROM `attendance_record` WHERE Date='".$_POST['day']."'";
            }
            elseif($_POST['search']=="date" && $_POST['emplo']=="one"){
                $query = "SELECT * FROM `attendance_record` WHERE Date='".$_POST['day']."'AND Id='".$_POST['id']."'";
            }
            elseif($_POST['search']=="month" && $_POST['emplo']=="all"){
                $query = "SELECT * FROM `attendance_record` WHERE ( Date BETWEEN '".$first."' AND '".$last."' )";                
            }
  
            elseif ($_POST['search']=="month" && $_POST['emplo']=="one") {
                $query = "SELECT * FROM `attendance_record` WHERE ( Date BETWEEN '".$first."' AND '".$last."') AND Id='".$_POST['id']."'";     
                   }
            else{
                $query = "SELECT * FROM `attendance_record`";
            }

        $result =mysqli_query($connect,$query);
        if($result){
            echo "<table>";
            echo "  <caption>List Of Attendance Record</caption>";
            echo "  <thead> 
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Date</th>
              <th>Start</th>
              <th>End</th>
              <th>Notes</th>
              <th>Attends</th>
            </tr>
         </thead>";
         echo "<tbody>";
            while($row = mysqli_fetch_assoc($result)){
                // $att = $row['Attends'] ==1 ? "Yes" : "No" ;
                echo "<tr>
                        <td>".$row['Id']."</td>
    
                        <td>".$row['Name']."</td>
    
                        <td>".$row['Date']."</td>
    
                        <td>".$row['start']."</td>
    
                        <td>".$row['End']."</td>
    
                        <td>".$row['Notes']."</td>
    
                        <td>".$row['Attends']."</td>
                    
                    </tr>";
            }
            echo "  </tbody>";
            echo "</table>";
        }}
        // mysqli_free_result($result);
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
                  <li><a href="#"><i class="fas fa-bell"></i>Vacation Requests</a></li>
               </ul>
        </nav>

        <script>

          function show_day_mon(){
             let par_ele=document.getElementById("search")  
             let day = document.getElementById("day_span") ;
             let month = document.getElementById("month_span") ;
            if(par_ele.value == "date"){
                day.style.visibility ="visible";
                month.style.visibility ="hidden";
            }
            else {
                day.style.visibility ="hidden";
                month.style.visibility ="visible";
            }
          }

          function show_emp(){
             let par_ele=document.getElementById("emplo")  
             let ele = document.getElementById("select_em_span") ;
            if(par_ele.value == "one"){
                ele.style.visibility ="visible";
                
            }
            else {
                ele.style.visibility ="hidden";
            }
          }


        </script>    
</body>
</html>