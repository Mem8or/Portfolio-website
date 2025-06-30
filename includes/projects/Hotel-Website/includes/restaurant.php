<?php
    
    $title = 'Restaurant';    
    
    $menu = [
        'Ontbijt' => 
        ['open' => '6:30 - 12:00', 'items' => [
            'Ontbijt items' => [
            ['name' => 'Omelet', 'price' => '2.99', 'desc' => 'Met champignons en verse paprika op een bedje verse sla.'], 
            ['name' => 'Broodmandje met beleg', 'price' => '2.99', 'desc' => 'Een mandje met een selectie van verse broodjes met jam, kaas, roomboter en chocoladepasta.'],
            ['name' => 'American pancakes', 'price' => '2.99', 'desc' => 'Met rood fruit en poedersuiker.'], 
            ['name' => 'Chorizzo paninni', 'price' => '2.99', 'desc' => 'Met kaas en chillisaus.']],
            'Drinken' => [
            ['name' => 'Espresso', 'price' => '2.99', 'desc' => ''], 
            ['name' => 'Thee', 'price' => '2.99', 'desc' => 'Een selectie van diverse theesoorten.'], 
            ['name' => 'Ontbijtsmoothie', 'price' => '2.99', 'desc' => ''],
            ['name' => 'Finnish breakfast', 'price' => '2.99', 'desc' => 'Glas vodka met een sigaret.']]
            ]
        ],

        'Lunch' => 
        ['open' => '12:00 - 15:00', 'items' => [
            'Belegde broodjes' => [
            ['name' => 'Broodje warm rosbief', 'price' => '2.99', 'desc' => ''], 
            ['name' => 'Broodje oude kaas', 'price' => '2.99', 'desc' => ''],
            ['name' => 'Broodje grilworst', 'price' => '2.99', 'desc' => '']],
            'Salades' => [
            ['name' => 'Caesar salade', 'price' => '2.99', 'desc' => ''], 
            ['name' => 'Rucola-grenaatappel salade', 'price' => '2.99', 'desc' => ''],
            ['name' => 'Fruit salade', 'price' => '2.99', 'desc' => '']],
            'Drinken' => [
            ['name' => 'Koffie', 'price' => '2.99', 'desc' => ''], 
            ['name' => 'Thee', 'price' => '2.99', 'desc' => 'Een selectie van diverse theesoorten.']]
            ]
        ],

        'Diner' => 
        ['open' => '17:00 - 23:00', 'items' => [
            'voorgerechten' => [
            ['name' => 'geroosterde Bietensalade', 'price' => '7.99', 'desc' => 'Met geitenkaas, walnoten en een honing-balsamico dressing.'], 
            ['name' => 'Carpaccio van Rundvlees', 'price' => '8.99', 'desc' => 'Met truffelmayonaise, rucola en Parmezaanse kaas'],
            ['name' => 'Gerookte Zalm', 'price' => '9.99', 'desc' => 'Met dillecrème, kappertjes en een citroenpartje.'], 
            ['name' => 'Ravioli met Spinazie e Ricotta', 'price' => '9.99', 'desc' => 'In een romige tomatensaus met basilicum.'],
            ['name' => 'Gegratineerde Champignons', 'price' => '8.99', 'desc' => 'Gevuld met knoflook en kruiden, geserveerd met knapperig brood.']],
            'hoofdgerechten' => [
            ['name' => 'Gegrilde Zalmfilet', 'price' => '13.99', 'desc' => 'Met een citroen-dille saus, geserveerd met seizoensgroenten en aardappelpuree.'], 
            ['name' => 'Ribeye Steak', 'price' => '16.99', 'desc' => 'Geserveerd met een pepersaus, gegrilde groenten en frietjes.'],
            ['name' => 'Kipfilet Supreme', 'price' => '14.99', 'desc' => 'Met een champignonroomsaus, gestoofde worteltjes en aardappelgratin.'], 
            ['name' => 'Vegetarische Lasagne', 'price' => '11.99', 'desc' => 'Laagjes pasta, seizoensgroenten, ricotta en tomatensaus, geserveerd met een frisse salade.'],
            ['name' => 'Gebakken Zeebaars', 'price' => '13.99', 'desc' => 'Op een bedje van spinazie, geserveerd met rijst en een beurre blanc saus.']],
            'kindermenu' => [
            ['name' => 'Mini Burger', 'price' => '7.99', 'desc' => 'Met kaas en frietjes.'], 
            ['name' => 'Kipnuggets', 'price' => '8.99', 'desc' => 'Geserveerd met appelmoes en een klein salade.'],
            ['name' => 'Spaghetti Bolognese', 'price' => '6.99', 'desc' => 'Met huisgemaakte tomatensaus.'],
            ['name' => 'Pannenkoeken', 'price' => '6.99', 'desc' => 'Met stroop en poedersuiker.'], 
            ['name' => 'Fish and Chips ', 'price' => '8.99', 'desc' => 'Gebakken vis met frietjes en een beetje ketchup.']],
            'deserts' => [
            ['name' => 'Tiramisu', 'price' => '8.99', 'desc' => 'Klassieke Italiaanse dessert met lagen van koffie-geweekte koekjes en mascarpone crème.'], 
            ['name' => 'Crème Brûlée', 'price' => '8.99', 'desc' => 'Rijke vanille custard met een knapperige gekarameliseerde suikerlaag.'],
            ['name' => 'Chocolade Fondant', 'price' => '9.99', 'desc' => 'Warme chocoladetaart met een vloeibare kern, geserveerd met vanille-ijs.'], 
            ['name' => 'Lemon Cheesecake', 'price' => '7.99', 'desc' => 'Romige cheesecake met een vleugje citroen en een graham cracker korst.'],
            ['name' => 'Vers Fruit met Sorbet', 'price' => '9.99', 'desc' => 'Een selectie van seizoensfruit, geserveerd met verfrissende sorbet.']],
            'drinken' => [
            ['name' => 'Cola', 'price' => '3.99', 'desc' => ''], 
            ['name' => 'Thee', 'price' => '2.99', 'desc' => ''],
            ['name' => 'koffie', 'price' => '2.99', 'desc' => ''], 
            ['name' => 'Spa rood', 'price' => '3.99', 'desc' => '']],
            'drank' => [
            ['name' => 'Bier', 'price' => '5.99', 'desc' => ''], 
            ['name' => 'Wijn', 'price' => '10.99', 'desc' => ''],
            ['name' => 'Ierse koffie', 'price' => '5.99', 'desc' => ''], 
            ['name' => 'Cocktails', 'price' => '7.99', 'desc' => '']
            ]
        ]
    ]
];

