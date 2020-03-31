<?php
  $login = $_POST['login'];
  $code = $_POST['code'];
  $idOperation=$_POST['id'];
	try{
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		include_once 'bd.php';
    $baseDeDonne->beginTransaction();
    $select = $baseDeDonne ->prepare("SELECT * From operation,compte WHERE operation.idOperation='".$idOperation."' AND operation.typeOperation='out' AND compte.numCompte='".$login."'");
    $select->execute();

    $table = array();
    while($donne = $select->fetch()){
      $table[] = $donne;
    }
    if(empty($table)){
      echo "aucune donnée";
    }else{
      foreach($table as $ligne){
        $date = date("y.m.d");
        $heure = date("H:i:s");
        if($code==$ligne['code1']){
          $select1 = $baseDeDonne ->prepare("UPDATE operation SET niveau = operation.niveau+1, dateOperation='".$date."',heure = '".$heure."' WHERE operation.idOperation = '".$idOperation."' AND operation.typeOperation='out'");
          if($select1->execute()){
            echo "0";
          }
        } 
        if($code==$ligne['code2']){
          $montant = intval($ligne['solde'],10) - intval($ligne['montant'],10);
          $select2 = $baseDeDonne ->prepare("UPDATE compte SET solde = '".$montant."' WHERE compte.numCompte = '".$login."'");
          if($select2->execute()){
            $select3= $baseDeDonne->prepare("UPDATE operation SET niveau = operation.niveau+1, dateOperation='".$date."',heure = '".$heure."' WHERE operation.compte = '".$login."' AND operation.typeOperation='out'");
            if($select3->execute()){
              echo "1";
            }
          }
        }
      }
    }
    $baseDeDonne->commit();
	}catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}
?>