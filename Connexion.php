<?php
//initialisation des variables vides
//$login ='';
//$mdp ='';
//login correspond au mail

//Ajout des paramètres
	if(isset($_POST['login']) && isset($_POST['mdp'])) {
		//si tt les champs sont pleins ont leur attribue les valeur saisies
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];
		if(isset($_POST['con'])) {
		//et si le bouton connecter est appuyé, on envoi la requête
			//connexion BDD pour voir si quelqu'un avec ce mail existe
				//connexion BDD
					try { 
						$linkpdo = new PDO(""); //chemin de la base de données a ajouter avec login et mdp 
			    		}catch (Exception $e) { 
						die('Erreur : '.$e->getMessage());
			    		} 
				///Préparation de la requête
			   		 $req = $linkpdo->prepare(''); //recherche de la personne concernee et recupération des infos
				///Exécution de la requête
			  	  	 $req->execute(array(	'login' => $login,
								'mdp' => $mdp)); 
				
				//vérifier la concordance des mdp
				
		}
	} else {
		//sinon on affiche un message pour dire que cela ne correspond à aucun utilisateur
			
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="indexStyle.css">
</head>
<body>
	<header>
		<h1 id="titre">Connection</h1>
	</header>

	<main>
		<div id="connection">
			<form action="Connexion.php" method="post">
				<fieldset>
					<label class="lab" for="login">Login :</label><input type="text" name="login" value="<?php echo $login;?>"><br />
					<label class="lab" for="mdp">Mot de passe : </label><input type="text" name="mdp" value="<?php echo $mdp;?>"><br />
					<input type="submit" name="con" value="Se connecter" id="submitB">
					<input type="button" name="creer" value="Creer un compte"  onclick="redirection()">

				</fieldset>
			</form>
		</div>
		
	</main>

</body>
</html>



<script type="text/javascript">
	  function redirection(){
        document.location.href="http://localhost/scanQR/IhmSaisie.html";
      }
</script>
