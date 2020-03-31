<?php
  try{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    include_once 'php/bd.php';
    $select = $baseDeDonne ->prepare("SELECT * From compte,client Where compte.numCompte='".$_POST['compte']."' AND compte.client=client.idClient");
    $select->execute();
    $table = array();
    while($donne = $select->fetch()){
      $table[] = $donne;
    }
    foreach ($table as $ligne) {
       echo $ligne['mail'];
    }
  }catch(Exception $e){
    die('Erreur : '.$e->getMessage());
  }
?>