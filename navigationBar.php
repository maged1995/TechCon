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
    $serv = 'localhost';
    $username = 'root';
    $pass='';
    $db = 'techon2';
    
    session_start();
    
    if(empty($_SESSION['username']) && empty($_POST['username'])){
               echo ' <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <ul class="navbar-nav">
                

                
                <li class="nav-item">
                    <a class="nav-link" href="SignIn.php" >Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="SignUp.php" >Sign up</a>
                
                        
            </ul>
            
            
        </nav>';
    }
    else if (!empty($_POST['username'])) {
        $con=mysqli_connect($serv,$username,$pass,$db);
        if(!$con){
            die("Server Problem".mysqli_connection_error());
        }
        else{
            echo"Connected";
        }
        $uname = $_POST['username'];
        $pas= $_POST['pass'] ;
        $sql_com="Select * from person where Username = '$uname' AND Password = '$pas';";
        $result = $con->query($sql_com);        if ($result->num_rows > 0) {
            echo '<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
      <!-- Brand -->
            <a class="navbar-brand" href="home.php"><span class="glyphicon glyphicon-home"></span></a>

      <!-- Links -->
            <ul class="navbar-nav">
                
                <li class="navbar-brand dropdown">
                    <a class="nav-link dropdown" href="#" id="navbardrop" data-toggle="dropdown">
                Dropdown link
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Link 1</a>
                        <a class="dropdown-item" href="#">Link 2</a>
                        <a class="dropdown-item" href="#">Link 3</a>
                    </div>
                </li>
                <li class="nav-item">
             <form class="form-inline" action="/action_page.php">
    <input  class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-success" type="submit">Search</button>
  </form>
                </li>
                        
            </ul>
            
            
        </nav>';
        } else {
            echo ' <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <ul class="navbar-nav">
                

                
                <li class="nav-item">
                    <a class="nav-link" href="SignIn.php" >Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="SignUp.php" >Sign up</a>
                
                        
            </ul>
            
            
        </nav>';
        }
    }
?>

</body>
</html>