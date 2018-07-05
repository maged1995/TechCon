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
</body>
</html>