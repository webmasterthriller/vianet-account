<?php
  session_start();
  if(empty($_SESSION['user'])){
    header('Location: ../en');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Account</title>
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="icon" href="../img/favicon-32x32.png" type="image/x-icon; charset=binary">
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
            <a href="compte.php"><i class="fa fa-fw fa-dashboard"></i> MY ACCOUNT</a>
          </li>                 
          <li>
            <a href="transfert.php"><i class="fa fa-fw fa-desktop"></i> MAKE A TRANSACTION</a>
          </li>
          <li>
            <a href="forms.php"><i class="fa fa-fw fa-edit"></i> SUBMIT CONCERN</a>
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
              <h1 class="page-header">MY ACCOUNT <small>summary</small></h1>
                <ol class="breadcrumb">
                  <li class="active">
                    <i class="fa fa-dashboard"></i> MY ACCOUNT
                  </li>
                </ol>
            </div>
            </div>
              <!-- /.row -->
            <div class="col-lg-3 col-md-6">
              <div class="panel panel-red">
                <div class="panel-heading">
                  <?php 
                    include_once '../php/bd.php';
                    $sql = "SELECT * From compte Where compte.numCompte='".$_SESSION['user']."'";
                    $select = $baseDeDonne ->prepare($sql); /*préparation de la requete*/
                    $select->execute();
                    $table = array();
                    while($donne = $select->fetch()){
                      $table[] = $donne;
                    }
                    foreach ($table as $ligne) {
                      echo '
                            <div class="row">
                              <div class="col-xs-3">
                                <div class="huge" id="devise">'.$ligne['devise'].'</div>
                                <div>CURRENCY</div>
                              </div>
                              <div class="col-xs-9 text-right">
                                <div class="huge" id="solde">'.$ligne['solde'].'</div>
                                <div>BALANCE</div>
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
                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i>HISTORICAL</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>Transaction n°</th>
                        <th>TYPE</th>  
                        <th>DATE</th>
                        <th>HOUR</th>
                        <th>AMOUNT</th>
                        <th>STATUS</th>
                      </tr>
                    </thead>
                    <tbody id="historique">
                      <?php 
                        include_once '../php/bd.php';
                        $sql = "SELECT * From operation Where operation.compte='".$_SESSION['user']."' ORDER BY dateOperation DESC, heure ASC ";
                        $select = $baseDeDonne ->prepare($sql); /*préparation de la requete*/
                        $select->execute();
                        $table = array();
                        while($donne = $select->fetch()){
                          $table[] = $donne;
                        }
                        foreach($table as $ligne){
                          if($ligne['niveau']==2) {
                            $statut="Completed";
                          }else{
                            $statut="Pending";
                          }
                          echo '
                                <tr>
                                  <td>'.$ligne['idOperation'].'</td>
                                  <td>'.$ligne['typeOperation'].'</td>
                                  <td>'.$ligne['dateOperation'].'</td>
                                  <td>'.$ligne['heure'].'</td>
                                  <td>'.$ligne['montant'].'</td>
                                  <td>'.$statut.'</td>
                                </tr>'
                              ;  
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
    <script src="../js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>
    <script language="javascript" type='text/javascript'>
      function session(){
          window.location="logout.php";
      }
      setTimeout("session()",300000);
    </script>
</body>
</html>
