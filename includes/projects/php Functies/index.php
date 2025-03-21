<?php
	require('./includes/functions.php');

	list($name, $description, $genre, $price, $releaseDate) = getInfo();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Mass Effect Andromeda</title>
		<link rel="stylesheet" href="css/stylesheet.css">
	</head>
	<body>
		<div id="container">
			<table>
				<tr>
					<th colspan="2"><?= $name?></th>
				</tr>
				<tr>
					<td>Omschrijving:</td>
					<td><?= $description?></td>
				</tr>
				<tr>
					<td>Genre:</td>
					<td><?= $genre?></td>
				</tr>
				<tr>
					<td>Prijs:</td>
					<td><?='€ ' . str_replace('.', ',', $price);?></td>
				</tr>
				<tr>
					<td>Verwacht:</td>
					<td><?= $releaseDate?></td>
				</tr>
			</table>
		</div>
	</body>
</html>