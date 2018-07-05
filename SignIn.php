<!doctype html>
<?php
    session_start();
    $_SESSION['username']='';
    $_SESSION['pass'] = '';
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sign in</title>
        <meta name="description" content="Website for technical and business Support.">
        <meta name="keywords" content="Questions,Answers">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap4-glyphicons-master/bootstrap4-glyphicons/css/bootstrap-glyphicons.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="stylesheet.css">
        <script src="htmlInclude.js"></script>
        <style>
/*            li{float: left}*/
            
            
        </style>
        
    </head>
    
    <body style="background-image: url('weback3.png');">
        
        <div w3-include-html="navigationBar.html"></div>
        <script>
        includeHTML();
        </script>
        
        
        <div id="signUpInForm">
            <form class="form1" method="post" action="home.php" >
                <h2>Sign in</h2>
                <img src="Transparent%20logo%20.png" style="width:100%;"><br>
                <label for="username">Username:</label><input type="text" placeholder="Username.." name="username"><br/>
                <label for="pass">Password:</label><input type="password" placeholder="Password.." name="pass"><br/>
                <input type="submit" value="Sign in">
            </form>
        </div>
        
        
    </body>
</html>