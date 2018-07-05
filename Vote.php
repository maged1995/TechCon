<!DOCTYPE html>
<html>
<head>
<style>

</style>
    <link rel="stylesheet" href="stylesheet.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<?php
$un = $_GET['un'];
$val = intval($_GET['v']);
$aid = intval($_GET['aid']);
    
$serv = 'localhost';
$username = 'root';
$pass='';
$db = 'techon2';
$con = mysqli_connect($serv,$username,$pass,$db);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

    $sql="SELECT * FROM `vote` WHERE username ='".$un."' and aid =".$aid." ;";

$result = mysqli_query($con,$sql);
    if($result->num_rows > 0 ){
        $row = mysqli_fetch_array($result);
        if($row['val'] == $val){
            $sql="DELETE FROM `vote` WHERE username = '".$un."' and AID = ".$aid.";";
        }
        else{
            $sql="DELETE FROM `vote` WHERE username = '".$un."' and aid = ".$aid.";";
            $con = mysqli_connect($serv,$username,$pass,$db);
            $result = mysqli_query($con,$sql);
            $sql="INSERT INTO `vote`(`val`, `AID`, `Username`) VALUES (".$val.",".$aid.",'".$un."')";
        }
            
    }else{
        $sql="INSERT INTO `vote`(`val`, `AID`, `Username`) VALUES (".$val.",".$aid.",'".$un."')";
    }
    

$con = mysqli_connect($serv,$username,$pass,$db);
$result = mysqli_query($con,$sql);


    
mysqli_close($con);
?>
</body>
</html>