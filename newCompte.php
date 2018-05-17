<?php

session_start();

$societe=null;
$civilite=null;
$nom=null;
$prenom=null;
$adr=null;
$cp=null;
$ville=null;
$mail=null;


// si tous champs on été remplies
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['societe']) && isset($_POST['mail']) && isset($_POST['civilite']) && isset($_POST['adr']) && isset($_POST['pwd'])  && isset($_POST['codePostale']) && isset($_POST['ville'])){
	
	$societe=$_POST['societe'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$adr=$_POST['adr'];
	$codePostale=$_POST['codePostale'];
	$ville=$_POST['ville'];
	$mail=$_POST['mail'];
	$pwd=$_POST['pwd'];

	switch ($_POST['civilite']){
		case 'M': $civilite=1; break;
		case 'F': $civilite=0; break;
	}

	if(isset($_POST['enregistrer'])) {
			$server='localhost';
			$db='trello';
			$login='root';
			$mdp='';
			///Connexion au serveur MySQL
			try {
				$linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);

			}
			catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());

			}

			//verifie si lemail eiste deja dans la bdd
			$req = $linkpdo ->prepare('select * from user where mail like :mail');
			$req->execute(
				array('mail' => $mail));
			
			$res = $req -> fetch();
			if($res != null){
				?>
					<script type="text/javascript">

						if (confirm("L'email existe deja! voulez vous recommencer ? ")) {
				    		document.location.href="http://localhost/scan/ihmSaisie.php"
						} else {
				   			 document.location.href="http://localhost/scan/index.php";
						}	
					</script>
				<?php

			}

			// lemail nexiste pas deja donc on peut sauvegarder
			else{
				///Préparation de la requête
				$req = $linkpdo->prepare('INSERT INTO user(societe, civilite, nom, prenom, adresse, codePostale, ville, mail , mdp) VALUES(:societe, :civilite, :nom, :prenom, :adr, :codePostale, :ville, :mail , :pwd)');

				///Exécution de la requête
				$req->execute(
					array('societe' =>$societe ,
				'civilite' => $civilite ,
				'nom' => $nom ,
				'prenom' => $prenom,
				'adr' => $adr,
				'codePostale' => $codePostale, 
				'ville' => $ville,
				'pwd' => $pwd,
				'mail' => $mail));

				$_SESSION['pwd']=$pwd;
				$_SESSION['mail']=$mail;
				

				header("Location: compte.php");

			}


			
			
			
	}

// si tous les champs n'ont pas été remplis ont demande si il veut recommencer si oui il recommence si non il va page d'acceuil
}else{
	?>
	<script type="text/javascript">

		if (confirm("Les information n'ont pas été saisies correctement! voulez vous recommencer ? ")) {
    		document.location.href="http://localhost/scan/ihmSaisie.php"
		} else {
   			 document.location.href="http://localhost/scan/index.php";
		}	
	</script>
	<?php

	
}

?>