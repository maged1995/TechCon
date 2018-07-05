
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
        } else {
            $_SESSION['username']='';
            $_SESSION['pass'] = '';
            header("Location: SignIn.php");
        }
    }
?>
<!doctype html>
<html>
    <head>

        <meta charset="utf-8">
        <title>Select Activity</title>
        <meta name="description" content="Website for technical and business Support.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap4-glyphicons-master/bootstrap4-glyphicons/css/bootstrap-glyphicons.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="stylesheet.css">
        <script src="htmlInclude.js"></script>

    </head>

    <body>
         <div w3-include-html="navigationBarLogged.html"></div>
        <script>includeHTML();</script>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1" style="background-color:#1f3d7a; "></div>
                <div class="col-sm-2" style="background-color:#5c85d6; "></div>
                <div class="col-sm-6" style="background-color:#c2d1f0;">
                    <div id="AcSel" > <!--activity selector-->
                        <form>
                            <h2>Activity:</h2>
                            <input type="text" id="selected_activities" width="100%" onfocus="getAct(this.value)" oninput="getAct(this.value)">
                            <hr>
                            <label id='ac' hidden></label>
                            <div id="availAct">
                                <!--each label from here is an activity type-->
                            </div>
                            <!--suggested activities-->
                            <hr>
                            <input type="button" value="save" onclick="save(this.value)">
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <script>
            document.getElementById("selected_activities").focus();
            function getAct(str) {
              var xhttp;
              xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("availAct").innerHTML = this.responseText;
                }
              };
              xhttp.open("GET", "activityGet.php?q="+str+"&u=+<?php print $_SESSION['username'] ?>", true);
              xhttp.send();
            }
            function save(str){
                var xhttp;
              xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("availAct").innerHTML = this.responseText;
                }
              };
              xhttp.open("GET", "activitySave.php?q="+str, true);
              xhttp.send();
            }
            function addToMyAct(str){
                        var xhttp;
                      xhttp = new XMLHttpRequest();
                      xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                          document.getElementById("ac").innerHTML = this.responseText;
                        }
                      };
                      xhttp.open("GET", "activityAdd.php?q="+str+"&u=<?php print $_SESSION['username'] ?>", true);
                      xhttp.send();
                    }


        </script>
    </body>

</html>
