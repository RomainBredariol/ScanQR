<?php 
		$server='localhost';
		$db='coursphp';
		$login='root';
		$mdp='azerty';
		
		try {
			$linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
		}
		catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}		

	  		 $res = $linkpdo->prepare('SELECT * FROM personnes where admin = 0');

			$res->execute();
			$data = $res->fetch(); 

?>




<!DOCTYPE html>
<html>
<head>
	<title>Participants</title>
	<h1>Affichage des participants</h1>
</head>
<body>
	<div><p><?php echo $data['Societe']; ?> </p></div>
</body>
</html>