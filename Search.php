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
    
    $c = 0;
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

    echo "<div class='dropdown-menu '>";
    while($c<7 && $row = mysqli_fetch_array($result)) {
        echo "<a href=''>".$row['name']."</a> <br>"; //activities to select
        $c= $c+1;
    }
    
    
    $sql="SELECT * FROM question WHERE question LIKE '%".$q."%';";
    $result = mysqli_query($con,$sql);
    while($c<7 && $row = mysqli_fetch_array($result)){
        echo "<a href=''>".$row['question']."</a> <br>"; //activities to select
        $c= $c+1;
    }
    echo "</div>";
    mysqli_close($con);
    ?>
</body>
</html>