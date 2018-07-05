var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "techon2"
});

con.connect(function(err) {
 if (err) throw err;
  con.query("SELECT * FROM person_question where username = '$_POST[username]'", function (err, result, fields) {
    if (err) throw err;
    console.log(result);
  });
});