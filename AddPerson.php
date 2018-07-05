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

    $sql_comm="INSERT INTO `person`( `First Name`, `Last Name`, `Email`, `Username`, `Password`) values('$_POST[fn]','$_POST[ln]','$_POST[email]','$_POST[username]','$_POST[pass]');";

    $_SESSION['username']=$_POST['username'];
    $_SESSION['pass'] = $_POST['pass'];

    if(mysqli_query($con,$sql_comm)){
        header("Location: home.php");
        mysqli_close($con);
        exit;
    }
    else echo"there's a problem";
?>
