<?php 
      session_start();   
      if($_SERVER['REQUEST_METHOD']){
        $username = $_POST['user'];
        $password = $_POST['pass'];
        
        if($username==="Mai" && $password==="123"){
          $_SESSION['USER'] = $username; 
          $_SESSION['PASS'] = $password; 
          $_SESSION['LOGIN'] = $username; 
          header('Refresh:0;URL=admin.html');
        }
      else{
         include("Error_incorrect.html");
      }
    }
    session_destroy();
    ?>