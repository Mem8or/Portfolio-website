<?php
    $server = '185.27.134.119';
    $user = 'if0_38517269';
    $pass = 'cOpyieE84vpv0H';
    $db = 'if0_38517269_database';

    session_start();

    $dbh = new mysqli($server, $user, $pass, $db);
    if ($dbh->connect_error){
        die('Verbinden mislukt: '.$dbh->connect_error);
    } else{
        $dbh->set_charset('utf8');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $dbh->prepare("SELECT username, password, clearance FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        $user = $result->fetch_assoc();

            if ($user['password'] === $password){
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $user['username'];
                $_SESSION['clearance'] = $user['clearance'];
                header('Location: cms.php');
                exit;
            } else {
                echo 'Invalid username or password!';
            }
        }
?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../css/cmsstyle.css">
    </head>
    <body>
    <div class="user">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" name="username" id="username" required><br><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" required><br><br>
            <input type="submit" value="Login" class="button">
        </form>
    </div>

    </body>
</html>