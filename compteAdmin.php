

<!DOCTYPE html>
<html>
<head>
	<title>Compte admin</title>
	<link rel="stylesheet" type="text/css" href="compteAdmin.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</head>
<body>
	<header>
		<h1>Bienvenue Admin</h1>
	</header>

	<div class="container-fluid">
		<?php afficherEvenement() ;?>
	</div>

	
</body>
</html>


<?php






function afficherEvenement( ){
	$server='localhost';
	$db='trello';
	$login='root';
	$mdp='';

// connection alabdd
try { 
	$linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp); //chemin de la base de données a ajouter avec login et mdp 
		
	}catch (Exception $e) { 
	die('Erreur : '.$e->getMessage());
	} 





//recupere le nombre devenement
	$req = $linkpdo -> prepare('select count(*) from evenement ');
	$req -> execute();
	$nombreEvenement = $req -> fetch();
	$nombreEvenement = $nombreEvenement[0];

	?>
<!-- remplie les titre des colonnes -->
	<table class="table table-bordered ">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">Numero</th>
			      <th scope="col">Date</th>
			      <th scope="col">Adresse</th>
			      <th scope="col">Heure</th>
			      <th scope="col">Description</th>
			      <th scope="col">Nom</th>
			      <th scope="col">Code Postale</th>
			       <th scope="col">Ville</th>
			       <th scope="col">Declancher !</th>
			    </tr>
			  </thead>
	<?php


//recupere toute la liste des evenements 
	$req = $linkpdo -> prepare('select * from evenement ');
	$req -> execute();

	// affiches les informations
	$i = 0;
	while($i < $nombreEvenement) {
		$data= $req-> fetch();
		$i = $i +1 ;
		?>
		
			  <tbody>
			    <tr>
			      <th scope="row"><?php echo $i ?></th>
			      <td><?php echo $data[0] ?>   </td>
			      <td><?php echo $data[1] ?></td>
			      <td><?php echo $data[2] ?></td>
			      <td><?php echo $data[3] ?></td>
			      <td><?php echo $data[4] ?></td>
			      <td><?php echo $data[5] ?></td>
			      <td><?php echo $data[6] ?></td>
			      <td><button type="button" class="btn btn-primary" onclick="lancer()">Jour J</button></td>
			    </tr>
			    
			  

		<?php
		
	}
	?>

	</tbody>
	</table>


	<button type="button" class="btn btn-success" onclick="newEvent()">Ajouter un nouvel event</button>
	<?php

	function newEvent(){
		header("Location: newEvent.php");
	}

}

?>

