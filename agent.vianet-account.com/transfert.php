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
  <title>Transfert</title>
  
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/progressbar.css" rel="stylesheet" type="text/css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
  <script src="operation.js"></script>
  

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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <?php  
        include("nav.php");
      ?>
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li >
            <a href="compte.php"><i class="fa fa-fw fa-dashboard"></i>TABLEAU DE BORD</a>
          </li>                 
          <li class="active">
            <a href="transfert.php"><i class="fa fa-fw fa-desktop"></i>CREDITER UN COMPTE</a>
          </li>
          <li >
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
            <h1 class="page-header">Forms</h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i><a href="compte.php">Dashboard</a></li>
              <li class="active"><i class="fa fa-edit"></i> Forms</li>
            </ol>
          </div>
        </div>
        <div class="transfert-form">  
          <div class="row">
              <form role="form" class="form">
                <div class="banque">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Compte à créditer</label>
                      <select class="form-control compte">
                        <option value="">-</option>
                        <?php
                          $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                          include_once 'php/bd.php';
                          $select = $baseDeDonne ->prepare("SELECT * From agent,compte,client Where agent.idAgent='".$_SESSION['user']."' AND compte.client=client.idClient");
                          $select->execute();
                          $table = array();
                          while($donne = $select->fetch()){
                            $table[] = $donne;
                          }
                          foreach ($table as $ligne) {
                            echo '
                              <option id="compte" value="'.$ligne['numCompte'].'">'.$ligne['nom'].' '.$ligne['prenom'].'</option>
                            '; 
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group input-group">
                      <label>MONTANT A TRANSFERER</label>
                      <input type="number" class="form-control montant" placeholder="" min="10">
                      <span class="input-group-addon">.00</span><br>
                    </div>
                  </div>
                  <div class="col-lg-6" style="display:none;"> 
                    <div class="form-group">
                      <label>EMAIL</label>
                      <input class="form-control email" type="text">
                    </div>
                  </div>
                  <div class="col-lg-6"> 
                    <div class="form-group">
                      <label>OBJET</label>
                      <input class="form-control objet" type="text">
                    </div>
                  </div>
                  <div class="col-lg-6"> 
                    <div class="form-group">
                      <label>SALUTATION</label>
                      <input class="form-control salut" type="text">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>VOTRE MESSAGE : </label>
                      <textarea class="message ckeditor" id="data_message" name="message" rows="3" required style="height: 300px;"></textarea>
                    </div>
                  </div>
                </div><!--Banque-->
                <div class="action" style="display: inline-block;">
                  <div id="action" style="position: relative; margin-left: 50%;margin-top: 10%;">
                    <button type="submit" class="btn ok btn-default">Valider</button>
                  </div>
                </div><!--action-->
                <script type="text/javascript">
                    CKEDITOR.replace('data_message');
                </script>
                <?php  
                  echo '
                    <div style="display:none;">
                      <input id="user" type="text" value="'.$_SESSION['user'].'">
                    </div>
                  ';
                ?>
              </form>
        </div><!-- /.row -->
      </div><!--/.transfert-form-->

    </div><!-- /.container-fluid -->
  </div><!-- /#wrapper -->
  <script src="../js/bootstrap.min.js"></script>  
  <script language="javascript" type='text/javascript'>
    function session(){
      window.location="logout.php";
    }
    setTimeout("session()",1000000); 
  </script>
   <style type="text/css">
      .help-block{
        color : red;
      }
    </style>
</body>
</html>