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
        <style></style>
        <title>CMS</title>
    </head>
    <h1>Hi <?= htmlspecialchars($_SESSION['username']) ?></h1>
</html>