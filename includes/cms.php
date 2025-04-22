<?php
// $server = '185.27.134.119';
// $user = 'if0_38517269';
// $pass = 'cOpyieE84vpv0H';
// $db = 'if0_38517269_database';
$server = 'localhost';
$user = 'GertvanTil';
$pass = 'gert2002';
$db = 'portfolio-website';
$output = '';
$messageoutput = '';
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
    $messageResult = $dbh->query($messagequery);

    $messages = [];
    while ($row = $messageResult->fetch_assoc()) {
    $messageId = $row['id'];

    $messages[] = [
        'id' => $row['id'],
        'tad' => $row['tad'],
        'email' => $row['email'],
        'name' => $row['name'],
        'message' => $row['message']
    ];
}

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
        'content' => $row['content'],
        'visible' => $row['visible']
    ];
        }

    // verwerken van de forms en database updaten

    // toevoegen nieuw project (addbutton)
    if (isset($_POST['addbutton'])){
        $addproject = "INSERT INTO projects (image, imageAlt, title, description, content, visible)
        VALUES ('placeholder.jpg', 'Placeholder image', 'New Project', 'Description goes here...', 'Content goes here...', 0)";

        $dbh->query($addproject);

        $newProjectId = $dbh->insert_id;

        $insertLinks = "INSERT INTO project_links (project_id, link)
                VALUES ($newProjectId, 'link goes here')";
        $dbh->query($insertLinks);

        header('Location: ' . $_SERVER['PHP_SELF'] . '#project' . $projectId);
        exit;
    }
    

    // veranderen project data (submit button)
    if (isset($_POST['submitbutton'])){
        $projectId = $_POST['project_id'];
        $img = $_POST['img'];
        $imgAlt = $_POST['imgalt'];
        $link = $_POST['link'];
        $title = $_POST['title'];
        $description = $_POST['projectdesc'];
        $content = $_POST['content'];

        $linkupdate = "UPDATE project_links SET link = '$link'";
        $dbh->query($linkupdate);

        $projectupdate = "UPDATE projects SET image = '$img', imageAlt = '$imgAlt', title = '$title', description = '$description', content = '$content' WHERE id = $projectId";
        $dbh->query($projectupdate);

        header('Location: ' . $_SERVER['PHP_SELF'] . '#project' . $projectId);
        exit;
    }

    // zichtbaarheid veranderen (visible button)
    if (isset($_POST['visiblebutton'])){
        $projectId = $_POST['project_id'];

        $query = "SELECT visible FROM projects WHERE id = $projectId";
        $result = $dbh->query($query);
        $row = $result->fetch_assoc();
        $visibility = ($row['visible'] == 1) ? 0 : 1;

        $updateVisibility = "UPDATE projects SET visible = $visibility WHERE id = $projectId";
        $dbh->query($updateVisibility);

        header('Location: ' . $_SERVER['PHP_SELF'] . '#project' . $projectId);
        exit;
    }

    // verweidert de link en project uit de database
    if (isset($_POST['deletebutton'])){
        $projectId = $_POST['project_id'];

        $deletelink = "DELETE FROM project_links WHERE project_id = $projectId";
        $dbh->query($deletelink);

        $deleteproject = "DELETE FROM projects WHERE id = $projectId";
        $dbh->query($deleteproject);

        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}

// als je uitlogt zorgt dit ervoor dat de status ook geupdate wordt anders bewaart hij de staat
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
<!-- Begroet de gebruiker en laat zien wat ze kunnen doen -->
    <div class="user">
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
                <form method="post" name="newproject">
                    <input type="submit" class="addbutton" name="addbutton" value="" <?= $submitstate ?>>
                </form>
            </div>
            <hr>
<!-- laat de data van de projecten zien en zorgt ervoor dat ze bewerkt, verbergt en verweidert kunnen worden -->
            <?php
                if(!empty($projects)){    
                    foreach($projects as $project){
                        $links = '';
                        foreach($project['links'] as $link){
                            $links .= '<label for="link">link: </label><br><input type="text" value="'. $link .'" name="link"><br>';
                        }
                        
                    $output .= '<div class="formwrapper" id="project'. $project['id'] .'">
                    <form method="post" name="project_'. $project['id'] .'">
                    <input type="hidden" name="project_id" value="'. $project['id'] .'">

                    <h2>Project '.$project['id'].': </h2> <h3>'. $project['title'].'</h3><hr>

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
                    <input type="submit" class="button" name="submitbutton" value="Push changes" '. $submitstate .'>
                    <input type="submit" class="visiblebutton state'. $project['visible'] .'" name="visiblebutton" value="" '. $submitstate .'>
                    <input type="submit" class="deletebutton" onclick="return confirm(\'Are you sure you want to delete this entry?\');" name="deletebutton" value="" '. $submitstate .'>
                    </div>
                    </form></div>';
                }};

                echo $output;
            ?>
        </div>
        <div id="messages" class="column">
            <div class="titlebar">
                <h2>Messages:</h2>
            </div>
            <hr>
<!-- laat de berichten zien -->
                <?php
                if(!empty($messages)){    
                    foreach($messages as $message){
                        $messageoutput .= '<div class="message"> <p><b>'. $message['tad'] .' </b></p>
                        <p>'. $message['name'] .'</p> <p>'. $message['email'] .'</p> <hr>
                        <h3>Message: </h3>
                        <p>'. $message['message'] .'</p> 
                        <div class="buttonrow">
                        <form method="post" name="'. $message['id'] .'">
                        <input type="submit" class="deletebutton" onclick="return confirm(\'Are you sure you want to delete this message?\');" name="delete-button" value="" '. $submitstate .'>
                        </form></div></div><hr>';
                    };
                }

                echo $messageoutput;
                ?>
            </div>
        </div>
    </div>
</html>