<?php

$serv = 'localhost';
$username = 'root';
$pass='';
$db = 'techon2';
session_start();
$con=mysqli_connect($serv,$username,$pass,$db);
if(!$con){
    die("Server Problem".mysqli_connection_error());
}
else{
    echo"Connected";
}
$qide = $_POST['qide'];
$an = $_POST['answer'];
$uname = $_SESSION['username'];
$sql_comm="Insert into answer (QID,Answer,Username) values(".$qide.", '".$an."', '".$uname."');";


if(!empty($_POST['answer'])){
    if(mysqli_query($con,$sql_comm)){
        
    }
}
header("Location: home.php");
mysqli_close($con);
exit;
?>