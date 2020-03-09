<?php

//Connexion à la base de données
function connect() {

    $host = "127.0.0.1"; //Ou localhost
    $port = 3306;
    $user = "root";
    $pass = "insa";
    $db = "authentification";

    try {
        $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $db . ';port=' . $port . ';charset=UTF8', $user, $pass);
        return $pdo;
    } catch (\PDOException $e) {
        echo $e;
    }
}


class User {

    //Fonction qui permet de retourner les réulstat d'un user s'il existe
    public function getUserById($iduser) {
    	$pdo = connect();
        $smtp = $pdo->prepare("SELECT * FROM users U LEFT JOIN data D ON U.iduser=D.iduser WHERE U.iduser='".$iduser."'");
    	$smtp->execute();
    	$donnees = $smtp->fetch();
    	return $donnees;
    }

    //Fonction qui permet de verifier si l'adresse email existe déjà
    public function getUserByEmail($email) {
    	$pdo = connect();
        $smtp = $pdo->prepare("SELECT * FROM users WHERE email='".$email."'");
    	$smtp->execute();

    	return $smtp;
    }

    //Fonction qui permet de faire la connexion 
    public function getConnexion($email, $mdp) {
    	$pdo = connect();
        $smtp = $pdo->prepare("SELECT * FROM users WHERE email='".$email."' AND mdp='".$mdp."' ");
    	$smtp->execute();

    	//Si on trouve un résultat, la connexion est établie
    	if ($smtp->rowCount() > 0) {
    		$donnees = $smtp->fetch();
	    	return $donnees;
	    //Sinon on retourne -1
	    } else {
	        return -1;
	    }	
    }


    //Ici nous allons insérer des données dans notre BD
    public function setUser($nom, $prenom, $email, $mdp) {
        $connect = connect();
        $req = $connect->prepare("INSERT INTO users (nom, prenom, email, mdp) VALUES(?,?,?,?)");
        $req->bindParam(1, $nom, PDO::PARAM_STR);
        $req->bindParam(2, $prenom, PDO::PARAM_STR);
        $req->bindParam(3, $email, PDO::PARAM_STR);
        $req->bindParam(4, $mdp, PDO::PARAM_STR);
        $req->execute();
    }
}