<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $email = $_POST["email"];
        $password = $_POST["password"];

        $database = new mysqli("localhost", "root", "", "example");

        if($database->connect_error){
            echo("Database connection error");
        } else {

            $SQL = "SELECT * FROM accounts WHERE email='$email' AND `password`='$password';";
            $query = $database->query($SQL);
            if($query->num_rows > 0){
                $result = $query->fetch_assoc();
                echo('<!DOCTYPE HTML><html><head><link rel="stylesheet" href="./css/style.css"></head><body><p>You logged in as '.$result["username"].'</p></body></html>');
            } else {
                echo('<!DOCTYPE HTML><html><head><link rel="stylesheet" href="./css/style.css"></head><body><p>No account found.</p></body></html>');
            }

        }

        die();

    }

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Simple vulnerable website</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <h1>yasserprocomputer</h1>
        <p class="description">Welcome to SQL injection video!</p>
        <form action="" method="post">
            <div class="inputbox">
                <input type="text" name="email" id="email" placeholder="email" autocomplete="off">
            </div>
            <div class="inputbox">
                <input type="text" name="password" id="password" placeholder="password" autocomplete="off">
            </div>
            <button type="submit">Login</button>
        </form>
    </body>
</html>