var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "techon2"
});

con.connect(function(err) {
 if (err) throw err;
  con.query("insert into person username,password,email values('$_POST[username]','$_POST[password]',$_POST[email]')", function (err, result, fields) {
    if (err) throw err;
    console.log(result);
    
  });
});