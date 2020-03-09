<?php 
	require_once "server.php";

	//On détermine le statut de la session courante. Si la session n'est pas démarrée, on lance la session
	if(session_status() === PHP_SESSION_NONE) session_start();

	//Si la session ID n'existe pas, on ets rédirigé automatiquement vers la page de connexion.
	if(!isset($_SESSION['iduser']))
	{
		header('Location: ../connexion/');
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Déconnexion</title>
	<meta http-equiv="refresh" content="2; ../connexion/" />
</head>
<body>
	<h1 size="6">Déconnexion en cours ...</h1><br>
	<div><div>
	<?php
		session_destroy();
		unset($_SESSION);
	?>
</body>
</html>