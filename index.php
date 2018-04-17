<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="indexStyle.css">
</head>
<body>
	<header>
		<h1 id="titre">Bienvenue à toi pd</h1>
	</header>

	<main>
		<div id="connection">
			<form>
				<fieldset>
					<label class="lab" for="login">Login :</label><input type="text" name="login"><br>
					<label for="mdp">Mot de passe : </label><input type="password" name="mdp"><br>
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