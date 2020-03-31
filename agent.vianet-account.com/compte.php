<?php
  session_start();
  if(empty($_SESSION['user'])){
    header('Location: ../');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>compte</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="icon" href="img/favicon-32x32.png" type="image/x-icon; charset=binary">
</head>

<body>
  <div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <?php  
        include("nav.php");
      ?>
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li class="active">
            <a href="compte.php"><i class="fa fa-fw fa-dashboard"></i>TABLEAU DE BORD</a>
          </li>                 
          <li>
            <a href="transfert.php"><i class="fa fa-fw fa-desktop"></i>CREDITER UN COMPTE</a>
          </li>
          <li>
            <a href="forms.php"><i class="fa fa-fw fa-edit"></i>NOTIFICATION</a>
          </li>            
        </ul>
      </div>
        <!-- /.navbar-collapse -->
    </nav>
      <div id="page-wrapper">
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header fa fa-dashboard">Tableau de bord</h1>
            </div>
            </div>
              <!-- /.row -->
            <div class="col-lg-3 col-md-6">
              <div class="panel panel-red">
                <div class="panel-heading">
                  <?php
                    include_once 'php/bd.php';
                    $select = $baseDeDonne ->prepare("SELECT * From compte,agent Where idAgent = '".$_SESSION['user']."'");
                    $select->execute();
                    $table = array();
                    while($donne = $select->fetch()){
                      $table[] = $donne;
                    }
                    if(!empty($table)){
                      echo'
                          <div class="row">
                            <div class="col-xs-9 text-right">
                              <div class="huge" id="solde">'.sizeof($table).'</div>
                              <div>CLIENT</div>
                            </div>
                          </div>
                      ';
                    }
                  ?>
                </div>
              </div>
            </div>
        </div>
                <!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i>HISTORIQUE</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>Transaction</th>
                        <th>DU CLIENT</th>
                        <th>EN DATES</th>
                        <th>VIREMENT</th>
                        <th>VERS BANQUE</th>
                        <th>IBAN/INSTITUT</th>
                        <th>SWIFT/TRANSIT</th>
                        <th>COMPTE</th>
                        <th>STATUT</th>
                      </tr>
                    </thead>
                    <tbody id="historique">
                      <?php
                        include_once 'php/bd.php';
                    $select = $baseDeDonne ->prepare("SELECT * From operation,compte,agent,client Where agent.idAgent='".$_SESSION['user']."' AND compte.numCompte=operation.compte AND agent.idAgent=compte.agent AND client.idClient=compte.client ORDER BY dateOperation DESC, heure ASC ");
                        $select->execute();
                        $table = array();
                        while($donne = $select->fetch()){
                          $table[] = $donne;
                        }
                        
                        if(empty($table)) {
                            echo '
                                <tr>
                                  <td><i>(vide)</i></td>
                                  <td><i>(vide)</i></td>
                                  <td><i>(vide)</i></td>
                                  <td><i>(vide)</i></td>
                                  <td><i>(vide)</i></td>
                                  <td><i>(vide)</i></td>
                                  <td><i>(vide)</i></td>
                                  <td><i>(vide)</i></td>
                                </tr>'
                              ;  
                        }else{
                          foreach ($table as $ligne) {
                              if($ligne['statut']==2){
                                  $statut="Terminée";
                              }else{
                                  $statut="en attente";
                              }
                            echo '
                              <tr>
                                <td>'.$ligne['idOperation'].'</td>
                                <td>'.$ligne['nom'].' '.$ligne['prenom'].'</td>
                                <td>'.$ligne['dateOperation'].' at '.$ligne['heure'].'</td>
                                <td>'.$ligne['montant'].' '.$ligne['devise'].'</td>
                                <td>'.$ligne['banqueBenef'].'/#/'.$ligne['pays'].'</td>
                                <td>'.$ligne['ibanTransit'].'</td>
                                <td>'.$ligne['swiftInstitut'].'</td>
                                <td>'.$ligne['compteBenef'].'</td>
                                <td>'.$statut.'</td>
                              </tr>
                            ';   
                          }
                        }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- /.row -->
      </div>
      <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
    <script language="javascript" type='text/javascript'>
      function session(){
          window.location="logout.php";
      }
      setTimeout("session()",300000);
    </script>
</body>
</html>