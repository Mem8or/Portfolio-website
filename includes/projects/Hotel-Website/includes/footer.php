<?php
    $footerData = [
        'Contact' => [
            'name' => 'Contact',
            'loc' => ['display' => '1234 Zonnestraat 1234AB Alkmaar Noord-Holland', 'href' => 'https://www.google.com/maps/place/Pee+Pee+Creek/@39.154898,-83.1310169,13z/data=!3m1!4b1!4m6!3m5!1s0x88471d243c38d9c3:0xec734e7e6ae648be!8m2!3d39.1568576!4d-83.0911979!16s%2Fm%2F012bd112?entry=ttu&g_ep=EgoyMDI1MDUxNS4xIKXMDSoASAFQAw%3D%3D', 'target' => '_blank'],
            'telefoonnr' => ['display' => '555-123-4567', 'href' => '', 'target' => '_blank'],
            'email' => ['display' => 'test@zonnevallei.hotel.com', 'href' => '', 'target' => '_blank'],
            'message' => ['display' => 'Stuur ons een bericht', 'href' => 'index.php?page=contact.php', 'target' => '']
        ],
        'Werken' => [
            'name' => 'Carrieres',
            'vacatures' => ['display' => 'Vacatures', 'href' => '', 'target' => '_blank'],
            'telefoonnr' => ['display' => '555-123-4567', 'href' => '', 'target' => '_blank'],
            'email' => ['display' => 'test@zonnevallei.hotel.com', 'href' => '', 'target' => '_blank'],
            'message' => ['display' => 'Stuur ons een bericht', 'href' => '', 'target' => '_blank']
        ]
    ];

    function generate_footer(array $data){
        $output = '<section class="container">';
        foreach($data as $column){
                $output .= '<article><ul>';
                foreach($column as $row){
                    if(is_array($row)){
                        $output .= '<li><a class="mediumtext" href="'. $row['href'] .'" target="'. $row['target'] .'">'. $row['display'] .'</a></li>';
                    }else{
                        $output .= '<li><p class="largetext">'. $row .'</p></li>';
                    }
                }
            $output .= '</ul></article>';
        };
        $output .= <<<WIDGET
                    <a class="weatherwidget-io" href="https://forecast7.com/nl/52d634d75/alkmaar/" data-label_1="ALKMAAR" data-icons="Climacons Animated" data-mode="Current" data-theme="original" data-basecolor="#5c4525" data-cloudfill="" >ALKMAAR</a>
                    <script>
                    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                    </script>
                    WIDGET;

            $output .= '</section>';
            return $output;
    };

    echo generate_footer($footerData);
?>
