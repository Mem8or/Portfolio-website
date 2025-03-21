<?php
	$mainMenu = array(
		array('href' => 'the-joker.php', 'title' => 'The Joker', 'active' => true),
		array('href' => 'the-penguin.php', 'title' => 'The Penguin', 'active' => true),
		array('href' => 'the-riddler.php', 'title' => 'The Riddler', 'active' => true),
		array('href' => 'mr-freeze.php', 'title' => 'Mr. Freeze', 'active' => true),
		array('href' => 'the-scarecrow.php', 'title' => 'The Scarecrow', 'active' => true),
		array('href' => 'poison-ivy.php', 'title' => 'Poison Ivy', 'active' => true),
		array('href' => 'ras-al-ghul.php', 'title' => 'Ra\'s al Ghul', 'active' => true),
		array('href' => 'bane.php', 'title' => 'Bane', 'active' => true)
	);
?>
<nav>
	<ul>
	<?php
		$currentpage = isset($_GET['page']) ? $_GET['page'] : '';
			foreach($mainMenu as $menuItem){
				if($menuItem['active'] === true){
					$url = 'index.php?page=' . htmlspecialchars($menuItem['href']);
					$class = ($menuItem['href'] === $currentpage) ? ' class="current"' : '';
					echo '<li><a'. $class .' href="'. $url . '" target="_self">'. $menuItem['title'] . '</a></li>';
				}
			}
		?>
	</ul>
</nav>