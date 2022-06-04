<?php 
      session_start();   
      if($_SERVER['REQUEST_METHOD']){
        $username = $_POST['user'];
        $password = $_POST['pass'];            
      }
        include_once("connect.php");
      if(mysqli_connect_errno()){
        die("can not connect to database" . mysqli_connect_error());
       }
       $connect = connect();
    $query = "SELECT * FROM `employees` WHERE Name='$username' AND Pass='$password'";
    $result =mysqli_query($connect,$query);
    $count = mysqli_num_rows($result) ;
    $row = mysqli_fetch_assoc($result);
        if($count > 0){
          $_SESSION['ID'] = $row['Id']; 
          $_SESSION['USER'] = $username; 
          $_SESSION['PASS'] = $password; 
          $_SESSION['LOGIN'] = $username; 
          header('Refresh:0;URL=employee.php');
        }
      else{
         include("Error_incorrect.html");
      }
    
    
    ?>