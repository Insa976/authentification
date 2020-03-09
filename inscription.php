<?php
	if (session_status() === PHP_SESSION_NONE) session_start();
	require_once "server.php";

	if (isset($_SESSION["iduser"])) header("Location:index.php");
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Formulaire d'inscription</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<style type="text/css">
			#msgErreur li{ color: red; }
			#msgErreur{ background-color: #fff; }
		</style>
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
			<a class="navbar-brand" href="index.php">Accueil</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav">
					<?php if (isset($_SESSION["iduser"])): ?>
						<li class="nav-item"><a class="nav-link" href="deconnexion.php">Déconnexion</a></li>
					<?php else: ?>
						<li class="nav-item"><a class="nav-link" href="connexion.php">Se connecter</a></li>
					<?php endif ?>
				</ul>
			</div>
		</nav>
		<div class="jumbotron text-center" style="margin-bottom:0">
			<h1>Inscription</h1>
			<p>Formulaire d'inscription</p>
		</div>
		<div class="container" style="margin-top:30px">
			<div class="row justify-content-md-center">
				<div class="col-md-6 border py-4 rounded bg-dark">
					<?php if (isset($verif) && $verif===true)
						echo '<ul id="msgErreur">'.$msg.'</ul>';
					?>
					<form method="POST" action="inscription.php">
						<div class="form-group">
							<input class="form-control" type="text" name="nom" value="<?php if(isset($_POST['inscription'])) echo $_POST['nom']; ?>" placeholder="Nom">
						</div>
						<div class="form-group">
							<input class="form-control" type="text" name="prenom" value="<?php if(isset($_POST['inscription'])) echo $_POST['prenom']; ?>" placeholder="Prénom">
						</div>
						<div class="form-group">
							<input class="form-control" type="email" name="email" value="<?php if(isset($_POST['inscription'])) echo $_POST['email']; ?>" placeholder="Adresse e-mail">
						</div>
						<div class="form-group">
							<input class="form-control" type="password" name="mdp1" value="<?php if(isset($_POST['inscription'])) echo $_POST['mdp1']; ?>" placeholder="Mot de passe">
						</div>
						<div class="form-group">
							<input class="form-control" type="password" name="mdp2" value="<?php if(isset($_POST['inscription'])) echo $_POST['mdp2']; ?>" placeholder="Confirmation du mot de passe">
						</div>
						<button class="btn btn-primary" type="submit" name="inscription">S'inscrire</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
