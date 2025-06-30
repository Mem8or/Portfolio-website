<?php
    $menuData = [
        'homePagina' => ['name' => 'Home pagina', 'href' => 'homePagina.php'],
        'hotelKamers' => ['name' => 'Kamers', 'href' => 'hotelKamers.php'],
        'overOns' => ['name' => 'Over ons', 'href' => 'overOns.php'],
        'restaurant' => ['name' => 'Restaurant', 'href' => 'restaurant.php'],
        'contact' => ['name' => 'Contact', 'href' => 'contact.php']];
        
        $currentpage = isset($_GET['page']) ? $_GET['page'] : 'homePagina.php';
        $output = '<ul class="menulist"><li><img class="menulogo" src="images/logo.png" alt="logo"></li>';
        foreach($menuData as $menuitem){

            $url = 'index.php?page=' . htmlspecialchars($menuitem['href']);
            $class = ($menuitem['href'] === $currentpage) ? ' class="current"' : ' class="active"';
            $active = ($menuitem['href'] === $currentpage) ?  '' : ' href="'. $url .'"';
            $output .= '<li><a'. $class .''. $active .'target="_self">'. $menuitem['name'] .'</a></li>';
        }
        $output .= '</ul>';
        echo $output;
?>