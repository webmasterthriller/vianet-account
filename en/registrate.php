<?php
  try{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    include_once '../php/bd.php';
    $civilite = $_POST['civilite'];
    $nom = substr($baseDeDonne->quote($_POST['nom']), 1, -1);
    $prenom = substr($baseDeDonne->quote($_POST['prenom']), 1, -1);
    $mail = substr($baseDeDonne->quote($_POST['mail']), 1, -1);
    $pays = $_POST['pays'];
    $ville = substr($baseDeDonne->quote($_POST['ville']), 1, -1);
    $codePostal = substr($baseDeDonne->quote($_POST['postal']), 1, -1);
    $adresse  = substr($baseDeDonne->quote($_POST['adresse']), 1, -1);
    $telephone = substr($baseDeDonne->quote($_POST['phone']), 1, -1);
    $numCompte = rand(10000000, 99999999);
    $codeBanque = 'BJ22921001';
    $swift = 'VNTABJXXX';
    $cleRib = rand(10,99);
    $iban  = $codeBanque.$numCompte.$cleRib;
    $solde = 0;
    $devise = $_POST['devise'];
    $motdepasse = generer(15); 
    $statut = 0;
    $agent = 'agent1';

    $baseDeDonne->beginTransaction();
    $verif = $baseDeDonne -> prepare("SELECT numCompte FROM compte");
    $verif ->execute();
    $table = array();
    while( $donne = $verif->fetch()) {
      $table[]=$donne;
    }
    foreach ($table as $compte) {
      while($numCompte == $compte){
        $numCompte = rand(10000000, 99999999);
      }
    }
    $select = $baseDeDonne -> prepare(" INSERT INTO client VALUES (NUll,'".$civilite."','".$nom."','".$prenom."','".$mail."','".$pays."','".$ville."','".$codePostal."','".$adresse."','".$telephone."') ");
    $select->execute();
    
    $client = $baseDeDonne->lastInsertId();
    $selec = $baseDeDonne ->prepare("INSERT INTO compte VALUES (".$numCompte.",'".$codeBanque."','".$swift."','".$iban."',".$cleRib.",".$solde.",'".$devise."','".$motdepasse."','".$client."','".$agent."')");
    if($selec -> execute()){// insertion compte
      echo $numCompte; 
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