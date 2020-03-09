<?php
	if (session_status() === PHP_SESSION_NONE) session_start();
	require_once "server.php";
	if (isset($_SESSION["iduser"])){
		$leuser=$user->getUserById($_SESSION["iduser"]);
	}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Page d'accueil</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
						<li class="nav-item"><a class="nav-link" href="inscription.php">S'inscrire</a></li>
						<li class="nav-item"><a class="nav-link" href="connexion.php">Se connecter</a></li>
					<?php endif ?>
				</ul>
			</div>
		</nav>
		<div class="jumbotron text-center" style="margin-bottom:0">
			<h1>Bienvenue</h1>
			<?php if (isset($_SESSION["iduser"])): ?>
				<h3><?php echo $leuser["nom"]." ".$leuser["prenom"];?></h3>
			<?php endif ?>	
		</div>
		<div class="container" style="margin-top:30px">
			<div class="row justify-content-md-center">
				<?php if (isset($_SESSION["iduser"])): ?>
					<div class="col-md-8 form-group">
						<h4>Mes informations : </h4>
						<hr>
						Nom : <?php $nom = (empty($leuser["nom"]))? "Pas disponible" : $leuser["nom"]; echo $nom;?><br>
						Prénom : <?php $prenom = (empty($leuser["prenom"]))? "Pas disponible" : $leuser["prenom"]; echo $prenom;?><br>
						Adresse e-mail : <?php $email = (empty($leuser["email"]))? "Pas disponible" : $leuser["email"]; echo $email;?><br>
						CB : <?php $cb = (empty($leuser["CB"]))? "Pas disponible" : $leuser["CB"]; echo $cb;?>
					</div>
				<?php else : ?>
					<div class="col-md-6 form-group">
						<a href="inscription.php" class="form-control btn btn-lg btn-info">S'inscrire</a>
					</div>
					<div class="col-md-6 form-group">
						<a href="connexion.php" class="form-control btn btn-lg btn-info">Se connecter</a>
					</div>
				<?php endif ?>
			</div>
		</div>
	</body>
</html>
