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
$q = $_GET['q'];
$u = $_GET['u'];

$serv = 'localhost';
$username = 'root';
$pass='';
$db = 'techon2';
$con = mysqli_connect($serv,$username,$pass,$db);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
if(empty($q)){
    $sql="SELECT * FROM activity;";
}
else{
    $sql="SELECT * FROM activity WHERE name LIKE '%".$q."%';";
}
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
    echo "<label onclick='addToMyAct(".$row['AcID'].")' style='border: 1px #6600cc solid; border-radius:3px;padding: 2px;' id='".$row['AcID']."'>".$row["name"]."</label> "; //activities to select
}

mysqli_close($con);
?>
</body>
</html>
