<?php
    $server = 'localhost';
    $user = 'GertvanTil';
    $pass = 'gert2002';
    $db = 'portfolio-website';
    $output = '';
    $presidents = '';
    
    $dbh = new mysqli($server, $user, $pass, $db);

    if ($dbh->connect_error){
    	die('Verbinden mislukt: '.$dbh->connect_error);
    } else{
        $dbh->set_charset('utf8');
    }

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

    // het genereeren van de uitklapbare projectlijst
    if(!empty($projects)){    
        foreach($projects as $project){
            $links = '';
            // het aanmaken van de links
            foreach($project['links'] as $link){
                $links .= '<p class = "pagelink"><a class="pagelinktext" href="includes/projects/'. $link .'" target="_blank">Bekijk Project</a></p>';
            }

        // content voor in de preview
        $output .= '<div class="expandible"> <div class="expandiblePreview"> <img class="previewImage" src="'. $project['image'] .'" alt="'. $project['imageAlt'] .'"> <div class="previewtext"><h2>'. $project['title'] .'</h2><p>'. $project['description'] .'</p></div></div>';
        // content in het uitklapbare gedeelte
        $output .= '<div class="expandibleContentWrapper">
        <div class="linkcontainer">'. $links .'</div>
        <div class="expandibleContent">'. $project['content'] .'</div> </div> </div>';
    }};

    echo $output;
?>