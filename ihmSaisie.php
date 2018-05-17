<!Doctype html>
<html>
	<html>
	<head>
	<title>EventCreationCompte</title>




 
	<link rel="stylesheet" type="text/css" href="ihmSaisie.css" />
	</head>
	<body>
	<div class="centre">
		<div id="registration">
		<h2> Creer un compte </h2>
		<form action="newCompte.php" method="post">
			<fieldset>
		
			<label for="societe">Societe :   </label> <input type="text" name="societe" value=""><br />
			<label for="nom">Nom :           </label>  <input type="text" name="nom" value=""><br />
			<label for="prenom">Prenom :     </label>  <input type="text" name="prenom" value=""><br />
			<label for="adr">Adresse :       </label>  <input type="text" name="adr" value=""><br />
			<label for="codePostale">Code Postal :    </label>  <input type="text" name="codePostale" value=""><br />
			<label for="ville">Ville :       </label>  <input type="text" name="ville" value=""><br />
			<label for="mail">Email :        </label>  <input type="email" name="mail" value=""><br />
			<label for="pwd">Mot de passe :        </label>  <input type="password" name="pwd" value=""><br />

			<div> <label for="M">Homme :           </label>  <input type="radio" name="civilite" value="M"><br />
			<label for="F">Femme :           </label>  <input type="radio" name="civilite" value="F"> <br /> </div>
			<button id="enregistrer" name="enregistrer" type="submit" ">Valider</button>
			<button id="enregistrer" name="cancel" type="button" onclick="annuler()">Annuler</button>

			</fieldset>
		</form>
		</div>
	</div>
	</body>
</html>


<script type="text/javascript">
	function annuler(){
		 document.location.href="http://localhost/scan/index.php"
	}
</script>