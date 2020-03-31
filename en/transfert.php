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
  <title>Transfert</title>

  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/sb-admin.css" rel="stylesheet">
  <link href="../css/progressbar.css" rel="stylesheet" type="text/css">
  <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <script src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/1.0.0/dist/progressbar.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="transfert.js"></script>
  <script src="check.js"></script>

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
          <li class="active">
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
            <h1 class="page-header">Forms</h1>
            <ol class="breadcrumb">
              <li>
                <i class="fa fa-dashboard"></i>  <a href="compte.php">Dashboard</a>
              </li>
              <li class="active">
                <i class="fa fa-edit"></i> Forms
              </li>
            </ol>
          </div>
        </div>
        <div class="historique" style="display: none;">
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
                          <th>STATUS</th>
                          <th>DATE</th>
                          <th>HOUR</th>
                          <th>AMOUNT</th>
                          <th>RECIPIENT</th>
                          <th>ACTION</th>
                        </tr>
                      </thead>
                      <tbody id="historique">
                        <?php
                          include_once '../php/bd.php';
                          $select = $baseDeDonne ->prepare("SELECT * From operation Where operation.compte='".$_SESSION['user']."' AND operation.niveau!=2 ORDER BY dateOperation DESC, heure ASC");
                          $select->execute();
                          $table = array();
                          while($donne = $select->fetch()){
                            $table[] = $donne;
                          }
                          if(empty($table)){
                            echo "<script type='text/javascript'>$('.transfert-form').fadeIn(); $('.historique').fadeOut();</script>";
                          }else{
                            echo "<script type='text/javascript'>$('.transfert-form').fadeOut(); $('.historique').fadeIn();</script>";
                            foreach($table as $ligne){
                              if($ligne['niveau']!=2) {
                                $statut="Pending";
                                echo '
                                  <tr>
                                    <td>'.$statut.'</td>
                                    <td>'.$ligne['dateOperation'].'</td>
                                    <td>'.$ligne['heure'].'</td>
                                    <td>'.$ligne['montant'].'</td>
                                    <td>'.$ligne['compteBenef'].'</td>
                                    <td><button id="'.$ligne['idOperation'].'" class="btn submit" value="'.$ligne['idOperation'].'">Continue</button>&nbsp<button id="" class="btn reset resume">Cancel</button></td>
                                  </tr>'
                                ;
                              }
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
        </div><!--historique-->

        <div class="transfert-form" style="">

          <div class="row">
              <form role="form" class="form">
                <div class="banque">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>BANK ADDRESS</label>
                      <select class="form-control address">
                        <option value="">-</option>
                        <option id="address" value="ST">AFRICA</option>
                        <option id="address" value="OC">AMERICA</option>
                        <option id="address" value="OC">CANADA</option>
                        <option id="address" value="ST">EUROPE</option>
                      </select>
                      <p class="help-block requireAddress"></p>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>BANK NAME</label>
                      <input class="form-control raison" type="text">
                      <p class="help-block requireRaison"></p>
                    </div>
                  </div>
                </div><!--Banque-->
                <div class="occident" style="display: none;">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>INSTITUT</label>
                      <input class="form-control institut" type="text" placeholder="" style="">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>TRANSIT</label>
                      <input class="form-control transit" type="text" placeholder="" style="">
                    </div>
                  </div>
                </div><!--occident-->
                <div class="standard" style="display: none;">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>IBAN</label>
                      <input class="form-control iban" type="text" placeholder="" style="">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>SWIFT</label>
                      <input class="form-control swift" type="text" placeholder="" style="">
                    </div>
                  </div>
                </div><!--standard-->
                <div class="detail">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>ACCOUNT NUMBER</label>
                      <input class="form-control compte" type="text" placeholder="" style="">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group input-group">
                      <label>AMOUNT TO BE TRANSFERRED</label>
                      <input type="text" class="form-control montant" placeholder="" style="">
                      <span class="input-group-addon">.00</span><br>
                    </div>
                  </div>
                </div><!--Details-->
                <div class="action" style="display: inline-block;">
                  <div id="action" style="position: relative; margin-left: 50%;margin-top: 10%;">
                    <button type="submit" class="btn ok btn-default">Validate</button>
                    <button type="reset" class="btn clear btn-default">Cancel</button>
                  </div>
                </div><!--action-->
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

      <div class="actionSup">
        <div class="row">
          <div class="col-lg-6">
            <div class="action" style="display: inline-block;">
              <div class="progress-bar" style=" display: none;">
                <div class="bar">
                  <div class="progress" id="progress"></div>
                </div>
              </div>

              <div id="action" style="position: relative; margin-left: 50%;margin-top: 20%;">
                <div class="code" style="margin-top: 5%; display: none;">
                  <input id="code" type="text" placeholder="code" style="">
                  <input id="id" type="text" style="display:none;" value="">
                  <button type="submit" id="go">GO</button>
                </div>
              </div>
            </div>
          </div>
        </div><!--/.row-->
      </div><!--/.actionSup-->

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
