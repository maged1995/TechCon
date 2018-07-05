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
$q = intval($_GET['q']);
$u = $_GET['u'];
    
$serv = 'localhost';
$username = 'root';
$pass='';
$db = 'techon2';
$con = mysqli_connect($serv,$username,$pass,$db);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
    $sql="INSERT INTO `activity_person`(`username`, `AcID`) VALUES ('".$u."',".$q.")";

$result = mysqli_query($con,$sql);
mysqli_close($con);
?>
</body>
</html>