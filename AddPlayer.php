<?php

$serv = 'localhost';
$username = 'root';
$pass='';
$db = 'techcon';

$con=mysqli_connect($serv,$username,$pass,$db);
if(!$con){
    die("Server Problem".mysqli_connection_error());
}
else{
    echo"Connected";
}

$sql_comm="Insert into person(Email,Username,password) values ('$_POST[email]','$_POST[username]','$_POST[pass]');";



if(mysqli_query($con,$sql_comm)){
if(mysqli_query($con,$sql_comm)){
    echo"new Record Added";
    forwar
}

mysqli_close($con);
?>