function generate_menu(array $menus){
    $output = '<section class="menucontainer"><p class="largetext">Bekijk ons menu:</p><section class="tab">';
    foreach($menus as $menuname => $menudata){
        $output .= '<button class="tablinks" onclick="openmenu(event, \''. $menuname .'\')">'. $menuname .'</button>';
    }
    $output .= '</section>';

    foreach($menus as $menuname => $menudata){
        $output .= '<section id="'. $menuname .'" class="tabcontent"><p class="largetext">'. $menuname .' Openingstijden: '. $menudata['open'] .'</p>';
        foreach($menudata['items'] as $category => $items){
            $output .= '<ul><li><p class = mediumtext>'. $category .'</p></li><br/>';
            foreach($items as $item){
                $output .= '<li>'. $item['name'] .'</li><li>'. $item['price'] .'</li><li>'. $item['desc'] .'</li><br/><br/>';
            }
            $output .= '</ul><hr/>';
        }
        $output .= '</section>';
    }
    $output .= '</section>';
    return $output;
}

$menuelement = generate_menu($menu);

$body = <<<HTML
<section id="restaurantcontainer">
    <section class="restaurant-content">
        <div class="introtext">
            <p class="largetext">Welkom in Ons Restaurant</p>
            <p class="mediumtext textfield">
                Bij Hotel De Zonne Vallei zijn we trots op ons wereldberoemde restaurant, waar culinaire dromen werkelijkheid worden.<br/>
                Onze 2-duimen chef-kok, bekend om zijn creativiteit en vakmanschap, brengt zijn passie voor koken tot leven in elk gerecht.<br/>
                Met jarenlange ervaring in gerenommeerde keukens over de hele wereld, zorgt onze chef voor een onvergetelijke eetervaring die zowel traditionele als moderne smaken combineert.
            </p>
        </div>
        $menuelement
    </section>
</section>
HTML;
?>