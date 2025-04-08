<?php
$server = 'localhost';
$user = 'GertvanTil';
$pass = 'gert2002';
$db = 'portfolio-website';
$output = '';

session_set_cookie_params([
    'lifetime' => 1,
    'samesite' => 'Strict'
]);

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

$dbh = new mysqli($server, $user, $pass, $db);
if ($dbh->connect_error){
    die('Verbinden mislukt: '.$dbh->connect_error);
} else{
    $dbh->set_charset('utf8');

    $query = "SELECT naam, email, message FROM messages";
    $result = $dbh->query($query);
}


if (isset($_POST['Logout'])){

    $_SESSION['loggedin'] = false;

    session_destroy();
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

        <div id="contentwrapper">
            <h2>Content</h2>
        </div>
        <div id="messagewrapper">
            <h2>Messages</h2>
        </div>


</html>