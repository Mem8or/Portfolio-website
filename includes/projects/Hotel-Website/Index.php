<?php
    // checkt of de waarde in GET een waarde is die bestaat / toegangkelijk is
    $validpages = [
        'homePagina.php',
        'hotelKamers.php',
        'restaurant.php',
        'overOns.php',
        'contact.php'
    ];
    if (isset($_GET['page'])){    
        if (!in_array($_GET['page'], $validpages)){
        $_GET['page'] = 'homePagina.php';
    }} else{
        $_GET['page'] = 'homePagina.php';
    }


    $page = 'includes/';
    $page .= isset($_GET['page']) ? $_GET['page'] : '';
    include $page;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?<?php echo time(); ?>">
    <script src="js/script.js" defer></script>
    <title><?= $title?></title>
</head>

<header>
    <nav>
        <?php include_once 'includes/menu.php';?>
    </nav>
</header>
<section class="pageContent">
    <?= $body?>
</section>
<section class="wrapper">
    <footer>
    <?php include_once 'includes/footer.php';?>
    </footer>
</section>
</html>