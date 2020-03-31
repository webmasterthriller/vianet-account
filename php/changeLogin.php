<?php
	try{
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		include_once 'bd.php';
		$login = substr($baseDeDonne->quote($_POST['login']), 1, -1);
		$password = substr($baseDeDonne->quote($_POST['password']), 1, -1);
		$sql = "UPDATE compte SET motDePasse = '".$password."' WHERE compte.numCompte = '".$login."' ";
		$select = $baseDeDonne ->prepare($sql);
		if($select->execute()){
			echo "Success";
		}else{
			echo "Failed";
		}
	}catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}
?>