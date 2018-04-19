<?php


$mdp=null;
$repeatmdp=null;

if(isset($_POST['mdp']) && isset($_POST['repeatmdp'])){
	
	$mdp=$_POST['mdp'];
	$repeatmdp=$_POST['repeatmdp'];


	if(isset($_POST['enregistrer'])) {
		if($repeatmdp==$mdp){
			$server='localhost';
			$db='projettrello';
			$login='root';
			$mdp='azerty';
			///Connexion au serveur MySQL
			try {
				$linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);

			}
			catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());

			}

			$req = $linkpdo->prepare('UPDATE personnes set mdp = :newMdp;');

			///Exécution de la requête
			$req->execute(
				array('newMdp' => $mdp));



			
		}else{
			header("Location: MDPErreur.html");
		}

			
	}
}else{
	header("Location: IhmSaisieErreur.html");
}

?>