<?php

if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(empty($_POST['question']))
    {
        header("Location: home.php");
    }
    else{
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
        $uname = $_SESSION['username'];
        $sql_comm="Insert into question (question,username) values ('$_POST[question]','$uname');";
        
        if(mysqli_query($con,$sql_comm)){
            header("Location: home.php");
            mysqli_close($con);
            exit;
        }
    }
}





?>
