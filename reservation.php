<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php $title = 'Réservation'; ?>
  		<title><?php echo($title); ?></title>
  		<meta charset="utf-8">
  		<link rel="stylesheet" href="style.css">
  	</head>
  	<body>
	 	<header>
	 		<h1><?php echo($title); ?></h1>
	 	</header>
	 	<main>
	 		<?php
	         	$nb  = $_GET['nb'];
	         	$row = $_GET['row'];

	         	if (!$nb || $row === '') {
	         		if (!$nb) {
		         		echo('<p class="alert">Vous n\'avez réservé aucune place.</p>');
		         	}
		         	if ($row === '') {
		         		echo('<p class="alert">Vous n\'avez sélectionné aucune rangée.</p>');
		         	}
	         	} else {

	         		include('data.php');

	         		$nbMin = $row . '0';
					$nbMax = $row . ($nbColumns - 1);
					$seats = [];

					for ($i = $nbMin; $i <= $nbMax; $i++) {

						if ($nb == count($seats)) {
							break;
						}

						if (!in_array($i, $data)) {
							array_push($seats, $i);
						}
					}

					$s = $nb > 1 ? 's' : '';

					if ($nb > count($seats)) {
						$etre = $s ? 'ne sont' : 'n\'est';
						echo('<p class="alert">' . $nb . ' place' . $s . ' demandée' . $s . ' ' . $etre . ' pas disponible' . $s . ' sur la rangée n°' . $row . '.</p>');
					} else {
						$data = ($data[0] !== '' ? $separ : '') . implode($seats, $separ);
						file_put_contents('data', $data, FILE_APPEND);

	         			echo('<p class="confirm">Vous avez bien réservé ' . $nb . ' place' . $s . ' sur la rangée n°' . $row .'.</p>');
					}
	         	}
	        ?>
	        <p>
	 			<a href="./">Retour à l'accueil</a>
	 		</p>
	 	</main>
	 	<footer>
	 		<p><?php echo($title); ?></p>
	 	</footer>
	</body>
</html>
