<?php
session_set_cookie_params([
    'lifetime' => 10,
    'samesite' => 'Strict'
]);

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}


?>

<html>
    <head>
        <title>CMS</title>
        <link rel="stylesheet" href="../css/cmsstyle.css">
    </head>

        <h1>Hi <?= htmlspecialchars($_SESSION['username']) ?></h1>

        <form action="../index.php" method="POST">
            <input name="Logout" type="submit" value="Logout">
        </form>

        <div>
            <h2>Content</h2>
        </div>
        <div>
            <h2>Messages</h2>
        </div>


</html>