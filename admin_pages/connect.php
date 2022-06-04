<?php
function connect(){
$host="localhost";
$username = "root";
$password = "2586544862mai$";
$database = "attendance";
$connect = mysqli_connect($host , $username , $password ,$database );
return $connect ;
}

?>