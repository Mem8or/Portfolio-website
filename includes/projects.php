<?php
    $server = 'sql303.infinityfree.com';
    $user = 'if0_38517269';
    $pass = 'cOpyieE84vpv0H';
    $db = 'if0_38517269_database';
    // $server = 'localhost';
    // $user = 'GertvanTil';
    // $pass = 'gert2002';
    // $db = 'portfolio-website';
    $output = '';
    
    $dbh = new mysqli($server, $user, $pass, $db);

    if ($dbh->connect_error){
    	die('Verbinden mislukt: '.$dbh->connect_error);
    } else{
        $dbh->set_charset('utf8');
    }

    $projectsResult = $dbh->query("SELECT * FROM projects WHERE visible = 1 ORDER BY title ASC");

    $projects = [];
        while ($row = $projectsResult->fetch_assoc()) {
        $projectId = $row['id'];
        $projects[] = [
        'image' => $row['image'],
        'imageAlt' => $row['imageAlt'],
        'title' => $row['title'],
        'description' => $row['description'],
        'link' => $row['link'],
        'content' => $row['content']
        ];
}

    // het genereeren van de uitklapbare projectlijst
    if(!empty($projects)){    
        foreach($projects as $project){
        // content voor in de preview
        $output .= '<div class="expandible"> <div class="expandiblePreview"> <img class="previewImage" src="'. $project['image'] .'" alt="'. $project['imageAlt'] .'"> <div class="previewtext"><h2>'. $project['title'] .':</h2><p>'. $project['description'] .'</p></div></div>';
        // content in het uitklapbare gedeelte
        $output .= '<div class="expandibleContentWrapper">
        <div class="linkcontainer"><p class = "pagelink"><a class="pagelinktext" href="'. $project['link'] .'" target="_blank">Bekijk Project</a></p></div>
        <div class="expandibleContent">'. $project['content'] .'</div> </div> </div>';
    }};

    echo $output;
?>