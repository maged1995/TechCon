<?php

    $serv = 'localhost';
    $username = 'root';
    $pass='';
    $db = 'techon2';
    
    session_start();
    
    if(empty($_SESSION['username']) && empty($_POST['username'])){
        header("Location: SignIn.php");
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
        $result = $con->query($sql_com);
        if ($result->num_rows > 0) {
            $_SESSION['username']=$uname;
            $_SESSION['pass'] = $pas;
            echo "<label id='get' onfocus='openQuest(this.value)' hidden>".$uname."</label>";
        } else {
            $_SESSION['username']='';
            $_SESSION['pass'] = '';
            header("Location: SignIn.php");
        }
    }
        
        
function writeMsg() {
    $serv = 'localhost';
    $username = 'root';
    $pass='';
    $db = 'techon2';

    $con=mysqli_connect($serv,$username,$pass,$db);
    if(!$con){
        die("Server Problem".mysqli_connection_error());
    }
    else{
        echo"Connected";
    }

    $sql_comm="Insert into question values ('$_POST[question]');";


    if(mysqli_query($con,$sql_comm)){
        header("Location: home.html");
        mysqli_close($con);
        exit;
    }
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Technical Conference</title>
        <meta name="description" content="Website for technical and business Support.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap4-glyphicons-master/bootstrap4-glyphicons/css/bootstrap-glyphicons.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="stylesheet.css">
        <script src="htmlInclude.js"></script>
        
        <style>
        </style>
    </head>
    
    <body>
        
        <div w3-include-html="navigationBarLogged.html"></div>
        <script>includeHTML();</script>
        
        
        <div class="container-fluid" >
            <div class="row ">
                <div class="col-sm-1" style="background-color:#1f3d7a;;"></div>
                <div class="col-sm-2" style="background-color:#5c85d6; ">
                    <div id="left">
                        <div class="leftlinkArea"><a href="home.php" class="leftlink">All</a></div>
                        <div class="leftlinkArea"><a href="MyPosts.php" class="leftlink">My Posts</a></div>
                    </div>
                </div>
                <div class="col-sm-6" style="background-color:#c2d1f0;">
                    <div id="question">
                        <h2>Do you have a question?</h2>
                        <form action="insertQuesion.php" method="post">
                            <textarea name="question" style="width: 100%"></textarea>
                            <input type="submit" value="submit question">
                        </form>
                        
                    </div>
                    
                    <?php
                        $serv = 'localhost';
                        $username = 'root';
                        $pass='';
                        $db = 'techon2';

                        $conn = new mysqli($serv, $username, $pass, $db);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        } 
                        
                        $uname = $_SESSION['username'];
                        $sql = "SELECT * FROM question where username = '$uname';";// where username = '$uname';";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                    echo "<div class='questions' name=".$row['QID']."><h5>".$row['username']."</h5>";
                                          if($uname == $row['username']){echo "<a class='nav-link' style='float: right;' href='SignIn.php' ><span class='glyphicon glyphicon-option-horizontal' style='fill: Black;'></span></a>";}
                                    echo "<div class='q'><h3 id=".$row['QID']." onclick='openQuest(this.id)'>".$row['Question']."</h3></div><hr>";
                                    $sql = "SELECT * FROM answer where qid =  ".$row['QID'].";";
                                    $result2 = $conn->query($sql);
                                    while($row2 =  $result2->fetch_assoc()){
                                        $sql = "SELECT * FROM vote where AID =  ".$row2['AID'].";";
                                        $result3 = $conn->query($sql);
                                        $v = 0;
                                        while ($row3 = $result3->fetch_assoc()) {
                                            $v = $v + $row3['val'];
                                        }
                                        echo "<label>".$row2['Username'].":</label><span> ".$row2['Answer']."<span class='glyphicon glyphicon-thumbs-up' onclick='voteUp()'></span><span class='glyphicon glyphicon-thumbs-down' onclick='voteDown()' ></span>".$v."</span> <br>";
                                    }

                                    echo "<form action='addAnswer.php' method='post'><input type='hidden' name = 'qide' value=".$row['QID']."><textarea name='answer'  style='width: 100%;'></textarea><input type='submit' value='submit answer'></form> </div>";
                            }
                        } else {
                            echo "<div><h2>no posts yet</h2></div>";
                        }
                        $conn->close();
                    ?>
                </div>
                <div class="col-sm-3" style="background-color:lavender;">
                    <div id="right">
                        <img src="Transparent%20logo%20.png" style="width:100%;">
                    </div>
                </div>

            </div>
        </div>
        <script>
            function voteUp(str) {
            
                 
              var xhttp;
                
              xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementByClassName("QID").innerHTML = this.responseText;
                }
              };
                //aid=AID , val=1,un = username
              xhttp.open("GET", "Vote.php?aid="+str+"&v=1&un=<?php print $uname; ?>", true);
                alert("Clicked");
              xhttp.send();
            }
            function voteDown(str){
              var xhttp;
                
              xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementByClassName("QID").innerHTML = this.responseText;
                }
              };
                //aid=AID , val=1,un = username
              xhttp.open("GET", "Vote.php?aid="+str+"&v=-1&un=<?php print $uname; ?>", true);
                alert("Clicked");
              xhttp.send();
            }
        </script>
        
    </body>
</html>