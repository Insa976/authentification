<?php
require_once "pdo.php";
if (session_status() === PHP_SESSION_NONE) session_start();

$user = new User();


if (isset($_POST["inscription"])) {
	//Mes données saisi dans le formulaire
	$nom = $_POST["nom"];
	$prenom = $_POST["prenom"];
	$email = $_POST["email"];
	$mdp1 = $_POST["mdp1"];
	$mdp2 = $_POST["mdp2"];
	$verif = false;
	$msg="";



	$tab=[$nom, $prenom, $email, $mdp1, $mdp2];
	$label=["Nom ","Prénom ", "Adresse e-mail ", "Mot de passe ", "Confirmation du mot de passe "];

	for ($i=0; $i < count($tab) ; $i++) { 
		if(empty($tab[$i])){
			$msg.="<li><strong>".$label[$i]."</strong>est nécessaire</li>";
			$verif = true;
		}
	}

	if ($mdp1!=$mdp2 && $verif===false) {
		$msg.="<li>Les deux mots de passe ne sont pas identiques</li>";
		$verif = true;
	}

	//Si y a pas d'erreurs
	if ($verif===false) {
		echo "coucou";
	}

}


if (isset($_POST["connexion"])) {

	$email = $_POST["email"];
	$mdp = $_POST["mdp"];
	$verif = false;
	$msg="";

	$tab=[$email, $mdp];
	$label=["Adresse e-mail ", "Mot de passe "];

	for ($i=0; $i < count($tab) ; $i++) { 
		if(empty($tab[$i])){
			$msg.="<li><strong>".$label[$i]."</strong>est nécessaire</li>";
			$verif = true;
		}
	}

	var_dump($user->getConnexion($email, md5($mdp)));

	// if (is_numeric($user->getConnexion($email, md5($mdp))) && $verif===false ) {
	// 	$msg.="<li>L'adresse e-mail saisie ou le mot de passe n'est pas correcte!</li>";
	// 	$verif = true;
	// }

	//Si y a pas d'erreurs
	if ($verif===false) {
		echo "coucou";
	}
}
