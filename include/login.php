<?php

    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        $mysqli = require __DIR__ . "/db_con.php";

        $sql = sprintf("SELECT * FROM user 
                        WHERE email = '%s'",
                        $mysqli->real_escape_string($_POST["email"]));
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();

        if ($user){
            if (password_verify($_POST["password"], $user["password_hash"])){
                die("Login Successful");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    
    <form method="POST">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <button>Log In</button>
    </form>
</body>
</html>