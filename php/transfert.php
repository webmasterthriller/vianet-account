<?php
  $login = $_POST['login'];
  $localBenef = $_POST['address'];
  $banqueBenef = $_POST['raison'];
  $ibanTransit = $_POST['ibanTransit'];
  $swiftInstitut = $_POST['swiftInstitut'];
  $compteBenef = $_POST['compte'];
  $montant = $_POST['montant'];
  $code1 = generer(6);
  $code2 = generer(8);
	try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	include_once 'bd.php';
    $baseDeDonne->beginTransaction();
    $select = $baseDeDonne ->prepare("SELECT * From operation Where operation.compte='".$login."' AND operation.typeOperation='out' AND operation.niveau!=2");
    $select->execute();
    $table = array();
    while($donne = $select->fetch()){
    	$table[] = $donne;
    }
    if(empty($table)){
      $select2 = $baseDeDonne ->prepare("SELECT solde From compte Where compte.numCompte='".$login."'");
      $select2->execute();
      $table2 = array();
      while($donne2 = $select2->fetch()) {
        $table2[] = $donne2;
      }
      foreach ($table2 as $value) {
        if($value['solde'] < $montant) {
          echo "erreur";
        }else{
          $date = date("y.m.d");
          $heure = date("H:i:s");
          $select3 = $baseDeDonne ->prepare("INSERT INTO operation VALUES (NUll,'out','".$date."','".$heure."',0,'".$code1."','".$code2."','".$login."','".$localBenef."','".$banqueBenef."','".$ibanTransit."','".$swiftInstitut."','".$compteBenef."','".$montant."')");
          if($select3->execute()){
            echo "-1";
          }
        }
      }
    }else{
    	foreach($table as $ligne){
        if($ligne['niveau']==0){
          echo "-1";
        }
        if($ligne['niveau']==1){
          echo "0";
        }
      }
    }
    $baseDeDonne->commit();
	}catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}
  function generer($nb_car){
    $chaine = 'aAzZeErRtTyYuUpIPqQsSdDfFgGhHJkKLmMwWxXcCvVbBnN123456789';
      $nbLettres = strlen($chaine) - 1;
      $generation = '';
      for($i=0; $i < $nb_car; $i++){
          $pos = mt_rand(0, $nbLettres);
          $car = $chaine[$pos];
          $generation .= $car;
      }
    return $generation;
  }
?>