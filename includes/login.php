<?php
    session_start();

    $users = [
        'admin' => ['password' => 'iamadministrator'],
        'guest' => ['password' => 'guest']
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(isset($users[$username]) && $users[$username]['password'] == $password){
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header('Location: cms.php');
            exit;
        } else {
            echo 'Invalid username or password!';
        }
    }
?>
<html>
    <body>
    <h2>Login</h2>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br><br>
            <input type="submit" value="Login">
        </form>
    </body>
</html>