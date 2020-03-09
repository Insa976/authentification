<?php

//Connexion à la base de données
function connect() {

    $host = "127.0.0.1"; //Ou localhost
    $port = 3308;
    $user = "root";
    $pass = "";
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
        $smtp = $pdo->prepare("SELECT * FROM user WHERE iduser=".$iduser);
    	$smtp->execute();
    	$donnees = $smtp->fetch();
    	return $donnees;
    }

    //Fonction qui permet de verifier si l'adresse email existe déjà
    public function getUserByEmail($email) {
    	$pdo = connect();
        $smtp = $pdo->prepare("SELECT * FROM user WHERE email=".$email);
    	$smtp->execute();

    	if ($smtp->rowCount() > 0) {
    		//Si email existe déjà, retourne -1
	        return -1;
	    } else {
	    	//Sinon retourne ok
	        return "ok";
	    }
    }

    //Fonction qui permet de faire la connexion 
    public function getConnexion($email, $mdp) {
    	$pdo = connect();
        $smtp = $pdo->prepare("SELECT * FROM user WHERE email='".$email."' AND mdp='".$mdp."' ");
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