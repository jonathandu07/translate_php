<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>accueil</title>
</head>

<body>
	<?php
	include "./navbar.php";
	?>
	<main>
		<?php
		$mot = $_GET['therme'];
		function t($mot)
		{
			$dictionnaire = parse_ini_file('fr.ini');

			foreach ($dictionnaire as $l => $v) {
				$fr = array($l);
				$lt = array($v);
			};

			return $fr;
		}

		if (!empty($mot)) {
			// echo '<h3>' . 'vous avez recherché le therme: '.$v.'</h3>';
			// echo '<a href="/">' . 'réinitialiser' . "</a>";  
			if (t($mot)) {
				echo '<li>' . $langue[$mot] . "</li>";
				echo '<form>';
				echo '<input type="button" value="Go back!" onclick="history.back()">';
				echo '</form>';
			} else {
				echo '<h3>' . 'vous avez recherché le therme: ' . $mot . '</h3>';
				echo '<form>';
				echo '<input type="button" value="Go back!" onclick="history.back()">';
				echo '</form>';
			}
		}
		?>
	</main>

</body>

</html>