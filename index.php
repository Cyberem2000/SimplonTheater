<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php $title = 'Simplon Theater'; ?>
  		<title><?php echo($title); ?></title>
  		<meta charset="utf-8">
  		<link rel="stylesheet" href="main.css">
	</head>
	<body>
	 	<header>
	 		<h1><?php echo($title); ?></h1>
	 	</header>
	 	<main>
		 	<form action="reservation" method="get" accept-charset="utf-8">
		 		<p>
			 		<label for="nb">Combien de places voulez-vous acheter ?</label></br>
					<input type="number" id="nb" name="nb" min="0" max="9">
			 	</p>
			 	<p>
			 		<label for="row">A quelle rangée voulez-vous aller ?</label></br>
					<input type="number" id="row" name="row" min="0" max="7">
			 	</p>
			 	<p class="center">
			 		<input type="submit" value="Réserver mes places">
			 	</p>
		 	</form>
		 	<?php 
	         	include('data.php'); 
	        ?>
		 	<p>
		 		<table width="100%">
		 			<caption>Places disponibles au théâtre</caption>
		 			<tbody>
		 				<?php
		 					for ($i = 0; $i < $nbRows; $i++) {
		 						echo('<tr><th scope="row">' . $i . '</th>');

		 						for ($j = 0; $j < $nbColumns; $j++) { 

		 							$seat = $i . $j;
		 							$color = in_array($seat, $data)
		 							? 'red'
		 							: 'green';

			 						echo('<td class=' . $color .'>' . $seat . '</td>');
			 					}
			 					echo('</tr>');
		 					}
		 				?>
		 			</tbody>
		 			<tfoot>
		 				<tr>
		 					<td>&nbsp;</td>
			 				<?php
			 					for ($i = 0; $i < $nbColumns; $i++) { 
			 						echo('<th scope="col">' . $i . '</th>');
			 					}
			 				?>
		 				</tr>
		 			</tfoot>
		 		</table>	
		 	</p>
	 	</main>
	 	<footer>
	 		<p><?php echo($title); ?></p>
	 	</footer>
	</body>
</html>
