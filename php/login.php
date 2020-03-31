<?php
	try{
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		include_once 'bd.php';
		$login = substr($baseDeDonne->quote($_POST['login']), 1, -1);
		$password = substr($baseDeDonne->quote($_POST['password']), 1, -1);
		$select = $baseDeDonne ->prepare("SELECT * From compte Where numCompte='".$login."' AND motDePasse='".$password."' ");
		$select->execute();
		if($select->fetch()){
			session_start();
			$_SESSION['user'] = $login;
			echo "Success";
		}else{
			echo "Failed";
		}
	}catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}
?>