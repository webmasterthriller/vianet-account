<?php
	try{
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		include_once 'bd.php';
		$login = substr($baseDeDonne->quote($_POST['login']), 1, -1);
		$select = $baseDeDonne ->prepare("SELECT * From compte Where numCompte='".$login."'");
		$select->execute();
		if($select->fetch()){
			echo "Success";
		}
	}catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}
?>