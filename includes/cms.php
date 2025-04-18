<?php
$server = 'localhost';
$user = 'GertvanTil';
$pass = 'gert2002';
$db = 'portfolio-website';
$output = '';
$clearance = false;
$clearanceMsg = '';
$submitstate = '';

session_set_cookie_params([
    'lifetime' => 100,
    'samesite' => 'Strict'
]);

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}


// clearance check
if ($_SESSION['clearance'] == true){
    $clearance = true;
    $clearanceMsg = '1: <br>You can view and edit projects and messages.';
} else{
    $clearance = false;
    $clearanceMsg = '0: <br>You can view Projects and messages.';
}

// uitzetten van submit en delete buttons als clearance false is
if($clearance == false){
    $submitstate = 'disabled';
}
if($clearance == true){
    $submitstate = '';
}

$dbh = new mysqli($server, $user, $pass, $db);
if ($dbh->connect_error){
    die('Verbinden mislukt: '.$dbh->connect_error);
} else{
    $dbh->set_charset('utf8');


    // ophalen van messages en het in een array zetten
    $messagequery = "SELECT * FROM messages";
    $messages = $dbh->query($messagequery);

    // ophalen van projects en het in een array zetten
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
        'id' => $row['id'],
        'image' => $row['image'],
        'imageAlt' => $row['imageAlt'],
        'title' => $row['title'],
        'description' => $row['description'],
        'links' => $projectLinks[$projectId] ?? [],
        'content' => $row['content']
    ];
}
}


if (isset($_POST['logout'])){

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

    <div id="User">
        <h1>Hi <?= htmlspecialchars($_SESSION['username']) ?></h1>
        <p>Your clearance is <?= $clearanceMsg?></p>

        <form action="../index.php" method="POST">
            <input name="logout" id="logout" type="submit" value="Logout">
        </form>
    </div>


    <div id="wrapper">
        <div id="content" class="column">
            <div class="titlebar">
                <h2>Content:</h2>
                <hr>
            </div>
            
            <?php

                if(!empty($projects)){    
                    foreach($projects as $project){
                        $links = '';
                        foreach($project['links'] as $link){
                            $links .= '<label for="link">link: </label><br><input type="text" value="'. $link .'" name="link"><br>';
                        }
                        
                    $output .= '<div class="formwrapper">

                    <h2>Project '.$project['id'].': </h2> <h3>'. $project['title'].'</h3>

                    <form method="post" name="'. $project['id'] .'">

                    <label for="img">Image src: </label><br>
                    <input type="text" name="img" value="'. $project['image'] .'"><br><hr>

                    <label for="imgalt">Image description: </label><br>
                    <input type="text" name="imgalt" value="'. $project['imageAlt'].'"><br><hr>

                    <label for="title">Title: </label><br>
                    <input type="text" name="title" value="'. $project['title'].'"><br><hr>

                    <label for="projectdesc">Project description: </label><br>
                    <textarea name="projectdesc">'. $project['description'].'</textarea><br><hr>

                    <div>'. $links .'</div><hr>

                    <label for="content">Content: </label><br>
                    <textarea name="content">'. $project['content'] .'</textarea><br><hr>

                    <div class="buttonrow">
                    <input type="submit" class="button" name="submit-button" value="Push changes" '. $submitstate .'>
                    <input type="submit" class="deletebutton" onclick="return confirm(\'Are you sure you want to delete this entry?\');" name="delete-button" value="" '. $submitstate .'>
                    </div>
                    </form></div>';
                }};

                echo $output;
            ?>
        </div>
        <div id="messages" class="column">
        <div class="titlebar">
                <h2>Messages:</h2>
                <hr>
            </div>
        </div>
    </div>
</html>