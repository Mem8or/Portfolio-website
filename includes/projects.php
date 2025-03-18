<?php
    $output = '';

    // array met de data om de projectlijst te genereren
    $projects = [
        'project1' => ['image' => 'images/tempimage.jpg', 'imageAlt' => 'projectImage', 'title' => 'PHP Adresbalk opdracht:', 'description' => 'Opdracht 6 van de les adresbalken van mijn codecrashers opleiding.','contentImage' => 'images/tempimage.jpg', 'content' => 'In deze opdracht is de webpagina opnieuw geschreven zodat op basis van de zoekbalk verschillende pagina\'s worden ingeladen als data op de index pagina.'],
        'project2' => ['image' => 'images/tempimage.jpg', 'imageAlt' => 'projectImage', 'title' => 'PHP Functies opdracht:', 'description' => 'Opdracht 5 van de les functies van mijn codecrashers opleiding.','contentImage' => 'images/tempimage.jpg', 'content' => 'In deze opdracht Heb ik geleeerd hoe een element dynamisch gegenereerd kan worden.'],
        'project3' => ['image' => 'images/tempimage.jpg', 'imageAlt' => 'projectImage', 'title' => 'CSS Opdracht:', 'description' => 'Een opdracht over media queries', 'contentImage' => 'images/tempimage.jpg', 'content' => 'In deze opdracht heb ik een website gemaakt die van style veranderd gebaseerd op het formaat van het scherm (PC of Mobile).'],
        'project4' => ['image' => 'images/tempimage.jpg', 'imageAlt' => 'projectImage', 'title' => 'JAVASCRIPT Fetch api:', 'description' => 'Opdrachten','contentImage' => 'images/tempimage.jpg', 'content' => ''],
        'project6' => ['image' => 'images/tempimage.jpg', 'imageAlt' => 'projectImage', 'title' => 'JAVASCRIPT Functies:', 'description' => 'Hallo ik ben project 6', 'contentImage' => 'images/tempimage.jpg','content' => '']];
    
    // het genereeren van de uitklapbare projectlijst
    if(!empty($projects)){    
        foreach($projects as $project){
        // content voor in de preview
        $output .= '<div class="expandible"> <div class="expandiblePreview"> <img class="previewImage" src="'. $project['image'] .'" alt="'. $project['imageAlt'] .'"> <h2>'. $project['title'] .'</h2><br><p class="previewText">'. $project['description'] .'</p></div>';
        // content in het uitklapbare gedeelte
        $output .= '<div class="expandibleContentWrapper"><img src"'.$project['contentImage'].'" alt="projectImage"><div class="expandibleContent">'. $project['content'] .'</div> </div> </div>';
    }};

    echo $output;
?>