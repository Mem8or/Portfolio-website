<?php
    $output = '';

    // array met de data om de projectlijst te genereren
    $projects = [
        'project1' => [
            'image' => 'images/php.svg', 
            'imageAlt' => 'projectImage', 
            'title' => 'PHP Adresbalk opdracht:', 
            'description' => 'Een opdracht over adresbalken van mijn codecrashers opleiding.', 
            'links' => ['php Adresbalk/index.php'], 
            'content' => 'In deze opdracht heb ik de webpagina opnieuw geschreven zodat op basis van de zoekbalk verschillende pagina\'s worden ingeladen als data. Hiermee is het ook mogelijk om specifiek de pagina aan te duiden zonder bestandtypes.'
        ],

        'project2' => [
            'image' => 'images/php.svg', 
            'imageAlt' => 'projectImage', 
            'title' => 'PHP Functies opdracht:', 
            'description' => 'Een opdracht over PHP functies van mijn codecrashers opleiding.', 
            'links' => ['php Functies/index.php'], 
            'content' => 'In deze opdracht Heb ik geleeerd hoe elementen dynamisch gegenereerd kunnen worden. Dit is niet alleen handig voor text maar kan ook gebruikt worden om hele delen van een website op te bouwen zoals deze uitklapbare elementen.'
        ],

        'project3' => [
            'image' => 'images/css.svg', 
            'imageAlt' => 'projectImage', 
            'title' => 'CSS Opdracht:', 
            'description' => 'Een opdracht over media queries van mijn codecrashers opleiding.', 
            'links' => ['CSS/index.html'], 
            'content' => 'In deze opdracht heb ik een website gemaakt die van stijl veranderd gebaseerd op het formaat van het scherm (computer of telefoon). Dit is erg belangrijk voor de bruikbaarheid van de website op veel verschillende apparaten. (deze website checkt hier wel voor maar is niet gestyled voor desktop)'
        ],

        'project4' => [
            'image' => 'images/js.svg', 
            'imageAlt' => 'projectImage', 
            'title' => 'JAVASCRIPT Fetch api:', 
            'description' => 'Opdrachten over javascript fetch van mijn codecrashers opleiding.', 
            'links' => ['JS Fetch/index.html'], 
            'content' => 'In deze opdrachten heb ik geleerd om javascript fetch en AJAX te schrijven en toe te passen. Dit wordt gebruikt om de pagina aan te passen zonder het te herladen, AJAX is een ouder alternatief van fetch maar wordt nog wel gebruikt op oudere websites.'
        ],

        'project5' => [
            'image' => 'images/js.svg', 
            'imageAlt' => 'projectImage', 
            'title' => 'JAVASCRIPT Functies:', 
            'description' => 'Opdracten over javascript functies van mijn codecrashers opleiding.', 
            'links' => ['JS Functies1/index.html', 'JS Functies2/index.html'], 
            'content' => 'In deze opdrachten heb ik geleerd om javascript functies te schrijven en toe te passen. Dit wordt gebruikt om berekeningen en functionaliteit toe te voegen aan websites.'
        ]];
    
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