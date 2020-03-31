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
  <title>Profil</title>
  
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/sb-admin.css" rel="stylesheet">
  <link href="../css/progressbar.css" rel="stylesheet" type="text/css">
  <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <script src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/1.0.0/dist/progressbar.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <?php
        include("nav.php");
      ?>
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li>
            <a href="compte.php"><i class="fa fa-fw fa-dashboard"></i> MY ACCOUNT</a>
          </li>                 
          <li >
            <a href="transfert.php"><i class="fa fa-fw fa-desktop"></i> MAKE A TRANSACTION</a>
          </li>
          <li >
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
            <h1 class="page-header">Profil</h1>
            <ol class="breadcrumb">
              <li>
                <i class="fa fa-dashboard"></i><a href="compte.php">Dashboard</a>
              </li>
              <li class="active">
                <i class="fa fa-user"></i> Profil
              </li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i>Profil</h3>
              </div>
              <div class="panel-body">
                <div class="contain-table table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>Civility</th>  
                        <th>Name</th>
                        <th>First Name</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Postal Code</th>
                      </tr>
                    </thead>
                    <tbody id="profil">
                      <?php 
                        include_once '../php/bd.php';
                        $select = $baseDeDonne ->prepare("SELECT * From compte,client Where compte.numCompte=".$_SESSION['user']." AND client.idClient=compte.client ");
                        $select->execute();
                        $table = array();
                        while($donne = $select->fetch()){
                          $table[] = $donne;
                        }
                        if (empty($table)) {
                          echo '<span>No message</span>';
                        }else{
                          foreach($table as $ligne){
                          echo '
                                <tr>
                                  <td>'.$ligne['civilite'].'</td>
                                  <td>'.$ligne['nom'].'</td>
                                  <td>'.$ligne['prenom'].'</td>
                                  <td>'.$ligne['pays'].'</td>
                                  <td>'.$ligne['ville'].'</td>
                                  <td>'.$ligne['codePostal'].'</td>
                                </tr>'; 
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
      </div><!-- /.container-fluid -->
    </div><!-- /#wrapper -->
  <script src="../js/bootstrap.min.js"></script>
  <script language="javascript" type='text/javascript'>
    function session(){
      window.location="logout.php"; 
    }
    setTimeout("session()",1000000);
  </script>
</body>
</html>