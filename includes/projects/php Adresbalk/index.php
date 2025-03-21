<?php
    $page = 'includes/';
    $page .= isset($_GET['page']) ? $_GET['page'] : 'the-joker.php';
    include htmlspecialchars($page)
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?=$title?></title>
		<link rel="stylesheet" href="./css/stylesheet.css">
	</head>
	<body>
		<div id="container">
			<header>
				<span>Batman Villains</span>
			</header>
			<?php include_once 'includes/menu.php'; ?>
			<main>
				<section>
				<?=$image1?>
				</section>
				<section>
				<?=$sectiontext?>
				</section>
				<section>
				<?=$image2?>
				</section>				
			</main>
			<footer>
			</footer>
		</div>
	</body>
</html>