<?php 
  include_once 'bd.php';
  $select = $baseDeDonne ->prepare("SELECT * From operation Where operation.compte='".$_POST['user']."' AND operation.niveau!=2");
  $select->execute();
  $table = array();
  while($donne = $select->fetch()){
    $table[] = $donne;
  }
  if(empty($table)){
    echo "Form"; 
  }else{
    echo "Hist";
  }
?>