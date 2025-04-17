<?php
$server = 'localhost';
$user = 'GertvanTil';
$pass = 'gert2002';
$db = 'portfolio-website';
$output = '';
$clearance = false;

session_set_cookie_params([
    'lifetime' => 100,
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

    $messagequery = "SELECT * FROM messages";
    $messages = $dbh->query($messagequery);

    $projectsResult = $dbh->query("SELECT * FROM projects");
    $linksResult = $dbh->query("SELECT * FROM project_links");

    $projectLinks = [];
while ($linkRow = $linksResult->fetch_assoc()) {
    $projectId = $linkRow['project_id'];
    if (!isset($projectLinks[$projectId])) {
        $projectLinks[$projectId] = [];
    }
    $projectLinks[$projectId][] = $linkRow['link'];
}

$projects = [];
while ($row = $projectsResult->fetch_assoc()) {
    $projectId = $row['id'];
    $projects[] = [
        'image' => $row['image'],
        'imageAlt' => $row['imageAlt'],
        'title' => $row['title'],
        'description' => $row['description'],
        'links' => $projectLinks[$projectId] ?? [],
        'content' => $row['content']
    ];
}
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

    <div>
        <h1>Hi <?= htmlspecialchars($_SESSION['username']) ?></h1>

        <form action="../index.php" method="POST">
            <input name="Log out" type="submit" value="Logout" class="button">
        </form>
    </div>


    <div id="wrapper">
        <div id="content" class="column">
            <h2>Content:</h2>
            <?php

                if(!empty($projects)){    
                    foreach($projects as $project){
                        $links = '';
                        foreach($project['links'] as $link){
                            $links .= '<input type="text" value="'. $link .'"><br>';
                        }
                        
                    $output .= '<form method="post">';
            
                    $output .= '<input type="text" value="'. $project['image'] .'"><br><input type="text" value="'. $project['imageAlt'].'"><br><input type="text" value="'. $project['title'].'"><br><textarea>'. $project['description'].'</textarea><br>';
                    $output .= '<div>'. $links .'</div>
                    <textarea>'. $project['content'] .'</textarea><br><br>';
                    $output .= '<form>';
                }};

                echo $output;
            ?>
        </div>
        <div id="messages" class="column">
            <h2>Messages:</h2>
        </div>
    </div>



</html>