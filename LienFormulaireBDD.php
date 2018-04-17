<?php

$societe=null;
$civilite=null;
$nom=null;
$prenom=null;
$adr=null;
$cp=null;
$ville=null;
$mail=null;

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['societe']) && isset($_POST['mail']) && isset($_POST['civilite']) && isset($_POST['adr']) && isset($_POST['cp']) && isset($_POST['ville'])){
	
	$societe=$_POST['societe'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$adr=$_POST['adr'];
	$cp=$_POST['cp'];
	$ville=$_POST['ville'];
	$mail=$_POST['mail'];

	switch ($_POST['civilite']){
		case 'M': $civilite=1; break;
		case 'F': $civilite=0; break;
	}

	if(isset($_POST['enregistrer'])) {
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
			
			///Préparation de la requête
			$req = $linkpdo->prepare('INSERT INTO personnes(Societe, civilite, nom, prenom, adresse, cp, ville, email) VALUES(:societe, :civilite, :nom, :prenom, :adr, :cp, :ville, :mail);');

			///Exécution de la requête
			$req->execute(
				array('societe' =>$societe ,
			'civilite' => $civilite ,
			'nom' => $nom ,
			'prenom' => $prenom,
			'adr' => $adr,
			'cp' => $cp, 
			'ville' => $ville,
			'mail' => $mail));

			header("Location: MotDePasse.html");

			
	}
}else{
	header("Location: IhmSaisieErreur.html");
}

?>